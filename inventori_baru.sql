-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 12, 2018 at 08:35 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 5.6.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inventori_baru`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id_barang` int(11) NOT NULL,
  `id_jenis` int(2) NOT NULL,
  `id_kategori` int(2) NOT NULL,
  `no_bmn` text NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `minimum_stok` int(1) NOT NULL,
  `gambar` text NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id_barang`, `id_jenis`, `id_kategori`, `no_bmn`, `nama_barang`, `minimum_stok`, `gambar`, `deskripsi`) VALUES
(6, 3, 31, '', 'hardisk Internal WD', 3, 'hdd_500gb.jpg', '                          service cpu                                                          ');

-- --------------------------------------------------------

--
-- Table structure for table `departemen`
--

CREATE TABLE `departemen` (
  `id_departemen` int(20) NOT NULL,
  `kode_departemen` varchar(5) DEFAULT NULL,
  `nama_departemen` text
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `departemen`
--

INSERT INTO `departemen` (`id_departemen`, `kode_departemen`, `nama_departemen`) VALUES
(1, 'ADH', 'Administrasi Perhotelan'),
(2, 'BHP', 'Bisnis Hospitaliti'),
(3, 'MTB', 'Manajemen Tata Boga'),
(4, 'LSP', 'Lembaga Sertifikasi Profesi'),
(5, 'MTH', 'Manajemen Tata Hidangan'),
(6, 'HTL', 'Hotel Langon'),
(7, 'KEU', 'Keuangan'),
(8, 'BMN', 'Barang Milik Negara'),
(9, 'PPM', 'Pusat Penjamin Mutu'),
(10, 'PPK', 'Pejabat Pembuat Komitmen'),
(11, 'HUMAS', 'Hubungan Masyarakat'),
(12, 'AKADE', 'Akademik'),
(13, 'PUKET', 'Pembantu Ketua I'),
(14, 'PUKET', 'Pembantu Ketua II'),
(15, 'PUKET', 'Pembantu Ketua III'),
(16, 'PUKET', 'Pembantu Ketua IV'),
(17, 'MAH', 'Manajemen Akutansi Perhotelan'),
(18, 'MDK', 'Manajemen Divisi Kamar'),
(19, 'PUSLI', 'Pusat Penelitian dan Pengabdian Masyarakat'),
(20, 'PKN', 'Praktek Kerja Nyata'),
(21, 'KEPEG', 'Kepegawaian'),
(22, 'TU', 'Tata Usaha'),
(23, 'KABAG', 'Ketua Bagian ADAK'),
(24, 'KABAG', 'Ketua Bagian UMUM'),
(25, 'SEK_K', 'Sekertaris ketua'),
(26, 'BHS', 'Bahasa'),
(27, 'DPW', 'Destinasi Pariwisata'),
(28, 'GDG', 'Gudang'),
(29, 'MPK', 'Manajemen Kepariwisataan'),
(30, 'MPB', 'Manajemen Bisnis Perjalanan'),
(31, 'MKH', 'Manajemen Mice dan Perhotelan'),
(32, 'PERPU', 'Perpustakaan'),
(33, 'KOPER', 'Koperasi'),
(34, 'RT', 'Rumah Tangga'),
(35, 'IT', 'Komputer');

-- --------------------------------------------------------

--
-- Table structure for table `detail_peminjaman`
--

CREATE TABLE `detail_peminjaman` (
  `id_det` int(11) NOT NULL,
  `id_p` int(5) NOT NULL,
  `id_barang` int(3) NOT NULL,
  `kondisi_barang` enum('1','2') NOT NULL,
  `qty` int(2) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_peminjaman`
--

INSERT INTO `detail_peminjaman` (`id_det`, `id_p`, `id_barang`, `kondisi_barang`, `qty`, `keterangan`) VALUES
(1, 1, 1, '1', 1, ''),
(2, 1, 3, '1', 1, ''),
(3, 2, 1, '1', 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `gedung`
--

CREATE TABLE `gedung` (
  `id_gedung` int(11) NOT NULL,
  `nama_gedung` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gedung`
--

INSERT INTO `gedung` (`id_gedung`, `nama_gedung`) VALUES
(2, 'Genitri A'),
(3, 'Genitri B'),
(4, 'Lontar A'),
(5, 'Lontar B'),
(6, 'Rebab A'),
(7, 'Rebab B'),
(8, 'Padma A'),
(9, 'Padma B'),
(10, 'Kafetaria'),
(11, 'Perpustakaan'),
(12, 'Spa'),
(13, 'Mice / Widyatula'),
(14, 'Wantilan'),
(15, 'Laboratorium'),
(16, 'Aula / Joop Ave'),
(17, 'Dosen'),
(18, 'Rektorat'),
(19, 'Satpam'),
(20, 'Gor'),
(21, 'Maintenance'),
(22, 'Mushola'),
(23, 'Restoran'),
(24, 'Kitchen'),
(25, 'Sopir'),
(26, 'Asrama Putra'),
(27, 'Asrama Putri');

-- --------------------------------------------------------

--
-- Table structure for table `history_barang_masuk`
--

CREATE TABLE `history_barang_masuk` (
  `id_b_masuk` int(11) NOT NULL,
  `id_barang` int(3) NOT NULL,
  `tgl_entry` date NOT NULL,
  `qty_masuk` int(3) NOT NULL,
  `harga` int(7) NOT NULL,
  `umur_manfaat` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `jenis_barang`
--

CREATE TABLE `jenis_barang` (
  `id_jenis` int(11) NOT NULL,
  `nama_jenis` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenis_barang`
--

INSERT INTO `jenis_barang` (`id_jenis`, `nama_jenis`) VALUES
(3, 'PEMELIHARAAN'),
(4, 'ASSET'),
(5, 'PERSEDIAAN');

-- --------------------------------------------------------

--
-- Table structure for table `kategori_barang`
--

CREATE TABLE `kategori_barang` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(30) NOT NULL,
  `id_jenis` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori_barang`
--

INSERT INTO `kategori_barang` (`id_kategori`, `nama_kategori`, `id_jenis`) VALUES
(3, 'Tinta', 5),
(5, 'Komputer', 4),
(6, 'Printer', 4),
(7, 'Scanner', 4),
(8, 'LCD Proyektor', 4),
(9, 'LCD Screen', 4),
(11, 'Aplikasi', 4),
(12, 'Swicth', 3),
(13, 'DDR', 3),
(14, 'Flashdisk', 3),
(16, 'Adapter Power', 3),
(17, 'Kabel VGA', 3),
(18, 'Kabel HDMI', 3),
(19, 'Mouse', 3),
(20, 'keyboard', 3),
(21, 'Adapter Lan Card', 3),
(22, 'SFP', 3),
(23, 'power supply', 3),
(24, 'Kabel Lan', 3),
(25, 'Paku Klem', 3),
(26, 'Rj 45', 3),
(27, 'Kabel Tis', 3),
(28, 'CD-R', 3),
(29, 'Baterai cimost', 3),
(30, 'kabel Power', 3),
(31, 'Hardisk Internal', 3);

-- --------------------------------------------------------

--
-- Table structure for table `klasifikasi_barang`
--

CREATE TABLE `klasifikasi_barang` (
  `id_klasifikasi` int(11) NOT NULL,
  `nama_klasifikasi` varchar(30) NOT NULL,
  `id_kategori` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `klasifikasi_barang`
--

INSERT INTO `klasifikasi_barang` (`id_klasifikasi`, `nama_klasifikasi`, `id_kategori`) VALUES
(1, 'LaserJet', 6),
(2, 'DeskJet', 6),
(3, 'Dot Matrix', 6),
(4, 'Laptop', 5),
(5, 'Komputer CPU + Monitor', 5),
(6, 'Komputer All In One', 5),
(7, 'DDR 1', 13),
(8, 'DDR 2', 13),
(9, 'DDR 3', 13);

-- --------------------------------------------------------

--
-- Table structure for table `peminjaman`
--

CREATE TABLE `peminjaman` (
  `id_p` int(11) NOT NULL,
  `tgl_pinjam` date NOT NULL,
  `nama_peminjam` varchar(50) NOT NULL,
  `no_hp` varchar(13) NOT NULL,
  `departemen` varchar(30) NOT NULL,
  `id_ruangan` int(11) NOT NULL,
  `status` enum('1','2') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `prodi`
--

CREATE TABLE `prodi` (
  `id_prodi` int(11) NOT NULL,
  `kode_prodi` varchar(5) NOT NULL,
  `nama_prodi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prodi`
--

INSERT INTO `prodi` (`id_prodi`, `kode_prodi`, `nama_prodi`) VALUES
(2, 'MDK', 'D3 Manajemen Divisi Kamar'),
(3, 'ADH', 'D4 Administrasi Perhotelan'),
(4, 'MKP', 'D4 Manajemen Kepariwisataan'),
(5, 'BHP', 'S1 Bisnis Hospitality'),
(6, 'DPW', 'S1 Destinasi Pariwisata'),
(7, 'MAH', 'D4 Manajemen Akuntasi Hospitaliti'),
(8, 'MTB', 'D3 Manajemen Tata Boga'),
(9, 'MTH', 'D3 Manajemen Tata Hidangan'),
(10, 'MBP', 'D4 Manajemen Bisnis Perjalanan'),
(11, 'MKH', 'D4 Konvensi dan Perhelatan');

-- --------------------------------------------------------

--
-- Table structure for table `ruangan`
--

CREATE TABLE `ruangan` (
  `id_ruangan` int(11) NOT NULL,
  `id_gedung` int(2) NOT NULL,
  `nama_ruangan` varchar(30) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ruangan`
--

INSERT INTO `ruangan` (`id_ruangan`, `id_gedung`, `nama_ruangan`, `keterangan`) VALUES
(3, 2, 'GA 101', 'Ruang TI'),
(4, 2, 'GA 102', 'Lab.Komputer'),
(5, 2, 'GA Terminal Dosen', '                      Dosen Komputer                    '),
(6, 2, 'GA 201', 'Lab.MAH'),
(7, 2, 'GA 202', 'Lab.Komputer'),
(8, 2, 'GA 301', 'Lab.Bahasa'),
(9, 2, 'GA 302', 'Lab.Komputer'),
(10, 3, 'GB 101', '                      Tempat Pertemuan / Rapat                       '),
(11, 3, 'GB 201', 'Ruang Kelas'),
(12, 3, 'GB 202', 'Ruang Kelas'),
(13, 3, 'GB 203', 'Ruang Kelas'),
(14, 3, 'GB 301', 'Lab.Bahasa'),
(15, 3, 'GB 302', 'Ruang Kelas'),
(16, 3, 'GB 303', 'Ruang Kelas'),
(17, 4, 'LA 101', 'Ruang Kelas'),
(18, 4, 'LA 102', 'Ruang Kelas'),
(19, 4, 'LA 201', 'Ruang Kelas'),
(20, 4, 'LA 202', 'Ruang Kelas'),
(21, 4, 'LA Terminal Dosen', 'Kelas Bhs Jepang'),
(22, 5, 'LB 101', 'Ruang Kelas'),
(23, 5, 'LB 102', 'Ruang Kelas'),
(24, 5, 'LB 103', 'Ruang Kelas'),
(25, 5, 'LB 201', 'Ruang Kelas'),
(26, 5, 'LB 202', 'Ruang Kelas'),
(27, 5, 'LB 203', 'Ruang Kelas'),
(28, 10, 'Ruang Server Kafetaria', '                      Tempat Server                    '),
(29, 11, 'Ruang Konseling', 'Ruang Konsultasi'),
(30, 11, 'Ruang Darmawanita', 'Ruang Darmawanita'),
(31, 11, 'Ruang Server Perpustakaan', 'Tempat Server'),
(32, 11, 'Ruang Kanit Perpustakaan', 'Kantor Kanit Perpustakaan'),
(33, 11, 'Ruang Referensi', 'Tempat Buku Referensi'),
(34, 11, 'Ruang Baca', 'Tempat Koleksi Buku'),
(35, 11, 'Ruang Puslitabmas', ' Kantor Kanit Puslitabmas                    '),
(36, 11, 'Ruang Peg.Puslitabmas', 'Kantor Peg.Puslitabmas'),
(37, 11, 'Ruang Pertemuan Perpustakaan', '                     Tempat Pertemuan / Rapat                    '),
(38, 6, 'RA 101', 'Ruang Kelas'),
(39, 6, 'RA 102', 'Ruang Kelas'),
(40, 6, 'RA 103', 'Ruang Kelas'),
(41, 6, 'RA 201', 'Ruang Kelas'),
(42, 6, 'RA 202', 'Ruang Kelas'),
(43, 6, 'RA 203', 'Ruang Kelas'),
(44, 7, 'RB 101', 'Ruang Kelas'),
(45, 7, 'RB 102', 'Ruang Kelas'),
(46, 7, 'RB 103', 'Ruang Kelas'),
(47, 7, 'RB 201', 'Ruang Kelas'),
(48, 7, 'RB 202', 'Ruang Kelas'),
(49, 7, 'RB 203', 'Ruang Kelas'),
(50, 7, 'RB Basement', 'Gudang Barang Rusak'),
(51, 7, 'RB Terminal Dosen', 'Kelas Bhs Perancis'),
(52, 8, 'PA 101', 'Ruang Kelas'),
(53, 8, 'PA 102', 'Ruang Kelas'),
(54, 8, 'PA 103', 'Ruang Kelas'),
(55, 8, 'PA 201', 'Ruang Kelas'),
(56, 8, 'PA 202', 'Ruang Kelas'),
(57, 8, 'PA 203', 'Ruang Kelas'),
(58, 8, 'PA 301', 'Ruang Kelas'),
(59, 8, 'PA 302', 'Ruang Kelas'),
(60, 8, 'PA 303', 'Ruang Kelas'),
(61, 9, 'PB 101', 'Ruang Kelas'),
(62, 9, 'PB 102', 'Ruang Kelas'),
(63, 9, 'PB 103', 'Ruang Kelas'),
(64, 9, 'PB 201', 'Ruang Kelas'),
(65, 9, 'PB 202', 'Ruang Kelas'),
(66, 9, 'PB 203', 'Ruang Kelas'),
(67, 9, 'PB 301', 'Ruang Kelas'),
(68, 9, 'PB 302', 'Ruang Kelas'),
(69, 9, 'PB 303', 'Ruang Kelas'),
(70, 9, 'PB Terminal Dosen', 'Transit Dosen              '),
(71, 12, 'Ruang Mani Pedicure', 'Tempat Mani Pedicure'),
(72, 12, 'Ruang Beauty', 'Tempat Merawat Kecantikan'),
(73, 12, 'Ruang Body Treatment', 'Tempat Massage / Pijat'),
(74, 12, 'Ruang Lobby', '                      Tempat Registrasi                   '),
(75, 12, 'Ruang Konsultasi', 'Tempat Konsultasi'),
(76, 13, 'Ruang Pertemuan Mice Lt.1', '                                            Tempat Pertemuan / Rapat                                        '),
(77, 13, 'Ruang Lobby Mice Lt.1', 'Tempat Registrasi'),
(78, 13, 'Ruang Sekretariat Mice Lt.1', 'Tempat Sekretariat'),
(79, 13, 'Ruang VIP Mice Lt.1', 'Tempat Tamu VIP'),
(80, 13, 'Ruang Control Mice Lt.2', 'Tempat Alat-alat Kontrol Ruang Pertemuan'),
(81, 13, 'Ruang Restoran Mice Ground', 'Restoran'),
(82, 14, 'Ruang Lab.MDK', 'Lab.MDK'),
(83, 14, 'Ruang Adm.Lab.MDK', 'Tempat Administrasi'),
(84, 15, 'Ruang Lab.Floris Lt.1', 'Lab.Floris'),
(85, 15, 'Ruang Lab.Housekeeping Lt.1', '                      Lab.Housekeeping                    '),
(86, 15, 'Ruang Stadium MDK Lt.1', '                      Stadium Kitchen MDK                    '),
(87, 15, 'Lab.Receptionist MBP Lt.1', 'Lab.Receptionist MBP'),
(88, 15, 'Ruang Lab.MBP Lt.1', 'Lab.MBP'),
(89, 15, 'Ruang Lab.Ground Handling Lt.1', 'Lab.Ground Handling'),
(90, 15, 'Ruang Lab.Making Bed Lt.2', 'Lab.Making Bed'),
(91, 15, 'Ruang Lab.Supervisor Lt.2', 'Lab.Supervisor'),
(92, 15, 'Ruang Pertemuan MKP Lt.2', 'Tempat Pertemuan / Rapat'),
(93, 15, 'Ruang Lab.Tour Field Study Lt.', 'Lab.Tour Field Study'),
(94, 16, 'Ruang Pertemuan Lt.Atas', 'Tempat Pertemuan / Rapat'),
(95, 16, 'Ruang Yayasan', 'Kantor Yayasan'),
(96, 16, 'Ruang Koperasi Werdhi Wisata', 'Kantor KPN Werdhi Wisata'),
(97, 16, 'Ruang Adm.PPM', 'Kantor PPM'),
(98, 16, 'Ruang Senat Mahasiswa', 'Kantor Senat Mahasiswa'),
(99, 17, 'Ruang Prodi MBP', 'Kantor Prodi MBP'),
(100, 17, 'Ruang Prodi MKH', 'Kantor Prodi MKH'),
(101, 17, 'Ruang Prodi MKP', 'Kantor Prodi MKP'),
(102, 17, 'Ruang Prodi DPW', 'Kantor Prodi DPW'),
(103, 17, 'Ruang Prodi MTH', 'Kantor Prodi MTH'),
(104, 17, 'Ruang Prodi BHP', 'Kantor Prodi BHP'),
(105, 17, 'Ruang Prodi MTB', 'Kantor Prodi MTB'),
(106, 17, 'Ruang Prodi MAH', 'Kantor Prodi MAH'),
(107, 17, 'Ruang Prodi ADH', 'Kantor Prodi ADH'),
(108, 17, 'Ruang Prodi MDK', 'Kantor Prodi MDK'),
(109, 17, 'Ruang Dosen Bahasa', 'Kantor Dosen Bahasa'),
(110, 18, 'Ruang Adm.PKN', 'Kantor Adm.PKN'),
(111, 18, 'Ruang Adm.PPK', 'Kantor Adm.PPK'),
(112, 18, 'Ruang Adm.TU', 'Kantor Adm.TU'),
(113, 18, 'Ruang Adm.Kepegawaian', 'Kantor Adm.Kepegawaian'),
(114, 18, 'Ruang Adm.Pengadaan', 'Kantor Adm.Pengadaan'),
(115, 18, 'Ruang Kasubbag.TURT', 'Kantor Kasubbag.TURT'),
(116, 18, 'Ruang Adm.Keuangan', 'Kantor Adm.Keuangan'),
(117, 18, 'Ruang Adm.Akademik', 'Kantor Adm.Akademik'),
(118, 18, 'Ruang Kabag.Adak', 'Kantor Kabag.Adak'),
(119, 18, 'Ruang Kabag.Adum', 'Kantor Kabag.Adum'),
(120, 18, 'Ruang Adm.Humas', 'Kantor Adm.Humas'),
(121, 18, 'Ruang Operator', 'Kantor Operator'),
(122, 18, 'Ruang Puket IV', 'Kantor Puket IV'),
(123, 18, 'Ruang Pertemuan Serba Guna', 'Tempat Pertemuan / Rapat'),
(124, 18, 'Ruang Puket I', 'Kantor Puket I'),
(125, 18, 'Ruang Puket II', 'Kantor Puket II'),
(126, 18, 'Ruang Puket III', 'Kantor Puket III'),
(127, 18, 'Ruang Sekretaris Ketua', 'Kantor Sekretaris Ketua'),
(128, 18, 'Ruang Ketua', 'Kantor Ketua'),
(129, 18, 'Ruang Pertemuan Ketua', 'Tempat Pertemuan / Rapat'),
(130, 18, 'Ruang Server Rektorat', 'Tempat Server'),
(131, 19, 'Ruang SatPam', 'Kantor SatPam'),
(132, 25, 'Ruang Sopir', 'Tempat sopir standby'),
(133, 21, 'Ruang Maintenance', 'Kantor Maintenance'),
(134, 22, 'Ruang Mushola', 'Tempat Ibadah Umat Muslim'),
(135, 23, 'Restoran Saraswati Lt.2', '                      Restoran                 '),
(136, 23, 'Restoran Ganesha Lt.2', 'Restoran'),
(137, 23, 'Restoran Nusantara Lt.1', 'Restoran'),
(138, 24, 'Kitchen Nusantara Lt.1', 'Kitchen'),
(139, 24, 'Ruang Adm.Kitchen Nusantara Lt', 'Kantor Adm.Kitchen Nusantara'),
(140, 24, 'Kitchen Continental Lt.2', 'Kitchen'),
(141, 24, 'Ruang Adm.Kitchen Continental ', 'Kantor Adm.Kitchen Continental'),
(142, 24, 'Kitchen Jepang Lt.2', 'Kitchen'),
(143, 24, 'Ruang Adm.Kitchen Jepang Lt.2', 'Kantor Adm.Kitchen Jepang'),
(144, 24, 'Kitchen Pastry Lt.2', 'Kitchen'),
(145, 24, 'Ruang Adm.Kitchen Pastry Lt.2', 'Kantor Adm.Kitchen Pastry'),
(146, 24, 'Ruang Adm.Room Service Lt.1', 'Kantor Adm.Room Service'),
(147, 24, 'Ruang Adm.Purchasing Lt.1', 'Kantor Adm.Purchasing'),
(148, 24, 'Ruang Adm.Store / Gudang Lt.1', 'Kantor Adm.Store / Gudang'),
(149, 24, 'Ruang Adm.Receiving Lt.1', 'Kantor Adm.Receiving'),
(150, 24, 'Ruang Adm.Laundry Lt.1', 'Kantor Adm.Laundry'),
(151, 24, 'Ruang Lab.Laundry Lt.1', 'Lab.Laundry'),
(152, 26, 'Ruang Adm.LSP Lt.2', 'Kantor LSP'),
(153, 26, 'Ruang Server Asrama Putra Lt.3', 'Tempat Server'),
(154, 20, 'Ruang Control Gor Lt.2', 'Tempat Alat-alat kontrol Gor');

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `id_supplier` int(11) NOT NULL,
  `nama_supplier` varchar(40) NOT NULL,
  `no_telp` varchar(20) NOT NULL,
  `alamat` text NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `userpass`
--

CREATE TABLE `userpass` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `no_telp` varchar(13) NOT NULL,
  `id_departemen` int(2) NOT NULL,
  `id_prodi` int(2) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` text NOT NULL,
  `level` enum('1','2','3','4') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userpass`
--

INSERT INTO `userpass` (`id_user`, `nama`, `no_telp`, `id_departemen`, `id_prodi`, `username`, `password`, `level`) VALUES
(1, 'Unit TI', '081246264082', 0, 0, 'user', '5f0cdbcc97175ed8ddf280cd59107ed3', '1'),
(2, 'wayan', '081246264082', 0, 0, 'user1', 'f3770595e0cb4d9a988bd5da98d2187d', '2'),
(3, 'wika', '081246264081', 0, 2, 'user2', 'f3770595e0cb4d9a988bd5da98d2187d', '4');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `departemen`
--
ALTER TABLE `departemen`
  ADD PRIMARY KEY (`id_departemen`),
  ADD UNIQUE KEY `id` (`id_departemen`),
  ADD KEY `id_2` (`id_departemen`);

--
-- Indexes for table `detail_peminjaman`
--
ALTER TABLE `detail_peminjaman`
  ADD PRIMARY KEY (`id_det`);

--
-- Indexes for table `gedung`
--
ALTER TABLE `gedung`
  ADD PRIMARY KEY (`id_gedung`);

--
-- Indexes for table `history_barang_masuk`
--
ALTER TABLE `history_barang_masuk`
  ADD PRIMARY KEY (`id_b_masuk`);

--
-- Indexes for table `jenis_barang`
--
ALTER TABLE `jenis_barang`
  ADD PRIMARY KEY (`id_jenis`);

--
-- Indexes for table `kategori_barang`
--
ALTER TABLE `kategori_barang`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `klasifikasi_barang`
--
ALTER TABLE `klasifikasi_barang`
  ADD PRIMARY KEY (`id_klasifikasi`);

--
-- Indexes for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`id_p`);

--
-- Indexes for table `prodi`
--
ALTER TABLE `prodi`
  ADD PRIMARY KEY (`id_prodi`);

--
-- Indexes for table `ruangan`
--
ALTER TABLE `ruangan`
  ADD PRIMARY KEY (`id_ruangan`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id_supplier`);

--
-- Indexes for table `userpass`
--
ALTER TABLE `userpass`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `departemen`
--
ALTER TABLE `departemen`
  MODIFY `id_departemen` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `detail_peminjaman`
--
ALTER TABLE `detail_peminjaman`
  MODIFY `id_det` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `gedung`
--
ALTER TABLE `gedung`
  MODIFY `id_gedung` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `history_barang_masuk`
--
ALTER TABLE `history_barang_masuk`
  MODIFY `id_b_masuk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `jenis_barang`
--
ALTER TABLE `jenis_barang`
  MODIFY `id_jenis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `kategori_barang`
--
ALTER TABLE `kategori_barang`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `klasifikasi_barang`
--
ALTER TABLE `klasifikasi_barang`
  MODIFY `id_klasifikasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `peminjaman`
--
ALTER TABLE `peminjaman`
  MODIFY `id_p` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `prodi`
--
ALTER TABLE `prodi`
  MODIFY `id_prodi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `ruangan`
--
ALTER TABLE `ruangan`
  MODIFY `id_ruangan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=155;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id_supplier` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `userpass`
--
ALTER TABLE `userpass`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
