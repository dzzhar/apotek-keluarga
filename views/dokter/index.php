<?php
$user_level = $_SESSION['level'] ?? '';
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

    <title>Data Dokter</title>

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
                  Data Dokter
                </h6>
                <a href="tambah_dokter.php" class="btn btn-primary btn-sm" style="<?= ($user_level === 'PASIEN' || $user_level === 'STAFF') ? 'display: none;' : ''; ?>">Tambah Data</a>
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
                        <th>Id Dokter</th>
                        <th>Nama Dokter</th>
                        <th>Spesialis</th>
                        <th>Telepon</th>
                        <th style="<?= ($user_level === 'PASIEN' || $user_level === 'STAFF') ? 'display: none;' : ''; ?>">Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php
                    include '../../config/config.php';
                    // Query untuk menampilkan seluruh data barang dari tabel barang
                    $sql = "SELECT * FROM dokter";
                    $result = $conn->query($sql);
                    $condition_style = $style = ($user_level === 'PASIEN' || $user_level === 'STAFF') ? 'display: none;' : '';

                    if ($result->num_rows > 0) {
                        
                        // Output data dari setiap baris hasil query
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $row["id_dokter"] . "</td>";
                            echo "<td>" . $row["nama_dokter"] . "</td>";
                            echo "<td>" . $row["spesialis"] . "</td>";
                            echo "<td>" . $row["telepon"] . "</td>";
                            echo "<td style='$condition_style'>
                                <a href='edit_dokter.php?id_dokter=" . $row['id_dokter'] . "' class='btn btn-warning btn-sm'>Edit</a>
                                <a href='../../process/dokter/hapus_dokter.php?id_dokter=" . $row['id_dokter'] . "' class='btn btn-danger btn-sm'>Delete</a>
                            </td>";

                            echo "</tr>";
                        }
                        echo "</table>";
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

