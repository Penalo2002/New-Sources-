<?php
include 'db.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $candidate_id = $_POST['candidate_id'];

    // Check if the user has already voted
    $stmt = $conn->prepare("SELECT * FROM votes WHERE user_id = ?");
    $stmt->execute([$user_id]);
    $existing_vote = $stmt->fetch();

    if ($existing_vote) {
        echo "❌ You have already voted!";
    } else {
        // Insert the vote since the user has not voted yet
        $stmt = $conn->prepare("INSERT INTO votes (user_id, candidate_id) VALUES (?, ?)");
        if ($stmt->execute([$user_id, $candidate_id])) {
            echo "✅ Vote cast successfully!";
        } else {
            echo "❌ Error casting vote!";
        }
    }
}

// Fetch candidates
$candidates = $conn->query("SELECT * FROM candidates")->fetchAll();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vote Page</title>
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

        .vote-message {
            font-size: 20px;
            color: #007BFF; /* Blue color for the voting message */
        }
    </style>
</head>
<body>
    <h1>Vote Now!</h1>
    <div class="vote-message">
        <p>Cast your vote to make your voice heard.</p>
    </div>
</body>
</html>

<form method="POST">
    <h2>Select a Candidate:</h2>
    <?php foreach ($candidates as $candidate) { ?>
        <input type="radio" name="candidate_id" value="<?= $candidate['id'] ?>" required>
        <?= $candidate['name'] ?> (<?= $candidate['party'] ?>)<br>
    <?php } ?>
    <button type="submit">Vote</button>
</form>
