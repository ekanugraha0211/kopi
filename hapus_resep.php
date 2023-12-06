<?php
include 'functions.php';

// Pastikan variabel $id ada dan tidak kosong
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];

    // Gantilah fungsi mysql_query dengan mysqli_query
    mysqli_query($conn, "DELETE FROM resep where id_resep='$id'") or die(mysqli_error($conn));

    // header("location:index.php?pesan=hapus");
    echo "
    <script>
        alert('data berhasil dihapus')
        document.location.href = 'resepkopi.php'
    </script>";
} else {
    echo "ID tidak valid";
}
?>
