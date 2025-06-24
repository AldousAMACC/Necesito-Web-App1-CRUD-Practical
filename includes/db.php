<?php
$host = "localhost";
$user = "root"; // Change if using different user
$password = ""; // Change if using password
$dbname = "cafe_feedback";

$conn = new mysqli($host, $user, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
