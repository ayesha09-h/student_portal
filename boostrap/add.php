<?php include 'db.php'; ?>

<!DOCTYPE html>
<html>
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-4">

<h2>Add Student</h2>

<form method="POST">
    <input type="text" name="name" class="form-control mb-2" placeholder="Name" required>
    <input type="number" name="age" class="form-control mb-2" placeholder="Age" required>
    <input type="text" name="department" class="form-control mb-2" placeholder="Department">
    <input type="email" name="email" class="form-control mb-2" placeholder="Email" required>
    <button type="submit" name="submit" class="btn btn-success">Add</button>
</form>

<?php
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $age = $_POST['age'];
    $department = $_POST['department'];
    $email = $_POST['email'];

    $sql = "INSERT INTO students (name, age, department, email)
    VALUES ('$name', $age, '$department', '$email')";

    mysqli_query($conn, $sql);

    header("Location: index.php");
}
?>

</body>
</html>