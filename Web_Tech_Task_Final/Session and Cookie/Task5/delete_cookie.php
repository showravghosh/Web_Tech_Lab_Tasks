<?php
// Delete the cookie by setting expiration in the past
setcookie('user_theme', '', time() - 3600, "/");
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Delete Theme Cookie</title>
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
    text-align: center;
}
a {
    display: inline-block;
    margin-top: 15px;
    padding: 8px 12px;
    background-color: rgb(33,150,243);
    color: white;
    text-decoration: none;
    border-radius: 5px;
}
a:hover {
    background-color: rgb(30,130,210);
}
</style>
</head>
<body>
<div class="container">
    <h2>Cookie Deleted</h2>
    <p>Cookie has been deleted successfully.</p>
    <a href="set_cookie.php">Set New Cookie</a>
</div>
</body>
</html>
