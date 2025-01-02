<?php
include '../../config/config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_obat = $_POST['kode'];
    $nama_obat = $_POST['nama'];
    $jenis_obat = $_POST['jenis'];
    $harga_obat = $_POST['harga'];
    $stok = $_POST['stok'];
    $kadaluwarsa = $_POST['kadaluwarsa'];

    $query = "INSERT INTO obat (id_obat, nama_obat, jenis_obat, harga_obat, stok, kadaluwarsa) VALUES ('$id_obat', '$nama_obat', '$jenis_obat', '$harga_obat', '$stok','$kadaluwarsa')";

    if (mysqli_query($conn, $query)) {
        header("location: ../../views/obat");
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
    }
} else {
    echo "Form submission failed. Please try again.";
}
mysqli_close($conn);
?>
