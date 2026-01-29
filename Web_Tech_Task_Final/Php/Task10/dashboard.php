<?php
session_start();
if(!isset($_SESSION['username'])){
    header("Location: login.php");
    exit();
}
$username = $_SESSION['username'];
$login_time = $_SESSION['login_time'];
$cookie_username = isset($_COOKIE['username']) ? $_COOKIE['username'] : "Not set";
$session_id = session_id();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Dashboard</title>
<style>
    body {font-family: Arial, sans-serif; background-color: rgb(240,240,240);}
    .container {
        width: 600px;
        margin: 50px auto;
        background-color: rgb(255,255,255);
        padding: 30px;
        border-radius: 12px;
        box-shadow: 0 0 15px rgba(0,0,0,0.2);
    }
    h2 {text-align:center; color: rgb(0,80,200);}
    .info {
        background-color: rgb(245,245,245);
        padding: 15px;
        border-radius: 8px;
        margin-top: 20px;
    }
    p {margin: 10px 0;}
    a {color: rgb(0,123,255); text-decoration: none;}
    a:hover {text-decoration: underline;}
</style>
</head>
<body>
<div class="container">
    <h2>Welcome, <?php echo htmlspecialchars($username); ?>!</h2>
    <div class="info">
        <p><strong>Login Time:</strong> <?php echo $login_time; ?></p>
        <p><strong>Session ID:</strong> <?php echo $session_id; ?></p>
        <p><strong>Cookie Username:</strong> <?php echo htmlspecialchars($cookie_username); ?></p>
    </div>
    <p><a href="logout.php">Logout</a></p>
</div>
</body>
</html>
