<?php

$host = "hopper.proxy.rlwy.net";
$user = "root";
$password = "YXKHkPmYbeCMOHYDKmFTxTQIHaLnnRgt";
$db = "railway";
$port = 54560;

$conn = new mysqli($host, $user, $password, $db, $port);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>
