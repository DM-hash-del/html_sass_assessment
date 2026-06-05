<?php

// namespace Core;

function dd($value) {
  echo '<pre>';
  var_dump($value);
  echo '</pre>';
  die();
}

function base_path($path)
{
  return BASE_PATH . $path;
}

function abort($errorCode = 404) {
  http_response_code($errorCode);
  require base_path("views/{$errorCode}.php");
  die();
}


function view($path, $attributes = [])
{
  extract($attributes);
  require base_path('Views/' . $path);
}