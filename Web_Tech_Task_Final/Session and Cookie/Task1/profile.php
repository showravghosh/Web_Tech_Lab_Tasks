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
<title>Profile - Tech Community Portal</title>
<style>
body {
    font-family: Arial, sans-serif;
    background-color: rgb(240,242,245);
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
p {
    font-size: 16px;
    margin: 8px 0;
}
a.button {
    display: block;
    margin-top: 15px;
    padding: 10px 15px;
    background-color: rgb(76,175,80);
    color: white;
    text-decoration: none;
    text-align: center;
    border-radius: 5px;
}
a.button:hover {
    background-color: rgb(56,142,60);
}
</style>
</head>
<body>

<div class="container">
    <h2>User Profile</h2>
    <p><strong>Username:</strong> <?php echo htmlspecialchars($_SESSION['username']); ?></p>
    <p><strong>Login Time:</strong> <?php echo $_SESSION['login_time']; ?></p>
    <p><strong>User Role:</strong> <?php echo $_SESSION['user_role']; ?></p>

    <a class="button" href="dashboard.php">Back to Dashboard</a>
    <a class="button" href="logout.php">Logout</a>
</div>

</body>
</html>
