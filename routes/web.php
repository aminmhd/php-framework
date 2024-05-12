<?php 

use App\Core\Routing;
use App\Core\Route;





Route::get("/framework/index.php/user/index", "UserController@index", ["middleware" => "UserMiddleware"])->name("user.index");
Route::get("/framework/index.php/user/delete/{id}", "UserController@delete", ["middleware" => "UserMiddleware"])->name("user.delete");
// Route::get("/framework/index.php/user/edit", "UserController@edit", ["middleware" => "UserMiddleware"], ["id" => 2])->name("edit");
// Route::get("/framework/index.php/user/update", "UserController@edit", ["middleware" => "UserMiddleware"], ["id" => 3])->name("update");
// Route::get("/framework/index.php/user/delete", "UserController@edit", ["middleware" => "UserMiddleware"], ["id" => 4])->name("delete");
// Route::get("/framework/index.php/user/store", "UserController@edit", ["middleware" => "UserMiddleware"], ["id" => 5])->name("store");


// var_dump(Route::$routes);

