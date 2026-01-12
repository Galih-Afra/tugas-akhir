<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReaderController;
use App\Http\Controllers\Admin\ComicController;
use App\Http\Controllers\Admin\ChapterController;
use App\Http\Controllers\Admin\DashboardController;

/*
|--------------------------------------------------------------------------
| PUBLIC (PEMBACA)
|--------------------------------------------------------------------------
*/
Route::get('/', [ReaderController::class, 'index'])->name('home');
Route::get('/comic/{comic}', [ReaderController::class, 'showComic'])->name('comic.show');
Route::get('/read/{chapter}', [ReaderController::class, 'readChapter'])->name('chapter.read');


/*
|--------------------------------------------------------------------------
| DASHBOARD UMUM (MEMBER / USER)
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');
});


/*
|--------------------------------------------------------------------------
| ADMIN PANEL (HANYA UNTUK ADMIN)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'is.admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        // Dashboard Admin
        Route::get('/dashboard', [DashboardController::class, 'index'])
            ->name('dashboard');

        // CRUD Komik
        Route::resource('comics', ComicController::class);

        // CRUD Chapter (nested ke comic)
        Route::resource('comics.chapters', ChapterController::class);

        // Upload halaman per chapter (nested)
        Route::post(
            'comics/{comic}/chapters/{chapter}/pages',
            [ChapterController::class, 'uploadPages']
        )->name('comics.chapters.pages.upload');
    });


/*
|--------------------------------------------------------------------------
| PROFILE
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


/*
|--------------------------------------------------------------------------
| AUTH
|--------------------------------------------------------------------------
*/
require __DIR__.'/auth.php';
