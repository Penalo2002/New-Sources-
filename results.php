<?php
include 'db.php';

$results = $conn->query("
    SELECT c.name, COUNT(v.id) AS total_votes
    FROM candidates c
    LEFT JOIN votes v ON c.id = v.candidate_id
    GROUP BY c.id
")->fetchAll();

echo "<h2>Voting Results</h2>";
foreach ($results as $result) {
    echo "{$result['name']}: {$result['total_votes']} votes<br>";
}
$query2 = "
    SELECT v.id AS vote_id, u.username, c.name AS candidate_name, v.vote_time
    FROM votes v
    JOIN users u ON v.user_id = u.id
    JOIN candidates c ON v.candidate_id = c.id
";
$results2 = $conn->query($query2)->fetchAll(PDO::FETCH_ASSOC);

// Display Vote Details
echo "<h2>Vote Details</h2>";
echo "<table border='1'>
        <tr>
            <th>Vote ID</th>
            <th>Username</th>
            <th>Candidate</th>
            <th>Vote Time</th>
        </tr>";
foreach ($results2 as $result) {
    echo "<tr>
            <td>{$result['vote_id']}</td>
            <td>{$result['username']}</td>
            <td>{$result['candidate_name']}</td>
            <td>{$result['vote_time']}</td>
          </tr>";
}
echo "</table>";

?>
