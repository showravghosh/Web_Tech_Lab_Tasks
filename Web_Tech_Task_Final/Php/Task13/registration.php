<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Student Registration</title>
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: rgb(240,240,240);
        margin: 0;
        padding: 0;
    }
    .container {
        width: 500px;
        margin: 50px auto;
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
        margin-top: 12px;
        font-weight: bold;
        color: rgb(60,60,60);
    }
    input[type="text"], input[type="email"], input[type="password"], input[type="number"], select {
        width: 100%;
        padding: 10px;
        margin-top: 5px;
        border-radius: 6px;
        border: 1px solid rgb(180,180,180);
    }
    input[type="radio"], input[type="checkbox"] {
        margin-top: 10px;
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
    .error {
        color: rgb(200,0,0);
        font-size: 14px;
        margin-top: 5px;
    }
    .success {
        margin-top: 20px;
        padding: 15px;
        background-color: rgb(230,255,230);
        border: 1px solid rgb(0,200,0);
        border-radius: 6px;
    }
    .success strong {
        color: rgb(0,120,0);
    }
</style>
</head>
<body>
<div class="container">
    <h2>Student Registration Form</h2>
    <?php
    // Initialize variables
    $name = $email = $username = $password = $confirm_password = $age = $gender = $course = $terms = "";
    $errors = [];

    if(isset($_POST['register'])) {
        // Sanitize inputs
        $name = htmlspecialchars(trim($_POST['full_name']));
        $email = htmlspecialchars(trim($_POST['email']));
        $username = htmlspecialchars(trim($_POST['username']));
        $password = $_POST['password'];
        $confirm_password = $_POST['confirm_password'];
        $age = intval($_POST['age']);
        $gender = isset($_POST['gender']) ? $_POST['gender'] : "";
        $course = isset($_POST['course']) ? $_POST['course'] : "";
        $terms = isset($_POST['terms']) ? $_POST['terms'] : "";

        // Validation
        if(empty($name)) {
            $errors[] = "Full Name is required.";
        } elseif(!preg_match("/^[a-zA-Z ]+$/", $name)) {
            $errors[] = "Full Name can contain only letters and spaces.";
        }

        if(empty($email)) {
            $errors[] = "Email is required.";
        } elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors[] = "Invalid email format.";
        }

        if(empty($username)) {
            $errors[] = "Username is required.";
        } elseif(strlen($username) < 5) {
            $errors[] = "Username must be at least 5 characters long.";
        }

        if(empty($password)) {
            $errors[] = "Password is required.";
        } elseif(strlen($password) < 6) {
            $errors[] = "Password must be at least 6 characters long.";
        }

        if($password !== $confirm_password) {
            $errors[] = "Password and Confirm Password do not match.";
        }

        if(empty($age)) {
            $errors[] = "Age is required.";
        } elseif($age < 18) {
            $errors[] = "You must be 18 or older to register.";
        }

        if(empty($gender)) {
            $errors[] = "Gender must be selected.";
        }

        if(empty($course)) {
            $errors[] = "Please select a course.";
        }

        if(empty($terms)) {
            $errors[] = "You must accept the Terms & Conditions.";
        }

        // Display success or errors
        if(empty($errors)) {
            echo "<div class='success'>";
            echo "<h3>Registration Successful!</h3>";
            echo "<p><strong>Full Name:</strong> $name</p>";
            echo "<p><strong>Email:</strong> $email</p>";
            echo "<p><strong>Username:</strong> $username</p>";
            echo "<p><strong>Age:</strong> $age</p>";
            echo "<p><strong>Gender:</strong> $gender</p>";
            echo "<p><strong>Course Selected:</strong> $course</p>";
            echo "</div>";
            // Clear variables after success
            $name = $email = $username = $password = $confirm_password = $age = $gender = $course = $terms = "";
        } else {
            echo "<div class='error'><ul>";
            foreach($errors as $err) {
                echo "<li>$err</li>";
            }
            echo "</ul></div>";
        }
    }
    ?>

    <form method="post" action="">
        <label for="full_name">Full Name:</label>
        <input type="text" name="full_name" id="full_name" value="<?php echo $name; ?>">

        <label for="email">Email Address:</label>
        <input type="email" name="email" id="email" value="<?php echo $email; ?>">

        <label for="username">Username:</label>
        <input type="text" name="username" id="username" value="<?php echo $username; ?>">

        <label for="password">Password:</label>
        <input type="password" name="password" id="password">

        <label for="confirm_password">Confirm Password:</label>
        <input type="password" name="confirm_password" id="confirm_password">

        <label for="age">Age:</label>
        <input type="number" name="age" id="age" value="<?php echo $age; ?>">

        <label>Gender:</label>
        <input type="radio" name="gender" value="Male" <?php if($gender=="Male") echo "checked"; ?>> Male
        <input type="radio" name="gender" value="Female" <?php if($gender=="Female") echo "checked"; ?>> Female

        <label for="course">Select Course:</label>
        <select name="course" id="course">
            <option value="">--Select Course--</option>
            <option value="Computer Science" <?php if($course=="Computer Science") echo "selected"; ?>>Computer Science</option>
            <option value="Business" <?php if($course=="Business") echo "selected"; ?>>Business</option>
            <option value="Engineering" <?php if($course=="Engineering") echo "selected"; ?>>Engineering</option>
            <option value="Arts" <?php if($course=="Arts") echo "selected"; ?>>Arts</option>
        </select>

        <label>
            <input type="checkbox" name="terms" value="accepted" <?php if($terms=="accepted") echo "checked"; ?>> I accept the Terms & Conditions
        </label>

        <input type="submit" name="register" value="Register">
    </form>
</div>
</body>
</html>
