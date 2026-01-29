<?php
$name = $email = $subject = $message = "";
$errors = [];
$success = "";
$allowedFileTypes = ['image/jpeg', 'image/png', 'application/pdf'];
$maxFileSize = 2 * 1024 * 1024; // 2 MB
$uploadedFileName = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Retrieve POST data
    $name = trim($_POST['name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $subject = $_POST['subject'] ?? '';
    $message = trim($_POST['message'] ?? '');

    // Validation
    if (empty($name)) $errors[] = "Name is required.";
    if (empty($email)) {
        $errors[] = "Email is required.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email format.";
    }
    if (empty($subject)) $errors[] = "Subject is required.";
    if (empty($message)) {
        $errors[] = "Message is required.";
    } elseif (strlen($message) < 10) {
        $errors[] = "Message must be at least 10 characters.";
    }

    // File upload check
    if (isset($_FILES['attachment']) && $_FILES['attachment']['error'] !== 4) { // 4 = no file
        $file = $_FILES['attachment'];
        if ($file['error'] !== 0) {
            $errors[] = "Error uploading file.";
        } elseif (!in_array($file['type'], $allowedFileTypes)) {
            $errors[] = "Invalid file type. Only JPG, PNG, PDF allowed.";
        } elseif ($file['size'] > $maxFileSize) {
            $errors[] = "File size exceeds 2 MB limit.";
        } else {
            // Save file to temp folder
            $uploadedFileName = basename($file['name']);
            move_uploaded_file($file['tmp_name'], "uploads/".$uploadedFileName);
        }
    }

    // If no errors, sanitize and show confirmation
    if (empty($errors)) {
        $name_sanitized = htmlspecialchars($name);
        $email_sanitized = htmlspecialchars($email);
        $subject_sanitized = htmlspecialchars($subject);
        $message_sanitized = htmlspecialchars($message);

        $success = "Email sent successfully!";
        // Clear form fields
        $name = $email = $subject = $message = "";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Contact Form</title>
<style>
body {
    font-family: Arial, sans-serif;
    background-color: rgb(245,245,245);
    margin: 0;
    padding: 0;
}
.container {
    width: 500px;
    margin: 50px auto;
    background: white;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0,0,0,0.1);
}
h2 {
    text-align: center;
    margin-bottom: 20px;
}
label {
    display: block;
    margin: 10px 0 5px;
}
input[type="text"], input[type="email"], select, textarea {
    width: 100%;
    padding: 8px;
    margin-bottom: 10px;
    border-radius: 5px;
    border: 1px solid rgb(200,200,200);
    font-size: 14px;
}
textarea {
    height: 100px;
}
button {
    width: 100%;
    padding: 10px;
    background-color: rgb(33,150,243);
    color: white;
    border: none;
    border-radius: 5px;
    font-size: 16px;
    cursor: pointer;
}
button:hover {
    background-color: rgb(30,130,210);
}
.error {
    color: red;
    margin-bottom: 10px;
}
.success {
    color: green;
    margin-bottom: 10px;
}
.submitted-data {
    background-color: rgb(245,245,245);
    padding: 10px;
    border-radius: 5px;
    margin-top: 10px;
}
</style>
</head>
<body>
<div class="container">
    <h2>Contact Us</h2>

    <?php if(!empty($errors)): ?>
        <div class="error">
            <ul>
            <?php foreach($errors as $err): ?>
                <li><?php echo $err; ?></li>
            <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>

    <?php if($success): ?>
        <div class="success"><?php echo $success; ?></div>
        <div class="submitted-data">
            <p><strong>Name:</strong> <?php echo $name_sanitized; ?></p>
            <p><strong>Email:</strong> <?php echo $email_sanitized; ?></p>
            <p><strong>Subject:</strong> <?php echo $subject_sanitized; ?></p>
            <p><strong>Message:</strong> <?php echo $message_sanitized; ?></p>
            <?php if($uploadedFileName): ?>
                <p><strong>Attachment:</strong> <?php echo $uploadedFileName; ?></p>
            <?php endif; ?>
        </div>
    <?php endif; ?>

    <form method="post" action="" enctype="multipart/form-data">
        <label>Name:</label>
        <input type="text" name="name" value="<?php echo htmlspecialchars($name); ?>" required>

        <label>Email:</label>
        <input type="email" name="email" value="<?php echo htmlspecialchars($email); ?>" required>

        <label>Subject:</label>
        <select name="subject" required>
            <option value="">Select Subject</option>
            <option value="General" <?php if($subject=="General") echo 'selected'; ?>>General</option>
            <option value="Support" <?php if($subject=="Support") echo 'selected'; ?>>Support</option>
            <option value="Feedback" <?php if($subject=="Feedback") echo 'selected'; ?>>Feedback</option>
        </select>

        <label>Message:</label>
        <textarea name="message" required><?php echo htmlspecialchars($message); ?></textarea>

        <label>Attachment (optional):</label>
        <input type="file" name="attachment">

        <button type="submit">Send</button>
    </form>
</div>
</body>
</html>
