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
    width: 90%;
    margin: 30px auto;
}
.actions {
    margin-bottom: 20px;
}
.btn {
    padding: 10px 15px;
    border-radius: 6px;
    text-decoration: none;
    color: white;
    margin-right: 10px;
}
.add { background: #27ae60; }
.logout { background: #e74c3c; }
table {
    width: 100%;
    border-collapse: collapse;
    background: white;
    border-radius: 10px;
    overflow: hidden;
    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
}
th, td {
    padding: 12px;
    text-align: center;
}
th {
    background: #2a5298;
    color: white;
}
tr:nth-child(even) {
    background: #f2f2f2;
}
.delete {
    color: red;
    text-decoration: none;
}
</style>
</head>

<body>

<div class="header">
    <h2>Certificate Management Dashboard</h2>
</div>

<div class="container">

<div class="actions">
    <a href="add_certificate.php" class="btn add">+ Add Certificate</a>
    <a href="logout.php" class="btn logout">Logout</a>
</div>

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
<a class="delete" href="delete_certificate.php?id=<?php echo $row['id']; ?>">Delete</a>
</td>
</tr>
<?php } ?>

</table>
</div>

</body>
</html>
