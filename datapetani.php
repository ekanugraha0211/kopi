<?php

require 'functions.php';
$petani = query("SELECT * FROM petani;");

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
    <title>Data Petani</title>
    <link rel="stylesheet" href="curdstyle.css">
    <style>
        .aksi {
            width: 15%;
        }
    </style>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</head>
<body>

<div class="kembali">
    <a href="index.php" id="back-icon"><img src="chevron-left.svg">Kembali</a>
</div>

<div class="judul">
    <h2>Data <span>Petani</span></h2>
</div>

<div class="add">
    <a href="tambah_petani.php"><button class="tambah">Tambah</button></a>
    <form id="search-form">
        <input class="inputari" type="text" name="keyword" size="40" placeholder="Cari dengan Nama atau Kode Pesanan"
               autocomplete="off" autofocus class="keyword" id="search">
        <button type="submit" class="tombol-cari">Cari!</button>
    </form>
</div>

<table id="data-table">
    <thead>
    <tr>
        <th>Nomor</th>
        <th>Foto</th>
        <th>Nama</th>
        <th>Nomor Telepon</th>
        <th>Asal</th>
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
            <td><img src="img/<?= $p['gambar_petani']; ?>" width="60"></td>
            <td><?= $p['nama_petani']; ?></td>
            <td><?= $p['no_hp']; ?></td>
            <td><?= $p['asal']; ?></td>

            <td class="aksi">
                <a href="ubah_petani.php?id=<?= $p['id_petani']; ?>"><button class="edit-button">Edit</button></a>
                <a href="hapus_petani.php?id=<?= $p['id_petani']; ?>"><button class="delete-button">Hapus</button></a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>

<script>
    $(document).ready(function () {
        // Submit form using Ajax
        $('#search-form').submit(function (e) {
            e.preventDefault(); // Prevent normal form submission

            var keyword = $('#search').val();

            $.ajax({
                type: 'POST',
                url: 'search_petani.php', // Change this to your PHP file handling search
                data: {keyword: keyword},
                success: function (data) {
                    $('#row-contain').html(data);
                }
            });
        });
    });
</script>

</body>
</html>
