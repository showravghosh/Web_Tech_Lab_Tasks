<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>AJAX Form Submission</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: rgb(240, 242, 245);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            background-color: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0,0,0,0.1);
            width: 350px;
        }
        form label {
            display: block;
            margin-top: 15px;
            font-weight: bold;
        }
        form input {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            border-radius: 5px;
            border: 1px solid rgb(200,200,200);
            box-sizing: border-box;
        }
        button {
            margin-top: 20px;
            padding: 10px;
            width: 100%;
            background-color: rgb(76, 175, 80);
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 1em;
            cursor: pointer;
        }
        #response {
            margin-top: 15px;
            font-weight: bold;
        }
    </style>
</head>
<body>
<div class="container">
    <h2>AJAX Form</h2>
    <form id="ajaxForm">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name">

        <label for="email">Email:</label>
        <input type="email" id="email" name="email">

        <button type="submit">Submit</button>
    </form>
    <div id="response"></div>
</div>

<script>
const form = document.getElementById('ajaxForm');
const responseDiv = document.getElementById('response');

form.addEventListener('submit', function(e){
    e.preventDefault();

    const formData = new FormData(form);

    const xhr = new XMLHttpRequest();
    xhr.open('POST', 'process_form.php', true);
    xhr.onreadystatechange = function(){
        if(xhr.readyState === 4){
            if(xhr.status === 200){
                responseDiv.textContent = xhr.responseText;
            } else {
                responseDiv.textContent = 'Server error';
            }
        }
    };
    xhr.send(formData);
});
</script>
</body>
</html>
