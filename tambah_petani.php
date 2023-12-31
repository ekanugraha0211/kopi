<?php
// Replace these values with your actual database credentials
require 'functions.php';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get data from POST request
    $nama = $_POST['namaPetani'];
    $noHP = $_POST['noHPPetani'];
    $asal = $_POST['asalPetani'];

    // Handle image upload
    $targetDir = "admin/tampilan/foto/"; // ubah ke directory tujuan
    $targetFile = $targetDir . basename($_FILES["gambarPetani"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    // Check if the file is an image
    // $check = getimagesize($_FILES["gambarPetani"]["tmp_name"]);
    // if ($check !== false) {
    //     echo "File is an image - " . $check["mime"] . ".";
    //     $uploadOk = 1;
    // } else {
    //   echo "
    //   <script>
    //       alert('File bukan foto')
    //   </script>";
    //     $uploadOk = 0;
    // }

    // Check if the file already exists
    if (file_exists($targetFile)) {
      echo "
      <script>
          alert('Foto sudah ada')
      </script>";
        $uploadOk = 0;
    }

    // Check file size (adjust the size as needed)
    if ($_FILES["gambarPetani"]["size"] > 500000) {
      echo "
      <script>
          alert('File terlalu besar')
      </script>";
        $uploadOk = 0;
    }

    // Allow only certain file formats
    if (
        $imageFileType != "jpg" && $imageFileType != "png" &&
        $imageFileType != "jpeg" && $imageFileType != "gif"
    ) {
      echo "
      <script>
          alert('Gunakan format jpg, png, jpeg atau gif')
      </script>";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    // if ($uploadOk == 0) {
    //   echo "
    //   <script>
    //       alert('Belum menambahkan foto')
    //   </script>";
    // } else {
    //     // Move the uploaded file to the specified directory
    //     if (move_uploaded_file($_FILES["gambarPetani"]["tmp_name"], $targetFile)) {
    //         echo "The file " . basename($_FILES["gambarPetani"]["name"]) . " has been uploaded.";
    //     } else {
    //         echo "Sorry, there was an error uploading your file.";
    //     }
    // }

    // Prepare and execute SQL query
    $sql = "INSERT INTO petani (nama_petani, no_hp, asal, gambar_petani) VALUES ('$nama', '$noHP', '$asal', '$targetFile')";

    if ($conn->query($sql) === TRUE) {
        echo "
        <script>
            alert('data berhasil ditambahkan')
            document.location.href = 'datapetani.php'
        </script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close the database connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <style>
      body {
        align-items: center;
        justify-content: center;
        font-family: "Poppins";
        margin: 0;
        padding: 0;
        background-color: rgb(55, 56, 57);
      }

      .title {
        
        color: white;
        text-align: center;
        padding: 10px;
      }
      .judul {
    text-align: center;
    margin-top: 20px; /* Menambahkan margin-top untuk memisahkan judul dari bagian atas layar */
}

.judul h2 {
    font-size: 3rem;
    font-weight: 700;
    color: #b17941;
    margin: 0; /* Menambahkan margin: 0; agar h2 tidak memiliki margin default */
}

.judul h2 span {
    color: #fff;
}

      .content {
        padding: 10px;
        margin: 10px;
        background-color: #fff;
        border: 1px solid #ccc;
        border-radius: 5px;
        
      }
      .container {
        width: 60%;
        
        margin: auto; /* Center the container horizontally */
        max-width: 800px; /* Set a maximum width for the container */
      }


      input[type="text"],
      select,
      input[type="date"] {
        width: 100%;
        padding: 8px;
        box-sizing: border-box;
        border: 1px solid #ccc;
        border-radius: 3px;
        margin: 0px;
        background-color: #ccc;
      }
      h5{
        margin: 0px;
      }

      button {
        padding: 8px 15px;
        background-color: #333;
        color: white;
        border: none;
        border-radius: 3px;
        cursor: pointer;
        background-color: rgb(7, 189, 7);
        margin-top: 5px;
      }
      .kembali {
  position: absolute;
  top: 20px;
  left: 20px;
}

#back-icon {
  text-decoration: none;
  color: white;
  display: flex;
  align-items: center;
}

#back-icon img {
  margin-right: 5px;
}
    </style>
    <title>Tugas Akhir</title>
  </head>
  <body>
  <div class="kembali">
   <a href="datapetani.php" id="back-icon"><img src="chevron-left.svg">Kembali</a>
</div>
    <section class="container">
    <<div class="judul">
<h2>Tambah <span>Petani</span></h2>
</div>
<form action="" method="post" enctype="multipart/form-data">
        <div class="content">
            <h5>Nama</h5>
            <input type="text" name="namaPetani" />
        </div>
        <div class="content">
            <h5>No HP</h5>
            <input type="text" name="noHPPetani" />
        </div>
        <div class="content">
            <h5>Asal</h5>
            <input type="text" name="asalPetani" />
        </div>
        <div class="content">
            <h5>Foto</h5>
            <input type="file" name="gambarPetani" accept="image/*">
        </div>
        <div class="content">
            <button id="save" type="submit">Simpan</button>
        </div>
    </form>    



  </body>
</html>