-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 22 Jun 2020 pada 10.46
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.3.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `alims_db`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `berita`
--

CREATE TABLE `berita` (
  `berita_id` int(10) NOT NULL,
  `judul` varchar(128) NOT NULL,
  `tanggal` datetime NOT NULL,
  `isi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `daftar_aap`
--

CREATE TABLE `daftar_aap` (
  `aap_id` varchar(16) NOT NULL,
  `aap_nama` varchar(64) NOT NULL,
  `aap_anggaran` varchar(128) NOT NULL,
  `aap_letak` varchar(16) NOT NULL,
  `aap_merek` varchar(64) NOT NULL,
  `aap_tipe` varchar(128) NOT NULL,
  `aap_spesifikasi` text NOT NULL,
  `aap_tanggal` date NOT NULL,
  `aap_noinv` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `daftar_aap`
--

INSERT INTO `daftar_aap` (`aap_id`, `aap_nama`, `aap_anggaran`, `aap_letak`, `aap_merek`, `aap_tipe`, `aap_spesifikasi`, `aap_tanggal`, `aap_noinv`) VALUES
('AAP00001', 'Mikroskop', 'Hibah LLDIKTI VII tahun 2019', 'LAB001', 'Boeco', 'BC-0929', 'Perbesaran 5, 10, 40, 100', '2019-06-15', 'AFMSMS/2019/HIBAH-LLDIKTI-VII/YAZUMI/YX-019029/001'),
('AAP00002', 'Mikroskop', 'Hibah LLDIKTI VII tahun 2019', 'LAB001', 'BC-0929', 'BC-0929', 'Perbesaran 5, 10, 40, 100', '2019-06-15', 'AFMSMS/2019/HIBAH-LLDIKTI-VII/YAZUMI/YX-019029/001'),
('AAP00003', 'Mikroskop', 'Hibah LLDIKTI VII tahun 2019', 'LAB001', 'Boeco', 'BC-0920', '', '2020-06-09', 'asdasd'),
('AAP00004', 'Mikroskop', 'Hibah LLDIKTI VII tahun 2019', 'LAB001', 'Boeco', 'BC-0920', '', '2020-06-09', 'asdasd');

-- --------------------------------------------------------

--
-- Struktur dari tabel `daftar_dsn`
--

CREATE TABLE `daftar_dsn` (
  `dsn_id` varchar(16) NOT NULL,
  `dsn_nipd` varchar(32) NOT NULL,
  `dsn_nama` varchar(128) NOT NULL,
  `dsn_gelar` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `daftar_dsn`
--

INSERT INTO `daftar_dsn` (`dsn_id`, `dsn_nipd`, `dsn_nama`, `dsn_gelar`) VALUES
('DSN00001', 'asdasd', 'asdasd', 'gaada');

-- --------------------------------------------------------

--
-- Struktur dari tabel `daftar_lab`
--

CREATE TABLE `daftar_lab` (
  `lab_id` varchar(16) NOT NULL,
  `lab_nama` varchar(32) NOT NULL,
  `lab_lokasi` varchar(32) NOT NULL,
  `lab_laboran` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `daftar_lab`
--

INSERT INTO `daftar_lab` (`lab_id`, `lab_nama`, `lab_lokasi`, `lab_laboran`) VALUES
('LAB001', 'Biologi Farmasi', 'Gedung B No. 107', 'thisham_');

-- --------------------------------------------------------

--
-- Struktur dari tabel `daftar_mhs`
--

CREATE TABLE `daftar_mhs` (
  `nim` varchar(10) NOT NULL,
  `nama` varchar(64) NOT NULL,
  `prodi` varchar(8) NOT NULL,
  `angkatan` int(4) NOT NULL,
  `kelas` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `daftar_mhs`
--

INSERT INTO `daftar_mhs` (`nim`, `nama`, `prodi`, `angkatan`, `kelas`) VALUES
('123123123', 'asdasdasd', '081', 1231, 'asdasd'),
('19081091', 'Adriaan Lukistra', '081', 2019, 'D-4'),
('19081092', 'Hamdan Yuwafi Mastu Wijaya', '081', 2019, 'D-4');

-- --------------------------------------------------------

--
-- Struktur dari tabel `daftar_mtk`
--

CREATE TABLE `daftar_mtk` (
  `mtk_id` varchar(16) NOT NULL,
  `mtk_kode` varchar(16) NOT NULL,
  `mtk_nama` varchar(64) NOT NULL,
  `mtk_akronim` varchar(16) NOT NULL,
  `mtk_periode` varchar(16) NOT NULL,
  `mtk_dosen` varchar(16) NOT NULL,
  `mtk_buka` datetime NOT NULL,
  `mtk_tutup` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `daftar_mtk`
--

INSERT INTO `daftar_mtk` (`mtk_id`, `mtk_kode`, `mtk_nama`, `mtk_akronim`, `mtk_periode`, `mtk_dosen`, `mtk_buka`, `mtk_tutup`) VALUES
('MTK202001', 'FRP8910', 'asdasd', 'ASDASD', '2020-Genap', 'DSN00001', '2020-06-16 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `daftar_prodi`
--

CREATE TABLE `daftar_prodi` (
  `kode` varchar(8) NOT NULL,
  `prodi` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `daftar_prodi`
--

INSERT INTO `daftar_prodi` (`kode`, `prodi`) VALUES
('081', 'S1 - Informatika');

-- --------------------------------------------------------

--
-- Struktur dari tabel `guna_lab`
--

CREATE TABLE `guna_lab` (
  `gnlab_id` varchar(16) NOT NULL,
  `gnlab_lab` varchar(16) NOT NULL,
  `gnlab_mhs` varchar(16) NOT NULL,
  `gnlab_dsn` varchar(16) NOT NULL,
  `gnlab_mtk` varchar(16) NOT NULL,
  `gnlab_plan` datetime NOT NULL,
  `gnlab_awal` datetime NOT NULL,
  `gnlab_akhir` datetime NOT NULL,
  `gnlab_sign` datetime NOT NULL,
  `gnlab_lbrn` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `guna_lab`
--

INSERT INTO `guna_lab` (`gnlab_id`, `gnlab_lab`, `gnlab_mhs`, `gnlab_dsn`, `gnlab_mtk`, `gnlab_plan`, `gnlab_awal`, `gnlab_akhir`, `gnlab_sign`, `gnlab_lbrn`) VALUES
('GLB20173001', 'LAB001', '19081092', 'DSN00001', 'MTK202001', '2020-06-19 19:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2020-06-22 12:23:17', 'thisham_');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `user_id` varchar(32) NOT NULL,
  `password` varchar(64) NOT NULL,
  `nama` varchar(64) NOT NULL,
  `gender` varchar(16) NOT NULL,
  `email` varchar(128) NOT NULL,
  `hp` varchar(16) NOT NULL,
  `bio` text NOT NULL,
  `hak_akses` varchar(16) NOT NULL,
  `status` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`user_id`, `password`, `nama`, `gender`, `email`, `hp`, `bio`, `hak_akses`, `status`) VALUES
('thisham_', 'Z2FrdXNlaTIx', 'Hamdan Yuwafi Mastu Wijaya', '', 'yuwafi.hamdan365@gmail.com', '0821-3171-6270', '', 'Admin', 'Aktif');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`berita_id`);

--
-- Indeks untuk tabel `daftar_aap`
--
ALTER TABLE `daftar_aap`
  ADD PRIMARY KEY (`aap_id`),
  ADD KEY `aap_letak` (`aap_letak`);

--
-- Indeks untuk tabel `daftar_dsn`
--
ALTER TABLE `daftar_dsn`
  ADD PRIMARY KEY (`dsn_id`);

--
-- Indeks untuk tabel `daftar_lab`
--
ALTER TABLE `daftar_lab`
  ADD PRIMARY KEY (`lab_id`),
  ADD KEY `lab_laboran` (`lab_laboran`);

--
-- Indeks untuk tabel `daftar_mhs`
--
ALTER TABLE `daftar_mhs`
  ADD PRIMARY KEY (`nim`),
  ADD KEY `prodi` (`prodi`);

--
-- Indeks untuk tabel `daftar_mtk`
--
ALTER TABLE `daftar_mtk`
  ADD PRIMARY KEY (`mtk_id`),
  ADD KEY `mtk_dosen` (`mtk_dosen`);

--
-- Indeks untuk tabel `daftar_prodi`
--
ALTER TABLE `daftar_prodi`
  ADD PRIMARY KEY (`kode`);

--
-- Indeks untuk tabel `guna_lab`
--
ALTER TABLE `guna_lab`
  ADD PRIMARY KEY (`gnlab_id`),
  ADD KEY `gnlab_lab` (`gnlab_lab`),
  ADD KEY `gnlab_mhs` (`gnlab_mhs`),
  ADD KEY `gnlab_dsn` (`gnlab_dsn`),
  ADD KEY `gnlab_mtk` (`gnlab_mtk`),
  ADD KEY `gnlab_lbrn` (`gnlab_lbrn`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `daftar_aap`
--
ALTER TABLE `daftar_aap`
  ADD CONSTRAINT `daftar_aap_ibfk_1` FOREIGN KEY (`aap_letak`) REFERENCES `daftar_lab` (`lab_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `daftar_lab`
--
ALTER TABLE `daftar_lab`
  ADD CONSTRAINT `daftar_lab_ibfk_1` FOREIGN KEY (`lab_laboran`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `daftar_mhs`
--
ALTER TABLE `daftar_mhs`
  ADD CONSTRAINT `daftar_mhs_ibfk_1` FOREIGN KEY (`prodi`) REFERENCES `daftar_prodi` (`kode`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `daftar_mtk`
--
ALTER TABLE `daftar_mtk`
  ADD CONSTRAINT `daftar_mtk_ibfk_1` FOREIGN KEY (`mtk_dosen`) REFERENCES `daftar_dsn` (`dsn_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `guna_lab`
--
ALTER TABLE `guna_lab`
  ADD CONSTRAINT `guna_lab_ibfk_1` FOREIGN KEY (`gnlab_lab`) REFERENCES `daftar_lab` (`lab_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `guna_lab_ibfk_2` FOREIGN KEY (`gnlab_mhs`) REFERENCES `daftar_mhs` (`nim`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `guna_lab_ibfk_3` FOREIGN KEY (`gnlab_dsn`) REFERENCES `daftar_dsn` (`dsn_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `guna_lab_ibfk_4` FOREIGN KEY (`gnlab_mtk`) REFERENCES `daftar_mtk` (`mtk_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `guna_lab_ibfk_5` FOREIGN KEY (`gnlab_lbrn`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
