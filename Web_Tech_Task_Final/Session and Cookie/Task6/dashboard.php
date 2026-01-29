<?php
session_start();

// Check if user is logged in
if(!isset($_SESSION['username'])){
    header("Location: login.php");
    exit;
}

// Get username
$username = $_SESSION['username'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Dashboard</title>
<style>
body{
    font-family:Arial,sans-serif;
    background-color:rgb(245,245,245);
}
.container{
    width:400px;
    margin:50px auto;
    background:white;
    padding:20px;
    border-radius:10px;
    box-shadow:0 0 10px rgba(0,0,0,0.1);
    text-align:center;
}
a{
    display:inline-block;
    margin-top:15px;
    padding:8px 12px;
    background-color:rgb(244,67,54);
    color:white;
    text-decoration:none;
    border-radius:5px;
}
a:hover{
    background-color:rgb(211,47,47);
    }
</style>
</head>
<body>
<div class="container">
    <h2>Welcome, <?php echo htmlspecialchars($username); ?>!</h2>
    <?php if(isset($_COOKIE['username'])): ?>
        <p>Your username is remembered via cookie: <?php echo htmlspecialchars($_COOKIE['username']); ?></p>
    <?php else: ?>
        <p>No cookie found for your username.</p>
    <?php endif; ?>
    <a href="logout.php">Logout</a>
</div>
</body>
</html>
