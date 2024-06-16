-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 16 Jun 2024 pada 07.05
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_aplikasi_persediaan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_barang`
--

CREATE TABLE `tb_barang` (
  `KodeBarang` varchar(50) NOT NULL,
  `Nama` varchar(250) DEFAULT NULL,
  `KodeSupplier` varchar(50) NOT NULL,
  `Jenis` varchar(100) NOT NULL,
  `Harga` int(50) NOT NULL,
  `Stok` int(11) DEFAULT 0,
  `Satuan` varchar(50) DEFAULT NULL,
  `Petugas` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `tb_barang`
--

INSERT INTO `tb_barang` (`KodeBarang`, `Nama`, `KodeSupplier`, `Jenis`, `Harga`, `Stok`, `Satuan`, `Petugas`) VALUES
('1', 'Otak-Otak', 'AB', 'JunkFood', 20000, 10, 'PCS', 'ADMIN'),
('2', 'Pizza Keju', 'ADK', 'Pizza', 1000, 123, 'KG', 'ADMIN'),
('3', 'Bakso', 'AB', 'JunkFood', 1000, 1000, 'PCS', 'ADMIN'),
('4', 'Sabu', 'ADK', 'Narkoba', 123, 21, 'KG', 'ADMIN');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_barang_keluar`
--

CREATE TABLE `tb_barang_keluar` (
  `Id` int(11) NOT NULL,
  `Tanggal` datetime DEFAULT NULL,
  `KodePelanggan` varchar(50) DEFAULT NULL,
  `KodeBarang` varchar(50) DEFAULT NULL,
  `Nama` varchar(250) DEFAULT NULL,
  `Jumlah` int(11) DEFAULT NULL,
  `Satuan` varchar(50) DEFAULT NULL,
  `Petugas` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_barang_masuk`
--

CREATE TABLE `tb_barang_masuk` (
  `Id` int(11) NOT NULL,
  `Tanggal` datetime DEFAULT NULL,
  `KodeSupplier` varchar(50) DEFAULT NULL,
  `KodeBarang` varchar(50) DEFAULT NULL,
  `Nama` varchar(250) DEFAULT NULL,
  `Jumlah` int(11) DEFAULT NULL,
  `Satuan` varchar(50) DEFAULT NULL,
  `Petugas` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pelanggan`
--

CREATE TABLE `tb_pelanggan` (
  `KodePelanggan` varchar(50) NOT NULL,
  `Nama` varchar(250) DEFAULT NULL,
  `Alamat` varchar(250) DEFAULT NULL,
  `Telp` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `tb_pelanggan`
--

INSERT INTO `tb_pelanggan` (`KodePelanggan`, `Nama`, `Alamat`, `Telp`) VALUES
('PLG001', 'Alex123', 'JL.Sitembok', '0821361245'),
('PLG002', 'Hanzo', 'Stabato', '081278213123'),
('PLG003', 'Apotek Bambuan', 'Spain', '081278213123');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_petugas`
--

CREATE TABLE `tb_petugas` (
  `KodePetugas` varchar(50) NOT NULL,
  `Nama` varchar(250) NOT NULL,
  `Jabatan` varchar(250) NOT NULL,
  `Password` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `tb_petugas`
--

INSERT INTO `tb_petugas` (`KodePetugas`, `Nama`, `Jabatan`, `Password`) VALUES
('ADM', 'Admin Gudang1', 'ADMIN1', '123'),
('ADM2', 'Admin Gudang2', 'ADMIN', '123');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_supplier`
--

CREATE TABLE `tb_supplier` (
  `KodeSupplier` varchar(50) NOT NULL,
  `Nama` varchar(250) DEFAULT NULL,
  `Alamat` varchar(250) DEFAULT NULL,
  `Telp` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `tb_supplier`
--

INSERT INTO `tb_supplier` (`KodeSupplier`, `Nama`, `Alamat`, `Telp`) VALUES
('AB', 'Apotek Bambuan', 'Jl.Jend Sudirman', '08123213124'),
('AC', 'Ayra Cell', 'Jl.Jend Sudirman', '081278213123');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_barang`
--
ALTER TABLE `tb_barang`
  ADD PRIMARY KEY (`KodeBarang`) USING BTREE;

--
-- Indeks untuk tabel `tb_barang_keluar`
--
ALTER TABLE `tb_barang_keluar`
  ADD PRIMARY KEY (`Id`) USING BTREE,
  ADD KEY `KodeBarang` (`KodeBarang`) USING BTREE,
  ADD KEY `KodeSupplier` (`KodePelanggan`) USING BTREE;

--
-- Indeks untuk tabel `tb_barang_masuk`
--
ALTER TABLE `tb_barang_masuk`
  ADD PRIMARY KEY (`Id`) USING BTREE,
  ADD KEY `KodeBarang` (`KodeBarang`) USING BTREE,
  ADD KEY `KodeSupplier` (`KodeSupplier`) USING BTREE;

--
-- Indeks untuk tabel `tb_pelanggan`
--
ALTER TABLE `tb_pelanggan`
  ADD PRIMARY KEY (`KodePelanggan`) USING BTREE;

--
-- Indeks untuk tabel `tb_petugas`
--
ALTER TABLE `tb_petugas`
  ADD PRIMARY KEY (`KodePetugas`) USING BTREE;

--
-- Indeks untuk tabel `tb_supplier`
--
ALTER TABLE `tb_supplier`
  ADD PRIMARY KEY (`KodeSupplier`) USING BTREE;

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_barang_keluar`
--
ALTER TABLE `tb_barang_keluar`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_barang_masuk`
--
ALTER TABLE `tb_barang_masuk`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
