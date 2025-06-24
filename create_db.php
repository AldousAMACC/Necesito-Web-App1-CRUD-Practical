<?php
$host = "localhost";
$user = "root";
$password = "Jeanaldous@1122";

$conn = new mysqli($host, $user, $password);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$conn->query("CREATE DATABASE IF NOT EXISTS cafe_feedback");
echo "✅ Database cafe_feedback is ready!";
?>
