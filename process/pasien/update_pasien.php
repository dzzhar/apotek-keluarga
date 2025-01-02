<?php
include '../../config/config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $id_pasien = $_POST['id_pasien'];
    $nama_pasien = $_POST['nama'];
    $tempat_lahir = $_POST['tempat'];
    $tgl_lahir = $_POST['tgl'];
    $alamat = $_POST['alamat'];
    $telepon = $_POST['telepon'];

    // Update the pasien data in the database
    $query = "UPDATE pasien SET 
                nama_pasien = '$nama_pasien', 
                tempat_lahir = '$tempat_lahir', 
                tgl_lahir = '$tgl_lahir', 
                alamat = '$alamat',
                telepon = '$telepon'
              WHERE id_pasien = '$id_pasien'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        // Redirect to menu.php if update successful
        header('location: ../../views/pasien');
        exit();
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
} else {
    echo "Invalid request.";
}

mysqli_close($conn);
?>
