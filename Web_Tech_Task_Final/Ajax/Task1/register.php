<?php
$existingUsernames = [
    "showrav", "admin", "johnDoe", "alice123", "user2026",
    "demoUser", "guest", "tester", "example", "superman"
];

if (isset($_GET['username'])) {
    header('Content-Type: application/json');
    $username = trim($_GET['username']);
    $response = ["available" => true, "message" => "Username is available!"];
    if ($username !== '') {
        foreach ($existingUsernames as $existing) {
            if (strcasecmp($existing, $username) === 0) {
                $response = ["available" => false, "message" => "Username is already taken!"];
                break;
            }
        }
    } else {
        $response = ["available" => false, "message" => "Username cannot be empty!"];
    }
    echo json_encode($response);
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register | Username Checker</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Register</h2>
        <form id="registerForm">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" autocomplete="off">
            <small id="usernameMsg">Minimum 3 characters</small>
            <div id="loading" style="display:none;">Checking...</div>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email">

            <label for="password">Password:</label>
            <input type="password" id="password" name="password">

            <button type="submit" id="submitBtn">Register</button>
        </form>
    </div>

    <script>
        const usernameInput = document.getElementById('username');
        const usernameMsg = document.getElementById('usernameMsg');
        const loading = document.getElementById('loading');
        const submitBtn = document.getElementById('submitBtn');
        let debounceTimer;

        usernameInput.addEventListener('input', function() {
            const username = this.value.trim();
            usernameMsg.style.color = 'black';
            usernameMsg.textContent = `Characters: ${username.length} (min 3)`;
            submitBtn.disabled = true;

            if (username.length < 3) {
                usernameMsg.style.color = 'red';
                usernameMsg.textContent += " - Too short!";
                return;
            }

            clearTimeout(debounceTimer);
            debounceTimer = setTimeout(() => checkUsername(username), 300);
        });

        function checkUsername(username) {
            loading.style.display = 'inline';
            const xhr = new XMLHttpRequest();
            xhr.open('GET', `register.php?username=${encodeURIComponent(username)}`, true);
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4) {
                    loading.style.display = 'none';
                    if (xhr.status === 200) {
                        try {
                            const response = JSON.parse(xhr.responseText);
                            usernameMsg.textContent = response.message;
                            usernameMsg.style.color = response.available ? 'green' : 'red';
                            submitBtn.disabled = !response.available;
                        } catch (e) {
                            usernameMsg.textContent = "Error!";
                            usernameMsg.style.color = 'red';
                        }
                    } else {
                        usernameMsg.textContent = "Error!";
                        usernameMsg.style.color = 'red';
                    }
                }
            };
            xhr.send();
        }

        document.getElementById('registerForm').addEventListener('submit', function(e) {
            e.preventDefault();
            alert('Form submitted successfully!');
        });
    </script>
</body>
</html>
