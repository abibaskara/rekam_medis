-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 14 Jun 2022 pada 03.50
-- Versi server: 5.7.33
-- Versi PHP: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rekam_medis`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `departement`
--

CREATE TABLE `departement` (
  `id_departement` int(11) NOT NULL,
  `divisi` varchar(255) NOT NULL,
  `nama_departement` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `departement`
--

INSERT INTO `departement` (`id_departement`, `divisi`, `nama_departement`) VALUES
(1, 'BISCUIT', 'service assurance'),
(3, 'WAFER', 'test');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jabatan`
--

CREATE TABLE `jabatan` (
  `id_jabatan` int(11) NOT NULL,
  `nama_jabatan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jabatan`
--

INSERT INTO `jabatan` (`id_jabatan`, `nama_jabatan`) VALUES
(6, 'Perawat'),
(7, 'Dokter Gigi'),
(8, 'Dokter Umum');

-- --------------------------------------------------------

--
-- Struktur dari tabel `karyawan`
--

CREATE TABLE `karyawan` (
  `id_karyawan` int(11) NOT NULL,
  `nik` varchar(255) NOT NULL,
  `nama_karyawan` varchar(255) NOT NULL,
  `id_jabatan` int(11) NOT NULL,
  `id_departement` int(11) NOT NULL,
  `jk` varchar(255) NOT NULL,
  `tempat_lahir` varchar(255) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `alamat` text NOT NULL,
  `no_hp` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `karyawan`
--

INSERT INTO `karyawan` (`id_karyawan`, `nik`, `nama_karyawan`, `id_jabatan`, `id_departement`, `jk`, `tempat_lahir`, `tgl_lahir`, `alamat`, `no_hp`) VALUES
(2, '0009224322', 'Abi Baskara Atthallah', 8, 1, 'Pria', 'Bandung', '1999-09-17', 'Villa Mutiara Lido Blok A4 No18', '082299915127'),
(3, '0009123422', 'Dodi', 6, 1, 'Pria', 'Bandung', '2022-06-08', 'Jl. Kober 1234', '08123123122112');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori_obat`
--

CREATE TABLE `kategori_obat` (
  `id_kategori_obat` int(11) NOT NULL,
  `nama_kategori` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kategori_obat`
--

INSERT INTO `kategori_obat` (`id_kategori_obat`, `nama_kategori`) VALUES
(1, 'Sirup'),
(2, 'Tablet');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kunjungan_berobat`
--

CREATE TABLE `kunjungan_berobat` (
  `id_kunjungan_berobat` int(11) NOT NULL,
  `id_karyawan` int(11) NOT NULL,
  `nik` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `keluhan` varchar(255) NOT NULL,
  `diagnosa` varchar(255) NOT NULL,
  `id_obat_pasien` int(11) NOT NULL,
  `tgl` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kunjungan_berobat`
--

INSERT INTO `kunjungan_berobat` (`id_kunjungan_berobat`, `id_karyawan`, `nik`, `nama`, `keluhan`, `diagnosa`, `id_obat_pasien`, `tgl`) VALUES
(1, 2, '0009224322', 'Abi Baskara Atthallah', 'Sakit Perut', 'Diare', 1, '2022-06-12');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mcu`
--

CREATE TABLE `mcu` (
  `id_mcu` int(11) NOT NULL,
  `id_karyawan` int(11) NOT NULL,
  `fasilitator_mcu` varchar(255) NOT NULL,
  `waktu_mcu` date NOT NULL,
  `tekanan_darah` varchar(255) NOT NULL,
  `hasil_pemeriksaan_dokter` varchar(255) NOT NULL,
  `hasil_lab_urin` varchar(255) NOT NULL,
  `hasil_rontgen_thorak` varchar(255) NOT NULL,
  `hasil_pemeriksaan_mata` varchar(255) NOT NULL,
  `hasil_pemeriksaan_pendengaran` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `obat`
--

CREATE TABLE `obat` (
  `id_obat` int(11) NOT NULL,
  `id_kategori_obat` int(11) NOT NULL,
  `nama_obat` varchar(255) NOT NULL,
  `kegunaan_obat` varchar(255) NOT NULL,
  `qty` int(11) NOT NULL,
  `satuan` varchar(255) NOT NULL,
  `expired_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `obat`
--

INSERT INTO `obat` (`id_obat`, `id_kategori_obat`, `nama_obat`, `kegunaan_obat`, `qty`, `satuan`, `expired_date`) VALUES
(2, 2, 'paracetamol', 'asdlandlasndklna lkdnaskldnlkasndl anlksdnkalsndkl nakldnaskndl kanskdlnaslkdn kandka ns', 2, 'Strip', '2022-06-30'),
(3, 2, 'Diapet', 'Mencegah Melilit', 0, 'Strip', '2022-06-30');

-- --------------------------------------------------------

--
-- Struktur dari tabel `obat_pasien`
--

CREATE TABLE `obat_pasien` (
  `id_obat_pasien` int(11) NOT NULL,
  `id_kunjungan_berobat` int(11) NOT NULL,
  `id_obat` int(11) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `obat_pasien`
--

INSERT INTO `obat_pasien` (`id_obat_pasien`, `id_kunjungan_berobat`, `id_obat`, `qty`) VALUES
(1, 1, 3, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `skd`
--

CREATE TABLE `skd` (
  `id_skd` int(11) NOT NULL,
  `id_karyawan` int(11) NOT NULL,
  `tanggal_mulai_skd` date NOT NULL,
  `tanggal_akhir_skd` date NOT NULL,
  `diagnosa_penyakit` varchar(255) NOT NULL,
  `tempat_berobat` varchar(255) NOT NULL,
  `created_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `skd`
--

INSERT INTO `skd` (`id_skd`, `id_karyawan`, `tanggal_mulai_skd`, `tanggal_akhir_skd`, `diagnosa_penyakit`, `tempat_berobat`, `created_at`) VALUES
(1, 3, '2022-06-13', '2022-06-30', 'Diare', 'Klinik AA', '2022-06-13'),
(2, 2, '2022-06-13', '2022-06-14', 'Pusing', 'Klink Deden', '2022-06-13');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `id_karyawan` int(11) NOT NULL,
  `role` enum('Admin','HO') NOT NULL,
  `email` varchar(255) NOT NULL,
  `no_telp` varchar(255) NOT NULL,
  `foto` varchar(255) DEFAULT 'default.png',
  `password` varchar(255) NOT NULL,
  `is_active` enum('1','2') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `id_karyawan`, `role`, `email`, `no_telp`, `foto`, `password`, `is_active`) VALUES
(1, 2, 'Admin', 'admin@gmail.com', '0812345678221', '29fe291b14c60bf0bfa26446f7b65466.png', '$2y$10$USnTGOmttsv84ZRHK/gGCeEZNxV1A1kdX3eHjm.avQ/Yyzq5Y0spe', '1'),
(4, 3, 'HO', 'ho@gmail.com', '08123456789', 'a1c345bd5373cc9ce9066f3b0ae3d182.jpg', '$2y$10$USnTGOmttsv84ZRHK/gGCeEZNxV1A1kdX3eHjm.avQ/Yyzq5Y0spe', '1');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `departement`
--
ALTER TABLE `departement`
  ADD PRIMARY KEY (`id_departement`);

--
-- Indeks untuk tabel `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`id_jabatan`);

--
-- Indeks untuk tabel `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`id_karyawan`);

--
-- Indeks untuk tabel `kategori_obat`
--
ALTER TABLE `kategori_obat`
  ADD PRIMARY KEY (`id_kategori_obat`);

--
-- Indeks untuk tabel `kunjungan_berobat`
--
ALTER TABLE `kunjungan_berobat`
  ADD PRIMARY KEY (`id_kunjungan_berobat`);

--
-- Indeks untuk tabel `mcu`
--
ALTER TABLE `mcu`
  ADD PRIMARY KEY (`id_mcu`);

--
-- Indeks untuk tabel `obat`
--
ALTER TABLE `obat`
  ADD PRIMARY KEY (`id_obat`);

--
-- Indeks untuk tabel `obat_pasien`
--
ALTER TABLE `obat_pasien`
  ADD PRIMARY KEY (`id_obat_pasien`);

--
-- Indeks untuk tabel `skd`
--
ALTER TABLE `skd`
  ADD PRIMARY KEY (`id_skd`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `departement`
--
ALTER TABLE `departement`
  MODIFY `id_departement` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `id_jabatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `karyawan`
--
ALTER TABLE `karyawan`
  MODIFY `id_karyawan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `kategori_obat`
--
ALTER TABLE `kategori_obat`
  MODIFY `id_kategori_obat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `kunjungan_berobat`
--
ALTER TABLE `kunjungan_berobat`
  MODIFY `id_kunjungan_berobat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `mcu`
--
ALTER TABLE `mcu`
  MODIFY `id_mcu` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `obat`
--
ALTER TABLE `obat`
  MODIFY `id_obat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `obat_pasien`
--
ALTER TABLE `obat_pasien`
  MODIFY `id_obat_pasien` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `skd`
--
ALTER TABLE `skd`
  MODIFY `id_skd` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
