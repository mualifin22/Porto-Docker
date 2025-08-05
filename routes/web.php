<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ToolController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ProjectToolController;
use App\Http\Controllers\ProjectScreenshotController;

Route::get('/', [FrontController::class, 'index'])->name('front.index');
Route::get('/details/{project:slug}', [FrontController::class, 'details'])->name('front.details');
Route::get('/book', [FrontController::class, 'book'])->name('front.book');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::prefix('admin')->name('admin.')->group(function () {
        Route::resource('projects', ProjectController::class);

        Route::resource('tools', ToolController::class);

        Route::resource('project_tools', ProjectToolController::class);

        Route::get('/tool/assign/{project}', [ProjectToolController::class, 'create'])
        ->name('tool.assign');
        Route::post('/tool/assign/store/{project}', [ProjectToolController::class, 'store'])
        ->name('tool.assign.store');
        
        Route::resource('project_screenshots', ProjectScreenshotController::class);

        Route::get('/project_screenshot/create/{project}', [ProjectScreenshotController::class, 'create'])
        ->name('project_screenshots.create');
        Route::post('/project_screenshot/store/{project}', [ProjectScreenshotController::class, 'store'])
        ->name('project_screenshots.store');
    });
});

require __DIR__ . '/auth.php';