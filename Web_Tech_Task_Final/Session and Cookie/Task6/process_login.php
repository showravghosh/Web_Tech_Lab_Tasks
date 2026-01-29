<?php
session_start();

// Hardcoded credentials
$valid_username = "student";
$valid_password = "aiub123";

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';
    $remember = isset($_POST['remember']);

    if($username === $valid_username && $password === $valid_password){
        // Valid login
        $_SESSION['username'] = $username;

        // Set cookie if Remember Me checked
        if($remember){
            setcookie('username', $username, time() + 7*24*60*60, "/"); // 1 week
        }

        // Redirect to dashboard
        header("Location: dashboard.php");
        exit;
    } else {
        // Invalid login
        echo '<!DOCTYPE html>
        <html lang="en">
        <head>
        <meta charset="UTF-8">
        <title>Login Error</title>

        <style>
        body{
        font-family:Arial,
        sans-serif;background-color:rgb(245,245,245);
        }
        .container{
        width:400px;margin:50px auto;
        background:white;
        padding:20px;
        border-radius:10px;
        text-align:center;
        box-shadow:0 0 10px rgba(0,0,0,0.1);
        }
        a{
        display:inline-block;
        margin-top:15px;
        padding:8px 12px;
        background-color:rgb(33,150,243);
        color:white;
        text-decoration:none;
        border-radius:5px;}
        a:hover{
        background-color:rgb(30,130,210);
        }
        .error{
        color:red;
        }
        </style>

        </head>
        <body>
        <div class="container">
        <h2 class="error">Invalid Username or Password!</h2>
        <a href="login.php">Back to Login</a>
        </div>
        </body>
        </html>';
    }
} else {
    header("Location: login.php");
    exit;
}
