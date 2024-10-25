<?php

use App\Http\Controllers\AppController;
use App\Http\Controllers\ContentController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\SkillController;
use App\Http\Controllers\SocmedController;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Support\Facades\Route;

Route::get('/', [AppController::class, 'index'])->name('landing');
Route::get('/login', [AppController::class, 'login'])->name('login');
Route::post('/auth', [AppController::class, 'auth'])->name('auth');

// Content Editing
Route::put('/contents/hero', [ContentController::class, 'update_hero'])->name('contents.update.hero');
Route::put('/contents/about', [ContentController::class, 'update_about'])->name('contents.update.about');

// Resources
Route::post('/skills', [SkillController::class, 'store'])->name('skills.store');
Route::put('/skills', [SkillController::class, 'update'])->name('skills.update');
Route::delete('/skills/{id}', [SkillController::class, 'delete'])->name('skills.delete');

Route::post('/projects', [ProjectController::class, 'store'])->name('projects.store');
Route::put('/projects', [ProjectController::class, 'update'])->name('projects.update');
Route::delete('/projects/{id}', [ProjectController::class, 'delete'])->name('projects.delete');

Route::put('/socmeds', [SocmedController::class, 'update'])->name('socmeds.update');
