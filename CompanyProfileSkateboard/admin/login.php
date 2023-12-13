<?php
include ('../config.php');

session_start();

error_reporting(0);

if (isset($_SESSION['user'])) {
    header("Location: admin_dashboard.php");
}

if (isset($_POST['submit'])) {
	$username = $_POST['username'];
	$password = $_POST['password'];

	// Periksa apakah username ada dalam database
	$sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
	$result = mysqli_query($conn, $sql);
	if ($result->num_rows > 0) {
		$row = mysqli_fetch_assoc($result);
		$_SESSION['user'] = $row['username']; // Menggunakan 'user' untuk menyimpan informasi login
		header("Location: admin_dashboard.php");
	} else {
		echo "<script>alert('Username atau Password yang anda masukkan anda Salah.')</script>";
	}
} 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <!-- Sertakan Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="../CSS/admin.css">
</head>
<body>

<div class="container login-container">
    <h2 class="text-center mb-4">Login</h2>
    <form action="" method="post">
        <div class="mb-3">
            <label for="username" class="form-label">Username:</label>
            <input type="text" class="form-control" name="username"required>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password:</label>
            <input type="password" class="form-control" name="password" value="<?php echo $_POST['password']; ?>" required>
        </div>
        <button type="submit" name="submit" class="btn btn-primary">Login</button>
    </form>
</div>

<!-- Sertakan Bootstrap JS (Jika diperlukan) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>