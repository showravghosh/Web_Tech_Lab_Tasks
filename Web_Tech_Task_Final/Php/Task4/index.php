<?php
// index.php
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Grade Calculator</title>
<style>
body {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    background-color: rgb(240,240,240);
    margin:0;
    padding:0;
}
.container {
    width: 500px;
    margin: 50px auto;
    background: white;
    padding: 30px 25px;
    border-radius: 12px;
    box-shadow: 0 5px 20px rgba(0,0,0,0.15);
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

form label {
    display: block;
    margin: 10px 0 5px;
    font-weight: 600;
    color: rgb(50,50,50);
}
form input[type="text"], form input[type="number"] {
    width: 100%;
    padding: 10px;
    border-radius: 8px;
    border: 1px solid rgb(200,200,200);
    font-size: 14px;
    transition: 0.2s;
}
form input[type="text"]:focus, form input[type="number"]:focus {
    border-color: rgb(33,150,243);
    outline: none;
}
button {
    width: 100%;
    padding: 12px;
    margin-top: 15px;
    background-color: rgb(33,150,243);
    color: white;
    font-size: 16px;
    border: none;
    border-radius: 8px;
    cursor: pointer;
    transition: 0.3s;
}
button:hover { background-color: rgb(30,130,210); }

.error { color: red; font-size: 13px; margin-top:5px;}
</style>
</head>
<body>
<div class="container">
<h2>Student Grade Calculator</h2>
<nav>
<a href="index.php">Home</a>
<a href="results.php">View Results</a>
</nav>

<?php
// Initialize error messages
$nameErr = $marksErr = "";
$name = $marks = "";
$valid = false;

if($_SERVER["REQUEST_METHOD"]=="POST"){
    $name = trim($_POST['name']);
    $marks = [];
    $valid = true;

    if(empty($name)){
        $nameErr = "Student name is required.";
        $valid = false;
    }

    for($i=1;$i<=5;$i++){
        $mark = trim($_POST["mark$i"]);
        if($mark==="" || !is_numeric($mark) || $mark<0 || $mark>100){
            $marksErr = "All marks must be numbers between 0 and 100.";
            $valid = false;
            break;
        }
        $marks[] = (float)$mark;
    }

    if($valid){
        $total = array_sum($marks);
        $average = $total/5;

        if($average>=90) $grade="A";
        elseif($average>=80) $grade="B";
        elseif($average>=70) $grade="C";
        elseif($average>=60) $grade="D";
        else $grade="F";

        // Save to session for results.php
        session_start();
        if(!isset($_SESSION['students'])) $_SESSION['students']=[];
        $_SESSION['students'][] = [
            'name'=>$name,
            'marks'=>$marks,
            'total'=>$total,
            'average'=>$average,
            'grade'=>$grade
        ];

        echo "<p style='color:green; font-weight:bold;'>Student $name added successfully!</p>";
    }
}
?>

<form method="post" action="">
<label>Student Name:</label>
<input type="text" name="name" value="<?php echo htmlspecialchars($name); ?>">
<span class="error"><?php echo $nameErr;?></span>

<?php for($i=1;$i<=5;$i++): ?>
<label>Mark <?php echo $i;?>:</label>
<input type="number" name="mark<?php echo $i;?>" value="<?php echo isset($_POST["mark$i"])?$_POST["mark$i"]:""; ?>">
<?php endfor; ?>
<span class="error"><?php echo $marksErr;?></span>

<button type="submit">Calculate Grade</button>
</form>
</div>
</body>
</html>
