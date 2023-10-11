<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\AuthController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post("/login", [AuthController::class, "login"])->name("login");

Route::middleware('auth:sanctum')->group(function () {
    Route::get("/users", [UsersController::class, "index"])->name("users.index");
    Route::post("/users", [UsersController::class, "store"])->name("users.store");
    Route::get("/users/{id}", [UsersController::class, "show"])->name("users.show");
    Route::put("/users/{id}", [UsersController::class, "update"])->name("users.update");
    Route::delete("/users/{id}", [UsersController::class, "destroy"])->name("users.destroy");
    Route::post("/logout", [AuthController::class, "logout"]);
});

