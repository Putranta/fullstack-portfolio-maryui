<?php

use Livewire\Volt\Volt;

Volt::route('/aswin/dashboard', 'dashboard.index');
Volt::route('/aswin/user', 'users.index');
Volt::route('/aswin/tech', 'techstack.index');
Volt::route('/aswin/project', 'project.index');
Volt::route('/aswin/project/create', 'project.create');
Volt::route('/aswin/project/{id}/edit', 'project.edit');

Volt::route('/', 'public.home')->name('home');
Volt::route('/project', 'public.project')->name('project');
Volt::route('/post', 'public.post')->name('post');
Volt::route('/guest', 'public.guest')->name('guest');
