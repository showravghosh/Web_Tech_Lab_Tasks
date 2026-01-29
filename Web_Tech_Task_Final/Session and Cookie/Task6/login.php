<?php
// Check if username cookie exists to pre-fill
$stored_username = isset($_COOKIE['username']) ? $_COOKIE['username'] : '';
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Login Page</title>
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
}
h2 {
    text-align: center;
}
label {
    display: block;
    margin: 10px 0 5px;
}
input[type="text"], input[type="password"] {
    width: 100%;
    padding: 8px;
    margin-bottom: 10px;
    border-radius: 5px;
    border: 1px solid rgb(200,200,200);
}
input[type="checkbox"] {
    margin-right: 5px;
}
button {
    width: 100%;
    padding: 10px;
    background-color: rgb(33,150,243);
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}
button:hover {
    background-color: rgb(30,130,210);
}
.error {
    color: red;
    text-align: center;
    margin-bottom: 10px;
}
</style>
</head>
<body>
<div class="container">
    <h2>Login</h2>
    <form method="post" action="process_login.php">
        <label>Username:</label>
        <input type="text" name="username" value="<?php echo htmlspecialchars($stored_username); ?>" required>

        <label>Password:</label>
        <input type="password" name="password" required>

        <label><input type="checkbox" name="remember"> Remember Me</label>

        <button type="submit">Login</button>
    </form>
</div>
</body>
</html>
