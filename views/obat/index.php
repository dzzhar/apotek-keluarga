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

    <title>Data Obat</title>

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
                  Data Obat
                </h6>
                <a href="tambah_obat.php" class="btn btn-primary btn-sm" style="<?= ($user_level === 'STAFF') ? 'display: none;' : ''; ?>">Tambah Data</a>
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
                        <th>Id Obat</th>
                        <th>Nama Obat</th>
                        <th>Jenis Obat</th>
                        <th>Harga Obat</th>
                        <th>Stok</th>
                        <th>Kadaluwarsa</th>
                        <th style="<?= ($user_level === 'STAFF') ? 'display: none;' : ''; ?>">Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php
                    include '../../config/config.php';
                    // Query untuk menampilkan seluruh data barang dari tabel barang
                    $sql = "SELECT * FROM obat";
                    $result = $conn->query($sql);
                    $staff_condition =  $style= ($user_level === 'STAFF') ? 'display: none;' : ''; 

                    if ($result->num_rows > 0) {
                      // Output data dari setiap baris hasil query
                      while ($row = $result->fetch_assoc()) {
                          echo "<tr>";
                          echo "<td>" . $row["id_obat"] . "</td>";
                          echo "<td>" . $row["nama_obat"] . "</td>";
                          echo "<td>" . $row["jenis_obat"] . "</td>";
                          echo "<td>" . $row["harga_obat"] . "</td>";
                          echo "<td>" . $row["stok"] . "</td>";
                          echo "<td>" . $row["kadaluwarsa"] . "</td>";
                          echo "<td style='$staff_condition'>
                              <a href='edit_obat.php?id_obat=" . $row['id_obat'] . "' class='btn btn-warning btn-sm'>Edit</a>
                              <a href='../../process/obat/hapus_obat.php?id_obat=" . $row['id_obat'] . "' class='btn btn-danger btn-sm'>Delete</a>
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

