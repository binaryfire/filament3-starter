<?php

use App\Livewire\Home;
use App\Livewire\Post\Show as PostShow;
use Illuminate\Support\Facades\Route;

Route::get('/', Home::class)->name('home');
Route::get('/article/{post:slug}', PostShow::class)->name('post.show');

Route::get('/test/exception', function () {
    throw new \Exception('Test exception');
})->name('test.exception');
