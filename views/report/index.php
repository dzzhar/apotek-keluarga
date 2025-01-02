<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <title>Data Report</title>

    <!-- Custom fonts and styles -->
    <link href="../../assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,300,400,600,700,800,900" rel="stylesheet" />
    <link href="../../assets/css/sb-admin-2.min.css" rel="stylesheet" />
    <link href="../../assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" />
</head>

<body id="page-top">
    <div id="wrapper">
        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="../../home.html">
                <div class="sidebar-brand-text">Apotek Keluarga</div>
            </a>

            <hr class="sidebar-divider my-0" />

            <li class="nav-item">
                <a class="nav-link" href="../../home.html">
                    <i class="fas fa-fw fa-home"></i>
                    <span>Home</span>
                </a>
            </li>

            <hr class="sidebar-divider" />

            <li class="nav-item">
                <a class="nav-link" href="../obat">
                    <i class="fas fa-fw fa-pills"></i>
                    <span>Data Obat</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="../pasien">
                    <i class="fas fa-fw fa-user-injured"></i>
                    <span>Data Pasien</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="../dokter">
                    <i class="fas fa-fw fa-user-md"></i>
                    <span>Data Dokter</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="../pembayaran">
                    <i class="fas fa-fw fa-credit-card"></i>
                    <span>Data Pembayaran</span>
                </a>
            </li>

            <li class="nav-item active">
                <a class="nav-link" href="../report">
                    <i class="fas fa-fw fa-file-alt"></i>
                    <span>Data Report</span>
                </a>
            </li>

            <hr class="sidebar-divider d-none d-md-block" />

            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>
        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>

                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Douglas McGee</span>
                                <img class="img-profile rounded-circle" src="../../assets/img/undraw_profile.svg" />
                            </a>
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="../../logout.php">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>
                    </ul>
                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                  <div class="card shadow mb-4 mt-5">
                      <div class="card-header py-3 d-flex flex-row justify-content-between align-items-center flex-wrap">
                          <h6 class="m-0 font-weight-bold text-primary">Report</h6>
                      </div>
                      <div class="card-body">
                          <!-- Informasi Perkode Bayar -->
                          <div class="d-flex flex-row justify-content-between align-items-start flex-wrap mb-5">
                              <h2 class="h4 w-25">Informasi Perkode Bayar</h2>
                              <div class="card w-75">
                                  <div class="card-body">
                                      <form action="report_id.php" method="post">
                                          <div class="form-group">
                                              <label for="id_bayar">Id Bayar</label>
                                              <select class="form-control" id="id_bayar" name="id_bayar" required>
                                                  <?php
                                                  include '../../config/config.php';
                                                  $result = $conn->query("SELECT id_bayar FROM pembayaran");
                                                  if ($result->num_rows > 0) {
                                                      while ($row = $result->fetch_assoc()) {
                                                          echo "<option value='" . $row['id_bayar'] . "'>" . $row['id_bayar'] . "</option>";
                                                      }
                                                  } else {
                                                      echo "<option value=''>No items available</option>";
                                                  }
                                                  ?>
                                              </select>
                                          </div>
                                          <button type="submit" class="btn btn-primary">Submit</button>
                                      </form>
                                  </div>
                              </div>
                          </div>

                          <!-- Informasi PerTanggal -->
                          <div class="d-flex flex-row justify-content-between align-items-start flex-wrap pt-5 mb-5">
                              <h2 class="h4 w-25">Informasi PerTanggal</h2>
                              <div class="card w-75">
                                  <div class="card-body">
                                      <form action="report_tanggal.php" method="post">
                                          <div class="form-group">
                                              <label for="tgl_bayar">Tanggal:</label>
                                              <input type="date" class="form-control" id="tgl_bayar" name="tgl_bayar" required>
                                          </div>
                                          <button type="submit" class="btn btn-primary">Submit</button>
                                      </form>
                                  </div>
                              </div>
                          </div>

                          <!-- Informasi PerPeriode -->
                          <div class="d-flex flex-row justify-content-between align-items-start flex-wrap pt-5 mb-5">
                              <h2 class="h4 w-25">Informasi PerPeriode</h2>
                              <div class="card w-75">
                                  <div class="card-body">
                                      <form action="report_periode.php" method="post">
                                          <div class="form-group">
                                              <label for="tanggal_awal">Tanggal Awal:</label>
                                              <input type="date" class="form-control" id="tanggal_awal" name="tanggal_awal" required>
                                          </div>
                                          <div class="form-group">
                                              <label for="tanggal_akhir">Tanggal Akhir:</label>
                                              <input type="date" class="form-control" id="tanggal_akhir" name="tanggal_akhir" required>
                                          </div>
                                          <button type="submit" class="btn btn-primary">Submit</button>
                                      </form>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2020</span>
                    </div>
                </div>
            </footer>
        </div>
        <!-- End of Content Wrapper -->
    </div>

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Scripts -->
    <script src="../../assets/vendor/jquery/jquery.min.js"></script>
    <script src="../../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../../assets/vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="../../assets/js/sb-admin-2.min.js"></script>
</body>

</html>
