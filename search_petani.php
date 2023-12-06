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
    $sql = "SELECT * FROM petani WHERE nama_petani LIKE '%$keyword%' OR no_hp LIKE '%$keyword%' OR asal LIKE '%$keyword%'";
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
                <td>{$p['id_petani']}</td>
                <td><img src='img/{$p['gambar_petani']}' width='60'></td>
                <td>{$p['nama_petani']}</td>
                <td>{$p['no_hp']}</td>
                <td>{$p['asal']}</td>
                <td class='aksi'>
                    <a href='ubah_petani.php?id={$p['id_petani']}'><button class='edit-button'>Edit</button></a>
                    <a href='hapus_petani.php?id={$p['id_petani']}'><button class='delete-button'>Hapus</button></a>
                </td>
            </tr>
        ";
    }
} else {
    // Jika tidak ada keyword, tampilkan pesan tidak ditemukan
    echo "<tr><td colspan='6'><p style='color: red; font-style: italic;'>Data petani tidak ditemukan!</p></td></tr>";
}

?>
