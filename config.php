<?php
declare(strict_types=1);

return [
  'database' => [
    'host' => getenv('DB_HOST') ?: ($_ENV['DB_HOST'] ?? 'localhost'),
    'name' => getenv('DB_NAME')?: ($_ENV['DB_NAME'] ?? null),
    'user' => getenv('DB_USER') ?: ($_ENV['DB_USER'] ?? null),
    'password' => getenv('DB_PASSWORD') ?: ($_ENV['DB_PASSWORD']) ?? null
  ]
];