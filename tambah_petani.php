<?php
session_start();

if (!isset($_SESSION['login'])) {
  header("Location: login.php");
  exit;
}

require 'functions.php';

// cek apakah tombol tambah sudah ditekan
if (isset($_POST['tambah'])) {
  if (tambah_petani($_POST) > 0) {
    echo "<script>
            alert('data berhasil ditambahkan');
            document.location.href = 'datapetani.php';
         </script>";
  } else {
    echo "data gagal ditambahkan!";
  }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tambah Data Pesanan</title>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=Edge">
  <meta name="description" content="">
  <meta name="keywords" content="">
  <meta name="author" content="Tooplate">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

  <!-- MAIN CSS -->
  <link rel="stylesheet" href="css/tooplate-style.css">
</head>

<body id="top" data-spy="scroll" data-target=".navbar-collapse" data-offset="50">

          <form action="" method="POST" enctype="multipart/form-data">
            <div class="wow fadeInUp" data-wow-delay="0.8s">
              <div class="col-md-6 col-sm-6">
                <label>
                  Nama :
                  <input type="text" class="form-control" name="nama" placeholder="Nama Lengkap" autofocus required>
                </label>
              </div>
                <label>
                  lama Sewa:
                  <input type="number" class="form-control" name="lama_bermain" placeholder="Lama Sewa" required>
                </label>
              </div>
              <div class="col-md-6 col-sm-6">
                <label>
                  No Telpon:
                  <input type="text" class="form-control" name="telp" placeholder="Nomer Telpon" required>
                </label>
              </div>
              <div class="col-md-6 col-sm-6">
                <label>
                  Logo Team :
                  <input type="file" name="gambar" class="gambar" onchange="previewImage()">
                </label>
                <img src="img/nophoto.jpg" width="120" style="display: block;" class="img-preview">
              </div>
              <div class="col-md-6 col-sm-6">
                <label>

              <div class="col-md-6 col-sm-6">
                <h4><button type="submit" class="btn btn-primary" name="tambah">Tambah Data</button></h4>
              </div>
              </ul>
          </form>
        </div>
      </div>
    </div>
  </section>
  <script src="js/script.js"></script>
</body>

</html>