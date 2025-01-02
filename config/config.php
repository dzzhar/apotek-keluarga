<?php
	$host = "localhost";
	$name = "root";
	$password = "";
	$database = "uas_web";
	
	// Koneksi ke database
	$conn = mysqli_connect($host, $name, $password, $database);

	// Periksa koneksi
	if (!$conn) 
	{
		die("Koneksi ke database gagal: " . mysqli_connect_error());
	}

?>