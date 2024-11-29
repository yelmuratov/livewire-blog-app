<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\UserPageComponent;
use App\Livewire\AdminPageComponent;
use App\Livewire\BlogComponent;
use App\Livewire\BlogDetailComponent;

Route::get('/', UserPageComponent::class);
Route::get('/dashboard', AdminPageComponent::class);
Route::get('/blog', BlogComponent::class);
Route::get('/blogs', BlogDetailComponent::class);
