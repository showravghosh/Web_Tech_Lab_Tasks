<?php
session_start();

// Destroy session
session_unset();
session_destroy();

// Optionally delete username cookie
if(isset($_COOKIE['username'])){
    setcookie('username', '', time() - 3600, "/");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Logged Out</title>
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
    background-color:rgb(33,150,243);
    color:white;
    text-decoration:none;
    border-radius:5px;
}
a:hover{
    background-color:rgb(30,130,210);
    }
</style>
</head>
<body>
<div class="container">
    <h2>You have been logged out.</h2>
    <a href="login.php">Login Again</a>
</div>
</body>
</html>
