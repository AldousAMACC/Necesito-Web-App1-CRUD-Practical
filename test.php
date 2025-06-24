<?php
$host = "127.0.0.1";
$user = "root";
$password = "Jeanaldous@1122";
$dbname = "cafe_feedback";

$conn = new mysqli($host, $user, $password, $dbname);

if ($conn->connect_error) {
    die("❌ Connection failed: " . $conn->connect_error);
} else {
    echo "✅ Successfully connected to database!";
}
?>
