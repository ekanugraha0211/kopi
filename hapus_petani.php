

<?php
include 'functions.php';

// Pastikan variabel $id ada dan tidak kosong
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];

    // Gantilah fungsi mysql_query dengan mysqli_query
    mysqli_query($conn, "Delete FROM petani inner join kopi on petani.id_kopi=kopi.id_kopi; WHERE id='$id'") or die(mysqli_error($conn));

    header("location:index.php?pesan=hapus");
} else {
    echo "ID tidak valid";
}
?>
