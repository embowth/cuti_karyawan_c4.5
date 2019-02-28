-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 20 Des 2018 pada 02.14
-- Versi server: 10.1.32-MariaDB
-- Versi PHP: 5.6.36

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_cuti`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `ct_cuti`
--

CREATE TABLE `ct_cuti` (
  `id_cuti` int(11) NOT NULL,
  `id_karyawan` int(11) NOT NULL,
  `jenis_cuti` int(11) NOT NULL,
  `tgl_pengajuan` date NOT NULL,
  `tgl_mulai` date NOT NULL,
  `tgl_selesai` date NOT NULL,
  `alasan_cuti` text NOT NULL,
  `status_cuti` tinyint(4) NOT NULL DEFAULT '0',
  `approval_kabag` tinyint(4) NOT NULL,
  `remark` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ct_cuti`
--

INSERT INTO `ct_cuti` (`id_cuti`, `id_karyawan`, `jenis_cuti`, `tgl_pengajuan`, `tgl_mulai`, `tgl_selesai`, `alasan_cuti`, `status_cuti`, `approval_kabag`, `remark`) VALUES
(2, 3, 4, '2018-09-18', '2018-09-19', '2018-09-20', 'sakit maag', 1, 1, ''),
(3, 1, 2, '2018-09-07', '2018-09-10', '2018-09-11', 'liburan', 1, 1, ''),
(4, 2, 2, '2018-09-01', '2018-09-05', '2018-09-07', 'arisan keluarga', 1, 1, ''),
(5, 4, 2, '2018-09-01', '2018-09-03', '2018-09-04', 'ambil rapot anak', 1, 1, ''),
(6, 5, 2, '2018-09-19', '2018-09-21', '2018-09-21', 'orang tua sakit', 1, 1, ''),
(7, 8, 2, '2018-09-21', '2018-09-24', '2018-09-25', 'banjir', 1, 1, ''),
(8, 14, 2, '2018-09-23', '2018-09-28', '2018-09-28', 'LIBURAN', 1, 1, ''),
(9, 16, 2, '2018-09-12', '2018-09-14', '2018-09-14', 'acara keluarga', 1, 1, ''),
(10, 19, 2, '2018-09-01', '2018-09-03', '2018-09-04', 'check up ', 1, 1, ''),
(11, 12, 2, '2018-09-07', '2018-09-12', '2018-09-13', 'pindahan rumah', 1, 1, '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ct_divisi`
--

CREATE TABLE `ct_divisi` (
  `kd_divisi` int(11) NOT NULL,
  `nama_divisi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ct_divisi`
--

INSERT INTO `ct_divisi` (`kd_divisi`, `nama_divisi`) VALUES
(1, 'Direktur'),
(2, 'Mutu'),
(3, 'Administrasi'),
(4, 'Keuangan'),
(5, 'Penunjang'),
(6, 'SDM (Kepegawaian)'),
(7, 'Diklat');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ct_golongan_usia`
--

CREATE TABLE `ct_golongan_usia` (
  `id_golongan` int(11) NOT NULL,
  `nama_golongan` varchar(30) NOT NULL,
  `minimum_usia` int(11) NOT NULL,
  `maksimum_usia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `ct_golongan_usia`
--

INSERT INTO `ct_golongan_usia` (`id_golongan`, `nama_golongan`, `minimum_usia`, `maksimum_usia`) VALUES
(2, 'Golongan 1', 20, 24),
(3, 'Golongan 2', 25, 38),
(4, 'Golongan 3', 39, 100);

-- --------------------------------------------------------

--
-- Struktur dari tabel `ct_jabatan`
--

CREATE TABLE `ct_jabatan` (
  `kd_jabatan` int(11) NOT NULL,
  `nama_jabatan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ct_jabatan`
--

INSERT INTO `ct_jabatan` (`kd_jabatan`, `nama_jabatan`) VALUES
(1, 'Direktur Utama'),
(2, 'Direktur Operasional'),
(3, 'Kepala Divisi Mutu'),
(4, 'Staff Pengendali Mutu'),
(5, 'Kepala Divisi Administrasi'),
(6, 'Staff Administrasi'),
(7, 'Kepala Divisi Keuangan'),
(8, 'Staff Keuangan'),
(9, 'Kepala Divisi Penunjang'),
(10, 'Logistik (Staff Penunjang)'),
(11, 'Office Boy (Staff Penunjang)'),
(12, 'Kepala SDM'),
(13, 'Kepala Divisi Diklat'),
(14, 'Instruktur (Staff Diklat)');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ct_jenis_cuti`
--

CREATE TABLE `ct_jenis_cuti` (
  `id_jenis_cuti` int(11) NOT NULL,
  `nama_jenis` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ct_jenis_cuti`
--

INSERT INTO `ct_jenis_cuti` (`id_jenis_cuti`, `nama_jenis`) VALUES
(1, 'Cuti Bersalin'),
(2, 'Cuti Tahunan'),
(3, 'Cuti Besar'),
(4, 'Cuti Sakit'),
(5, 'Cuti Alasan Penting');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ct_karyawan`
--

CREATE TABLE `ct_karyawan` (
  `id_karyawan` int(11) NOT NULL,
  `nik` int(11) NOT NULL,
  `nama_karyawan` varchar(50) NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` tinyint(4) NOT NULL DEFAULT '0',
  `status_kawin` tinyint(4) NOT NULL DEFAULT '0',
  `alamat` text NOT NULL,
  `nomor_tlp` varchar(20) NOT NULL,
  `agama` tinyint(4) NOT NULL DEFAULT '0',
  `kd_divisi` int(11) NOT NULL,
  `kd_jabatan` int(11) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ct_karyawan`
--

INSERT INTO `ct_karyawan` (`id_karyawan`, `nik`, `nama_karyawan`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `status_kawin`, `alamat`, `nomor_tlp`, `agama`, `kd_divisi`, `kd_jabatan`, `id_user`) VALUES
(1, 100001, 'H.T Sartono, CRNA', 'Jakarta', '1977-08-06', 1, 1, 'Jl. KH Agus Salim 16, Sabang, Menteng Jakarta Pusat', '8193382199', 1, 1, 1, 4),
(2, 100002, 'Masudik, EMT-P, M. Kes.', 'Bekasi', '1975-02-01', 1, 1, 'Jl. Raya Narogong KM 12 Pangkalan II Cikiwul, Bantar Gebang, Bekasi', '8227389199', 1, 1, 2, 5),
(3, 100003, 'Supriyatno, S.Kep.', 'Grobogan', '1985-05-15', 1, 1, 'Jl. KH Asnawi, Desa Sukajaya, Kecamatan Cibitung,Kabupaten Bekasi', '8992738911', 1, 2, 3, 6),
(4, 100004, 'Ns.Endah S P., S.Kep.', 'Pacitan', '1973-05-17', 2, 1, 'Jl. Raya Narogong KM 27 No. 75 Kecamatan Klapanunggal, Cileungsi, Bogor', '87872648281', 1, 2, 4, 7),
(5, 100005, 'Ns. Heti Widiastuti, S.Kep.', 'Bekasi', '1976-09-09', 2, 1, 'Jl. Kelapa Sawit Raya No. 28 Utan Kayu Selatan Matraman Jakarta Timur', '81736628391', 1, 2, 4, 8),
(6, 100006, 'Ns. Dinar Kusdinar, S.Kep.', 'Jakarta', '1992-07-18', 1, 2, 'Jl. Pangeran tubagus Angke Blok D9A No.2 Jakarta Barat', '82371839771', 1, 3, 5, 9),
(7, 100007, 'Tiara Ramadayanti', 'Aceh', '1998-01-27', 2, 2, 'Villa Mutiara Gading 3 Blok G14 No.7 RT.01/019 Kebalen, Bekasi', '82297399710', 1, 3, 6, 10),
(8, 100008, 'Rahmat Al Hafizh', 'Jakarta', '1985-01-06', 1, 1, 'Jl. Kebon Jeruk Raya No. 44 Jakarta Barat', '85628351839', 1, 3, 6, 11),
(9, 100009, 'Susilawati, S.Tr.Keb.', 'Solo', '1981-12-21', 2, 1, 'Jl. Kramat Sentiong No. 53 Jakarta Pusat', '82136829103', 1, 3, 6, 12),
(10, 100010, 'Imas Masriah', 'Bekasi', '1997-10-06', 2, 2, 'Jl. Raya Pondok Ungu Permai Blok B1 No. 31, Bekasi', '87762840972', 1, 4, 7, 13),
(11, 100011, 'Desie Arismawati, Amd.', 'Bukit Tinggi', '1990-02-10', 2, 2, 'Kebun nanas utara rt.005 Rw.07 No.15 Jakarta Timur', '81929008762', 1, 4, 8, 14),
(12, 100012, 'Nur Khalimah', 'Jakarta', '1981-03-12', 2, 1, 'Jl. Sriwijaya No.15 Bekasi Barat', '81273909283', 1, 5, 9, 15),
(13, 100013, 'Caming', 'Purworejo', '1987-11-20', 1, 2, 'Perum Pondok Surya Mandala, Jalan Surya Abadi Blok P No.07, Jaka Mulya, Bekasi Selatan', '87872730012', 3, 5, 10, 16),
(14, 100014, 'Mulyadi', 'Bekasi', '1983-06-05', 1, 1, 'Jl. Raya Hankam Pondok Gede Sumir No. 260 A Kelurahan Jatiwarna Kecamatan Pondok Melati Kota Bekasi', '81367394781', 1, 5, 11, 17),
(15, 100015, 'Siska Kusuma Dewi, S.H.', 'Jakarta', '1991-01-28', 2, 2, 'Jl M Malik Ibrahim Komplek Pondok Gede Permai Bl A-9/2 RT 004/10 Bekasi', '89928399292', 1, 6, 12, 18),
(16, 100016, 'Ns. Irawan, S.Kep.', 'Kebumen', '1978-11-19', 1, 1, 'Komplek Pondok Timur Indah II Bl C/129-A Bekasi', '87738484728', 1, 7, 13, 19),
(17, 100017, 'Ns. Dedi Akhmad, S.Kep.', 'Jakarta', '1975-04-22', 1, 1, 'Kp. Jagawana. Ds. Sukarukun RT.006/005. Kec . Sukatani - Bekasi', '89499284920', 1, 7, 14, 20),
(18, 100018, 'Oktavianto, Amd, Kep.', 'Bekasi', '1989-09-29', 1, 2, 'Jl. Wijaya kusuma RT/RW : 004/015 No. 49 Jaka Sampurna', '87734573923', 1, 7, 14, 21),
(19, 100019, 'Fajar Adi Wicaksono, S.Kep.', 'Gresik', '1977-06-24', 1, 1, 'Jl Gabus I Perumnas II 7 RT 001/07 Bekasi', '81274773920', 1, 7, 14, 22),
(20, 100020, 'Ari Dian Prayoga, S.Kep.', 'Jakarta', '1988-05-07', 1, 2, 'Cluster Frambosa F35 Vida Bekasi Cluster Frambosa, Bekasi Timur, Bekasi, Jawa Barat', '85738748274', 1, 7, 14, 23),
(21, 100021, 'Wibowo, S.Kep.', 'Jakarta', '1986-12-11', 1, 2, 'Jl. Raya Mangun Jaya 1 No.28, RT.1/RW.2, Mangunjaya, Tambun Selatan, Kota Bekasi, Jawa Barat', '81973849773', 1, 7, 14, 24),
(22, 100022, 'Waluyo, AMK', 'Jakarta', '1992-08-03', 1, 2, 'Jl. Bunga Rampai X/1/24 RT.012/006 Perumnas Kelender, Jakarta Timur', '81873684621', 1, 7, 14, 25),
(23, 100023, 'Muhaji, M.Si, M.Tr.Kep.', 'Bekasi', '1982-06-25', 1, 2, 'Jl. Bintara Raya, No. 55 C, Kranji, Bintara, Bekasi Barat, Kota Bekasi, Jawa Barat ', '81287489002', 1, 7, 14, 14);

-- --------------------------------------------------------

--
-- Struktur dari tabel `ct_status_kawin`
--

CREATE TABLE `ct_status_kawin` (
  `id_status` int(11) NOT NULL,
  `status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ct_status_kawin`
--

INSERT INTO `ct_status_kawin` (`id_status`, `status`) VALUES
(1, 'Married'),
(2, 'Single');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ct_usia`
--

CREATE TABLE `ct_usia` (
  `id_usia` int(11) NOT NULL,
  `id_karyawan` int(11) NOT NULL,
  `golongan_usia` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ct_usia`
--

INSERT INTO `ct_usia` (`id_usia`, `id_karyawan`, `golongan_usia`) VALUES
(1, 1, 'Golongan III'),
(2, 2, 'Golongan III'),
(3, 3, 'Golongan II'),
(4, 4, 'Golongan III'),
(5, 5, 'Golongan III'),
(6, 6, 'Golongan II'),
(7, 7, 'Golongan I'),
(8, 8, 'Golongan II'),
(9, 9, 'Golongan II'),
(10, 10, 'Golongan I'),
(11, 11, 'Golongan II'),
(12, 12, 'Golongan II'),
(13, 13, 'Golongan II'),
(14, 14, 'Golongan II'),
(15, 15, 'Golongan II'),
(16, 16, 'Golongan III'),
(17, 17, 'Golongan III'),
(18, 18, 'Golongan II'),
(19, 19, 'Golongan III'),
(20, 20, 'Golongan II'),
(21, 21, 'Golongan II'),
(22, 22, 'Golongan II'),
(23, 23, 'Golongan II');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mnj_image`
--

CREATE TABLE `mnj_image` (
  `id_image` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `file` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mnj_image`
--

INSERT INTO `mnj_image` (`id_image`, `id_user`, `file`) VALUES
(1, 1, 'user_img/10442_ATbpAb5T4.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mnj_login`
--

CREATE TABLE `mnj_login` (
  `id_login` int(11) NOT NULL,
  `username` varchar(40) NOT NULL,
  `password` text NOT NULL,
  `nama_user` varchar(50) NOT NULL,
  `id_role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mnj_login`
--

INSERT INTO `mnj_login` (`id_login`, `username`, `password`, `nama_user`, `id_role`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'ADMINISTRATOR', 1),
(3, 'endah', 'b93939873fd4923043b9dec975811f66', 'Ns.Endah S P., S.Kep.', 4),
(4, '100001', 'e2a6a1ace352668000aed191a817d143', 'H.T Sartono, CRNA', 3),
(5, '100002', 'bb36c34eb6644ab9694315af7d68e629', 'Masudik, EMT-P, M. Kes.', 3),
(6, '100003', '3dc81e3f2c523fb5955761bbe2d150f2', 'Supriyatno, S.Kep.', 2),
(7, '100004', '1ea85063355fbfad3de73ab038261d62', 'Ns.Endah S P., S.Kep.', 4),
(8, '100005', 'efd1a2f9b0b5f14b1fac70a7f8e8a9e7', 'Ns. Heti Widiastuti, S.Kep.', 4),
(9, '100006', '758691fdf7ae3403db0d3bd8ac3ad585', 'Ns. Dinar Kusdinar, S.Kep.', 2),
(10, '100007', '9e3fc2a6d0f45c7a999ab01ebcacaf94', 'Tiara Ramadayanti', 4),
(11, '100008', 'ab24c2fe5b396a574095a73b1ad23356', 'Rahmat Al Hafizh', 4),
(12, '100009', '795202367b2120e77b231d4d2b98e2b9', 'Susilawati, S.Tr.Keb.', 4),
(13, '100010', 'daa28096f9e8879ab3a02b90aa0e2f83', 'Imas Masriah', 2),
(14, '100011', '09a146c8d1cfdbdb54ceb60ede93cdab', 'Desie Arismawati, Amd.', 4),
(15, '100012', '21bf043d935e1499b3749c2f483df890', 'Nur Khalimah', 2),
(16, '100013', '33932d50e450ef3ccfbcf69ac9ba04e5', 'Caming', 4),
(17, '100014', 'a3c3a95f3e42519d7ba5284cffcd4e25', 'Mulyadi', 4),
(18, '100015', 'e025b5159bba8890d4f936973d0bcb2f', 'Siska Kusuma Dewi, S.H.', 1),
(19, '100016', '89deb442ec0592fb5fc8b4908cbf1580', 'Ns. Irawan, S.Kep.', 2),
(20, '100017', '07986d41d4c01c67d4b91cdcf10cb777', 'Ns. Dedi Akhmad, S.Kep.', 4),
(21, '100018', '1be1ef5ef17c532b377b5238c07adf78', 'Oktavianto, Amd, Kep.', 4),
(22, '100019', '8a8eac8eaeca4d75f0cafc20319c06af', 'Fajar Adi Wicaksono, S.Kep.', 4),
(23, '100020', '6372b5b816b700cbb03a54c7859c416c', 'Ari Dian Prayoga, S.Kep.', 4),
(24, '100021', '10e54ab2f0c23c9be1e5e5c20e8b1d8b', 'Wibowo, S.Kep.', 4),
(25, '100022', '70314ca6c279ed0aa1d108f91c088ca5', 'Waluyo, AMK', 4),
(26, '100023', '65feb6b8c9726133b18ac2f2ac26e8bc', 'Muhaji, M.Si, M.Tr.Kep.', 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `mnj_role`
--

CREATE TABLE `mnj_role` (
  `id_role` int(11) NOT NULL,
  `nama_role` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mnj_role`
--

INSERT INTO `mnj_role` (`id_role`, `nama_role`) VALUES
(1, 'Admin / SDM'),
(2, 'Kepala Divisi'),
(3, 'Direktur'),
(4, 'Karyawan');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `ct_cuti`
--
ALTER TABLE `ct_cuti`
  ADD PRIMARY KEY (`id_cuti`);

--
-- Indeks untuk tabel `ct_divisi`
--
ALTER TABLE `ct_divisi`
  ADD PRIMARY KEY (`kd_divisi`);

--
-- Indeks untuk tabel `ct_golongan_usia`
--
ALTER TABLE `ct_golongan_usia`
  ADD PRIMARY KEY (`id_golongan`);

--
-- Indeks untuk tabel `ct_jabatan`
--
ALTER TABLE `ct_jabatan`
  ADD PRIMARY KEY (`kd_jabatan`);

--
-- Indeks untuk tabel `ct_jenis_cuti`
--
ALTER TABLE `ct_jenis_cuti`
  ADD PRIMARY KEY (`id_jenis_cuti`);

--
-- Indeks untuk tabel `ct_karyawan`
--
ALTER TABLE `ct_karyawan`
  ADD PRIMARY KEY (`id_karyawan`);

--
-- Indeks untuk tabel `ct_status_kawin`
--
ALTER TABLE `ct_status_kawin`
  ADD PRIMARY KEY (`id_status`);

--
-- Indeks untuk tabel `ct_usia`
--
ALTER TABLE `ct_usia`
  ADD PRIMARY KEY (`id_usia`);

--
-- Indeks untuk tabel `mnj_image`
--
ALTER TABLE `mnj_image`
  ADD PRIMARY KEY (`id_image`);

--
-- Indeks untuk tabel `mnj_login`
--
ALTER TABLE `mnj_login`
  ADD PRIMARY KEY (`id_login`);

--
-- Indeks untuk tabel `mnj_role`
--
ALTER TABLE `mnj_role`
  ADD PRIMARY KEY (`id_role`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `ct_cuti`
--
ALTER TABLE `ct_cuti`
  MODIFY `id_cuti` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `ct_divisi`
--
ALTER TABLE `ct_divisi`
  MODIFY `kd_divisi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `ct_golongan_usia`
--
ALTER TABLE `ct_golongan_usia`
  MODIFY `id_golongan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `ct_jabatan`
--
ALTER TABLE `ct_jabatan`
  MODIFY `kd_jabatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `ct_jenis_cuti`
--
ALTER TABLE `ct_jenis_cuti`
  MODIFY `id_jenis_cuti` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `ct_karyawan`
--
ALTER TABLE `ct_karyawan`
  MODIFY `id_karyawan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT untuk tabel `ct_usia`
--
ALTER TABLE `ct_usia`
  MODIFY `id_usia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT untuk tabel `mnj_image`
--
ALTER TABLE `mnj_image`
  MODIFY `id_image` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `mnj_login`
--
ALTER TABLE `mnj_login`
  MODIFY `id_login` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT untuk tabel `mnj_role`
--
ALTER TABLE `mnj_role`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
