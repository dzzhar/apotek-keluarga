<?php

include 'config/config.php';

session_start();

error_reporting(0);

if (isset($_SESSION['username'])) {
    header("location: welcome.php");
}

if (isset($_POST['submit'])) {
	$name = $_POST['username'];
	$password = $_POST['password'];

	$sql = "INSERT INTO user (username, password, level) VALUES ('$name', '$password', 'PASIEN')";
	$result = mysqli_query($conn, $sql);
	if ($result->num_rows > 0) {
		$row = mysqli_fetch_assoc($result);
		$_SESSION['username'] = $row['username'];
		header("location: index.php");
	} else {
		header("location: index.php");
	}
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" type="text/css" href="assets/css/style.css">

	<title> Register</title>
</head>
<body>
	<div class="container">
		<form action="" method="POST" class="login-user">
			<p class="login-text" style="font-size: 2rem; font-weight: 800;">Form Register</p>
			<div class="input-group">
				<input type="name" placeholder="Username" name="username" required>
			</div>
			<div class="input-group">
				<input type="password" placeholder="Password" name="password" required>
			</div>
			<div class="input-group">
				<button name="submit" class="btn">Register</button>
			</div>
			<p class="login-register-text">Have an Account? <a href="index.php">Log in</a></p>
		</form>
	</div>
</body>
</html>
