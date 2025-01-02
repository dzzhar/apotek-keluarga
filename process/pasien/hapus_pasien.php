<?php
// Include the database connection
include '../../config/config.php';

// Check if id_pasien is set in the URL
if (isset($_GET['id_pasien'])) {
    $id_pasien = $_GET['id_pasien'];

    // Delete the barang with the given id_obat
    $query = "DELETE FROM pasien WHERE id_pasien = '$id_pasien'";
    $result = mysqli_query($conn, $query);

    // Check if the query was successful
    if ($result) {
        header('location: ../../views/pasien');
    } else {
        echo "Error deleting barang: " . mysqli_error($conn);
    }
} else {
    echo "Invalid request.";
}
?>
