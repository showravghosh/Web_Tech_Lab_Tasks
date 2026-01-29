<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>AJAX Example</title>
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
        #serverTime {
            margin-top: 20px;
            font-weight: bold;
            font-size: 1.1em;
        }
    </style>
</head>
<body>
    <h2>AJAX Example</h2>
    <button id="getTimeBtn">Get Server Time</button>
    <div id="serverTime">Click the button to fetch server time.</div>

    <script>
        const button = document.getElementById('getTimeBtn');
        const serverTimeDiv = document.getElementById('serverTime');

        button.addEventListener('click', function() {
            const xhr = new XMLHttpRequest();
            xhr.open('GET', 'server_time.php', true);

            xhr.onreadystatechange = function() {
                if(xhr.readyState === 4) {
                    if(xhr.status === 200) {
                        serverTimeDiv.textContent = xhr.responseText;
                    } else {
                        serverTimeDiv.textContent = 'Error fetching server time';
                    }
                }
            };

            xhr.send();
        });
    </script>
</body>
</html>
