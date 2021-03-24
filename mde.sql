-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 23, 2018 at 10:46 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mde`
--

-- --------------------------------------------------------

--
-- Table structure for table `band`
--

CREATE TABLE `band` (
  `id_band` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `nomor_identitas` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `bassist` varchar(30) NOT NULL,
  `gitarist` varchar(30) NOT NULL,
  `vocalist` varchar(30) NOT NULL,
  `drummer` varchar(30) NOT NULL,
  `TTL` date NOT NULL,
  `genre` enum('jazz','pop','rock') NOT NULL,
  `cp` varchar(17) NOT NULL,
  `id_user` int(11) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `band`
--

INSERT INTO `band` (`id_band`, `nama`, `nomor_identitas`, `email`, `bassist`, `gitarist`, `vocalist`, `drummer`, `TTL`, `genre`, `cp`, `id_user`, `foto`, `deskripsi`) VALUES
(1, 'NOAH', '317507210899007', 'noah@gmail.com', 'Lanlan', 'Lukman', 'Ariel', 'Rio', '2012-08-02', 'pop', '+62-818-895-855', 10, '317507210899007noah-tickets_03-29-15_23_5500c6592305d.png', 'NOAH, adalah sebuah grup musik Pop/Rock alternatif dari Bandung, Indonesia. Grup musik ini dikenal sebagai grup musik terbesar atau paling terkenal di Indonesia, bahkan sedikitnya di dunia.'),
(2, 'Sheila On 7', '317507210899008', 'so7@gmail.com', 'Adam', 'Erros', 'Duta', 'Briam', '1996-05-06', 'pop', '+62-811-253-777', 19, '098881sheila.jpg', 'Sheila on 7 adalah salah satu grup musik populer Indonesia dengan personel Duta (Akhdiyat Duta Modjo, vokal), Eross (Eross Candra, gitar), Adam (Adam Muhammad Subarkah, bass), serta Brian (Brian Kresna Putro, drum). Grup yang berdiri di Yogyakarta, 6 Mei 1996 itu, awalnya bernama Sheila Gank yang diambil dari kata Sheila dari bahasa Celtic yang berarti musikal. Nama ini pun kemudian diubah menjadi On Seven, yang berarti tujuh tangga nada dalam musik'),
(3, 'Kahitna', '317507210899009', 'kahitna@gmail.com', 'Dody', 'Andrie', 'Hedi, Carlo, Mario', 'Budiana', '1986-06-24', 'jazz', '+62-808-783-295', 20, '317507210899009kahitna.jpg', 'Kahitna adalah sebuah grup musik asal Bandung, Indonesia yang dibentuk pada tanggal 24 Juni 1986. Kelompok musik ini dimotori oleh Yovie Widianto (piano). Walaupun kerap mengusung tema cinta dalam liriknya, Kahitna terkenal bisa memadukan unsur musik jazz, pop, fusion, latin dan bahkan etnik ke dalam bentuk ramuan yang memikat. Grup musik yang mulai merajut kariernya lewat panggung festival dan cafe ini diakui mempunyai kekuatan pada aransemen musiknya yang terbilang orisinil'),
(4, 'Karimata', '317507210899010', 'karimata@gmail.com', 'Erwin', 'Denny', 'Ramona', 'Budhy', '1985-01-01', 'jazz', '+62-834-166-482', 21, '317507210899010Karimata.jpg', 'Karimata adalah sebuah grup musik jazz fusion Indonesia yang sering memasukkan unsur musik etnis tradisional Indonesia ke dalam komposisi musiknya. Personelnya terdiri dari Candra Darusman (keyboard), Erwin Gutawa (bass), Denny TR (gitar), Aminoto Kosin(keyboard) dan Uce Haryono (drum, yang kemudian digantikan oleh Aldy dan Budhy Haryono). Karimata tercatat sebagai band legendaris Indonesia yang terbentuk pada tahun 1985. '),
(5, 'Mocca', '317507210899011', 'mocca@gmail.com', 'Achmad', 'Riko', 'Arina', 'Indra', '1997-01-01', 'jazz', '+62-888-361-844', 22, '317507210899011mocca.jpg', 'Mocca adalah kelompok musik indie asal Bandung. Grup ini beranggotakan Riko Prayitno (gitar), Arina Ephipania (vokal dan flute), Achmad Pratama (bass), dan Indra Massad (drum)'),
(6, 'Groove', '317507210899007', 'groove@gmail.com', 'Arie', 'Ari', 'Rieka, Reza', 'Detta', '1997-12-12', 'jazz', '+62-852-793-342', 28, '317507210899007maliq.jpg', 'The Groove merupakan sebuah grup musik asal Indonesia yang dibentuk pada tahun 1997. Grup musik ini beranggotakan 7 orang yaitu Rieka (Lead Vocal) Reza (Lead Vokal), Arie Firman (Bass), Ari (Guitar), Tanto (Keyboard Synth), Ali (Piano), Rejos (Perkusi), Detta (Drum). Genre musik ini adalah acid jazz.Album pertamanya ialah Kuingin dirilis tahun 1999.');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id_cust` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `jenis_kelamin` enum('laki-laki','perempuan','','') NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `alamat` text NOT NULL,
  `id_user` int(3) NOT NULL,
  `email` varchar(30) NOT NULL,
  `gambar` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `harga`
--

CREATE TABLE `harga` (
  `id_harga` int(3) NOT NULL,
  `id_band` int(11) NOT NULL,
  `tipe` enum('Pernikahan','Pensi','Amal','Televisi') NOT NULL,
  `harga` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `harga`
--

INSERT INTO `harga` (`id_harga`, `id_band`, `tipe`, `harga`) VALUES
(1, 3, 'Pernikahan', 15000000),
(2, 3, 'Pensi', 20000000),
(3, 3, 'Amal', 5000000),
(4, 3, 'Televisi', 75000000),
(9, 2, 'Pernikahan', 30000000),
(10, 2, 'Pensi', 40000000),
(11, 2, 'Amal', 10000000),
(12, 2, 'Televisi', 95000000);

-- --------------------------------------------------------

--
-- Table structure for table `jadwal`
--

CREATE TABLE `jadwal` (
  `id_jadwal` int(11) NOT NULL,
  `id_band` int(11) NOT NULL,
  `tgl1` datetime NOT NULL,
  `tgl2` datetime NOT NULL,
  `judul` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `lagu`
--

CREATE TABLE `lagu` (
  `id_judul` int(3) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `id_band` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `album` varchar(100) NOT NULL,
  `url` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lagu`
--

INSERT INTO `lagu` (`id_judul`, `judul`, `id_band`, `nama`, `album`, `url`) VALUES
(1, 'Sampai Nanti', 3, 'Kahitna', 'Sampai Nanti', 'https://www.youtube.com/embed/VyqMWpFFeNg?rel=0&amp;autoplay=1'),
(2, 'Soulmate', 3, 'Kahitna', 'Sampai Nanti', 'https://www.youtube.com/embed/QIOXSjl2vsw?rel=0&amp;autoplay=1'),
(3, 'Cantik', 3, 'Kahitna', 'Cantik', 'https://www.youtube.com/embed/MAu23hR2z_k?rel=0&amp;autoplay=1'),
(4, 'Aku Punya Hati', 3, 'Kahitna', 'Cerita Cinta', 'https://www.youtube.com/embed/Q2OzAbVIRPE?rel=0&amp;autoplay=1'),
(5, 'Lapang Dada', 2, 'Sheila On 7', 'Musim Yang Baik', 'https://www.youtube.com/embed/YncQyAb1xBQ?rel=0&autoplay=1='),
(6, 'Sebuah Kisah Klasik', 2, 'Sheila On 7', 'Kisah Klasik Untuk Masa Depan', 'https://www.youtube.com/embed/WKsoUFblnfc?rel=0&autoplay=1');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `date` date NOT NULL,
  `harga` int(30) NOT NULL,
  `id_cust` int(3) NOT NULL,
  `id_band` int(11) NOT NULL,
  `tipe` enum('pernikahan','pensi','amal','tv') NOT NULL,
  `gambar` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(5) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `level` enum('admin','band','user','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `level`) VALUES
(1, 'admin', 'admin', 'admin'),
(2, 'user', 'user', 'user'),
(3, 'band', 'band', 'band'),
(10, 'noah', 'noah', 'band'),
(19, 'so7', 'so7', 'band'),
(20, 'kahitna', 'kahitna', 'band'),
(21, 'karimata', 'karimata', 'band'),
(22, 'mocca', 'mocca', 'band'),
(28, 'groove', 'groove', 'band');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `band`
--
ALTER TABLE `band`
  ADD PRIMARY KEY (`id_band`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id_cust`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `harga`
--
ALTER TABLE `harga`
  ADD PRIMARY KEY (`id_harga`),
  ADD KEY `id_band` (`id_band`);

--
-- Indexes for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`id_jadwal`),
  ADD KEY `id_band` (`id_band`);

--
-- Indexes for table `lagu`
--
ALTER TABLE `lagu`
  ADD PRIMARY KEY (`id_judul`),
  ADD KEY `lagu_ibfk_1` (`id_band`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `id_cust` (`id_cust`),
  ADD KEY `id_band` (`id_band`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `band`
--
ALTER TABLE `band`
  MODIFY `id_band` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id_cust` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `harga`
--
ALTER TABLE `harga`
  MODIFY `id_harga` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `id_jadwal` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lagu`
--
ALTER TABLE `lagu`
  MODIFY `id_judul` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `band`
--
ALTER TABLE `band`
  ADD CONSTRAINT `band_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON UPDATE CASCADE;

--
-- Constraints for table `customer`
--
ALTER TABLE `customer`
  ADD CONSTRAINT `customer_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON UPDATE CASCADE;

--
-- Constraints for table `harga`
--
ALTER TABLE `harga`
  ADD CONSTRAINT `harga_ibfk_1` FOREIGN KEY (`id_band`) REFERENCES `band` (`id_band`) ON UPDATE CASCADE;

--
-- Constraints for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD CONSTRAINT `jadwal_ibfk_1` FOREIGN KEY (`id_band`) REFERENCES `band` (`id_band`) ON UPDATE CASCADE;

--
-- Constraints for table `lagu`
--
ALTER TABLE `lagu`
  ADD CONSTRAINT `lagu_ibfk_1` FOREIGN KEY (`id_band`) REFERENCES `band` (`id_band`) ON UPDATE CASCADE;

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`id_cust`) REFERENCES `customer` (`id_cust`) ON UPDATE CASCADE,
  ADD CONSTRAINT `transaksi_ibfk_2` FOREIGN KEY (`id_band`) REFERENCES `band` (`id_band`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
