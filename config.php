<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "crud_app";

// Membuat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Memeriksa koneksi
if ($conn->connect_error) {
    die("Koneksi Gagal: " . $conn->connect_error);
}
?>
