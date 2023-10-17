<?php

require 'vendor/autoload.php';
require 'config/config.php';
require 'generated-conf/config.php';

use App\Router;
use App\Controllers\UsersController;
use App\Controllers\ProductsController;
use App\Controllers\BasketsController;
use App\Controllers\DeliveryCostsController;
use App\Controllers\SpecialOffersController;

$uri = $_SERVER['REQUEST_URI'];
$params = Array();
$method = $_SERVER["REQUEST_METHOD"];

if ($method == "POST") {
    $params = json_decode(file_get_contents('php://input'));
}else if($method == "GET"){
    $params = $_GET;
}else if($method == "PUT"){
}else if($method == "DELETE"){
    $params = json_decode(file_get_contents('php://input'));
}

$router = new Router();
// Users
$router->addRoute('/users', UsersController::class, 'index');            //GET
$router->addRoute('/user', UsersController::class, 'show');              //GET //Not working
$router->addRoute('/users/new', UsersController::class, 'new');          //POST
$router->addRoute('/users/delete', UsersController::class, 'destroy');   //DELETE
$router->addRoute('/users/update', UsersController::class, 'update');    //POST

// Products
$router->addRoute('/products', ProductsController::class, 'index');            //GET
$router->addRoute('/product', ProductsController::class, 'show');             //GET //Not working
$router->addRoute('/products/new', ProductsController::class, 'new');          //POST
$router->addRoute('/products/delete', ProductsController::class, 'destroy');   //DELETE
$router->addRoute('/products/update', ProductsController::class, 'update');    //POST

// Baskets
$router->addRoute('/baskets', BasketsController::class, 'index');            //GET
$router->addRoute('/basket', BasketsController::class, 'show');              //GET //Not working
$router->addRoute('/baskets/new', BasketsController::class, 'new');          //POST
$router->addRoute('/baskets/delete', BasketsController::class, 'destroy');   //DELETE
$router->addRoute('/baskets/update', BasketsController::class, 'update');    //POST
$router->addRoute('/baskets/total', BasketsController::class, 'total');     //POST

// DeliverCosts
$router->addRoute('/delivery_costs', DeliveryCostsController::class, 'index');            //GET
$router->addRoute('/delivery_cost', DeliveryCostsController::class, 'show');              //GET //Not working
$router->addRoute('/delivery_costs/new', DeliveryCostsController::class, 'new');          //POST
$router->addRoute('/delivery_costs/delete', DeliveryCostsController::class, 'destroy');   //DELETE
$router->addRoute('/delivery_costs/update', DeliveryCostsController::class, 'update');    //POST

// Special Offers
$router->addRoute('/special_offers', SpecialOffersController::class, 'index');            //GET
$router->addRoute('/special_offer', SpecialOffersController::class, 'show');              //GET //Not working
$router->addRoute('/special_offers/new', SpecialOffersController::class, 'new');          //POST
$router->addRoute('/special_offers/delete', SpecialOffersController::class, 'destroy');   //DELETE
$router->addRoute('/special_offers/update', SpecialOffersController::class, 'update');    //POST

// Dispatch Requests
$router->dispatch($uri, $params);


?>