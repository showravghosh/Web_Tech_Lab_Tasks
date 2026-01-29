<?php
session_start();

// Redirect if not logged in
if(!isset($_SESSION['username'])){
    header('Location: login.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Dashboard - Tech Community Portal</title>
<style>
body {
    font-family: Arial, sans-serif;
    background-color: rgb(240,242,245);
    margin: 0;
    padding: 0;
}
.container {
    width: 80%;
    max-width: 700px;
    margin: 50px auto;
    background: white;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0,0,0,0.1);
    text-align: center;
}
a.button {
    display: inline-block;
    margin: 10px;
    padding: 10px 15px;
    background-color: rgb(76,175,80);
    color: white;
    text-decoration: none;
    border-radius: 5px;
}
a.button:hover {
    background-color: rgb(56,142,60);
}
</style>
</head>
<body>

<div class="container">
    <h2>Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h2>
    <p>Login Time: <?php echo $_SESSION['login_time']; ?></p>
    <p>User Role: <?php echo $_SESSION['user_role']; ?></p>

    <a class="button" href="profile.php">View Profile</a>
    <a class="button" href="logout.php">Logout</a>
</div>

</body>
</html>
