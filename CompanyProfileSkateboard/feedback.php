<?php
include 'config.php';

// Ambil data dari formulir
$name = $_POST['name'];
$email = $_POST['email'];
$comments = $_POST['comments'];

// Simpan data ke database
$sql = "INSERT INTO feedback (name, email, comments) VALUES ('$name', '$email', '$comments')";
if ($conn->query($sql) === TRUE) {
    // Berhasil disimpan, berikan notifikasi alert
    echo "<script>alert('Data feedback berhasil disimpan'); window.location.href='index.html';</script>";
} else {
    // Gagal disimpan, berikan notifikasi alert dengan pesan error
    echo "<script>alert('Error: " . $sql . "\\n" . $conn->error . "'); window.location.href='index.html';</script>";
}

// Tutup koneksi
$conn->close();
?>
