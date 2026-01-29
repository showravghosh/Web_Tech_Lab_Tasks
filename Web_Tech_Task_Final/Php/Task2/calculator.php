<?php
$num1 = $num2 = $operation = "";
$result = "";
$errors = [];

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $num1 = $_POST['num1'] ?? '';
    $num2 = $_POST['num2'] ?? '';
    $operation = $_POST['operation'] ?? '';

    // Validation
    if ($num1 === "" || !is_numeric($num1)) {
        $errors[] = "First number is required and must be numeric.";
    }
    if ($num2 === "" || !is_numeric($num2)) {
        $errors[] = "Second number is required and must be numeric.";
    }

    // Perform calculation if no errors
    if (empty($errors)) {
        $num1 = floatval($num1);
        $num2 = floatval($num2);

        switch ($operation) {
            case '+':
                $result = $num1 + $num2;
                break;
            case '-':
                $result = $num1 - $num2;
                break;
            case '×':
                $result = $num1 * $num2;
                break;
            case '÷':
                if ($num2 == 0) {
                    $errors[] = "Division by zero is not allowed.";
                } else {
                    $result = $num1 / $num2;
                }
                break;
            default:
                $errors[] = "Please select a valid operation.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>PHP Calculator</title>
<style>
body {
    font-family: Arial, sans-serif;
    background-color: rgb(240,240,240);
    margin: 0;
    padding: 0;
}
.container {
    width: 400px;
    margin: 50px auto;
    background: white;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 0 15px rgba(0,0,0,0.2);
}
h2 {
    text-align: center;
    margin-bottom: 20px;
}
input[type="text"], select {
    width: 100%;
    padding: 10px;
    margin-bottom: 15px;
    border-radius: 5px;
    border: 1px solid rgb(200,200,200);
    font-size: 16px;
}
button {
    width: 100%;
    padding: 12px;
    background-color: rgb(33,150,243);
    color: white;
    border: none;
    border-radius: 5px;
    font-size: 16px;
    cursor: pointer;
}
button:hover {
    background-color: rgb(30,130,210);
}
.error {
    color: red;
    margin-bottom: 10px;
}
.result {
    margin-top: 20px;
    padding: 15px;
    background-color: rgb(230,230,230);
    border-radius: 5px;
    font-size: 18px;
    text-align: center;
}
</style>
</head>
<body>
<div class="container">
    <h2>PHP Calculator</h2>

    <?php if(!empty($errors)): ?>
        <div class="error">
            <ul>
            <?php foreach($errors as $err): ?>
                <li><?php echo $err; ?></li>
            <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>

    <form method="post" action="">
        <input type="text" name="num1" placeholder="Enter first number" value="<?php echo htmlspecialchars($num1); ?>">

        <input type="text" name="num2" placeholder="Enter second number" value="<?php echo htmlspecialchars($num2); ?>">

        <select name="operation">
            <option value="">Select Operation</option>
            <option value="+" <?php if($operation=='+') echo 'selected'; ?>>Addition (+)</option>
            <option value="-" <?php if($operation=='-') echo 'selected'; ?>>Subtraction (-)</option>
            <option value="×" <?php if($operation=='×') echo 'selected'; ?>>Multiplication (×)</option>
            <option value="÷" <?php if($operation=='÷') echo 'selected'; ?>>Division (÷)</option>
        </select>

        <button type="submit">Calculate</button>
    </form>

    <?php if($result !== "" && empty($errors)): ?>
        <div class="result">
            Result: <?php echo $result; ?>
        </div>
    <?php endif; ?>
</div>
</body>
</html>
