<?php

$router->get('/', 'index.php');
$router->get('/contact', 'contact.php');
$router->post('/contact', 'store.php');