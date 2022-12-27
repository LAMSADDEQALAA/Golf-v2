<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\TerrainGolfController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\VilleController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('auth.login');
});

Route::get("/editRolePerm", [RoleController::class, 'EditRolePermissions'])->name('editRolePerm');
Route::get("/editUserRoles", [UserController::class, 'EditUserRoles'])->name('editUserRoles');

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::resource('terraingolf', TerrainGolfController::class);
Route::resource('user', UserController::class);
Route::resource('role', RoleController::class);
Route::resource('ville', VilleController::class);
Route::resource('image', ImageController::class);
Route::resource('video', VideoController::class);

Route::get("/logout", function () {
    Auth::logout();
    return redirect("/");
})->name('logout');

Auth::routes();
