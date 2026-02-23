<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit();
}

include("../config.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $cert_id = $_POST['certificate_id'];
    $course = $_POST['course'];
    $date = $_POST['issue_date'];

    $stmt = $conn->prepare("INSERT INTO certificates (certificate_id, name, course, issue_date) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $cert_id, $name, $course, $date);
    $stmt->execute();

    header("Location: dashboard.php");
}
?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="assets/style.css">
</head>
<body>
<div class="container">
<h2>Add Certificate</h2>
<form method="POST">
<input type="text" name="name" placeholder="Name" required>
<input type="text" name="certificate_id" placeholder="Certificate ID" required>
<input type="text" name="course" placeholder="Course" required>
<input type="date" name="issue_date" required>
<button type="submit">Add</button>
</form>
</div>
</body>
</html>
