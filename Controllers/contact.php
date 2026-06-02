<?php

$host = 'localhost';
$db   = 'netmatters_mirror';
$user = 'root';
$pass = '';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$pdo = new PDO($dsn, $user, $pass);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$errors = [];
$formData = [];
$isSuccess = false;

// Handle form submission
// ! errors needs to be passed for fresh get request
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Collect and trim form data
    $formData = [
        'name' => trim($_POST['name'] ?? ''),
        'company_name' => trim($_POST['company'] ?? ''),
        'email' => trim($_POST['email'] ?? ''),
        'telephone_number' => trim($_POST['telephone'] ?? ''),
        'message' => trim($_POST['message'] ?? ''),
        'marketing_option' => isset($_POST['marketing_option']) ? 1 : 0,
    ];

    // Validation rules
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
            $stmt = $pdo->prepare('INSERT INTO contact_form (name, company_name, email, telephone_number, message, marketing_option) VALUES (?, ?, ?, ?, ?, ?)');
            $stmt->execute([
                $formData['name'],
                $formData['company_name'],
                $formData['email'],
                $formData['telephone_number'],
                $formData['message'],
                $formData['marketing_option']
            ]);
            $isSuccess = true;
            $formData = []; // Clear form on success
        } catch (Exception $e) {
            $errors['database'] = $e->getMessage();
            // dd($errors);
        }
    }
}

require 'Views/contact.view.php';





