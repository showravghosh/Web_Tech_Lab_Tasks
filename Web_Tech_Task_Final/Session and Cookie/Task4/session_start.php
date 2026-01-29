<?php
// Start the session
session_start();

// Set a sample username if not already set
if(!isset($_SESSION['username'])){
    $_SESSION['username'] = "John Doe";
}

// Track visits
if(isset($_SESSION['visits'])){
    $_SESSION['visits'] += 1;
} else {
    $_SESSION['visits'] = 1;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Session Tracking</title>
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
        <h2>Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h2>
        <p>You have visited this page <strong><?php echo $_SESSION['visits']; ?></strong> times in this session.</p>
        <a href="session_destroy.php">End Session</a>
    </div>
</body>
</html>
