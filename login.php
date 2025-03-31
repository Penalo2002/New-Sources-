<?php
include 'db.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->execute([$username]);
    $user = $stmt->fetch();

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        header("Location: vote.php");
    } else {
        echo "Invalid credentials.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f8ff; /* Light blue background */
            color: #333; /* Dark text for readability */
            text-align: center;
            padding: 50px;
        }

        h1 {
            color: #FF6347; /* Tomato red for header */
        }

        .login-message {
            font-size: 20px;
            color: #007BFF; /* Blue color for the login message */
        }
    </style>
</head>
<body>
    <h1>Please Log In</h1>
    <div class="login-message">
        <p>Enter your credentials to access your account.</p>
    </div>
</body>
</html>


<form method="POST">
    Username: <input type="text" name="username" required><br>
    Password: <input type="password" name="password" required><br>
    <button type="submit">Login</button>
</form>






