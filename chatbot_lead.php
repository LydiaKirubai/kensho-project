<?php
// chatbot_lead.php
// Stores chatbot leads in the database and emails admin when a chat is completed.
//   action=start    -> saves name + email, returns { id, token }
//   action=complete -> adds the answers to that row (or creates one) and emails admin

require_once __DIR__ . '/includes/env.php';
loadEnv(__DIR__ . '/.env');
require_once __DIR__ . '/includes/db.php';

header('Content-Type: application/json');

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

function leads_table(mysqli $conn): bool
{
    return (bool)$conn->query(
        "CREATE TABLE IF NOT EXISTS chatbot_leads (
            id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            name VARCHAR(60) NOT NULL,
            email VARCHAR(120) NOT NULL,
            reason VARCHAR(200) NULL,
            duration VARCHAR(200) NULL,
            therapy_before VARCHAR(200) NULL,
            token CHAR(32) NOT NULL,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4"
    );
}

$action   = ($data['action'] ?? 'complete') === 'start' ? 'start' : 'complete';
$name     = clean_field($data['name'] ?? '', 60);
$email    = clean_field($data['email'] ?? '', 120);
$source   = clean_field($data['source'] ?? 'Website Chatbot', 60);
$concern  = clean_field($data['concern'] ?? '');
$duration = clean_field($data['duration'] ?? '');
$therapy  = clean_field($data['therapy'] ?? '');
$page     = clean_field($data['page'] ?? '', 120);
$leadId   = (int)($data['id'] ?? 0);
$token    = clean_field($data['token'] ?? '', 32);

// Basic validation
if ($name === '' || $email === '' || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    http_response_code(400);
    exit;
}

$conn = db_connect();
if ($conn && !leads_table($conn)) {
    error_log('chatbot_lead: could not create chatbot_leads table: ' . $conn->error);
}

if ($action === 'start') {
    if (!$conn) {
        http_response_code(503);
        echo json_encode(['status' => 'error']);
        exit;
    }
    $newToken = bin2hex(random_bytes(16));
    $stmt = $conn->prepare('INSERT INTO chatbot_leads (name, email, token) VALUES (?, ?, ?)');
    if (!$stmt || !$stmt->bind_param('sss', $name, $email, $newToken) || !$stmt->execute()) {
        error_log('chatbot_lead: insert failed: ' . $conn->error);
        http_response_code(500);
        echo json_encode(['status' => 'error']);
        exit;
    }
    echo json_encode(['status' => 'ok', 'id' => $stmt->insert_id, 'token' => $newToken]);
    exit;
}

// action = complete
if ($conn) {
    $updated = false;
    if ($leadId > 0 && strlen($token) === 32) {
        $stmt = $conn->prepare('UPDATE chatbot_leads SET reason = ?, duration = ?, therapy_before = ? WHERE id = ? AND token = ? AND email = ?');
        if ($stmt && $stmt->bind_param('sssiss', $concern, $duration, $therapy, $leadId, $token, $email) && $stmt->execute()) {
            $updated = $stmt->affected_rows > 0;
        }
    }
    if (!$updated) {
        $newToken = bin2hex(random_bytes(16));
        $stmt = $conn->prepare('INSERT INTO chatbot_leads (name, email, reason, duration, therapy_before, token) VALUES (?, ?, ?, ?, ?, ?)');
        if (!$stmt || !$stmt->bind_param('ssssss', $name, $email, $concern, $duration, $therapy, $newToken) || !$stmt->execute()) {
            error_log('chatbot_lead: insert failed: ' . $conn->error);
        }
    }
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
