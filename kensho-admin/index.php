<?php
require_once __DIR__ . '/auth.php';

if (admin_user() !== null) {
    header('Location: dashboard.php');
    exit();
}

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username'] ?? '');
    $password = $_POST['password'] ?? '';
    $conn = db_connect();

    if (!csrf_valid($_POST['csrf'] ?? null)) {
        $error = 'Your session expired. Please try again.';
    } elseif (!$conn) {
        $error = 'Sign-in is temporarily unavailable. Please try again later.';
    } elseif ($username === '' || $password === '') {
        $error = 'Please enter your username and password.';
    } else {
        $row = null;
        $stmt = $conn->prepare('SELECT id, username, password_hash FROM admin_users WHERE username = ? LIMIT 1');
        if ($stmt) {
            $stmt->bind_param('s', $username);
            $stmt->execute();
            $row = $stmt->get_result()->fetch_assoc();
            $stmt->close();
        }

        if ($row && password_verify($password, $row['password_hash'])) {
            session_regenerate_id(true);
            $_SESSION['admin_user'] = $row['username'];
            unset($_SESSION['csrf']);

            $update = $conn->prepare('UPDATE admin_users SET last_login_at = NOW() WHERE id = ?');
            if ($update) {
                $update->bind_param('i', $row['id']);
                $update->execute();
                $update->close();
            }

            header('Location: dashboard.php');
            exit();
        }

        // Slows down password guessing.
        sleep(1);
        $error = 'Invalid username or password.';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="noindex, nofollow">
    <title>Admin Login - Kensho Project</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="icon" type="image/png" href="/my-favicon/favicon-96x96.png" sizes="96x96" />
    <link rel="icon" type="image/svg+xml" href="/my-favicon/favicon.svg" />
    <link rel="shortcut icon" href="/my-favicon/favicon.ico" />
    <style>
        :root {
            --primary: #1B3592;
            --secondary: #0F7EC3;
            --accent: #678C25;
        }

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: 'Segoe UI', sans-serif;
            background: linear-gradient(to right, #e0f0ff, #f9fff0);
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            padding: 20px;
        }

        .login-wrapper {
            background-color: #fff;
            padding: 40px 30px;
            border-radius: 10px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
            text-align: center;
        }

        .logo {
            max-width: 100px;
            margin: 0 auto 20px;
        }

        h2 {
            color: var(--primary);
            margin-bottom: 20px;
            font-size: 22px;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 12px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 6px;
            outline: none;
            font-size: 16px;
        }

        input:focus {
            border-color: var(--secondary);
            box-shadow: 0 0 0 2px #0f7ec324;
        }

        button {
            background-color: var(--primary);
            color: #fff;
            border: none;
            width: 100%;
            padding: 12px;
            font-weight: bold;
            border-radius: 6px;
            cursor: pointer;
            transition: background 0.3s;
            font-size: 16px;
        }

        button:hover {
            background-color: var(--secondary);
        }

        .error {
            color: #c0392b;
            margin-bottom: 15px;
            font-size: 14px;
        }

        @media (max-width: 420px) {
            body {
                padding: 12px;
            }

            .login-wrapper {
                padding: 30px 20px;
            }

            .logo {
                max-width: 80px;
            }

            h2 {
                font-size: 20px;
            }
        }
    </style>
</head>
<body>

<div class="login-wrapper">
    <img src="/assets/img/logo.png" alt="Kensho Project" class="logo">
    <h2>Admin Login</h2>
    <?php if ($error): ?>
        <div class="error"><?= htmlspecialchars($error) ?></div>
    <?php endif; ?>

    <form method="POST" action="">
        <input type="hidden" name="csrf" value="<?= htmlspecialchars(csrf_token()) ?>">
        <input type="text" name="username" placeholder="Username" autocomplete="username" required>
        <input type="password" name="password" placeholder="Password" autocomplete="current-password" required>
        <button type="submit"><i class="fas fa-sign-in-alt"></i> Login</button>
    </form>
</div>

</body>
</html>
