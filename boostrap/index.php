<?php include 'db.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Student Portal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-4">

<h2 class="mb-3">Student Portal</h2>

<form method="GET" class="mb-3">
    <input type="text" name="search" class="form-control" placeholder="Search by name">
</form>

<a href="add.php" class="btn btn-primary mb-3">Add Student</a>

<table class="table table-bordered">
<tr>
<th>ID</th><th>Name</th><th>Age</th><th>Dept</th><th>Email</th><th>Action</th>
</tr>

<?php
$search = $_GET['search'] ?? '';

$sql = "SELECT * FROM students WHERE name LIKE '%$search%'";
$result = mysqli_query($conn, $sql);

while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>
        <td>{$row['id']}</td>
        <td>{$row['name']}</td>
        <td>{$row['age']}</td>
        <td>{$row['department']}</td>
        <td>{$row['email']}</td>
        <td>
            <a href='edit.php?id={$row['id']}' class='btn btn-warning btn-sm'>Edit</a>
            <a href='delete.php?id={$row['id']}' class='btn btn-danger btn-sm' onclick='return confirm(\"Delete?\")'>Delete</a>
        </td>
    </tr>";
}
?>
</table>

</body>
</html>