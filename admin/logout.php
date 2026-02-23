<?php
session_start();
session_destroy();
?>

<!DOCTYPE html>
<html>
<head>
<title>Logged Out</title>
<style>
body {
    margin: 0;
    font-family: 'Segoe UI', sans-serif;
    background: linear-gradient(135deg, #1e3c72, #2a5298);
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
}
.box {
    background: rgba(255,255,255,0.1);
    backdrop-filter: blur(15px);
    padding: 40px;
    border-radius: 15px;
    color: white;
    text-align: center;
}
a {
    display: inline-block;
    margin-top: 20px;
    padding: 10px 20px;
    background: #00c6ff;
    color: white;
    text-decoration: none;
    border-radius: 6px;
}
</style>
</head>
<body>
<div class="box">
<h2>You have been logged out</h2>
<a href="login.php">Login Again</a>
</div>
</body>
</html>
