<?php
if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['theme'])){
    $theme = $_POST['theme'];
    // Set cookie for 1 week
    setcookie('user_theme', $theme, time() + 7*24*60*60, "/");
    // Redirect to read_cookie.php
    header("Location: read_cookie.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Select Theme</title>
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
label {
    display: block;
    margin: 10px 0;
    font-weight: bold;
}
button {
    margin-top: 15px;
    padding: 8px 12px;
    background-color: rgb(33,150,243);
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}
button:hover {
    background-color: rgb(30,130,210);
}
</style>
</head>
<body>
<div class="container">
    <h2>Select Your Preferred Theme</h2>
    <form method="post">
        <label>
            <input type="radio" name="theme" value="Light" required> Light
        </label>
        <label>
            <input type="radio" name="theme" value="Dark" required> Dark
        </label>
        <button type="submit">Save Theme</button>
    </form>
</div>
</body>
</html>
