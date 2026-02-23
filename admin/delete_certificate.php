<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit();
}

include("../config.php");

$id = $_GET['id'];
$conn->query("DELETE FROM certificates WHERE id=$id");

header("Location: dashboard.php");
?>
