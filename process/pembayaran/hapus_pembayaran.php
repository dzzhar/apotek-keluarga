<?php
// Include the database connection
include '../../config/config.php';

// Check if id_bayar is set in the URL
if (isset($_GET['id_bayar'])) {
    $id_bayar = $_GET['id_bayar'];

    // Delete the barang with the given id_obat
    $query = "DELETE FROM pembayaran WHERE id_bayar = '$id_bayar'";
    $result = mysqli_query($conn, $query);

    // Check if the query was successful
    if ($result) {
        header('location: ../../views/pembayaran');
    } else {
        echo "Error deleting dokter: " . mysqli_error($conn);
    }
} else {
    echo "Invalid request.";
}
?>
