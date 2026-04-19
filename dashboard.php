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
    $result = $conn->query("SELECT * FROM contact_submissions ORDER BY id DESC");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Kensho Project</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    
        <!-- Favicon -->
    <link rel="icon" type="image/png" href="/my-favicon/favicon-96x96.png" sizes="96x96" />
    <link rel="icon" type="image/svg+xml" href="/my-favicon/favicon.svg" />
    <link rel="shortcut icon" href="/my-favicon/favicon.ico" />
    <link rel="apple-touch-icon" sizes="180x180" href="/my-favicon/apple-touch-icon.png" />
    <meta name="apple-mobile-web-app-title" content="Kensho Project" />
    <link rel="manifest" href="/my-favicon/site.webmanifest" />
    
    <style>
        :root {
            --primary: #1B3592;
            --secondary: #0F7EC3;
            --accent: #678C25;
            --bg: #f6fdf6;
        }

        body {
            margin: 0;
            font-family: 'Segoe UI', sans-serif;
            background-color: var(--bg);
            color: #333;
        }

        .header {
            background-color: var(--primary);
            color: white;
            padding: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .header h1 {
            margin: 0;
            font-size: 24px;
        }

        .header .nav-buttons a {
            background: var(--secondary);
            color: white;
            border: none;
            padding: 10px 16px;
            border-radius: 6px;
            text-decoration: none;
            font-weight: bold;
            margin-left: 10px;
            transition: background 0.3s;
        }

        .header .nav-buttons a:hover {
            background-color: #0c6ead;
        }

        .header .nav-buttons a.emails-btn {
            background-color: var(--accent);
        }

        .header .nav-buttons a.emails-btn:hover {
            background-color: #55771d;
        }

        .dashboard {
            max-width: 1000px;
            margin: 30px auto;
            padding: 20px;
            background: white;
            border-radius: 12px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.05);
        }

        .dashboard h2 {
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

        .icon-row {
            margin-bottom: 10px;
            color: var(--accent);
        }

        .icon-row i {
            margin-right: 8px;
        }

        .footer-message {
            margin-top: 30px;
            text-align: center;
            color: var(--accent);
            font-size: 14px;
        }
        @media (max-width: 768px) {
    .header {
        flex-direction: column;
        align-items: flex-start;
        gap: 10px;
    }

    .dashboard {
        margin: 20px;
        padding: 15px;
    }

    table, thead, tbody, th, td, tr {
        display: block;
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
    <h1><i class="fas fa-leaf"></i> Kensho Admin Dashboard</h1>
    <div class="nav-buttons">
        <a href="emails.php" class="emails-btn"><i class="fas fa-envelope-open-text"></i> Free Guide Emails</a>
        <a href="course_email_list.php" class="emails-btn"><i class="fas fa-envelope-open-text"></i> Course Notify Emails</a>
        <a href="logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a>
    </div>
</div>

<div class="dashboard">
    <h2><i class="fas fa-inbox"></i> Contact Submissions</h2>

    <table>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Subject</th>
            <th>Message</th>
            <th>Submitted At</th>
        </tr>
        <?php if ($result): while ($row = $result->fetch_assoc()): ?>
            <tr>
                <td data-label="Name"><?= htmlspecialchars($row['name']) ?></td>
                <td data-label="Email"><?= htmlspecialchars($row['email']) ?></td>
                <td data-label="Subject"><?= htmlspecialchars($row['subject']) ?></td>
                <td data-label="Message"><?= nl2br(htmlspecialchars($row['message'])) ?></td>
                <td data-label="Submitted At"><?= htmlspecialchars((string)($row['created_at'] ?? '')) ?></td>
            </tr>
        <?php endwhile; else: ?>
            <tr><td colspan="5">Could not load submissions. Check database configuration in <code>.env</code>.</td></tr>
        <?php endif; ?>
    </table>

</div>

</body>
</html>
