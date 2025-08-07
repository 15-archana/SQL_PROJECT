<?php
$host = "localhost";
$user = "root";
$password = "Qwerty@123";
$db = "feedback_db";

$conn = new mysqli($host, $user, $password, $db);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$name = $_POST['name'];
$subject = $_POST['subject'];
$rating = $_POST['rating'];
$comments = $_POST['comments'];

$sql = "INSERT INTO feedbacks (name, subject, rating, comments) VALUES (?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssis", $name, $subject, $rating, $comments);

if ($stmt->execute()) {
    echo "Feedback submitted successfully. <a href='index.html'>Go back</a>";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
