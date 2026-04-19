<?php
// chatbot_lead.php
// Receives chatbot leads and emails admin silently

require_once __DIR__ . '/includes/env.php';
loadEnv(__DIR__ . '/.env');

// Allow only POST requests
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    exit;
}

// Read JSON input
$data = json_decode(file_get_contents("php://input"), true);

$name  = trim($data['name'] ?? '');
$email = trim($data['email'] ?? '');
$source = trim($data['source'] ?? 'Website Chatbot');

// Basic validation
if (empty($name) || empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    http_response_code(400);
    exit;
}

$adminEmail = env('MAIL_ADMIN', 'contact@kenshoproject.com');
$fromHeader = env('MAIL_FROM', 'no-reply@kenshoproject.com');

// Email content
$subject = "New Chatbot Lead - Kensho Project";

$message = "
New lead received from the website chatbot:

Name   : $name
Email  : $email
Source : $source
Date   : " . date("Y-m-d H:i:s") . "
IP     : " . ($_SERVER['REMOTE_ADDR'] ?? 'N/A') . "
";

// Headers
$headers  = "From: Kensho Project <" . $fromHeader . ">\r\n";
$headers .= "Reply-To: $email\r\n";
$headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

// Send email
@mail($adminEmail, $subject, $message, $headers);

// Success response (silent)
http_response_code(200);
echo json_encode(["status" => "ok"]);
