<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($username === "admin" && $password === "admin123") {
        $_SESSION['admin'] = true;
        header("Location: dashboard.php");
        exit();
    } else {
        $error = "Invalid Credentials";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Admin Login</title>
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
.login-box {
    background: rgba(255,255,255,0.1);
    backdrop-filter: blur(15px);
    padding: 40px;
    width: 350px;
    border-radius: 15px;
    text-align: center;
    color: white;
    box-shadow: 0 10px 30px rgba(0,0,0,0.3);
}
h2 {
    margin-bottom: 25px;
}
input {
    width: 100%;
    padding: 12px;
    margin: 10px 0;
    border-radius: 8px;
    border: none;
    outline: none;
}
button {
    width: 100%;
    padding: 12px;
    background: #00c6ff;
    border: none;
    border-radius: 8px;
    font-weight: bold;
    cursor: pointer;
    transition: 0.3s;
}
button:hover {
    background: #0072ff;
}
.error {
    margin-top: 10px;
    color: #ffcccc;
}
</style>
</head>

<body>
<div class="login-box">
    <h2>Skillsonics Admin</h2>
    <form method="POST">
        <input type="text" name="username" placeholder="Username" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit">Login</button>
    </form>
    <?php if(isset($error)) echo "<p class='error'>$error</p>"; ?>
</div>
</body>
</html>
