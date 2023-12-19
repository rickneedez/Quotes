<?php
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $quotes = $_POST['quotes'];

    // Menghasilkan nomor acak sebagai ID
    $randomId = mt_rand(1000, 9999);

    $sql = "INSERT INTO users (id, name, gender, email, quotes) VALUES ('$randomId', '$name', '$gender', '$email', '$quotes')";

    if ($conn->query($sql) === TRUE) {
        header('Location: index.php');
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
