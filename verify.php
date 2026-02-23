<?php
include 'config.php';
$certificate_id = $_GET['id'] ?? '';
$sql = "SELECT * FROM certificates WHERE certificate_id='$certificate_id'";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html>
<head>
<title>Skillsonics Certificate Verification</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<style>
body {font-family: Arial;background:#f4f6f8;text-align:center;padding-top:50px;}
.card {background:white;padding:30px;width:90%;max-width:400px;margin:auto;
box-shadow:0 0 15px rgba(0,0,0,0.1);border-radius:10px;}
.valid {color:green;font-size:24px;font-weight:bold;}
.invalid {color:red;font-size:24px;font-weight:bold;}
</style>
</head>
<body>
<div class="card">
<h2>Skillsonics India Pvt Ltd</h2>
<h3>Certificate Verification</h3>
<?php
if($result && $result->num_rows > 0){
$row = $result->fetch_assoc();
echo "<div class='valid'>✓ Certificate Verified</div>";
echo "<p><b>Name:</b> ".$row['candidate_name']."</p>";
echo "<p><b>Certificate ID:</b> ".$row['certificate_id']."</p>";
echo "<p><b>Course:</b> ".$row['course']."</p>";
echo "<p><b>Issue Date:</b> ".$row['issue_date']."</p>";
echo "<p><b>Status:</b> ".$row['status']."</p>";
}else{
echo "<div class='invalid'>Certificate Not Found</div>";
echo "<p>This certificate may be invalid or fraudulent.</p>";
}
?>
</div>
</body>
</html>
