-- ============================================
-- DATABASE WISUDA - Skrip Pembuatan Tabel
-- ============================================

-- 1. Tabel Mahasiswa
CREATE TABLE IF NOT EXISTS `tabel_mahasiswa` (
  `id_mahasiswa` INT(11) NOT NULL AUTO_INCREMENT,
  `nim` VARCHAR(20) NOT NULL,
  `nama_mahasiswa` VARCHAR(100) NOT NULL,
  `prodi` VARCHAR(100) NOT NULL,
  `ipk` DECIMAL(3,2) NOT NULL,
  PRIMARY KEY (`id_mahasiswa`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- 2. Tabel Periode Wisuda
CREATE TABLE IF NOT EXISTS `tabel_periode_wisuda` (
  `id_periode` INT(11) NOT NULL AUTO_INCREMENT,
  `tahun_periode` YEAR NOT NULL,
  `tanggal_pelaksanaan` DATE NOT NULL,
  `kuota_maksimal` INT(11) NOT NULL,
  PRIMARY KEY (`id_periode`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- 3. Tabel Staf Verifikator
CREATE TABLE IF NOT EXISTS `tabel_staf_verifikator` (
  `id_staf` INT(11) NOT NULL AUTO_INCREMENT,
  `nama_staf` VARCHAR(100) NOT NULL,
  `divisi` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`id_staf`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- 4. Tabel Rekap Pendaftaran (Tabel Transaksi)
CREATE TABLE IF NOT EXISTS `tabel_rekap_pendaftaran` (
  `id_pendaftaran` INT(11) NOT NULL AUTO_INCREMENT,
  `id_mahasiswa` INT(11) NOT NULL,
  `id_periode` INT(11) NOT NULL,
  `id_staf` INT(11) DEFAULT NULL,
  `nomor_kursi` INT(11) DEFAULT NULL,
  `status_verifikasi` ENUM('Pending','Disetujui','Ditolak') NOT NULL DEFAULT 'Pending',
  PRIMARY KEY (`id_pendaftaran`),
  KEY `fk_mahasiswa` (`id_mahasiswa`),
  KEY `fk_periode` (`id_periode`),
  KEY `fk_staf` (`id_staf`),
  CONSTRAINT `fk_mahasiswa` FOREIGN KEY (`id_mahasiswa`) REFERENCES `tabel_mahasiswa` (`id_mahasiswa`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_periode` FOREIGN KEY (`id_periode`) REFERENCES `tabel_periode_wisuda` (`id_periode`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_staf` FOREIGN KEY (`id_staf`) REFERENCES `tabel_staf_verifikator` (`id_staf`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- ============================================
-- DATA SAMPEL (Mock Data)
-- ============================================

-- Data Mahasiswa
INSERT INTO `tabel_mahasiswa` (`nim`, `nama_mahasiswa`, `prodi`, `ipk`) VALUES
('2021001', 'Ahmad Fauzi', 'Teknik Informatika', 3.75),
('2021002', 'Siti Nurhaliza', 'Sistem Informasi', 3.88),
('2021003', 'Budi Santoso', 'Teknik Elektro', 3.50),
('2021004', 'Dewi Anggraini', 'Manajemen', 3.92),
('2021005', 'Rizky Pratama', 'Teknik Informatika', 3.60);

-- Data Periode Wisuda
INSERT INTO `tabel_periode_wisuda` (`tahun_periode`, `tanggal_pelaksanaan`, `kuota_maksimal`) VALUES
(2025, '2025-03-15', 500),
(2025, '2025-09-20', 450),
(2026, '2026-03-22', 550);

-- Data Staf Verifikator
INSERT INTO `tabel_staf_verifikator` (`nama_staf`, `divisi`) VALUES
('Dr. Hendra Wijaya', 'Akademik'),
('Ir. Ratna Sari', 'Administrasi'),
('Drs. Agus Salim', 'Keuangan');

-- Data Rekap Pendaftaran
INSERT INTO `tabel_rekap_pendaftaran` (`id_mahasiswa`, `id_periode`, `id_staf`, `nomor_kursi`, `status_verifikasi`) VALUES
(1, 1, 1, 101, 'Disetujui'),
(2, 1, 2, 102, 'Disetujui'),
(3, 2, NULL, NULL, 'Pending'),
(4, 2, 3, 201, 'Disetujui'),
(5, 3, NULL, NULL, 'Pending');
