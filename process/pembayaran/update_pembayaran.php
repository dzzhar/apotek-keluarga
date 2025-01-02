<?php
include '../../config/config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $id_bayar = $_POST['id_bayar'];
    $id_pasien = $_POST['id_pasien'];
    $id_obat = $_POST['id_obat'];
    $id_dokter = $_POST['id_dokter'];
    $tgl_bayar = $_POST['tgl'];
    $jumlah_bayar = $_POST['jumlah'];

    // Update the pasien data in the database
    $query = "UPDATE pembayaran SET 
                id_pasien = '$id_pasien', 
                id_obat = '$id_obat', 
                id_dokter = '$id_dokter', 
                tgl_bayar = '$tgl_bayar',
                jumlah_bayar = '$jumlah_bayar'
              WHERE id_bayar = '$id_bayar'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        // Redirect to menu.php if update successful
        header("location: ../../views/pembayaran");
        exit();
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
} else {
    echo "Invalid request.";
}

mysqli_close($conn);
?>
