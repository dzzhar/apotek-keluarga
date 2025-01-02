<?php

include 'config/config.php';

session_start();

error_reporting(0);

if (isset($_SESSION['username'])) {
    // Cek level dan arahkan ke halaman yang sesuai
    if ($_SESSION['level'] == 'ADMIN') {
        header("Location: menu.php");
    } elseif ($_SESSION['level'] == 'STAFF') {
        header("Location: menuStaff.php");
    } elseif ($_SESSION['level'] == 'PASIEN') {
        header("Location: menuPasien.php");
    }
    exit;
}

if (isset($_POST['submit'])) {
    $name = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM user WHERE username='$name' AND password='$password'";
    $result = mysqli_query($conn, $sql);
    if ($result->num_rows > 0) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['username'] = $row['username'];
        $_SESSION['level'] = $row['level'];
        
        // Cek level dan arahkan ke halaman yang sesuai
        if ($_SESSION['level'] == 'ADMIN') {
            header("Location: home.html");
        } elseif ($_SESSION['level'] == 'STAFF') {
            header("Location: menuStaff.php");
        } elseif ($_SESSION['level'] == 'PASIEN') {
            header("Location: menuPasien.php");
        }
        exit;
    } else {
        echo "<script>alert('Password anda Salah.')</script>";
    }
}
?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="./assets/css/style.css">
	<title>Login</title>
</head>
<body>
	<div class="container">
		<form action="" method="POST" class="login-user">
			<p class="login-text" style="font-size: 2rem; font-weight: 800;">Form Login</p>
			<div class="input-group">
				<input type="name" placeholder="Username" name="username" required>
			</div>
			<div class="input-group">
				<input type="password" placeholder="Password" name="password" required>
			</div>
			<div class="input-group">
				<button name="submit" class="btn">Login</button>
			</div>
			<p class="login-register-text">Don't have an Account? <a href="register.php">Register Here</a></p>
		</form>
	</div>
</body>
</html>