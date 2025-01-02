<?php
    // Koneksi ke database
    include '../../config/config.php';

    // Cek apakah form telah disubmit
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $tanggal_awal = $_POST['tanggal_awal'];
        $tanggal_akhir = $_POST['tanggal_akhir'];

        // Query untuk menampilkan data pembayaran berdasarkan rentang tanggal
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
                    pembayaran.tgl_bayar BETWEEN ? AND ?";

    
    // Prepare statement
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("ss", $tanggal_awal, $tanggal_akhir);
        $stmt->execute();
        $stmt->bind_result($id_bayar, $nama_pasien, $nama_obat, $nama_dokter, $tgl_bayar, $jumlah_bayar);
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
      <ul
        class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion"
        id="accordionSidebar"
      >
      <a
          class="sidebar-brand"
          href="../../home.html"
        >
          <div class="sidebar-brand-text">Apotek Keluarga</div>
          </a>

        <hr class="sidebar-divider my-0" />

        <li class="nav-item">
          <a class="nav-link" href="../../home.html">
            <i class="fas fa-fw fa-home"></i>
            <span>Home</span></a
          >
        </li>

        <hr class="sidebar-divider" />

        <li class="nav-item">
          <a class="nav-link" href="../obat">
            <i class="fas fa-fw fa-pills"></i>
            <span>Data Obat</span></a
          >
        </li>

        <li class="nav-item">
          <a class="nav-link" href="../pasien">
            <i class="fas fa-fw fa-user-injured"></i>
            <span>Data Pasien</span></a
          >
        </li>

        <li class="nav-item">
          <a class="nav-link" href="../dokter">
            <i class="fas fa-fw fa-user-md"></i>
            <span>Data Dokter</span></a
          >
        </li>

        <li class="nav-item">
          <a class="nav-link" href="../pembayaran">
            <i class="fas fa-fw fa-credit-card"></i>
            <span>Data Pembayaran</span></a
          >
        </li>

        <li class="nav-item active">
          <a class="nav-link" href="../report">
            <i class="fas fa-fw fa-file-alt"></i>
            <span>Data Report</span></a
          >
        </li>

        <hr class="sidebar-divider d-none d-md-block" />

        <div class="text-center d-none d-md-inline">
          <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>
      </ul>

      <div id="content-wrapper" class="d-flex flex-column">
        <div id="content">
          <nav
            class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow"
          >
            <form class="form-inline">
              <button
                id="sidebarToggleTop"
                class="btn btn-link d-md-none rounded-circle mr-3"
              >
                <i class="fa fa-bars"></i>
              </button>
            </form>

            <form
              class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search"
            >
              <div class="input-group">
                <input
                  type="text"
                  class="form-control bg-light border-0 small"
                  placeholder="Search for..."
                  aria-label="Search"
                  aria-describedby="basic-addon2"
                />
                <div class="input-group-append">
                  <button class="btn btn-primary" type="button">
                    <i class="fas fa-search fa-sm"></i>
                  </button>
                </div>
              </div>
            </form>

            <ul class="navbar-nav ml-auto">
              <li class="nav-item dropdown no-arrow d-sm-none">
                <a
                  class="nav-link dropdown-toggle"
                  href="#"
                  id="searchDropdown"
                  role="button"
                  data-toggle="dropdown"
                  aria-haspopup="true"
                  aria-expanded="false"
                >
                  <i class="fas fa-search fa-fw"></i>
                </a>
                <div
                  class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                  aria-labelledby="searchDropdown"
                >
                  <form class="form-inline mr-auto w-100 navbar-search">
                    <div class="input-group">
                      <input
                        type="text"
                        class="form-control bg-light border-0 small"
                        placeholder="Search for..."
                        aria-label="Search"
                        aria-describedby="basic-addon2"
                      />
                      <div class="input-group-append">
                        <button class="btn btn-primary" type="button">
                          <i class="fas fa-search fa-sm"></i>
                        </button>
                      </div>
                    </div>
                  </form>
                </div>
              </li>

              <li class="nav-item dropdown no-arrow">
                <a
                  class="nav-link dropdown-toggle"
                  href="#"
                  id="userDropdown"
                  role="button"
                  data-toggle="dropdown"
                  aria-haspopup="true"
                  aria-expanded="false"
                >
                  <span class="mr-2 d-none d-lg-inline text-gray-600 small"
                    >Douglas McGee</span
                  >
                  <img
                    class="img-profile rounded-circle"
                    src="../../assets/img/undraw_profile.svg"
                  />
                </a>
                <div
                  class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                  aria-labelledby="userDropdown"
                >
                <a
                    class="dropdown-item"
                    href="../../logout.php"
                  >
                    <i
                      class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"
                    ></i>
                    Logout
                  </a>
                </div>
              </li>
            </ul>
          </nav>

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

        <footer class="sticky-footer bg-white">
          <div class="container my-auto">
            <div class="copyright text-center my-auto">
              <span>Copyright &copy; Your Website 2020</span>
            </div>
          </div>
        </footer>
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