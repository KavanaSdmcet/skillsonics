<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit();
}
include("../config.php");

$result = $conn->query("SELECT * FROM certificates ORDER BY id DESC");
$baseURL = "https://skillsonics.onrender.com/verify.php?id=";
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
    width: 95%;
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
.qr-btn {
    background: #3498db;
    color: white;
    padding: 6px 10px;
    border-radius: 5px;
    cursor: pointer;
}
.modal {
    display: none;
    position: fixed;
    top: 0; left: 0;
    width: 100%; height: 100%;
    background: rgba(0,0,0,0.5);
    justify-content: center;
    align-items: center;
}
.modal-content {
    background: white;
    padding: 30px;
    border-radius: 10px;
    text-align: center;
}
.close {
    float: right;
    cursor: pointer;
    font-weight: bold;
}
    .modal {
    display: none;
    position: fixed;
    top: 0; left: 0;
    width: 100%; height: 100%;
    background: rgba(0,0,0,0.5);
    justify-content: center;
    align-items: center;
}
.modal-content {
    background: white;
    padding: 30px;
    border-radius: 10px;
    text-align: center;
    width: 300px;
}
.delete {
    color: red;
    cursor: pointer;
}
</style>

<script>
function showQR(url) {
    var qrURL = "https://api.qrserver.com/v1/create-qr-code/?size=200x200&data=" + encodeURIComponent(url);
    document.getElementById("qrImage").src = qrURL;
    document.getElementById("modal").style.display = "flex";
}
function closeModal() {
    document.getElementById("modal").style.display = "none";
}
let deleteId = null;

function confirmDelete(id) {
    deleteId = id;
    document.getElementById("deleteModal").style.display = "flex";
}

function closeDelete() {
    document.getElementById("deleteModal").style.display = "none";
}

function proceedDelete() {
    window.location.href = "delete_certificate.php?id=" + deleteId;
}
</script>

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
<th>QR</th>
<th>Action</th>
</tr>

<?php while($row = $result->fetch_assoc()) { 
    $verifyLink = $baseURL . $row['certificate_id'];
?>
<tr>
<td><?php echo $row['id']; ?></td>
<td><?php echo $row['name']; ?></td>
<td><?php echo $row['certificate_id']; ?></td>
<td><?php echo $row['course']; ?></td>
<td><?php echo $row['issue_date']; ?></td>
<td>
<span class="qr-btn" onclick="showQR('<?php echo $verifyLink; ?>')">
View QR
</span>
</td>
<td>
<span class="delete" onclick="confirmDelete(<?php echo $row['id']; ?>)">
Delete
</span>
</td>
</tr>
<?php } ?>

</table>
</div>

<!-- QR Modal -->
<div class="modal" id="modal">
<div class="modal-content">
<span class="close" onclick="closeModal()">X</span>
<h3>Certificate QR Code</h3>
<img id="qrImage" src="" alt="QR Code">
</div>
</div>
<!-- Delete Confirmation Modal -->
<div class="modal" id="deleteModal">
    <div class="modal-content">
        <h3>Are you sure?</h3>
        <p>This action cannot be undone.</p>
        <div style="margin-top:20px;">
            <button onclick="proceedDelete()" style="background:#e74c3c;color:white;padding:8px 15px;border:none;border-radius:5px;">Yes, Delete</button>
            <button onclick="closeDelete()" style="background:#3498db;color:white;padding:8px 15px;border:none;border-radius:5px;">Cancel</button>
        </div>
    </div>
</div>
</body>
</html>
