<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>AJAX JSON Example</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: rgb(240, 242, 245);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            flex-direction: column;
        }
        h2 {
            margin-bottom: 20px;
        }
        button {
            padding: 10px 20px;
            background-color: rgb(76, 175, 80);
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 1em;
            cursor: pointer;
        }
        button:hover {
            background-color: rgb(56, 142, 60);
        }
        ul {
            margin-top: 20px;
            padding-left: 20px;
            list-style-type: disc;
        }
        li {
            margin-bottom: 5px;
        }
        .error {
            color: red;
            margin-top: 15px;
        }
    </style>
</head>
<body>
    <h2>AJAX JSON Example</h2>
    <button id="loadStudentBtn">Load Student Data</button>
    <ul id="studentData"></ul>
    <div class="error" id="errorMsg"></div>

    <script>
        const btn = document.getElementById('loadStudentBtn');
        const studentList = document.getElementById('studentData');
        const errorMsg = document.getElementById('errorMsg');

        btn.addEventListener('click', function() {
            studentList.innerHTML = '';
            errorMsg.textContent = '';

            const xhr = new XMLHttpRequest();
            xhr.open('GET', 'get_student.php', true);

            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4) {
                    if (xhr.status === 200) {
                        try {
                            const student = JSON.parse(xhr.responseText);
                            // Display student data
                            for (const key in student) {
                                const li = document.createElement('li');
                                li.textContent = `${key.toUpperCase()}: ${student[key]}`;
                                studentList.appendChild(li);
                            }
                        } catch(e) {
                            errorMsg.textContent = 'Error parsing JSON response';
                        }
                    } else {
                        errorMsg.textContent = 'AJAX request failed. Status: ' + xhr.status;
                    }
                }
            };

            xhr.send();
        });
    </script>
</body>
</html>
