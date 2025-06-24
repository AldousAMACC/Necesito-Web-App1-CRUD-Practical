CREATE DATABASE IF NOT EXISTS cafe_feedback;
USE cafe_feedback;

CREATE TABLE feedback (
    feedback_id INT AUTO_INCREMENT PRIMARY KEY,
    nickname VARCHAR(50) NOT NULL,
    rating INT CHECK (rating BETWEEN 1 AND 5),
    comment TEXT NOT NULL,
    date_submitted DATETIME DEFAULT CURRENT_TIMESTAMP
);
