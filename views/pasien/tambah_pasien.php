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

    <title>Data Pasien</title>

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
                <h6 class="m-0 font-weight-bold text-primary">Tambah Data Pasien</h6>
              </div>
              <div class="card-body">
                <form action="../../process/pasien/tambah_pasien.php" method="post">
                  <div class="form-group">
                    <label for="kode">Id Pasien</label>
                    <input type="text" class="form-control" id="kode" name="kode" required>
                  </div>
                  <div class="form-group">
                    <label for="nama">Nama Pasien</label>
                    <input type="text" class="form-control" id="nama" name="nama" required>
                  </div>
                  <div class="form-group">
                    <label for="tempat">Tempat Lahir</label>
                    <input type="text" class="form-control" id="tempat" name="tempat" required>
                  </div>
                  <div class="form-group">
                    <label for="tgl">Tanggal Lahir</label>
                    <input type="date" class="form-control" id="tgl" name="tgl" required>
                  </div>
                  <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <input type="text" class="form-control" id="alamat" name="alamat" required>
                  </div>
                  <div class="form-group">
                    <label for="telepon">Telepon</label>
                    <input type="tel" class="form-control" id="telepon" name="telepon" required>
                  </div>
                  <button type="submit" class="btn btn-primary mt-3">Simpan Data</button>
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
		include 'config.php';

		$query = "SELECT * FROM pasien";
		$result = mysqli_query($conn, $query);

		if (mysqli_num_rows($result) > 0) {
			echo "<table border='1'>";
			echo "<tr><th>Id Pasien</th><th>Nama Pasien</th><th>Jenis Pasien</th><th>Harga Pasien</th><th>Stok</th><th>Kadaluwarsa</th><th>Aksi</th></tr>";
			
			while ($row = mysqli_fetch_assoc($result)) {
				echo "<tr>";
				echo "<td>" . $row['id_pasien'] . "</td>";
				echo "<td>" . $row['nama_pasien'] . "</td>";
				echo "<td>" . $row['jenis_pasien'] . "</td>";
				echo "<td>" . $row['harga_pasien'] . "</td>";
				echo "<td>" . $row['stok'] . "</td>";
        		echo "<td>" . $row['kadaluwarsa'] . "</td>";
				echo "<td>
						<a href='editpasien.php?id_pasien=" . $row['id_pasien'] . "'>Edit</a> |
						<a href='hapuspasien.php?id_pasien=" . $row['id_pasien'] . "' onclick=\"return confirm('Apakah anda ingin menghapus data tersebut?');\">Hapus</a>
					  </td>";
			}
			echo "</table>";
		} else {
			echo "No data found";
		}

		mysqli_close($conn);
		?>