<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Student Grades</title>
<style>
body {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    background-color: rgb(245,245,245);
    margin:0;
    padding:0;
}
.container {
    width: 900px;
    margin: 50px auto;
    background:white;
    padding:25px 30px;
    border-radius: 12px;
    box-shadow: 0 5px 20px rgba(0,0,0,0.1);
}
h2 {
    text-align:center;
    color: rgb(33,150,243);
    margin-bottom: 25px;
}
nav {
    text-align:center;
    margin-bottom: 20px;
}
nav a {
    margin:0 12px;
    text-decoration:none;
    color: rgb(33,150,243);
    font-weight:bold;
    transition: 0.3s;
}
nav a:hover { color: rgb(30,130,210); }

table {
    width: 100%;
    border-collapse: collapse;
    margin-bottom: 20px;
    font-size: 14px;
}
th, td {
    border: 1px solid rgb(220,220,220);
    padding: 12px;
    text-align: center;
}
th {
    background-color: rgb(33,150,243);
    color: white;
    text-transform: uppercase;
}
tr:nth-child(even) {
    background-color: rgb(245,245,245);
}
.grade-A { background-color: rgb(200,255,200);}
.grade-F { background-color: rgb(255,200,200);}
button {
    padding: 10px 18px;
    background-color: rgb(33,150,243);
    color: white;
    border: none;
    border-radius: 8px;
    cursor: pointer;
    transition: 0.3s;
}
button:hover { background-color: rgb(30,130,210); }
</style>
</head>
<body>
<div class="container">
<h2>All Student Grades</h2>
<nav>
<a href="index.php">Add Student</a>
<a href="results.php">View Results</a>
</nav>

<?php
if(!isset($_SESSION['students']) || count($_SESSION['students'])==0){
    echo "<p>No student records found. Please add students first.</p>";
} else {
    echo "<table>
    <tr>
    <th>Name</th>
    <th>Marks</th>
    <th>Total</th>
    <th>Average</th>
    <th>Grade</th>
    </tr>";
    foreach($_SESSION['students'] as $stu){
        $marks_str = implode(", ", $stu['marks']);
        $grade_class = ($stu['grade']=="A")?"grade-A":(($stu['grade']=="F")?"grade-F":"");
        echo "<tr class='$grade_class'>
        <td>{$stu['name']}</td>
        <td>$marks_str</td>
        <td>{$stu['total']}</td>
        <td>{$stu['average']}</td>
        <td>{$stu['grade']}</td>
        </tr>";
    }
    echo "</table>";
    echo "<form method='post'><button name='clear'>Clear All Results</button></form>";

    if(isset($_POST['clear'])){
        unset($_SESSION['students']);
        header("Location: results.php");
        exit();
    }
}
?>
</div>
</body>
</html>
