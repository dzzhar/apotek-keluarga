<?php
include '../../config/config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_dokter = $_POST['kode'];
    $nama_dokter = $_POST['nama'];
    $spesialis = $_POST['spesialis'];
    $telepon = $_POST['telepon'];

    $query = "INSERT INTO dokter (id_dokter, nama_dokter, spesialis, telepon) VALUES ('$id_dokter', '$nama_dokter', '$spesialis', '$telepon')";

    if (mysqli_query($conn, $query)) {
        header("location: ../../views/dokter");
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
    }
} else {
    echo "Form submission failed. Please try again.";
}
mysqli_close($conn);
?>
