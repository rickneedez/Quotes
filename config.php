<?php
$servername = "localhost";
$username = "root"; // Default username for XAMPP MySQL
$password = "";     // Default password for XAMPP MySQL is empty
$dbname = "crud_app";

// Membuat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Memeriksa koneksi
if ($conn->connect_error) {
    die("Koneksi Gagal: " . $conn->connect_error);
}
?>
