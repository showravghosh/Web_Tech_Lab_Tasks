<?php
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $id = intval($_POST['id']);
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $department = trim($_POST['department']);

    $students = [];
    if(file_exists('students.json')){
        $jsonData = file_get_contents('students.json');
        if($jsonData) $students = json_decode($jsonData, true);
    }

    $students[] = [
        "id" => $id,
        "name" => $name,
        "email" => $email,
        "department" => $department
    ];

    file_put_contents('students.json', json_encode($students, JSON_PRETTY_PRINT));
    header('Location: index.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Add Student</title>
<style>
body {
    font-family: Arial, sans-serif; 
    background-color: rgb(240,242,245);
}
.container 
{width: 400px; 
margin: 50px auto; 
background: white; 
padding: 20px; 
border-radius: 10px; 
box-shadow: 0 0 10px rgba(0,0,0,0.1);
}
h2 {
    text-align: center;
}
input {
    width: 100%; 
    padding: 8px; 
    margin: 5px 0 15px 0; 
    border-radius: 5px; 
    border: 1px solid rgb(200,200,200);
}
button {
    width: 100%; 
    padding: 10px; 
    background-color: rgb(76,175,80); 
    color: white; border: none; 
    border-radius: 5px; 
    cursor: pointer;
}
button:hover {
    background-color: rgb(56,142,60);
}
a {
    display: block; 
    margin-top: 10px; 
    text-align: center; 
    text-decoration: none; 
    color: rgb(76,175,80);
    }
</style>
</head>
<body>

<div class="container">
    <h2>Add Student</h2>
    <form method="POST">
        <label>ID</label>
        <input type="number" name="id" required>

        <label>Name</label>
        <input type="text" name="name" required>

        <label>Email</label>
        <input type="email" name="email" required>

        <label>Department</label>
        <input type="text" name="department" required>

        <button type="submit">Add Student</button>
    </form>
    <a href="index.php">Back to Records</a>
</div>

</body>
</html>
