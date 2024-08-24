-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 04 Jul 2022 pada 16.57
-- Versi server: 10.4.22-MariaDB
-- Versi PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_laboratorium`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `kerusakan`
--

CREATE TABLE `kerusakan` (
  `idalat` varchar(10) NOT NULL,
  `alat` varchar(20) NOT NULL,
  `detail` varchar(100) NOT NULL,
  `jumlah` varchar(15) NOT NULL,
  `tgl_lapor` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kerusakan`
--

INSERT INTO `kerusakan` (`idalat`, `alat`, `detail`, `jumlah`, `tgl_lapor`) VALUES
('', 'Camera', 'Tombol i,l,o,v,e,y,o,u rusak', '1', '29 June, 2022');

-- --------------------------------------------------------

--
-- Struktur dari tabel `peminjaman`
--

CREATE TABLE `peminjaman` (
  `nim` varchar(15) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `idalat` varchar(10) NOT NULL,
  `alat` varchar(20) NOT NULL,
  `jumlah` varchar(15) NOT NULL,
  `tgl_pinjam` varchar(20) NOT NULL,
  `tgl_kembali` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `peminjaman`
--

INSERT INTO `peminjaman` (`nim`, `nama`, `no_hp`, `idalat`, `alat`, `jumlah`, `tgl_pinjam`, `tgl_kembali`) VALUES
('3312101067', 'Irsyad Nafi Alif Perdana', '087818709571', '1', 'Headset', '1', '28 June, 2022', '28 June, 2022'),
('3312101084', 'Veve Karisa', '22222333333', 'cam1', 'Camera', '5', '28 June, 2022', '29 June, 2022'),
('3312101022', 'Budi Prayoga', '2311', 'co6', 'Clip On', '1', '4 July, 2022', '4 July, 2022'),
('3312101022', 'Budi Prayoga', '2311', 'co6', 'Clip On', '1', '4 July, 2022', '4 July, 2022');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengembalian`
--

CREATE TABLE `pengembalian` (
  `nim` varchar(15) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `idalat` varchar(10) NOT NULL,
  `alat` varchar(20) NOT NULL,
  `jumlah` varchar(20) NOT NULL,
  `tgl_pinjam` varchar(20) NOT NULL,
  `tgl_kembali` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pengembalian`
--

INSERT INTO `pengembalian` (`nim`, `nama`, `no_hp`, `idalat`, `alat`, `jumlah`, `tgl_pinjam`, `tgl_kembali`) VALUES
('3312101022', 'Budi Prayoga', '0878237777', 'co6', 'Clip On', '1', '4 July, 2022', '4 July, 2022');

-- --------------------------------------------------------

--
-- Struktur dari tabel `stokbrg`
--

CREATE TABLE `stokbrg` (
  `idalat` varchar(10) NOT NULL,
  `alat` varchar(20) NOT NULL,
  `jumlah` varchar(15) NOT NULL,
  `status` enum('Tersedia','Tidak Tersedia') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `stokbrg`
--

INSERT INTO `stokbrg` (`idalat`, `alat`, `jumlah`, `status`) VALUES
('cam1', 'Camera', '25', 'Tersedia'),
('co6', 'Clip On', '30', 'Tersedia'),
('dro7', 'Drone', '15', 'Tersedia'),
('light4', 'Lighting', '15', 'Tersedia'),
('proy3', 'Proyektor', '30', 'Tersedia'),
('ss2', 'Sound System', '30', 'Tersedia'),
('tdl8', 'Theodolite', '10', 'Tersedia'),
('tlst9', 'Total Station', '10', 'Tersedia'),
('trip5', 'Tripod', '0', 'Tidak Tersedia');

-- --------------------------------------------------------

--
-- Struktur dari tabel `userlog`
--

CREATE TABLE `userlog` (
  `id` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` enum('Mahasiswa','Laboran') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `userlog`
--

INSERT INTO `userlog` (`id`, `nama`, `username`, `password`, `level`) VALUES
(1, 'Irsyad Nafi', 'irsyad', '07c856678f2551cc8aacef2efac386f5', 'Laboran'),
(2, 'Veve Karisa', 'veve', '6f12d5164b5f02f813af60bc0efc971c', 'Mahasiswa');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `kerusakan`
--
ALTER TABLE `kerusakan`
  ADD KEY `idalat` (`idalat`);

--
-- Indeks untuk tabel `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD KEY `idalat` (`idalat`);

--
-- Indeks untuk tabel `stokbrg`
--
ALTER TABLE `stokbrg`
  ADD PRIMARY KEY (`idalat`);

--
-- Indeks untuk tabel `userlog`
--
ALTER TABLE `userlog`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `userlog`
--
ALTER TABLE `userlog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
