<?php
session_start();

if (!isset($_SESSION['login'])) {
     header("Location: login.php");
     exit;
}

require 'functions.php';
$petani = query("SELECT bahan.*, resep.*
FROM detail_resep
JOIN bahan ON detail_resep.id_bahan = bahan.id_bahan
JOIN resep ON detail_resep.id_resep = resep.id_resep;
;");

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
  <link rel="stylesheet" href="datapetani.css">
  <!-- Feather Icon -->
  <!-- <script src="https://unpkg.com/feather-icons"></script> -->
 <!-- Feather Icon -->
 <script src="https://unpkg.com/feather-icons"></script>
</head>
<body>
<div class="kembali">
   <a href="#" id="back-icon"><img src="chevron-left.svg"></a>
</div>icon"><i data-feather="chevron-left"></i></a>
 </div>
<div class="judul">
<h2>Jenis<span>Kopi</span></h2>
</div>
<div class="add">
  <button class="tambah" onclick="addRow()">Tambah</button>
  <input type="text" name="keyword" style="margin-left: 70px;" size="40" placeholder="Cari dengan Nama atau Kode Pesanan" autocomplete="off" autofocus class="keyword" id="search">
  <button type="submit" name="cari" class="tombol-cari">Cari!</button>
</div>

<table id="data-table">
  <thead>
    <tr>
      <th>Nomor</th>
      <th>Nama</th>
      <th>Bahan</th>
      <th>Cara Pembuatan</th>
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
                  <!-- <td><img src="img/<?= $p['gambar_kopi']; ?>" width="60"></td> -->
                  <td><?= $p['nama_resep']; ?></td>
                  <td><?= $p['nama_bahan']; ?></td>
                  <td><?= $p['cara']; ?></td>
                  <td>
                  <button class="edit-button" onclick="editRow(1)">Edit</button>
                  <button class="delete-button" onclick="deleteRow(1)">Hapus</button>
                      <!-- <a href="detail.php?id=<?= $p['id']; ?>">lihat detail</a> -->
                  </td>
            </tr>
        <?php endforeach; ?>
  </tbody>
</table>

<script src="script.js"></script>

</body>
</html>
