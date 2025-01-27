<?php

use App\Http\Middleware\Admin;
use Livewire\Volt\Volt;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Volt::route('/', 'public.home')->name('home');
Volt::route('/project', 'public.project')->name('project');
Volt::route('/project/{slug}', 'public.project-detail')->name('project-detail');
Volt::route('/post', 'public.post')->name('post');
Volt::route('/gallery', 'public.gallery')->name('gallery');
Volt::route('/guest', 'public.guest')->name('guest');

Volt::route('/login', 'auth.login')->name('login');
Volt::route('/register', 'auth.register');

// Define the logout
Route::get('/logout', function () {
    auth()->logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();

    return redirect('/');
});

// Protected routes here
Route::middleware('auth')->group(function () {
    Volt::route('/aswin/dashboard', 'dashboard.index')->middleware(Admin::class);
    Volt::route('/aswin/user', 'users.index')->middleware(Admin::class);
    Volt::route('/aswin/tech', 'techstack.index')->middleware(Admin::class);
    Volt::route('/aswin/project', 'project.index')->middleware(Admin::class);
    Volt::route('/aswin/project/create', 'project.create')->middleware(Admin::class);
    Volt::route('/aswin/project/{id}/edit', 'project.edit')->middleware(Admin::class);
    Volt::route('/aswin/comment', 'comment.index')->middleware(Admin::class);
    Volt::route('/aswin/gallery', 'gallery.index')->middleware(Admin::class);
    Volt::route('/aswin/profile', 'profile.index')->middleware(Admin::class);
    Volt::route('/aswin/shortcut', 'shortcut.index')->middleware(Admin::class);
});


Route::get('/auth/{provider}/redirect', function ($provider) {
    // Redirect ke provider OAuth
    return Socialite::driver($provider)->redirect();
})->name('oauth.redirect');

Route::get('/auth/{provider}/callback', function ($provider) {
    $socialUser = Socialite::driver($provider)->stateless()->user();

    $user = User::firstOrCreate(
        ['email' => $socialUser->getEmail()],
        [
            'name' => $socialUser->getName(),
            'email' => $socialUser->getEmail(),
            'password' => bcrypt(uniqid()), // Set password acak
            'oauth_provider' => $provider,
            'role' => 'guest'
        ]
    );

    Auth::login($user);


    return redirect('/');
});
