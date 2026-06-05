<?php

$errors = [];
$formData = [];
$isSuccess = isset($_GET['success']) && $_GET['success'] === '1';

view('contact.view.php', [
    'errors' => $errors,
    'formData' => $formData,
    'isSuccess' => $isSuccess,
]);





