<?php

require 'functions.php';
function connectDB() {
    // $servername = "localhost";
    // $username = "username"; // Ganti dengan username database Anda
    // $password = "password"; // Ganti dengan password database Anda
    // $dbname = "db_ngopinow"; // Ganti dengan nama database Anda

    // Buat koneksi
    $conn = mysqli_connect('', 'root', '', 'db_ngopinow');

    // Cek koneksi
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    return $conn;
}
function cari($keyword) {
    $conn = connectDB();

    // Query pencarian
    $sql = "SELECT * FROM resep WHERE nama_resep LIKE '%$keyword%' OR cara LIKE '%$keyword%' OR bahan LIKE '%$keyword%'";
    $result = $conn->query($sql);

    $data = [];

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
    }

    // Tutup koneksi
    $conn->close();

    return $data;
}

// ketika tombol cari diklik
if (isset($_POST['keyword'])) {
    $keyword = $_POST['keyword'];
    $petani = cari($keyword);

    // Tampilkan hasil pencarian
    foreach ($petani as $p) {
        echo "
            <tr>
                <td>{$p['id_resep']}</td>
                <td>{$p['nama_resep']}</td>
                <td>{$p['cara']}</td>
                <td>{$p['bahan']}</td>
                <td class='aksi'>
                    <a href='ubah_resep.php?id={$p['id_resep']}'><button class='edit-button'>Edit</button></a>
                    <a href='hapus_resep.php?id={$p['id_resep']}'><button class='delete-button'>Hapus</button></a>
                </td>
            </tr>
        ";
    }
} else {
    // Jika tidak ada keyword, tampilkan pesan tidak ditemukan
    echo "<tr><td colspan='6'><p style='color: red; font-style: italic;'>Data petani tidak ditemukan!</p></td></tr>";
}

?>
