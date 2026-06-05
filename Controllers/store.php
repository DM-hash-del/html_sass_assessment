<?php

$config = require base_path('config.php');

$host = $config['database']['host'] ?? 'localhost';
$db = $config['database']['name'] ?? null;
$user = $config['database']['user'] ?? null;
$pass = $config['database']['password'] ?? null;
$charset = 'utf8mb4';

$errors = [];
$formData = [];
$isSuccess = false;

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: /contact');
    exit;
}

$formData = [
    'name' => trim($_POST['name'] ?? ''),
    'company_name' => trim($_POST['company'] ?? ''),
    'email' => trim($_POST['email'] ?? ''),
    'telephone_number' => trim($_POST['telephone'] ?? ''),
    'message' => trim($_POST['message'] ?? ''),
    'marketing_option' => isset($_POST['marketing_option']) ? 1 : 0,
];

if (empty($formData['name'])) {
    $errors['name'] = true;
}

if (empty($formData['email'])) {
    $errors['email'] = true;
} elseif (!filter_var($formData['email'], FILTER_VALIDATE_EMAIL)) {
    $errors['email'] = true;
}

if (empty($formData['telephone_number'])) {
    $errors['telephone'] = true;
}

if (empty($formData['message'])) {
    $errors['message'] = true;
}

if (empty($errors)) {
    try {
        $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
        $pdo = new PDO($dsn, $user, $pass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $pdo->prepare('INSERT INTO contact_form (name, company_name, email, telephone_number, message, marketing_option) VALUES (?, ?, ?, ?, ?, ?)');
        $stmt->execute([
            $formData['name'],
            $formData['company_name'],
            $formData['email'],
            $formData['telephone_number'],
            $formData['message'],
            $formData['marketing_option'],
        ]);

        header('Location: /contact?success=1#contact-form');
        exit;
    } catch (Throwable $e) {
        $errors['database'] = 'There was an error saving your message. Please try again later.';
    }
}

view('contact.view.php', [
    'errors' => $errors,
    'formData' => $formData,
    'isSuccess' => $isSuccess,
]);