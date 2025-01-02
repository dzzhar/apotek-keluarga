<?php
include '../../config/config.php';

if(isset($_GET['id_obat'])) {
    $id_obat = $_GET['id_obat'];

    // Fetch data of the selected item from the database
    $query = "SELECT * FROM obat WHERE id_obat = '$id_obat'";
    $result = mysqli_query($conn, $query);

    if(mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
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
              <div class="card-header py-3 d-flex flex-row justify-content-between align-items-center flex-wrap">
                <h6 class="m-0 font-weight-bold text-primary">Edit Data Obat</h6>
              </div>
              <div class="card-body">
                <form action="../../process/obat/update_obat.php" method="post">
                  <div class="form-group">
                  <input type="hidden" class="form-control" id="id_obat" name="id_obat" value="<?php echo $row['id_obat']; ?>" required readonly>
                  </div>
                  <div class="form-group">
                    <label for="nama">Nama Obat</label>
                    <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $row['nama_obat']; ?>" required>
                  </div>
                  <div class="form-group">
                    <label for="jenis">Jenis Obat</label>
                    <input type="text" class="form-control" id="jenis" name="jenis" value="<?php echo $row['jenis_obat']; ?>" required>
                  </div>
                  <div class="form-group">
                    <label for="harga">Harga Obat</label>
                    <input type="number" class="form-control" id="harga" name="harga" value="<?php echo $row['harga_obat']; ?>" required>
                  </div>
                  <div class="form-group">
                    <label for="stok">Stok</label>
                    <input type="number" class="form-control" id="stok" name="stok" value="<?php echo $row['stok']; ?>" required>
                  </div>
                  <div class="form-group">
                    <label for="kadaluwarsa">Kadaluwarsa</label>
                    <input type="date" class="form-control" id="kadaluwarsa" name="kadaluwarsa" value="<?php echo $row['kadaluwarsa']; ?>" required>
                  </div>
                  <button type="submit" class="btn btn-primary mt-3" value="Update">Simpan Data</button>
                </form>
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
<?php
    } else {
        echo "Item not found.";
    }
} else {
    echo "Invalid request.";
}

mysqli_close($conn);
?>