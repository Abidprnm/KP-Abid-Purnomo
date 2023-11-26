<?php
include("../config.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "DELETE FROM feedback WHERE id=$id";
    $query = mysqli_query($conn, $sql);

    if ($query) {
        header('Location: admin_dashboard.php');
    } else {
        die("Gagal menghapus...");
    }
} else {
    die("Akses dilarang...");
}
?>
