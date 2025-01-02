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

            
        <?php
        include "../components/footer.php"
        ?>
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
