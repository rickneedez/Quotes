<?php
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $id = $_GET['id'];

    $sql = "SELECT * FROM users WHERE id=$id";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
    } else {
        echo "Data tidak ditemukan";
        exit();
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $quotes = $_POST['quotes'];

    $sql = "UPDATE users SET name='$name', gender='$gender', email='$email', quotes='$quotes' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        header('Location: index.php');
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data</title>
    <link rel="stylesheet" href="styles.css">

</head>
<body>
    <div class="container">
    <div class="form-group">
        <h2>Edit Data</h2>
        <form action="edit.php" method="post">
            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" value="<?php echo $row['name']; ?>" required>
            </div>
            <label for="gender">Gender</label>
            <select name="gender" required>
        <option value="Male" <?php echo ($row['gender'] == 'Male') ? 'selected' : ''; ?>>Male</option>
        <option value="Female" <?php echo ($row['gender'] == 'Female') ? 'selected' : ''; ?>>Female</option>
    </select>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" value="<?php echo $row['email']; ?>" required>
            </div>
            <div class="form-group">
                <label for="quotes">Type Your Quotes</label>
                <input type="quotes" name="quotes" value="<?php echo $row['quotes']; ?>" required>
            </div>
            <div class="btn-submit-container">
            <button type="submit" class="btn-submit">Save</button>
            </div>
        </form>
    </div>
    </div>
</body>
</html>
