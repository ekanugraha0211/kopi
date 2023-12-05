<?php
session_start();

if (!isset($_SESSION['login'])) {
     header("Location: login.php");
     exit;
}

require 'functions.php';
$petani = query("SELECT * FROM petani inner join kopi on petani.id_kopi=kopi.id_kopi;");

// ketika tombol cari diklik
if (isset($_POST['cari'])) {
     $petani = cari($_POST['keyword']);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Data Kopi</title>
  <link rel="stylesheet" href="curdstyle.css">
  
  

  <!-- Feather Icon -->
  <!-- <script src="https://unpkg.com/feather-icons"></script> -->
 <!-- Feather Icon -->
 <script src="https://unpkg.com/feather-icons"></script>
</head>
<body>
<div class="kembali">
   <a href="index.php" id="back-icon"><img src="chevron-left.svg">Kembali</a>
</div>
 </div>
<div class="judul">
<h2>Data<span>Petani</span></h2>
</div>
<form class="add" method="post" action="">
    <button class="tambah" onclick="addRow()">Tambah</button>
    <input class="inputari" type="text" name="keyword" size="40" placeholder="Cari dengan Nama atau Kode Pesanan" autocomplete="off" autofocus class="keyword" id="search">
    <button type="submit" name="cari" class="tombol-cari">Cari!</button>
</form>
<table id="data-table">
  <thead>
    <tr>
      <th>Nomor</th>
      <th>Nama</th>
      <th>Nomor Telepon</th>
      <th>Asal</th>
      <th>Jenis Kopi</th>
      <th>Aksi</th>
    </tr>
  </thead>
  <tbody id="row-contain">
        <?php if (empty($petani)) : ?>
            <tr>
                  <td colspan="4">
                      <p style="color: red; font-style: italic;">Data petani tidak ditemukan!</p>
                  </td>
            </tr>
        <?php endif; ?>

        <?php $i = 1;
        foreach ($petani as $p) : ?>
            <tr>
                  <td><?= $i++; ?></td>
                  <!-- <td><img src="img/<?= $p['gambar']; ?>" width="60"></td> -->
                  <td><?= $p['nama_petani']; ?></td>
                  <td><?= $p['no_hp']; ?></td>
                  <td><?= $p['asal']; ?></td>
                  <td><?= $p['nama_kopi']; ?></td>
                  <td>
                  <button class="edit-button" onclick="editRow(1)">Edit</button>
                  <a class="delete-button" href="hapus.php?id=<?php echo $data['id']; ?>">Hapus</a>
                  <!-- <button class="delete-button" onclick="deleteRow(1)">Hapus</button> -->
                      <!-- <a href="detail.php?id=<?= $p['id']; ?>">lihat detail</a> -->
                  </td>
            </tr>
        <?php endforeach; ?>
  </tbody>
</table>

<script src="script.js"></script>

</body>
</html>
