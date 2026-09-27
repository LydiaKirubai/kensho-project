<?php
require_once __DIR__ . '/auth.php';

$_SESSION = [];
session_destroy();
setcookie(session_name(), '', time() - 3600, '/kensho-admin');
header('Location: ./');
exit();
