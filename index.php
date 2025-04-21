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
$router->get("/", "HomeController:index");


$router->get("/login", "LoginController:index");
$router->post("/login", "LoginController:login");
$router->get("/loggout", "LoginController:loggout");


$router->get("/navios-fornecidos", "ShipController:index");

$router->get("/navios-fornecidos/exibir/{id}", "ShipController:show");

$router->get("/navios-fornecidos/excluir/{id}", "ShipController:destroy");

$router->get("/navios-fornecidos/editar/{id}", "ShipController:edit");
$router->post("/navios-fornecidos/editar", "ShipController:update");

$router->post("/navios-fornecidos/adicionar", "ShipController:store");

$router->get("/navios-fornecidos/adicionar", "ShipController:create");
$router->post("/navios-fornecidos/adicionar", "ShipController:store");

$router->get("/navios-fornecidos/pesquisar", "ShipController:search");


// $router->get("/users/{id}", "UserController:show");

$router->get("/users/create", "UserController:create");
$router->post("/users/store", "UserController:store");

$router->get("/users/edit/{id}", "UserController:edit");
$router->put("/users/update", "UserController:update");

$router->delete("/users/destroy/{id}", "UserController:destroy");

$router->dispatch();
