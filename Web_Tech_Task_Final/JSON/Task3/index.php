<?php
$students = [];
if(file_exists('students.json')){
    $jsonData = file_get_contents('students.json');
    if($jsonData){
        $students = json_decode($jsonData, true);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Student Records</title>
<style>
body {
    font-family: Arial, sans-serif; 
    background-color: rgb(240,242,245);
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
}
table {
    width: 100%; 
    border-collapse: collapse; 
    margin-top: 20px;
}
th, td {
    border: 1px solid rgb(200,200,200); 
    padding: 8px; text-align: left;
}
th {
    background-color: rgb(220,220,220);
}
a.button {
    display: inline-block;
    margin-top: 15px; 
    padding: 10px 15px; 
    background-color: rgb(76,175,80); 
    color: white; 
    text-decoration: none; 
    border-radius: 5px;
}
a.button:hover {
    background-color: rgb(56,142,60);
}
.message {
    color: red; 
    font-weight: bold; 
    margin-top: 20px;
    }
</style>
</head>
<body>

<div class="container">
    <h2>Student Records</h2>
    <a class="button" href="add_student.php">Add New Student</a>

    <?php if(!$students): ?>
        <div class="message">No student records found.</div>
    <?php else: ?>
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Department</th>
        </tr>
        <?php foreach($students as $s): ?>
        <tr>
            <td><?php echo htmlspecialchars($s['id']); ?></td>
            <td><?php echo htmlspecialchars($s['name']); ?></td>
            <td><?php echo htmlspecialchars($s['email']); ?></td>
            <td><?php echo htmlspecialchars($s['department']); ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
    <?php endif; ?>
</div>

</body>
</html>
