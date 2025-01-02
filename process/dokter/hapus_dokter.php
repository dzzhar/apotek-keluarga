<?php
// Include the database connection
include '../../config/config.php';

// Check if id_obat is set in the URL
if (isset($_GET['id_dokter'])) {
    $id_dokter = $_GET['id_dokter'];

    // Delete the barang with the given id_obat
    $query = "DELETE FROM dokter WHERE id_dokter = '$id_dokter'";
    $result = mysqli_query($conn, $query);

    // Check if the query was successful
    if ($result) {
        header("location: ../../views/dokter");
    } else {
        echo "Error deleting dokter: " . mysqli_error($conn);
    }
} else {
    echo "Invalid request.";
}
?>
