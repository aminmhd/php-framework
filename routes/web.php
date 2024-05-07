<?php 

use App\Core\Routing;
use App\Core\Route;





Route::get("/framework/index.php/user/index", "UserController@index", ["middleware" => "UserMiddleware"], ["id" => 1]);
// Route::get("/framework/index.php/user/index", "UserController@index", ["middleware" => "d"]);
// Route::get("/framework/index.php/user/edit", "UserController@edit")->middleware("aaaaafvfvfvfvfvaa");
// Route::get("/framework/index.php/user/update", "UserController@update")->middleware("gbggbgbgbgb")

// var_dump(Route::$routes);

