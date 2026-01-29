<?php
session_start();
if(isset($_SESSION['username'])){
    header("Location: dashboard.php");
    exit();
}
$cookie_username = isset($_COOKIE['username']) ? $_COOKIE['username'] : "";
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Login Page</title>
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: rgb(240, 240, 240);
        margin: 0;
        padding: 0;
    }
    .container {
        width: 400px;
        margin: 80px auto;
        background-color: rgb(255, 255, 255);
        padding: 30px;
        border-radius: 12px;
        box-shadow: 0 0 15px rgba(0,0,0,0.2);
    }
    h2 {
        text-align: center;
        color: rgb(50, 50, 50);
    }
    label {
        display: block;
        margin-top: 15px;
        color: rgb(60, 60, 60);
        font-weight: bold;
    }
    input[type="text"], input[type="password"] {
        width: 100%;
        padding: 10px;
        margin-top: 5px;
        border-radius: 6px;
        border: 1px solid rgb(180,180,180);
    }
    .remember {
        margin-top: 15px;
        color: rgb(80,80,80);
    }
    input[type="submit"] {
        width: 100%;
        padding: 12px;
        margin-top: 20px;
        background-color: rgb(0, 123, 255);
        color: rgb(255,255,255);
        border: none;
        border-radius: 6px;
        cursor: pointer;
        font-size: 16px;
    }
    input[type="submit"]:hover {
        background-color: rgb(0, 90, 200);
    }
</style>
</head>
<body>
<div class="container">
    <h2>User Login</h2>
    <form action="process_login.php" method="post">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" value="<?php echo htmlspecialchars($cookie_username); ?>">

        <label for="password">Password:</label>
        <input type="password" id="password" name="password">

        <div class="remember">
            <label><input type="checkbox" name="remember" value="1"> Remember Me</label>
        </div>

        <input type="submit" value="Login">
    </form>
</div>
</body>
</html>
