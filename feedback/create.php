<?php
include('../includes/db.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $nickname = $_POST['nickname'];
  $rating = $_POST['rating'];
  $comment = $_POST['comment'];

  $stmt = $conn->prepare("INSERT INTO feedback (nickname, rating, comment) VALUES (?, ?, ?)");
  $stmt->bind_param("sis", $nickname, $rating, $comment);
  $stmt->execute();

  header("Location: ../index.php");
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Add Feedback</title>
</head>
<body>
  <h2>Add Feedback</h2>
  <form method="POST">
    <label>Nickname:</label><br>
    <input type="text" name="nickname" required><br><br>
    
    <label>Rating (1-5):</label><br>
    <input type="number" name="rating" min="1" max="5" required><br><br>
    
    <label>Comment:</label><br>
    <textarea name="comment" required></textarea><br><br>
    
    <button type="submit">Submit</button>
    <a href="../index.php">Back</a>
  </form>
</body>
</html>
