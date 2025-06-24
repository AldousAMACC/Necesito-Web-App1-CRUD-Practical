<?php
include('../includes/db.php');

$id = $_GET['id'];
$result = $conn->query("SELECT * FROM feedback WHERE feedback_id = $id");
$row = $result->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $nickname = $_POST['nickname'];
  $rating = $_POST['rating'];
  $comment = $_POST['comment'];

  $stmt = $conn->prepare("UPDATE feedback SET nickname=?, rating=?, comment=? WHERE feedback_id=?");
  $stmt->bind_param("sisi", $nickname, $rating, $comment, $id);
  $stmt->execute();

  header("Location: ../index.php");
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Edit Feedback</title>
</head>
<body>
  <h2>Edit Feedback</h2>
  <form method="POST">
    <label>Nickname:</label><br>
    <input type="text" name="nickname" value="<?= htmlspecialchars($row['nickname']) ?>" required><br><br>

    <label>Rating (1-5):</label><br>
    <input type="number" name="rating" value="<?= $row['rating'] ?>" min="1" max="5" required><br><br>

    <label>Comment:</label><br>
    <textarea name="comment" required><?= htmlspecialchars($row['comment']) ?></textarea><br><br>

    <button type="submit">Update</button>
    <a href="../index.php">Cancel</a>
  </form>
</body>
</html>
