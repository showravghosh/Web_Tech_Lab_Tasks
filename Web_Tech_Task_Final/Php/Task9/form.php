<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Server-Side Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: rgb(240, 240, 240);
        }
        .container {
            width: 500px;
            margin: 50px auto;
            background: rgb(255, 255, 255);
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgb(0,0,0,0.1);
        }
        h2 {
            text-align: center;
        }
        label {
            display: block;
            margin-top: 15px;
        }
        input[type="text"], input[type="email"], input[type="number"], select {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            border-radius: 5px;
            border: 1px solid rgb(200,200,200);
        }
        .skills, .gender {
            margin-top: 5px;
        }
        .skills label, .gender label {
            display: inline-block;
            margin-right: 10px;
        }
        input[type="submit"] {
            margin-top: 20px;
            padding: 10px 15px;
            background-color: rgb(0,128,0);
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: rgb(0,100,0);
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>User Information Form</h2>
        <form action="process.php" method="post">
            <label for="name">Name:</label>
            <input type="text" name="name" id="name">

            <label for="email">Email:</label>
            <input type="email" name="email" id="email">

            <label for="age">Age:</label>
            <input type="number" name="age" id="age" min="1">

            <label>Gender:</label>
            <div class="gender">
                <label><input type="radio" name="gender" value="Male"> Male</label>
                <label><input type="radio" name="gender" value="Female"> Female</label>
                <label><input type="radio" name="gender" value="Other"> Other</label>
            </div>

            <label>Skills:</label>
            <div class="skills">
                <label><input type="checkbox" name="skills[]" value="HTML"> HTML</label>
                <label><input type="checkbox" name="skills[]" value="CSS"> CSS</label>
                <label><input type="checkbox" name="skills[]" value="JavaScript"> JavaScript</label>
                <label><input type="checkbox" name="skills[]" value="PHP"> PHP</label>
            </div>

            <label for="country">Country:</label>
            <select name="country" id="country">
                <option value="">--Select Country--</option>
                <option value="USA">USA</option>
                <option value="Bangladesh">Bangladesh</option>
                <option value="India">India</option>
                <option value="UK">UK</option>
            </select>

            <input type="submit" value="Submit">
        </form>
    </div>
</body>
</html>
