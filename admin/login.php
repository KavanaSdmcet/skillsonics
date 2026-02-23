<?php
session_start();
if($_POST){
if($_POST['username']=="admin" && $_POST['password']=="Demo@123"){
$_SESSION['admin']=true;
header("Location: dashboard.php");
}else{
$error="Invalid login";
}
}
?>
<form method="POST">
<h2>Admin Login</h2>
<input name="username" placeholder="Username" required><br><br>
<input name="password" type="password" placeholder="Password" required><br><br>
<button type="submit">Login</button>
<?php if(isset($error)) echo "<p style='color:red;'>$error</p>"; ?>
</form>
