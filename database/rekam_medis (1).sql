-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 17, 2022 at 02:37 AM
-- Server version: 5.7.33
-- PHP Version: 7.4.19

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
-- Table structure for table `departement`
--

CREATE TABLE `departement` (
  `id_departement` int(11) NOT NULL,
  `divisi` varchar(20) NOT NULL,
  `nama_departement` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `departement`
--

INSERT INTO `departement` (`id_departement`, `divisi`, `nama_departement`) VALUES
(1, 'BISCUIT', 'IT Programmer');

-- --------------------------------------------------------

--
-- Table structure for table `jabatan`
--

CREATE TABLE `jabatan` (
  `id_jabatan` int(11) NOT NULL,
  `nama_jabatan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jabatan`
--

INSERT INTO `jabatan` (`id_jabatan`, `nama_jabatan`) VALUES
(1, 'Web Development');

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE `karyawan` (
  `id_karyawan` int(11) NOT NULL,
  `nik` varchar(10) NOT NULL,
  `nama_karyawan` varchar(50) NOT NULL,
  `id_jabatan` int(11) NOT NULL,
  `id_departement` int(11) NOT NULL,
  `jk` enum('Pria','Wanita') NOT NULL,
  `tempat_lahir` varchar(30) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `alamat` text NOT NULL,
  `no_hp` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `karyawan`
--

INSERT INTO `karyawan` (`id_karyawan`, `nik`, `nama_karyawan`, `id_jabatan`, `id_departement`, `jk`, `tempat_lahir`, `tgl_lahir`, `alamat`, `no_hp`) VALUES
(1, '0009224322', 'Admin', 1, 1, 'Pria', 'Bandung', '2022-07-25', 'Bogor', '082299915127'),
(2, '000922433', 'Dept. Head HSE', 1, 1, 'Pria', 'Bandung', '2022-07-25', 'Bogor', '09123102938912');

-- --------------------------------------------------------

--
-- Table structure for table `kategori_obat`
--

CREATE TABLE `kategori_obat` (
  `id_kategori_obat` int(11) NOT NULL,
  `nama_kategori` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori_obat`
--

INSERT INTO `kategori_obat` (`id_kategori_obat`, `nama_kategori`) VALUES
(1, 'Kapsul');

-- --------------------------------------------------------

--
-- Table structure for table `kunjungan_berobat`
--

CREATE TABLE `kunjungan_berobat` (
  `id_kunjungan_berobat` int(11) NOT NULL,
  `id_karyawan` int(11) NOT NULL,
  `nik` varchar(10) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `keluhan` varchar(50) NOT NULL,
  `diagnosa` varchar(20) NOT NULL,
  `id_obat_pasien` int(11) NOT NULL,
  `tgl` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kunjungan_berobat`
--

INSERT INTO `kunjungan_berobat` (`id_kunjungan_berobat`, `id_karyawan`, `nik`, `nama`, `keluhan`, `diagnosa`, `id_obat_pasien`, `tgl`) VALUES
(1, 1, '0009224322', 'Admin', 'Batuk', 'Radang', 1, '2022-09-24');

-- --------------------------------------------------------

--
-- Table structure for table `mcu`
--

CREATE TABLE `mcu` (
  `id_mcu` int(11) NOT NULL,
  `id_karyawan` int(11) NOT NULL,
  `fasilitator_mcu` varchar(30) NOT NULL,
  `waktu_mcu` date NOT NULL,
  `tekanan_darah` varchar(20) NOT NULL,
  `hasil_pemeriksaan_dokter` varchar(50) NOT NULL,
  `hasil_lab_urin` varchar(50) NOT NULL,
  `hasil_rontgen_thorak` varchar(50) NOT NULL,
  `hasil_pemeriksaan_mata` varchar(50) NOT NULL,
  `hasil_pemeriksaan_pendengaran` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `obat`
--

CREATE TABLE `obat` (
  `id_obat` int(11) NOT NULL,
  `id_kategori_obat` int(11) NOT NULL,
  `nama_obat` varchar(30) NOT NULL,
  `kegunaan_obat` varchar(30) NOT NULL,
  `qty` int(11) NOT NULL,
  `satuan` varchar(10) NOT NULL,
  `expired_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `obat`
--

INSERT INTO `obat` (`id_obat`, `id_kategori_obat`, `nama_obat`, `kegunaan_obat`, `qty`, `satuan`, `expired_date`) VALUES
(1, 1, 'obat batuk', 'meredakan batuk', 3, 'Strip', '2022-09-30');

-- --------------------------------------------------------

--
-- Table structure for table `obat_pasien`
--

CREATE TABLE `obat_pasien` (
  `id_obat_pasien` int(11) NOT NULL,
  `id_kunjungan_berobat` int(11) NOT NULL,
  `id_obat` int(11) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `obat_pasien`
--

INSERT INTO `obat_pasien` (`id_obat_pasien`, `id_kunjungan_berobat`, `id_obat`, `qty`) VALUES
(1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `skd`
--

CREATE TABLE `skd` (
  `id_skd` int(11) NOT NULL,
  `id_karyawan` int(11) NOT NULL,
  `tanggal_mulai_skd` date NOT NULL,
  `tanggal_akhir_skd` date NOT NULL,
  `diagnosa_penyakit` varchar(30) NOT NULL,
  `tempat_berobat` varchar(30) NOT NULL,
  `created_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `id_karyawan` int(11) NOT NULL,
  `role` enum('Admin','HO') NOT NULL,
  `email` varchar(30) NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `foto` varchar(50) DEFAULT 'default.png',
  `password` varchar(255) NOT NULL,
  `is_active` enum('1','2') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `id_karyawan`, `role`, `email`, `no_telp`, `foto`, `password`, `is_active`) VALUES
(1, 1, 'Admin', 'admin@gmail.com', '082299915127', 'default.png', '$2y$10$USnTGOmttsv84ZRHK/gGCeEZNxV1A1kdX3eHjm.avQ/Yyzq5Y0spe', '1'),
(2, 2, 'HO', 'ho@gmail.com', '09213120932', 'default.png', '$2y$10$CyOLqU2hForyBcGd4WZ8w.5ijsDGxiAsVULgVCevEisSqOYObMEW6', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `departement`
--
ALTER TABLE `departement`
  ADD PRIMARY KEY (`id_departement`);

--
-- Indexes for table `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`id_jabatan`);

--
-- Indexes for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`id_karyawan`);

--
-- Indexes for table `kategori_obat`
--
ALTER TABLE `kategori_obat`
  ADD PRIMARY KEY (`id_kategori_obat`);

--
-- Indexes for table `kunjungan_berobat`
--
ALTER TABLE `kunjungan_berobat`
  ADD PRIMARY KEY (`id_kunjungan_berobat`);

--
-- Indexes for table `mcu`
--
ALTER TABLE `mcu`
  ADD PRIMARY KEY (`id_mcu`);

--
-- Indexes for table `obat`
--
ALTER TABLE `obat`
  ADD PRIMARY KEY (`id_obat`);

--
-- Indexes for table `obat_pasien`
--
ALTER TABLE `obat_pasien`
  ADD PRIMARY KEY (`id_obat_pasien`);

--
-- Indexes for table `skd`
--
ALTER TABLE `skd`
  ADD PRIMARY KEY (`id_skd`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `departement`
--
ALTER TABLE `departement`
  MODIFY `id_departement` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `id_jabatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `karyawan`
--
ALTER TABLE `karyawan`
  MODIFY `id_karyawan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `kategori_obat`
--
ALTER TABLE `kategori_obat`
  MODIFY `id_kategori_obat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `kunjungan_berobat`
--
ALTER TABLE `kunjungan_berobat`
  MODIFY `id_kunjungan_berobat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `mcu`
--
ALTER TABLE `mcu`
  MODIFY `id_mcu` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `obat`
--
ALTER TABLE `obat`
  MODIFY `id_obat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `obat_pasien`
--
ALTER TABLE `obat_pasien`
  MODIFY `id_obat_pasien` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `skd`
--
ALTER TABLE `skd`
  MODIFY `id_skd` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
