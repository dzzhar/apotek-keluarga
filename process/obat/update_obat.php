<?php
include '../../config/config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $id_obat = $_POST['id_obat'];
    $nama_obat = $_POST['nama'];
    $jenis_obat = $_POST['jenis'];
    $harga_obat = $_POST['harga'];
    $stok = $_POST['stok'];
    $kadaluwarsa = $_POST['kadaluwarsa'];

    // Update the obat data in the database
    $query = "UPDATE obat SET 
                nama_obat = '$nama_obat', 
                jenis_obat = '$jenis_obat', 
                harga_obat = '$harga_obat', 
                stok = '$stok',
                kadaluwarsa = '$kadaluwarsa'
              WHERE id_obat = '$id_obat'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        // Redirect to menu.php if update successful
        header("location: ../../views/obat");
        exit();
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
} else {
    echo "Invalid request.";
}

mysqli_close($conn);
?>
