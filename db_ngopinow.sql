-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 04 Des 2023 pada 18.53
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_ngopinow`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `email_admin` varchar(100) NOT NULL,
  `password` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `email_admin`, `password`) VALUES
(1, 'ngopinow@gmail.com', 'ngopinow');

-- --------------------------------------------------------

--
-- Struktur dari tabel `bahan`
--

CREATE TABLE `bahan` (
  `id_bahan` int(11) NOT NULL,
  `nama_bahan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `bahan`
--

INSERT INTO `bahan` (`id_bahan`, `nama_bahan`) VALUES
(1, 'Susu'),
(2, 'Tepung Terigu'),
(3, 'Air'),
(4, 'Gula'),
(5, 'Cabe'),
(6, 'Vanila Bubuk'),
(7, 'Bawang Putih'),
(8, 'Minyak Goreng'),
(9, 'Air Jeruk Nipis'),
(10, 'Garam'),
(11, 'Yogurt'),
(12, 'Madu');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_resep`
--

CREATE TABLE `detail_resep` (
  `id_detail_resep` int(11) NOT NULL,
  `id_resep` int(11) NOT NULL,
  `id_bahan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `detail_resep`
--

INSERT INTO `detail_resep` (`id_detail_resep`, `id_resep`, `id_bahan`) VALUES
(1, 1, 3),
(2, 1, 12),
(3, 2, 4),
(4, 2, 5),
(5, 2, 7),
(6, 2, 8),
(7, 2, 9),
(8, 3, 1),
(9, 3, 2),
(10, 3, 4),
(11, 3, 6),
(12, 3, 10),
(13, 4, 1),
(14, 4, 3),
(15, 4, 6),
(16, 5, 1),
(17, 5, 3),
(18, 5, 4),
(19, 6, 1),
(20, 6, 3),
(21, 6, 11);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kopi`
--

CREATE TABLE `kopi` (
  `id_kopi` int(11) NOT NULL,
  `nama_kopi` varchar(50) NOT NULL,
  `asal` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL,
  `gambar_kopi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `kopi`
--

INSERT INTO `kopi` (`id_kopi`, `nama_kopi`, `asal`, `deskripsi`, `gambar_kopi`) VALUES
(1, 'Kopi Luwak', 'Jawa dan Sumatera', 'Kopi Luwak adalah jenis kopi yang unik dan eksklusif yang dikenal karena\r\nproses produksinya yang tidak biasa. Kopi ini berasal dari biji kopi yang telah\r\ndimakan, dicerna, dan dikeluarkan oleh musang luwak,\r\nProses unik ini dimulai ketika musang luwak\r\nmemakan buah kopi yang matang.\r\nEnzim dalam perut musang menguraikan daging\r\nbuah dan meninggalkan biji kopi yang tidak dicerna.\r\nSetelah dikeluarkan, biji kopi tersebut dikumpulkan\r\ndari feses musang, dicuci, diolah, dan disajikan sebagai kopi luwak.\r\nKopi Luwak dianggap oleh beberapa pecinta kopi\r\nsebagai salah satu jenis kopi paling mahal dan eksklusif\r\ndi dunia karena proses produksinya yang rumit dan langkah-langkah\r\nkhusus yang diperlukan untuk mengumpulkan biji kopi tersebut.\r\nKopi ini terkenal karena citarasa yang unik dan halus,\r\ndengan sentuhan nutty, coklat, dan kadang-kadang rasa buah.', 'kopiluwak.png'),
(2, 'Kopi Robusta', 'Lampung, Sumatera Barat, Jawa Barat', 'Robusta adalah salah satu jenis tanaman kopi dengan nama ilmiah Coffea canephora. Nama robusta diambil dari kata “robust“, istilah dalam bahasa Inggris yang artinya kuat. Sesuai dengan namanya, minuman yang diekstrak dari biji kopi robusta memiliki cita rasa yang kuat dan cenderung lebih pahit dibanding arabika.', 'Kopi Robusta.jpg'),
(3, 'Kopi Arabika', 'Toraja, Sumatera Utara, Aceh dan Pulau Jawa', 'Arabika adalah jenis kopi yang paling umum di dunia. Jenis kopi arabika bahkan mencapai sekitar 60% dari kopi dunia. Biji arabika ditanam di daerah dengan ketinggian di atas permukaan laut, terutama yang curah hujannya tinggi. Jenis kopi ini pertama ditemukan berabad-abad yang lalu di dataran tinggi Ethiopia.', 'Kopi Arabica.png'),
(4, 'Kopi Kintamani', 'Bali', 'Kopi Kintamani merupakan jenis kopi yang berasal dari Kintamani, Bali. Ciri khas dari kopi Kintamani adalah adanya rasa pahit sekaligus bercita rasa jeruk. Cita rasa itu berasal karena petani kopi di Kintamani bertetangga dengan kebun jeruk sehingga ada aftertaste segar dari kopi Kintamani.', 'Kopi Kintamani.png'),
(5, 'Kopi Gayo', 'Aceh', 'Kopi Gayo termasuk dalam jenis kopi arabika. Kopi Gayo merupakan jenis kopi yang berasal dari wilayah Dataran tinggi Gayo, Aceh Tengah. Kopi Gayo terkenal dengan aroma dan perisa yang kompleks dan kekentalan yang kuat.', 'Kopi Gayo.jpg'),
(6, 'Kopi Toraja', 'Sulawesi Selatan\r\n', 'Kopi Toraja adalah jenis kopi Arabica yang berasal dari dataran tinggi Toraja, Sulawesi Selatan. Kopi ini dikenal dengan rasanya yang kaya dan rasa akhir buah yang khas. Kopi Toraja juga memiliki aroma yang sangat khas dan harum.', 'Kopi Toraja.jpg'),
(7, 'Kopi Wamena', 'Lembah Baliem, Papua', 'Kopi Wamena berasal dari Lembah Baliem dengan ketinggian 1.200 hingga 1.600 mdpl. Kopi ini termasuk dalam jenis kopi arabika. Kopi ini memiliki rasa unik dengan aroma cokelat dan floral.', 'Kopi Wamena.jpg'),
(8, 'Kopi Flores Bajawa', 'Nusa Tenggara Timur', 'Kopi Flores Bajawa merupakan jenis kopi yang ditanam di di Kabupaten Ngada, Flores, Nusa Tenggara Timur (NTT). Kopi Flores memiliki ciri khas rasa nutty atau kacang-kacangan serta karamel. Teksturnya kental dengan sensasi sedikit asam, tetapi masih aman di lambung.', 'Kopi Flores Bajawa.jpg'),
(9, 'Kopi Sidikalang', 'Sumatera Utara', 'Kopi Sidikalang adalah sebutan untuk kopi robusta dan arabika yang dikembangkan di Kecamatan Sidikalang, ibu kota dari Kabupaten Dairi, Sumatera Utara. Kopi ini memiliki cita rasa yang mirip dengan cokelat dan sedikit manis. Hal yang membedakan kopi ini dengan kopi robusta lain adalah wangi yang dihasilkan kopi Sidikalang tidak terlalu tajam.', 'Kopi Sidikalang.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `petani`
--

CREATE TABLE `petani` (
  `id_petani` int(11) NOT NULL,
  `nama_petani` varchar(20) NOT NULL,
  `no_hp` varchar(12) NOT NULL,
  `asal` varchar(20) NOT NULL,
  `id_kopi` int(11) NOT NULL,
  `gambar_petani` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `petani`
--

INSERT INTO `petani` (`id_petani`, `nama_petani`, `no_hp`, `asal`, `id_kopi`, `gambar_petani`) VALUES
(1, 'Reni', '082321953370', 'Jember', 1, 'petani1.jpg'),
(2, 'Joko', '081245634387', 'Sidikalang', 9, 'petani2.jpg'),
(3, 'Sri', '089456721398', 'Bali', 4, 'petani3.jpg'),
(4, 'Agus', '085431777630', 'Malang', 1, ''),
(5, 'Andi', '089548146609', 'Banyuwangi', 1, ''),
(6, 'Sari', '087365412765', 'Flores', 8, ''),
(7, 'Rahmat', '082580432177', 'Sulawesi', 6, ''),
(8, 'Erni', '081254777320', 'Aceh', 5, ''),
(9, 'Suwarno', '081567832990', 'Lampung', 2, ''),
(10, 'Yanto', '089433666512', 'Magelang', 3, ''),
(11, 'Riska', '082321444600', 'Banyuwangi', 7, ''),
(12, 'Supri', '081333653800', 'Wonosobo', 3, ''),
(13, 'Narno', '089800641235', 'Klaten', 2, ''),
(14, 'Maria', '085465710765', 'Sulawesi', 9, ''),
(15, 'Bayu', '081652767000', 'Bandung', 8, ''),
(16, 'Lira', '081650741878', 'Pasuruan', 4, ''),
(17, 'Tirta', '087543999122', 'Jogja', 5, ''),
(18, 'Rio', '089765287345', 'Lumajang', 6, ''),
(19, 'Aryo', '085670999287', 'Surabaya', 2, ''),
(20, 'Zainal', '081090777450', 'Bogor', 3, ''),
(21, 'Mira', '082540767310', 'Depok', 4, ''),
(22, 'Jono', '087650999287', 'Jombang', 9, ''),
(23, 'Roni', '085700289121', 'Jember', 5, ''),
(24, 'Rini', '081900432711', 'Jakarta', 6, ''),
(25, 'Kiki', '083490888210', 'Flores', 8, ''),
(26, 'Heri', '081090765277', 'Madiun', 4, ''),
(27, 'Dewi', '085680911276', 'Banyuwangi', 3, ''),
(28, 'Nur', '081870345555', 'Magelang', 7, ''),
(29, 'Tio', '087456999120', 'Aceh', 5, ''),
(30, 'Lera', '085100721645', 'Jember', 7, ''),
(31, 'Jarwo', '083487200111', 'Jombang', 1, ''),
(32, 'Ruhi', '082432111732', 'Pasuruan', 2, ''),
(33, 'Rosi', '081876333190', 'Lampung', 7, ''),
(34, 'Yuli', '085320888123', 'Jember', 2, ''),
(35, 'Roro', '081909888218', 'Surabaya', 5, ''),
(36, 'Toni', '089000128711', 'Jember', 5, ''),
(37, 'Wendi', '083760999100', 'Medan', 1, ''),
(38, 'Tantri', '082121555766', 'Kalimantan', 6, ''),
(39, 'Mursidi', '089874000718', 'Surakarta', 8, ''),
(40, 'Dwi', '085213488761', 'Lumajang', 9, ''),
(41, 'Kartini', '087000912212', 'Depok', 3, ''),
(42, 'Nea', '082187666532', 'Bogor', 2, ''),
(43, 'Cesa', '082316555402', 'Malang', 7, ''),
(44, 'Lino', '081242654399', 'Jember', 8, ''),
(45, 'Pira', '089111205363', 'Banyuwangi', 4, ''),
(46, 'Sasa', '083902485679', 'Gresik', 5, ''),
(47, 'Ahmad', '087106426767', 'Sulawesi', 7, ''),
(48, 'Anton', '085320892518', 'NTT', 9, ''),
(49, 'Gio', '082321953371', 'Wonosobo', 1, ''),
(50, 'Risa', '081320888218', 'Bandung', 4, ''),
(51, 'Yeni', '085412777591', 'Malang', 2, ''),
(52, 'Eka', '089200919678', 'Surabaya', 6, ''),
(53, 'Rifa', '087092000178', 'Jogja', 3, ''),
(54, 'Miky', '083565712155', 'Bogor', 5, ''),
(55, 'Hari', '085400812479', 'Bali', 1, ''),
(56, 'Romi', '081410999244', 'Lampung', 2, ''),
(57, 'Silsi', '087650991200', 'Banyuwangi', 7, ''),
(58, 'Gea', '089101293175', 'Cirebon', 8, ''),
(59, 'Kani', '082318729016', 'Surabaya', 3, ''),
(60, 'Bagas', '085691238701', 'Kalimantan', 9, ''),
(61, 'Abi', '087891418725', 'Medan', 9, ''),
(62, 'Marni', '089022764822', 'Jember', 2, ''),
(63, 'Ela', '082318762333', 'Probolinggo', 4, ''),
(64, 'Oji', '083012765421', 'Wonosobo', 5, ''),
(65, 'Misna', '081981379011', 'Surakarta', 6, ''),
(66, 'Ujang', '085189765432', 'Jogja', 8, ''),
(67, 'Rea', '083589211785', 'Bali', 1, ''),
(68, 'Oja', '082875333091', 'Semarang', 9, ''),
(69, 'Sofiya', '087091444782', 'Madura', 3, ''),
(70, 'Tono', '082675123900', 'Palembang', 4, ''),
(71, 'Krisna', '081289333187', 'Lumajang', 5, ''),
(72, 'Trian', '085217888432', 'Probolinggo', 7, ''),
(73, 'Puji', '089800921345', 'Pasuruan', 8, ''),
(74, 'Sindi', '081276800348', 'Malang', 2, ''),
(75, 'Malik', '085679004321', 'Madura', 3, ''),
(76, 'Amar', '083298711263', 'Nganjuk', 6, ''),
(77, 'Yoyok', '089872199301', 'Gresik', 8, ''),
(78, 'Denis', '083524755418', 'Jombang', 9, ''),
(79, 'Tya', '089872555178', 'Surabaya', 1, ''),
(80, 'Nia', '081278071245', 'Kalimantan', 4, ''),
(81, 'Susi', '082896111099', 'NTT', 2, ''),
(82, 'Sur', '085432876000', 'Sulawesi', 6, ''),
(83, 'Pipik', '087812388012', 'Bali', 7, ''),
(84, 'Anang', '081650981002', 'Banyuwangi', 9, ''),
(85, 'Mahmud', '087820178111', 'Palembang', 3, ''),
(86, 'Saida', '085000126823', 'Madura', 5, ''),
(87, 'Faisal', '082871555841', 'Bandung', 8, ''),
(88, 'Vivi', '081908222346', 'Bogor', 1, ''),
(89, 'Mur', '083876011733', 'Jombang', 2, ''),
(90, 'Alam', '089859237555', 'Malang', 7, ''),
(91, 'Dika', '081758028456', 'Gresik', 5, ''),
(92, 'Lila', '082389100286', 'Nganjuk', 4, ''),
(93, 'Diki', '085786901663', 'Surabaya', 3, ''),
(94, 'Supandi', '082097777193', 'Jember', 6, ''),
(95, 'Moe', '089806849333', 'Madura', 8, ''),
(96, 'Cee', '082777840222', 'Banyuwangi', 9, ''),
(97, 'Kio', '081956933288', 'Jember', 2, ''),
(98, 'Dini', '087890110540', 'Surakarta', 4, ''),
(99, 'Miska', '083378901335', 'Wonosobo', 5, ''),
(100, 'Opi', '089869111468', 'Jogja', 1, '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `resep`
--

CREATE TABLE `resep` (
  `id_resep` int(11) NOT NULL,
  `nama_resep` varchar(50) NOT NULL,
  `cara` text NOT NULL,
  `id_kopi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `resep`
--

INSERT INTO `resep` (`id_resep`, `nama_resep`, `cara`, `id_kopi`) VALUES
(1, 'Masker Kopi', '1. Siapkan semua bahan yang dibutuhkan di area kerja.\r\n\r\n2. Masukkan bubuk kopi ke dalam mangkuk. Bubuk kopi memiliki manfaat eksfoliasi dan antioksidan.\r\n\r\n3. Tambahkan yogurt alami atau susu ke dalam mangkuk. Ini memberikan kelembapan dan nutrisi.\r\n\r\n4. Tambahkan madu ke campuran. Madu memiliki sifat antibakteri dan antiinflamasi.\r\n\r\n5. Tambahkan minyak kelapa atau minyak zaitun ke dalam campuran.\r\n\r\n6. Gunakan sendok untuk mencampurkan semua bahan hingga membentuk pasta yang konsisten.\r\n\r\n7. Pastikan wajah Anda bersih dan kering sebelum mengaplikasikan masker.\r\n\r\n8. Gunakan jari atau spatula untuk mengaplikasikan masker kopi secara merata ke seluruh wajah. Hindari area mata dan mulut. Anda juga bisa mengaplikasikannya di leher jika diinginkan.\r\n\r\n9. Biarkan masker bekerja selama 15-20 menit. Gunakan waktu ini untuk bersantai dan merilekskan diri.\r\n\r\n10.Setelah waktu tunggu selesai, bilas masker dengan air hangat. Gosok perlahan untuk mendapatkan manfaat eksfoliasi.\r\n\r\n11.Keringkan wajah dengan lembut dan aplikasikan pelembap untuk menjaga kelembapan kulit.\r\n\r\n12.Anda dapat mengulanginya satu atau dua kali seminggu.', 2),
(2, 'Sambal Kopi', '1. Potong cabe rawit merah dan bawang putih secara kasar.\r\n\r\n2. Panaskan minyak goreng dalam wajan. Tumis cabe rawit merah dan bawang putih hingga harum dan matang.\r\n\r\n3. Setelah cabe dan bawang matang. Tambahkan bubuk kopi ke dalam wajan. Aduk rata hingga bubuk kopi tercampur dengan baik.\r\n\r\n4. Tambahkan gula dan garam ke dalam campuran. Sesuaikan dengan selera Anda. Aduk rata.\r\n\r\n5. Tambahkan air jeruk nipis untuk memberikan rasa segar dan keasaman. Aduk rata dan masak sebentar.\r\n\r\n6. Jika Anda menginginkan tekstur yang halus. Anda dapat menggunakan blender atau alat pengulek untuk menghaluskan sambal.\r\n\r\n7. Cicipi sambal dan sesuaikan rasa sesuai preferensi Anda. Tambahkan gula garam atau jeruk nipis jika diperlukan.\r\n\r\n8. Sambal kopi siap disajikan! Anda dapat menyimpannya dalam wadah kedap udara di lemari es untuk digunakan kemudian.', 4),
(3, 'Cake Kopi', '1. Panaskan oven pada suhu 180 derajat Celsius. Olesi dan alasi loyang cake dengan kertas roti.\r\n\r\n2. Dalam mangkuk terpisah. Campurkan tepung terigu bubuk baking garam dan bubuk kopi. Aduk rata dan sisihkan.\r\n\r\n3. Dalam mangkuk besar kocok mentega dan gula hingga ringan dan lembut.\r\n\r\n4. Tambahkan telur satu per satu kocok setiap kali ditambahkan. Tambahkan ekstrak vanila dan kocok hingga rata.\r\n\r\n5. Secara bertahap tambahkan campuran kering ke dalam campuran basah sambil terus dikocok dengan kecepatan rendah. Jangan terlalu lama mengocok cukup sampai semua bahan tercampur rata.\r\n\r\n6. Tambahkan susu cair ke dalam adonan secara bergantian dengan tepung mulai dan selesai dengan tepung. Aduk hingga rata.\r\n\r\n7. Tuangkan adonan ke dalam loyang yang telah disiapkan.\r\n\r\n8. Panggang dalam oven yang sudah dipanaskan selama 25-30 menit atau sampai tusuk gigi yang dimasukkan ke tengah cake keluar bersih.\r\n\r\n9. Dinginkan cake dalam loyang selama 10 menit, lalu pindahkan ke rak pendingin untuk mendinginkan sepenuhnya. Setelah dingin hias cake dengan whipped cream atau ganache coklat jika diinginkan.\r\n\r\n10.Potong dan sajikan cake kopi bersama dengan secangkir kopi favorit Anda!', 1),
(4, 'Puding Kopi', '\r\n1. Siapkan semua bahan dan peralatan yang diperlukan.\r\n\r\n2. Campur kopi bubuk dengan air panas, aduk hingga kopi benar-benar larut. Diamkan sebentar.\r\n\r\n3. Campur susu cair, gula, dan vanila ekstrak dalam panci. Panaskan campuran tersebut dengan api sedang hingga gula larut. Jangan sampai mendidih.\r\n\r\n4. Setelah gula larut, tambahkan larutan kopi yang sudah Anda sediakan ke dalam campuran susu. Aduk rata.\r\n\r\n5. Masukkan agar-agar bubuk dan sejumput garam ke dalam campuran. Aduk rata dan pastikan agar-agar benar-benar larut.\r\n\r\n6. Rebus campuran dengan api kecil hingga mendidih sambil terus diaduk. Pastikan agar-agar larut sepenuhnya.\r\n\r\n7. Tuangkan adonan puding ke dalam wadah atau cetakan yang telah Anda siapkan.\r\n\r\n8. Biarkan puding agak mendingin di suhu ruangan sebelum memasukkannya ke dalam lemari es. Biarkan puding mengeras selama beberapa jam atau semalaman.\r\n\r\n9. Setelah puding mengeras, potong sesuai selera dan sajikan. Anda juga bisa menambahkan whipped cream atau hiasan lainnya jika diinginkan.', 5),
(5, 'Espresso', '1. Panaskan mesin espresso sesuai dengan petunjuk pabrikan. Pastikan suhu mesin sudah optimal sebelum ekstraksi.\r\n\r\n2. Pilih kopi bubuk khusus espresso yang berkualitas. Timbang sekitar 18-20 gram kopi untuk satu shot espresso.\r\n\r\n3. Jika Anda menggunakan biji kopi utuh gunakan grinder untuk menggiling kopi hingga mencapai kehalusan yang sesuai untuk espresso.\r\n\r\n4. Isi portafilter dengan kopi yang telah ditimbang. Pastikan permukaan kopi rata dan padat.\r\n\r\n5. Gunakan tekan kopi (tamper) untuk meratakan dan menekan kopi di dalam portafilter. Pastikan tekanan yang merata untuk hasil ekstraksi yang konsisten.\r\n\r\n6. Pasang portafilter yang sudah diisi kopi ke dalam grup kepala mesin espresso dengan erat.\r\n\r\n7. Mulai ekstraksi dengan menekan tombol espresso pada mesin. Ekstraksi seharusnya berlangsung selama sekitar 25-30 detik.\r\n\r\n8. Pantau ekstraksi secara visual. Harapannya akan muncul crema (lapisan berminyak berwarna coklat keemasan) di atas espresso.\r\n\r\n9. Hentikan ekstraksi setelah mencapai volume yang diinginkan atau setelah 25-30 detik. Jangan biarkan proses ekstraksi terlalu lama karena bisa menghasilkan rasa yang pahit.\r\n\r\n10.Tuangkan espresso ke dalam cangkir pre-warmed dan nikmati segera.', 7),
(6, 'Torabika', '1. Dapatkan biji kopi Torabika. Giling biji kopi dengan konsistensi yang sesuai untuk metode seduh yang Anda pilih. \r\n\r\n2. Panaskan air hingga suhu sekitar 90-96 derajat Celsius. Siapkan alat seduh kopi yang Anda pilih. Bilas alat seduh dengan sedikit air panas untuk menghilangkan sisa kertas atau residu yang mungkin ada.\r\n\r\n3. Masukkan biji kopi yang sudah digiling ke dalam alat seduh kopi sesuai dengan takaran yang diinginkan. Tuangkan air panas dengan gerakan melingkar, pastikan semua biji kopi terendam dengan baik.\r\n \r\n4. Tergantung pada metode seduh yang Anda gunakan, biarkan kopi meresap selama beberapa waktu (biasanya sekitar 3-4 menit). Setelah waktu ekstraksi selesai, tekan perlahan piston pada French press atau buang filter pada V60/Chemex untuk memisahkan ampas kopi dari cairan kopi yang sudah terkumpul.\r\n\r\n5. Tuangkan kopi yang sudah diseduh ke dalam gelas atau cangkir. Rasakan aroma dan cita rasa kopi yang baru saja Anda seduh!', 8);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `bahan`
--
ALTER TABLE `bahan`
  ADD PRIMARY KEY (`id_bahan`);

--
-- Indeks untuk tabel `detail_resep`
--
ALTER TABLE `detail_resep`
  ADD PRIMARY KEY (`id_detail_resep`),
  ADD KEY `id_bahan` (`id_bahan`),
  ADD KEY `id_resep` (`id_resep`);

--
-- Indeks untuk tabel `kopi`
--
ALTER TABLE `kopi`
  ADD PRIMARY KEY (`id_kopi`);

--
-- Indeks untuk tabel `petani`
--
ALTER TABLE `petani`
  ADD PRIMARY KEY (`id_petani`),
  ADD KEY `id_kopi` (`id_kopi`);

--
-- Indeks untuk tabel `resep`
--
ALTER TABLE `resep`
  ADD PRIMARY KEY (`id_resep`),
  ADD KEY `id_kopi` (`id_kopi`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `bahan`
--
ALTER TABLE `bahan`
  MODIFY `id_bahan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `detail_resep`
--
ALTER TABLE `detail_resep`
  MODIFY `id_detail_resep` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `kopi`
--
ALTER TABLE `kopi`
  MODIFY `id_kopi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `petani`
--
ALTER TABLE `petani`
  MODIFY `id_petani` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT untuk tabel `resep`
--
ALTER TABLE `resep`
  MODIFY `id_resep` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `detail_resep`
--
ALTER TABLE `detail_resep`
  ADD CONSTRAINT `detail_resep_ibfk_1` FOREIGN KEY (`id_bahan`) REFERENCES `bahan` (`id_bahan`),
  ADD CONSTRAINT `detail_resep_ibfk_2` FOREIGN KEY (`id_resep`) REFERENCES `resep` (`id_resep`);

--
-- Ketidakleluasaan untuk tabel `petani`
--
ALTER TABLE `petani`
  ADD CONSTRAINT `petani_ibfk_1` FOREIGN KEY (`id_kopi`) REFERENCES `kopi` (`id_kopi`);

--
-- Ketidakleluasaan untuk tabel `resep`
--
ALTER TABLE `resep`
  ADD CONSTRAINT `resep_ibfk_1` FOREIGN KEY (`id_kopi`) REFERENCES `kopi` (`id_kopi`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
