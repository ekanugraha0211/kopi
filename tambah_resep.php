<?php
// Replace these values with your actual database credentials
require 'functions.php';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get data from POST request
    $namaResep = $_POST['namaResep'];
    $cara = $_POST['cara'];
    $bahan = $_POST['bahan'];

    
    // Prepare and execute SQL query
    $sql = "INSERT INTO resep (nama_resep, cara, bahan) VALUES ('$namaResep', '$cara', '$bahan')";

    if ($conn->query($sql) === TRUE) {
        echo "
        <script>
            alert('data berhasil ditambahkan')
            document.location.href = 'resepkopi.php'
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
    <title>Data Kopi</title>
  </head>
  <body>
  <div class="kembali">
   <a href="resepkopi.php" id="back-icon"><img src="chevron-left.svg">Kembali</a>
</div>
    <section class="container">
    <<div class="judul">
<h2>Tambah <span>Resep</span></h2>
</div>
<form action="" method="post" enctype="multipart/form-data">
        <div class="content">
            <h5>Nama</h5>
            <input type="text" name="namaResep" />
        </div>
        <div class="content">
            <h5>Tata Cara</h5>
            <input type="text" name="cara" />
        </div>
        <div class="content">
            <h5>Bahan</h5>
            <input type="text" name="bahan" />
        </div>
        <div class="content">
            <button id="save" type="submit">Simpan</button>
        </div>
    </form>    



  </body>
</html>