<?php

use Livewire\Volt\Volt;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Volt::route('/aswin/dashboard', 'dashboard.index');
Volt::route('/aswin/user', 'users.index');
Volt::route('/aswin/tech', 'techstack.index');
Volt::route('/aswin/project', 'project.index');
Volt::route('/aswin/project/create', 'project.create');
Volt::route('/aswin/project/{id}/edit', 'project.edit');
Volt::route('/aswin/comment', 'comment.index');
Volt::route('/aswin/gallery', 'gallery.index');
Volt::route('/aswin/profile', 'profile.index');
Volt::route('/aswin/shortcut', 'shortcut.index');

Volt::route('/', 'public.home')->name('home');
Volt::route('/project', 'public.project')->name('project');
Volt::route('/project/{slug}', 'public.project-detail')->name('project-detail');
Volt::route('/post', 'public.post')->name('post');
Volt::route('/gallery', 'public.gallery')->name('gallery');
Volt::route('/guest', 'public.guest')->name('guest');



Route::get('/auth/{provider}/redirect', function ($provider) {
    // Simpan URL halaman sebelumnya ke session
    session(['redirect_url' => url()->previous()]);
    return Socialite::driver($provider)->redirect();
})->name('oauth.redirect');

Route::get('/auth/{provider}/callback', function ($provider) {
    $socialUser = Socialite::driver($provider)->stateless()->user();

    // Cek apakah pengguna sudah terdaftar
    $user = User::where('email', $socialUser->getEmail())->first();

    if (!$user) {
        // Buat pengguna baru
        $user = User::create([
            'name' => $socialUser->getName(),
            'email' => $socialUser->getEmail(),
            'password' => bcrypt(uniqid()), // Set password acak
        ]);
    }

    // Login pengguna
    Auth::login($user);

    return redirect(session('redirect_url', '/'));
})->name('oauth.callback');

Route::post('/logout', function () {
    Auth::logout();
    return redirect('/'); // Redirect ke halaman utama atau login
})->name('logout');
