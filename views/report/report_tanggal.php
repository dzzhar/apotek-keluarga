<?php
include '../../config/config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $tgl_bayar = $_POST['tgl_bayar'];

    $sql = "SELECT 
                pembayaran.id_bayar,
                pasien.nama_pasien,
                obat.nama_obat,
                dokter.nama_dokter,
                pembayaran.tgl_bayar,
                pembayaran.jumlah_bayar
            FROM 
                pembayaran
            JOIN 
                pasien ON pembayaran.id_pasien = pasien.id_pasien
            JOIN 
                obat ON pembayaran.id_obat = obat.id_obat
            JOIN 
                dokter ON pembayaran.id_dokter = dokter.id_dokter
            WHERE 
                pembayaran.tgl_bayar = ?";
    
    // Prepare statement
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("s", $tgl_bayar);
        $stmt->execute();
        $stmt->bind_result($id_bayar, $nama_pasien, $nama_obat, $nama_dokter, $tgl_bayar, $jumlah_bayar);
        
        $resultFound = false;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <title>Data Report</title>

    <link
      href="../../assets/vendor/fontawesome-free/css/all.min.css"
      rel="stylesheet"
      type="text/css"
    />
    <link
      href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
      rel="stylesheet"
    />
    <link href="../../assets/css/sb-admin-2.min.css" rel="stylesheet" />
    <link
      href="../../assets/vendor/datatables/dataTables.bootstrap4.min.css"
      rel="stylesheet"
    />
  </head>

  <body id="page-top">
    <div id="wrapper">
      <!-- sidebar -->
      <?php
      include '../components/sidebar.php';
      ?>

      <div id="content-wrapper" class="d-flex flex-column">
        <div id="content">
          <!-- navbar -->
          <?php
          include '../components/navbar.php';
          ?>
          
          <div class="container-fluid">
            <div class="card shadow mb-4 mt-5">
              <div
                class="card-header py-3 d-flex flex-row justify-content-between align-items-center flex-wrap"
              >
                <h6 class="m-0 font-weight-bold text-primary">
                  Data Pembayaran
                </h6>
                <a href="tambah_pembayaran.php" class="btn btn-primary btn-sm">Tambah Data</a>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table
                    class="table table-bordered"
                    id="dataTable"
                    width="100%"
                    cellspacing="0"
                  >
                    <thead>
                      <tr>
                        <th>Id Bayar</th>
                        <th>Nama Pasien</th>
                        <th>Nama Obat</th>
                        <th>Nama Dokter</th>
                        <th>Tanggal Bayar</th>
                        <th>Jumlah Bayar</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php
                    if (isset($stmt)) {
                        while ($stmt->fetch()) {
                            $resultFound = true;
                            echo "<tr>";
                            echo "<td>" . $id_bayar . "</td>";
                            echo "<td>" . $nama_pasien . "</td>";
                            echo "<td>" . $nama_obat . "</td>";
                            echo "<td>" . $nama_dokter . "</td>";
                            echo "<td>" . $tgl_bayar . "</td>";
                            echo "<td>" . $jumlah_bayar . "</td>";
                            echo "</tr>";
                        }
                        $stmt->close();
                    }
                    ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>

        <?php
        include "../components/footer.php"
        ?>
      </div>
    </div>

    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
    </a>

    <script src="../../assets/vendor/jquery/jquery.min.js"></script>
    <script src="../../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../../assets/vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="../../assets/js/sb-admin-2.min.js"></script>
    <script src="../../assets/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="../../assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>
    <script src="../../assets/js/demo/datatables-demo.js"></script>
  </body>
</html>