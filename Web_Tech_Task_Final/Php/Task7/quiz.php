<?php
// Correct answers array
$correct_answers = [
    'q1' => 'b',
    'q2' => 'a',
    'q3' => 'c',
    'q4' => 'd',
    'q5' => 'b'
];

$score = 0;
$total = count($correct_answers);
$feedback = '';
$result = [];
$submitted = false;

// Check if form submitted
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $submitted = true;
    foreach($correct_answers as $q => $ans){
        if(isset($_POST[$q]) && $_POST[$q] == $ans){
            $score++;
            $result[$q] = 'Correct';
        } else {
            $result[$q] = 'Incorrect';
        }
    }

    $percentage = ($score / $total) * 100;

    // Grade-based feedback
    switch(true){
        case ($percentage >= 90):
            $feedback = "Excellent!";
            break;
        case ($percentage >= 70):
            $feedback = "Good!";
            break;
        case ($percentage >= 50):
            $feedback = "Average";
            break;
        default:
            $feedback = "Poor";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Web Tech Quiz</title>
<style>
body {
    font-family: Arial, sans-serif;
    background: rgb(245,245,245);
    margin: 0;
    padding: 0;
}

.container {
    width: 800px;
    margin: 50px auto;
    background: white;
    padding: 25px;
    border-radius: 10px;
    box-shadow: 0 0 15px rgba(0,0,0,0.1);
}

h2 {
    text-align: center;
    color: rgb(33,150,243);
}

form {
    margin-top: 20px;
}

.question {
    margin-bottom: 20px;
}

.question p {
    font-weight: bold;
}

label {
    display: block;
    margin: 5px 0;
}

input[type="submit"] {
    background: rgb(33,150,243);
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

input[type="submit"]:hover {
    background: rgb(25,118,210);
}

.result {
    margin-top: 20px;
    padding: 15px;
    background: rgb(230, 245, 255);
    border-radius: 8px;
}

.correct {
    color: green;
    font-weight: bold;
}

.incorrect {
    color: red;
    font-weight: bold;
}
</style>
</head>
<body>
<div class="container">
<h2>Web Technologies Quiz</h2>
<form method="post" action="">
<!-- Question 1 -->
<div class="question">
<p>1. What does HTML stand for?</p>
<label><input type="radio" name="q1" value="a" <?php if(isset($_POST['q1']) && $_POST['q1']=='a') echo 'checked'; ?>> Hyper Text Machine Language</label>
<label><input type="radio" name="q1" value="b" <?php if(isset($_POST['q1']) && $_POST['q1']=='b') echo 'checked'; ?>> Hyper Text Markup Language</label>
<label><input type="radio" name="q1" value="c" <?php if(isset($_POST['q1']) && $_POST['q1']=='c') echo 'checked'; ?>> High Text Markup Language</label>
<label><input type="radio" name="q1" value="d" <?php if(isset($_POST['q1']) && $_POST['q1']=='d') echo 'checked'; ?>> Hyperlinks and Text Markup Language</label>
</div>

<!-- Question 2 -->
<div class="question">
<p>2. Which language is used for styling web pages?</p>
<label><input type="radio" name="q2" value="a" <?php if(isset($_POST['q2']) && $_POST['q2']=='a') echo 'checked'; ?>> CSS</label>
<label><input type="radio" name="q2" value="b" <?php if(isset($_POST['q2']) && $_POST['q2']=='b') echo 'checked'; ?>> HTML</label>
<label><input type="radio" name="q2" value="c" <?php if(isset($_POST['q2']) && $_POST['q2']=='c') echo 'checked'; ?>> PHP</label>
<label><input type="radio" name="q2" value="d" <?php if(isset($_POST['q2']) && $_POST['q2']=='d') echo 'checked'; ?>> SQL</label>
</div>

<!-- Question 3 -->
<div class="question">
<p>3. Which tag is used to create a link in HTML?</p>
<label><input type="radio" name="q3" value="a" <?php if(isset($_POST['q3']) && $_POST['q3']=='a') echo 'checked'; ?>> &lt;link&gt;</label>
<label><input type="radio" name="q3" value="b" <?php if(isset($_POST['q3']) && $_POST['q3']=='b') echo 'checked'; ?>> &lt;img&gt;</label>
<label><input type="radio" name="q3" value="c" <?php if(isset($_POST['q3']) && $_POST['q3']=='c') echo 'checked'; ?>> &lt;a&gt;</label>
<label><input type="radio" name="q3" value="d" <?php if(isset($_POST['q3']) && $_POST['q3']=='d') echo 'checked'; ?>> &lt;p&gt;</label>
</div>

<!-- Question 4 -->
<div class="question">
<p>4. Which of the following is a server-side language?</p>
<label><input type="radio" name="q4" value="a" <?php if(isset($_POST['q4']) && $_POST['q4']=='a') echo 'checked'; ?>> HTML</label>
<label><input type="radio" name="q4" value="b" <?php if(isset($_POST['q4']) && $_POST['q4']=='b') echo 'checked'; ?>> CSS</label>
<label><input type="radio" name="q4" value="c" <?php if(isset($_POST['q4']) && $_POST['q4']=='c') echo 'checked'; ?>> JavaScript</label>
<label><input type="radio" name="q4" value="d" <?php if(isset($_POST['q4']) && $_POST['q4']=='d') echo 'checked'; ?>> PHP</label>
</div>

<!-- Question 5 -->
<div class="question">
<p>5. What does SQL stand for?</p>
<label><input type="radio" name="q5" value="a" <?php if(isset($_POST['q5']) && $_POST['q5']=='a') echo 'checked'; ?>> Structured Query Language</label>
<label><input type="radio" name="q5" value="b" <?php if(isset($_POST['q5']) && $_POST['q5']=='b') echo 'checked'; ?>> Simple Query Language</label>
<label><input type="radio" name="q5" value="c" <?php if(isset($_POST['q5']) && $_POST['q5']=='c') echo 'checked'; ?>> Sample Query List</label>
<label><input type="radio" name="q5" value="d" <?php if(isset($_POST['q5']) && $_POST['q5']=='d') echo 'checked'; ?>> Structured Question Language</label>
</div>

<input type="submit" value="Submit Quiz">
</form>

<?php if($submitted): ?>
<div class="result">
<p>Your Score: <?php echo $score; ?>/<?php echo $total; ?> (<?php echo number_format($percentage,2); ?>%)</p>
<p>Feedback: <?php echo $feedback; ?></p>
<ul>
<?php foreach($result as $q => $res): ?>
<li><?php echo strtoupper($q); ?>: <span class="<?php echo $res=='Correct'?'correct':'incorrect'; ?>"><?php echo $res; ?></span></li>
<?php endforeach; ?>
</ul>
</div>
<?php endif; ?>

</div>
</body>
</html>
