<?php
session_start();
if(!isset($_SESSION['admin'])){
header("Location: login.php");
}
include '../config.php';
$result = $conn->query("SELECT * FROM certificates");
?>
<h2>Certificates Dashboard</h2>
<table border="1" cellpadding="10">
<tr>
<th>Certificate ID</th>
<th>Name</th>
<th>Course</th>
<th>Issue Date</th>
<th>Status</th>
</tr>
<?php
while($row=$result->fetch_assoc()){
echo "<tr>
<td>".$row['certificate_id']."</td>
<td>".$row['candidate_name']."</td>
<td>".$row['course']."</td>
<td>".$row['issue_date']."</td>
<td>".$row['status']."</td>
</tr>";
}
?>
</table>
<br><a href="logout.php">Logout</a>
