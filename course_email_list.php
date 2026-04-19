<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

require_once __DIR__ . '/includes/env.php';
loadEnv(__DIR__ . '/.env');
require_once __DIR__ . '/includes/db.php';

$conn = db_connect();
$result = null;
if ($conn) {
    $result = $conn->query("SELECT * FROM course_email ORDER BY submitted_at DESC");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Course Email Signups - Kensho Admin</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
  <style>
    :root {
      --primary: #1B3592;
      --secondary: #0F7EC3;
      --accent: #678C25;
    }

    body {
      font-family: 'Segoe UI', sans-serif;
      background-color: #f9fff4;
      margin: 0;
    }

    .header {
      background-color: var(--primary);
      color: white;
      padding: 20px;
      display: flex;
      justify-content: space-between;
      flex-wrap: wrap;
      gap: 10px;
    }

    .header a {
      color: white;
      text-decoration: none;
      font-weight: bold;
      background-color: var(--secondary);
      padding: 8px 14px;
      border-radius: 6px;
      transition: background 0.3s;
    }

    .header a:hover {
      background-color: #0c6ead;
    }

    .container {
      max-width: 800px;
      margin: 30px auto;
      background: #fff;
      padding: 25px;
      border-radius: 10px;
      box-shadow: 0 8px 16px rgba(0, 0, 0, 0.05);
    }

    h2 {
      color: var(--primary);
      margin-bottom: 20px;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 10px;
    }

    th, td {
      padding: 14px;
      border-bottom: 1px solid #ddd;
      text-align: left;
    }

    th {
      background-color: #e6f0ea;
      color: var(--accent);
    }

    tr:hover {
      background-color: #f9f9f9;
    }

    @media (max-width: 768px) {
      .container {
        margin: 20px;
        padding: 15px;
      }

      table, thead, tbody, th, td, tr {
        display: block;
        width: 100%;
      }

      thead {
        display: none;
      }

      tr {
        margin-bottom: 15px;
        border: 1px solid #ccc;
        border-radius: 8px;
        padding: 10px;
        background: #fdfdfd;
      }

      td {
        padding: 10px 5px;
        text-align: left;
        position: relative;
      }

      td::before {
        content: attr(data-label);
        font-weight: bold;
        display: block;
        margin-bottom: 5px;
        color: var(--accent);
      }
    }
  </style>
</head>
<body>

<div class="header">
  <div><i class="fas fa-book-open"></i> Course Email Signups</div>
  <div>
    <a href="dashboard.php"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
    <a href="emails.php" class="emails-btn"><i class="fas fa-envelope-open-text"></i> Free Guide Emails</a>
    <a href="logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a>
  </div>
</div>

<div class="container">
  <h2><i class="fas fa-envelope-open-text"></i> Emails Interested in Courses</h2>

  <table>
    <thead>
      <tr>
        <th>Email</th>
        <th>Submitted At</th>
      </tr>
    </thead>
    <tbody>
      <?php if ($result): while ($row = $result->fetch_assoc()): ?>
        <tr>
          <td data-label="Email"><?= htmlspecialchars($row['email']) ?></td>
          <td data-label="Submitted At"><?= htmlspecialchars((string)($row['submitted_at'] ?? '')) ?></td>
        </tr>
      <?php endwhile; else: ?>
        <tr><td colspan="2">Could not load emails. Check database configuration in <code>.env</code>.</td></tr>
      <?php endif; ?>
    </tbody>
  </table>
</div>

</body>
</html>
