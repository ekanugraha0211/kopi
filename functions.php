<?php
// require 'functions.php';

// function koneksi()
// {
//   return mysqli_connect('', 'root', '', 'db_ngopinow');
// }

$conn = mysqli_connect('', 'root', '', 'db_ngopinow');


function queryAll($query)
{
//   $conn = koneksi();
  global $conn;
  $result = mysqli_query($conn, $query);

  // // jika hasilnya hanya 1 data
  // if (mysqli_num_rows($result) == 1) {
  //   return mysqli_fetch_assoc($result);
  // }

  $rows = [];
  while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
  }

  return $rows;
}

function query($query)
{
//   $conn = koneksi();
  global $conn;
  $result = mysqli_query($conn, $query);

  // jika hasilnya hanya 1 data
  if (mysqli_num_rows($result) == 1) {
    return mysqli_fetch_assoc($result);
  }

  $rows = [];
  while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
  }

  return $rows;
}

function upload()
{
  $nama_file = $_FILES['gambar']['name'];
  $tipe_file = $_FILES['gambar']['type'];
  $ukuran_file = $_FILES['gambar']['size'];
  $error = $_FILES['gambar']['error'];
  $tmp_file = $_FILES['gambar']['tmp_name'];

  // ketika tidak ada gambar yang dipilih
  if ($error == 4) {
    // echo "<script>
    //       alert('Pilih gambar terlebih dahulu!')
    //       </script>";
    return 'nophoto.jpg';
  }

  // cek ekstensi file
  $daftar_gambar = ['jpg', 'jpeg', 'png'];
  $ekstensi_file = explode('.', $nama_file);
  $ekstensi_file = strtolower(end($ekstensi_file));
  if (!in_array($ekstensi_file, $daftar_gambar)) {
    echo "<script>
          alert('Yang Anda pilih bukan gambar!')
          </script>";
    return false;
  }

  // cek type file
  if ($tipe_file != 'image/jpeg' && $tipe_file != 'image/png') {
    echo "<script>
          alert('Yang Anda pilih bukan gambar!')
          </script>";
    return false;
  }

  // ukuran file maximal 5Mb = 5000000
  if ($ukuran_file > 5000000) {
    echo "<script>
          alert('Ukuran File terlalu besar!')
          </script>";
    return false;
  }

  // Lolos pengecekan
  // Siap upload file
  // generate nama file baru ke unik
  $nama_file_baru = uniqid();
  $nama_file_baru .= '.';
  $nama_file_baru .= $ekstensi_file;
  move_uploaded_file($tmp_file, 'img/' . $nama_file_baru);

  return $nama_file_baru;
}

function tambah_petani($data)
{
//   $conn = koneksi();
  global $conn;
  $nama = htmlspecialchars($data['nama_petani']);
  $telp = htmlspecialchars($data['no_hp']);
  $lama_bermain = htmlspecialchars($data['asal']);
  $kopi = htmlspecialchars($data['nama_kopi']);

  //Upload gambar
  $gambar = upload();
  if (!$gambar) {
    return false;
  }
  $user = $_COOKIE['user'];
  $a = $conn->query("select id from user where username = '$user'");
  $b = mysqli_fetch_array($a);
  $id = $b['id'];


  $query = "INSERT INTO
              petani (nama, gambar, lama_bermain, telp, user_id)
              VALUES 
              ('$nama','$gambar','$lama_bermain','$telp','$id');
              ";
  mysqli_query($conn, $query) or die(mysqli_error($conn));
  echo mysqli_error($conn);
  return mysqli_affected_rows($conn);
}

function hapus_elpha($id)
{
//   $conn = koneksi();
  global $conn;
  // menghapus gambar di folder img
  $p = query("SELECT * FROM pel_elpha WHERE id = $id");
  if ($p['gambar'] != 'nophoto.jpg') {
    unlink('img/' . $p['gambar']);
  }

  mysqli_query($conn, "DELETE FROM pel_elpha WHERE id = $id") or die(mysqli_error($conn));
  return mysqli_affected_rows($conn);
}

function ubah_elpha($data)
{
//   $conn = koneksi();
  global $conn;
  $id = $data['id'];
  $nama = htmlspecialchars($data['nama']);
  $telp = htmlspecialchars($data['telp']);
  $lama_bermain = htmlspecialchars($data['lama_bermain']);
  $gambar_lama = htmlspecialchars($data['gambar_lama']);

  $gambar = upload();
  if (!$gambar) {
    return false;
  }

  if ($gambar == 'nophoto.jpg') {
    $gambar = $gambar_lama;
  }

  $query = "UPDATE pel_elpha SET
              nama = '$nama',
              telp = '$telp',
              lama_bermain = '$lama_bermain',
              gambar = '$gambar'
            WHERE id = $id";

  mysqli_query($conn, $query) or die(mysqli_error($conn));
  echo mysqli_error($conn);
  return mysqli_affected_rows($conn);
}


function login($data)
{
//   $conn = koneksi();
  global $conn;
  $username = htmlspecialchars($data['username']);
  $password = htmlspecialchars($data['password']);

  // cek dulu username 
  if ($user = query("SELECT * FROM user WHERE username = '$username'")) {
    // cek password
    if (password_verify($password, $user['password'])) {
      // set session
      $_SESSION['login'] = true;
      setcookie('user', $username);
      header("Location: index.php");
      exit;
    }
  }
  return [
    'error' => true,
    'pesan' => 'Username / Password Salah!'
  ];
}


function registrasi($data)
{
//   $conn = koneksi();
  global $conn;
  $nama = htmlspecialchars(strtolower($data['nama']));
  $email = htmlspecialchars(strtolower($data['email']));
  $tglLahir = ($data['tglLahir']);
  $username = htmlspecialchars(strtolower($data['username']));
  $password1 = mysqli_real_escape_string($conn, $data['password1']);
  $password2 = mysqli_real_escape_string($conn, $data['password2']);
  $gambar = upload();
  if (!$gambar) {
    return false;
  }

  //jika username / password kosong
  if (empty($nama) || empty($email) || empty($tglLahir) || empty($username) || empty($password1) || empty($password2)) {
    echo "<script>
          alert('Semua data kecuali Foto tidak boleh  kosong!');
          document.location.href = 'registrasi.php';
          </script>";

    return false;
  }

  //jika username sudah aada
  if (query("SELECT * FROM user WHERE username = '$username'")) {
    echo "<script>
    alert('username sudah terdaftar!');
    document.location.href = 'registrasi.php';
    </script>";

    return false;
  }
  //jika konfirmasi password tidak sesuai
  if ($password1 !== $password2) {
    echo "<script>
    alert('konfirmasi password tidak sesuai!');
    document.location.href = 'registrasi.php';
    </script>";

    return false;
  }

  // jika password <5 digit
  if (strlen($password1) < 5) {
    echo "<script>
    alert('password terlalu pendek!');
    document.location.href = 'registrasi.php';
    </script>";

    return false;
  }

  //jika username dan password sudah sesuai
  //enkripsi password
  $password_baru = password_hash($password1, PASSWORD_DEFAULT);

  //Inser ke table user
  $query = "INSERT INTO user (nama, email, tglLahir, username, password, gambar)
            VALUES ('$nama', '$email', '$tglLahir', '$username', '$password_baru', '$gambar')";
              
  mysqli_query($conn, $query) or die(mysqli_error($conn));
  echo mysqli_error($conn);
  return mysqli_affected_rows($conn);
}



function cari($data){
  $keyword = htmlspecialchars($data['keyword']);

  $petani = queryAll("SELECT * FROM petani inner join kopi on petani.id_kopi=kopi.id_kopi where nama_petani LIKE '%$keyword%'");
  return $petani;
}