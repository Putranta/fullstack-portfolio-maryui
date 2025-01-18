<?php

use Livewire\Volt\Volt;

Volt::route('/admin', 'users.index');
Volt::route('/', 'public.home')->name('home');
Volt::route('/project', 'public.project')->name('project');
Volt::route('/post', 'public.post')->name('post');
Volt::route('/guest', 'public.guest')->name('guest');
