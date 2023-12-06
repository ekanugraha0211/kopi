<?php 
    require 'functions.php';
    $sql = "SELECT COUNT(*) as total FROM petani";
    $result = $conn->query($sql);

    // Check if the query was successful
    if ($result) {
        $row = $result->fetch_assoc();
        $totalPetani = $row['total'];
    } else {
        $totalPetani = 0; // Set to 0 if there is an error
    }
    $sql2 = "SELECT COUNT(*) as total FROM kopi";
    $result = $conn->query($sql2);

    // Check if the query was successful
    if ($result) {
        $row = $result->fetch_assoc();
        $totalKopi = $row['total'];
    } else {
        $totalKopi = 0; // Set to 0 if there is an error
    }
    $sql3 = "SELECT COUNT(*) as total FROM resep";
    $result = $conn->query($sql3);

    // Check if the query was successful
    if ($result) {
        $row = $result->fetch_assoc();
        $totalResep = $row['total'];
    } else {
        $totalResep = 0; // Set to 0 if there is an error
    }

    // Close the database connection
    $conn->close();
    ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8" />
    <title>Sidebar Menu Bar CSS</title>
    <link rel="stylesheet" href="style.css" />
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,400;0,600;0,700;1,600;1,700&display=swap"
      rel="stylesheet"
    />
    <!-- Feather Icon -->
    <script src="https://unpkg.com/feather-icons"></script>
  </head>
  <body>
    <input type="checkbox" id="check" />
    <label for="check">
      <i class="fas fa-bars" id="btn"></i>
      <i class="fas fa-times" id="cancel"></i>
    </label>
    <div class="sidebar">
      <header>Ngopi<span>Now</span></header>
      <ul>
        <li>
          <a href="#"><i class="fas fa-qrcode"></i>Dashboard</a>
        </li>
        <li>
          <a href="datapetani.php"><i class="fas fa-link"></i>Data Petani</a>
        </li>
        <li>
          <a href="jeniskopi.php"><i class="fas fa-stream"></i>Jenis Kopi</a>
        </li>
        <li>
          <a href="resepkopi.php"><i class="fas fa-calendar-week"></i>Resep Kopi</a>
        </li>
        <li>
          <a href="index.php"><i class="far fa-logout"></i>Logout</a>
        </li>
      </ul>
    </div>
    <div class="judul">
      <h2>Welcome Admin!</h2>
    </div>
    <div class="container">
      <div class="card">
        <div class="box">
          <h1>Data Petani</h1>
          <h2><?php echo $totalPetani; ?></h2>
          <h3>Petani</h3>
        </div>
      </div>
      <div class="card">
        <div class="box">
          <h1>Jenis Kopi</h1>
          <h2><?php echo $totalKopi?></h2>
          <h3>Kopi</h3>
        </div>
      </div>
      <div class="card">
        <div class="box">
          <h1>Resep Kopi</h1>
          <h2><?php echo $totalResep; ?></h2>
          <h3>Resep Olahan</h3>
        </div>
      </div>
    </div>
  </body>
</html>
