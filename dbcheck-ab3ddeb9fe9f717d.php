<?php
// Temporary diagnostic page. Delete after use.
header('Content-Type: text/plain; charset=utf-8');
require_once __DIR__ . '/includes/env.php';

$envPath = __DIR__ . '/.env';
echo "PHP version: " . PHP_VERSION . "\n";
echo "Script folder: " . __DIR__ . "\n";
echo ".env exists: " . (file_exists($envPath) ? 'yes' : 'NO') . "\n";
echo ".env readable: " . (is_readable($envPath) ? 'yes' : 'NO') . "\n";

$similar = array_values(array_filter(scandir(__DIR__), function ($f) {
    return stripos($f, 'env') !== false;
}));
echo "Files with 'env' in name here: " . implode(', ', $similar) . "\n\n";

loadEnv($envPath);

function mask($v)
{
    if ($v === null || $v === '') {
        return '(missing)';
    }
    return substr($v, 0, 3) . str_repeat('*', max(strlen($v) - 3, 0)) . ' (' . strlen($v) . ' chars)';
}

$host = env('DB_HOST', 'localhost');
$user = env('DB_USER', '');
$pass = env('DB_PASSWORD', '');
$name = env('DB_NAME', '');

echo "DB_HOST: " . $host . "\n";
echo "DB_USER: " . mask($user) . "\n";
echo "DB_PASSWORD: " . ($pass === '' ? '(missing)' : strlen($pass) . ' chars') . "\n";
echo "DB_NAME: " . mask($name) . "\n\n";

echo "mysqli extension loaded: " . (extension_loaded('mysqli') ? 'yes' : 'NO') . "\n";
if (!extension_loaded('mysqli') || $user === '' || $name === '') {
    exit;
}

mysqli_report(MYSQLI_REPORT_OFF);
try {
    $m = @new mysqli($host, $user, $pass, $name);
    if ($m->connect_error) {
        echo "CONNECT FAILED: " . $m->connect_error . "\n";
        exit;
    }
} catch (Throwable $e) {
    echo "CONNECT FAILED: " . $e->getMessage() . "\n";
    exit;
}
echo "CONNECTED OK\n\nTables:\n";
$needed = ['contact_submissions', 'email_list', 'course_email'];
$existing = [];
if ($r = $m->query('SHOW TABLES')) {
    while ($row = $r->fetch_row()) {
        $existing[] = $row[0];
    }
}
foreach ($needed as $t) {
    echo "  $t: " . (in_array($t, $existing, true) ? 'exists' : 'MISSING') . "\n";
}
