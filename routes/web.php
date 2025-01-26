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


Route::middleware(['web'])->group(function () {
    Route::get('/auth/{provider}/redirect', function ($provider) {
        // Validasi nama provider
        if (!in_array($provider, ['google', 'github'])) {
            abort(404, 'Provider tidak valid.');
        }

        // Simpan URL halaman sebelumnya ke session
        session(['redirect_url' => url()->previous()]);
        return Socialite::driver($provider)->redirect();
    })->name('oauth.redirect');

    Route::get('/auth/{provider}/callback', function ($provider) {
        if (!in_array($provider, ['google', 'github'])) {
            abort(404, 'Provider tidak valid.');
        }

        try {
            $socialUser = Socialite::driver($provider)->stateless()->user();
        } catch (\Exception $e) {
            return redirect()->route('login')->with('error', 'Gagal login menggunakan ' . ucfirst($provider) . '.');
        }

        // Cek apakah pengguna sudah terdaftar
        $user = User::where('email', $socialUser->getEmail())->first();

        if (!$user) {
            if (!$socialUser->getEmail()) {
                return redirect()->route('login')->with('error', 'Email tidak tersedia dari penyedia OAuth.');
            }

            // Buat pengguna baru
            $user = User::create([
                'name' => $socialUser->getName(),
                'email' => $socialUser->getEmail(),
                'password' => bcrypt(uniqid()), // Set password acak
                'oauth_provider' => $provider,
                'oauth_id' => $socialUser->getId(),
            ]);
        }

        // Login pengguna
        Auth::login($user);

        $redirectUrl = session('redirect_url', '/');
        if (!str_starts_with($redirectUrl, config('app.url'))) {
            $redirectUrl = '/';
        }

        return redirect($redirectUrl);
    })->withoutMiddleware([\Illuminate\Foundation\Http\Middleware\VerifyCsrfToken::class])
        ->name('oauth.callback');
});



Route::get('/auth/{provider}/redirect', function ($provider) {
    // Validasi nama provider
    if (!in_array($provider, ['google', 'github'])) {
        abort(404, 'Provider tidak valid.');
    }

    // Simpan URL halaman sebelumnya ke session
    session(['redirect_url' => url()->previous()]);
    return Socialite::driver($provider)->redirect();
})->name('oauth.redirect');

Route::get('/auth/{provider}/callback', function ($provider) {
    if (!in_array($provider, ['google', 'github'])) {
        abort(404, 'Provider tidak valid.');
    }

    try {
        $socialUser = Socialite::driver($provider)->stateless()->user();
    } catch (\Exception $e) {
        return redirect()->route('login')->with('error', 'Gagal login menggunakan ' . ucfirst($provider) . '.');
    }

    // Cek apakah pengguna sudah terdaftar
    $user = User::where('email', $socialUser->getEmail())->first();

    if (!$user) {
        if (!$socialUser->getEmail()) {
            return redirect()->route('login')->with('error', 'Email tidak tersedia dari penyedia OAuth.');
        }

        // Buat pengguna baru
        $user = User::create([
            'name' => $socialUser->getName(),
            'email' => $socialUser->getEmail(),
            'password' => bcrypt(uniqid()), // Set password acak
            'oauth_provider' => $provider,
            'oauth_id' => $socialUser->getId(),
        ]);
    }

    // Login pengguna
    Auth::login($user);

    $redirectUrl = session('redirect_url', '/');
    if (!str_starts_with($redirectUrl, config('app.url'))) {
        $redirectUrl = '/';
    }

    return redirect($redirectUrl);
})->withoutMiddleware([\Illuminate\Foundation\Http\Middleware\VerifyCsrfToken::class])
    ->name('oauth.callback');
