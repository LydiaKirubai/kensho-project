<?php

/**
 * Handles POST forms on the home page (newsletter + contact). Sets $success / $error.
 */
$success = '';
$error = '';

if (($_SERVER['REQUEST_METHOD'] ?? '') !== 'POST') {
    return;
}

require_once __DIR__ . '/db.php';
$conn = db_connect();
if (!$conn) {
    $error = 'Unable to save your submission right now. Please try again later.';
    return;
}

$formType = $_POST['form_type'] ?? '';

if ($formType === 'contact') {
    $firstName = trim($_POST['first_name'] ?? '');
    $lastName = trim($_POST['last_name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $subject = trim($_POST['subject'] ?? '');
    $message = trim($_POST['message'] ?? '');

    if ($firstName && $lastName && $email && $subject && $message) {
        $fullName = $firstName . ' ' . $lastName;
        $stmt = $conn->prepare('INSERT INTO contact_submissions (name, email, subject, message) VALUES (?, ?, ?, ?)');
        if ($stmt) {
            $stmt->bind_param('ssss', $fullName, $email, $subject, $message);
            if ($stmt->execute()) {
                $success = 'Your message has been sent successfully.';
            } else {
                $error = 'Database error: ' . $conn->error;
            }
            $stmt->close();
        } else {
            $error = 'Database error: ' . $conn->error;
        }
    } else {
        $error = 'All fields are required.';
    }
} elseif ($formType === 'freeguide') {
    $email = trim($_POST['email'] ?? '');

    if (!empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $stmt = $conn->prepare('INSERT INTO email_list (email) VALUES (?)');
        if ($stmt) {
            $stmt->bind_param('s', $email);
            if ($stmt->execute()) {
                $success = "You're in! We will send you the free guide shortly.";
            } else {
                $error = 'Database error: ' . $conn->error;
            }
            $stmt->close();
        } else {
            $error = 'Database error: ' . $conn->error;
        }
    } else {
        $error = 'Please enter a valid email address.';
    }
}
