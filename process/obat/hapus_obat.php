<?php
// Include the database connection
include '../../config/config.php';

// Check if id_obat is set in the URL
if (isset($_GET['id_obat'])) {
    $id_obat = $_GET['id_obat'];

    // Delete the barang with the given id_obat
    $query = "DELETE FROM obat WHERE id_obat = '$id_obat'";
    $result = mysqli_query($conn, $query);

    // Check if the query was successful
    if ($result) {
        header('location: ../../views/obat');
    } else {
        echo "Error deleting barang: " . mysqli_error($conn);
    }
} else {
    echo "Invalid request.";
}
?>
