<?php
session_start();
session_unset();
session_destroy();
if(isset($_COOKIE['username'])){
    setcookie("username", "", time()-3600);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Logout</title>
<style>
    body {font-family: Arial, sans-serif; background-color: rgb(240,240,240);}
    .container {
        width: 400px;
        margin: 80px auto;
        background-color: rgb(255,255,255);
        padding: 30px;
        border-radius: 12px;
        box-shadow: 0 0 15px rgba(0,0,0,0.2);
        text-align: center;
    }
    h2 {color: rgb(0,120,0);}
    a {color: rgb(0,123,255); text-decoration: none;}
    a:hover {text-decoration: underline;}
</style>
</head>
<body>
<div class="container">
    <h2>You have been logged out.</h2>
    <p><a href="login.php">Login Again</a></p>
</div>
</body>
</html>
