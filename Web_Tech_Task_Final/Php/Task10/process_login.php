<?php
session_start();
$valid_username = "student";
$valid_password = "aiub123";

$username = isset($_POST['username']) ? trim($_POST['username']) : "";
$password = isset($_POST['password']) ? $_POST['password'] : "";
$remember = isset($_POST['remember']) ? true : false;

if($username === $valid_username && $password === $valid_password){
    $_SESSION['username'] = $username;
    $_SESSION['login_time'] = date("Y-m-d H:i:s");

    if($remember){
        setcookie("username", $username, time()+7*24*60*60);
    } else {
        if(isset($_COOKIE['username'])){
            setcookie("username", "", time()-3600);
        }
    }
    header("Location: dashboard.php");
    exit();
} else {
    echo "<!DOCTYPE html>
    <html lang='en'>
    <head>
    <meta charset='UTF-8'>
    <title>Login Failed</title>
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
        h2 {color: rgb(200,0,0);}
        a {color: rgb(0,123,255); text-decoration: none;}
        a:hover {text-decoration: underline;}
    </style>
    </head>
    <body>
    <div class='container'>
        <h2>Login Failed!</h2>
        <p>Invalid username or password.</p>
        <a href='login.php'>Back to Login</a>
    </div>
    </body>
    </html>";
}
?>
