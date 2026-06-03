<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProfileController;

use App\Http\Controllers\AnimalController;
use App\Http\Controllers\ApplicationController;

use App\Http\Controllers\AdminAnimalController;
use App\Http\Controllers\AdminApplicationController;

use App\Http\Controllers\ReportController;
use App\Http\Controllers\UserDashboardController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\AdminUserController;

/*
|--------------------------------------------------------------------------
| Rutas públicas
|--------------------------------------------------------------------------
*/

Route::view('/', 'index')->name('home');

Route::view('/landing', 'landing')->name('landing');

Route::view('/about', 'about')->name('about');

Route::view('/configuration', 'config')->name('config');

/*
|--------------------------------------------------------------------------
| Catálogo público de animales
|--------------------------------------------------------------------------
*/

Route::get('/animals', [AnimalController::class, 'index'])
    ->name('animals.index');

Route::get('/animals/{id}', [AnimalController::class, 'show'])
    ->name('animals.show');

/*
|--------------------------------------------------------------------------
| Rutas autenticadas
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    /*
    |--------------------------------------------------------------------------
    | Usuario
    |--------------------------------------------------------------------------
    */

    Route::get('/dashboard', [UserDashboardController::class, 'index'])
        ->name('dashboard');

    Route::view('/profile', 'user.profile')
        ->name('profile');

    /*
    |--------------------------------------------------------------------------
    | Solicitudes
    |--------------------------------------------------------------------------
    */

    Route::get('/applications', [ApplicationController::class, 'index'])
        ->name('applications.index');

    Route::get('/applications/{id}', [ApplicationController::class, 'show'])
        ->name('applications.show');

    Route::get('/apply/{id}', [ApplicationController::class, 'apply'])
        ->name('apply');

    Route::post('/apply/{id}', [
        ApplicationController::class,
        'store'
    ])->name('apply.store');

});

/*
|--------------------------------------------------------------------------
| Admin
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'admin'])
    ->prefix('admin')
    ->group(function () {

        /*
        |--------------------------------------------------------------------------
        | Dashboard admin
        |--------------------------------------------------------------------------
        */

        Route::get('/', [AdminDashboardController::class, 'index'])
            ->name('admin.dashboard');
        /*
        |--------------------------------------------------------------------------
        | CRUD animales
        |--------------------------------------------------------------------------
        */

        Route::prefix('animals')->group(function () {

            Route::get('/', [AdminAnimalController::class, 'index'])
                ->name('admin.animals');

            Route::get('/create', [AdminAnimalController::class, 'create'])
                ->name('admin.animals.create');

            Route::post('/', [AdminAnimalController::class, 'store'])
                ->name('admin.animals.store');

            Route::get('/{id}', [AdminAnimalController::class, 'show'])
                ->name('admin.animals.show');

            Route::get('/{id}/edit', [AdminAnimalController::class, 'edit'])
                ->name('admin.animals.edit');

            Route::put('/{id}', [AdminAnimalController::class, 'update'])
                ->name('admin.animals.update');

            Route::delete('/{id}', [AdminAnimalController::class, 'destroy'])
                ->name('admin.animals.destroy');

        });

        /*
        |--------------------------------------------------------------------------
        | Solicitudes admin
        |--------------------------------------------------------------------------
        */

        Route::get('/applications', [
            AdminApplicationController::class,
            'index'
        ])->name('admin.applications');

        Route::get('/applications/{id}', [
            AdminApplicationController::class,
            'show'
        ])->name('admin.applications.show');

        Route::post('/applications/{id}/approve', [
            AdminApplicationController::class,
            'approve'
        ])->name('admin.applications.approve');

        Route::post('/applications/{id}/reject', [
            AdminApplicationController::class,
            'reject'
        ])->name('admin.applications.reject');

        /*
        |--------------------------------------------------------------------------
        | Reportes
        |--------------------------------------------------------------------------
        */

        Route::get('/reports', [
            ReportController::class,
            'index'
        ])->name('admin.reports');

        Route::get('/reports/adoptions', [
            ReportController::class,
            'adoptions'
        ])->name('admin.reports.adoptions');

        Route::get('/stats', [
            ReportController::class,
            'stats'
        ])->name('admin.stats');

        /*
        |--------------------------------------------------------------------------
        | Configuración
        |--------------------------------------------------------------------------
        */

        Route::view('/settings', 'admin.settings')
            ->name('admin.settings');

        Route::get('/users', [AdminUserController::class, 'index'])
            ->name('admin.users');

    });

/*
|--------------------------------------------------------------------------
| Breeze profile
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    Route::get('/profile/edit', [
        ProfileController::class,
        'edit'
    ])->name('profile.edit');

    Route::patch('/profile', [
        ProfileController::class,
        'update'
    ])->name('profile.update');

    Route::delete('/profile', [
        ProfileController::class,
        'destroy'
    ])->name('profile.destroy');

});

Route::get('/debug-env', function () {
    return [
        'DB_HOST' => env('DB_HOST'),
        'DB_DATABASE' => env('DB_DATABASE'),
        'DB_CONNECTION' => env('DB_CONNECTION'),
    ];
});

/*
|--------------------------------------------------------------------------
| Auth Breeze
|--------------------------------------------------------------------------
*/

require __DIR__ . '/auth.php';