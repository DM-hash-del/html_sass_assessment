<?php

// dd(BASE_PATH);

// $host = 'localhost';
// $db   = 'netmatters_mirror';
// $user = 'root';
// $pass = '';
$charset = 'utf8mb4';

$host = $_ENV['HOST'];
$db   = $_ENV['DB_NAME'];
$user = $_ENV['USER'];
$pass = $_ENV['PASSWORD'];

// The Data Source Name (DSN) specifies the driver, host, database, and charset
$dsn = "mysql:host=$host;dbname=$db;charset=$charset";

// This creates the connection
$pdo = new PDO($dsn, $user, $pass);

// Set error mode to throw exceptions so you know if something breaks
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// echo "Connected successfully!";

$news = $pdo->query('SELECT * FROM news;')->fetchAll(PDO::FETCH_ASSOC);
// dd($news[1]['body']);



require 'Views/index.view.php';