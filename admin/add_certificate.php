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
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Add Certificate</title>

<style>
body {
    margin: 0;
    font-family: 'Segoe UI', sans-serif;
    background: #f4f6f9;
}

.header {
    background: #1e3c72;
    color: white;
    padding: 20px;
    text-align: center;
}

.container {
    display: flex;
    justify-content: center;
    align-items: center;
    margin-top: 40px;
}

.card {
    background: white;
    width: 450px;
    padding: 30px;
    border-radius: 12px;
    box-shadow: 0 8px 20px rgba(0,0,0,0.1);
}

h2 {
    text-align: center;
    margin-bottom: 25px;
}

label {
    font-weight: 600;
    display: block;
    margin-top: 15px;
}

input {
    width: 100%;
    padding: 10px;
    margin-top: 5px;
    border-radius: 6px;
    border: 1px solid #ccc;
    font-size: 14px;
}

button {
    width: 100%;
    padding: 12px;
    margin-top: 20px;
    background: #27ae60;
    color: white;
    border: none;
    border-radius: 6px;
    font-weight: bold;
    cursor: pointer;
    transition: 0.3s;
}

button:hover {
    background: #219150;
}

.back {
    display: block;
    text-align: center;
    margin-top: 15px;
    text-decoration: none;
    color: #1e3c72;
    font-weight: 600;
}
</style>

</head>
<body>

<div class="header">
    <h2>Add New Certificate</h2>
</div>

<div class="container">
    <div class="card">
        <form method="POST">

            <label>Candidate Name</label>
            <input type="text" name="name" placeholder="Enter candidate name" required>

            <label>Certificate ID</label>
            <input type="text" name="certificate_id" placeholder="Enter certificate ID" required>

            <label>Course</label>
            <input type="text" name="course" placeholder="Enter course name" required>

            <label>Issue Date</label>
            <input type="date" name="issue_date" required>

            <button type="submit">Add Certificate</button>

        </form>

        <a href="dashboard.php" class="back">← Back to Dashboard</a>
    </div>
</div>

</body>
</html>
