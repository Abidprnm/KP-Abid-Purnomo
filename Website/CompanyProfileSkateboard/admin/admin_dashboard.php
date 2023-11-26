<?php
include '../config.php';
session_start();

if (!isset($_SESSION['user'])) {
    header("Location: login.php"); // Redirect ke halaman login jika belum login
    exit();
}
?>
<!DOCTYPE html>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
</script>

<html>

<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Karla&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    <link rel="stylesheet" href="../CSS/admin.css">
    <link rel="stylesheet" href="../CSS/loading.css">
    <title>Admin Dashboard</title>
</head>

<body>
    <nav id="navbar" class="navbar fixed-top navbar-expand-lg navbar-dark">
        <a class="navbar-brand">Admin Dashboard</a>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a href="logout.php">
                        <box-icon name='log-out'></box-icon>
                    </a>
                </li>
            </ul>
        </div>
    </nav>

    <div id="content">
        <!-- Isi konten dashboard akan ditampilkan di sini -->
        <h2>Selamat datang di Admin Dashboard</h2>
        <br>
        <table border="1" class="table table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Date</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Message</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $sql = "SELECT * FROM feedback";
                    $query = mysqli_query($conn, $sql);
                    while($user = mysqli_fetch_array($query)){
                        echo "<tr>";
                        echo "<td>".$user['id']."</td>";
                        echo "<td>".$user['created_at']."</td>";
                        echo "<td>".$user['name']."</td>";
                        echo "<td>".$user['email']."</td>";
                        echo "<td>".$user['comments']."</td>";
                        echo "<td>";
                        echo "<a href='form-edit.php?id=".$user['id']."' class='btn btn-success'>Edit</a> ";
                        echo "<a href='hapus.php?id=".$user['id']."' class='btn btn-danger'>Hapus</a>";
                        echo "</td>";
                        echo "</tr>";
                        }
                        ?>
            </tbody>
        </table>
        <caption>Total: <?php echo mysqli_num_rows($query) ?></caption>
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../loading.js"></script>

</body>

</html>