<?php
// session_start();

// if (!isset($_SESSION['login'])) {
//      header("Location: login.php");
//      exit;
// }

require 'functions.php';
$jenis = query("SELECT * FROM kopi;");

// ketika tombol cari diklik
if (isset($_POST['cari'])) {
     $jenis = cari($_POST['keyword']);
}

?>
<!DOCTYPE html>
<html lang="en">      
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Data Kopi</title>
  <link rel="stylesheet" href="jeniskopi.css">
  
  </style>
 <script src="https://unpkg.com/feather-icons"></script>
</head>
<body>
<div class="kembali">
   <a href="index.php" id="back-icon"><img src="chevron-left.svg">Kembali</a>
</div>
<div class="judul">
<h2>Jenis <span>Kopi</span></h2>
</div>  
<div class="add" >
  <a href="tambah_kopi.php"><button class="tambah">Tambah</button></a>
  <form method="post" action="">
      <input class="inputari" type="text" name="keyword" size="40" placeholder="Cari dengan Nama atau Kode Pesanan" autocomplete="off" autofocus class="keyword" id="search">
      <button type="submit" name="cari" class="tombol-cari">Cari!</button>
  </form>
</div>
<table id="data-table">
  <thead>
    <tr>
      <th>Nomor</th>
      <th>Gambar</th>
      <th>Nama</th>
      <th>Asal</th>
      <th>Deskripsi</th>
      <th>Aksi</th>
    </tr>
  </thead>
  <tbody id="row-contain">
        <?php if (empty($jenis)) : ?>
            <tr>
                  <td colspan="4">
                      <p style="color: red; font-style: italic;">Data jenis kopi tidak ditemukan!</p>
                  </td>
            </tr>
        <?php endif; ?>

        <?php $i = 1;
        foreach ($jenis as $p) : ?>
            <tr>
                  <td><?= $i++; ?></td>
                  <td><img src="img/<?= $p['gambar_kopi']; ?>" width="60"></td>
                  <td><?= $p['nama_kopi']; ?></td>
                  <td><?= $p['asal']; ?></td>
                  <td><?= $p['deskripsi']; ?></td>
                  <td class="aksi">
                  <a href="ubah_jenis.php?id=<?= $p['id_kopi']; ?>"><button class="edit-button">Edit</button></a>
                  <a href="hapus_jenis.php?id=<?= $p['id_kopi']; ?>"><button class="delete-button">Hapus</button></a>
                  </td>
                  <!-- <td class="aksi">
                  <button class="edit-button" onclick="editRow(1)">Edit</button>
                    <a class="delete-button" href="hapus_jenis.php?id=<?= $p['id_kopi']; ?>">Hapus</a>
                  </td> -->
            </tr>
        <?php endforeach; ?>
  </tbody>
</table>

<script src="script.js"></script>

</body>
</html>
