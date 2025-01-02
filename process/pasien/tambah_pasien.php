<?php
include '../../config/config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_pasien = $_POST['kode'];
    $nama_pasien = $_POST['nama'];
    $tempat_lahir = $_POST['tempat'];
    $tgl_lahir = $_POST['tgl'];
    $alamat = $_POST['alamat'];
    $telepon = $_POST['telepon'];

    $query = "INSERT INTO pasien (id_pasien, nama_pasien, tempat_lahir, tgl_lahir, alamat, telepon) VALUES ('$id_pasien', '$nama_pasien', '$tempat_lahir', '$tgl_lahir', '$alamat','$telepon')";

    if (mysqli_query($conn, $query)) {
        header('location: ../../views/pasien');
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
    }
} else {
    echo "Form submission failed. Please try again.";
}
mysqli_close($conn);
?>
