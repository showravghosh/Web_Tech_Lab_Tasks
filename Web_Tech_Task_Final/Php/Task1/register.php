<?php
$name = $email = $password = $confirm_password = "";
$errors = [];
$success = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Get POST data
    $name = trim($_POST['name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';
    $confirm_password = $_POST['confirm_password'] ?? '';

    // Validation
    if (empty($name)) {
        $errors[] = "Name is required.";
    }
    if (empty($email)) {
        $errors[] = "Email is required.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email format.";
    }
    if (empty($password)) {
        $errors[] = "Password is required.";
    }
    if (empty($confirm_password)) {
        $errors[] = "Confirm Password is required.";
    }
    if ($password && $confirm_password && $password !== $confirm_password) {
        $errors[] = "Passwords do not match.";
    }

    // If no errors, sanitize and show confirmation
    if (empty($errors)) {
        $name_sanitized = htmlspecialchars($name);
        $email_sanitized = htmlspecialchars($email);
        $password_sanitized = htmlspecialchars($password);

        $success = "Registration successful!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>User Registration</title>
<style>
body {
    font-family: Arial, sans-serif;
    background-color: rgb(245,245,245);
    margin: 0;
    padding: 0;
}
.container {
    width: 400px;
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
input[type="text"], input[type="email"], input[type="password"] {
    width: 100%;
    padding: 8px;
    margin-bottom: 10px;
    border-radius: 5px;
    border: 1px solid rgb(200,200,200);
}
button {
    width: 100%;
    padding: 10px;
    background-color: rgb(33,150,243);
    color: white;
    border: none;
    border-radius: 5px;
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
.user-data {
    background-color: rgb(245,245,245);
    padding: 10px;
    border-radius: 5px;
}
</style>
</head>
<body>
<div class="container">
    <h2>User Registration</h2>

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
        <div class="user-data">
            <p><strong>Name:</strong> <?php echo $name_sanitized; ?></p>
            <p><strong>Email:</strong> <?php echo $email_sanitized; ?></p>
            <p><strong>Password:</strong> <?php echo $password_sanitized; ?></p>
        </div>
    <?php else: ?>
        <form method="post" action="">
            <label>Name:</label>
            <input type="text" name="name" value="<?php echo htmlspecialchars($name); ?>">

            <label>Email:</label>
            <input type="email" name="email" value="<?php echo htmlspecialchars($email); ?>">

            <label>Password:</label>
            <input type="password" name="password" value="">

            <label>Confirm Password:</label>
            <input type="password" name="confirm_password" value="">

            <button type="submit">Register</button>
        </form>
    <?php endif; ?>
</div>
</body>
</html>
