<?php
require 'functions.php';
// Initialize variables
$idPetani = $nama = $noHP = $asal = "";

// Check if the ID is set in the URL
if (isset($_GET['id'])) {
    $idPetani = $_GET['id'];

    // Retrieve petani's data based on the ID
    $sql = "SELECT * FROM petani WHERE id_petani = $idPetani";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $nama = $row['nama_petani'];
        $noHP = $row['no_hp'];
        $asal = $row['asal'];
    } else {
        echo "Petani not found!";
    }
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get data from POST request
    $idPetani = $_POST['idPetani'];
    $nama = $_POST['namaPetani'];
    $noHP = $_POST['noHPPetani'];
    $asal = $_POST['asalPetani'];

    // Check if idPetani is empty or not
    if (empty($idPetani)) {
      echo "
          <script>
              alert('ID petani tidak ditemukan')
              document.location.href = 'datapetani.php'
          </script>";
        // echo "Error: ID Petani is missing.";
    } else {
        // Update data in the database
        $sql = "UPDATE petani SET nama_petani='$nama', no_hp='$noHP', asal='$asal' WHERE id_petani=$idPetani";

        if ($conn->query($sql) === TRUE) {
          echo "
          <script>
              alert('data berhasil diubah')
              document.location.href = 'datapetani.php'
          </script>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
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
    <div class="judul">
<h2>Edit <span>Petani</span></h2>
</div>
<form action="" method="post">
        <!-- Add a hidden input field to carry the idPetani value -->
        <input type="hidden" name="idPetani" value="<?php echo $idPetani; ?>">
        <div class="content">
            <h5>Nama</h5>
            <input type="text" name="namaPetani" value="<?php echo $nama; ?>" required />
        </div>
        <div class="content">
            <h5>No HP</h5>
            <input type="text" name="noHPPetani" value="<?php echo $noHP; ?>" required />
        </div>
        <div class="content">
            <h5>Asal</h5>
            <input type="text" name="asalPetani" value="<?php echo $asal; ?>" required />
        </div>
        <div class="content">
            <h5>Foto</h5>
            <input type="file" name="gambarPetani" accept="image/*"value="<?php echo $asal; ?>" required />
        </div>
        <div class="content">
            <button id="save" type="submit">Simpan</button>
        </div>
    </form>
  </body>
</html>