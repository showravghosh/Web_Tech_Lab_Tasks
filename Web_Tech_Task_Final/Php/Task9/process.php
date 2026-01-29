<?php
echo "<!DOCTYPE html>
<html lang='en'>
<head>
<meta charset='UTF-8'>
<title>Form Submission Result</title>
<style>
    body {
    font-family: Arial, sans-serif; 
    background: rgb(240,240,240);
    }
    .container {
    width: 600px; 
    margin: 50px auto; 
    background: white; 
    padding: 20px; 
    border-radius: 10px; 
    box-shadow: 0 0 10px rgb(0,0,0,0.1);
    }
    h2 {
    text-align: center;
    }
    .error {
    color: red;
    }
    .success {
    color: green;
    }
    ul {
    list-style: none; 
    padding-left: 0;
    }
</style>
</head>
<body>
<div class='container'>
<h2>Form Submission Result</h2>";

$errors = [];

// Retrieve POST data
$name = isset($_POST['name']) ? trim($_POST['name']) : "";
$email = isset($_POST['email']) ? trim($_POST['email']) : "";
$age = isset($_POST['age']) ? $_POST['age'] : "";
$gender = isset($_POST['gender']) ? $_POST['gender'] : "";
$skills = isset($_POST['skills']) ? $_POST['skills'] : [];
$country = isset($_POST['country']) ? $_POST['country'] : "";

// Validation
if(empty($name)){
    $errors[] = "Name is required.";
}
if(empty($email)){
    $errors[] = "Email is required.";
}elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
    $errors[] = "Invalid email format.";
}
if(empty($age) || !is_numeric($age) || $age <= 0){
    $errors[] = "Age must be a positive number.";
}
if(empty($gender)){
    $errors[] = "Gender must be selected.";
}
if(empty($skills)){
    $errors[] = "At least one skill must be selected.";
}

// Display errors or success
if(!empty($errors)){
    echo "<div class='error'><h3>Errors:</h3><ul>";
    foreach($errors as $error){
        echo "<li>$error</li>";
    }
    echo "</ul></div>";
    echo "<a href='form.php'>Go back to form</a>";
}else{
    echo "<div class='success'><h3>Form Submitted Successfully!</h3></div>";
    echo "<h4>Submitted Information:</h4>";
    echo "<ul>";
    echo "<li><strong>Name:</strong> $name</li>";
    echo "<li><strong>Email:</strong> $email</li>";
    echo "<li><strong>Age:</strong> $age</li>";
    echo "<li><strong>Gender:</strong> $gender</li>";
    echo "<li><strong>Skills:</strong> " . implode(", ", $skills) . "</li>";
    echo "<li><strong>Country:</strong> $country</li>";
    echo "</ul>";
}

// Demonstrate $_SERVER usage
echo "<h4>Server Info:</h4>";
echo "<ul>";
echo "<li>Request Method: " . $_SERVER['REQUEST_METHOD'] . "</li>";
echo "<li>Script Name: " . $_SERVER['SCRIPT_NAME'] . "</li>";
echo "</ul>";

echo "</div></body></html>";
?>
