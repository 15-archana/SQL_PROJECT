<?php
$host = "localhost";
$user = "root";
$password = "Qwerty@123";
$db = "feedback_db"; // Fixed database name

$conn = new mysqli($host, $user, $password, $db);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$result = $conn->query("SELECT * FROM feedbacks ORDER BY submitted_at DESC"); // Fixed table and column
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View Feedback</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>All Feedback</h1>
    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>ID</th><th>Name</th><th>Subject</th><th>Rating</th><th>Comments</th><th>Submitted</th>
        </tr>
        <?php while($row = $result->fetch_assoc()) { ?>
        <tr>
            <td><?= htmlspecialchars($row['id']) ?></td>
            <td><?= htmlspecialchars($row['name']) ?></td>
            <td><?= htmlspecialchars($row['subject']) ?></td>
            <td><?= htmlspecialchars($row['rating']) ?></td>
            <td><?= htmlspecialchars($row['comments']) ?></td>
            <td><?= htmlspecialchars($row['submitted_at']) ?></td>
        </tr>
        <?php } ?>
    </table>
</body>
</html>
