<?php
session_start();
require_once __DIR__ . '/includes/env.php';
loadEnv(__DIR__ . '/.env');
require_once __DIR__ . '/includes/db.php';

$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $conn = db_connect();
    if (!$conn) {
        $error = "Sign-in is temporarily unavailable. Please try again later.";
    } else {
        $username = trim($_POST["username"]);
        $password = trim($_POST["password"]);

        $stmt = $conn->prepare("SELECT * FROM users WHERE username=? AND password=MD5(?)");
        $stmt->bind_param("ss", $username, $password);
        $stmt->execute();
        $res = $stmt->get_result();

        if ($res->num_rows === 1) {
            $_SESSION['username'] = $username;
            header("Location: dashboard.php");
            exit();
        } else {
            $error = "Invalid username or password.";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login - Kensho Project</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="icon" type="image/png" href="assets/favicon.png">
    
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
        }

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', sans-serif;
            background: linear-gradient(to right, #e0f0ff, #f9fff0);
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
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
            margin-bottom: 10px;
            font-size: 22px;
        }

        .earthy-message {
            color: var(--accent);
            font-size: 15px;
            margin-bottom: 20px;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 12px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 6px;
            outline: none;
            font-size: 15px;
        }

        input[type="text"]:focus,
        input[type="password"]:focus {
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
            color: red;
            margin-bottom: 15px;
            font-size: 14px;
        }

        .earth-icons {
            margin-top: 20px;
            color: var(--accent);
        }

        .earth-icons i {
            margin: 0 8px;
            font-size: 20px;
        }

        /* Responsive Tweak */
        @media (max-width: 480px) {
            .login-wrapper {
                padding: 30px 20px;
            }

            .logo {
                max-width: 80px;
            }

            h2 {
                font-size: 20px;
            }

            input,
            button {
                font-size: 14px;
            }

            .earth-icons i {
                font-size: 18px;
            }
        }
    </style>
</head>
<body>

<div class="login-wrapper">
    <!-- Logo -->
    <img src="assets/img/logo.png" alt="Logo" class="logo">

    <h2>Welcome Back</h2>
    <p class="earthy-message"><i class="fas fa-seedling"></i> Admin Login Page.</p>

    <?php if ($error): ?>
        <div class="error"><?php echo $error; ?></div>
    <?php endif; ?>

    <form method="POST" action="">
        <input type="text" name="username" placeholder="Username" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit"><i class="fas fa-sign-in-alt"></i> Login</button>
    </form>

    <div class="earth-icons">
        <i class="fas fa-tree" title="Nature aligned"></i>
        <i class="fas fa-mountain" title="Inner strength"></i>
        <i class="fas fa-water" title="Flow and calm"></i>
        <i class="fas fa-leaf" title="Growth and healing"></i>
    </div>
</div>

</body>
</html>
