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
if (!is_array($data)) {
    http_response_code(400);
    exit;
}

// Single-line, length-limited text (keeps newlines out of the email body/headers)
function clean_field($value, int $max = 200): string
{
    $value = is_string($value) ? $value : '';
    $value = trim(preg_replace('/\s+/', ' ', $value));
    return function_exists('mb_substr') ? mb_substr($value, 0, $max) : substr($value, 0, $max);
}

$name     = clean_field($data['name'] ?? '', 60);
$email    = clean_field($data['email'] ?? '', 120);
$source   = clean_field($data['source'] ?? 'Website Chatbot', 60);
$concern  = clean_field($data['concern'] ?? '');
$duration = clean_field($data['duration'] ?? '');
$therapy  = clean_field($data['therapy'] ?? '');
$page     = clean_field($data['page'] ?? '', 120);

// Basic validation
if ($name === '' || $email === '' || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    http_response_code(400);
    exit;
}

$adminEmail = env('MAIL_ADMIN', 'contact@kenshoproject.com');
$fromHeader = env('MAIL_FROM', 'no-reply@kenshoproject.com');

// Email content
$subject = "New Chatbot Lead - $name - Kensho Project";

$message = "
New lead received from the website chatbot:

Name              : $name
Email             : $email
What brings them  : " . ($concern ?: 'N/A') . "
How long          : " . ($duration ?: 'N/A') . "
Therapy before    : " . ($therapy ?: 'N/A') . "

Source : $source
Page   : " . ($page ?: 'N/A') . "
Date   : " . date("d/m/y H:i:s") . "
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
