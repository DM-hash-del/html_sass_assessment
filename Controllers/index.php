<?php

// $host = 'localhost';
// $db   = 'netmatters_mirror';
// $user = 'root';
// $pass = '';

// $charset = 'utf8mb4';

// $host = $_ENV['DB_HOST'];
// $db   = $_ENV['DB_NAME'];
// $user = $_ENV['DB_USER'];
// $pass = $_ENV['DB_PASSWORD'];

// // if no connection can be made route to index.view.php without DB data
// try {
//   $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
//   $pdo = new PDO($dsn, $user, $pass);
//   $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  
//   $news = $pdo->query('SELECT * FROM news;')->fetchAll(PDO::FETCH_ASSOC);
  
//     view('index.view.php', [
//     'news' => $news
//   ]);
//   die();
// } catch (\Throwable $th) {
//   // load without DB connection?
//   require view('index.view.php', [
//     'news' => 'No News to Display.'
//   ]);
// }

try {
  // sqlite
  $db = BASE_PATH . 'Database/database.sqlite';
  
  $pdo = new PDO("sqlite:$db");
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  
  $news = $pdo->query('SELECT * FROM news ORDER BY published_date DESC LIMIT 3')->fetchAll(PDO::FETCH_ASSOC);
  
    view('index.view.php', [
    'news' => $news
  ]);
  die();
} catch (\Throwable $th) {
  dd($th);
  // load without DB connection?
  // require view('index.view.php', [
  //   'news' => 'No News to Display.'
  // ]);
}