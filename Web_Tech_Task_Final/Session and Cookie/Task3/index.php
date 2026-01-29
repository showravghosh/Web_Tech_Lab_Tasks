<?php include 'functions.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Dashboard</title>
<link rel="stylesheet" href="style.css">
</head>
<body>

<header>
    <h1>Blog Analytics Dashboard</h1>
</header>

<nav>
    <a href="index.php">Home</a>
    <a href="about.php">About</a>
    <a href="services.php">Services</a>
    <a href="contact.php">Contact</a>
</nav>

<div class="container">
    <h2>Visitor Statistics</h2>
    <div class="stats">
        <p><strong>Total Visits:</strong> <?php echo $total_visits; ?></p>
        <p><strong>First Visit:</strong> <?php echo isset($_COOKIE['first_visit']) ? $_COOKIE['first_visit'] : 'N/A'; ?></p>
        <p><strong>Last 5 Visits:</strong> 
            <?php echo !empty($visit_history) ? implode(', ', $visit_history) : 'No history'; ?>
        </p>
        <p><strong>Visits in last 24 hours:</strong> <?php echo $visits_24h; ?></p>
        <p><strong>Session Duration:</strong> <?php echo gmdate("H:i:s", $session_duration); ?></p>
        <p><strong>Pages visited this session:</strong> <?php echo implode(', ', $_SESSION['pages_visited']); ?></p>
    </div>
    <form method="get">
        <button name="clear">Clear History</button>
    </form>
</div>

</body>
</html>
