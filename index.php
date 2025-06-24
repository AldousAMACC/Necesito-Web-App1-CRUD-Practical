<!DOCTYPE html>
<html>
<head>
  <title>Feedback Board</title>
  <link rel="stylesheet" href="css/style.css"> <!-- adjust path if needed -->
</head>
<body>
  <div class="container">
    <h1>Customer Feedback Board</h1>

    <!-- Feedback Form -->
    <form action="feedback/create.php" method="POST">
      <input type="text" name="nickname" placeholder="Your nickname" required />
      <select name="rating" required>
        <option value="">Rating</option>
        <option value="5">5 - Excellent</option>
        <option value="4">4 - Good</option>
        <option value="3">3 - Okay</option>
        <option value="2">2 - Poor</option>
        <option value="1">1 - Terrible</option>
      </select>
      <textarea name="comment" rows="4" placeholder="Your feedback..." required></textarea>
      <button type="submit">Submit Feedback</button>
    </form>

    <!-- Feedback List -->
    <?php
      include 'includes/db.php';
      $result = $conn->query("SELECT * FROM feedback ORDER BY date_submitted DESC");

      while ($row = $result->fetch_assoc()) {
        echo "<div class='feedback-card'>";
        echo "<div class='nickname'>{$row['nickname']} (Rating: {$row['rating']}/5)</div>";
        echo "<div class='date'>Submitted on: {$row['date_submitted']}</div>";
        echo "<p>{$row['comment']}</p>";
        echo "</div>";
      }
    ?>
  </div>
</body>
</html>
