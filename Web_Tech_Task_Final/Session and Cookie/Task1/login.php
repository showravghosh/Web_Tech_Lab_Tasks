<?php
session_start();

// If user already logged in, redirect to dashboard
if(isset($_SESSION['username'])){
    header('Location: dashboard.php');
    exit;
}

// Hardcoded credentials
$valid_username = "admin";
$valid_password = "admin123";

$message = "";

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    if($username === $valid_username && $password === $valid_password){
        // Set session variables
        $_SESSION['username'] = $username;
        $_SESSION['login_time'] = date("Y-m-d H:i:s");
        $_SESSION['user_role'] = "Administrator";

        header('Location: dashboard.php');
        exit;
    } else {
        $message = "Invalid username or password!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Login - Tech Community Portal</title>
<style>
body {
    font-family: Arial, sans-serif;
    background-color: rgb(240,242,245);
    margin: 0;
    padding: 0;
}
.container {
    width: 400px;
    margin: 80px auto;
    background: white;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0,0,0,0.1);
}
h2 {
    text-align: center;
    margin-bottom: 20px;
}
input {
    width: 100%;
    padding: 8px;
    margin: 5px 0 15px 0;
    border-radius: 5px;
    border: 1px solid rgb(200,200,200);
}
button {
    width: 100%;
    padding: 10px;
    background-color: rgb(76,175,80);
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}
button:hover {
    background-color: rgb(56,142,60);
}
.message {
    color: red;
    font-weight: bold;
    text-align: center;
    margin-bottom: 15px;
}
</style>
</head>
<body>

<div class="container">
    <h2>Login</h2>
    <?php if($message): ?>
        <div class="message"><?php echo $message; ?></div>
    <?php endif; ?>
    <form method="POST">
        <label>Username</label>
        <input type="text" name="username" required>

        <label>Password</label>
        <input type="password" name="password" required>

        <button type="submit">Login</button>
    </form>
</div>

</body>
</html>
