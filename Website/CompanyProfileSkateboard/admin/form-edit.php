<?php
include 'navbar.php';
include("../config.php");
// kalau tidak ada id di query string
if( !isset($_GET['id']) ){
    header('Location: admin_dashboard.php');
   }
   //ambil id dari query string
   $id = $_GET['id'];
   // buat query untuk ambil data dari database
   $sql = "SELECT * FROM feedback WHERE id=$id";
   $query = mysqli_query($conn, $sql);
   $user = mysqli_fetch_assoc($query);
   // jika data yang di-edit tidak ditemukan
   if( mysqli_num_rows($query) < 1 ){
    die("data tidak ditemukan...");
   }
   ?>
<!DOCTYPE html>
<html>

<head>
    <title>Edit Section</title>
</head>

<body>
    <div class="container login-container">
        <form action="proses-edit.php" method="POST">
            <fieldset>
                <input type="hidden" name="id" value="<?php echo $user['id'] 
   ?>" />
                <p>Edit Form</p>
                <p>
                    <label for="name">Name: </label>
                    <input class="form-control" type="text" name="name" placeholder="Username"
                        value="<?php echo $user['name'] ?>" />
                </p>

                <p>
                    <label for="email">Email: </label>
                    <input class="form-control" type="text" name="email" placeholder="Email"
                        value="<?php echo $user['email'] ?>" />
                </p>
                <p>
                    <label for="comments">Message: </label>
                    <textarea class="form-control" name="comments" ><?php echo $user['comments'] 
   ?></textarea>
                </p>
                <p>
                    <input type="submit" value="Simpan" name="simpan" class="btn btn-primary btn-sm"/>
                    <button type="button" onclick="batal()" class="btn btn-secondary btn-sm">Batal</button>
                </p>

            </fieldset>
        </form>
    </div>
    <script>
    function batal() {
        // Tambahkan tindakan yang diinginkan saat tombol "Batal" diklik
        alert('Anda membatalkan aksi.');
        window.location.href = 'admin_dashboard.php';
        // Misalnya, Anda dapat kembali ke halaman sebelumnya atau melakukan tindakan tertentu.
    }
    </script>

</body>

</html>