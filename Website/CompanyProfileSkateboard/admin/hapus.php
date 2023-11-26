<?php
include("../config.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Menampilkan notifikasi popup konfirmasi
    echo "<script>
            var confirmation = confirm('Apakah Anda yakin ingin menghapus data ini?');
            if(confirmation) {
                window.location.href='hapus_proses.php?id=" . $id . "';
            } else {
                window.location.href='admin_dashboard.php';
            }
          </script>";
} else {
    die("Akses dilarang...");
}
?>
