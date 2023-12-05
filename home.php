<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>NgopiNow</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,400;0,600;0,700;1,600;1,700&display=swap"
      rel="stylesheet"
    />

    <!-- Feather Icon -->
    <script src="https://unpkg.com/feather-icons"></script>

    <!-- Style CSS -->
    <link rel="stylesheet" href="home.css" />

    <!-- Bootstrap -->
    <!-- <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
      crossorigin="anonymous"
    />
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
      crossorigin="anonymous"
    ></script> -->
  </head>

  <body>
    <?php require "header.php"; ?>

    <!-- Section Jenis Kopi -->
    <section class="jeniskopi" id="Jenis Kopi">
      <h2>Jenis<span>Kopi</span></h2>
      <div class="container">
        <div class="card-1">
          <img src="img/kopiluwak.png" />
          <h6>Kopi Luwak</h6>
          <button class="btn_jeniskopi">Lihat Detail Kopi</button>
        </div>
        <div class="card-2">
          <img src="img/Kopi Robusta.jpg" />
          <h6>Kopi Robusta</h6>
          <button class="btn_jeniskopi">Lihat Detail Kopi</button>
        </div>
        <div class="card-3">
          <img src="img/Kopi Arabica.png" />
          <h6>Kopi Arabica</h6>
          <button class="btn_jeniskopi">Lihat Detail Kopi</button>
        </div>
      </div>
    </section>

    <!-- Section Resep Olahan Kopi -->
    <section class="resepkopi" id="Resep Olahan Kopi">
      <div class="isi">
        <h2>Resep Olahan Kopi</h2>
      </div>
      <div class="row">
        <div class="resep-img">
          <img src="img/olahankopi.jpg">
        </div>
        <div class="resep-text">
        <p> Untuk kamu yang bosan dengan olahan kopi seduh, coba nikmati sensasi
            baru
            <br />
            dengan mencicipi kopi dalam berbagai varian yang unik. Cobalah kopi
            dingin,
            <br />
            sambal dari kopi yang menyegarkan di musim panas atau eksplorasi
            berbagai
            <br />
            rasa kopi kreatif seperti kopi dengan hint buah-buahan atau
            rempah-rempah.
        </p>
        <a href="#" class="btn_resep">Lihat Selengkapnya</a>
        </div>
      </div>
    </section>
   

    <!-- Section Data Petani -->
    <section class="datapetani" id="Data Petani">
      <h2>Data<span>Petani</span></h2>
      <div class="data">
        <div class="c1">
          <img src="img/petani1.jpg" />
          <h6>Reni</h6>
          <button class="btn_datapetani">Lihat Selengkapnya</button>
        </div>
        <div class="c2">
          <img src="img/petani2.jpg" />
          <h6>Joko</h6>
          <button class="btn_datapetani">Lihat Selengkapnya</button>
        </div>
        <div class="c3">
          <img src="img/petani3.jpg" />
          <h6>Sri</h6>
          <button class="btn_datapetani">Lihat Selengkapnya</button>
        </div>
      </div>
    </section>

    <!-- Footer -->
    <?php include 'footer.php'; ?>
    <!-- Feather Icon -->
    <script>
      feather.replace();
    </script>

    <!-- JS -->
    <script src="script.js"></script>
  </body>
</html>
