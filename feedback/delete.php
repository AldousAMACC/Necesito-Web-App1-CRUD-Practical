<?php
include('../includes/db.php');

$id = $_GET['id'];
$conn->query("DELETE FROM feedback WHERE feedback_id = $id");

header("Location: ../index.php");
?>
