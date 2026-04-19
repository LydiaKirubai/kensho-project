<?php
header("Content-Type: text/plain");

require_once __DIR__ . '/includes/env.php';
loadEnv(__DIR__ . '/.env');
require_once __DIR__ . '/includes/db.php';

$conn = db_connect();

if (!$conn) {
  http_response_code(500);
  echo "Database connection failed.";
  exit();
}

// Get the email from the POST request
$email = $_POST['email'] ?? '';

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  http_response_code(400);
  echo "Invalid email address.";
  exit();
}

// Prepare and insert into course_email table
$stmt = $conn->prepare("INSERT IGNORE INTO course_email (email) VALUES (?)");

if (!$stmt) {
  http_response_code(500);
  echo "Database error.";
  exit();
}

$stmt->bind_param("s", $email);

if ($stmt->execute()) {
  echo "Thanks! You’ll be notified.";
} else {
  http_response_code(500);
  echo "Something went wrong. Try again later.";
}

$stmt->close();
?>
