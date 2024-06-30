<?php 

use App\Core\Routing;
use App\Core\Route;



// Authentication 
Route::get("/framework/index.php/login", "Auth\AuthController@loginform")->name("loginform");
Route::post("/framework/index.php/login", "Auth\AuthController@login")->name("login");
Route::get("/framework/index.php/register", "Auth\AuthController@registerform")->name("registerform");
Route::post("/framework/index.php/register", "Auth\AuthController@register")->name("register");
Route::get("/framework/index.php/logout", "Auth\AuthController@logout")->name("logout");



Route::get("/framework/index.php/user/create", "UserController@create", ["middleware" => "UserMiddleware"])->name("user.create");
Route::post("/framework/index.php/user/create", "UserController@store", ["middleware" => "UserMiddleware"])->name("user.store");

Route::get("/framework/index.php/user/index", "UserController@index", ["middleware" => "UserMiddleware"])->name("user.index");
Route::get("/framework/index.php/user/delete/{id}", "UserController@delete", ["middleware" => "UserMiddleware"])->name("user.delete");





