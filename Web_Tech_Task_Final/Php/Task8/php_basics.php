<?php
// ---------------------------
// Part A: PHP Variables and Output
// ---------------------------
$name = "Showrav Ghosh";
$student_id = "23-12345";
$department = "Computer Science";

echo "<h2>Part A: Variables and Output</h2>";
echo "Name: $name<br>";
echo "Student ID: $student_id<br>";
echo "Department: $department<br>";

// ---------------------------
// Part B: Arithmetic and Type Casting
// ---------------------------
$num1 = 15;
$num2 = 4;

echo "<h2>Part B: Arithmetic Operations</h2>";
echo "Addition: $num1 + $num2 = " . ($num1 + $num2) . "<br>";
echo "Subtraction: $num1 - $num2 = " . ($num1 - $num2) . "<br>";
echo "Multiplication: $num1 * $num2 = " . ($num1 * $num2) . "<br>";
echo "Division: $num1 / $num2 = " . ($num1 / $num2) . "<br>";

// Type casting
$string_num = "50";
$float_num = 12.7;
$int_from_string = (int)$string_num;
$int_from_float = (int)$float_num;

echo "<h3>Type Casting</h3>";
echo "String '$string_num' to integer: $int_from_string<br>";
echo "Float $float_num to integer: $int_from_float<br>";

// ---------------------------
// Part C: Control Flow
// ---------------------------
$marks = 72;

echo "<h2>Part C: Control Flow</h2>";
echo "Marks: $marks<br>";
if($marks >= 80){
    echo "Grade: A<br>";
}elseif($marks >= 65){
    echo "Grade: B<br>";
}elseif($marks >= 50){
    echo "Grade: C<br>";
}else{
    echo "Grade: Fail<br>";
}

// ---------------------------
// Part D: Loops
// ---------------------------
echo "<h2>Part D: Loops</h2>";
echo "<h3>For loop (1 to 10)</h3>";
for($i=1; $i<=10; $i++){
    echo $i . " ";
}

echo "<h3>While loop (Even numbers 1 to 20)</h3>";
$counter = 2;
while($counter <= 20){
    echo $counter . " ";
    $counter += 2;
}

// ---------------------------
// Part E: Arrays
// ---------------------------

// Indexed array
$languages = ["PHP", "JavaScript", "Python", "C++", "Java"];
echo "<h2>Part E: Arrays</h2>";
echo "<h3>Indexed Array - Favorite Programming Languages</h3>";
foreach($languages as $lang){
    echo $lang . "<br>";
}

// Associative array
$student_info = [
    "name" => "Showrav Ghosh",
    "email" => "showrav@example.com",
    "city" => "New York"
];

echo "<h3>Associative Array - Student Info</h3>";
foreach($student_info as $key => $value){
    echo ucfirst($key) . ": $value<br>";
}

// ---------------------------
// Part F: User-Defined Function
// ---------------------------
echo "<h2>Part F: User-Defined Function</h2>";
function calculateSquare($number){
    return $number * $number;
}

$number = 7;
$square = calculateSquare($number);
echo "The square of $number is $square<br>";
?>
