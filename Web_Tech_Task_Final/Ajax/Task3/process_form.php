<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = isset($_POST['name']) ? trim($_POST['name']) : '';
    $email = isset($_POST['email']) ? trim($_POST['email']) : '';

    if ($name === '') {
        echo "Error: Name is required.";
        exit;
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Error: Invalid email address.";
        exit;
    }

    echo "Success! Hello, " . htmlspecialchars($name) . ". Your email (" . htmlspecialchars($email) . ") has been submitted.";
} else {
    echo "Error: Invalid request.";
}
