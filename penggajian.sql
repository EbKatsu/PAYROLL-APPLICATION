-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 25, 2021 at 08:55 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `penggajian`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_pengguna`
--

CREATE TABLE `tb_pengguna` (
  `username` varchar(50) NOT NULL,
  `password` text NOT NULL,
  `level` enum('admin','bendahara','pimpinan','user') NOT NULL,
  `imagefile` text NOT NULL,
  `nip` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pengguna`
--

INSERT INTO `tb_pengguna` (`username`, `password`, `level`, `imagefile`, `nip`) VALUES
('aan', '4607ed4bd8140e9664875f907f48ae14', '', 'default.jpg', '1504142'),
('admin', '21232f297a57a5a743894a0e4a801fc3', 'admin', 'default.jpg', '1504141'),
('bendahara', 'c9ccd7f3c1145515a9d3f7415d5bcbea', 'bendahara', 'default.jpg', '123123123'),
('ebiii', '54761fd68a7acb12de6d059cefade9a2', '', 'default.jpg', '1504142'),
('ilham', 'b63d204bf086017e34d8bd27ab969f28', 'user', 'default.jpg', '1504142'),
('pimpinan', '90973652b88fe07d05a4304f0a945de8', 'pimpinan', 'default.jpg', '098765'),
('user', 'ee11cbb19052e40b07aac0ca060c23ee', 'user', 'default.jpg', '123123123');

-- --------------------------------------------------------

--
-- Table structure for table `t_absen`
--

CREATE TABLE `t_absen` (
  `id` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `bulan` varchar(11) NOT NULL,
  `tahun` year(4) NOT NULL,
  `nip` varchar(15) NOT NULL,
  `hadir` varchar(10) NOT NULL,
  `sakit` varchar(10) NOT NULL,
  `ijin` varchar(10) NOT NULL,
  `tanpa_keterangan` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_absen`
--

INSERT INTO `t_absen` (`id`, `tanggal`, `bulan`, `tahun`, `nip`, `hadir`, `sakit`, `ijin`, `tanpa_keterangan`) VALUES
(1, '2016-01-08', 'Januari', 2016, '1504142', '27', '0', '0', '3'),
(2, '2021-04-23', 'Januari', 2015, '1504142', '13', '0', '5', '1'),
(3, '2021-04-25', 'Januari', 2015, '1', '0', '0', '0', '0'),
(4, '2021-04-25', 'Januari', 2015, '123123123', '27', '0', '10', '15');

-- --------------------------------------------------------

--
-- Table structure for table `t_jabatan`
--

CREATE TABLE `t_jabatan` (
  `id_jabatan` int(11) NOT NULL,
  `nama_jabatan` varchar(35) NOT NULL,
  `gapok` double NOT NULL,
  `tunjangan` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_jabatan`
--

INSERT INTO `t_jabatan` (`id_jabatan`, `nama_jabatan`, `gapok`, `tunjangan`) VALUES
(2, 'Operator', 1250000, 200000),
(5, 'General Manager', 4000000, 2500000),
(7, 'Supervisor', 2500000, 2000000),
(8, 'Kepala Cabang', 1500000, 1000000),
(9, 'General Affair', 1250000, 250000);

-- --------------------------------------------------------

--
-- Table structure for table `t_pegawai`
--

CREATE TABLE `t_pegawai` (
  `nip` varchar(15) NOT NULL,
  `nama_pegawai` varchar(35) NOT NULL,
  `tgl_lhr` date NOT NULL,
  `tlp` varchar(12) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `id_jabatan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_pegawai`
--

INSERT INTO `t_pegawai` (`nip`, `nama_pegawai`, `tgl_lhr`, `tlp`, `alamat`, `id_jabatan`) VALUES
('', '', '2001-02-06', '', '', 1),
('098765', 'pimpinan', '1995-02-21', '456367548756', 'adasdas', 5),
('123123123', 'Feb', '0000-00-00', '098665463545', 'asdadasd', 5),
('1504141', 'Administrator', '0000-00-00', '085353300225', 'Jl.Alamat Lengkap', 2),
('1504142', 'Aan Stiana', '0000-00-00', '085353300225', 'Jl.Kapten Jamhur No.43', 7);

-- --------------------------------------------------------

--
-- Table structure for table `t_penggajian`
--

CREATE TABLE `t_penggajian` (
  `no_penggajian` int(15) NOT NULL,
  `tanggal_penggajian` date NOT NULL,
  `bulan` varchar(10) NOT NULL,
  `tahun` varchar(4) NOT NULL,
  `nip` varchar(15) NOT NULL,
  `gaji_pokok` double NOT NULL,
  `tunjangan_jabatan` double NOT NULL,
  `bonus` double NOT NULL,
  `potongan` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_penggajian`
--

INSERT INTO `t_penggajian` (`no_penggajian`, `tanggal_penggajian`, `bulan`, `tahun`, `nip`, `gaji_pokok`, `tunjangan_jabatan`, `bonus`, `potongan`) VALUES
(1, '2016-01-08', 'Januari', '2016', '1504142', 2500000, 2000000, 0, 450000),
(2, '2021-04-23', 'Januari', '2015', '1504142', 0, 0, 0, 0),
(3, '2021-04-23', 'Februari', '2015', '1504142', 0, 0, 200000, 0),
(4, '2021-04-24', 'Februari', '2016', '123123123', 0, 0, 100, 0),
(5, '2021-04-25', 'Januari', '2015', '1', 0, 0, 0, 0),
(6, '2021-04-25', 'Januari', '2015', '123123123', 4000000, 2500000, 0, 3250000);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_absen`
-- (See below for the actual view)
--
CREATE TABLE `view_absen` (
`id` int(11)
,`bulan` varchar(11)
,`tahun` year(4)
,`nip` varchar(15)
,`nama_pegawai` varchar(35)
,`hadir` varchar(10)
,`sakit` varchar(10)
,`ijin` varchar(10)
,`tanpa_keterangan` varchar(10)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_gaji`
-- (See below for the actual view)
--
CREATE TABLE `view_gaji` (
`no_penggajian` int(15)
,`tanggal_penggajian` date
,`bulan` varchar(10)
,`tahun` varchar(4)
,`nip` varchar(15)
,`nama_pegawai` varchar(35)
,`nama_jabatan` varchar(35)
,`gaji_pokok` double
,`tunjangan_jabatan` double
,`bonus` double
,`potongan` double
,`gaji_bersih` double
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_gaji_karyawan`
-- (See below for the actual view)
--
CREATE TABLE `view_gaji_karyawan` (
`nip` varchar(15)
,`tanggal_penggajian` date
,`bulan` int(2)
,`tahun` int(4)
,`gaji_pokok` double
,`tunjangan_jabatan` double
,`bonus` double
,`potongan` double
,`gaji_bersih` double
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_pengguna`
-- (See below for the actual view)
--
CREATE TABLE `view_pengguna` (
`nip` varchar(15)
,`imagefile` text
,`username` varchar(50)
,`password` text
,`nama_pegawai` varchar(35)
,`level` enum('admin','bendahara','pimpinan','user')
);

-- --------------------------------------------------------

--
-- Structure for view `view_absen`
--
DROP TABLE IF EXISTS `view_absen`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_absen`  AS  select `t_absen`.`id` AS `id`,`t_absen`.`bulan` AS `bulan`,`t_absen`.`tahun` AS `tahun`,`t_pegawai`.`nip` AS `nip`,`t_pegawai`.`nama_pegawai` AS `nama_pegawai`,`t_absen`.`hadir` AS `hadir`,`t_absen`.`sakit` AS `sakit`,`t_absen`.`ijin` AS `ijin`,`t_absen`.`tanpa_keterangan` AS `tanpa_keterangan` from (`t_absen` join `t_pegawai` on(`t_absen`.`nip` = `t_pegawai`.`nip`)) order by `t_absen`.`id` desc ;

-- --------------------------------------------------------

--
-- Structure for view `view_gaji`
--
DROP TABLE IF EXISTS `view_gaji`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_gaji`  AS  select `t_penggajian`.`no_penggajian` AS `no_penggajian`,`t_penggajian`.`tanggal_penggajian` AS `tanggal_penggajian`,`t_penggajian`.`bulan` AS `bulan`,`t_penggajian`.`tahun` AS `tahun`,`t_pegawai`.`nip` AS `nip`,`t_pegawai`.`nama_pegawai` AS `nama_pegawai`,`t_jabatan`.`nama_jabatan` AS `nama_jabatan`,`t_penggajian`.`gaji_pokok` AS `gaji_pokok`,`t_penggajian`.`tunjangan_jabatan` AS `tunjangan_jabatan`,`t_penggajian`.`bonus` AS `bonus`,`t_penggajian`.`potongan` AS `potongan`,`t_penggajian`.`gaji_pokok` + `t_penggajian`.`tunjangan_jabatan` + `t_penggajian`.`bonus` - `t_penggajian`.`potongan` AS `gaji_bersih` from ((`t_penggajian` join `t_pegawai` on(`t_penggajian`.`nip` = `t_pegawai`.`nip`)) join `t_jabatan` on(`t_pegawai`.`id_jabatan` = `t_jabatan`.`id_jabatan`)) order by `t_penggajian`.`no_penggajian` desc ;

-- --------------------------------------------------------

--
-- Structure for view `view_gaji_karyawan`
--
DROP TABLE IF EXISTS `view_gaji_karyawan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_gaji_karyawan`  AS  select `t_pegawai`.`nip` AS `nip`,`t_penggajian`.`tanggal_penggajian` AS `tanggal_penggajian`,month(`t_penggajian`.`tanggal_penggajian`) AS `bulan`,year(`t_penggajian`.`tanggal_penggajian`) AS `tahun`,`t_penggajian`.`gaji_pokok` AS `gaji_pokok`,`t_penggajian`.`tunjangan_jabatan` AS `tunjangan_jabatan`,`t_penggajian`.`bonus` AS `bonus`,`t_penggajian`.`potongan` AS `potongan`,`t_penggajian`.`gaji_pokok` + `t_penggajian`.`tunjangan_jabatan` + `t_penggajian`.`bonus` - `t_penggajian`.`potongan` AS `gaji_bersih` from ((`t_penggajian` join `t_pegawai` on(`t_penggajian`.`nip` = `t_pegawai`.`nip`)) join `t_jabatan` on(`t_pegawai`.`id_jabatan` = `t_jabatan`.`id_jabatan`)) ;

-- --------------------------------------------------------

--
-- Structure for view `view_pengguna`
--
DROP TABLE IF EXISTS `view_pengguna`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_pengguna`  AS  select `tb_pengguna`.`nip` AS `nip`,`tb_pengguna`.`imagefile` AS `imagefile`,`tb_pengguna`.`username` AS `username`,`tb_pengguna`.`password` AS `password`,`t_pegawai`.`nama_pegawai` AS `nama_pegawai`,`tb_pengguna`.`level` AS `level` from (`tb_pengguna` join `t_pegawai` on(`tb_pengguna`.`nip` = `t_pegawai`.`nip`)) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_pengguna`
--
ALTER TABLE `tb_pengguna`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `t_absen`
--
ALTER TABLE `t_absen`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_jabatan`
--
ALTER TABLE `t_jabatan`
  ADD PRIMARY KEY (`id_jabatan`);

--
-- Indexes for table `t_pegawai`
--
ALTER TABLE `t_pegawai`
  ADD PRIMARY KEY (`nip`),
  ADD KEY `id_jabatan` (`id_jabatan`);

--
-- Indexes for table `t_penggajian`
--
ALTER TABLE `t_penggajian`
  ADD PRIMARY KEY (`no_penggajian`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `t_absen`
--
ALTER TABLE `t_absen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `t_jabatan`
--
ALTER TABLE `t_jabatan`
  MODIFY `id_jabatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `t_penggajian`
--
ALTER TABLE `t_penggajian`
  MODIFY `no_penggajian` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
