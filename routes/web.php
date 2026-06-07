<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\FallbackController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LimsPageController;
use Illuminate\Support\Facades\Route;

Route::get('/', HomeController::class)->name('home');
Route::get('/sobre', [LimsPageController::class, 'about'])->name('about');
Route::get('/projetos', [LimsPageController::class, 'projects'])->name('projects');
Route::get('/eventos', [LimsPageController::class, 'events'])->name('events');
Route::get('/time', [LimsPageController::class, 'team'])->name('team');
Route::get('/tecnologias', [LimsPageController::class, 'technologies'])->name('technologies');
Route::get('/blog', [LimsPageController::class, 'blog'])->name('blog');
Route::get('/contato', [ContactController::class, 'show'])->name('contact.show');

Route::fallback(FallbackController::class);
