<?php
include("../config.php");
// cek apakah tombol simpan sudah diklik atau blum?
if(isset($_POST['simpan'])){
    // ambil data dari formulir
    $id = $_POST['id'];
    $created_at = $_POST['created_at'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $comments = $_POST['comments'];
    // buat query update
    $sql = "UPDATE feedback SET name='$name', email='$email', 
   comments='$comments' WHERE 
   id=$id";
    $query = mysqli_query($conn, $sql);
    // apakah query update berhasil?
    if( $query ) {
    // kalau berhasil alihkan ke halaman list-siswa.php
    header('Location: admin_dashboard.php');
    } else {
    // kalau gagal tampilkan pesan
    echo "<script>alert('Gagal menyimpan perbuahan'); window.location.href='admin_dashboard.php';</script>";
}
   } else {
    echo "<script>alert('Akses dilarang'); window.location.href='admin_dashboard.php';</script>";
   }
   ?>