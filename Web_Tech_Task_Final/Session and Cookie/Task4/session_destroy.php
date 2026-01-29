<?php
// Start the session
session_start();

// Destroy all session variables
session_unset();
session_destroy();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Session Ended</title>
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
            background-color: rgb(76,175,80);
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }
        a:hover {
            background-color: rgb(56,142,60);
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Session Ended</h2>
        <p>Your session has been successfully destroyed.</p>
        <a href="session_start.php">Start New Session</a>
    </div>
</body>
</html>
