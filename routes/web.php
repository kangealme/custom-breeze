<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Models\User;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [AuthenticatedSessionController::class, 'create'])
    ->middleware('guest')
    ->name('login');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

//home
Route::get('/homeadm', [HomeController::class, 'homeAdmin']);
Route::get('/home', [HomeController::class, 'home']);

//users

Route::get('/penggunaAdd', [UserController::class, 'add']);
Route::post('/penggunaAdd', [UserController::class, 'save']);
Route::get('/penggunaList', [UserController::class, 'list']);
Route::get('/penggunaEdit/{id}', [UserController::class, 'edit']);
Route::get('/penggunaProfil/{id}', [UserController::class, 'profil']);
Route::put('/userUpdate/{id}', [UserController::class, 'update']);
Route::delete('/penggunaHapus/{id}', [UserController::class, 'destroy']);

Route::get('/adminProfile', [UserController::class, 'adminProfil']);
Route::get('/adminEdit', [UserController::class, 'editAdmin']);


require __DIR__ . '/auth.php';
