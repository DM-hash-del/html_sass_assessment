<?php
require_once realpath(__DIR__ . "/vendor/autoload.php");
use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

require 'Core/functions.php';

const BASE_PATH = __DIR__ . '/../';


$uri = parse_url($_SERVER['REQUEST_URI'])['path'];

if ($uri === '/' || $uri === '/index.php') {
  require 'Controllers/index.php';
} else if ($uri === '/contact' || $uri === '/contact.php') {
  require 'Controllers/contact.php';
} else {
  echo 'You messed up somewhere before controller';
}

