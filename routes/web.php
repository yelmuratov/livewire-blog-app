<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\UserPageComponent;
use App\Livewire\AdminPageComponent;
use App\Livewire\BlogComponent;
use App\Livewire\BlogDetailComponent;

Route::get('/', UserPageComponent::class)->name('home');
Route::get('/dashboard', AdminPageComponent::class)->name('dashboard');
Route::get('/blog', BlogComponent::class)->name('blog');
Route::get('/blog/{slug}', BlogDetailComponent::class)->name('blog.detail');
