<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['username'], $_POST['email'], $_POST['password'])) {
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);


    // Check if the username or email already exists
    $checkStmt = $conn->prepare("SELECT id FROM users WHERE username = ? OR email = ?");
    $checkStmt->execute([$username, $email]);
    if ($checkStmt->rowCount() > 0) {
        echo "Username or Email already taken!";
    } else {
        // Insert the user into the database
        $stmt = $conn->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
        if ($stmt->execute([$username, $email, $password])) {
            echo "Registration successful! <a href='login.php'>Login</a>";
        } else {
            echo "Error registering user.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Portal</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f8ff; /* Light blue background */
            color: #333; /* Dark text for readability */
            text-align: center;
            padding: 50px;
        }

        h1 {
            color: #4CAF50; /* Green color for header */
        }

        .welcome-message {
            font-size: 20px;
            color: #007BFF; /* Blue color for the welcome message */
        }
    </style>
</head>
<body>
    <h1>Welcome to the Online Portal</h1>
    <div class="welcome-message">
        
    </div>
</body>
</html>


<form method="POST" action="register.php">
    <label>Username:</label>
    <input type="text" name="username" required><br>

    <label>Email:</label>
    <input type="email" name="email" required><br>

    <label>Password:</label>
    <input type="password" name="password" required><br>

    <button type="submit">Register</button>
</form>





