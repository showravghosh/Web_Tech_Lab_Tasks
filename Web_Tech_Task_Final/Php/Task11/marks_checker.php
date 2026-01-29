<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Student Marks Checker</title>
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: rgb(240,240,240);
        margin: 0;
        padding: 0;
    }
    .container {
        width: 400px;
        margin: 80px auto;
        background-color: rgb(255,255,255);
        padding: 30px;
        border-radius: 12px;
        box-shadow: 0 0 15px rgba(0,0,0,0.2);
    }
    h2 {
        text-align: center;
        color: rgb(50,50,50);
    }
    label {
        display: block;
        margin-top: 15px;
        color: rgb(60,60,60);
        font-weight: bold;
    }
    input[type="text"], input[type="number"] {
        width: 100%;
        padding: 10px;
        margin-top: 5px;
        border-radius: 6px;
        border: 1px solid rgb(180,180,180);
    }
    input[type="submit"] {
        width: 100%;
        padding: 12px;
        margin-top: 20px;
        background-color: rgb(0,123,255);
        color: rgb(255,255,255);
        border: none;
        border-radius: 6px;
        cursor: pointer;
        font-size: 16px;
    }
    input[type="submit"]:hover {
        background-color: rgb(0,90,200);
    }
    .result {
        margin-top: 20px;
        padding: 15px;
        border-radius: 6px;
        background-color: rgb(245,245,245);
        font-weight: bold;
        text-align: center;
    }
    .pass {
        color: rgb(0,120,0);
    }
    .fail {
        color: rgb(200,0,0);
    }
</style>
</head>
<body>
<div class="container">
    <h2>Student Marks Checker</h2>
    <form method="post" action="">
        <label for="student_name">Student Name:</label>
        <input type="text" name="student_name" id="student_name" required>

        <label for="marks">Marks:</label>
        <input type="number" name="marks" id="marks" min="0" max="100" required>

        <input type="submit" name="submit" value="Check Result">
    </form>

    <?php
    if(isset($_POST['submit'])){
        $name = htmlspecialchars($_POST['student_name']);
        $marks = floatval($_POST['marks']);

        echo "<div class='result'>";
        echo "Student: <strong>$name</strong><br>";
        echo "Marks: <strong>$marks</strong><br>";

        if($marks >= 50){
            echo "<span class='pass'>Result: Pass ✅</span>";
        } else {
            echo "<span class='fail'>Result: Fail ❌</span>";
        }
        echo "</div>";
    }
    ?>
</div>
</body>
</html>
