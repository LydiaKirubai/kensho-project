<?php

require_once __DIR__ . '/env.php';

/**
 * Shared MySQL connection. Returns null if misconfigured or connection fails.
 */
function db_connect(): ?mysqli
{
    static $cached = null;
    static $checked = false;

    if ($checked) {
        return $cached;
    }
    $checked = true;

    $root = dirname(__DIR__);
    loadEnv($root . '/.env');

    $host = env('DB_HOST', 'localhost');
    $user = env('DB_USER', '');
    $pass = env('DB_PASSWORD', '');
    $name = env('DB_NAME', '');

    if ($user === '' || $name === '') {
        error_log('db_connect: DB_USER or DB_NAME missing in .env');
        return null;
    }

    // PHP 8.1+ throws on mysqli errors by default; callers expect false/null returns instead.
    mysqli_report(MYSQLI_REPORT_OFF);

    try {
        $mysqli = @new mysqli($host, $user, $pass, $name);
    } catch (Throwable $e) {
        error_log('db_connect: ' . $e->getMessage());
        return null;
    }
    if ($mysqli->connect_error) {
        error_log('db_connect: ' . $mysqli->connect_error);
        return null;
    }
    $mysqli->set_charset('utf8mb4');

    $cached = $mysqli;
    return $cached;
}
