<?php
require_once "db.php";
// Create
$id= null;
$name = $_POST['name'];
$email = $_POST['email'];




$stmt = $pdo->prepare("INSERT INTO users (id, name, email) VALUES (:id, :name, :email)");

$stmt->bindParam(':id', $id);
$stmt->bindParam(':name', $name);
$stmt->bindParam(':email', $email);

$stmt->execute();