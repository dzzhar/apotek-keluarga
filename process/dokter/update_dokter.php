<?php
include '../../config/config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $id_dokter = $_POST['id_dokter'];
    $nama_dokter = $_POST['nama'];
    $spesialis = $_POST['spesialis'];
    $telepon = $_POST['telepon'];

    // Update the dokter data in the database
    $query = "UPDATE dokter SET 
                nama_dokter = '$nama_dokter', 
                spesialis = '$spesialis', 
                telepon = '$telepon'
              WHERE id_dokter = '$id_dokter'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        // Redirect to menu.php if update successful
        header("location: ../../views/dokter");
        exit();
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
} else {
    echo "Invalid request.";
}

mysqli_close($conn);
?>
