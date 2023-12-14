-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 14 Des 2023 pada 10.07
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gudang_ayya`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `category_products`
--

CREATE TABLE `category_products` (
  `id_kategori_produk` bigint(20) UNSIGNED NOT NULL,
  `nama_kategori_produk` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `category_products`
--

INSERT INTO `category_products` (`id_kategori_produk`, `nama_kategori_produk`) VALUES
(1, 'AIR FILTER'),
(2, 'OIL FILTER'),
(3, 'OIL SEPARATOR'),
(4, 'UNIT'),
(5, 'SPAREPART'),
(6, 'OLI');

-- --------------------------------------------------------

--
-- Struktur dari tabel `customers`
--

CREATE TABLE `customers` (
  `id_pembeli` bigint(20) UNSIGNED NOT NULL,
  `nama_pembeli` varchar(255) NOT NULL,
  `no_telp` varchar(255) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `customers`
--

INSERT INTO `customers` (`id_pembeli`, `nama_pembeli`, `no_telp`, `alamat`, `status`) VALUES
(1, 'Gudang', NULL, NULL, 2),
(6, 'PT. Daha Surya Persada', '-', '-', 1),
(7, 'Dibra Pratama', '-', '-', 1),
(8, 'PT. Bintang Timur Samudera', '-', '-', 1),
(9, 'PR. Sukun', '-', 'Malang', 1),
(10, 'PR. Sayap Mas', '-', 'Malang', 1),
(11, 'PT. Anugrah Niaga Sejahtera', '-', 'Jl. Pratama Indah No.5 Blok B3 N0.3 RT1 RW1 Palemwatu, Menganti, Gresik', 0),
(12, 'PT. Indomapan', NULL, 'Kesamben Wetan, Driyorejo, Gresik', 0),
(13, 'PT. Amangriya', NULL, 'Jl. Ksatrian No.18 Sidokerto, Buduran, Sidoarjo', 1),
(14, 'CV. Hasil Karya d/a PT. DOK Pantai Lamongan', '-', 'DOK. Lamongan', 1),
(15, 'Mekanik/Teknisi', NULL, '-', 1),
(16, 'PT. Surya Gading Permai', '-', 'Kesamben Wetan, Driyorejo, Gresik', 1),
(17, 'Sekam Giling Rukun Jaya', '-', '-', 1),
(18, 'PR. Sedulur Jaya', NULL, 'Jember', 1),
(19, 'PB. SK Padi Jember', NULL, 'Sempolan, Jember', 1),
(20, 'Bp. Abdi', NULL, 'Jl. Prapatan 2, Gg. Sunan Kalijaga, Kel. Bedungun, Kec. Tanjung Redeb , Kab. Berau, Kalimantan Timur', 1),
(21, 'PT. Karunia Selaras Abadi', '-', 'Bypass - Krian', 0),
(22, 'UD. Telaga Jaya / Dacil', '-', 'Jetis - Mojokerto', 1),
(23, 'PT. Angkasa Gracia', '-', 'Pasuruan', 1),
(24, 'Bp. Holiang', '-', 'Sidoarjo', 1),
(25, 'CV. Karya Mandiri', NULL, 'Bangkingan', 1),
(26, 'Bp. Holliang', NULL, '-', 1),
(27, 'Gudang', NULL, '-', 1),
(28, 'Mitra Abadi', NULL, '-', 1),
(29, 'PR. 41', NULL, '-', 1),
(30, 'PR. 77', NULL, '-', 1),
(31, 'PT. Jagat Raya', NULL, 'Blitar', 1),
(32, 'PT. Rizana Solusi Teknik', NULL, '-', 1),
(33, 'Gatra Mapan', NULL, '-', 1),
(34, 'CV. Marko', '-', 'Sengkaling, Dau, Malang', 0),
(35, 'CV. Cipta Aneka Pangan Sejahtera', NULL, 'Jl. Raya Bodean Km 3.3, Ds. Toyomarto, Kec. Singosari, Malang', 0),
(36, 'PT. Wika Beton', '-', 'Gempol, Pasuruan', 0),
(37, 'CV. Kurnia Group', NULL, 'Malang', 1),
(38, 'PR. Nusantara Jaya', NULL, 'Pamekasan, Madura', 1),
(39, 'Bp. Junaidi', '-', 'Pamekasan - Madura', 1),
(40, 'PT. UNICHEMCANDI INDONESIA', '-', 'Jl. Candi SIdoarjo', 1),
(41, 'PT. SURYA CAKRA SAKTI', '-', 'Jl. Jogja - Solo, Klaten Jawa Tengah', 1),
(42, 'PT. SHOW LASER', '-', 'Kawasan Industri Jababeka 3, Jl. Techno 1 Blok B 3D Pasir Gombong, Cikarang Utara Bekasi - Jawa Barat', 1),
(43, 'PR. REPSOL', '-', 'Pamekasan - Madura', 1),
(44, 'SLG TEKNIK', '-', 'Tulungagung', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `incoming_products`
--

CREATE TABLE `incoming_products` (
  `id_produk_masuk` bigint(20) UNSIGNED NOT NULL,
  `tanggal_masuk` varchar(255) NOT NULL,
  `id_supplier` varchar(255) NOT NULL,
  `id_pembeli` varchar(255) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `submit` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `incoming_products`
--

INSERT INTO `incoming_products` (`id_produk_masuk`, `tanggal_masuk`, `id_supplier`, `id_pembeli`, `keterangan`, `submit`) VALUES
(1, '2023-08-05', '7', '1', '-', 1),
(2, '2023-08-08', '9', '1', 'Reture', 1),
(3, '2023-08-04', '13', '1', 'Stock', 1),
(4, '2023-08-07', '14', '1', 'Stock', 1),
(5, '2023-08-04', '15', '1', 'Stock Gudang', 1),
(6, '2023-08-04', '15', '1', 'Stock Gudang', 1),
(7, '2023-08-04', '15', '1', 'Stock Gudang', 1),
(8, '2023-08-04', '15', '1', 'Stock Gudang', 1),
(9, '2023-08-04', '15', '1', 'Stock Gudang', 1),
(10, '2023-08-07', '14', '1', 'Stock Gudang', 1),
(11, '2023-08-04', '13', '1', '-', 1),
(12, '2023-08-10', '11', '1', 'Stock', 1),
(13, '2023-08-11', '22', '1', 'Salah Input', 1),
(14, '2023-08-11', '21', '1', 'Salah Input', 1),
(15, '2023-08-11', '19', '1', 'Stock', 1),
(16, '2023-08-12', '11', '1', 'Stock', 1),
(17, '2023-08-12', '19', '1', 'Stock', 1),
(18, '2023-08-10', '16', '1', 'Stock', 1),
(19, '2023-08-10', '7', '1', 'Stock', 1),
(21, '2023-08-11', '20', '1', 'Stock', 1),
(22, '2023-08-11', '11', '1', 'Stock', 1),
(23, '2023-08-11', '12', '1', 'Stock', 1),
(24, '2023-08-12', '19', '1', 'Stock', 1),
(25, '2023-08-14', '11', '1', 'Stock', 1),
(26, '2023-08-15', '11', '1', 'Stock', 1),
(27, '2023-08-18', '13', '1', 'Revisi Input Tanggal 10 Agustus 2023', 1),
(28, '2023-08-18', '13', '1', 'Stock', 1),
(29, '2023-08-15', '11', '1', 'Stock', 1),
(30, '2023-08-15', '11', '1', 'U/ CV. Cipta Aneka Pangan', 1),
(31, '2023-08-21', '15', '1', 'Salah Input PR. Sayap Mas (out 7/8/2023)', 1),
(32, '2023-08-22', '15', '1', 'Salah Input (Dibra Pratama)', 1),
(33, '2023-08-05', '15', '1', 'Retur WIka Beton', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(2, '2023_04_11_063203_create_failed_jobs_table', 1),
(3, '2023_04_11_063203_create_kategori_produk_table', 1),
(4, '2023_04_11_063203_create_password_reset_tokens_table', 1),
(5, '2023_04_11_063203_create_password_resets_table', 1),
(6, '2023_04_11_063203_create_pembeli_table', 1),
(7, '2023_04_11_063203_create_personal_access_tokens_table', 1),
(8, '2023_04_11_063203_create_produk_keluar_table', 1),
(9, '2023_04_11_063203_create_produk_masuk_table', 1),
(10, '2023_04_11_063203_create_produk_table', 1),
(11, '2023_04_11_063203_create_supplier_table', 1),
(12, '2023_04_11_063203_create_users_table', 1),
(13, '2023_04_17_074038_pivot_incomming_product', 1),
(14, '2023_04_17_081137_pivot_out_product', 1),
(15, '2023_05_06_141151_pivot_laporan', 1),
(16, '2023_05_15_074403_requests', 1),
(17, '2023_05_15_184502_surat_jalans', 1),
(18, '2023_05_15_184556_surat_jalan_details', 1),
(19, '2023_06_30_112119_sistem-customer', 1),
(20, '2023_07_06_101306_sistem_customer_detail', 1),
(21, '2023_07_11_050951_pivot_sistem_customer_details', 1),
(22, '2023_09_11_071952_create_record_service_customers_table', 2),
(23, '2023_09_15_053053_create_record_service_customer_details_table', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `out_products`
--

CREATE TABLE `out_products` (
  `id_produk_keluar` bigint(20) UNSIGNED NOT NULL,
  `tanggal_keluar` varchar(255) NOT NULL,
  `id_pembeli` varchar(255) NOT NULL,
  `id_supplier` varchar(255) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `submit` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `out_products`
--

INSERT INTO `out_products` (`id_produk_keluar`, `tanggal_keluar`, `id_pembeli`, `id_supplier`, `keterangan`, `submit`) VALUES
(1, '2023-08-05', '6', '1', '-', 1),
(2, '2023-08-05', '7', '1', '-', 1),
(3, '2023-08-05', '8', '1', '-', 1),
(4, '2023-08-07', '9', '1', '-', 1),
(5, '2023-08-07', '10', '1', '-', 1),
(6, '2023-08-07', '11', '1', '-', 1),
(7, '2023-08-08', '12', '1', '-', 1),
(8, '2023-08-07', '10', '1', '-', 1),
(9, '2023-08-08', '13', '1', '-', 1),
(10, '2023-08-08', '9', '1', '-', 1),
(11, '2023-08-08', '14', '1', '-', 1),
(12, '2023-08-05', '6', '1', '-', 1),
(13, '2023-08-05', '7', '1', '-', 1),
(14, '2023-08-07', '9', '1', '-', 1),
(15, '2023-08-07', '10', '1', '-', 1),
(16, '2023-08-08', '12', '1', '-', 1),
(17, '2023-08-08', '14', '1', '-', 1),
(18, '2023-08-09', '16', '1', '-', 1),
(19, '2023-08-09', '17', '1', '-', 1),
(20, '2023-08-10', '20', '1', 'Kirim Via JNT Cargo', 1),
(21, '2023-08-08', '15', '1', 'Water Chiller 5x5 (10Hp)', 1),
(22, '2023-08-09', '15', '1', 'Water Chiller 5x5 (10Hp)', 1),
(23, '2023-08-09', '9', '1', '-', 1),
(24, '2023-08-10', '14', '1', '-', 1),
(25, '2023-08-11', '19', '1', '-', 1),
(26, '2023-08-08', '12', '1', '-', 1),
(27, '2023-07-31', '15', '1', 'Pengganti Komp. JM 50 yang diambil', 1),
(28, '2023-08-11', '18', '1', '-', 1),
(29, '2023-08-11', '21', '1', '-', 1),
(30, '2023-08-11', '23', '1', '-', 1),
(31, '2023-08-11', '18', '1', 'Input Susulan', 1),
(32, '2023-08-12', '27', '1', 'Kelebihan dalam Input Barang Masuk', 1),
(33, '2023-08-11', '21', '1', 'Input Susulan', 1),
(34, '2023-08-12', '15', '1', 'Atlas GA 18 Bekas Punya Sendiri', 1),
(35, '2023-08-14', '25', '1', '-', 1),
(36, '2023-08-14', '28', '1', '-', 1),
(37, '2023-08-14', '29', '1', '-', 1),
(38, '2023-08-14', '30', '1', '-', 1),
(39, '2023-08-15', '31', '1', '-', 1),
(40, '2023-08-15', '32', '1', '-', 1),
(41, '2023-08-16', '33', '1', '-', 1),
(42, '2023-08-16', '34', '1', '-', 1),
(43, '2023-08-16', '35', '1', 'Kirim Via JNT Ekspress', 1),
(44, '2023-08-16', '36', '1', '-', 1),
(45, '2023-08-16', '19', '1', 'Kirim Via JNT Ekspress', 1),
(46, '2023-08-18', '37', '1', 'SJ/TU/VIII/052/2023', 1),
(47, '2023-08-18', '37', '1', 'SJ/TU/VIII/052/2023', 1),
(48, '2023-08-18', '37', '1', 'SJ/TU/VIII/052/2023', 1),
(49, '2023-08-18', '37', '1', 'SJ/TU/VIII/052/2023', 1),
(50, '2023-08-18', '37', '1', 'SJ/TU/VIII/052/2023', 1),
(51, '2023-08-18', '39', '1', 'SJ/TU/VIII/054/2023', 1),
(52, '2023-08-18', '40', '1', 'SJ/TU/VIII/053/2023', 1),
(53, '2023-08-18', '40', '1', 'SJ/TU/VIII/055/2023', 1),
(54, '2023-08-18', '35', '1', 'SJ/NTU/VIII/013/2023', 1),
(55, '2023-08-16', '33', '1', 'SJ/TU/VIII/048/2023', 1),
(56, '2023-08-16', '35', '1', 'SJ/NTU/VIII/013/2023', 1),
(57, '2023-08-18', '41', '1', 'SJ/TU/VIII/057/2023', 1),
(58, '2023-08-18', '41', '1', 'SJ/TU/VIII/057/2023', 1),
(59, '2023-08-19', '29', '1', 'SJ/TU/VIII/041/2023 (Input Susulan 14/8/2023)', 1),
(60, '2023-08-18', '42', '1', 'SJ/TU/VIII/047/2023 (kirim 15/8/2023)', 1),
(61, '2023-08-21', '10', '1', 'Input Susulan PR. Sayap Mas (7/8/2023)', 1),
(62, '2023-08-21', '43', '1', 'SJ/TU/VIII/059/2023', 1),
(63, '2023-08-19', '40', '1', 'SJ/TU/VIII/056/2023', 1),
(64, '2023-08-05', '7', '1', 'SJ/TU/VIII/016/2023', 1),
(65, '2023-08-12', '27', '1', 'Kelebihan Input Stock', 1),
(66, '2023-08-19', '44', '1', 'SJ/TU/VIII/058/2023', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pivot_incoming_product`
--

CREATE TABLE `pivot_incoming_product` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_produk_masuk` varchar(255) NOT NULL,
  `id_produk` varchar(255) NOT NULL,
  `jumlah_masuk` int(11) NOT NULL,
  `sisa_stok_masuk` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pivot_incoming_product`
--

INSERT INTO `pivot_incoming_product` (`id`, `id_produk_masuk`, `id_produk`, `jumlah_masuk`, `sisa_stok_masuk`) VALUES
(2, '1', '197', 1, 0),
(3, '2', '172', 1, 12),
(4, '3', '234', 10, 14),
(5, '4', '280', 2, 3),
(6, '5', '286', 5, 5),
(7, '6', '287', 11, 11),
(8, '7', '237', 4, 4),
(9, '8', '238', 7, 7),
(10, '9', '288', 4, 4),
(11, '10', '318', 2, 2),
(12, '11', '286', 10, 15),
(13, '12', '235', 2, 2),
(14, '13', '179', 1, 3),
(15, '14', '179', 1, 4),
(16, '15', '52', 3, 4),
(17, '16', '105', 3, 9),
(18, '17', '184', 2, 4),
(19, '18', '324', 1, 1),
(20, '19', '325', 1, 1),
(22, '21', '292', 2, 5),
(23, '22', '105', 3, 6),
(24, '23', '267', 3, 8),
(25, '24', '52', 3, 7),
(30, '25', '321', 8, 8),
(31, '25', '322', 8, 8),
(32, '25', '323', 8, 8),
(34, '26', '95', 3, 3),
(35, '26', '326', 5, 5),
(36, '26', '327', 1, 1),
(37, '27', '286', 10, 5),
(38, '28', '286', 10, 15),
(39, '29', '170', 5, 7),
(41, '30', '125', 1, 9),
(43, '31', '193', 1, 3),
(44, '32', '190', 1, 9),
(45, '33', '77', 1, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pivot_laporan`
--

CREATE TABLE `pivot_laporan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_produk_masuk` varchar(255) DEFAULT NULL,
  `id_produk_keluar` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pivot_laporan`
--

INSERT INTO `pivot_laporan` (`id`, `id_produk_masuk`, `id_produk_keluar`) VALUES
(1, NULL, '1'),
(2, NULL, '2'),
(3, NULL, '3'),
(4, '1', NULL),
(5, NULL, '6'),
(6, NULL, '5'),
(7, NULL, '4'),
(8, '2', NULL),
(9, '3', NULL),
(10, NULL, '7'),
(11, NULL, '8'),
(12, '4', NULL),
(13, NULL, '9'),
(14, NULL, '10'),
(15, NULL, '11'),
(16, '5', NULL),
(17, '6', NULL),
(18, '7', NULL),
(19, '8', NULL),
(20, '9', NULL),
(21, '10', NULL),
(22, '11', NULL),
(23, NULL, '12'),
(24, NULL, '13'),
(25, NULL, '14'),
(26, NULL, '15'),
(27, NULL, '16'),
(28, NULL, '17'),
(29, NULL, '18'),
(30, NULL, '19'),
(31, '12', NULL),
(32, NULL, '20'),
(33, NULL, '22'),
(34, NULL, '21'),
(35, NULL, '23'),
(36, NULL, '24'),
(37, NULL, '27'),
(38, NULL, '26'),
(39, NULL, '29'),
(40, NULL, '30'),
(41, NULL, '25'),
(42, NULL, '28'),
(43, '13', NULL),
(44, '14', NULL),
(45, '18', NULL),
(46, '19', NULL),
(47, '15', NULL),
(48, '21', NULL),
(49, '22', NULL),
(50, '23', NULL),
(51, '16', NULL),
(52, '17', NULL),
(53, '24', NULL),
(54, '25', NULL),
(55, '26', NULL),
(56, NULL, '32'),
(57, NULL, '33'),
(58, NULL, '31'),
(59, NULL, '34'),
(60, NULL, '35'),
(61, NULL, '37'),
(62, NULL, '38'),
(63, NULL, '40'),
(64, NULL, '36'),
(65, NULL, '39'),
(66, NULL, '45'),
(67, NULL, '43'),
(68, NULL, '44'),
(69, NULL, '42'),
(70, NULL, '41'),
(71, '27', NULL),
(72, NULL, '46'),
(73, NULL, '47'),
(74, NULL, '48'),
(75, NULL, '49'),
(76, NULL, '50'),
(77, NULL, '51'),
(78, NULL, '52'),
(79, NULL, '53'),
(80, '28', NULL),
(81, NULL, '54'),
(82, '29', NULL),
(83, '30', NULL),
(84, NULL, '55'),
(85, NULL, '56'),
(86, NULL, '57'),
(87, NULL, '58'),
(88, NULL, '59'),
(89, NULL, '60'),
(90, '31', NULL),
(91, NULL, '61'),
(92, NULL, '62'),
(93, NULL, '63'),
(94, '32', NULL),
(95, NULL, '64'),
(96, '33', NULL),
(97, NULL, '65'),
(98, NULL, '66');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pivot_out_product`
--

CREATE TABLE `pivot_out_product` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_produk_keluar` varchar(255) NOT NULL,
  `id_produk` varchar(255) NOT NULL,
  `jumlah_keluar` int(11) NOT NULL,
  `sisa_stok_keluar` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pivot_out_product`
--

INSERT INTO `pivot_out_product` (`id`, `id_produk_keluar`, `id_produk`, `jumlah_keluar`, `sisa_stok_keluar`) VALUES
(1, '1', '197', 1, -1),
(2, '1', '209', 1, 0),
(3, '2', '173', 1, 2),
(4, '2', '185', 1, 12),
(5, '2', '190', 1, 8),
(6, '2', '234', 1, 5),
(7, '3', '213', 1, 5),
(8, '4', '172', 1, 11),
(9, '4', '186', 1, 141),
(10, '4', '279', 1, 0),
(11, '4', '237', 1, 2),
(12, '5', '193', 1, 2),
(13, '5', '179', 1, 4),
(14, '5', '234', 1, 4),
(15, '6', '192', 1, 12),
(16, '7', '234', 1, 13),
(17, '8', '234', 2, 11),
(18, '9', '208', 1, 8),
(19, '10', '64', 1, 1),
(20, '11', '280', 2, 1),
(21, '12', '317', 1, 0),
(22, '13', '286', 1, 14),
(23, '14', '288', 1, 3),
(24, '15', '286', 3, 11),
(25, '16', '286', 1, 10),
(26, '17', '318', 2, 0),
(27, '18', '286', 3, 7),
(28, '19', '186', 1, 140),
(29, '19', '174', 1, 14),
(30, '19', '286', 1, 6),
(31, '20', '235', 2, 0),
(32, '21', '294', 2, 1),
(33, '22', '240', 1, 0),
(34, '22', '239', 2, 0),
(35, '23', '277', 2, 16),
(36, '24', '227', 1, 9),
(40, '26', '313', 1, 0),
(41, '27', '313', 1, 1),
(52, '29', '179', 1, 3),
(53, '29', '186', 1, 139),
(54, '29', '144', 1, 5),
(55, '29', '286', 1, 5),
(60, '30', '62', 1, 25),
(61, '30', '186', 1, 138),
(62, '30', '192', 1, 11),
(63, '30', '286', 1, 4),
(64, '25', '186', 1, 137),
(65, '25', '191', 1, 16),
(66, '28', '179', 1, 2),
(67, '28', '16', 1, 8),
(68, '28', '192', 1, 10),
(69, '31', '52', 1, 2),
(70, '32', '52', 3, 4),
(71, '33', '52', 1, 3),
(72, '34', '149', 1, 3),
(73, '34', '173', 1, 1),
(74, '34', '186', 1, 136),
(75, '34', '286', 1, 3),
(76, '35', '184', 1, 3),
(77, '35', '286', 1, 2),
(78, '36', '186', 1, 134),
(79, '36', '286', 1, -1),
(80, '37', '186', 1, 135),
(81, '37', '286', 1, 1),
(82, '38', '185', 1, 11),
(83, '38', '286', 1, 0),
(84, '39', '186', 1, 133),
(85, '39', '286', 2, -3),
(86, '40', '208', 1, 7),
(87, '40', '196', 1, 4),
(88, '40', '181', 1, 31),
(89, '41', '75', 1, 3),
(90, '41', '113', 2, 0),
(91, '41', '326', 5, 0),
(92, '42', '50', 1, 7),
(93, '42', '19', 1, 13),
(94, '42', '136', 1, 17),
(95, '42', '286', 2, -5),
(96, '43', '73', 1, 7),
(97, '43', '35', 1, 7),
(98, '43', '327', 1, 0),
(99, '44', '324', 1, 0),
(100, '45', '95', 1, 2),
(101, '46', '206', 2, 7),
(102, '47', '196', 2, 2),
(103, '48', '213', 2, 3),
(104, '49', '181', 2, 29),
(105, '50', '181', 2, 27),
(106, '51', '207', 1, 0),
(107, '52', '112', 1, 8),
(108, '53', '139', 1, 2),
(109, '54', '286', 1, 14),
(110, '55', '170', 5, 2),
(111, '56', '125', 1, 8),
(112, '57', '174', 1, 13),
(113, '58', '186', 1, 132),
(114, '59', '286', 1, 13),
(115, '60', '173', 1, 0),
(116, '60', '185', 1, 10),
(117, '61', '187', 1, 8),
(118, '62', '200', 1, 2),
(119, '63', '19', 2, 11),
(120, '64', '189', 1, 33),
(121, '65', '105', 3, 6),
(122, '66', '201', 1, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pivot_sistem_customer_details`
--

CREATE TABLE `pivot_sistem_customer_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_sistem_customer_details` varchar(255) NOT NULL,
  `sparepart` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pivot_sistem_customer_details`
--

INSERT INTO `pivot_sistem_customer_details` (`id`, `id_sistem_customer_details`, `sparepart`) VALUES
(1, '1', '-'),
(2, '2', '-'),
(3, '3', '-'),
(4, '4', '-'),
(5, '5', '-'),
(6, '6', '-'),
(7, '7', '-'),
(8, '8', '-'),
(9, '9', '-'),
(10, '10', '-'),
(11, '11', '-'),
(12, '12', '-'),
(14, '14', '-'),
(15, '13', '-'),
(16, '15', '-'),
(17, '16', '-'),
(18, '17', '-'),
(19, '18', '-'),
(20, '19', '-'),
(21, '20', '-'),
(22, '21', '-'),
(23, '22', '-'),
(24, '23', '-'),
(25, '24', '-'),
(26, '25', '-'),
(27, '26', '-'),
(28, '27', '-'),
(29, '28', '-'),
(30, '29', '-'),
(31, '30', '-'),
(32, '31', '-'),
(33, '32', '-'),
(35, '34', '-'),
(36, '35', '-'),
(37, '36', '-'),
(38, '37', '-'),
(39, '38', '-'),
(40, '39', '-'),
(41, '40', '-'),
(42, '41', '-'),
(43, '42', '-'),
(44, '43', '-'),
(45, '44', '-'),
(46, '45', '-'),
(47, '46', '-'),
(48, '47', '-'),
(49, '48', '-'),
(50, '49', '-'),
(51, '50', '-'),
(52, '51', '-'),
(53, '52', '-'),
(54, '33', '-'),
(55, '53', '-'),
(56, '54', '-'),
(57, '55', '-'),
(58, '56', '-'),
(59, '57', '-'),
(60, '58', '-'),
(61, '59', '-'),
(62, '60', '-'),
(64, '61', '-'),
(65, '62', '-'),
(66, '63', '-'),
(67, '64', '-'),
(68, '65', '-'),
(69, '66', '-'),
(70, '67', '-'),
(71, '68', '-'),
(72, '69', '-'),
(73, '70', '-'),
(74, '71', '-'),
(75, '72', '-'),
(76, '73', '-'),
(77, '74', '-'),
(78, '75', '-'),
(79, '76', '-'),
(80, '77', '-'),
(81, '78', '-'),
(82, '79', '-'),
(83, '80', '-'),
(84, '81', '-'),
(86, '82', '-'),
(87, '83', '-'),
(88, '84', '-'),
(89, '85', '-'),
(90, '86', '-'),
(91, '87', '-'),
(92, '88', '-'),
(93, '89', '-'),
(94, '90', '-'),
(95, '91', '-'),
(96, '92', '-'),
(97, '93', '-'),
(98, '94', '-'),
(99, '95', '-'),
(100, '96', '-'),
(101, '97', '-'),
(102, '98', '-'),
(103, '99', '-'),
(104, '100', '-'),
(105, '101', '-'),
(106, '102', '-'),
(107, '103', '-'),
(108, '104', '-'),
(109, '105', '-'),
(110, '106', '-'),
(111, '107', '-'),
(112, '108', '-'),
(113, '109', '-'),
(114, '110', '-'),
(115, '111', '-'),
(116, '112', '-'),
(117, '113', '-'),
(118, '114', '-'),
(119, '115', '-'),
(120, '116', '-'),
(121, '117', '-'),
(122, '118', '-'),
(123, '119', '-'),
(124, '120', '-'),
(125, '121', '-'),
(127, '122', '-'),
(128, '123', '-'),
(129, '124', '-'),
(130, '125', '-'),
(131, '126', '-'),
(132, '127', '-'),
(133, '128', '-'),
(134, '129', '-'),
(135, '130', '-'),
(136, '131', '-'),
(137, '132', '-'),
(138, '133', '-'),
(139, '134', '-'),
(140, '135', '-'),
(141, '136', '-'),
(142, '137', '-'),
(143, '138', '-'),
(144, '139', '-'),
(145, '140', '-'),
(146, '141', '-'),
(147, '142', '-'),
(148, '143', '-'),
(149, '144', '-'),
(150, '145', '-'),
(151, '146', '-'),
(152, '147', '-'),
(153, '148', '-'),
(154, '149', '-'),
(155, '150', '-'),
(156, '151', '-'),
(157, '152', '-'),
(158, '153', '-'),
(159, '154', '-'),
(160, '155', '-'),
(161, '156', '-'),
(162, '157', '-'),
(163, '158', '-'),
(164, '159', '-'),
(165, '160', '-'),
(166, '161', '-'),
(167, '162', '-'),
(168, '163', '-'),
(169, '164', '-'),
(170, '165', '-'),
(171, '166', '-'),
(172, '167', '-'),
(173, '168', '-'),
(174, '169', '-'),
(175, '170', '-'),
(176, '171', '-');

-- --------------------------------------------------------

--
-- Struktur dari tabel `products`
--

CREATE TABLE `products` (
  `id_produk` bigint(20) UNSIGNED NOT NULL,
  `no_kartu` varchar(255) NOT NULL,
  `nama_produk` varchar(255) NOT NULL,
  `id_kategori_produk` varchar(255) NOT NULL,
  `satuan` varchar(255) NOT NULL,
  `stok` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `products`
--

INSERT INTO `products` (`id_produk`, `no_kartu`, `nama_produk`, `id_kategori_produk`, `satuan`, `stok`) VALUES
(1, '2001', 'OIL FILTER WINDSTAR / CECCATO', '2', '1631 0118 00', 1),
(2, '2002', 'OIL FILTER   ', '2', '6.4778.0', 8),
(3, '2003', 'OIL FILTER ', '2', 'DS-5701', 3),
(4, '2004', 'OIL FILTER ', '2', 'WD962', 0),
(5, '2005', 'OIL FILTER ', '2', '2605 5314 50', 2),
(6, '2006', 'OIL FILTER SULLAIR', '2', '2500 25-525', 2),
(7, '2007', 'OIL FILTER KAESER ASD 35 / ASD 40 / ASD 50', '2', '6.3463.0', 2),
(8, '2008', 'OIL FILTER ', '2', 'PS-CE13-533', 2),
(9, '2009', 'OIL FILTER SCR BIRU 50M / 30 M', '2', '25200007-005', 23),
(10, '2010', 'OIL FILTER', '2', 'PS-CE11-507', 2),
(11, '2011', 'OIL FILTER', '2', 'P-CE13-526', 2),
(12, '2012', 'OIL FILTER SULLAIR ', '2', '88290014-484', 4),
(13, '2013', 'OIL FILTER', '2', 'OL00094', 0),
(14, '2014', 'OIL FILTER', '2', 'MLO.019295 / 2202 9295 00', 6),
(15, '2015', 'OIL FILTER', '2', '6.3462.0', 7),
(16, '2016', 'OIL FILTER', '2', '15025102 / OL00962', 8),
(17, '2017', 'OIL FILTER HITACHI OSP 22', '2', 'C-5604 / 59031210', 1),
(18, '2018', 'OIL FILTER', '2', '2205 0155-709', 2),
(19, '2019', 'OIL FILTER KAESER  ', '2', '6.4493.0', 11),
(20, '2020', 'OIL FILTER', '2', '6.4693.0', 6),
(21, '2021', 'OIL FILTER', '2', '6221 3725 00', 3),
(22, '2022', 'OIL FILTER', '2', 'P-CE11-502', 1),
(23, '2023', 'OIL FILTER', '2', 'SCR 25200018-005 / P55-4005 / PS CE11 506', 11),
(24, '2024', 'OIL FILTER', '2', '250025-526', 13),
(25, '2025', 'OIL FILTER', '2', '37438-02700', 2),
(26, '2026', 'OIL FILTER', '2', '37438-05601 / 37438-03300 / J8613300', 1),
(27, '2027', 'OIL FILTER', '2', '3991 1615', 4),
(28, '2028', 'OIL FILTER', '2', 'W11-102', 8),
(29, '2029', 'OIL FILTER', '2', 'C 5602 / C 5614', 2),
(30, '2030', 'OIL FILTER', '2', '6.3465.0', 6),
(31, '2031', 'OIL FILTER', '2', '1625 1656 40', 5),
(32, '2032', 'OIL FILTER', '2', '1625 7525 00', 11),
(33, '2033', 'OIL FILTER', '2', 'MLO.01314200 / 1622 3142 / 1625 8400 81', 1),
(34, '2034', 'OIL FILTER KAESER', '2', '6.3464.1', 13),
(35, '2035', 'OIL FILTER', '2', '6.1985.0', 7),
(36, '2036', 'OIL FILTER', '2', '3991 1631', 3),
(37, '2037', 'OIL FILTER', '2', '1622 3652', 11),
(38, '2038', 'OIL FILTER', '2', '1092 9001 46', 1),
(39, '2039', 'OIL FILTER', '2', 'C-4903', 1),
(40, '2040', 'OIL FILTER', '2', '88298003-408', 4),
(41, '2041', 'OIL FILTER ATLAS 10 HP DRAT KIRI', '2', '1625 4261 00', 2),
(42, '2042', 'OIL FILTER', '2', 'PS-CE11-501', 5),
(43, '2043', 'OIL FILTER', '2', 'C-15277', 1),
(44, '2044', 'OIL FILTER', '2', 'BF799', 1),
(45, '1001', 'AIR FILTER KAESER ASD37/SK26', '1', '6.4143.0', 5),
(46, '1002', 'AIR FILTER  ', '1', '1619 2798 00 ', 6),
(47, '1003', 'AIR FILTER ', '1', '22203095', 7),
(48, '1004', 'AIR FILTER', '1', '6.4149.0', 6),
(49, '1005', 'AIR FILTER KAESER CSD122/CSDX 162', '1', '6.4148.0', 6),
(50, '1006', 'AIR FILTER KAESER BS61 / BSD72', '1', '6.4139.0', 7),
(51, '1007', 'PRIMARY AIR FILTER ', '1', '88290014-485', 6),
(52, '1008', 'AIR FILTER', '1', 'C14200/2116040176/A8505', 2),
(53, '1009', 'AIR FILTER ASD 36', '1', '6.4163.0', 4),
(54, '1010', 'AIR FILTER', '1', '2010803-002/56003140295', 11),
(55, '1011', 'AIR FILTER', '1', '32143-11800', 3),
(56, '1012', 'AIR FILTER ', '1', '25100015-002/C20325/2', 0),
(57, '1013', 'AIR FILTER ', '1', 'A1031', 1),
(58, '1014', 'AIR FILTER COMPRESSOR PISTON ', '1', 'SWAN', 2),
(59, '1015', 'AIR FILTER COMPRESSOR PISTON ', '1', 'PUMA', 3),
(60, '1016', 'AIR FILTER ', '1', 'A1505/6211474300', 1),
(61, '1017', 'AIR FILTER ', '1', '1613 9503 00/C25860-2/A22350/1625769100', 10),
(62, '1018', 'AIR FILTER ', '1', '6.2084.0 / 1613740700 /C16400', 25),
(63, '1019', 'AIR FILTER KOBELCO ', '1', 'PCE05-503 / SCE 05-503 / A5541 / SFA8889', 2),
(64, '1020', 'AIR FILTER ', '1', 'A 1401 ', 1),
(65, '1021', 'AIR FILTER ', '1', '1613 9501 / C25740 ', 12),
(66, '1022', 'AIR FILTER ', '1', 'C20500 / 6.2085.0 / SA-K8301 / 1613 7408 / 6211474300', 5),
(67, '1023', 'AIR FILTER ', '1', '25100130-071', 3),
(68, '1024', 'AIR FILTER 75 HP ', '1', 'SA K7409 / A6106', 1),
(69, '1025', 'AIR FILTER ', '1', 'ME 017246 / A1088', 1),
(70, '1026', 'AIR FILTER ', '1', 'B005705760002', 2),
(71, '1027', 'AIR FILTER 50 HP - PLAT ', '1', '275120180', 10),
(72, '1028', 'AIR FILTER ', '1', '6.4432.0', 1),
(73, '1029', 'AIR FILTER ', '1', '6.2003.0 / C1134', 7),
(74, '1030', 'AIR FILTER', '1', '6.2182.0 / PSCE03-509', 0),
(75, '1031', 'AIR FILTER ', '1', '1622 1855 01 / 2901 1950 / 6.3564.0', 3),
(76, '1032', 'AIR FILTER ', '1', '1622 3652 00', 6),
(77, '1033', 'AIR FILTER', '1', '88290014-486', 2),
(78, '1034', 'AIR FILTER ', '1', 'P181108', 1),
(79, '1035', 'AIR FILTER ', '1', '6.1994.0', 3),
(80, '1036', 'AIR FILTER ', '1', '25100075-071', 1),
(81, '1037', 'AIR FILTER ', '1', '1619 2847', 2),
(82, '1038', 'AIR FILTER JM 75 M ', '1', 'SA-K8313', 2),
(83, '1039', 'AIR FILTER ', '1', '6.2185.0 (RS3998) / 1151 6974', 8),
(84, '1040', 'AIR FILTER ', '1', 'SPA 1056', 2),
(85, '1041', 'AIR FILTER ', '1', '2901 0050 000 / 2901 0050 060 ', 2),
(86, '1042', 'AIR FILTER ', '1', 'A-6006', 2),
(87, '1043', 'AIR FILTER ', '1', '2250168-053', 2),
(88, '1044', 'AIR FILTER ', '1', '100013298', 0),
(89, '1045', 'AIR FILTER ', '1', '6.4055.1', 0),
(90, '1046', 'AIR FILTER ', '1', '1621 7376', 1),
(91, '1047', 'AIR FILTER ', '1', 'SPA -0703', 2),
(92, '1048', 'AIR FILTER ', '1', 'SPA-8502 H', 0),
(93, '1049', 'AIR FILTER SULLAIR', '1', '02250127-684', 0),
(94, '1050', 'AIR FILTER', '1', 'ALK-1740700', 3),
(95, '1051', 'AIR FILTER', '1', 'HM022120062', 2),
(96, '1052', 'AIR FILTER', '1', '11075120', 1),
(97, '1053', 'AIR FILTER', '1', 'C23185', 1),
(98, '1054', 'AIR FILTER', '1', '8829002-337 / 8829002-338 ', 0),
(99, '1055', 'AIR FILTER', '1', 'A-1014', 2),
(100, '1056', 'AIR FILTER', '1', 'A-1801', 1),
(101, '1057', 'ELEMENT FILTER ', '1', 'S-035', 9),
(102, '1058', 'ELEMENT FILTER ', '1', 'S-060', 9),
(103, '1059', 'AIR FILTER ELITE EA 75 ', '1', 'LO010802-0031', 3),
(104, '1060', 'AIR FILTER ', '1', 'C1450', 6),
(105, '1061', 'AIR FILTER ', '1', 'HM028200078-HI', 6),
(106, '1062', 'AIR FILTER ', '1', '88290006-013', 3),
(107, '1063', 'AIR FILTER ', '1', 'A1331', 2),
(108, '3001', 'SEPARATOR ATLAS COPCO ', '3', '2901 0432 00', 1),
(109, '3002', 'OIL SEPARATOR 50 PM ', '3', '4033 5101 02 / MLS-07403 ', 0),
(110, '3003', 'OIL SEPARATOR  ', '3', '1613 6880 00', 4),
(111, '3004', 'OIL SEPARATOR ', '3', '1613 7306 00', 3),
(112, '3005', 'SEPARATOR ATLAS GA 75 ', '3', '1622 3656.00 / 3002600140 / 2901-0858-00', 8),
(113, '3006', 'OIL SEPARATOR ', '3', '290177900', 0),
(114, '3007', 'OIL SEPARATOR ', '3', 'LB 962/2', 8),
(115, '3008', 'OIL SEPARATOR ', '3', 'MLS.01929400/2202 9294 00', 4),
(116, '3009', 'SEPARATOR ', '3', 'J85.4985.1 / 5255 3020', 10),
(117, '3010', 'SEPARATOR ', '3', '6.4059.3 / 6221 3728 00', 8),
(118, '3011', 'SEPARATOR ', '3', '9826 2216', 1),
(119, '3012', 'SEPARATOR HITACHI ', '3', '-', 1),
(120, '3013', 'OIL SEPARATOR ', '3', 'SB-520', 1),
(121, '3014', 'SEPARATOR ', '3', '5053 3021', 1),
(122, '3015', 'OIL SEPARATOR ', '3', '6.3789.0 / 8820-0753 ', 4),
(123, '3016', 'SEPARATOR ', '3', '2205 6156 22', 0),
(124, '3017', 'SEPARATOR ATLAS GA 37', '3', '1613 8397 00 / 2901 0566 00 / 2901 0556 00', 6),
(125, '3018', 'SEPARATOR KAESER SK 26 ', '3', '6.2008.1', 8),
(126, '3019', 'SEPARATOR KOMP ALMIG ', '3', 'LB 962/21', 10),
(127, '3020', 'OIL SEPARATOR FUSHENG SA22', '3', 'LB 11102-2 / MLS19111022 / 71121311-46910', 10),
(128, '3021', 'SEPARATOR ASD 37 ', '3', '6.3669.0', 3),
(129, '3022', 'OIL SEPARATOR ', '3', '02250121 - 500 / 02250137 895', 2),
(130, '3023', 'OIL SEPARATOR ', '3', '34220-07500', 3),
(131, '3024', 'OIL SEPARATOR ', '3', 'RB9140365 R', 1),
(132, '3025', 'OIL SEPARATOR ', '3', '2901-1626 / 1622-3140', 4),
(133, '3026', 'OIL SEPARATOR ', '3', '6.3672.0 / 6.3792.2', 3),
(134, '3027', 'OIL SEPARATOR', '3', 'P-CE03-577 / PCE03-595', 2),
(135, '3028', 'OIL SEPARATOR ', '3', 'BN 23753 / 93523215', 2),
(136, '3029', 'SEPARATOR BSD 72', '3', '6.3569.0', 17),
(137, '3030', 'OIL SEPARATOR ATLAS COPCO GA 75', '3', '1202-7419 / SLK 01741900', 0),
(138, '3031', 'OIL SEPARATOR ', '3', '2901196300', 6),
(139, '3032', 'OIL SEPARATOR ', '3', '6.4272.2', 2),
(140, '3033', 'SEPARATOR ', '3', '1202 6414 00 / 1202 0414', 2),
(141, '3034', 'OIL SEPARATOR ', '3', '6.3571.0', 9),
(142, '3035', 'SEPARATOR SULLAIR PRIMER', '3', '250034-116 / 250042-862', 0),
(143, '3036', 'OIL SEPARATOR ', '3', 'P CE03 530 00 ', 1),
(144, '3037', 'OIL SEPARATOR 50 HP', '3', 'LB 13145-3 / 71131211-46910', 5),
(145, '3038', 'OIL SEPARATOR ', '3', '6.3623.0', 1),
(146, '3039', 'SEPARATOR SULLAIR', '3', '25034-116', 1),
(147, '3040', 'SEPARATOR SULLAIR', '3', '02250100-755 / 02250100-756', 0),
(148, '3041', 'SEPARATOR ', '3', '4930 1521 01 / 6.2011.1', 4),
(149, '3042', 'SEPARATOR ', '3', '1613 7502 00 / 1613 7500 82', 3),
(150, '3043', 'OIL SEPARATOR ', '3', '34220 - 11100', 0),
(151, '3044', 'SEPARATOR ', '3', '6221.3383.00', 6),
(152, '3045', 'SEPARATOR ', '3', '88298002-137 & 88298001-705', 0),
(153, '3046', 'SEPARATOR ', '3', '39894597', 1),
(154, '3047', 'OIL SEPARATOR ', '3', '6.2013.0', 2),
(155, '3048', 'SEPARATOR ', '3', '1622 6460 00', 1),
(156, '3049', 'SEPARATOR ', '3', '34220-05501-00', 0),
(157, '3050', 'SEPARATOR', '3', 'LB 719 / 221055', 10),
(158, '3051', 'SEPARATOR ', '3', '6.2012.0', 6),
(159, '3052', 'SEPARATOR ', '3', '25300065-031', 9),
(160, '3053', 'SEPARATOR ', '3', 'PSCE 13-053 / PCE03-530', 1),
(161, '3054', 'SEPARATOR ', '3', '9826 2216 / LB 1374', 0),
(162, '3055', 'SEPARATOR ', '3', 'RB 9140265R', 2),
(163, '3056', 'SEPARATOR ', '3', '-', 1),
(164, '3057', 'SEPARATOR ', '3', 'PCE 03-537', 0),
(165, '3058', 'SEPARATOR ', '3', '2205 6156 40 ', 1),
(166, '3059', 'SEPARATOR ', '3', '6.2014.0', 1),
(167, '3060', 'SEPARATOR ', '3', '3422 0149 00', 1),
(168, '3061', 'SEPARATOR 100 HP', '3', '3221227250', 0),
(169, '3062', 'SEPARATOR', '3', '27/33/21/15,5', 1),
(170, '3063', 'SEPARATOR', '3', '2901920040', 2),
(171, '3064', 'SEPARATOR', '3', 'LB 719/2', 1),
(172, 'JM 1001', 'AIR FILTER 10 HP', '1', '1000.80.100.70/10', 12),
(173, 'JM 1002', 'AIR FILTER 20 HP', '1', '1000.135.118.67/15-20', 0),
(174, 'JM 1003', 'AIR FILTER JM 30 M', '1', '1000.155.165.80/30', 13),
(175, 'JM 1004', 'AIR FILTER JM 50 M / SULLAIR', '1', '1000.134.249.150/50', 37),
(176, 'JM 1005', 'AIR FILTER 50 HP / A', '1', '1000.210.168.83/50A', 2),
(177, 'JM 1006', 'AIR FILTER 50 HP (KARET 1 SISI)', '1', '1000.180.280.120/50B', 3),
(178, 'JM 1007', 'AIR FILTER 75/100 HP', '1', '1000.205.300.200/75-100', 21),
(179, 'JM 1008', 'AIR FILTER 100 HP ', '1', '1000.408.218.125/100', 4),
(180, 'JM 1009', 'LINE FILTER ', '1', '10 / 20 HP ', 36),
(181, 'JM 1010', 'LINE FITER', '1', '30 / 50 HP', 27),
(182, 'JM 1011', 'LINE FILTER', '1', '75 / 100 HP', 1),
(183, 'JM 1012', 'LINE FILTER ', '1', '125 / 150 HP', 0),
(184, 'JM 2001', 'OIL FILTER JM 10 HP', '2', '2000.719.10', 3),
(185, 'JM 2002', 'OIL FILTER JM 20 HP', '2', '2000.950.15-20', 10),
(186, 'JM 2003', 'OIL FILTER JM 30 - 60 HP', '2', '2000.962.30-60', 132),
(187, 'JM 2004', 'OIL FILTER JM 75 - 100 HP', '2', '2000.W13145.75-125', 8),
(188, 'JM 3001', 'OIL SEPARATOR JM 10 HP', '3', '3000.F115.90.135-10', 10),
(189, 'JM 3002', 'SEPARATOR 20 HP', '3', '3000.F170.135.160-15/20', 33),
(190, 'JM 3003', 'SEPARATOR JM 20 HP', '3', '55110165100', 9),
(191, 'JM 3004', 'SEPARATOR JM 30 HP', '3', '3000.F170.135.200-30/40', 16),
(192, 'JM 3005', 'SEPARATOR 50 HP', '3', '3000.F200.170.230-50/60', 10),
(193, 'JM 3006', 'OIL SEPARATOR 100 HP', '3', '3000.F355.300.220.305-75/100/120', 3),
(194, 'UNIT1', 'AIR DRYER 20', '4', '-', 4),
(195, 'UNIT2', 'AIR DRYER 30', '4', '-', 0),
(196, 'UNIT3', 'AIR DRYER 50', '4', '-', 2),
(198, 'UNIT5', 'AIR DRYER 100', '4', '-', 0),
(199, 'UNIT6', 'KOMPRESOR 3 IN 1 10 D', '4', '-', 0),
(200, 'UNIT7', 'KOMPRESOR 3 IN 1 20 D', '4', '-', 2),
(201, 'UNIT8', 'KOMPRESOR 3 IN 1 20 PM High Pressure', '4', '-', 1),
(202, 'UNIT9', 'KOMPRESOR 30 PM', '4', '-', 4),
(203, 'UNIT10', 'KOMPRESOR 50 PM', '4', '-', 3),
(204, 'UNIT11', 'KOMPRESOR 10 D', '4', '-', 3),
(205, 'UNIT12', 'KOMPRESOR 20 D', '4', '-', 6),
(206, 'UNIT13', 'KOMPRESOR 30 D', '4', '-', 7),
(207, 'UNIT14', 'KOMPRESOR 40 D', '4', '-', 0),
(208, 'UNIT15', 'KOMPRESOR 50 D', '4', '-', 7),
(209, 'UNIT16', 'KOMPRESOR 75 D', '4', '-', 0),
(210, 'UNIT17', 'KOMPRESOR 100 D', '4', '-', 1),
(211, 'UNIT18', 'KOMPRESOR 150 D', '4', '-', 0),
(212, 'UNIT19', 'AIR TANK 600 LITER ', '4', '-', 0),
(213, 'UNIT20', 'AIR TANK 1000 LITER', '4', '-', 3),
(214, 'UNIT21', 'AIR TANK 1500 LITER ', '4', '-', 0),
(215, 'UNIT22', 'AIR TANK 2000 LITER', '4', '-', 0),
(216, 'SPR01', 'AUTO DRAIN ELECTRIC 220V', '5', '-', 10),
(217, 'SPR02', 'AUTO DRAIN MANUAL (BOLA)', '5', '-', 4),
(218, 'SPR03', 'AUTO DRAIN MANUAL (PELAMPUNG)', '5', '-', 12),
(219, 'SPR04', 'SELECTOR SWITCH ON/OFF', '5', '-', 1),
(220, 'SPR05', 'EMERGENCY SWITCH ', '5', '-', 0),
(221, 'SPR06', 'PUSH BUTTON ON', '5', '-', 5),
(222, 'SPR07', 'FILTER DRYER 163', '5', '-', 1),
(223, 'SPR08', 'FILTER DRYER ZEK 305', '5', '-', 1),
(224, 'SPR09', 'FILTER DRYER ZEK 306', '5', '-', 2),
(225, 'SPR10', 'FILTER DRYER ZEK 053', '5', '-', 2),
(226, 'SPR11', 'FILTER DRYER ZEK 164', '5', '-', 3),
(227, 'SPR12', 'CONTROLLER MAM 880 (B) (200)', '5', '-', 9),
(228, 'SPR13', 'CONTROLLER MAM 6080', '5', '-', 5),
(229, 'SPR14', 'MINIMUM PRESSURE VALVE (2901 099700)', '5', '-', 3),
(230, 'SPR15', 'OIL CONTROL LEVEL PELAMPUNG (ATLAS COPCO)', '5', '-', 9),
(231, 'SPR16', 'OIL LEVEL CONTROL GLASS (22 Cm)', '5', '-', 7),
(232, 'SPR17', 'OIL LEVEL CONTROL GLASS (17.5 Cm)', '5', '-', 4),
(233, 'SPR18', 'OLI NDURANCE 1630 0918.00', '6', '-', 0),
(235, 'SPR20', 'OLI SIGMA KAESER 9.5409.00020', '6', '-', 0),
(238, 'SPR23', 'OLI INGERSOLL RAND 38459582', '6', '-', 7),
(239, 'SPR24', 'PRESSURE GAUGE (HIGH) REFCO', '5', '-', 0),
(240, 'SPR25', 'PRESSURE GAUGE (LOW) REFCO', '5', '-', 0),
(241, 'SPR26', 'PRESSURE SWITCH TRPS 01 (KOMPRESOR PISTON)', '5', '-', 0),
(242, 'SPR27', 'RUBBER COUPLING JM 10 D', '5', '-', 3),
(243, 'SPR28', 'RUBBER COUPLING JM 20 D', '5', '-', 6),
(244, 'SPR29', 'COUPLING GR 55', '5', '-', 3),
(245, 'SPR30', 'COUPLING GR 48', '5', '-', 5),
(246, 'SPR31', 'COUPLING GR 42', '5', '-', 8),
(247, 'SPR32', 'COUPLING GR 38', '5', '-', 2),
(248, 'SPR33', 'COUPLING GR 28', '5', '-', 3),
(249, 'SPR34', 'SAFETY VALVE 16 BAR (AIR TANK)', '5', '-', 11),
(250, 'SPR35', 'SEAL 32*50*10', '5', '-', 10),
(251, 'SPR36', 'SEAL 60*76*10', '5', '-', 9),
(252, 'SPR37', 'SEAL 60*80*10', '5', '-', 0),
(253, 'SPR38', 'SEAL 60*80*12', '5', '-', 4),
(254, 'SPR39', 'SEAL 65*80*8', '5', '-', 3),
(255, 'SPR40', 'SEAL 35*52*8', '5', '-', 4),
(256, 'SPR41', 'SEAL 55*72*8', '5', '-', 14),
(257, 'SPR42', 'SEAL 65*85*10', '5', '-', 9),
(258, 'SPR43', 'SEAL 65*85*12', '5', '-', 8),
(259, 'SPR44', 'SEAL 75*95*10', '5', '-', 4),
(260, 'SPR45', 'SEAL 60*85*12', '5', '-', 0),
(261, 'SPR46', 'SEAL 36*52*8', '5', '-', 4),
(262, 'SPR47', 'SELENOID 110V', '5', '-', 2),
(263, 'SPR48', 'SELENOID 220V', '5', '-', 2),
(264, 'SPR49', 'SELENOID VALVE KIT 30 HP', '5', '-', 3),
(265, 'SPR50', 'SELENOID VALVE KIT 50 HP', '5', '-', 3),
(266, 'SPR51', 'SENSOR PRESSURE / PRESSURE TRANSMITOR ', '5', '-', 9),
(267, 'SPR52', 'SENSOR TEMPERATURE KA041346', '5', '-', 8),
(268, 'SPR53', 'SENSOR TEMPERATURE KA041349', '5', '-', 7),
(269, 'SPR54', 'SENSOR TEMPERATURE KA041352', '5', '-', 0),
(270, 'SPR55', 'SENSOR TEMPERATURE KAESER (7.7040.1)', '5', '-', 1),
(271, 'SPR56', 'TEMPERATURE CONTROLE (ELIWELL) PAKET', '5', '-', 0),
(272, 'SPR57', 'SENSOR THERMOCOUPLE ', '5', '-', 4),
(273, 'SPR58', 'THERMOSTAT VALVE KIT (1622 7064 01)', '5', '-', 1),
(274, 'SPR59', 'OIL REMOVER ', '5', '-', 0),
(275, 'SPR60', 'TRAFO PRIMER 380 V - SEKUNDER 220 V', '5', '-', 4),
(276, 'SPR61', 'STARFLEX LEMBARAN (SOFT)', '5', '-', 6),
(277, 'SPR62', 'CHECK VALVE SEPARATOR OIL', '5', '-', 16),
(278, '1064', 'AIR FILTER', '1', 'A-6707 / SA-K8305', 0),
(279, '3065', 'OIL SEPARATOR', '3', '1612 3869', 0),
(281, '3066', 'Oil Separator 01986900', '3', '01986900', 1),
(282, 'SPR64', 'Kondensor', '5', 'FN 07', 0),
(283, 'SPR65', 'Kondensor', '5', 'FN 36', 0),
(284, 'SPR66', 'Axial Fan LTF 12\"', '5', '-', 0),
(285, 'SPR67', 'Axial Fan LTF 16\"', '5', '-', 0),
(286, 'SPR19', 'OLI JM EAGLE ISO VG 46', '6', '-', 13),
(287, 'SPR21', 'OLI SULLUBE 250022-669', '6', '-', 11),
(288, 'SPR22', 'OLI NDURANCE 1630 1041.20', '6', '-', 3),
(289, 'SPR68', 'FILTER OIL PRESSURE CONTROL', '5', '-', 2),
(290, 'SPR69', 'ACCES VALVE ', '5', '-', 0),
(291, 'SPR70', 'PIPA KAPILER 0.07 mm (PERMETER)', '5', '-', 17),
(292, 'SPR71', 'FREON CHEMOURS CHINA R22', '5', '-', 5),
(293, 'SPR72', 'PRESSURE GAUGE 16 BAR (AIR TANK)', '5', '-', 8),
(294, 'SPR73', 'PRESSURE CONTROL LP-HP MANUAL', '5', '-', 1),
(295, 'SPR74', 'PRESSURE CONTROL LP MANUAL', '5', '-', 0),
(296, 'SPR75', 'KABEL NYYHY 3 X 1,5', '5', '-', 42),
(297, 'SPR76', 'KABEL NYAF 1 X 6 mm', '5', '-', 65),
(298, 'SPR77', 'KABEL NYAF 1 X 10 mm', '5', '-', 85),
(299, 'SPR78', 'THERMO VALVE LINGHEIN L22', '5', '-', 1),
(300, 'SPR79', 'FILTER BATU - CORE D-48', '5', '-', 1),
(301, 'SPR80', 'FAN COMPRESSOR 30 HP 20\"', '5', '-', 2),
(302, 'SPR81', 'FAN COMPRESSOR 50 HP 24\"', '5', '-', 1),
(303, 'SPR82', 'FAN WATER CHILLER 16\"', '5', '-', 13),
(304, 'SPR83', 'FAN WATER CHILLER 24\"', '5', '-', 1),
(305, 'SPR84', 'CONTROL DISPLAY HMI-500', '5', '-', 1),
(306, 'SPR85', 'SEAL SHAFT KAESER 2.5013.30010', '5', '-', 0),
(307, 'SPR86', 'OMEGA COUPLING E 70', '5', '-', 1),
(308, 'SPR87', 'OMEGA COUPLING E 50', '5', '-', 5),
(309, 'SPR88', 'OMEGA COUPLING E 30', '5', '-', 0),
(310, 'SPR89', 'OMEGA COUPLING E 10', '5', '-', 9),
(311, 'SPR90', 'INVERTER 20 HP', '5', '-', 0),
(312, 'SPR91', 'INVERTER 30 HP', '5', '-', 3),
(313, 'SPR92', 'INVERTER 50 HP', '5', '-', 0),
(314, 'SPR93', 'KAWAT LAS PERAK', '5', '-', 60),
(315, 'SPR94', 'GREASE UNIREX N3 6.3234.0', '5', '-', 4),
(316, 'SPR95', 'DUCT TAPE', '5', '-', 12),
(317, 'UNIT4', 'AIR DRYER 75', '4', '-', 0),
(318, 'SPR63', 'KONTAKTOR CJX2-8011', '5', '-', 0),
(319, 'SPR96', 'Expansion Valve', '5', 'TCLE 5HW', 0),
(320, 'SPR97', 'Expansion Valve', '5', 'TCLE 10HW', 0),
(321, '1065', 'Air Filter', '1', '6.4212.0', 8),
(322, '2045', 'Oil Filter', '2', '6.3461.0H1', 8),
(323, '3065', 'Oil Separator', '3', '6.4334.0', 8),
(324, '1066', 'Air Filter', '1', 'C 1368', 0),
(325, 'SPR98', 'INVERTER 75 HP', '5', '-', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `record_service_customers`
--

CREATE TABLE `record_service_customers` (
  `id_record` bigint(20) UNSIGNED NOT NULL,
  `id_pt` varchar(255) NOT NULL,
  `contact_person` varchar(255) DEFAULT NULL,
  `tanggal` varchar(255) DEFAULT NULL,
  `running_hours` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `record_service_customers`
--

INSERT INTO `record_service_customers` (`id_record`, `id_pt`, `contact_person`, `tanggal`, `running_hours`, `type`) VALUES
(1, '32', '122', '2023-09-15', 'HM : 220 Jam', 'asdasd'),
(2, '63', 'asdas', '2023-09-15', '213', 'JM 50 D');

-- --------------------------------------------------------

--
-- Struktur dari tabel `record_service_customer_details`
--

CREATE TABLE `record_service_customer_details` (
  `id_record_details` bigint(20) UNSIGNED NOT NULL,
  `id_record` bigint(20) NOT NULL,
  `service` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `record_service_customer_details`
--

INSERT INTO `record_service_customer_details` (`id_record_details`, `id_record`, `service`) VALUES
(1, 1, 'asdads'),
(2, 1, 'asdasd'),
(3, 1, 'asdasd'),
(4, 1, 'asdasd'),
(5, 1, 'asd'),
(6, 1, 'asd'),
(7, 1, 'asd'),
(8, 1, 'asd'),
(9, 1, 'asd'),
(10, 1, 'asd'),
(11, 1, 'asd'),
(12, 2, '123'),
(13, 2, '123'),
(14, 2, '123'),
(15, 2, '123'),
(16, 2, '123');

-- --------------------------------------------------------

--
-- Struktur dari tabel `requests`
--

CREATE TABLE `requests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `permintaan_barang` varchar(255) DEFAULT NULL,
  `jumlah_permintaan` varchar(255) DEFAULT NULL,
  `jumlah_relasi` varchar(255) DEFAULT NULL,
  `tanggal_permintaan` varchar(255) DEFAULT NULL,
  `tanggal_relasi` varchar(255) DEFAULT NULL,
  `toko` varchar(255) DEFAULT NULL,
  `harga_satuan` varchar(255) DEFAULT NULL,
  `harga_total` varchar(255) DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `tempat_supplier` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `requests`
--

INSERT INTO `requests` (`id`, `permintaan_barang`, `jumlah_permintaan`, `jumlah_relasi`, `tanggal_permintaan`, `tanggal_relasi`, `toko`, `harga_satuan`, `harga_total`, `keterangan`, `tempat_supplier`) VALUES
(1, 'Jerigen 20 ltr Abu-abu', '36 Pcs', '36 Pcs', '2023-08-04', '2023-08-05', 'PT. Diansari Puri Plastindo', '39500', '1422000', NULL, 'Gedangan, Sidoarjo'),
(2, 'Elbow 7/8', '10 ', '10 ', '2023-08-08', '2023-08-08', 'PT. Refrigerasi Indo Tama', '14000', '140000', NULL, 'Surabaya'),
(3, 'Elbow 1/2\"', '10 Pcs', '10 Pcs', '2023-08-08', '2023-08-08', 'PT. Refrigerasi Indo Tama', '5000', '50000', NULL, 'Surabaya'),
(4, 'Hand Valve Castel 1/2\"', '2 Pcs', '2 Pcs', '2023-08-08', '2023-08-08', 'PT. Refrigerasi Indo Tama', '321000', '642000', NULL, 'Surabaya'),
(5, 'Pipa Tembaga 1/2\" X 0,89mm', '2 Batang', '2 Batang', '2023-08-08', '2023-08-08', 'PT. Refrigerasi Indo Tama', '345000', '690000', NULL, 'Surabaya');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sistem_customers`
--

CREATE TABLE `sistem_customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_pt` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `sistem_customers`
--

INSERT INTO `sistem_customers` (`id`, `nama_pt`, `alamat`, `status`) VALUES
(1, 'PT. SUPER INDAH LANGGENG', 'Kedungcowek - Surabaya', 1),
(2, 'PT. KARUNIA SELARAS ABADI', 'Krian', 0),
(3, 'PT. SUMBER RUBBERINDO JAYA', 'Jl. Raya Kedurus No.33-A, Sawunggaling, Kec. Wonokromo, Surabaya', 1),
(4, 'PT. CISANGKAN', 'Guling - Pasuruan', 0),
(5, 'PT. BETON CITRA ABADI', 'Sumengko - Mojokerto', 0),
(6, 'SMK PETRA', 'Surabaya', 1),
(7, 'PT. GRAHA REJEKI ABADI', 'Malang', 1),
(8, 'CV. SUMBER USAHA BERKAH', 'Wedoro Sukun RT.01 RW.03', 1),
(9, 'HONDA LESTARI', 'Probolinggo', 1),
(10, 'PT. WIRA AGUNG SENTOSA', 'Wonorejo - Rungkut', 1),
(11, 'PT. CENTRAL SAHABAT BARU', 'Sidoarjo', 1),
(12, 'PT. ADI MUR', 'Jl. Sultan Iskandar Muda No. 44 Surabaya', 1),
(13, 'PT. HARVAST POLY LUMINDO', 'Karanganyar', 1),
(14, 'UD. SURYA KENCANA', 'Asem Bagor - Kraksaan Probolinggo', 1),
(15, 'PT. PITAMAS INDONUSA', 'Gedangan', 1),
(16, 'PT. SKS', 'Sleman - Jogja', 0),
(17, 'IRAWAN PLASTIK', 'Peterongan - Jombang', 1),
(18, 'PB. ARUM WANGI', 'Kebumen, Jl Kutoharjo Krajan - Kaliputih', 1),
(19, 'PT. HARAPAN MULYA', 'Gempol', 1),
(20, 'CV. DOLLAR FURNITURE', 'Klaten', 0),
(21, 'UD. TELAGA JAYA', 'Mojokerto', 1),
(22, 'CV. MADA KARYA BAJA', 'Sekaran - Lamongan', 1),
(23, 'CV. BAROKAH JAYA', 'Kemantren, Gedek - Mojokerto', 1),
(24, 'PT. CAPITAL PROTECT SINERGI', 'Carat, Gempol - Pasuruan', 1),
(25, 'PACK SOLUTION', 'Solo', 1),
(26, 'PT. MAAQO', 'Jombang', 1),
(27, 'PT. MENARA PLASTIC', 'Pasuruan', 1),
(28, 'CV. HASIL KARYA (Dok Pantai Lamongan)', 'Lamongan', 1),
(29, 'PR. RUDAL MAS', 'Pamekasan - Madura', 1),
(30, 'PR. PEWE TOBACCO', 'Pamekasan - Madura', 1),
(31, 'CV. INDO PACK', 'Bypass - Krian', 1),
(32, 'BP. CHIKO', 'Gondang Legi - Malang', 1),
(33, 'PR. 86', 'Pamekasan - Madura', 1),
(34, 'PR. SAYAP MAS', 'Malang', 1),
(35, 'PT. ANGKASA GRACIA MUKTI', 'Gempol - Pasuruan', 1),
(36, 'PT. UNIVERSAL', 'Gedangan', 0),
(37, 'PT. MUSTAKA GRAFIKA', 'Sukun - Malang', 1),
(38, 'CV. INDO JAYA BERSATU', 'Kediri', 0),
(39, 'PT. CAHAYAKU', 'Pamekasan - Madura', 1),
(40, 'PT. BAMBANG DJAJA', 'Ngoro Industri / Rungkut Sby', 0),
(41, 'HONDA SUKUN MALANG', 'Sukun - Malang', 1),
(42, 'PT. GALAXY PACKINDO', 'Gempol - Pasuruan', 1),
(43, 'PT. MEGA BERKAT SEJAHTERA', 'Jl. Raya Sukodono KM 03, No. 9', 1),
(44, 'PT. DASA PLAST', 'Tulangan', 1),
(45, 'PT. ANBERY AMARTA INDONESIA', 'Legundi Bisnis Park', 1),
(46, 'PT. CIOMA PLASTINDO', 'DKP Warehouse, Blok B 11- Driyorejo', 1),
(47, 'CV. KURNIA MANDIRI', 'Wagir - Malang', 1),
(48, 'PT. ADHI BETON', 'Kraton - Jateng', 1),
(49, 'PT. WIJAYA KARYA BETON (DPB PASURUAN)', 'Gempol - Pasuruan', 1),
(50, 'PT. KEMILAU INDAH PERMANA', 'Sragen - Jawa Tengah', 1),
(51, 'PT. AMAK FIRDAUS', 'Probolinggo', 1),
(52, 'SMK 2 SALATIGA', 'Salatiga - Jawa Tengah', 1),
(53, 'CV. SUKSES BUANA KARYA', 'Surabaya', 1),
(54, 'PT. PANCA BERSOEDARAAN SEJATI', 'Jebres - Surakarta', 0),
(55, 'CV. BANYU ANYAR (PONPES)', 'Pamekasan - Madura', 1),
(56, 'PR. SAFIRA JAYA', 'Pamekasan - Madura', 1),
(57, 'PG. Redjosari', 'Magetan', 1),
(58, 'PR. KING', 'Pamekasan - Madura', 1),
(59, 'PT. HINSHENG LUGGAGE ACCESORIES', 'Semarang', 1),
(60, 'PT. IMPERA', 'Pandaan', 1),
(61, 'PR. ORAY', 'Pamekasan - Madura', 1),
(62, 'PT. MEDIA KARYA BANGSA', 'Kedinding', 1),
(63, 'CV. ANUGERAH MITRA KONSTRUKSI', 'Ngadiluwih - Kediri', 1),
(64, 'PT. POKPHAND', 'Taman - Sidoarjo', 0),
(65, 'CV. GUNAWAN PLASTIK', 'Gedangan - Sidoarjo', 1),
(66, 'PT. TRIPOINT CENTRALINDO', 'Krian', 0),
(67, 'PT. INDO MAPAN', 'Driyorejo - Gresik', 1),
(68, 'PT. ANUGERAH INDAH', 'Kabuh - Jombang', 0),
(69, 'PT. OSCAPACK', 'Solo - Jawa Tengah', 1),
(70, 'PT. UNICHEM CANDI INDONESIA', 'Jipe - Manyar', 0),
(71, 'PT. SURABAYA WIRE', 'Jl. Raya Bambe 88 - Driyorejo Gresik', 0),
(72, 'PT. REDTROINDO NUSANTARA', 'Gresik', 1),
(73, 'PT. ENDO INDONESIA', 'Kejayan - Pasuruan', 1),
(74, 'PR. NUSA BERKARYA', 'Gempol - Pasuruan', 1),
(75, 'PT. SEKAM GILING ROEKOEN JAYA', 'Warujayeng - Nganjuk', 1),
(76, 'PT. SASCO MAKMUR ABADI', 'Gunung Anyar Rungkut - Surabaya', 0),
(77, 'PT. IMR ARC STEEL', 'Dusun Mojosarirejo, Dusun Inojosari Rejo, Randuharjo, Pungging, Mojokerto', 0),
(78, 'PT. MAJU ENGINERING', 'Dok Lamongan', 1),
(79, 'PT. PROTAS MALANG INDONESIA', 'Jl. Sunandar Priyo Sudarmo No.20D, Blimbing, Kec. Blimbing, Kota Malang', 1),
(80, 'PR. PAKU ALAM', 'Pamekasan - Madura', 1),
(81, 'PT. GRAHA KARYA ABADI', 'Malang', 1),
(82, 'PT. LESTARI BISCUIT VAKTURY', 'Blimbing - Malang', 1),
(83, 'PT. YAHATA MANUFACTORING INDONESIA', 'Safe and Lock Blok U No. 3069 - Sidoarjo', 1),
(84, 'CV. LAUTAN EMAS TOBACCO', 'Pandaan', 1),
(85, 'RM. SAMBEL IJO', 'Mojosari', 1),
(86, 'CV. SUKSES JAYA', 'Solo - Jawa Tengah', 1),
(87, 'PT. SIAMITRA', 'Gedangan - Sidoarjo', 1),
(88, 'PT. SEJAHTERA LESTARI', 'Gg. Gangsir - Pasuruan', 1),
(89, 'CV. PUTRA MITRA JAYA', 'Jl. Raya Taman - Sidoarjo', 1),
(90, 'PT. INDO PERKASA', 'Pandaan', 1),
(91, 'CV. LANCAR JAYA', 'Menganti - Gresik', 1),
(92, 'CV. SUMBER SARI PANGAN', 'Driyorejo - Gresik', 1),
(93, 'PR. RA SEJAHTERA', 'Dsn. Selatan RT01/RW07, Desa Toronan, Pamekasan', 1),
(94, 'CV. BUMI BUANA CITRA', 'Wendit - Malang', 1),
(95, 'PT. SEB ENGINEERING', 'Jl. Kutisari - Rungkut Sby', 1),
(96, 'UD. LANCAR HIDUP GEMILANG', 'Pati - Jawa Tengah', 1),
(97, 'CV. SURYA KEJAYAN', 'Kejayan - Jember', 1),
(98, 'UD. SUMBER JERUK', 'Kalisat - Jember', 1),
(99, 'AMDK VUROTA', 'Situbondo', 1),
(100, 'PT. MULIA JADI', 'Bambe - Driyorejo Gresik', 1),
(101, 'PT. MULTI KARYA TEKNIK', 'Wonoayu - Sidoarjo', 1),
(102, 'ANUGERAH ORNAMEN', 'Kediri', 1),
(103, 'PT. IPM', 'Lingkar Timur - Sidoarjo', 0),
(104, 'PR. SHM JAYA', 'Pamekasan', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `sistem_customer_details`
--

CREATE TABLE `sistem_customer_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_pt` varchar(255) NOT NULL,
  `attn` varchar(255) NOT NULL,
  `tanggal` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `nota` varchar(255) NOT NULL,
  `service` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `sistem_customer_details`
--

INSERT INTO `sistem_customer_details` (`id`, `id_pt`, `attn`, `tanggal`, `type`, `nota`, `service`) VALUES
(1, '1', 'Bp. Yudi', '2023-01-04', 'Kompresor Screw Jaguar 37Kw / ZLS50HI/10', '-', 'TU/I/001/2023\r\nTeknisi : Yasir \r\nJenis Tugas : Setting, Cheking.\r\nKeluhan Customer : Test Commissioning Unit\r\n\r\nKeterangan Teknisi :\r\n1. Penggantian NFB dari 60A - 100A\r\n2. Connect power 380VAC\r\n3. Connect selang output komp -> tangki\r\n4. Pergantian oli kompresor \r\n5. Test running unit normal \r\n- Load : 6.2 Bar\r\n- Unload : 7.2 Bar\r\n6. Tidak ada kebocoran oli pada system \r\n\r\nNB: Rekomendasi pergantian kabel power dari 4x4 mm ke 4x8 mm\r\n\r\nHM : 4H'),
(2, '2', 'Bp. Sudar', '2023-01-02', 'Kompresor JMEagle 50 PM', '-', 'NTU/I/001/2023\r\nTeknisi : Yusuf\r\nJenis Tugas : Cheking\r\nKeluhan Customer : Suara kasar\r\n\r\nKeterangan Teknisi : \r\n1. Suara kasar pada selenoid intake karena tidak bisa menutup dikarenakan mekanikal seal pada selenoid habis / rusak \r\n2. Rekomendasi : ganti selenoid + rumah'),
(3, '3', 'Bp. Suyanto', '2023-01-03', 'Kompresor Atlas Copco 55Kw 380V', '-', 'TU/I/002/2023\r\nTeknisi : WInardi \r\nJenis Tugas : -\r\nKeluhan Customer : -\r\n\r\nKeterangan Teknisi :\r\n1. Oli Kompresor habis\r\n2. Tidak bisa running karena oli habis\r\n3. Indikasi separator jenuh'),
(4, '4', '-', '2023-01-12', 'Kompresor Screw Kobelion / VS 730A-37Kw', '-', 'NTU/I/002/2023\r\nTeknisi : Kariono\r\nJenis Tugas : Cheking\r\nKeluhan Customer : -\r\n\r\nKeterangan Teknisi :\r\n*Kompresor Running\r\n1. HM = 22.536 Jam \r\nTemp = 96C\r\nLevel Oli = Atas garis normal \r\n2. Life time sparepart kurang 600 Jam\r\n*Rekomendasi : \r\n1. Pergantian Oli Filter \r\n2. Pergantian Filter udara \r\n3. Pergantian O/A Separator \r\n4. Service Cooler \r\n5. Pergantian Auto Drain \r\n- Manual\r\n- Electric'),
(5, '5', '-', '2023-01-25', 'Kompresor Piston JM 10 / 380VAC', '-', 'NTU/I/003/2023\r\nTeknisi : Yasir \r\nJenis Tugas : Setting \r\nKeluhan Customer : Commissioning Unit\r\n\r\nKeterangan Teknisi :\r\n1. Connect power 380VAC \r\n2. Test running unit normal \r\n- Load : 6.0 Bar \r\n- Unload : 9.0 Bar\r\n3. Level oil masih di level normal'),
(6, '6', 'Marta Dani Harja', '2023-01-11', 'Kompresor Screw JMEagle 30 D / 380V', '-', 'TU/I/003/2023\r\nTeknisi : Kariono \r\nJenis Tugas : -\r\nKeluhan Customer : Trial, Instalasi Kompresor \r\n\r\nKeterangan Teknisi :\r\n1. Pasang power komp + drier \r\n2. Instalasi pipa dari komp - tangki - drier -cnc \r\n\r\nkompresor start \r\n1. HM = 0 jam \r\n2. Set Pressure = 5 - 6 Bar \r\n3. Level Oli = diatas garis normal \r\n4. Set temp on = 75 C - 85 C \r\n5. Kompresor berjalan normal'),
(7, '3', 'Bp. Suyanto', '2023-01-06', 'Kompresor Atlas Copco 55Kw 380V', '-', 'TU/I/004/2023\r\nTeknisi : Winardi \r\nJenis Tugas : -\r\nKeluhan Customer : -\r\n\r\nKeterangan Teknisi :\r\n1. Pergantian Separator \r\n2. + Oli 1 Pail \r\n3. Trial ok, tidak ada kebocoran \r\nTotal run time 322H 59M'),
(8, '7', '-', '2023-01-09', 'Compressor JM 50D', '-', 'TU/I/005/2023\r\nTeknisi : Winardi \r\nJenis Tugas : -\r\nKeluhan Customer : -\r\n\r\nKeterangan Teknisi :\r\n1. Kompresor normal\r\n2. Running 220 \r\n3. Loud 60/80\r\n4. Temp 75 / 85'),
(9, '8', 'Yasir', '2023-01-10', 'Kompresor Screw JMEagle 20 PM / 380VAC', '-', 'TU/I/006/2023\r\nTeknisi : Yasir \r\nJenis Tugas : \r\nKeluhan Customer : Commissioning Unit\r\n\r\nKeterangan Teknisi : \r\n1. Test running unit \r\nLoad : 6.0 Bar\r\nUnload : 7.5 Bar \r\n2. Cek kebocoran oli pada system tidak ada \r\n3. Level oli diatas batas normal'),
(10, '9', 'Tri Cahyo Putro', '2023-01-11', 'Compressor Ceccato 10 HP / 380V', '-', 'TU/I/006/2023\r\nTeknisi : Yusuf \r\nJenis Tugas : Perbaikan \r\nKeluhan Customer : Perawatan \r\n\r\nKeterangan Teknisi : \r\n1. Ganti oli dan flashing oli \r\n2. Ganti oil filter, air filter, separator \r\n3. Runtime : 3252HMM\r\n4. Tidak bisa riset parameter karena tidak ada password\r\n5. Temperature tinggi karena termostat tidak bisa buka sementara termostat ditahan. \r\n\r\nRekomendasi : Ganti \r\nTest Running : Kompresor berjalan normal'),
(11, '10', 'Anang', '2023-01-10', 'Kompresor 3 in 1 JM 20 PM High Pressure', '-', 'TU/I/007/2023\r\nTeknisi : Yasir \r\nJenis Tugas : Setting, Perbaikan\r\nKeluhan Customer : Selang output kompresor bocor flexible host \r\n\r\nKeterangan Teknisi : \r\n1. Pergantian selang flexible host output kompresor yang baru \r\n2. Test running unit normal \r\nLoad : 14.0\r\nUnload : 15.0\r\n3. Penambahan oli kompresor \r\n4. Cek kebocoran pada system tidak ada'),
(12, '11', 'Eni', '2023-01-11', 'Kompresor SCR 100', '-', 'Teknisi : Kariono \r\nJenis Tugas : Perawatan \r\nKeluhan Customer : -\r\n\r\nKeterangan Teknisi :\r\n1. Pergantian filter oli, o/a separator, oli petrolube \r\n\r\nKompresor start:\r\n1. HM = 27.563\r\n2. Level oli = diatas garis normal\r\n3. Temp = 95 C\r\n4. SP = 6 - 7 Bar'),
(13, '12', 'Singgih', '2023-01-10', 'Kompresor FU 22S / 380 V', '-', 'TU/I/009/2023\r\nTeknisi : Winardi \r\nJenis Tugas : -\r\nKeluhan Customer : - \r\n\r\nKeterangan Teknisi : \r\n1. Perbaikan control\r\n2. Pemasangan kontaktor \r\n3. Trial ok'),
(14, '13', 'Julham', '2023-01-21', 'Kompresor Screw 50 HP ADS 50', '-', 'TU/I/010/2023\r\nTeknisi : Rusmaji \r\nJenis Tugas : Cheking \r\nKeluhan Customer : -\r\n\r\nKeterangan Teknisi :\r\n1. Sett Press 67 - 79 mpa \r\n2. Set tercapai normal \r\n3. Level oli batas normal \r\n4. Kebocoran tidak ada'),
(15, '12', 'Bp. Budi', '2023-01-12', 'Kompresor FU 22S / 380 V', '-', 'TU/I/011/2023\r\nTeknisi : Winardi \r\nJenis Tugas : -\r\nKeluhan Customer : -\r\n\r\nKeterangan Teknisi : \r\n1. Pergantian oil \r\n2. Pergantian filter oli \r\n3. Pergantian air filter \r\n4. Pergantian separator \r\n5. Check Nepple dan Vanbel \r\n6. Running compressor (tidak ada kebocoran)'),
(16, '14', '-', '2023-01-13', 'Kompresor Screw JMEagle 50 D', '-', 'TU/I/015/2023\r\nTeknisi : Kariono \r\nJenis Tugas : -\r\nKeluhan Customer : Trial\r\n\r\nKeterangan Teknisi: Kompresor Running\r\n1. HM = 1 jam \r\n2. SP = 6 - 7 Bar\r\n3. Set Temp Fan = 85 of / 75 on \r\n4. Level Oli = diatas garis normal \r\nKompresor berjalan normal'),
(17, '14', '-', '2023-01-13', 'Kompresor JM 75 D', '-', 'TU/I/017/2023\r\nTeknisi : Kariono \r\nJenis Tugas : \r\nKeluhan Customer : Trial \r\n\r\nKeterangan Teknisi :\r\n1. SP = 8.5 - 10 Bar \r\n2. HM = 0 Jam \r\n3. Set Temp Fan = 78 - 88 C\r\n4. Level Oli = diatas garis normal \r\nKompresor berjalan normal'),
(18, '14', '-', '2023-01-13', 'Kompresor JM 50 D / 390 V', '-', 'TU/I/018/2023\r\nTeknisi : Kariono \r\nJenis Tugas : - \r\nKeluhan Customer : Trial \r\n\r\nKeterangan Teknisi : \r\n1. HM = 5 Jam \r\n2. 6 - 8 Bar \r\n3. Set Temp Fan : 85 - 75 C / on - off\r\n4. Level Oli : diatas garis normal \r\nKompresor berjalan normal \r\n\r\nDrier JMEagle AD 50 \r\nAmper = 3,4A'),
(19, '15', 'Saroni', '2023-01-16', 'Kompresor SA55 VSN / 380 V', '-', 'TU/I/019/2023\r\nTeknisi : Yusuf \r\nJenis Tugas : Cheking \r\nKeluhan Customer : Amper Tinggi\r\n\r\nKeterangan Teknisi : \r\n1. GA 55 VCD run time 643H 43M\r\n2. History overload motor 380 - 400A\r\n3. Dinamo diukur rata dan tidak set body \r\n4. Inverter di coba kosongan / tanpa beban normal, tapi output tegangan inverter tidak stabil / acak \r\n5. Rekomendasi : dinamo / inverter bermasalah \r\n6. GA 37 FF, runtime 87336 hours\r\n7. Oil merembes pada pipa out screw ke tangki oil karena seal pipa \r\n8. Rekomendasi : Seal pipa\r\n9. GA 55 FF : Run time 25825 hours \r\n10. Start awal temp sering naik / error \r\n11. Rekomendasi : Ganti temperatur sensor'),
(20, '16', 'Suhertana', '2023-01-20', 'Kompresor Screw JM 50 D', '-', 'NTU/I/020/2023\r\nTeknisi : Rusmaji \r\nJenis Tugas : Cheking \r\nKeluhan Customer : -\r\n\r\nKeterangan Teknisi : \r\n1. Setting tercapai normal \r\n2. Level oil batas normal'),
(21, '17', '-', '2023-01-16', 'Kompresor Screw AirMan 22 Kw SAS 22P-54', '-', 'TU/I/020/2023\r\nTeknisi : Yasir \r\nJenis Tugas : Cheking \r\nKeluhan Customer : Kompresor Tidak Normal \r\n\r\nKeterangan Teknisi : \r\n1. Cek air filter (kotor)\r\n2. Cek oil Separator (sudah jenuh)\r\n3. Cek filter oli (kotor)\r\n4. Cek motor komp normal \r\n5. Cek bunyi komp (screw kasar)\r\n6. Cek rangkaian kontrol\r\n\r\nNB: Rekomendasi \r\n1. Penggantian seluruh sparepart (oil filter, air filter, oil separator & oli kompresor)\r\n2. Overhoul screw \r\n3. Ganti kontrol monitor & penataan kontrol rangkaian'),
(22, '18', 'Siswara', '2023-01-20', 'Kompresor Screw Honest Camp CS6 30', '-', 'TU/I/020/2023\r\nTeknisi : Rusmaji \r\nJenis Tugas : Cheking\r\nKeluhan Customer : Off\r\n\r\nKeterangan Teknisi : \r\n1. Set 5.5 Bar - 7.5 Bar\r\n2. Set Tercapai\r\n3. Kontaktor star aux NC gagal'),
(23, '19', 'Bp. Suhari', '2023-01-13', 'Kompresor JM 20 PM', '-', 'TU/I/021/2023\r\nTeknisi : Yusuf \r\nJenis Tugas : Cheking \r\nKeluhan Customer : Inverter Error \r\n\r\nKeterangan Teknisi : \r\n1. Inverter eror 1E di reset berulang kali tidak bisa atau tetap eror\r\n2. Rekomendasi : Ganti Inverter'),
(24, '20', 'Heru Wahyono', '2023-01-20', 'Kompresor Screw Kaeser SK-26', '-', 'NTU/I/021/2023\r\nTeknisi : Rusmaji\r\nJenis Tugas : Cheking\r\nKeluhan Customer : - \r\n\r\nKeterangan Teknisi :\r\n1. Oli keluar jaringan \r\n2. Temperatur coolar tinggi\r\n3. Tidak bisa load kembali \r\n4. Posisi in/out tangki terbalik \r\n\r\nSaran : \r\n1. Ganti oli\r\n2. Separator \r\n3. Oil Filter \r\n4. Air Filter \r\n5. Pressure Switch \r\n6. Cuci coolar \r\n7. Tambah drier'),
(25, '13', 'Julham', '2023-01-21', 'Kompresor Screw 30 HP W7S-30A2', '-', 'TU/I/021/2023\r\nTeknisi : Rusmaji\r\nJenis Tugas : Cheking\r\nKeluhan Customer :\r\n\r\nKeterangan Teknisi :\r\n1. Set Press = 67 - 79 Mpa\r\n2. Level oil normal aman\r\n3. Kebocoran tidak ada \r\n4. Running set tercapai sempurna'),
(26, '21', 'Bp. Aris', '2023-01-16', 'Kompresor CS 5000 Ppf', '-', 'TU/I/021/2023\r\nTeknisi : Sabda \r\nJenis Tugas : Perbaikan\r\nKeluhan Customer : -\r\n\r\nKeterangan Teknisi :\r\n1. Pergantian pressure gauge high - low \r\n2. Membuang freon di system \r\n3. Mengganti pressure gauge \r\n4. Vacum seluruh sistem & membuang udara\r\n5. Mengisi freon sampai tekanan \r\n50 psi low\r\n330 psi high \r\nampere 7,6'),
(27, '22', 'Naufal', '2023-01-20', 'Kompresor Screw JM 20 PM', '-', 'TU/I/021/2023\r\nTeknisi : Kariono\r\nJenis Tugas : -\r\nKeluhan Customer : Motor Inverter Fault\r\n\r\nKeterangan Teknisi:\r\n* Receiver Tank Kompresor Penuh Air \r\n1. Kuras oli + flushing \r\n2. Penggantian oli, filter oli, filter udara \r\nRekomendasi = Ganti O/A Separator'),
(28, '23', 'Bp. Zakariya', '2023-01-14', 'Kompresor Screw JM 30 D', '-', 'TU/I/022/2023\r\nTeknisi : Kariono \r\nJenis Tugas : -\r\nKeluhan Customer : Trial \r\n\r\nKeterangan Teknisi :\r\n1. SP : 7 - 8 Bar \r\n2. HM : 0 Jam \r\n3. Set Tamp Fan : 75 - 85 / off - on \r\n4. Level oil : Diatas garis normal \r\nKompresor berjalan normal'),
(29, '24', 'Sairil', '2023-01-20', 'Kompresor Screw JM 10 D', '-', 'TU/I/022/2023\r\nTeknisi : Kariono \r\nJenis Tugas : Cheking \r\nKeluhan Customer : Cek Kompresor \r\n\r\nKeterangan Teknisi : \r\n1. HM : 2.448 Jam 2\r\n2. SP : 5,5 - 7 Bar \r\n3. Level Oil : Atas garis normal \r\nKompresor berjalan normal \r\n\r\nNB : Oli + Sparepart bukan JMEagle \r\nKurang 52 jam penggantian \r\nO/A Separator'),
(30, '25', 'Martin', '2023-01-21', 'Kompresor Screw 3 in 1 JM 10 D', '-', 'TU/I/023/2023\r\nTeknisi : Rusmaji \r\nJenis Tugas : Cheking \r\nKeluhan Customer : -\r\n\r\nKeterangan Teknisi :\r\n1. Running set 70-80 Mpa\r\n2. Level oli : aman \r\n3. Set tercapai normal \r\n4. Ada kebocoran filter drier \r\n\r\nSaran : ganti filter drier'),
(31, '14', '-', '2023-01-21', 'Kompresor Screw JM 75 D', '-', 'TU/I/023/2023\r\nTeknisi : Kariono \r\nJenis Tugas : -\r\nKeluhan Customer : Ganti / tukar Controller MAM 880\r\n\r\nKeterangan Teknisi : \r\n*Bongkar + pasang controller MAM 880 \r\n\r\n1. HM = 0\r\n2. SP = 7 - 8 Bar\r\n3. Level Oil = atas garis bawah\r\n4. Set fan on = 75 - 85 / off-on\r\nKompresor berjalan normal'),
(32, '26', 'Bp. Kharis', '2023-01-16', 'Kompresor Screw JM 3 in 1 20 HP', '-', 'TU/I/023/2023\r\nTeknisi : Yasir \r\nJenis Tugas : Cheking\r\nKeluhan Customer : Kunjungan Mesin \r\n\r\nKeterangan Teknisi :\r\n* Kompressor :\r\n1. Cek level oil masih dibatas normal \r\n2. Cek kebocoran tidak ada \r\n3. Test Running Unit Normal \r\n- Load : 6.5 Bar \r\n- Unload : 7.5 Bar\r\n4. Cek fan cooler running normal \r\n5. HM : 2687H 67 M\r\n\r\n* Air Dryer \r\n1. Cek pressure freon\r\n2. System refrigasi normal tidak ada kebocoran \r\n3. Kondisi kondenser unit masih bersih'),
(33, '27', 'Bp. Budi', '2023-01-16', 'Water Chiller 5 HP', '-', 'TU/I/024/2023\r\nTeknisi : Yusuf\r\nJenis Tugas : Cheking \r\nKeluhan Customer : Test Running \r\n\r\nKeterangan Teknisi :\r\n1. Water Chiller alarm water level, karena jaringan water chiller salah \r\n2. Rekomendasi : merubah jaringn pipa air agar sinkron'),
(34, '28', '-', '2023-01-24', 'Kompresor Screw JM 100 D', '-', 'TU/I/024/2023\r\nTeknisi : Kariono \r\nJenis Tugas : -\r\nKeluhan Customer : Emergency Rusak \r\n\r\nKeterangan Teknisi : \r\n1. Bongkar / pasang emergency stop pasang baru \r\n\r\nNB : Kompresor tidak bisa di jalankan karena power tidak ada'),
(35, '28', 'Bp, Anang', '2023-01-24', 'Kompresor JM 100 D', '-', 'TU/I/025/2023\r\nTeknisi : Kariono \r\nJenis Tugas : -\r\nKeluhan Customer : Maintenance 500 Jam \r\n\r\nKeterangan Teknisi :\r\n1. Pergantian oli petrolube, filter oli\r\n2. Flashing \r\nKompresor start \r\nHM = 509 Jam \r\nSP = 7 - 8 Bar \r\nSet Temp Fan = 76 - 86 / off - on \r\nLevel oil = diatas garis normal\r\nKompresor berjalan normal'),
(36, '29', '-', '2023-01-24', 'Kompresor JM 3 in 1 20 HP 20 D', '-', 'TU/I/026/2023\r\nTeknisi : Yasir \r\nJenis Tugas : Perbaikan \r\nKeluhan Customer : Kipas kondensor air dryer terbakar (short body)\r\n\r\nKeterangan Teknisi :\r\n1. Penggantian fan kondensor yang baru \r\n2. Connect power 220 VAC \r\n3. Test Running unit normal'),
(37, '30', 'Murdam', '2023-01-24', 'Kompresor Screw JM 3 in 1 20 HP / 20D', '-', 'TU/I/027/2023\r\nTeknisi : Yasir \r\nJenis Tugas : Setting \r\nKeluhan Customer : Alarm Life Time \r\n\r\nKeterangan Teknisi :\r\n1. Penegtapan oli screw lama\r\n2. Flushing oli pada system \r\n3. Penggantian oil filter \r\n4. Bersihkan air filter \r\n5. Penggantian oli kompresor baru \r\n6. Bersihkan filter body & body kompresor \r\n7. Bersihkan oil cooler \r\n\r\nTest running unit normal \r\nTidak ada kebocoran system'),
(38, '31', '-', '2023-01-27', 'Water Chiller Airef 5 HP', '-', 'TU/I/027/2023\r\nTeknisi : Yasir \r\nJenis Tugas : Cheking \r\nKeluhan Customer : System Low Press\r\n\r\nKeterangan Teknisi :\r\n1. Cek kompresor ref normal\r\n2. Cek fan kondensor normal \r\n3. Cek kondensor unit kotor\r\n4. Cek ruang kontrol normal \r\n5. Cek pressure \r\n6. Cek pompa sirkulasi normal\r\n\r\nNB : Indikasi kebocoran system refrigrasi \r\n- freon R22\r\n- filter drier'),
(39, '32', '-', '2023-01-30', 'Kompresor Dryer + Tangki JM 50 D', '-', 'TU/I/029/2023\r\nTeknisi : Winardi \r\nJenis Tugas : -\r\nKeluhan Customer : \r\n\r\nKeterangan Teknisi :\r\n1. Penataan tempat\r\n2. Perlengkapan untuk pemasangan jaringan pipa dan listrik belum ada'),
(40, '33', 'Bp. Farid', '2023-02-01', 'Air Dryer JM AD 30', '-', 'TU/I/029/2023\r\nTeknisi : Yasir\r\nJenis Tugas : Setting \r\nKeluhan Customer : Commissioning AIr Dryer & Pasang Jaringan\r\n\r\nKeterangan Teknisi : \r\n1. Install Jaringan dari tanki kompresor - air dryer - steam header  - output header (selesai)\r\n2. Connect power 220 VAC untuk air dryer \r\n3. Test running unit normal \r\n4. Cek kebocoran system tidak ada'),
(41, '34', 'Bp. Slamet', '2023-01-28', 'Kompresor JM 50 D', '-', 'TU/I/031/2023\r\nTeknisi : Kariono\r\nJenis Tugas : - \r\nKeluhan Customer : Install Pipa Flexible, Running Kompresor \r\n\r\nKeterangan Teknisi : \r\n1. Install pipa kompresor - tangki - drier / line filter\r\n2. Pasang kabel power kompresor + drier \r\n\r\nKompresor start \r\n1. HM = 2 Jam \r\n2. SP = 6 - 7 Bar \r\n3. Level oil = atas garis normal \r\n4. Set temp fan = 85 - 75 / on - off\r\nKompresor berjalan normal \r\n\r\nNB : Ampere drier 2,6 A\r\nKabel power kompresor sebaiknya diganti 10 mm x 4'),
(42, '35', 'Bp. Efendi', '2023-02-01', 'Air Dryer Elite Air EAD 100A', '-', 'TU/II/001/2023\r\nTeknisi : Yusuf \r\nJenis Tugas : Cheking \r\nKeluhan Customer : Mati \r\n\r\nKeterangan Teknisi :\r\n1. Tekanan freon normal / tidak bocor \r\n2. Kompresor normal \r\n3. Tekanan freon high temperature di karenakan baypass tidak normal sehingga tekanan naik turun.\r\nRekomendasi :\r\n1. Rubah bypass\r\n2. Freon R22\r\n3. Temperature Controll'),
(43, '36', 'Bp. Bandi', '2023-02-01', 'Kompresor JM 30', '-', 'NTU/II/001/2023\r\nTeknisi : Yusuf \r\nJenis Tugas : Cheking \r\nKeluhan Customer : Alarm pressure \r\n\r\nKeterangan Teknisi :\r\n1. Kompresor jalan \r\nLoad : 0.70 Mpa \r\nUnload : 0.80 Mpa\r\n2. Kompresor posisi mati pressure naik sendiri \r\n\r\nRekomendasi : \r\n1. Ganti sensor pressure\r\n2. Runtime : 8362H'),
(44, '37', 'Bp. Budi Santoso', '2023-02-11', 'Kompresor Screw JM 30 PM', '-', 'TU/II/002/2023\r\nTeknisi : Kariono \r\nJenis Tugas : Perawatan \r\nKeluhan Customer : Life Time \r\n\r\nKeterangan Teknisi :\r\n1. Penggantian oli jmegle + flushing \r\n2. Penggantian filter oli \r\n\r\nKompresor start :\r\nSP = 7.9 - 8 Bar \r\nHM = 523 Jam \r\nLevel Oli = Diatas garis normal \r\nSet temp fan = 75-85 / off-on'),
(45, '38', '-', '2023-02-15', 'Kompresor Screw HNS 100A/PM', '-', 'NTU/II/002/2023\r\nTeknisi : Winardi \r\nJenis Tugas : -\r\nKeluhan Customer : - \r\n\r\nKeterangan Teknisi : Service berkala\r\n1. Ganti oli\r\n2. Ganti oil filter \r\n3. Ganti air filter (retur belum cocok)\r\n4. Trial dan cek kebocoran (ok)\r\n\r\nNB: Separator sudah 6000 jam'),
(46, '2', 'Bp. Fendi', '2023-02-01', 'Kompresor JM 100 D', '-', 'NTU/II/003/2023\r\nTeknisi : Winardi \r\nJenis Tugas : -\r\nKeluhan Customer : -\r\n\r\nKeterangan Teknisi :\r\n1. Test running compressor JM 100 D \r\nTemperature: 79 -80 \r\nPressure: 65 - 80 \r\nFan : 70 -80\r\nLoad : 120A\r\nUnload : 88A'),
(47, '38', '-', '2023-02-15', 'Kompresor Screw JM 100 PM', '-', 'NTU/II/004/2023\r\nTeknisi : Winardi \r\nJenis Tugas : -\r\nKeluhan Customer : -\r\n\r\nKeterangan Teknisi :\r\n1. Ganti oil \r\n2. Ganti filter oil \r\n3. Ganti air filter (belum cocok)\r\n4. Trial dan cek kebocoran (ok)\r\nLoad : 70\r\nUnload : 85'),
(48, '39', '-', '2023-02-22', 'Kompresor Screw JM 30 D', '-', 'TU/II/005/2023\r\nTeknisi : Yasir \r\nJenis Tugas : Cheking \r\nKeluhan Customer : -\r\n\r\nKeterangan Teknisi :\r\n1. Cek level oil kompresor masih standart \r\n2. Cek kebocoran oli kompresor tidak ada \r\n3. Test running unit normal \r\nLoad : 3.0 Bar \r\nUnload : 5.0 Bar \r\nHM : 1107H 20M \r\nCek Air Dryer Running Normal'),
(49, '40', 'Bp. Amin Handoko', '2023-02-17', 'Kompresor Screw Elite EA 45 A', '-', 'NTU/II/005/2023\r\nTeknisi : Kariono \r\nJenis Tugas : Cheking\r\nKeluhan Customer : -\r\n\r\nKeterangan Teknisi :\r\n1. Ada kebocoran di saluran angin dan oli (cooler)\r\n\r\nRekomendasi : Service (Repair)'),
(50, '41', 'Basori', '2023-02-04', 'Kompresor Screw 10 HP (PS1007)', '-', 'TU/II/005/2023\r\nTeknisi : Rusmaji \r\nJenis Tugas : Cheking \r\nKeluhan Customer : -\r\n\r\nKeterangan Teknisi :\r\n1. Running (oil + filter baru)\r\n2. Keluaran angin tidak stabil (selenoid intake lemah)\r\n3. Cooler panas \r\n4. Compressor tidak bisa on lagi setelah standby\r\n\r\nSaran : \r\n1. Perbaikan intake (ganti selenoid)\r\n2. Flashing cooler \r\n3. Motif control electric'),
(51, '42', 'Bp. Ruben', '2023-02-06', 'Kompresor JM 75 PM', '-', 'TU/II/006/2023\r\nTeknisi : Yusuf \r\nJenis Tugas : Setting \r\nKeluhan Customer : Test Running \r\n\r\nKeterangan Teknisi : \r\n1. Test Running \r\n2. Load : 0.60 Mpa \r\n3. Unload : 0.70 Mpa \r\n4. Temp : 75 - 85 C\r\n5. Load Ampere : 85 A\r\n6. Unload Ampere : 40A\r\n7. Kompresor dan Dryer berjalan normal'),
(52, '42', 'Bp. Ruben', '2023-02-06', 'Water Chiller GF 20', '-', 'TU/II/006/2023\r\nTeknisi : Yusuf \r\nJenis Tugas : Setting \r\nKeluhan Customer : -\r\n\r\nKeterangan Teknisi : \r\n1. Ganti filter dryer karena buntu \r\n2. Water chiller berjalan normal'),
(53, '38', '-', '2023-02-24', 'Kompresor JM 100 PM', '-', 'NTU/II/007/2023\r\nTeknisi : Winardi \r\nJenis Tugas : -\r\nKeluhan Customer : -\r\n\r\nKeterangan Teknisi : \r\n* Service berkala \r\n1. Kompresor HWS 100 PM \r\n- Ganti separator dan air filter \r\n2. Kompresor JM 100 PM \r\n- Ganti air filter \r\n\r\nTrial (ok) tidak ada kebocoran'),
(54, '43', '-', '2023-02-07', 'Water Chiller ZR 36 K3', '-', 'TU/II/007/2023\r\nTeknisi : Kariono \r\nJenis Tugas : - \r\nKeluhan Customer : tidak bisa dingin, body evap bocor\r\n\r\nKeterangan Teknisi :\r\n1. Ada kebocoran pada and tube shell\r\n2. body shell and tube banyak yang bocor\r\n\r\nRekomendasi : \r\n1. Ganti shell and tube baru'),
(55, '44', 'Bp. Hengky', '2023-02-08', 'Water Chiller 30 HP', '-', 'TU/II/008/2023\r\nTeknisi : Yusuf\r\nJenis Tugas : Cheking \r\nKeluhan Customer : \r\n\r\nKeterangan Teknisi :\r\n1. Compressor 1 terbakar \r\n2. Compressor 2 terbakar \r\n\r\nRekomendasi :\r\n1. Ganti compressor 2 unit 15HP\r\n2. Ganti filter dryer 305 dan freon R22 (2can)'),
(56, '22', 'Naufal', '2023-02-08', 'Compressor Screw 3 in 1 JM 20 PM', '-', 'TU/II/009/2023\r\nTeknisi : Rusmaji \r\nJenis Tugas : Perbaikan \r\nKeluhan Customer : Inverter Overheat\r\n\r\nKeterangan Teknisi : \r\nRunning tercapai normal, blower putaran sedikit pelan karena kotor'),
(57, '45', 'Kevin', '2023-02-11', 'Kompresor Piston JM 10 HP', '-', 'TU/II/010/2023\r\nJenis Tugas : Setting, Cheking \r\nKeluhan Customer : Commissioning Unit \r\n\r\nKeterangan Teknisi :\r\n1. Test running unit normal \r\nLoad : 3 Bar \r\nUnload : 7 Bar \r\n2. Cek level oli normal \r\n3. Cek kebocoran system (tidak ada)\r\n4. Pressure switch normal'),
(58, '46', 'Maya', '2023-02-11', 'Kompresor Piston JM 20 HP', '-', 'TU/II/011/2023\r\nTeknisi : Yasir \r\nJenis Tugas : Cheking\r\nKeluhan Customer :\r\n\r\nKeterangan Teknisi :\r\n1. Test running unit normal \r\nLoad : 6.0 Bar\r\nUnload : 8.0 Bar \r\n2. Cek motor kompresor normal (sudah diganti)\r\n3. Cek level oil masih di level normal\r\n\r\nNB: Kabel disarankan untuk ganti dari 4x6mm ke 4x8mm'),
(59, '47', 'Iwan', '2023-02-11', 'Water Chiller JM GF 20', '-', 'TU/II/012/2023\r\nTeknisi : Kariono\r\nJenis Tugas : -\r\nKeluhan Customer : Trial Water Chiller \r\n\r\nKeterangan Teknisi :\r\n1. Kompresor 1\r\nLP : 60 Psi\r\nHP : 240 Psi \r\nSet Temp : 18C\r\nDF : 3C\r\nAmpere Komp : \r\nR = 14A\r\nS = 13.8 A\r\nT = 13.8 A\r\n\r\n2. Kompresor 2\r\nLP : 60 Psi\r\nHP : 250Psi \r\nSet Temp : 18C\r\nDF : 3C\r\nAmpere Komp : \r\nR = 13.8A\r\nS = 14.0A\r\nT = 13.6 A'),
(60, '48', 'Bp. Andri', '2023-02-13', 'Kompresor Screw Kaeser SK26', '-', 'TU/II/013/2023\r\nTeknisi : Rusmaji \r\nJenis Tugas : -\r\nKeluhan Customer : -\r\n\r\nKeterangan Teknisi :\r\n1. Setting press : 7 - 7.5 (tercapai normal)\r\n2. Max. Temp : 100C\r\nOli normal level aman\r\nKeseluruhan kompresor berjalan normal'),
(61, '49', 'Setya Budi', '2023-02-11', 'Kompresor Screw JM 30 PM', '-', 'TU/II/014/2023\r\nTeknisi : Yasir \r\nJenis Tugas : Setting, Perawatan\r\nKeluhan Customer : Alarm Lifetime\r\n\r\nKeterangan Teknisi :\r\n1. Pengetapan oli kompresor yang lama \r\n2. Flushing oli pada system \r\n3. Penggantian oil filter (16136105EDZ)\r\n4. Penggantian oli kompresor \r\n5. Test running unit normal \r\nLoad : 5.0 Bar\r\nUnload : 6.8 Bar\r\n6. Cleaning body dan filter body\r\n7. Cek kebocoran oli tidak ada\r\n8. Clean up alarm lifetime\r\nHM : 656 H\r\n\r\nNB : seri oil filter lama WD950'),
(62, '50', 'Bp. Suparno', '2023-02-14', 'Kompresor Sullair WS 7500', '-', 'TU/II/014/2023\r\nTeknisi : Rusmaji\r\nJenis Tugas : Perawatan \r\nKeluhan Customer : Life Time\r\n\r\nKeterangan Teknisi :\r\n1. Ganti oli + flushing\r\nKompresor start :\r\nHM = 57.045 Jam\r\nSP = 4 - 7.8 Bar\r\nLevel Oli = atas garis normal \r\nTemp : 86 - 87 C\r\nKompresor berjalan normal \r\n\r\nRekomendasi Teknisi \r\n1. Ganti O/A Separator \r\n2. Cek Valve 1/4\"'),
(63, '50', 'Suparno', '2023-02-14', 'Kompresor Kaeser CSD 125', '-', 'TU/II/014/2023\r\nTeknisi : Rusmaji\r\nJenis Tugas : Perawatan\r\nKeluhan Customer : Lifetime \r\n\r\nKeterangan Teknisi :\r\n1. Ganti O/A Separator \r\n2. Ganti Oil Filter\r\n3. Ganti Air Filter\r\n4. Ganti Oli Sigma \r\n5. Flushing\r\nKompresor Stand :\r\nSP = 7-7.8 Bar\r\nHM = 67.138 Jam \r\nTemp = 87 - 92 \r\nLevel Oli = Atas garis normal'),
(64, '47', 'PT. Kurnia Group', '2023-02-15', 'Water Chiller Dongyuejin 22Kw', '-', 'TU/II/020/2023\r\nTeknisi : Yusuf \r\nJenis Tugas : Cheking\r\nKeluhan Customer : Tidak dingin \r\n\r\nKeterangan Teknisi :\r\n1. Compressor Screw \r\n2. Posisi jalan low tidak turun dan high tidak mau naik\r\n3. Selenoid load unload berjalan normal\r\n4. Tekanan freon waktu jalan low 120 psi, high 200 psi\r\n5. Kompresor lemah \r\nRekomendasi :\r\n1. Overhoul kompresor screw \r\n2. Ganti filter dryer batu 2 pcs\r\n3. Freon R22'),
(65, '51', 'Bp. Halil', '2023-02-16', 'Kompresor Kaeser BSD 75', '-', 'TU/II/021/2023\r\nTeknisi : Yusuf \r\nJenis Tugas : Setting\r\nKeluhan Customer : Test Running\r\n\r\nKeterangan Teknisi :\r\n1. Pemasangan Unit \r\n2. Test running runtime : 32443H, load time 28369H\r\nLoad : 6.0 Bar\r\nUnload : 6.5 Bar\r\nTemp : 70 - 80 C \r\nCompressor berjalan normal'),
(66, '52', '-', '2023-02-17', 'Kompresor 3 in 1 JM 20 HP High Pressure', '-', 'TU/II/021/2023\r\nTeknisi : Rusmaji\r\nJenis Tugas : Perbaikan\r\nKeluhan Customer : OC3 Inverter\r\n\r\nKeterangan Teknisi :\r\n1. Ganti inverter 20 HP ZONCN\r\n2. Line Power :\r\nR : 384V\r\nS : 385 V\r\nT : 383 V\r\nRunning sett : air press 1.00 - 1.200\r\nLevel Oli : Batas aman\r\nTidak ada kebocoran\r\nDrier jalan normal\r\n\r\nRekomendasi :\r\nGanti oli, air filter, oil filter'),
(67, '1', '-', '2023-02-20', 'Kompresor Screw Jaguar 50HP', '-', 'TU/II/022/2023\r\nTeknisi : Rusmaji\r\nJenis Tugas : -\r\nKeluhan Customer :\r\n\r\nKeterangan Teknisi :\r\n1. Setting ulang inverter \r\n2. Setting press : 0.58 - 0.67\r\nTercapai normal\r\nLevel oil batas atas'),
(68, '53', '-', '2023-02-20', 'Water Chiller Danfost MT 160 HW', '-', 'TU/II/023/2023\r\nTeknisi : Kariono \r\nJenis Tugas : Cheking \r\nKeluhan Customer : \r\n\r\nKeterangan Teknisi : \r\n1. Ada kebocoran \r\n2. Ganti filter EK 304 1/2\"\r\n3. Pressure switch LP/HP Manual\r\n4. Ganti control temperature\r\n5. Freon R22'),
(69, '53', '-', '2023-02-20', 'Water Chiller Copeland 12GAX935M', '-', 'TU/II/023/2023\r\nTeknisi : Kariono\r\nJenis Tugas : Cheking\r\nKeluhan Customer : \r\n\r\nKeterangan Teknisi :\r\n1. Ada kebocoran \r\n2. Ganti filter EK 164S\r\n3. Ganti freon R22'),
(70, '53', '-', '2023-02-20', 'Water Chiller Copeland O4S 2300B', '-', 'TU/II/023/2023\r\nTeknisi : Kariono \r\nJenis Tugas : Cheking\r\nKeluhan Customer :\r\n\r\nKeterangan Teknisi :\r\n1. Tambah freon R22'),
(71, '54', 'Bp. Anang Armono', '2023-02-14', 'Water Chiller AC-40AF / R410', '-', 'NTU/II/024/2023\r\nTeknisi : Kariono\r\nJenis Tugas : \r\nKeluhan Customer : Ada Kebocoran \r\n\r\nKeterangan Teknisi :\r\n1. Ada kebocoran pada kompresor \r\nNo : 1 - 2 titik (LBO in Kondensor)\r\nNo : 3 - 2 titik (LBO in Kondensor)\r\n\r\nRekomendasi Teknisi \r\n1. Ganti filter drier = 2 (EK 305 5/8)\r\n2. Pressure Switch LP/HP Manual = 1 Pcs\r\n3. Freon R410'),
(72, '55', 'Bp. Moh. Salim', '2023-02-21', 'Kompresor Screw Jaguar 22Kw / EA580', '-', 'TU/II/024/2023\r\nTeknisi : Yasir \r\nJenis Tugas : Setting, Perawatan\r\nKeluhan Customer : Alarm Lifetime \r\n\r\nKeterangan Teknisi : \r\n1. Pengatapan oil screw yang lama \r\n2. Flushing oli pada system \r\n3. Penggantian oil filter 962\r\n4. Penggantian air filter \r\n5. Penggantian oil separator \r\n6. Pengisian oli screw yang baru\r\n\r\n* Test Running Normal \r\nLoad : 8.0 Bar\r\nUnload : 9.0 Bar\r\n* Clear up life time \r\n* Cleaning cooler & body kompresor \r\n* HM : 7487 H\r\n* Cek kebocoran oli (tidak ada)'),
(73, '30', 'H. Ipung', '2023-02-21', 'Kompresor Screw JM 3 in 1 20D', '-', 'TU/II/025/2023\r\nTeknisi : Yasir\r\nJenis Tugas : Setting, Perbaikan\r\nKeluhan Customer : Tangki penuh air \r\n\r\nKeterangan Teknisi : \r\n1. Pasang electric auto drain \r\n2. Pasang power auto drain 220VAC\r\n3. Test running normal \r\n4. Set timer'),
(74, '29', 'Bp. Slamet', '2023-02-21', 'Kompresor Screw JM 3 in 1 20', '-', 'TU/II/026/2023\r\nTeknisi : Yasir \r\nJenis Tugas : Cheking\r\nKeluhan Customer : Fall to stop alarm \r\n\r\nKeterangan Teknisi :\r\n1. Reposisi kompresor dari dalam - luar produksi\r\n2. Oper power terminal R.S.T\r\n3. Test running unit normal \r\nLoad : 6.0 Bar \r\nUnload : 7.0 Bar\r\n4. Cek kebocoran oli tidak ada \r\n5. Cek level oli masih di garis standart'),
(75, '56', '-', '2023-02-22', 'Kompresor JM 3 in 1 20 HP 20 D', '-', 'TU/II/028/2023\r\nTeknisi : Yasir \r\nJenis Tugas : Cheking \r\nKeluhan Customer : Keluar air, kompresor tidak bisa start.\r\n\r\nKeterangan Teknisi :\r\n1. Cek rangkaian kontrol\r\nFuse & Travo sda diganti\r\n2. Cek level oli normal\r\n3. Test running unit normal\r\nLoad : 6.0 Bar\r\nUnload : 8.0 Bar\r\n4. HM : 2314H 24M\r\n5. Cek air dryer \r\nLP: 25 psig\r\nI : 1.4 A\r\nR : 134 A\r\nRunning Normal'),
(76, '57', 'Bp. Nurul Huda', '2023-02-22', 'Kompresor Sullair 30 HP', '-', 'TU/II/029/2023\r\nTeknisi : Yusuf \r\nJenis Tugas : Setting\r\nKeluhan Customer : Test Running\r\n\r\nKeterangan Teknisi :\r\n1. Penginstallan unit\r\n2. Pasang kabel power \r\n3. Test running \r\nLoad : 0.60 Mpa\r\nUnload : 0.75 Mpa\r\n4. Temp : 75 - 85 C\r\n5. Kompresor berjalan normal'),
(77, '58', 'Bp. A Jamil', '2023-02-22', 'Kompresor Screw JM 30 D', '-', 'TU/II/031/2023\r\nTeknisi : Yasir \r\nJenis Tugas : Cheking\r\nKeluhan Customer : \r\n\r\nKeterangan Teknisi :\r\n1. Cek level oli masih di level standart\r\n2. Cleaning filter body & coller oil\r\n3. Test Running unit normal\r\nLoad : 5.0 Bar\r\nUnload : 6.2 Bar\r\n4. HM : 4195 H 19 M'),
(78, '58', 'Bp. A Jamil', '2023-02-22', 'Air Dryer AD 30', '-', 'TU/II/031/2023\r\nTeknisi : Yasir \r\nJenis Tugas : Cheking\r\nKeluhan Customer :\r\n\r\nKeterangan Teknisi :\r\n1. Cek Air Dryer \r\nLP : 70 psig\r\nI : 3.6 A\r\nR : 22\r\n2. Bersihkan kondensor \r\n3. Test running unit normal'),
(79, '53', 'Bp. Wildan', '2023-02-21', 'Water Chiller GF No. 01/ Danfoss MT 160', '-', 'TU/II/030/2023\r\nTeknisi : Kariono \r\nJenis Tugas : Perbaikan\r\nKeluhan Customer : Ada kebocoran \r\n\r\nKeterangan Teknisi :\r\n1. Pengelasan kebocoran \r\n2. Ganti filter drier EK 304\r\n3. Ganti pressure switch LP / HP\r\n4. Ganti kontrol temperature\r\n5. Tekan - cek kebocoran \r\n6. cacum \r\n7. isi freon R22\r\nChiller berjalan normal'),
(80, '53', 'Bp. Wildan', '2023-02-21', 'Water Chiller GF No. 3 / Copeland CRNQ-0500', '-', 'TU/II/031/2023\r\nTeknisi : Kariono\r\nJenis Tugas : Perbaikan \r\nKeluhan Customer : Penambahan freon 1 can \r\n\r\nKeterangan Teknisi :\r\n1. Pengencangan neple pressure gauge yang bocor\r\nChiller berjalan normal'),
(81, '53', '-', '2023-02-28', 'Water Chiller No.2 / Copeland CRNO-050 TFO-556', '-', 'TU/II/033/2023\r\nTeknisi : Kariono\r\nJenis Tugas : Cheking \r\nKeluhan Customer : Kurang dingin \r\n\r\nKeterangan Teknisi :\r\n1. Ada kebocoran pada pentil pengisian freon \r\n2. pengencangan pentil pengisian \r\n3. Penambahan freon R22'),
(82, '20', 'Bp. Bagus', '2023-02-24', 'Kompresor Screw Kaeser SK-26', '-', 'TU/II/035/2023\r\nTeknisi : Rusmaji\r\nJenis Tugas : Running\r\nKeluhan Customer : Running\r\n\r\nSett Press : 6.5 - 7.5 Bar\r\nLoad / Unload tercapai\r\nSett tercapai normal \r\nLevel oli di garis aman\r\nBlower kipas berjalan normal\r\nTidak ada kebocoran'),
(83, '59', 'Bp. Adi', '2023-02-25', 'Kompresor Screw 22Kw HD-22', '-', 'TU/II/036/2023\r\nTeknisi : Rusmaji\r\nJenis Tugas : Perbaikan \r\nKeluhan Customer : Kebocoran screw\r\n\r\nKeterangan Teknisi :\r\n1. Bongkar - pasang shaft seal \r\n2. Tambah packing tutup seal \r\n3. Tercapai normal tidak ada kebocoran \r\n Catatan : seal atur ulang & penambahan packing hasil ok untuk sparepart shaft seal menyusul \r\n\r\nSeal ukuran : 80*60*10'),
(84, '60', 'Bp. M. Iskhak', '2023-02-27', 'Water Chiller GF-03', '-', 'TU/II/036/2023\r\nTeknisi : Kariono \r\nJenis Tugas : Cheking\r\nKeluhan Customer : Tidak bisa jalan \r\n\r\nKeterangan Teknisi :\r\n1. Kompresor copeland terbakar \r\n2. Ada kebocoran pada evap (sistem)\r\nRekomendasi :\r\n1. Ganti kompresor \r\n2. Ganti filter drier EK 163 3/8\"\r\n3. Perbaikan evap\r\n4. Ganti freon R22'),
(85, '61', 'Bp. Sahrul', '2023-02-22', 'Kompresor Screw JM 50 D', '-', 'TU/II/037/2023\r\nTeknisi : Yasir \r\nJenis Tugas : Checking\r\nKeluhan Customer : Flange tangki bocor halus\r\n\r\nKeterangan Teknisi :\r\n1. Cek level oil masih di garis standart\r\n2. Cek kebocoran oli pada unit (tidak ada)\r\n3. Test running unit normal\r\nLoad : 7.5 Bar\r\nUnload : 9.0 Bar\r\n\r\nNB: Kebocoran pada flang'),
(86, '34', 'Bp. Handi', '2023-02-27', 'Kompresor Screw JM 100 D', '-', 'TU/II/037/2023\r\nTeknisi : Yasir \r\nJenis Tugas : Setting \r\nKeluhan Customer : Commissioning Unit \r\n\r\nKeterangan Teknisi :\r\n1. Install power 380 VAC utama - panel komp\r\n2. Test running unit normal \r\nLoad : 4.0 Bar\r\nUnload : 6.0 Bar \r\n3. Cek kebocoran oli (tidak ada)\r\n4. Cek level oli batas normal \r\n5. Fan cooler running normal'),
(87, '33', 'Ana', '2023-02-22', 'Kompresor Screw JM 50 D', '-', 'TU/II/038/2023\r\nTeknisi : Yasir \r\nJenis Tugas : Checking \r\nKeluhan Customer : \r\n\r\nKeterangan Teknisi :\r\n1. Cek level oli normal\r\n2. Cek kebocoran oli (tidak ada)\r\n3. Test running unit normal \r\nLoad : 6.0 Bar\r\nUnload :7.0 Bar\r\nHM : 143H 47M\r\n4. Fan cooler oli running otomatis \r\n5. Kuras air di tanki 2000Liter \r\n6. Cek air dryer running normal\r\nLP: 20 psig\r\nI : 3.8 A\r\nR : 134A\r\n7. Setting auto drain timer \r\n\r\nNB : Tanki 2000L rekomendasi pasang autodrain'),
(88, '62', '-', '2023-02-27', 'Kompresor JM 3 in 1 15 D', '-', 'TU/II/038/2023\r\nTeknisi : Winardi \r\nJenis Tugas : -\r\nKeluhan Customer : -\r\n\r\nKeterangan Teknisi :\r\n*Service berkala \r\n1. Ganti oil \r\n2. Ganti oil filter\r\nTrial ok tidak ada kebocoran'),
(89, '63', 'Bp. Indra', '2023-02-27', 'Kompresor 3 in 1 JM 20 PM High Pressure', '-', 'TU/II/039/2023\r\nTeknisi : Rusmaji\r\nJenis Tugas : -\r\nKeluhan Customer : Running \r\n\r\nKeterangan Teknisi : \r\n1. Running aman \r\n2. Level oli normal batas aman \r\n3. Tidak ada kebocoran \r\n4. Pasang kabel power + MCB'),
(90, '47', 'Bp. Yanto', '2023-02-28', 'Water Chiller 30 HP', '-', 'TU/II/040/2023\r\nTeknisi : Yusuf\r\nJenis Tugas : Setting\r\nKeluhan Customer : Test Running\r\n\r\nKeterangan Teknisi :\r\n1. Pasang jaringan pipa \r\n2. Pasang kilat power\r\n3. Pasang kabel power pump dan sensor \r\n\r\nWater chiller berjalan normal'),
(91, '28', '-', '2023-03-01', 'Kompresor Screw JM 100 D', '-', 'TU/III/001/2023\r\nTeknisi : Kariono\r\nJenis Tugas : Cheking\r\nKeluhan Customer : Coupling pecah \r\n\r\nKeterangan Teknisi :\r\n1. Penggantian rubber coupling \r\n2. Pengecekan kelistrikan \r\nRekomendasi :\r\nGanti kontactor scheneider LC1R95'),
(92, '64', '-', '2023-03-02', 'Kompresor Kaeser 50 HP', '-', 'NTu/III/001/2023\r\nTeknisi : Yusuf\r\nJenis Tugas : Setting\r\nKeluhan Customer : Alarm \r\n\r\nKeterangan Teknisi :\r\n1. Alarm voltase turun 349\r\n2. Sett parameter\r\n3. Test running \r\nLoad : 0.60 Mpa \r\nUnload : 0.65 Mpa\r\nTemp : 85 - 95 C\r\n4. Runtime : 86H 25M\r\n5. Kompresor berjalan normal'),
(93, '28', '-', '2023-03-02', 'Kompresor Screw JM 100 D', '-', 'TU/III/002/2023\r\nTeknisi : Kariono \r\nJenis Tugas : Perbaikan \r\nKeluhan Customer : Tidak bisa running\r\n\r\nKeterangan Teknisi :\r\n1. Penggantian kontactor LC195 / 220 V\r\n2. Tes Control tanpa beban \r\n* Kompresor Start:\r\nSP = 8 - 8.5 Bar\r\nHM = 698 Jam \r\nLevel Oli = Atas garis normal \r\nKompresor berjalan normal'),
(94, '65', '-', '2023-03-01', 'Kompresor Rotary 15 Kw', '-', 'TU/III/003/2023\r\nTeknisi : Yasir \r\nJenis Tugas : Cheking \r\nKeluhan Customer : Over heating\r\n\r\nKeterangan Teknisi :\r\n1. Cek level oli batas normal \r\n2. Cek rangkaian kontrol normal \r\n3. Cek selenoid valve input oli cooler \r\n4. Cek coupling puli as kompresor rusak \r\n5. Cek load unload kompresor masih normal \r\nLoad : 6.0 Bar \r\nUnload 8.0 Bar \r\n\r\nNB : Pengecekan berlanjut setelah unit selesai di repair \r\nPosisi unit masih dalam perbaikan'),
(95, '21', 'Bp. Agus', '2023-03-01', 'Kompresor JM 3 in 1 20 HP 20 D', '-', 'TU/III/004/2023\r\nTeknisi : Rusmaji \r\nJenis Tugas : Perawatan \r\nKeluhan Customer : Maintenance rutin\r\n\r\nKeterangan Customer : \r\n1. Ganti oli\r\n2. Ganti oil filter \r\n3. Ganti air filter \r\n4. Ganti o/a separator'),
(96, '66', 'Bp. Anton', '2023-03-03', 'Air Dryer ION ADL-120', '-', 'NTU/III/002/2023\r\nTeknisi : Yasir \r\nJenis Tugas : Cheking \r\nKeluhan Customer : Unit tidak bisa running \r\n\r\nKeterangan Teknisi :\r\n1. Cek ruang kontrol normal\r\n2. Cek freon \r\nLP : 100 Psi (kondisi unit off)\r\nR : 404A\r\n3. Cek kompresor macet \r\n4. Cek fan kompresor normal \r\n5. Cek thermo control tidak ada \r\n\r\nNB: Air Dryer di rekom penggantian / penambahan\r\n1. Kompresor \r\n2. Freon\r\n3. Filter Dryer \r\n4. Pemasangan Thermocontrol\r\n5. Expansion Pipa'),
(97, '42', 'Bp. Ansori', '2023-03-06', 'Kompresor Screw JM 75 PM', '-', 'NTU/III/003/2023\r\nTeknisi : Kariono \r\nJenis Tugas : Perawatan \r\nKeluhan Customer : Maintenance \r\n\r\nKeterangan Teknisi :\r\n1. Penggantian oli jmeagle\r\n2. Penggantian oil filter \r\n3. Flushing sistem \r\nKompresor Start :\r\nSP : 5.5 - 6.5 Bar \r\nHM : 633 Jam \r\nLevel Oli : Atas garis normal \r\n\r\nNB : Maintenance berikut pada Km 2500 Jam/Total'),
(98, '53', 'Bp. Wildan', '2023-03-02', 'Water Chiller CRNQ-0500/ TFO556', '-', 'TU/III/004/2023\r\nTeknisi : Kariono \r\nJenis Tugas : Perbaikan\r\nKeluhan Customer : Kurang Dingin\r\n\r\nKeterangan Teknisi :\r\n1. Ada kebocoran dalam (pada LP+HP)\r\n2. Pengelasan kapiler LP + HP\r\n3. Tekan\r\n4. Vacum \r\n5. Isi freon + start\r\nLP : 60 Psi\r\nSP : 10C\r\nJalan Normal'),
(99, '67', 'Bp. Juliadi', '2023-03-04', 'Kompresor Screw BD - 37 EPM', '-', 'TU/III/005/2023\r\nTeknisi : Kariono \r\nJenis Tugas : Perawatan \r\nKeluhan Customer : Perawatan\r\n\r\nKeterangan Teknisi :\r\n1. Ganti O/A Separator\r\n2. Ganti Oil Filter\r\n3. Ganti Air Filter\r\n4. Ganti JMEagle Oli 46\r\n5. Flushing System \r\n\r\nKompresor Start:\r\nSP : 6 - 7 Bar / Load - Unload \r\nHM : 6.780 Jam \r\nLevel Oli : Diatas garis normal \r\nKompresor berjalan normal'),
(100, '68', '-', '2023-03-15', 'Water Chiller GF - 05', '-', 'NTU/III/006/2023\r\nTeknisi : Kariono \r\nJenis Tugas : Setting \r\nKeluhan Customer : Trial \r\n\r\nKeterangan Teknisi :\r\n1. Connect power \r\n2.Chiller Start \r\nSP : 12C\r\nLP : 58 Psi\r\nAmpere : 7.5 + 7.6 + 7.8 A\r\n3. Kondisi chiller berjalan normal'),
(101, '20', 'Bp. Heru', '2023-03-06', 'Kompresor Kaeser SK-26', '-', 'TU/III/006/2023\r\nTeknisi : Rusmaji\r\nJenis Tugas : -\r\nKeluhan Customer : Running \r\n\r\nKeterangan Teknisi :\r\nRunning (semua fungsi tercapai normal)'),
(102, '69', 'Bp. Angget', '2023-03-07', 'Kompresor Screw 3 in 1 JM 10 D', '-', 'TU/III/007/2023\r\nTeknisi : Rusmaji \r\nJenis Tugas : Cheking \r\nKeluhan Customer : Motor Unbalance \r\n\r\nKeterangan Teknisi :\r\n1. Running tidak terjadi unbalance \r\n2. Saran : Bila terjadi unbalance segera cek tegangan 3 phase (RST)'),
(103, '14', '-', '2023-03-16', 'Kompresor Screw SCD 30', '-', 'NTU/III/007/2023\r\nTeknisi : Kariono \r\nJenis Tugas : Cheking\r\nKeluhan Customer :\r\n\r\nKeterangan Teknisi : \r\n1. Selang Piu dari separator - screw putus - ganti selang piu baru M-8 \r\n\r\nKompresor berjalan normal'),
(104, '50', 'Bp. Galih', '2023-03-07', 'Kompresor Screw Kaeser CSD 125', '-', 'TU/III/008/2023\r\nTeknisi : Rusmaji\r\nJenis Tugas : Cheking\r\nKeluhan Customer : -\r\n\r\nKeterangan Teknisi :\r\n1. Screw putar berat\r\n2. Kotoran serpihan / oli mengeras\r\n3. Temperature naik\r\n4. Ampere motor naik diatas \r\n\r\nSaran : Overhoul'),
(105, '70', 'Bp. Drias', '2023-03-20', 'Kompresor Screw Atlas GA-90', '-', 'NTU/III/008/2023\r\nTeknisi : Kariono \r\nJenis Tugas : Perawatan\r\nKeluhan Customer : Maintenance\r\n\r\nKeterangan Teknisi : \r\n1. Penggantian oli \r\n2. Penggantian oil filter \r\n3. Penggantian O/A separator \r\n4. Penggantian air filter \r\n5. Flushing \r\nKompresor Start \r\nHM : 28.716\r\nSP : 6.7 - 7.8 Bar \r\nKompresor berjalan normal'),
(106, '71', 'Bp. Iwan', '2023-03-27', 'Water Chiller GF 15 / Emerson ZR 94KC', '-', 'NTU/III/008/2023\r\nTeknisi : Kariono \r\nJenis Tugas : Perbaikan \r\nKeluhan Customer : Ada kebocoran \r\n\r\nKeterangan Teknisi :\r\n1. Pengelasan pada elbow suction\r\n2. Bongkar packing belakang evap + pasang\r\n3. Tekan\r\n4. Vacum \r\n5. Isi freon + start\r\n\r\nNB: Jalan, kurang lebih 2 menit (pompa ada masalah) \r\nKompresor off'),
(107, '72', '-', '2023-03-07', 'Kompresor Hitachi 22 Kw', '-', 'TU/III/010/2023\r\nTeknisi : Yusuf \r\nJenis Tugas : Cheking \r\nKeluhan Customer :\r\n\r\nKeterangan Teknisi :\r\nKompresor posisi jalan di jaringan pipa selenoid intake valve banyak yang bocor dan keluar oli \r\nRekomendasi : Rubah jaringan load - unload / intake valve dan tambah selenoid valve 2 pcs, ganti separator'),
(108, '72', '-', '2023-03-07', 'Kompresor Hitachi 37 Kw', '-', 'TU/III/010/2023\r\nTeknisi : Yusuf \r\nJenis Tugas : Cheking\r\nKeluhan Customer :\r\n\r\nKeterangan Teknisi :\r\n1. Kompresor posisi mencapai start kembali berat karena pembuangan intel tidak maksimal.\r\nRekomendasi : Rubah jaringan intake valve / tambah selenoid ganti filter udara P814456 dan Fanbel 68 JC3166 2 pcs'),
(109, '73', 'Bp. Wahyu', '2023-03-07', 'Kompresor Screw JM 10 D', '-', 'TU/III/011/2023\r\nTeknisi : Kariono \r\nJenis Tugas : \r\nKeluhan Customer : Trial\r\n\r\nKeterangan Teknisi :\r\nKompresor berjalan normal'),
(110, '74', 'Bp. Teguh', '2023-03-08', 'Kompresor Shark 75 HP', '-', 'TU/III/011/2023\r\nTeknisi : Yusuf \r\nJenis Tugas : Cheking \r\nKeluhan Customer Overheat\r\n\r\nKeterangan Teknisi :\r\n1. Kompresor overheat / panas oil filter terhambat sehingga sirkulasi oil tidak normal\r\n\r\nRekomendasi :\r\n1. Ganti sparepart total, Oil filter, Air Filter, O/A Separator \r\nRuntime : 3900'),
(111, '74', 'Bp. Feriyanto', '2023-03-09', 'Kompresor Screw Shark CB 75 A', '-', 'TU/III/012/2023\r\nTeknisi : Kariono \r\nJenis Tugas : Perawatan \r\nKeluhan Customer : Maintenance \r\n\r\nKeterangan Teknisi :\r\n1. Penggantian oil filter \r\n2. Penggantian oli jmeagle \r\n3. Flushing sistem oli \r\nKompresor start berjalan normal'),
(112, '47', 'Bp. Deril', '2023-03-10', 'Water Chiller Delta 40 HP', '-', 'TU/III/013/2023\r\nTeknisi : Yusuf + Abbas\r\nJenis Tugas : Perbaikan\r\nKeluhan Customer : Ganti kompresor \r\n\r\nKeterangan Teknisi :\r\n1. Bongkar kompresor lama ganti baru \r\n2. Vacum, cek kebocoran, isi freon\r\n3. Test Running \r\nLP : 50 Psi \r\nHP : 325 Psi (high pressure tinggi karena ruangan terlalu panas)\r\nTemp : 20C \r\nAmp : 57 A\r\nWater chiller berjalan normal'),
(113, '21', 'Bp. Sur', '2023-03-13', 'Water Chiller - 05 HP / 3.7 Kw', '-', 'TU/III/014/2023\r\nTeknisi : Sabda Bakhtiar \r\nJenis Tugas : Cheking \r\nKeluhan Customer : \r\n\r\nKeterangan Teknisi :\r\n1. Ada kerusakan pada hand valve atau tidak bisa di tutup / buka\r\n2. Kumparan compressor sangat lemah, disebabkan oleh hand valve yang menutup oleh karena itu kumparan compressor tersumbat dan lama lama tidak stabil / lemah, dan freon yang disirkulasi oleh compressor tidak stabil / tidak dingin.\r\n\r\nRekomendasi : \r\nPergantian komponen \r\n1. Compressor 5 HP ZP61 KCF-TFD-130\r\n2. Hand Valve 3/8\" / 3 x exspansi'),
(114, '75', '-', '2023-03-14', 'Kompresor Screw  JM 30 D', '-', 'TU/III/015/2023\r\nTeknisi : Yasir \r\nJenis Tugas : Setting, Perbaikan \r\nKeluhan Customer : Commissioning \r\n\r\nKeterangan Teknisi :\r\n1. Cek power 380 VAC, Sudah terconnect\r\n2. Cek level oli kompresor batas normal \r\n3. Test Running unit normal \r\nLoad : 6.5 Bar \r\nUnload : 8.0 Bar \r\n4. Fan coller running auto'),
(115, '76', '-', '2023-03-30', 'Kompresor Screw JM 3 in 1 10 D', '-', 'NTU/III/015/2023\r\nTeknisi : Yasir \r\nJenis Tugas : Cheking \r\nKeluhan Customer : High Temperature, Cooler bocor oli\r\n\r\nKeterangan Teknisi :\r\n1. Bongkar cooler oil kompresor \r\n2. Lepas oil filter \r\n3. HM : 2707H 58M\r\n\r\nNB : \r\n- Repair oil cooler yang bocor\r\n- Penggantian oil filter \r\n- Penggantian air filter\r\n- Penggantian oil separator \r\n- Penggantian oil kompresor \r\n- Cleaning cooler'),
(116, '77', 'Bp. Herny', '2023-03-21', 'Kompresor Screw Kobelco SG 55A', '-', 'NTU/III/015/2023\r\nTeknisi : Kariono \r\nJenis Tugas : Perawatan \r\nKeluhan Customer : Maintenance \r\n\r\nKeterangan Teknisi :\r\n1. Penggantian O/A Separator \r\n2. Penggantian Oil Filter \r\n3. Penggantian Air Filter \r\n4. Penggantian Oli JMEagle \r\n5. Flushing Sistem \r\n6. Service cooler + bongkar pasang \r\n\r\nKompresor Start :\r\nHM : 34.422 Jam \r\nSP : 5,3 - 6,7 Bar / Load - Unload \r\nLevel Oli : Atas garis normal'),
(117, '71', '-', '2023-03-14', 'Water Chiller GF 15 / Emerson ZR 94 KC', '-', 'TU/III/016/2023\r\nTeknisi : Kariono \r\nJenis Tugas : Cheking \r\nKeluhan Customer : Pressure Turun\r\n\r\nKeterangan Teknisi : \r\n1. Ada kebocoran pada elbow out evap\r\n2. Ada kebocoran pada packing belakang evap \r\n\r\nRekomendasi : \r\n1. Ganti packing \r\n2. Pengelasan kebocoran \r\n3. Ganti freon baru R22'),
(118, '21', 'Bp. Suryo', '2023-03-15', 'Water Chiller 05 HP / 3.7 Kw', '-', 'TU/III/017/2023\r\nTeknisi : Sabda Bakhtiar \r\nJenis Tugas : Perbaikan \r\nKeluhan Customer : \r\n\r\nKeterangan Teknisi :\r\n1. Melepas kompresor yang rusak \r\n2. Pasang kompresor 5 Hp baru \r\n3. Ganti hand valve in out \r\n4. Ganti kapiler dengan expansion\r\n5. Flashing kondensor dan evaporator pada indor\r\n6. Vacum seluruh sistem selama 30 menit \r\n7. Mengisi freon low 60 Psi, High 300 Psi\r\n\r\nTest Running :\r\nLow Press : 60 Psi \r\nHigh Press : 300 Psi \r\nAmpere : 7.5 A\r\nTemp : 10C\r\nCold storage berjalan normal'),
(119, '78', 'Bp. Donny', '2023-03-14', 'Kompresor Screw JM 100', '-', 'TU/III/018/2023\r\nTeknisi : Kariono \r\nJenis Tugas : Setting, Cheking, Perawatan\r\nKeluhan Customer : Transmitter pressure acak, oli hampir habis \r\n\r\nKeterangan Teknisi :\r\n1. Pengetapan oli \r\n2. Flushing sistem \r\n3. Isi oli jmeagle \r\n4. Penggantian transmitter pressure \r\n\r\nKompresor start \r\nSP : 7,3 - 8,3 Bar \r\nHM : 99 Jam \r\nLevel Oli : Atas garis normal \r\nKompresor berjalan normal'),
(120, '79', 'Bp. Galu', '2023-03-12', 'Kompresor Screw JM 3 in 1 10 D', '-', 'TU/III/019/2023\r\nTeknisi : Yasir \r\nJenis Tugas : Setting, Perawatan \r\nKeluhan Customer : Alarm lifetime \r\n\r\nKeterangan Teknisi :\r\n1. Pengetapan oli kompresor yg lama \r\n2. Flushing oli pada system \r\n3. Penggantian oli filter \r\n4. Penggantian air filter \r\n5. Penggantian oil separator \r\n6. Penggantian oli jmeagle \r\n7. Bersihkan body & filter kompresor\r\n8. Test running unit normal \r\nLoad : 7.0 Bar\r\nUnload : 8.0 Bar'),
(121, '32', 'Bp. Aan', '2023-03-15', 'Kompresor Screw JM 50 D', '-', 'TU/III/022/2023\r\nTeknisi : Yusuf \r\nJenis Tugas : Setting \r\nKeluhan Customer : Test Running \r\n\r\nKeterangan Teknisi : \r\n1. Pasang kabel power kompresor dan air dryer 4x6mm\r\n2. Test Running \r\nLoad : 0.55 Mpa \r\nUnload : 0.65 Mpa\r\nTemp : 75 - 85 C\r\n3. Kabel power kurang besar, yang terpasang 4x6 mm, kebutuhan 4x25 mm\r\n\r\nRekomendasi : Harus ganti kabel 4x25mm\r\nAir dryer test running (ok)'),
(122, '81', '-', '2023-03-15', 'Kompresor Screw JM 50 D', '-', 'TU/III/023/2023\r\nTeknisi : Yusuf \r\nJenis Tugas : Cheking \r\nKeluhan Customer : Check\r\n\r\nKeterangan Teknisi :\r\n1. Run Time : 1039 H 16 M\r\n2. Lead Time : 508 H 32 M\r\n3. Maintain : 519 H\r\n4. History : Motor overload karena tegangan pln putus 1 phase dan tegangan naik turun\r\n5. Compressor dan dryer terlalu kotor karena tempat jadi 1 dengan vacum \r\n\r\nRekomendasi : Pindah kompresor dan dryer / pindah vacum\r\nKompresor berjalan normal'),
(123, '21', 'Bp. Suryo', '2023-03-16', 'Cold Storage 05 HP / 37 Kw', '-', 'TU/III/024/2023\r\nTeknisi : Sabda Bakhtiar\r\nJenis Tugas : Perbaikan \r\nKeluhan Customer : \r\n\r\nKeterangan Teknisi :\r\n1. LP - HP Rendah \r\n2. Mengganti filter drier yang baru \r\n3. Test kebocoran (aman)\r\n4. Tambah freon \r\nLP : 60 Psi \r\nHP : 270 Psi \r\nTemp : 10C tercapai 15C running'),
(124, '33', 'Ana', '2023-03-16', 'Kompresor Screw JM 50 D', '-', 'TU/III/025/2023\r\nTeknisi : Yasir\r\nJenis Tugas : Cheking, Perbaikan\r\nKeluhan Customer : Air Tank banyak air \r\n\r\nKeterangan Teknisi :\r\n1. Pemasangan elektrik autodrain selesai \r\n2. Connect power elektrik autodrain selesai \r\n3. Test running normal \r\nLoad : : 6.0 Bar \r\nUnload : 7.0 Bar \r\n4. Level oil batas normal'),
(125, '82', 'Bp. Sukiran', '2023-03-17', 'Kompresor Screw JM 30 PM', '-', 'TU/III/026/2023\r\nTeknisi : Yasir \r\nJenis Tugas : Setting, Perawatan \r\nKeluhan Customer : Alarm life time sparepart\r\n\r\nKeterangan Teknisi : \r\n1. Pengetapan oli kompresor yg lama \r\n2. Flushing oli pada system \r\n3. Penggantian oil filter \r\n4. Penggantian air filter \r\n5. Penggantian oil separator \r\n6. Penggantiam oli kompresor \r\n7. Clear up alarm life time \r\n\r\nTest running unit normal \r\nLoad : 6.0 Bar \r\nUnload : 7.0 Bar \r\nHM : 11036 H'),
(126, '33', 'Bp. Farid', '2023-03-21', 'Kompresor Screw JM 30 D', '-', 'TU/III/027/2023\r\nTeknisi : Yasir \r\nJenis Tugas : Setting\r\nKeluhan Customer : Install Jaringan, Commissioning Unit\r\n\r\nKeterangan Teknisi :\r\n1. Install jaringan pararel kompresor piston dan screw - tanki - air dryer - selesai \r\n2. Pasang elektrik auto drain tanki selesai \r\n3. Connect power 380Vac komp screw selesai \r\n4. Connect power 220Vac elektrik auto drain pada tanki \r\n5. Test running unit normal \r\nLoad : 6.5 Bar \r\nUnload : 7.5 Bar \r\n6. Cek kebocoran oli tidak ada\r\n7. Level oil normal');
INSERT INTO `sistem_customer_details` (`id`, `id_pt`, `attn`, `tanggal`, `type`, `nota`, `service`) VALUES
(127, '83', 'Bp. Andry', '2023-03-17', 'Drier SCR 0085 - NP', '-', 'TU/III/028/2023\r\nTeknisi : Kariono \r\nJenis Tugas : Cheking \r\nKeluhan Customer : Drier tidak jalan \r\n\r\nKeterangan Teknisi :\r\nKompresor Ngejam \r\n- Panasonic 2V36S225BUA / 220V, R22\r\n\r\nRekomendasi :\r\n1. Ganti kompresor baru\r\n2. Ganti filter 053 1/4\"\r\n3. Ganti freon R22\r\n\r\nTambahan pengecekan untuk kompresor screw SCR\r\n- SP = 6 - 7 Bar \r\n- HM = 24,117 Jam'),
(128, '84', 'Bp. Al Zainal', '2023-03-17', 'Kompresor Screw SCR 30 M', '-', 'TU/III/029/2023\r\nTeknisi : Yasir \r\nJenis Tugas : Setting, Perawatan\r\nKeluhan Customer : Alarm lifetime sparepart, overheating\r\n\r\nKeterangan Teknisi :\r\n1. Pengetapan oli kompresor yang lama\r\n2. Flushing oli pada system \r\n3. Penggantian oil filter\r\n4. Penggantian air filter \r\n5. Penggantian oil separator \r\n6. Penggantian oli kompresor \r\n7. HM : 16655H 57M\r\n8. Bersihkan body dan filter kompresor \r\n9. Clear up alarm lifetime \r\n10. Test running unit normal \r\nLoad : 5.7 Bar \r\nUnload : 6.7 Bar'),
(129, '85', 'Bp. Waluyo', '2023-03-18', 'Chiller (Cold Storage) Danfost MT : 40', '-', 'TU/III/029/2023\r\nTeknisi : Kariono\r\nJenis Tugas : Cheking \r\nKeluhan Customer : -\r\n\r\nKeterangan Teknisi :\r\n1. SP Awal = -4C (minta naik jadi -6C)\r\n2. LP = 30 Psi\r\n3. HP = 250 Psi \r\n4. Ampere = \r\nR : 4.5 A\r\nS : 4.7 A\r\nT : 4.2 A\r\nMesin Kompresor berjalan normal'),
(130, '84', '-', '2023-03-18', 'Kompresor Screw SCR 30 M', '-', 'TU/III/030/2023\r\nTeknisi : Yasir \r\nJenis Tugas : Cheking\r\nKeluhan Customer : Over Heat, Phase terbalik\r\n\r\nKeterangan Teknisi :\r\n1. Cek level oil drop (kurang)\r\n2. Test running unit upnormal \r\nLoad : 5.7 Bar \r\nUnload ; 6.7 Bar \r\nHM : 1738 H\r\nNB : Unit direkom untuk penggantian oil filter & oil kompresor, oil separator, air filter'),
(131, '21', 'Bp. Aris', '2023-03-18', 'Cold Storage GF 05 / 380V', '-', 'TU/III/031/2023\r\nTeknisi : Yusuf \r\nJenis Tugas : Perbaikan \r\nKeluhan Customer : Tidak dingin\r\n\r\nKeterangan Teknisi :\r\n1. Ganti handvalve 1/2\"\r\n2. Ganti filter dryer ZEK 164\r\n3. Ganti pressure gauge LP-HP\r\n4. Flashing ulang\r\n5. Vacum, isi freon \r\n6. Test Running :\r\nLP : 60 Psi \r\nHP : 270 Psi \r\nAmp : 7.8 A\r\nTemp : 10C jalan 15C\r\ncold storage berjalan normal'),
(132, '86', 'Bp. Supriyadi', '2023-03-23', 'Kompresor Screw JM 30 PM', '-', 'TU/III/032/2023\r\nTeknisi : Rusmaji \r\nJenis Tugas : Perawatan \r\nKeluhan Customer : Maintenance Rutin\r\n\r\nKeterangan Teknisi :\r\n1. Ganti oli\r\n2. Ganti o/a separator \r\n3. Ganti oil filter (lama)\r\n4. Ganti air filter (lama)\r\n\r\nSett : air press 0.70 - 0.80 Mpa\r\nSetting tercapai normal aman \r\nLevel oli batas aman \r\nTidak ada kebocoran'),
(133, '87', 'Bp. Fajar', '2023-03-08', 'Kompresor Screw JM 30 D', '-', 'TU/III/033/2023\r\nTeknisi : Rusmaji \r\nJenis Tugas :\r\nKeluhan Customer : Running \r\n\r\nKeterangan Teknisi :\r\nRunning berjalan sempurna \r\nSaran : Tegangan input power dijaga stabilitasnya'),
(134, '47', 'Bp. Iwan', '2023-03-24', 'Water Chiller Delta Cool H4000cc', '-', 'TU/III/033/2023\r\nTeknisi : Kariono \r\nJenis Tugas : \r\nKeluhan Customer : High Press, Error Level Oli\r\n\r\nKeterangan Customer :\r\n1. Penggantian Filter 048\r\n2. Pressure Switch Oli\r\n3. Pengurangan tekanan freon \r\nKompresor tercapai'),
(135, '47', 'Bp. Iwan', '2023-03-21', 'Water Chiller Delta 40 HP', '-', 'TU/III/034/2023\r\nTeknisi : Yusuf\r\nJenis Tugas : Perbaikan\r\nKeluhan Customer : Tidak Dingin\r\n\r\nKeterangan Teknisi :\r\n1. Las dan rubah jaringan expansion valve\r\n2. Vacum dan isi freon, cek kebocoran (ok)\r\n3. Test Running \r\nLP : 50 Psi\r\nHP : 310 Psi \r\nAmp : 56 A\r\nTemp : 21 C jalan 23 C\r\nWater Chiller berjalan normal'),
(136, '88', '-', '2023-03-27', 'Kompresor Screw Kaeser ASD 40', '-', 'TU/III/034/2023\r\nTeknisi : Rusmaji \r\nJenis Tugas : Cheking \r\nKeluhan Customer : \r\n\r\nKeterangan Teknisi : \r\n1. Cek total \r\n2. Penggantian bearing / overhoul 24000H (bearing total)\r\n3. Ganti autodrain \r\n4. Ganti Oli Komp, AF, OF, OS \r\n5. Cuci cooler \r\n6. Ganti power supply 24V'),
(137, '21', 'Bp. Aris', '2023-03-25', 'Kompresor CRPS 05 HP', '-', 'TU/III/039/2023\r\nTeknisi : Sabda Bakhtiar\r\nJenis Tugas : Perbaikan \r\nKeluhan Customer : \r\n\r\nKeterangan Teknisi :\r\n1. Melepas compressor yg rusak \r\n2. Membuat tempat kaki untuk kompresor yg baru \r\n3. Memasang kompresor baru \r\n4. Mengganti soket E,R,S dengan yg baru \r\n5. Mengubah jaringan in/out \r\n6. Flashing seluruh sistem include kondensor , evaporator \r\n7. Mengelas bagian hisab dan menutup dengan starflex\r\n8. Vacum seluruh sistem dlm jangka waktu 40 mnt\r\n9. Mengisi freon sampai \r\nLP : 60 Psi \r\nHP : 300 Psi \r\nA : 72.0\r\nTest running (ok)'),
(138, '51', 'Bp. Christian', '2023-03-27', 'Kompresor Screw JM 75 PM', '-', 'TU/III/040/2023\r\nTeknisi : Rusmaji \r\nJenis Tugas : Perbaikan\r\nKeluhan Customer : Inverter Fault \r\n\r\nKeterangan Teknisi :\r\nLevel oli normal aman \r\nTidak ada kebocoran'),
(139, '66', 'Bp. Anton', '2023-03-28', 'Water Chiller Aicool XBZ.80P', '-', 'TU/III/041/2023\r\nTeknisi : Rusmaji \r\nJenis Tugas : Cheking \r\nKeluhan Customer : Perencanaan ganti control \r\n\r\nKeterangan Teknisi : \r\nR407C / 80 HP / 169A\r\nGanti control Eliwell ZX 3 phase protector \r\nKondisi kontaktor lama aman \r\nBreaker / MCB lama aman \r\nPress switch aman'),
(140, '89', 'Okta', '2023-03-29', 'Kompresor JM 30 PM', '-', 'TU/III/042/2023\r\nTeknisi : Yasir \r\nJenis Tugas : Setting \r\nKeluhan Customer : Alarm lifetime sparepart\r\n\r\nKeterangan Teknisi :\r\n1. Pengetapan oli komp yang lama \r\n2. Flushing oli pada sistem \r\n3. Penggantian oil filter \r\n4. Cleaning air filter \r\n5. Penggantian oil separator \r\n6. Penggantian oli komp\r\n7. Test running unit normal'),
(141, '90', '-', '2023-03-29', 'Water Chiller GF 03 / 380V', '-', 'TU/III/043/2023\r\nTeknisi : Kariono \r\nJenis Tugas : \r\nKeluhan Customer : Trial \r\n\r\nKeterangan Teknisi :\r\n1. Trial chiller / selesai di service \r\n2. Chiller berjalan normal'),
(142, '40', 'Bp. Refeydo', '2023-03-30', 'Air Dryer Elite Air EAD 50A', '-', 'TU/III/043/2023\r\nTeknisi : Yasir \r\nJenis Tugas : Cheking \r\nKeluhan Customer : Kurang dingin \r\n\r\nKeterangan Teknisi :\r\n1. Test Running unit upnormal \r\n2. Thermocontrol tidak ada \r\n3. Unit / sistem refrigerasi ada kebocoran \r\nNB : unit di rekom untuk repair kebocoran pada sistem \r\nRef : Penggantian / isi ulang freon R22\r\nPenggantian filter drier \r\nPenambahan thermocontrol'),
(143, '91', '-', '2023-04-01', 'Kompresor Screw S-29', '-', 'TU/III/043/2023\r\nTeknisi : Kariono \r\nJenis Tugas : Cheking \r\nKeluhan Customer :\r\n\r\nKeterangan Teknisi : \r\n1. Screw kasar \r\n2. Control temp kosong \r\n3. Pressure switch tidak fungsi \r\nRekomendasi \r\n1. Overhoul airend \r\n2. Ganti temp kontrol \r\n3. Ganti pressure switch \r\n4. Ganti OF, AF, OS, Oli\r\n5. Cleaning cooler \r\n6. Perbaikan kelistrikan'),
(144, '92', 'Bp. Sutiyono', '2023-03-30', 'Air Dryer Swan 10 HP', '-', 'TU/III/045/2023\r\nTeknisi : Rusmaji \r\nJenis Tugas : Cheking \r\nKeluhan Customer :\r\n\r\nKeterangan Teknisi :\r\nCek total \r\nFreon R22 berkurang off 8,5 (indikasi kebocoran)\r\nFilter drier buntu (ZEK - 053)\r\nComp 3.3 A / 220V\r\nFilter in out ARF 15 (1\")\r\n\r\nSaran :\r\nIsi freon + ganti filter drier \r\nPerbaikan kebocoran'),
(145, '93', 'Bp. Syahrul', '2023-03-31', 'Kompresor Screw JM 10', '-', 'TU/III/046/2023\r\nTeknisi : Kariono\r\nJenis Tugas : Perawatan\r\nKeluhan Customer : Life Time \r\n\r\nKeterangan Teknisi :\r\n1. Penggantian O/A Separator \r\n2. Penggantian Oil Filter \r\n3. Penggantian Air Filter \r\n4. Penggantian Oli JMEagle \r\n5. Flushing \r\nKompresor berjalan normal'),
(146, '94', 'Bp. Rudy', '2023-03-31', 'Kompresor Cina 50 HP', '-', 'TU/III/046/2023\r\nTeknisi : Yusuf \r\nJenis Tugas : Cheking \r\nKeluhan Customer ; Pressure acak\r\n\r\nKeterangan Teknisi :\r\n1. Ganti sensor pressur, monitor pembacaan sensor pressure tetap tidak bisa nol/ pembacaan di 0,18 Mpa\r\n2. Error pada monitor \r\nRekomendasi :\r\nGanti monitor touchscreen / inverter 50HP MAM 6080M'),
(147, '47', 'Bp. Rosid', '2023-03-31', 'Water Chiller JM 60 HP', '-', 'TU/III/047/2023\r\nTeknisi : Yusuf \r\nJenis Tugas : Setting\r\nKeluhan Customer : Test Running \r\n\r\nKeterangan Teknisi :\r\n1. Pasang Kabel power pompa \r\n2. Test running \r\nComp 1 : \r\nLP : 60 Psi \r\nHP : 280 Psi \r\nAmp : 38A\r\nComp 2 :\r\nLP : 60 Psi \r\nHP : 270 Psi\r\nAmp : 38 A\r\nWater Chiller berjalan normal'),
(148, '47', 'Bp. Rosid', '2023-03-31', 'Water Chiller Delta Cool 40HP', '-', 'TU/III/048/2023\r\nTeknisi : Yusuf\r\nJenis Tugas : Perbaikan \r\nKeluhan Customer : Tidak dingin\r\n\r\nKeterangan Teknisi : \r\n1. Suhu ruangan terlalu panas\r\n2. Test Running :\r\nLP : 60 Psi \r\nHP : 330 Psi\r\nAmp : 58A\r\n3. Tekanan freon tidak stabil, ada indikasi kebocoran baypas selenoid, sehingga sirkulasi tidak normal \r\nRekomendasi :\r\nRubah jaringan dan flushing ulang'),
(149, '95', '-', '2023-03-31', 'Kompresor Screw JM 3 in 1 10 D', '-', 'TU/III/049/2023\r\nTeknisi : Yasir \r\nJenis Tugas : Cheking\r\nKeluhan Customer : Commissioning Unit \r\n\r\nKeterangan Teknisi : \r\n1. Connect Power 380Vac\r\n2. Test Running Unit Normal \r\nLoad : 6.0 Bar \r\nUnload : 7.0 Bar \r\n3. Cek level oli masih dibatas normal \r\n4. Cek kebocoran sistem tidak ada \r\n5. Test Running Air Dryer Normal\r\nLP : 14 Psig \r\nI : 1.4 A'),
(150, '96', 'Bp. Herly Prasetyo', '2023-04-01', 'Kompresor Screw JM 30 PM', '-', 'TU/IV/0012023\r\nTeknisi : Rusmaji\r\nJenis Tugas : Perawatan \r\nKeluhan Customer : -\r\n\r\nKeterangan Teknisi :\r\n1. Ganti oli + O/A Separator \r\n2. Run tercapai normal \r\n3. Level oli batas aman \r\n\r\nSaran : Lebih sering cleaning mesin dr debu'),
(151, '69', 'Bp. Anggit', '2023-04-01', 'Kompresor 3 in 1 JM 10 D', '-', 'TU/IV/002/2023\r\nTeknisi : Rusmaji \r\nJenis Tugas : Perawatan \r\nKeluhan Customer : -\r\n\r\nKeterangan Teknisi :\r\n1. Ganti oli + o/a separator \r\n2. Tercapai aman \r\n3. Tidak ada kebocoran \r\n4. Level oli aman'),
(152, '69', 'Bp. Anggit', '2023-04-04', 'Kompresor 3 in 1 JM 10 D', '-', 'TU/IV/003/2023\r\nTeknisi : Rusmaji \r\nJenis Tugas : -\r\nKeluhan Customer : Air flow turun \r\n\r\nKeterangan Teknisi :\r\n1. Perbaikan intake valve (ada kebocoran oli naik + flow turun)\r\n2. Level oli batas aman'),
(153, '97', 'Bp. Habibi', '2023-04-03', 'Kompresor Screw FU 30 HP', '-', 'TU/IV/004/2023\r\nTeknisi : Yasir \r\nJenis Tugas : Cheking \r\nKeluhan Customer : Alarm life time \r\n\r\nKeterangan Teknisi :\r\n1. Cek air filter (tidak layak)\r\n2. Cek oil filter (tidak layak)\r\n3. Cek oli cooler (kotor)\r\n4. Cek level oil \r\n\r\nNB : Penggantian sparepart \r\n1. Air filter \r\n2. Oil filter \r\n3. Oil separator\r\n4. Oli kompresor'),
(154, '98', '-', '2023-04-03', 'Kompresor JM 50 PM', '-', 'TU/IV/005/2023\r\nTeknisi : Yasir \r\nJenis Tugas : Cheking \r\nKeluhan Customer :\r\n\r\nKeterangan Teknisi :\r\n1. Cek level oli masih normal \r\n2. Bersihkan oli cooler \r\n3. Test Running unit normal'),
(155, '98', '-', '2023-04-03', 'Air Dryer AD 50', '-', 'TU/IV/005/2023\r\nTeknisi: Yasir \r\nJenis Tugas : Checking \r\nKeluhan Customer : \r\n\r\nKeterangan Teknisi : \r\n1. Cek elektrik auto drain normal \r\n2. Test running air dryer normal \r\nLP : 27 Psig \r\nI : 2,4 A'),
(156, '99', '-', '2023-04-03', 'Kompresor Screw JM 3 in 1 20 D', '-', 'TU/IV/006/2023\r\nTeknisi : Yasir \r\nJenis Tugas : Cheking, Perbaikan \r\nKeluhan Customer : Oli keluar campur angin\r\n\r\nKeterangan Teknisi : \r\n1. Penggantian oli separator \r\n2. Test running unit normal \r\nLoad : 7.0 Bar \r\nUnload : 8.0 Bar \r\n3. HM : 5664 H\r\n4. Cek kebocoran oli pada sistem tidak ada \r\n5. Cek fan cooler saat start suara kasar\r\n6. Test running air dryer normal'),
(157, '21', 'Bp. Suryo', '2023-04-04', 'Cold Storage SBO 61 YAA (05 Pk)', '-', 'TU/IV/007/2023\r\nTeknisi : Sabda \r\nJenis Tugas : Perbaikan \r\nKeluhan Customer : Freon habis \r\n\r\nKeterangan Teknisi :\r\n1. Menekan dengan angin hingga 200 Psi\r\n2. Test Press (mencari kebocoran) pada sistem : kondensor, evaporator, jaringan pipa sunction dan discharge, nepple drat.\r\n3. Mengganti pentilan dikarenakan ada kebocoran, dan mengkencangkan nepple drat pada pressure switch (kebocorannya sangat rendah)\r\n4. Ditekan memastikan tidak bocor \r\n5. Memvacum sampai jarum -30 Inhg\r\n6. Mengisi freon'),
(158, '47', '-', '2023-04-03', 'Water Chiller Delta Cool 40HP', '-', 'TU/IV/008/2023\r\nTeknisi : Yusuf \r\nJenis Tugas : Perbaikan \r\nKeluhan Customer : Tidak dingin\r\n\r\nKeterangan Teknisi : \r\n1. Rubah jaringan freon \r\n2. Lepas baypas, las baypas \r\n3. Lepas separator, las separator \r\n4. Las pipa kapiler high press karena bocor \r\n5. Flashing, vacum, isi freon \r\n6. Lepas ducting karena tidak sesuai sehingga high press tinggi\r\n7. Test running water chiller berjalan normal'),
(159, '85', 'Bp. Waloyo', '2023-04-04', 'Cool Storage Danfost MT:22', '-', 'TU/IV/009/2023\r\nTeknisi : Kariono \r\nJenis Tugas : Setting, Cheking\r\nKeluhan Customer : Merubah Defros \r\n\r\nKeterangan Teknisi :\r\nSP : -6C\r\nDF : 4\r\nDefros : Jam 12 Malam\r\nAmpere : 5,1,5,4,5,6A\r\nLP : 28 Psi\r\nHP : 260 Psi \r\nJalan Normal'),
(160, '23', 'Bp. Eko Hadi', '2023-04-06', 'Kompresor Screw JM 20 PM', '-', 'TU/IV/010/2023\r\nTeknisi : Yusuf \r\nJenis Tugas : Cheking \r\nKeluhan Customer : Ada out di unit \r\n\r\nKeterangan Teknisi :\r\n1. Membersihkan unit \r\n2. Oil keluar dari intake valve di karenakan posisi off dari breaker tidak dari monitor\r\n\r\nRekomendasi : \r\n1. Matikan kompresor harus pada monitor dulu baru breaker \r\n2. Kompresor berjalan normal'),
(161, '76', '-', '2023-04-04', 'Kompresor 3 in 1 JM 10 D', '-', 'TU/IV/010/2023\r\nTeknisi : Yasir \r\nJenis Tugas : Setting, Perbaikan\r\nKeluhan Customer : Cooler bocor \r\n\r\nKeterangan Teknisi : \r\n1. Pemasangan cooler yang sudah di repair \r\n2. Penggantian OS\r\n3. Penggantian OF\r\n4. Penggantian AF \r\n5. Penggantian oli komp & flushing sistem \r\nTest running unit normal \r\nLoad : 7.0 Bar \r\nUnload : 8.0 Bar'),
(162, '100', 'Rusmiati', '2023-04-06', 'Water Chiller Emerson Copeland ZR 125 KC', '-', 'TU/IV/011/2023\r\nTeknisi : Kariono \r\nJenis Tugas : Perbaikan\r\nKeluhan Customer : \r\n\r\n\r\nKeterangan Teknisi :\r\n1. Pengelasan kebocoran \r\n2. Ganti filter \r\n3. Vacum\r\nJalan tercapai normal'),
(163, '100', '-', '2023-04-05', 'Water Chiller Emerson ZR 125', '-', 'TU/IV/012/2023\r\nTeknisi : Kariono \r\nJenis Tugas : Cheking \r\nKeluhan Customer : \r\n\r\nKeterangan Teknisi :\r\n1. Ada kebocoran pada Lbo suction \r\n\r\nRekomendasi :\r\n1. Pengelasan titik kebocoran \r\n2. Ganti filter EK 164 1/2\"\r\n3. Ganti freon R22'),
(164, '21', 'Bp. Suryo', '2023-04-05', 'Cold Storage 05 Pk Bawah', '-', 'TU/IV/014/2023\r\nTeknisi : Sabda Bakhtiar\r\nJenis Tugas : Perbaikan \r\nKeluhan Customer : \r\n\r\nKeterangan Teknisi : \r\n1. Mengganti compressor dengan compressor baru dan mengelas pipa tekan (out)\r\n2. Meflashing sistem (kondensor dan evaporator)\r\n3. Mengelas pipa hisap (in)\r\n4. Test press pada sistem dan cek kebocoran pada sistem (tidak ada)\r\n5. Memvacum seluruh sistem \r\n6. Pengisian freon R22\r\n7. Test running (normal)'),
(165, '21', 'Bp. Suryo', '2022-01-05', 'Cold Storage 05 Pk Atas', '-', 'TU/IV/015/2023\r\nTeknisi : Sabda Bakhtiar \r\nJenis Tugas : Perbaikan \r\nKeluhan Customer : Freon habis / Low press\r\n\r\nKeterangan Teknisi : \r\n1. Test press sistem \r\n2. Cek kebocoran (bocor pada bagian dhischange sistem)\r\n3. Pengelasan pada bagian yang bocor \r\n4. Test press ulang pada sistem dan cek kebocoran pada sistem (tidak ada)\r\n5. Vacum sistem \r\n6. Pengisian freon R22\r\n7. Test running unit (normal)'),
(166, '101', 'Bp. Ivan', '2023-04-06', 'Kompresor Screw JM 30 D', '-', 'TU/IV/016/2023\r\nTeknisi : Yasir \r\nJenis Tugas : Setting, cheking \r\nKeluhan Customer : Comissioning unit\r\n\r\nKeterangan Teknisi :\r\n1. Cek connect power komp \r\n2. Cek level oil masih normal \r\n3. Test Running unit normal \r\nLoad : 7.0 Bar \r\nUnload : 8.0 Bar \r\n4. Cek kebocoran oli (tidak ada)'),
(167, '102', 'Bp. Yanan', '2023-04-08', 'Kompresor Screw JM 3 in 1 20 PM High Pressure', '-', 'TU/IV/018/2023\r\nTeknisi : Rusmaji \r\nJenis Tugas : Perbaikan \r\nKeluhan Customer : Air Press Sensor Fault\r\n\r\nKeterangan Teknisi : \r\n1. Ganti sensor air press \r\nSett : air press 01.50 - 01.20 Mpa (tercapai)\r\n\r\nSaran : penambahan auto drain pada tanki'),
(168, '100', 'Bp. Ach. Basori', '2023-04-08', 'Water Chiller Copeland RZ 125 Kc', '-', 'TU/IV/019/2023\r\nTeknisi : Kariono \r\nJenis Tugas : Perbaikan \r\nKeluhan Customer : Ada kebocoran \r\n\r\nKeterangan Teknisi : \r\n1. Pengelasan kebocoran \r\n2. Vacum \r\n3. Isi freon + start \r\nTercapai normal'),
(169, '103', '-', '2023-04-28', 'Water Chiller JM 10 HP', '-', 'NTU/IV/020/2023\r\nTeknisi : Yusuf \r\nJenis Tugas : Setting \r\nKeluhan Customer : Test running \r\n\r\nKeterangan Teknisi : \r\n1. Pasang power \r\n2. Instalasi pipa \r\n3. Test running \r\nWater chiller berjalan normal'),
(170, '58', 'Bp. Zainal', '2023-04-10', 'Kompresor Screw JM 30 D', '-', 'TU/IV/020/2023\r\nTeknisi : Kariono\r\nJenis Tugas : Perawatan \r\nKeluhan Customer : Life time \r\n\r\nKeterangan Teknisi : \r\n1. Penggantian oli jmeagle \r\n2. Penggantian filter oli \r\n3. Penggantian filter udara \r\n4. Penggantian o/a separator \r\n5. Flushing sistem'),
(171, '104', 'Bp. Faisal', '2023-04-10', 'Kompresor Screw JM 100 D', '-', 'TU/IV/021/2023\r\nTeknisi : Kariono \r\nJenis Tugas : Perawatan \r\nKeluhan Customer : Life time \r\n\r\nKeterangan Teknisi :\r\n1. Penggantian oli jmeagle + flushing sistem \r\n2. Filter oli lama di pakai lagi \r\n3. Oil filter menyusul');

-- --------------------------------------------------------

--
-- Struktur dari tabel `suppliers`
--

CREATE TABLE `suppliers` (
  `id_supplier` bigint(20) UNSIGNED NOT NULL,
  `nama_supplier` varchar(255) NOT NULL,
  `no_telp` varchar(255) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `suppliers`
--

INSERT INTO `suppliers` (`id_supplier`, `nama_supplier`, `no_telp`, `alamat`, `status`) VALUES
(1, 'Gudang', NULL, NULL, 2),
(7, 'Future Star', '-', 'Jakarta', 0),
(8, 'PR. Sayap Mas', NULL, 'Malang', 1),
(9, 'PR. Sukun', NULL, 'Malang', 1),
(10, 'PT. Diansari Puri Plastindo', '-', 'Buduran, Sidoarjo', 1),
(11, 'PT. Gemilang Sukses Usaha', NULL, 'Tangerang', 0),
(12, 'PT. Refrigerasi Indo Tama', NULL, 'Surabaya', 0),
(13, 'PT. Tri Sukses United Olindo', NULL, 'Surabaya', 1),
(14, 'Huazong Mesindo', NULL, 'Krian, Sidoarjo', 1),
(15, 'Gudang', '-', 'Gresik', 1),
(16, 'Multi Teknik', NULL, 'Surabaya', 1),
(17, 'Terang Renes', '-', 'Gresik', 1),
(18, 'Morodadi', '-', 'Gresik', 1),
(19, 'Aneka Filter', NULL, 'Bubutan, Surabaya', 0),
(20, 'CV. Cool Indo', NULL, 'Tambak Sari, Surabaya', 0),
(21, 'Kurnia Selaras Abadi', NULL, 'Sidoarjo', 1),
(22, 'PR. Sedulur Jaya', NULL, 'Jember', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `surat_jalans`
--

CREATE TABLE `surat_jalans` (
  `id_surat_jalan` bigint(20) UNSIGNED NOT NULL,
  `nosurat` varchar(255) NOT NULL,
  `kota` varchar(255) NOT NULL,
  `tujuan` varchar(255) NOT NULL,
  `alamattujuan` varchar(255) NOT NULL,
  `penerima` varchar(255) NOT NULL,
  `pengirim` varchar(255) NOT NULL,
  `mengetahui` varchar(255) NOT NULL,
  `dibuatoleh` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `surat_jalan_details`
--

CREATE TABLE `surat_jalan_details` (
  `id_surat_jalan_detail` bigint(20) UNSIGNED NOT NULL,
  `id_surat_jalan` varchar(255) NOT NULL,
  `namabarang` varchar(255) NOT NULL,
  `jumlah` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `role` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `phone`, `location`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@admin.com', '$2y$10$.9CA.6Cl8axMunpc6db5Wu/8A2zpDPgN3sHC5.lHMzgdndOs30UFe', NULL, NULL, 'admin', NULL, '2023-07-20 02:52:02', '2023-07-20 02:52:02'),
(2, 'user', 'user@user.com', '$2y$10$/tzLlv5gQOUKTJpsOIGCG.B10gXlFKJepUHThOH1JqZJVKheLihXS', NULL, NULL, 'user', NULL, '2023-07-20 02:52:02', '2023-07-20 02:52:02'),
(3, 'ppn', 'ppn@user.com', '$2y$10$aRMzgtb.MUCy4hFxa0bW4uZFwoaCJQb77NTdJOiRjm5lkUF85IrCG', NULL, NULL, 'ppn', NULL, '2023-07-20 02:52:02', '2023-07-20 02:52:02'),
(4, 'non ppn', 'non-ppn@user.com', '$2y$10$m7IeXkNZXACLwY2.48t15uST/UwvTAJcELu9.JZUo8jYwBUShsWgi', NULL, NULL, 'non_ppn', NULL, '2023-07-20 02:52:02', '2023-07-20 02:52:02');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `category_products`
--
ALTER TABLE `category_products`
  ADD PRIMARY KEY (`id_kategori_produk`);

--
-- Indeks untuk tabel `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id_pembeli`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `incoming_products`
--
ALTER TABLE `incoming_products`
  ADD PRIMARY KEY (`id_produk_masuk`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `out_products`
--
ALTER TABLE `out_products`
  ADD PRIMARY KEY (`id_produk_keluar`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `pivot_incoming_product`
--
ALTER TABLE `pivot_incoming_product`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pivot_laporan`
--
ALTER TABLE `pivot_laporan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pivot_out_product`
--
ALTER TABLE `pivot_out_product`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pivot_sistem_customer_details`
--
ALTER TABLE `pivot_sistem_customer_details`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indeks untuk tabel `record_service_customers`
--
ALTER TABLE `record_service_customers`
  ADD PRIMARY KEY (`id_record`);

--
-- Indeks untuk tabel `record_service_customer_details`
--
ALTER TABLE `record_service_customer_details`
  ADD PRIMARY KEY (`id_record_details`);

--
-- Indeks untuk tabel `requests`
--
ALTER TABLE `requests`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `sistem_customers`
--
ALTER TABLE `sistem_customers`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `sistem_customer_details`
--
ALTER TABLE `sistem_customer_details`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`id_supplier`);

--
-- Indeks untuk tabel `surat_jalans`
--
ALTER TABLE `surat_jalans`
  ADD PRIMARY KEY (`id_surat_jalan`);

--
-- Indeks untuk tabel `surat_jalan_details`
--
ALTER TABLE `surat_jalan_details`
  ADD PRIMARY KEY (`id_surat_jalan_detail`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `category_products`
--
ALTER TABLE `category_products`
  MODIFY `id_kategori_produk` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `customers`
--
ALTER TABLE `customers`
  MODIFY `id_pembeli` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `incoming_products`
--
ALTER TABLE `incoming_products`
  MODIFY `id_produk_masuk` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT untuk tabel `out_products`
--
ALTER TABLE `out_products`
  MODIFY `id_produk_keluar` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pivot_incoming_product`
--
ALTER TABLE `pivot_incoming_product`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT untuk tabel `pivot_laporan`
--
ALTER TABLE `pivot_laporan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;

--
-- AUTO_INCREMENT untuk tabel `pivot_out_product`
--
ALTER TABLE `pivot_out_product`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123;

--
-- AUTO_INCREMENT untuk tabel `pivot_sistem_customer_details`
--
ALTER TABLE `pivot_sistem_customer_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=177;

--
-- AUTO_INCREMENT untuk tabel `products`
--
ALTER TABLE `products`
  MODIFY `id_produk` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=328;

--
-- AUTO_INCREMENT untuk tabel `record_service_customers`
--
ALTER TABLE `record_service_customers`
  MODIFY `id_record` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=148;

--
-- AUTO_INCREMENT untuk tabel `record_service_customer_details`
--
ALTER TABLE `record_service_customer_details`
  MODIFY `id_record_details` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `requests`
--
ALTER TABLE `requests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `sistem_customers`
--
ALTER TABLE `sistem_customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- AUTO_INCREMENT untuk tabel `sistem_customer_details`
--
ALTER TABLE `sistem_customer_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=172;

--
-- AUTO_INCREMENT untuk tabel `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id_supplier` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `surat_jalans`
--
ALTER TABLE `surat_jalans`
  MODIFY `id_surat_jalan` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `surat_jalan_details`
--
ALTER TABLE `surat_jalan_details`
  MODIFY `id_surat_jalan_detail` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
