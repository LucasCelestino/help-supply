<?php

require ('vendor/autoload.php');
require('config/config.php');

use CoffeeCode\Router\Router;
use App\Core\Session;

$session = new Session();

$session->startSession();

$router = new Router(APP_URL);

$router->namespace("App\Controllers\Web");

$router->get("/home", "HomeController:index");
$router->get("/login", "LoginController:index");
$router->post("/login", "LoginController:login");
// $router->get("/users/{id}", "UserController:show");

$router->get("/users/create", "UserController:create");
$router->post("/users/store", "UserController:store");

$router->get("/users/edit/{id}", "UserController:edit");
$router->put("/users/update", "UserController:update");

$router->delete("/users/destroy/{id}", "UserController:destroy");

$router->dispatch();
