<?php
session_start() ;
include '../db.php';

$email = $_POST['email'];
$password = $_POST['password'];
$name = $_POST['name'];

if (isset($_POST['register'])) {
  $sql = "INSERT INTO users (email, password, name) VALUES ('$email', '$password', '$name')";
  $query = $conn->query($sql);

  header('Location: ../../login.php');
}
