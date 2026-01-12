<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\AboutController;
use App\Http\Controllers\Frontend\ServiceController as FrontendServiceController;
use App\Http\Controllers\Frontend\ResearchController as FrontendResearchController;
use App\Http\Controllers\Frontend\PpmController as FrontendPpmController;
use App\Http\Controllers\Admin\ResearchExportController;
use App\Http\Controllers\Admin\ResearchController;

Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::post('/researches/import', [ResearchController::class, 'import'])
        ->name('researches.import');
});


// Authentication Routes
Auth::routes();

// Frontend Routes
Route::get('/', [HomeController::class, 'index'])->name('home');

// About Routes
Route::prefix('tentang-kami')->name('about.')->group(function () {
    Route::get('/sejarah', [AboutController::class, 'history'])->name('history');
    Route::get('/visi-misi', [AboutController::class, 'visionMission'])->name('vision-mission');
    Route::get('/struktur-organisasi', [AboutController::class, 'organizationalStructure'])->name('organizational-structure');
    Route::get('/pimpinan', [AboutController::class, 'leaders'])->name('leaders');
    Route::get('/staf', [AboutController::class, 'staff'])->name('staff');
    Route::get('/galeri', [AboutController::class, 'gallery'])->name('gallery');
    Route::get('/realisasi-anggaran', [AboutController::class, 'budgetRealization'])->name('budget-realization');
});

// Service Routes
Route::prefix('layanan')->name('services.')->group(function () {
    Route::get('/penelitian', [FrontendServiceController::class, 'research'])->name('research');
    Route::get('/pengabdian', [FrontendServiceController::class, 'communityService'])->name('community-service');
    Route::get('/kerjasama', [FrontendServiceController::class, 'cooperation'])->name('cooperation');
});

// Restra & Performance Routes
Route::get('/restra-lppm', [HomeController::class, 'restra'])->name('restra');
Route::get('/kinerja-lppm', [HomeController::class, 'performance'])->name('performance');

// Research Routes
Route::prefix('penelitian')->name('research.')->group(function () {
    Route::get('/internal', [FrontendResearchController::class, 'internal'])->name('internal');
});

// PPM Routes
Route::prefix('ppm')->name('ppm.')->group(function () {
    Route::get('/internal', [FrontendPpmController::class, 'internal'])->name('internal');
});

// News Routes
Route::get('/berita', [HomeController::class, 'news'])->name('news.index');
Route::get('/berita/{slug}', [HomeController::class, 'newsDetail'])->name('news.detail');

// Admin Routes
Route::prefix('admin')->name('admin.')->middleware(['auth', 'admin'])->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');

    // Profile Routes
    Route::resource('profiles', App\Http\Controllers\Admin\ProfileController::class);

    // Vision Mission Routes
    Route::resource('vision-missions', App\Http\Controllers\Admin\VisionMissionController::class);

    // Organizational Structure Routes
    Route::resource('organizational-structures', App\Http\Controllers\Admin\OrganizationalStructureController::class);

    // Leader Routes
    Route::resource('leaders', App\Http\Controllers\Admin\LeaderController::class);

    // Staff Routes
    Route::resource('staff', App\Http\Controllers\Admin\StaffController::class);

    // Gallery Routes
    Route::resource('galleries', App\Http\Controllers\Admin\GalleryController::class);

    // Budget Realization Routes
    Route::resource('budget-realizations', App\Http\Controllers\Admin\BudgetRealizationController::class);

    // Research Routes
    Route::resource('researches', App\Http\Controllers\Admin\ResearchController::class);

    // Service Routes
    Route::resource('services', App\Http\Controllers\Admin\ServiceController::class);

    // PPM Routes
    Route::resource('ppm', App\Http\Controllers\Admin\PpmController::class);

    // News Routes
    Route::resource('news', App\Http\Controllers\Admin\NewsController::class);

    // Restra Routes
    Route::resource('restras', App\Http\Controllers\Admin\RestraController::class);

    // Performance Routes
    Route::resource('performances', App\Http\Controllers\Admin\PerformanceController::class);

    // Cooperation Routes
    Route::resource('cooperations', App\Http\Controllers\Admin\CooperationController::class);
});



Route::prefix('admin')
    ->name('admin.')
    ->middleware(['auth']) // jika pakai login admin
    ->group(function () {

        Route::get(
            '/researches/export/excel',
            [ResearchExportController::class, 'excel']
        )->name('researches.export.excel');

        Route::get(
            '/researches/export/pdf',
            [ResearchExportController::class, 'pdf']
        )->name('researches.export.pdf');
    });
Route::prefix('admin')->middleware(['auth'])->group(function () {
    Route::get('/researches/export/excel', [ResearchExportController::class, 'excel'])
        ->name('admin.researches.export.excel');

    Route::get('/researches/export/pdf', [ResearchExportController::class, 'pdf'])
        ->name('admin.researches.export.pdf');
});
Route::prefix('admin')->middleware(['auth'])->group(function () {
    Route::post(
        'researches/import',
        [\App\Http\Controllers\Admin\ResearchController::class, 'import']
    )->name('admin.researches.import');
});
