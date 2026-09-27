<?php

require_once __DIR__ . '/../includes/env.php';
loadEnv(__DIR__ . '/../.env');
require_once __DIR__ . '/../includes/db.php';

header('X-Robots-Tag: noindex, nofollow');
header('X-Frame-Options: DENY');

if (session_status() !== PHP_SESSION_ACTIVE) {
    session_set_cookie_params([
        'path'     => '/kensho-admin',
        'httponly' => true,
        'secure'   => !empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off',
        'samesite' => 'Strict',
    ]);
    session_name('kensho_admin');
    session_start();
}

function admin_user(): ?string
{
    return $_SESSION['admin_user'] ?? null;
}

function require_admin(): void
{
    if (admin_user() === null) {
        header('Location: ./');
        exit();
    }
}

function csrf_token(): string
{
    if (empty($_SESSION['csrf'])) {
        $_SESSION['csrf'] = bin2hex(random_bytes(32));
    }
    return $_SESSION['csrf'];
}

function csrf_valid(?string $token): bool
{
    return is_string($token) && !empty($_SESSION['csrf']) && hash_equals($_SESSION['csrf'], $token);
}
