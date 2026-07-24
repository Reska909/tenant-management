<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TenantController;
use App\Http\Controllers\ContractController;
use App\Http\Controllers\ArchiveController;
use App\Http\Controllers\RecycleBinController;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [DashboardController::class,'index'])
    ->middleware(['auth','verified'])
    ->name('dashboard');

/*
|--------------------------------------------------------------------------
| ADMIN ONLY
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'verified', 'admin'])->group(function () {

Route::get('/users/{user}', [UserController::class, 'show'])
    ->name('users.show');

Route::put('/users/{user}', [UserController::class, 'update'])
    ->name('users.update');

Route::put(
    '/users/{user}/password',
    [UserController::class,'resetPassword']
)->name('users.password');

    /*
|--------------------------------------------------------------------------
| USER MANAGEMENT
|--------------------------------------------------------------------------
*/

Route::resource('users', UserController::class);
    
    /*
    |--------------------------------------------------------------------------
    | VERIFY PASSWORD (SWEETALERT)
    |--------------------------------------------------------------------------
    */

    Route::post('/verify-password', function (Request $request) {

        return response()->json([

            'valid' => Hash::check(
                $request->password,
                Auth::user()->password
            )

        ]);

    })->name('verify.password');

    /*
    |--------------------------------------------------------------------------
    | TENANT
    |--------------------------------------------------------------------------
    */

    Route::resource('tenants', TenantController::class);

    /*
    |--------------------------------------------------------------------------
    | CONTRACT
    |--------------------------------------------------------------------------
    */

    Route::resource('contracts', ContractController::class);

    Route::get(
        '/contracts-export/pdf',
        [ContractController::class,'exportPDF']
    )->name('contracts.export.pdf');

    Route::get(
        '/contracts/{contract}/preview',
        [ContractController::class,'preview']
    )->name('contracts.preview');

    Route::get(
        '/contracts/{contract}/download',
        [ContractController::class,'download']
    )->name('contracts.download');

    /*
    |--------------------------------------------------------------------------
    | ARCHIVE CONTRACT
    |--------------------------------------------------------------------------
    */

    Route::post(
        '/contracts/{contract}/archive',
        [ArchiveController::class,'archive']
    )->name('contracts.archive');

    /*
    |--------------------------------------------------------------------------
    | ARCHIVE
    |--------------------------------------------------------------------------
    */

    Route::resource('archives', ArchiveController::class);

    Route::post(
        '/archives/{archive}/restore',
        [ArchiveController::class,'restore']
    )->name('archives.restore');

    /*
    |--------------------------------------------------------------------------
    | RECYCLE BIN
    |--------------------------------------------------------------------------
    */

    Route::resource('recycle-bin', RecycleBinController::class);

    /*
    |--------------------------------------------------------------------------
    | RECYCLE BIN ACTION
    |--------------------------------------------------------------------------
    */

    Route::post(
        '/recycle-bin/tenant/{tenant}/restore',
        [RecycleBinController::class,'restoreTenant']
    )->name('recycle.restore.tenant');

    Route::delete(
        '/recycle-bin/tenant/{tenant}/force-delete',
        [RecycleBinController::class,'forceDeleteTenant']
    )->name('recycle.force.tenant');

    Route::post(
        '/recycle-bin/contract/{contract}/restore',
        [RecycleBinController::class,'restoreContract']
    )->name('recycle.restore.contract');

    Route::delete(
        '/recycle-bin/contract/{contract}/force-delete',
        [RecycleBinController::class,'forceDeleteContract']
    )->name('recycle.force.contract');

    Route::post(
        '/recycle-bin/archive/{archive}/restore',
        [RecycleBinController::class,'restoreArchive']
    )->name('recycle.restore.archive');

    Route::delete(
        '/recycle-bin/archive/{archive}/force-delete',
        [RecycleBinController::class,'forceDeleteArchive']
    )->name('recycle.force.archive');

});

/*
|--------------------------------------------------------------------------
| PROFILE
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');

});

require __DIR__.'/auth.php';