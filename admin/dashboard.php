<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit();
}

include("../config.php");

$result = $conn->query("SELECT * FROM certificates ORDER BY id DESC");
?>

<!DOCTYPE html>
<html>
<head>
<title>Admin Dashboard</title>
<link rel="stylesheet" href="assets/style.css">
</head>
<body>

<div class="container">
<h2>Certificate Database</h2>

<a href="add_certificate.php" class="btn">+ Add Certificate</a>
<a href="logout.php" class="btn red">Logout</a>

<table>
<tr>
<th>ID</th>
<th>Name</th>
<th>Certificate ID</th>
<th>Course</th>
<th>Date</th>
<th>Action</th>
</tr>

<?php while($row = $result->fetch_assoc()) { ?>
<tr>
<td><?php echo $row['id']; ?></td>
<td><?php echo $row['name']; ?></td>
<td><?php echo $row['certificate_id']; ?></td>
<td><?php echo $row['course']; ?></td>
<td><?php echo $row['issue_date']; ?></td>
<td>
<a href="delete_certificate.php?id=<?php echo $row['id']; ?>" class="delete">Delete</a>
</td>
</tr>
<?php } ?>

</table>
</div>

</body>
</html>
