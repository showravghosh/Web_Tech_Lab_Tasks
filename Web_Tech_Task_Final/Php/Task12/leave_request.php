<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Employee Leave Request</title>
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: rgb(235,235,235);
        margin: 0;
        padding: 0;
    }
    .container {
        width: 450px;
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
        font-weight: bold;
        color: rgb(60,60,60);
    }
    input[type="text"], input[type="number"], select {
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
    .approved {
        color: rgb(0,120,0);
    }
    .pending {
        color: rgb(200,0,0);
    }
</style>
</head>
<body>
<div class="container">
    <h2>Employee Leave Request</h2>
    <form method="post" action="">
        <label for="employee_name">Employee Name:</label>
        <input type="text" name="employee_name" id="employee_name" required>

        <label for="department">Department:</label>
        <select name="department" id="department" required>
            <option value="">--Select Department--</option>
            <option value="HR">HR</option>
            <option value="IT">IT</option>
            <option value="Finance">Finance</option>
            <option value="Marketing">Marketing</option>
        </select>

        <label for="leave_days">Number of Leave Days:</label>
        <input type="number" name="leave_days" id="leave_days" min="1" required>

        <input type="submit" name="submit" value="Submit Request">
    </form>

    <?php
    if(isset($_POST['submit'])){
        $name = htmlspecialchars($_POST['employee_name']);
        $department = htmlspecialchars($_POST['department']);
        $leave_days = intval($_POST['leave_days']);

        echo "<div class='result'>";
        echo "Employee: <strong>$name</strong><br>";
        echo "Department: <strong>$department</strong><br>";
        echo "Leave Days Requested: <strong>$leave_days</strong><br>";

        if($leave_days <= 5){
            echo "<span class='approved'>Leave Status: Approved ✅</span>";
        } else {
            echo "<span class='pending'>Leave Status: Pending Approval ⏳</span>";
        }

        echo "</div>";
    }
    ?>
</div>
</body>
</html>
