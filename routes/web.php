<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\TerrainController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\VilleController;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Route;
use Spatie\Permission\Models\Role;

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

Route::get('/login', function () {
    return view('auth.login');
})->name("login");


Route::post("role/UpdateRolePerm", [RoleController::class, 'UpdateRolePermissions'])->name('role.UpdateRolePerm');
Route::get("role/{role}/EditRolePerm", [RoleController::class, 'EditRolePermissions'])->name('role.EditRolePerm');
Route::put("/role/update", [RoleController::class, "update"])->name("role:update");


Route::post("/user/UpdateUserRoles", [UserController::class, 'UpdateUserRoles'])->name('user.UpdateUserRoles');
Route::get("/user/AccountSettings", [UserController::class, "AccountSettings"])->name('user.AccountSettings');
// Route::get("terrain/store", [TerrainController::class, "store"]);

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::resource('terrain', TerrainController::class);
Route::resource('user', UserController::class);
Route::resource('role', RoleController::class);
Route::resource('ville', VilleController::class);
Route::resource('image', ImageController::class);
Route::resource('video', VideoController::class);

Route::get("/logout", function () {
    Auth::logout();
    return redirect("/login");
})->name('logout');

Auth::routes();
