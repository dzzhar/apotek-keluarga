<?php
include '../../config/config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $id_bayar = $_POST['id_bayar'];
    $id_pasien = $_POST['id_pasien'];
    $id_obat = $_POST['id_obat'];
    $id_dokter = $_POST['id_dokter'];
    $tgl_bayar = $_POST['tgl_bayar'];
    $jumlah_bayar = $_POST['jumlah_bayar'];

    $insert_query = "INSERT INTO pembayaran (id_bayar, id_pasien, id_obat, id_dokter, tgl_bayar, jumlah_bayar) VALUES ('$id_bayar', '$id_pasien', '$id_obat', '$id_dokter', '$tgl_bayar', '$jumlah_bayar')";

    if (mysqli_query($conn, $insert_query)) {
        header('location: ../../views/pembayaran');
    } else {
        echo "Error updating stock: " . mysqli_error($conn);
    }
    } else {
        echo "Error inserting data: " . mysqli_error($conn);
    }

// Close the database connection
mysqli_close($conn);
?>
