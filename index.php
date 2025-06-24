<?php include('includes/db.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Café Feedback Board</title>
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
  <h1>Café Feedback Board</h1>
  <a href="feedback/create.php">➕ Add Feedback</a>
  <table>
    <thead>
      <tr>
        <th>Nickname</th>
        <th>Rating</th>
        <th>Comment</th>
        <th>Date</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $result = $conn->query("SELECT * FROM feedback ORDER BY date_submitted DESC");
      while ($row = $result->fetch_assoc()):
      ?>
        <tr>
          <td><?= htmlspecialchars($row['nickname']) ?></td>
          <td><?= $row['rating'] ?>/5</td>
          <td><?= htmlspecialchars($row['comment']) ?></td>
          <td><?= $row['date_submitted'] ?></td>
          <td>
            <a href="feedback/edit.php?id=<?= $row['feedback_id'] ?>">✏️ Edit</a> |
            <a href="feedback/delete.php?id=<?= $row['feedback_id'] ?>" onclick="return confirm('Are you sure?')">🗑 Delete</a>
          </td>
        </tr>
      <?php endwhile; ?>
    </tbody>
  </table>
</body>
</html>
