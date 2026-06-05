<?php
use Dotenv\Dotenv;

// use function Core\base_path;

const BASE_PATH = __DIR__ . '/../';
require BASE_PATH . "/vendor/autoload.php";
require BASE_PATH . 'Core/functions.php';
require BASE_PATH . 'Core/Router.php';


// load enviroment variables
$dotenv = Dotenv::createImmutable(BASE_PATH);
$dotenv->load();



$router = new \Core\Router();
$routes = require base_path('routes.php');


$config = require base_path('config.php');
$dsn = 'mysql:' . http_build_query($config['database'], '', ';');



$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
$method = $_SERVER['REQUEST_METHOD'];

// routes through Controllers/{$method}
$router->route($uri, $method);

// if ($uri === '/' || $uri === '/index.php') {
//   require 'Controllers/index.php';
// } else if ($uri === '/contact' || $uri === '/contact.php') {
//   require 'Controllers/contact.php';
// } else {
//   echo 'You messed up somewhere before controller';
// }

