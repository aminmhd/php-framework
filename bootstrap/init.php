<?php


use Dotenv\Dotenv;
use App\Core\Request;
use App\Core\Routing;
use App\Models\Model;
use App\Models\User;

define('BASEPATH', __DIR__ . '/../');
// start session
session_start();

include BASEPATH . "vendor/autoload.php";
include BASEPATH . "helpers/func.php";

$dotenv = Dotenv::createImmutable(BASEPATH);
$dotenv->load();

// running request in whole system
$request = new Request();

// models
$models = new Model();
$usr = new User;



// add all of routes to my ram
include BASEPATH . "routes/web.php";



// running the routing 
$routing = new Routing();
$routing->run();










