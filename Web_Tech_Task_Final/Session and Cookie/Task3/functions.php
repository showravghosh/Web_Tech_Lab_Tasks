<?php
session_start();

// Increment total visits (cookie)
if(isset($_COOKIE['total_visits'])){
    $total_visits = $_COOKIE['total_visits'] + 1;
} else {
    $total_visits = 1;
}
setcookie('total_visits', $total_visits, time() + 365*24*60*60); // 1 year

// Unique visitor detection
if(!isset($_COOKIE['first_visit'])){
    setcookie('first_visit', date('Y-m-d H:i:s'), time() + 365*24*60*60);
}

// Track last 5 visits
$visit_history = isset($_COOKIE['visit_history']) ? json_decode($_COOKIE['visit_history'], true) : [];
$visit_history[] = date('Y-m-d H:i:s');
if(count($visit_history) > 5){
    array_shift($visit_history); // keep last 5
}
setcookie('visit_history', json_encode($visit_history), time() + 365*24*60*60);

// Track session page visits
if(!isset($_SESSION['pages_visited'])){
    $_SESSION['pages_visited'] = [];
}
$current_page = basename($_SERVER['PHP_SELF']);
$_SESSION['pages_visited'][] = $current_page;

// Session duration
if(!isset($_SESSION['start_time'])){
    $_SESSION['start_time'] = time();
}
$session_duration = time() - $_SESSION['start_time'];

// Calculate visits in last 24 hours
$visits_24h = 0;
$all_visits = isset($_COOKIE['all_visits']) ? json_decode($_COOKIE['all_visits'], true) : [];
$all_visits[] = time();
$cutoff = time() - 24*60*60;
$visits_24h = count(array_filter($all_visits, fn($t)=>$t >= $cutoff));
setcookie('all_visits', json_encode($all_visits), time() + 365*24*60*60);

// Clear history
if(isset($_GET['clear'])){
    setcookie('total_visits', '', time() - 3600);
    setcookie('first_visit', '', time() - 3600);
    setcookie('visit_history', '', time() - 3600);
    setcookie('all_visits', '', time() - 3600);
    $_SESSION['pages_visited'] = [];
    header("Location: index.php");
    exit;
}
?>
