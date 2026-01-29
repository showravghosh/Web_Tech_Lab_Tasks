<?php
// Part A: PHP Array to JSON
$student = [
    "name" => "Showrav Ghosh",
    "id" => "101",
    "department" => "Computer Science",
    "email" => "showrav@example.com"
];
$student_json = json_encode($student, JSON_PRETTY_PRINT);

// Part B: JSON to PHP Array
$decoded_student = json_decode($student_json, true);

// Part C: Nested JSON
$students = [
    [
        "name" => "Shifat Hasan",
        "id" => "101",
        "courses" => ["Programming", "Calculus", "Physics"]
    ],
    [
        "name" => "Pranto Kumar",
        "id" => "102",
        "courses" => ["Mathematics", "Biology", "Chemistry"]
    ],
    [
        "name" => "Monish Paul",
        "id" => "103",
        "courses" => ["English", "History", "Geography"]
    ]
];
$students_json = json_encode($students, JSON_PRETTY_PRINT);
$decoded_students = json_decode($students_json, true);
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Student JSON Lab</title>
<style>
body {
    font-family: Arial, sans-serif;
    background-color: rgb(240,242,245);
    margin: 0;
    padding: 0;
}
.container {
    width: 90%;
    max-width: 800px;
    margin: 30px auto;
    background: white;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0,0,0,0.1);
}
h2 {
    text-align: center;
    margin-bottom: 20px;
}
pre {
    background-color: rgb(230,230,230);
    padding: 10px;
    border-radius: 5px;
    overflow-x: auto;
}
ul {
    list-style-type: square;
    padding-left: 20px;
}
table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 15px;
}
th, td {
    border: 1px solid rgb(200,200,200);
    padding: 8px;
    text-align: left;
}
th {
    background-color: rgb(220,220,220);
}
</style>
</head>
<body>

<div class="container">
    <h2>Part A: PHP Array to JSON</h2>
    <pre><?php echo $student_json; ?></pre>

    <h2>Part B: JSON to PHP Array</h2>
    <ul>
        <li><strong>Name:</strong> <?php echo htmlspecialchars($decoded_student['name']); ?></li>
        <li><strong>ID:</strong> <?php echo htmlspecialchars($decoded_student['id']); ?></li>
        <li><strong>Department:</strong> <?php echo htmlspecialchars($decoded_student['department']); ?></li>
        <li><strong>Email:</strong> <?php echo htmlspecialchars($decoded_student['email']); ?></li>
    </ul>

    <h2>Part C: Nested JSON</h2>
    <h3>JSON Output:</h3>
    <pre><?php echo $students_json; ?></pre>

    <h3>Decoded Nested Data:</h3>
    <?php foreach($decoded_students as $s): ?>
        <h4><?php echo htmlspecialchars($s['name']); ?> (ID: <?php echo htmlspecialchars($s['id']); ?>)</h4>
        <table>
            <tr>
                <th>Course Name</th>
            </tr>
            <?php foreach($s['courses'] as $course): ?>
            <tr>
                <td><?php echo htmlspecialchars($course); ?></td>
            </tr>
            <?php endforeach; ?>
        </table>
    <?php endforeach; ?>
</div>

</body>
</html>
