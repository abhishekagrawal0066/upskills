<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LicenseCategoryController;
use App\Http\Controllers\LicenseTypeController;
use App\Http\Controllers\LicenseDataController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('home');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route::get('/login/{provider}', 'LoginController@redirectToProvider');
// Route::get('/login/{provider}/callback', 'LoginController@handleProviderCallback');
Route::get('/login/{provider}', [LoginController::class, 'redirectToProvider']);
Route::get('/login/{provider}/callback', [LoginController::class, 'handleProviderCallback']);
Route::post('/users/{userId}/assign-role', [UserController::class, 'assignRole'])->name('users.assignRole');
// Route::middleware(['auth', 'role:admin'])->group(function () {
//     Route::get('/dashboard', function () {
//         return view('dashboard');
//     })->name('dashboard');
// });


Route::get('/auth/facebook', 'Auth\LoginController@redirectToFacebook');
Route::get('/auth/facebook/callback', 'Auth\LoginController@handleFacebookCallback');

Route::get('/auth/google', 'Auth\LoginController@redirectToGoogle');
Route::get('/auth/google/callback', 'Auth\LoginController@handleGoogleCallback');

Route::get('/auth/linkedin', 'Auth\LoginController@redirectToLinkedIn');
Route::get('/auth/linkedin/callback', 'Auth\LoginController@handleLinkedInCallback');

// Route::get('fssai/list', [LicenseDataController::class,'index'])->name('fssai.list');
Route::resource('license_categories', LicenseCategoryController::class);
Route::resource('license_types', LicenseTypeController::class);

Route::get('/licenses', [LicenseDataController::class, 'index'])->name('licenses.index');
Route::get('/licenses/create', [LicenseDataController::class, 'create'])->name('licenses.create');
Route::post('/licenses', [LicenseDataController::class, 'store'])->name('licenses.store');
Route::get('/licenses/{license}', [LicenseDataController::class, 'show'])->name('licenses.show');
Route::get('/licenses/{license}/edit', [LicenseDataController::class, 'edit'])->name('licenses.edit');
Route::put('/licenses/{license}', [LicenseDataController::class, 'update'])->name('licenses.update');
Route::delete('/licenses/{license}', [LicenseDataController::class, 'destroy'])->name('licenses.destroy');
