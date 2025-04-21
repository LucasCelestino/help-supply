<?php

require ('vendor/autoload.php');
require('config/config.php');

use CoffeeCode\Router\Router;
use App\Core\Session;

$session = new Session();

$session->startSession();

$router = new Router(APP_URL);

$router->namespace("App\Controllers\Web");

//HOME
$router->get("/home", "HomeController:index");
$router->get("/", "HomeController:index");


//LOGIN
$router->get("/login", "LoginController:index");
$router->post("/login", "LoginController:login");
$router->get("/loggout", "LoginController:loggout");


// CONTROLE DE NAVIOS
$router->get("/navios-fornecidos", "ShipController:index");

$router->get("/navios-fornecidos/exibir/{id}", "ShipController:show");

$router->get("/navios-fornecidos/excluir/{id}", "ShipController:destroy");

$router->get("/navios-fornecidos/editar/{id}", "ShipController:edit");
$router->post("/navios-fornecidos/editar", "ShipController:update");

$router->get("/navios-fornecidos/adicionar", "ShipController:create");
$router->post("/navios-fornecidos/adicionar", "ShipController:store");

$router->get("/navios-fornecidos/pesquisar", "ShipController:search");

// CONTROLE DE PASTAS
$router->get("/controle-pastas", "FolderController:index");

$router->get("/controle-pastas/exibir/{id}", "FolderController:show");

$router->get("/controle-pastas/excluir/{id}", "FolderController:destroy");

$router->get("/controle-pastas/editar/{id}", "FolderController:edit");
$router->post("/controle-pastas/editar", "FolderController:update");

$router->get("/controle-pastas/adicionar", "FolderController:create");
$router->post("/controle-pastas/adicionar", "FolderController:store");

$router->get("/controle-pastas/pesquisar", "FolderController:search");

// LEMBRETES


// PERFIL

$router->dispatch();
