-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 23 Bulan Mei 2023 pada 16.08
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_dosen_tp3`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `bidang`
--

CREATE TABLE `bidang` (
  `bidang_id` int(11) NOT NULL,
  `bidang_nama` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `bidang`
--

INSERT INTO `bidang` (`bidang_id`, `bidang_nama`) VALUES
(1, 'Sistem Komputer'),
(2, 'Pengembangan Perangkat Lunak'),
(3, 'Kecerdasan Buatan'),
(4, 'Komputasi Paralel dan Distribusi'),
(5, 'Basis Data dan Sistem Informasi'),
(6, 'Keamanan Komputer'),
(7, 'Grafika Komputer dan Realitas Virtual'),
(8, 'Komputasi Bergerak'),
(9, 'Bioinformatika'),
(10, 'Komputasi dalam Ilmu Sosial');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dosen`
--

CREATE TABLE `dosen` (
  `dosen_id` int(11) NOT NULL,
  `dosen_foto` varchar(255) DEFAULT NULL,
  `dosen_nip` varchar(25) DEFAULT NULL,
  `dosen_nama` varchar(100) DEFAULT NULL,
  `dosen_email` varchar(50) NOT NULL,
  `bidang_id` int(11) DEFAULT NULL,
  `jabatan_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `dosen`
--

INSERT INTO `dosen` (`dosen_id`, `dosen_foto`, `dosen_nip`, `dosen_nama`, `dosen_email`, `bidang_id`, `jabatan_id`) VALUES
(1, '1.jpeg', '552417289', 'Akbar, S.T.', 'akbar@gmail.com', 1, 2),
(2, '2.jpeg', '6627192881', 'Muhammad, S.T., M.Kom.', 'muhammad@gmail.com', 3, 4),
(3, '3.jpeg', '9918256199', 'Iqbal, M.Kom.', 'iqbal@gmail.com', 5, 6),
(4, '4.jpeg', '9929387651', 'Prof. Dr. Sandi, M.T.', 'sandi@gmail.com', 7, 8),
(5, '5.jpeg ', '8812231454', 'Prof. Dr. Dani, S.T., M.Kom.', 'dani@gmail.com', 9, 10),
(6, '7.jpeg', '0112266154', 'Prof. Dr. Ghifari M.T.', 'ghifari@gmail.com', 2, 9);

-- --------------------------------------------------------

--
-- Struktur dari tabel `jabatan`
--

CREATE TABLE `jabatan` (
  `jabatan_id` int(11) NOT NULL,
  `jabatan_nama` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `jabatan`
--

INSERT INTO `jabatan` (`jabatan_id`, `jabatan_nama`) VALUES
(1, 'Asisten Ahli'),
(2, 'Peneliti Muda'),
(3, 'Peneliti Pertama'),
(4, 'Peneliti Madya'),
(5, 'Peneliti Utama'),
(6, 'Lektor'),
(7, 'Lektor Kepala'),
(8, 'Guru Besar'),
(9, 'Profesor'),
(10, 'Peneliti Ahli');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `bidang`
--
ALTER TABLE `bidang`
  ADD PRIMARY KEY (`bidang_id`);

--
-- Indeks untuk tabel `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`dosen_id`),
  ADD KEY `bidang_id` (`bidang_id`),
  ADD KEY `jabatan_id` (`jabatan_id`);

--
-- Indeks untuk tabel `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`jabatan_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `bidang`
--
ALTER TABLE `bidang`
  MODIFY `bidang_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `dosen`
--
ALTER TABLE `dosen`
  MODIFY `dosen_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `jabatan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `dosen`
--
ALTER TABLE `dosen`
  ADD CONSTRAINT `dosen_ibfk_1` FOREIGN KEY (`bidang_id`) REFERENCES `bidang` (`bidang_id`),
  ADD CONSTRAINT `dosen_ibfk_2` FOREIGN KEY (`jabatan_id`) REFERENCES `jabatan` (`jabatan_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
