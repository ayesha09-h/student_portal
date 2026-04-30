<?php
include 'db.php';
$id = $_GET['id'];

$result = mysqli_query($conn, "SELECT * FROM students WHERE id=$id");
$row = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html>
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-4">

<h2>Edit Student</h2>

<form method="POST">
    <input type="text" name="name" class="form-control mb-2" value="<?php echo $row['name']; ?>">
    <input type="number" name="age" class="form-control mb-2" value="<?php echo $row['age']; ?>">
    <input type="text" name="department" class="form-control mb-2" value="<?php echo $row['department']; ?>">
    <input type="email" name="email" class="form-control mb-2" value="<?php echo $row['email']; ?>">
    <button type="submit" name="update" class="btn btn-primary">Update</button>
</form>

<?php
if (isset($_POST['update'])) {
    $name = $_POST['name'];
    $age = $_POST['age'];
    $department = $_POST['department'];
    $email = $_POST['email'];

    mysqli_query($conn, "UPDATE students SET
    name='$name', age=$age, department='$department', email='$email'
    WHERE id=$id");

    header("Location: index.php");
}
?>

</body>
</html>