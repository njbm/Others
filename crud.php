<?php

$host = '127.0.0.1';
$dbname = 'crud';
$username = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

// Create

$name = 'John Doe';
$email = 'john@example.com';

$stmt = $pdo->prepare("INSERT INTO users (name, email) VALUES (:name, :email)");
$stmt->bindParam(':name', $name);
$stmt->bindParam(':email', $email);

$stmt->execute();
