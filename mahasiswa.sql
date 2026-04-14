-- Buat tabel mahasiswa
CREATE TABLE IF NOT EXISTS `mahasiswa` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) COLLATE latin1_swedish_ci DEFAULT NULL,
  `nim` varchar(20) COLLATE latin1_swedish_ci DEFAULT NULL,
  `jurusan` varchar(50) COLLATE latin1_swedish_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
