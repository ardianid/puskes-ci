-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 26, 2016 at 11:36 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `simkesda`
--
CREATE DATABASE IF NOT EXISTS `simkesda` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `simkesda`;

-- --------------------------------------------------------

--
-- Table structure for table `dt_gigi`
--

CREATE TABLE IF NOT EXISTS `dt_gigi` (
`id_gigi` int(11) NOT NULL,
  `kd_puskes` int(11) NOT NULL,
  `jml_perlu` int(11) NOT NULL,
  `jml_dapat` int(11) NOT NULL,
  `jml_perlu_pr` int(11) NOT NULL,
  `jml_dapat_pr` int(11) NOT NULL,
  `bln_gigi` int(11) NOT NULL,
  `thn_gigi` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dt_gigi`
--

INSERT INTO `dt_gigi` (`id_gigi`, `kd_puskes`, `jml_perlu`, `jml_dapat`, `jml_perlu_pr`, `jml_dapat_pr`, `bln_gigi`, `thn_gigi`) VALUES
(1, 1, 1, 0, 0, 0, 7, 2016);

-- --------------------------------------------------------

--
-- Table structure for table `dt_gizi`
--

CREATE TABLE IF NOT EXISTS `dt_gizi` (
`id_gizi` int(11) NOT NULL,
  `bln_gizi` int(11) NOT NULL,
  `thn_gizi` int(11) NOT NULL,
  `kd_desa` int(11) NOT NULL,
  `jenis_pasien` varchar(4) NOT NULL,
  `jml_bayi_vit` int(11) NOT NULL,
  `jml_balita_200` int(11) NOT NULL,
  `jml_ibu_nifas` int(11) NOT NULL,
  `jml_ibu_hml_f1` int(11) NOT NULL,
  `jml_ibu_hml_f3` int(11) NOT NULL,
  `jml_balita_febal1` int(11) NOT NULL,
  `jml_balita_febal2` int(11) NOT NULL,
  `jml_bayi1_timbang` int(11) NOT NULL,
  `jml_balita14_timbang` int(11) NOT NULL,
  `jml_bayi_bawah` int(11) NOT NULL,
  `jml_sd16_yodium` int(11) NOT NULL,
  `jml_wus_yodium` int(11) NOT NULL,
  `jml_bumil_yodium` int(11) NOT NULL,
  `jml_buteki_yodium` int(11) NOT NULL,
  `jml_wus1445_lila` int(11) NOT NULL,
  `jml_wus23_lila` int(11) NOT NULL,
  `jml_bayi_vit_pr` int(11) NOT NULL,
  `jml_balita_200_pr` int(11) NOT NULL,
  `jml_ibu_nifas_pr` int(11) NOT NULL,
  `jml_ibu_hml_f1_pr` int(11) NOT NULL,
  `jml_ibu_hml_f3_pr` int(11) NOT NULL,
  `jml_balita_febal1_pr` int(11) NOT NULL,
  `jml_balita_febal2_pr` int(11) NOT NULL,
  `jml_bayi1_timbang_pr` int(11) NOT NULL,
  `jml_balita14_timbang_pr` int(11) NOT NULL,
  `jml_bayi_bawah_pr` int(11) NOT NULL,
  `jml_sd16_yodium_pr` int(11) NOT NULL,
  `jml_wus_yodium_pr` int(11) NOT NULL,
  `jml_bumil_yodium_pr` int(11) NOT NULL,
  `jml_buteki_yodium_pr` int(11) NOT NULL,
  `jml_wus1445_lila_pr` int(11) NOT NULL,
  `jml_wus23_lila_pr` int(11) NOT NULL,
  `kd_puskes` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `dt_imunisasi`
--

CREATE TABLE IF NOT EXISTS `dt_imunisasi` (
`id_imun` int(11) NOT NULL,
  `bln_imun` int(11) NOT NULL,
  `thn_imun` int(11) NOT NULL,
  `kd_desa` int(11) NOT NULL,
  `kd_puskes` int(11) NOT NULL,
  `campak` int(11) NOT NULL,
  `dpt1` int(11) NOT NULL,
  `hep_b1` int(11) NOT NULL,
  `hep_b3` int(11) NOT NULL,
  `tt1_pr` int(11) NOT NULL,
  `tt2_pr` int(11) NOT NULL,
  `tt_bos_pr` int(11) NOT NULL,
  `wanita_tt1_pr` int(11) NOT NULL,
  `dt1` int(11) NOT NULL,
  `dt2` int(11) NOT NULL,
  `sd_tt1_pr` int(11) NOT NULL,
  `sd_tt2_pr` int(11) NOT NULL,
  `campak_pr` int(11) NOT NULL,
  `dpt1_pr` int(11) NOT NULL,
  `hep_b1_pr` int(11) NOT NULL,
  `hep_b3_pr` int(11) NOT NULL,
  `dt1_pr` int(11) NOT NULL,
  `dt2_pr` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `dt_kes_sekolah`
--

CREATE TABLE IF NOT EXISTS `dt_kes_sekolah` (
`id_sekolah` int(11) NOT NULL,
  `thn_sekolah` int(11) NOT NULL,
  `bln_sekolah` int(11) NOT NULL,
  `kd_desa` int(11) NOT NULL,
  `kd_puskes` int(11) NOT NULL,
  `jml_mi` int(11) NOT NULL,
  `jml_mts` int(11) NOT NULL,
  `jml_sma` int(11) NOT NULL,
  `jml_keslin` int(11) NOT NULL,
  `jml_mkeslin` int(11) NOT NULL,
  `jml_uks` int(11) NOT NULL,
  `jml_kons` int(11) NOT NULL,
  `jml_tk` int(11) NOT NULL,
  `jml_mi_pr` int(11) NOT NULL,
  `jml_mts_pr` int(11) NOT NULL,
  `jml_sma_pr` int(11) NOT NULL,
  `jml_keslin_pr` int(11) NOT NULL,
  `jml_mkeslin_pr` int(11) NOT NULL,
  `jml_uks_pr` int(11) NOT NULL,
  `jml_kons_pr` int(11) NOT NULL,
  `jml_tk_pr` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `dt_kesling`
--

CREATE TABLE IF NOT EXISTS `dt_kesling` (
`id_kesling` int(11) NOT NULL,
  `bln_kesling` int(11) NOT NULL,
  `thn_kesling` int(11) NOT NULL,
  `kd_puskes` int(11) NOT NULL,
  `kd_desa` int(11) NOT NULL,
  `jml_ari` int(11) NOT NULL,
  `jml_air` int(11) NOT NULL,
  `jml_sair` int(11) NOT NULL,
  `jml_sair2` int(11) NOT NULL,
  `jml_sair3` int(11) NOT NULL,
  `jml_kmakan` int(11) NOT NULL,
  `jml_tpm` int(11) NOT NULL,
  `jml_periksa` int(11) NOT NULL,
  `jml_sani` int(11) NOT NULL,
  `jml_pesti` int(11) NOT NULL,
  `jml_tp2` int(11) NOT NULL,
  `jml_ttu` int(11) NOT NULL,
  `jml_ttu2` int(11) NOT NULL,
  `jml_ari_pr` int(11) NOT NULL,
  `jml_air_pr` int(11) NOT NULL,
  `jml_sair_pr` int(11) NOT NULL,
  `jml_sair2_pr` int(11) NOT NULL,
  `jml_sair3_pr` int(11) NOT NULL,
  `jml_kmakan_pr` int(11) NOT NULL,
  `jml_tpm_pr` int(11) NOT NULL,
  `jml_periksa_pr` int(11) NOT NULL,
  `jml_sani_pr` int(11) NOT NULL,
  `jml_pesti_pr` int(11) NOT NULL,
  `jml_tp2_pr` int(11) NOT NULL,
  `jml_ttu_pr` int(11) NOT NULL,
  `jml_ttu2_pr` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `dt_kesmas`
--

CREATE TABLE IF NOT EXISTS `dt_kesmas` (
`id_kesmas` int(11) NOT NULL,
  `bln_kesmas` int(11) NOT NULL,
  `thn_kesmas` int(11) NOT NULL,
  `kd_desa` int(11) NOT NULL,
  `kd_puskes` int(11) NOT NULL,
  `kel_tbparu` int(11) NOT NULL,
  `kel_kusta` int(11) NOT NULL,
  `kel_hamil_pr` int(11) NOT NULL,
  `kel_risti` int(11) NOT NULL,
  `kel_tetanus` int(11) NOT NULL,
  `kel_balita_risti` int(11) NOT NULL,
  `kel_usila_risti` int(11) NOT NULL,
  `kel_reslain` int(11) NOT NULL,
  `kel_kartu` int(11) NOT NULL,
  `panti_khus` int(11) NOT NULL,
  `kel_tbparu_pr` int(11) NOT NULL,
  `kel_kusta_pr` int(11) NOT NULL,
  `kel_risti_pr` int(11) NOT NULL,
  `kel_tetanus_pr` int(11) NOT NULL,
  `kel_balita_risti_pr` int(11) NOT NULL,
  `kel_usila_risti_pr` int(11) NOT NULL,
  `kel_reslain_pr` int(11) NOT NULL,
  `kel_kartu_pr` int(11) NOT NULL,
  `panti_khus_pr` int(11) NOT NULL,
  `sluh_wil` int(11) NOT NULL,
  `sluh_kwil` int(11) NOT NULL,
  `sluh_wil_pr` int(11) NOT NULL,
  `sluh_kwil_pr` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `dt_kia`
--

CREATE TABLE IF NOT EXISTS `dt_kia` (
`id_kia` int(11) NOT NULL,
  `thn_kia` int(11) NOT NULL,
  `bln_kia` int(11) NOT NULL,
  `kd_desa` int(11) NOT NULL,
  `kd_puskes` int(11) NOT NULL,
  `hml_k1` int(11) NOT NULL,
  `hml_k4` int(11) NOT NULL,
  `hml_fresiko` int(11) NOT NULL,
  `hml_tgi` int(11) NOT NULL,
  `hml_tgi_rjuk` int(11) NOT NULL,
  `salin_tng` int(11) NOT NULL,
  `lahir_hdp_bblr` int(11) NOT NULL,
  `lahir_mti` int(11) NOT NULL,
  `jml_neo` int(11) NOT NULL,
  `jml_neo_risti` int(11) NOT NULL,
  `jml_neo_mti` int(11) NOT NULL,
  `jml_materi` int(11) NOT NULL,
  `balita_stimul` int(11) NOT NULL,
  `pra_sekolah` int(11) NOT NULL,
  `hml_k1_pr` int(11) NOT NULL,
  `hml_k4_pr` int(11) NOT NULL,
  `hml_fresiko_pr` int(11) NOT NULL,
  `hml_tgi_pr` int(11) NOT NULL,
  `hml_tgi_rjuk_pr` int(11) NOT NULL,
  `salin_tng_pr` int(11) NOT NULL,
  `lahir_hdp_bblr_pr` int(11) NOT NULL,
  `lahir_mti_pr` int(11) NOT NULL,
  `jml_neo_pr` int(11) NOT NULL,
  `jml_neo_risti_pr` int(11) NOT NULL,
  `jml_neo_mti_pr` int(11) NOT NULL,
  `jml_materi_pr` int(11) NOT NULL,
  `balita_stimul_pr` int(11) NOT NULL,
  `pra_sekolah_pr` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `dt_lab`
--

CREATE TABLE IF NOT EXISTS `dt_lab` (
`id_lab` int(11) NOT NULL,
  `thn_lab` int(11) NOT NULL,
  `bln_lab` int(11) NOT NULL,
  `kd_puskes` int(11) NOT NULL,
  `jml_sdr` int(11) NOT NULL,
  `jml_airsen` int(11) NOT NULL,
  `jml_tinj` int(11) NOT NULL,
  `jml_bt` int(11) NOT NULL,
  `jml_bt2` int(11) NOT NULL,
  `jml_drah_ml` int(11) NOT NULL,
  `jml_drah_ml2` int(11) NOT NULL,
  `jml_drah_ml3` int(11) NOT NULL,
  `jml_kust` int(11) NOT NULL,
  `jml_kust2` int(11) NOT NULL,
  `jml_lain` int(11) NOT NULL,
  `jml_sdr_pr` int(11) NOT NULL,
  `jml_airsen_pr` int(11) NOT NULL,
  `jml_tinj_pr` int(11) NOT NULL,
  `jml_bt_pr` int(11) NOT NULL,
  `jml_bt2_pr` int(11) NOT NULL,
  `jml_drah_ml_pr` int(11) NOT NULL,
  `jml_drah_ml2_pr` int(11) NOT NULL,
  `jml_drah_ml3_pr` int(11) NOT NULL,
  `jml_kust_pr` int(11) NOT NULL,
  `jml_kust2_pr` int(11) NOT NULL,
  `jml_lain_pr` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `dt_olahraga`
--

CREATE TABLE IF NOT EXISTS `dt_olahraga` (
`id_olahraga` int(11) NOT NULL,
  `bln_olahraga` int(11) NOT NULL,
  `thn_olahraga` int(11) NOT NULL,
  `kd_desa` int(11) NOT NULL,
  `kd_puskes` int(11) NOT NULL,
  `jml_klub` int(11) NOT NULL,
  `jml_pelkes` int(11) NOT NULL,
  `jml_klub_pr` int(11) NOT NULL,
  `jml_pelkes_pr` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `dt_penyakitm`
--

CREATE TABLE IF NOT EXISTS `dt_penyakitm` (
`id_penyakitm` int(11) NOT NULL,
  `a_afp1` int(11) NOT NULL,
  `a_afp2` int(11) NOT NULL,
  `b_tetanus1` int(11) NOT NULL,
  `b_tetanus2` int(11) NOT NULL,
  `c_komplikasi` int(11) NOT NULL,
  `c_semprot` int(11) NOT NULL,
  `d_pdbd` int(11) NOT NULL,
  `d_foging` int(11) NOT NULL,
  `d_diabit` int(11) NOT NULL,
  `d_psn` int(11) NOT NULL,
  `d_jentik` int(11) NOT NULL,
  `d_rjentik` int(11) NOT NULL,
  `e_rabies` int(11) NOT NULL,
  `e_varsar` int(11) NOT NULL,
  `f_endemis` int(11) NOT NULL,
  `f_masal` int(11) NOT NULL,
  `g_zoon` int(11) NOT NULL,
  `h_frambu1` int(11) NOT NULL,
  `h_frambu2` int(11) NOT NULL,
  `h_frambu3` int(11) NOT NULL,
  `i_diare_oralit` int(11) NOT NULL,
  `i_diare_infus` int(11) NOT NULL,
  `i_diare_anti` int(11) NOT NULL,
  `j_ispa` int(11) NOT NULL,
  `k_bta1` int(11) NOT NULL,
  `k_bta2` int(11) NOT NULL,
  `k_lengkap` int(11) NOT NULL,
  `k_sembuh` int(11) NOT NULL,
  `k_kambuh` int(11) NOT NULL,
  `l_pb1` int(11) NOT NULL,
  `l_baru` int(11) NOT NULL,
  `l_mb` int(11) NOT NULL,
  `l_cacat2` int(11) NOT NULL,
  `l_mdt` int(11) NOT NULL,
  `l_pb2` int(11) NOT NULL,
  `l_mb_komplit` int(11) NOT NULL,
  `l_pb_komplit` int(11) NOT NULL,
  `a_afp1_pr` int(11) NOT NULL,
  `a_afp2_pr` int(11) NOT NULL,
  `b_tetanus1_pr` int(11) NOT NULL,
  `b_tetanus2_pr` int(11) NOT NULL,
  `c_komplikasi_pr` int(11) NOT NULL,
  `c_bumil_pr` int(11) NOT NULL,
  `c_semprot_pr` int(11) NOT NULL,
  `d_pdbd_pr` int(11) NOT NULL,
  `d_foging_pr` int(11) NOT NULL,
  `d_diabit_pr` int(11) NOT NULL,
  `d_psn_pr` int(11) NOT NULL,
  `d_jentik_pr` int(11) NOT NULL,
  `d_rjentik_pr` int(11) NOT NULL,
  `e_rabies_pr` int(11) NOT NULL,
  `e_varsar_pr` int(11) NOT NULL,
  `f_endemis_pr` int(11) NOT NULL,
  `f_masal_pr` int(11) NOT NULL,
  `g_zoon_pr` int(11) NOT NULL,
  `h_frambu1_pr` int(11) NOT NULL,
  `h_frambu2_pr` int(11) NOT NULL,
  `h_frambu3_pr` int(11) NOT NULL,
  `i_diare_oralit_pr` int(11) NOT NULL,
  `i_diare_infus_pr` int(11) NOT NULL,
  `i_diare_anti_pr` int(11) NOT NULL,
  `j_ispa_pr` int(11) NOT NULL,
  `k_bta1_pr` int(11) NOT NULL,
  `k_bta2_pr` int(11) NOT NULL,
  `k_lengkap_pr` int(11) NOT NULL,
  `k_sembuh_pr` int(11) NOT NULL,
  `k_kambuh_pr` int(11) NOT NULL,
  `l_pb1_pr` int(11) NOT NULL,
  `l_baru_pr` int(11) NOT NULL,
  `l_mb_pr` int(11) NOT NULL,
  `l_cacat2_pr` int(11) NOT NULL,
  `l_mdt_pr` int(11) NOT NULL,
  `l_pb2_pr` int(11) NOT NULL,
  `l_mb_komplit_pr` int(11) NOT NULL,
  `l_pb_komplit_pr` int(11) NOT NULL,
  `bln_penyakit` int(11) NOT NULL,
  `thn_penyakit` int(11) NOT NULL,
  `kd_desa` int(11) NOT NULL,
  `kd_puskes` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `dt_rawat_tinggal`
--

CREATE TABLE IF NOT EXISTS `dt_rawat_tinggal` (
`id_rawatt` int(11) NOT NULL,
  `bln_rawat` int(11) NOT NULL,
  `thn_rawat` int(11) NOT NULL,
  `kd_puskes` int(11) NOT NULL,
  `jml_hml_pr` int(11) NOT NULL,
  `jml_balita` int(11) NOT NULL,
  `jml_kasus` int(11) NOT NULL,
  `jml_khusus` int(11) NOT NULL,
  `jml_balita_pr` int(11) NOT NULL,
  `jml_kasus_pr` int(11) NOT NULL,
  `jml_khusus_pr` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `m_desa`
--

CREATE TABLE IF NOT EXISTS `m_desa` (
`kd_desa` int(11) NOT NULL,
  `kd_kel` int(11) NOT NULL,
  `nama_desa` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_desa`
--

INSERT INTO `m_desa` (`kd_desa`, `kd_kel`, `nama_desa`) VALUES
(1, 0, 'DS SUKADADI'),
(2, 11, 'DS SIDOMAKMUR');

-- --------------------------------------------------------

--
-- Table structure for table `m_jamkes`
--

CREATE TABLE IF NOT EXISTS `m_jamkes` (
`id` int(11) NOT NULL,
  `nama_jamkes` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_jamkes`
--

INSERT INTO `m_jamkes` (`id`, `nama_jamkes`) VALUES
(1, 'JAMKESMAS'),
(2, 'ASKES/BPJS'),
(3, 'JAMSOSTEK');

-- --------------------------------------------------------

--
-- Table structure for table `m_kamar`
--

CREATE TABLE IF NOT EXISTS `m_kamar` (
`id` int(11) NOT NULL,
  `id_ruang` int(11) NOT NULL,
  `nama_kamar` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_kamar`
--

INSERT INTO `m_kamar` (`id`, `id_ruang`, `nama_kamar`) VALUES
(1, 1, 'K UMUM');

-- --------------------------------------------------------

--
-- Table structure for table `m_kec`
--

CREATE TABLE IF NOT EXISTS `m_kec` (
`kd_kec` int(11) NOT NULL,
  `nama_kec` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_kec`
--

INSERT INTO `m_kec` (`kd_kec`, `nama_kec`) VALUES
(1, 'BANJIT'),
(2, 'BAHUGA'),
(3, 'BARADATU'),
(4, 'BLAMBANGAN UMPU');

-- --------------------------------------------------------

--
-- Table structure for table `m_kel`
--

CREATE TABLE IF NOT EXISTS `m_kel` (
`kd_kel` int(11) NOT NULL,
  `kd_kec` int(11) NOT NULL,
  `nama_kel` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_kel`
--

INSERT INTO `m_kel` (`kd_kel`, `kd_kec`, `nama_kel`) VALUES
(1, 1, 'BANJIT'),
(2, 1, 'BALI SADAR SELATAN'),
(3, 1, 'BALI SADAR TENGAH'),
(4, 1, 'BALI SADAR UTARA'),
(5, 1, 'BANDAR AGUNG'),
(11, 2, 'BUMI AGUNG'),
(12, 2, 'GIRI HARJO'),
(13, 2, 'MESIR ILIR');

-- --------------------------------------------------------

--
-- Table structure for table `m_obatalkes`
--

CREATE TABLE IF NOT EXISTS `m_obatalkes` (
`id_obat` int(11) NOT NULL,
  `kode` text NOT NULL,
  `nama` text NOT NULL,
  `jenis` text NOT NULL,
  `tipe_obat` text NOT NULL,
  `qty1` int(11) NOT NULL,
  `qty3` int(11) NOT NULL,
  `satuan1` text NOT NULL,
  `satuan3` text NOT NULL,
  `hargajual` double NOT NULL,
  `stok1` int(11) NOT NULL DEFAULT '0',
  `stok2` int(11) NOT NULL DEFAULT '0',
  `stok` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_obatalkes`
--

INSERT INTO `m_obatalkes` (`id_obat`, `kode`, `nama`, `jenis`, `tipe_obat`, `qty1`, `qty3`, `satuan1`, `satuan3`, `hargajual`, `stok1`, `stok2`, `stok`) VALUES
(1, '001', 'paramex', 'OBAT', 'GENERIK', 1, 5, 'dus', 'tablet', 1000, 1, 1, 6),
(2, '002', 'bodrex', 'OBAT', '', 1, 4, 'pack', 'tablet', 2000, 21, 2, 86),
(3, '003', 'suntikan', 'ALKES', '', 1, 1, 'buah', '-', 0, 0, 0, 0),
(4, '004', 'asam mefenamat', 'OBAT', 'NON GENERIK', 1, 10, 'Lempeng', 'Tablet', 1000, 0, 8, 8),
(5, '005', 'tremenza', 'OBAT', 'GENERIK', 1, 20, 'Lempeng', 'Tablet', 0, 0, 15, 15);

-- --------------------------------------------------------

--
-- Table structure for table `m_pasien`
--

CREATE TABLE IF NOT EXISTS `m_pasien` (
`id` int(10) unsigned NOT NULL,
  `kd_pasien` text NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `alamat` varchar(200) DEFAULT NULL,
  `sex` text,
  `tempat_lahir` text NOT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `tgl_daftar` date NOT NULL,
  `kd_kel` int(11) NOT NULL,
  `jenis_jamkes` text NOT NULL,
  `no_jamkes` text NOT NULL,
  `cara_bayar` text NOT NULL,
  `no_rmedik` text NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=35 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_pasien`
--

INSERT INTO `m_pasien` (`id`, `kd_pasien`, `nama`, `alamat`, `sex`, `tempat_lahir`, `tgl_lahir`, `tgl_daftar`, `kd_kel`, `jenis_jamkes`, `no_jamkes`, `cara_bayar`, `no_rmedik`) VALUES
(14, '001', 'DIAN', 'BANJIT', 'Pria', '', '1990-12-01', '0000-00-00', 1, '', '', '', ''),
(15, '002', 'MURNI', 'BANJIT', 'Wanita', '', '1993-10-03', '0000-00-00', 1, '', '', '', ''),
(31, '003', 'DARUSMAN', 'JL. PULAU PISANG NO,2 BANJIT', 'Pria', 'BANJIT', '2016-02-11', '2016-02-11', 3, 'UMUM', '', 'BAYAR', ''),
(32, '12345', 'dian', 'way kanan', 'Pria', '', '2016-04-11', '2016-04-12', 1, 'JAMKESMAS', '', 'BAYAR', ''),
(33, '004', 'evi', 'tanjung bintang', 'Wanita', 'tanjung bintang', '1990-06-05', '2016-05-01', 1, 'UMUM', '', 'BAYAR', ''),
(34, '005', 'murni', 'way kanan', 'Wanita', 'sindang', '2016-05-01', '2016-05-16', 5, 'UMUM', '', 'BAYAR', '');

-- --------------------------------------------------------

--
-- Table structure for table `m_penyakit`
--

CREATE TABLE IF NOT EXISTS `m_penyakit` (
`id_penyakit` int(11) NOT NULL,
  `kd_penyakit` varchar(15) NOT NULL,
  `nama_penyakit` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=93 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_penyakit`
--

INSERT INTO `m_penyakit` (`id_penyakit`, `kd_penyakit`, `nama_penyakit`) VALUES
(1, '01', 'Peny.Infeksi pada usus'),
(2, '101', 'Kolera'),
(3, '102', 'Diare (termasuk ersangka kolera)'),
(4, '103', 'Disentri'),
(5, '104', 'Infeksi peny.usus yang lain'),
(6, '02', 'Peny. Tuberkulosa'),
(7, '201', 'TB Paru'),
(8, '202', 'TB selain paru (extra pulmonar)'),
(9, '03', 'Peny. Bakteri'),
(10, '301', 'Kusta I/T (MB)'),
(11, '302', 'Kusta B/L (PB)'),
(12, '303', 'Difteria'),
(13, '304', 'Batuk Rejan'),
(14, '305', 'Tetanus'),
(15, '306', 'Pes'),
(16, '04', 'Peny. Virus'),
(17, '401', 'Polimyelitis akut'),
(18, '402', 'Campak'),
(19, '403', 'Radang hati menular'),
(20, '404', 'Rabies/Lyssa'),
(21, '405', 'DHF (Demam berdarah dengue)'),
(22, '406', 'Cacar air'),
(23, '05', 'Ricketsia dan peny. Karena Arthropa lain'),
(24, '501', 'Malaria dengan pemeriks.Lab.'),
(25, '502', 'Malaria tropika (P. Falciparum)'),
(26, '503', 'Malaria tanpa pemeriks. Lab.(klinis)'),
(27, '504', 'Anthrax'),
(28, '06', 'Penyakit kelamin'),
(29, '601', 'Infeksi gonokok'),
(30, '602', 'Non Gonokok'),
(31, '603', 'Peny.kelain lainnya'),
(32, '07', 'Peny. Infeksi krn. Parasit dan akibat kemudian'),
(33, '701', 'Frambusia'),
(34, '703', 'Filariasis'),
(35, '704', 'Peny. Kecacingan'),
(36, '705', 'Scabies'),
(37, '08', 'Gangguan mental'),
(38, '801', 'Gangguan psikotik'),
(39, '802', 'Gangguan neurotik'),
(40, '803', 'Retardasi mental'),
(41, '804', 'Gangguan Kesehatan jiwa bermula pada bayi, anak dan remaja dan perkembangan'),
(42, '805', 'Penyakit jiwa lainnya'),
(43, '09', 'Penyakit susunan syaraf'),
(44, '901', 'Epilepsi'),
(45, '902', 'Penyakit dan kelainan susuran syaraf lainnya'),
(46, '10', 'Penyakit mata dan Adneksa'),
(47, '1001', 'Glaukoma'),
(48, '1002', 'Katarak'),
(49, '1003', 'Kelainan refraksi'),
(50, '1004', 'Kelainan kornea'),
(51, '1005', 'Penyakit mata lain-lain'),
(52, '11', 'Penyakit pada telinga dan mastoid'),
(53, '1101', 'Infeksi telinga tengah'),
(54, '1102', 'Infeksi mastoid (mastoiditis)'),
(55, '12', 'Penyakit tekanan darah tinggi'),
(56, '13', 'Peny. Saluran Napas Bag. Atas'),
(57, '1301', 'Tonsilitis'),
(58, '1302', 'Inf. Akut lain pada sal. Nafas Bag. Atas'),
(59, '1303', 'Penya. Lain pada sal. Pernafasan Bag. Atas'),
(60, '14', 'Peny. Lain pada Sal. Nafas Bawah'),
(61, '1401', 'Pneumonia'),
(62, '1402', 'Bronkhitis'),
(63, '1403', 'Asma'),
(64, '1404', 'Peny. Lain dari Sal. Pernafasan Bawah'),
(65, '15', 'Peny. Rongga Mulut'),
(66, '1501', 'Karies Gigi'),
(67, '1502', 'Peny. Pulpa dan Jaringan periapikal'),
(68, '1503', 'Ginggivitis  dan Peny. Periodontal'),
(69, '1504', 'Gangguan Gigi dan jaringan penyangga lain'),
(70, '1505', 'Peny. Rongga Mulut, kelenjar ludah, rahang dan lainnya'),
(71, '16', 'Peny. Pada sal. Kencing'),
(72, '17', 'Sebab kelainan kebidanan langsung'),
(73, '1701', 'Keguguran'),
(74, '1702', 'Pendarahan pd. Kehamlan,persalinan & masa nifas'),
(75, '1703', 'Keracunan kehamilan (Eklamsia)'),
(76, '1704', 'Partus lama'),
(77, '1705', 'Infeksi pada masa kehamilan,persainan&nifas'),
(78, '1706', 'Hyperemesis'),
(79, '18', 'Keadaan tertentu pada masa perinatal'),
(80, '1801', 'Trauma lahir'),
(81, '1802', 'Asfiksia'),
(82, '1803', 'Tetanus Neonatorum'),
(83, '19', 'Kecelakaan dan keracunan'),
(84, '1901', 'Kecelakaan dan ruda paksa'),
(85, '1902', 'Keracunana bahan kimia'),
(86, '1903', 'Keracunan makanan'),
(87, '20', 'Penyakit kulit dan Jaringan Subkutan'),
(88, '2001', 'Peny. Kulit infeksi'),
(89, '2002', 'Peny. Kulit alergi'),
(90, '2003', 'Peny. Kullit karena jamur'),
(91, '21', 'Penyakit pada sistem otot & jar. Pengikat (Peny. Tulang belulang, radang sendi termassuk reumatik)'),
(92, '22', 'Peny. Lainnya');

-- --------------------------------------------------------

--
-- Table structure for table `m_petugas`
--

CREATE TABLE IF NOT EXISTS `m_petugas` (
`id` int(11) NOT NULL,
  `kd_petugas` text NOT NULL,
  `nama_petugas` text NOT NULL,
  `posisi` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_petugas`
--

INSERT INTO `m_petugas` (`id`, `kd_petugas`, `nama_petugas`, `posisi`) VALUES
(2, '001', 'keisha', 'DOKTER'),
(3, '002', 'kiki', 'PERAWAT');

-- --------------------------------------------------------

--
-- Table structure for table `m_poli`
--

CREATE TABLE IF NOT EXISTS `m_poli` (
`id` int(11) NOT NULL,
  `nama_poli` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_poli`
--

INSERT INTO `m_poli` (`id`, `nama_poli`) VALUES
(1, 'POLI UMUM'),
(2, 'POLI KIA/KB'),
(3, 'POLI GIGI'),
(4, 'POLI UGD'),
(5, 'POLI RADIOLOGI'),
(6, 'POLI LABORATORIUM'),
(7, 'POLI POJOK GIZI');

-- --------------------------------------------------------

--
-- Table structure for table `m_puskes`
--

CREATE TABLE IF NOT EXISTS `m_puskes` (
`kd_puskes` int(11) NOT NULL,
  `nama_puskes` text NOT NULL,
  `alamat_puskes` text NOT NULL,
  `kd_kel` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_puskes`
--

INSERT INTO `m_puskes` (`kd_puskes`, `nama_puskes`, `alamat_puskes`, `kd_kel`) VALUES
(1, 'PUSKESMAS BANJIT', 'JL. AK GANI NO.30, KEC. BANJIT', 1);

-- --------------------------------------------------------

--
-- Table structure for table `m_ruangan`
--

CREATE TABLE IF NOT EXISTS `m_ruangan` (
`id` int(11) NOT NULL,
  `nama_ruang` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_ruangan`
--

INSERT INTO `m_ruangan` (`id`, `nama_ruang`) VALUES
(1, 'UMUM'),
(2, 'DAHLIA'),
(3, 'MAWAR'),
(4, 'KENANGA');

-- --------------------------------------------------------

--
-- Table structure for table `ms_user`
--

CREATE TABLE IF NOT EXISTS `ms_user` (
`id` tinyint(4) NOT NULL,
  `nama` text NOT NULL,
  `pwd` text NOT NULL,
  `kd_puskes` text NOT NULL,
  `shak` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ms_user`
--

INSERT INTO `ms_user` (`id`, `nama`, `pwd`, `kd_puskes`, `shak`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', '1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tr_alergi`
--

CREATE TABLE IF NOT EXISTS `tr_alergi` (
`id_alergi` int(11) NOT NULL,
  `kd_obat` text NOT NULL,
  `kd_pasien` text NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tr_alergi`
--

INSERT INTO `tr_alergi` (`id_alergi`, `kd_obat`, `kd_pasien`, `keterangan`) VALUES
(2, '004', '001', 'kembung');

-- --------------------------------------------------------

--
-- Table structure for table `tr_bayar`
--

CREATE TABLE IF NOT EXISTS `tr_bayar` (
`id_bayar` int(11) NOT NULL,
  `id_daftar` int(11) NOT NULL,
  `cara_bayar` varchar(6) NOT NULL,
  `jmlbayar` double NOT NULL,
  `tglbayar` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tr_bayar`
--

INSERT INTO `tr_bayar` (`id_bayar`, `id_daftar`, `cara_bayar`, `jmlbayar`, `tglbayar`) VALUES
(1, 32, 'BAYAR', 30000, '2016-05-21');

-- --------------------------------------------------------

--
-- Table structure for table `tr_daftar`
--

CREATE TABLE IF NOT EXISTS `tr_daftar` (
`id_daftar` int(11) NOT NULL,
  `nobukti_d` varchar(50) NOT NULL,
  `tanggal_msk` date NOT NULL,
  `nama_ruang` text NOT NULL,
  `nama_kelas` text NOT NULL,
  `nama_kamar` text NOT NULL,
  `no_tidur` int(11) NOT NULL,
  `kd_petugas` text NOT NULL,
  `tgl_keluar` date NOT NULL,
  `kd_pasien` text NOT NULL,
  `umur_pasien` varchar(50) NOT NULL,
  `nama_poli` text NOT NULL,
  `jenis_daftar` int(11) NOT NULL,
  `jenis_tindakan` int(11) NOT NULL DEFAULT '0',
  `jenis_pasien` text,
  `jenis_obat` int(11) DEFAULT '0',
  `cara_bayar` text,
  `anamnesa` text,
  `keterangan` text,
  `kd_puskes` int(11) NOT NULL,
  `jmltotal` double NOT NULL DEFAULT '0',
  `jmldisc` double NOT NULL DEFAULT '0',
  `jmltotal_bersih` double NOT NULL DEFAULT '0',
  `totbayar` double NOT NULL DEFAULT '0',
  `umur_hr` int(11) NOT NULL DEFAULT '0',
  `umur_bln` int(11) NOT NULL DEFAULT '0',
  `umur_thn` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tr_daftar`
--

INSERT INTO `tr_daftar` (`id_daftar`, `nobukti_d`, `tanggal_msk`, `nama_ruang`, `nama_kelas`, `nama_kamar`, `no_tidur`, `kd_petugas`, `tgl_keluar`, `kd_pasien`, `umur_pasien`, `nama_poli`, `jenis_daftar`, `jenis_tindakan`, `jenis_pasien`, `jenis_obat`, `cara_bayar`, `anamnesa`, `keterangan`, `kd_puskes`, `jmltotal`, `jmldisc`, `jmltotal_bersih`, `totbayar`, `umur_hr`, `umur_bln`, `umur_thn`) VALUES
(30, 'TRJ-1605140001/1', '2016-05-14', '', '', '', 0, '001', '0000-00-00', '001', '25 Thn, 5 Bln', 'POLI UMUM', 1, 1, 'UMUM', 0, 'BAYAR', 'pusing, sakit perut, muter2', '', 1, 500000, 0, 0, 0, 0, 0, 25),
(31, 'TRJ-1605160001/1', '2016-05-16', '', '', '', 0, '001', '0000-00-00', '005', '15 Hr', 'POLI UMUM', 1, 0, NULL, 0, NULL, NULL, NULL, 1, 0, 0, 0, 0, 15, 0, 0),
(32, 'TRJ-1605210001/1', '2016-05-21', '', '', '', 0, '001', '0000-00-00', '003', '3 Bln', 'POLI UMUM', 1, 0, NULL, 1, NULL, NULL, NULL, 1, 30000, 0, 30000, 30000, 0, 3, 0),
(33, 'TRI-1607240001/1', '2016-07-24', 'UMUM', 'I', 'K UMUM', 2, '001', '0000-00-00', '003', '5 Bln', '', 2, 0, NULL, 0, NULL, NULL, NULL, 1, 0, 0, 0, 0, 0, 5, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tr_diagnosa`
--

CREATE TABLE IF NOT EXISTS `tr_diagnosa` (
`id_diagnosa` int(11) NOT NULL,
  `id_daftar` int(11) NOT NULL,
  `kd_penyakit_tr` varchar(15) NOT NULL,
  `jenis_diagnosa` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tr_diagnosa`
--

INSERT INTO `tr_diagnosa` (`id_diagnosa`, `id_daftar`, `kd_penyakit_tr`, `jenis_diagnosa`) VALUES
(2, 30, '305', 'PRIMER'),
(3, 30, '504', 'SEKUNDER'),
(4, 31, '406', 'PRIMER'),
(5, 31, '1402', 'SEKUNDER'),
(6, 31, '305', 'SEKUNDER'),
(7, 32, '10', 'PRIMER'),
(8, 32, '405', 'SEKUNDER');

-- --------------------------------------------------------

--
-- Table structure for table `tr_gudang`
--

CREATE TABLE IF NOT EXISTS `tr_gudang` (
`id_gudang_ob` int(11) NOT NULL,
  `no_bukti` varchar(50) NOT NULL,
  `no_faktur` varchar(25) NOT NULL,
  `tanggal` date NOT NULL,
  `jenis_trans` varchar(9) NOT NULL,
  `unit1` text NOT NULL,
  `unit2` text NOT NULL,
  `keterangan` text NOT NULL,
  `total` double NOT NULL DEFAULT '0',
  `total_disc` double NOT NULL DEFAULT '0',
  `grand_total` int(11) NOT NULL DEFAULT '0',
  `kd_puskes` varchar(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tr_gudang`
--

INSERT INTO `tr_gudang` (`id_gudang_ob`, `no_bukti`, `no_faktur`, `tanggal`, `jenis_trans`, `unit1`, `unit2`, `keterangan`, `total`, `total_disc`, `grand_total`, `kd_puskes`) VALUES
(17, 'TGM-160400001/1', '', '2016-04-22', 'TR MASUK', '', '', '', 520000, 0, 520000, '1'),
(19, 'TGM-160400002/1', '', '2016-04-22', 'TR MASUK', '', '', '', 10000, 0, 10000, '1'),
(20, 'TGM-160400003/1', '', '2016-04-22', 'TR MASUK', '', '', '', 10000, 0, 10000, '1'),
(21, 'TGK-160400001/1', '', '2016-04-22', 'TR KELUAR', '', '', '', 5000, 0, 5000, '1');

-- --------------------------------------------------------

--
-- Table structure for table `tr_gudang2`
--

CREATE TABLE IF NOT EXISTS `tr_gudang2` (
`id_isi` int(11) NOT NULL,
  `no_bukti` varchar(50) NOT NULL,
  `kd_obat` varchar(20) NOT NULL,
  `qty` int(11) NOT NULL,
  `satuan` varchar(20) NOT NULL,
  `harga` double NOT NULL,
  `disc` double NOT NULL,
  `total` double NOT NULL,
  `id_pos` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tr_gudang2`
--

INSERT INTO `tr_gudang2` (`id_isi`, `no_bukti`, `kd_obat`, `qty`, `satuan`, `harga`, `disc`, `total`, `id_pos`) VALUES
(15, 'TGM-160400001/1', '002', 100, 'tablet', 5000, 0, 500000, 1),
(17, 'TGM-160400001/1', '005', 20, 'Tablet', 1000, 0, 20000, 1),
(18, 'TGM-160400002/1', '001', 10, 'tablet', 1000, 0, 10000, 1),
(19, 'TGM-160400003/1', '004', 10, 'Tablet', 1000, 0, 10000, 1),
(20, 'TGK-160400001/1', '005', 5, 'Tablet', 1000, 0, 5000, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tr_imunisasi1`
--

CREATE TABLE IF NOT EXISTS `tr_imunisasi1` (
`id_imun1` int(11) NOT NULL,
  `kd_desa` int(11) NOT NULL,
  `tahun` int(11) NOT NULL,
  `jml_bayi` int(11) NOT NULL,
  `jml_balita` int(11) NOT NULL,
  `jml_anak` int(11) NOT NULL,
  `jml_caten` int(11) NOT NULL,
  `jml_wus_hml` int(11) NOT NULL,
  `jml_wus_tdk` int(11) NOT NULL,
  `jml_sd` int(11) NOT NULL,
  `jml_pos` int(11) NOT NULL,
  `jml_ups` int(11) NOT NULL,
  `jml_pembina` int(11) NOT NULL,
  `waktu_tmp` int(11) NOT NULL,
  `kd_puskes` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tr_imunisasi1`
--

INSERT INTO `tr_imunisasi1` (`id_imun1`, `kd_desa`, `tahun`, `jml_bayi`, `jml_balita`, `jml_anak`, `jml_caten`, `jml_wus_hml`, `jml_wus_tdk`, `jml_sd`, `jml_pos`, `jml_ups`, `jml_pembina`, `waktu_tmp`, `kd_puskes`) VALUES
(2, 2, 2015, 1, 0, 3, 4, 5, 6, 7, 8, 0, 0, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tr_imunisasi2`
--

CREATE TABLE IF NOT EXISTS `tr_imunisasi2` (
`id_imun2` int(11) NOT NULL,
  `tgl_imun` date NOT NULL,
  `nama_lokasi` text NOT NULL,
  `alamat_lokasi` text NOT NULL,
  `kd_puskes` int(11) NOT NULL,
  `kd_petugas` text NOT NULL,
  `jml_petugas` int(11) NOT NULL,
  `jml_pembina` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tr_imunisasi3`
--

CREATE TABLE IF NOT EXISTS `tr_imunisasi3` (
`id_imun3` int(11) NOT NULL,
  `id_imun2` int(11) NOT NULL,
  `nama_pasien` text NOT NULL,
  `jns_kelamin` text NOT NULL,
  `tgl_lahir` date NOT NULL,
  `alamat` text NOT NULL,
  `kd_desa` int(11) NOT NULL,
  `jenis_pasien` text NOT NULL,
  `jns_imunisasi1` text NOT NULL,
  `jns_imunisasi2` text NOT NULL,
  `jns_imunisasi3` text NOT NULL,
  `pem_fisik` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tr_inspeksi_htl`
--

CREATE TABLE IF NOT EXISTS `tr_inspeksi_htl` (
`id_inspeksi_htl` int(11) NOT NULL,
  `tgl_ins_htl` date NOT NULL,
  `kd_desa` int(11) NOT NULL,
  `nama_htl` varchar(150) NOT NULL,
  `alamat_htl` varchar(200) NOT NULL,
  `notelp_htl` varchar(30) NOT NULL,
  `noijin_htl` varchar(100) NOT NULL,
  `jml_kary` int(11) NOT NULL,
  `penanggung_htl` varchar(100) NOT NULL,
  `kd_petugas` text NOT NULL,
  `tot_nilai` int(11) NOT NULL,
  `kd_puskes` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tr_inspeksi_psr`
--

CREATE TABLE IF NOT EXISTS `tr_inspeksi_psr` (
`id_inspeksi_psr` int(11) NOT NULL,
  `tgl_ins_psr` date NOT NULL,
  `kd_desa` int(11) NOT NULL,
  `nama_psr` varchar(100) NOT NULL,
  `alamat_psr` varchar(150) NOT NULL,
  `penanggung_psr` varchar(70) NOT NULL,
  `jml_kios` int(11) NOT NULL,
  `jml_dagang` int(11) NOT NULL,
  `jml_asosi` int(11) NOT NULL,
  `kd_petugas` text NOT NULL,
  `tot_nilai` int(11) NOT NULL,
  `kd_puskes` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tr_inspeksi_rm`
--

CREATE TABLE IF NOT EXISTS `tr_inspeksi_rm` (
`id_inspeksi` int(11) NOT NULL,
  `tgl_ins` date NOT NULL,
  `kd_desa` int(11) NOT NULL,
  `nama_rm` varchar(100) NOT NULL,
  `alamat_rm` varchar(250) NOT NULL,
  `penanggung` varchar(250) NOT NULL,
  `jml_kary` int(11) NOT NULL,
  `jml_penj` int(11) NOT NULL,
  `no_ijin` varchar(200) NOT NULL,
  `kd_petugas` text NOT NULL,
  `tot_nilai` int(11) NOT NULL,
  `kd_puskes` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tr_inspeksi_rsehat`
--

CREATE TABLE IF NOT EXISTS `tr_inspeksi_rsehat` (
`id_inspeksi_rsehat` int(11) NOT NULL,
  `tgl_ins_rsehat` date NOT NULL,
  `kd_desa` int(11) NOT NULL,
  `nama_kk` varchar(200) NOT NULL,
  `rt` varchar(2) NOT NULL,
  `rw` varchar(2) NOT NULL,
  `jml_jiwa` int(11) NOT NULL,
  `kd_petugas` text NOT NULL,
  `tot_nilai` int(11) NOT NULL,
  `kd_puskes` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tr_lab`
--

CREATE TABLE IF NOT EXISTS `tr_lab` (
`id_lab` int(11) NOT NULL,
  `id_daftar` int(11) NOT NULL,
  `nama_lab` text NOT NULL,
  `qty` int(11) NOT NULL,
  `harga` double NOT NULL,
  `total` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tr_obat`
--

CREATE TABLE IF NOT EXISTS `tr_obat` (
`id_obat_tr` int(11) NOT NULL,
  `id_daftar` int(11) NOT NULL,
  `kd_obat` text NOT NULL,
  `qty` int(11) NOT NULL,
  `satuan` text NOT NULL,
  `harga` double NOT NULL,
  `total` double NOT NULL,
  `dosis` text NOT NULL,
  `spost` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tr_obat`
--

INSERT INTO `tr_obat` (`id_obat_tr`, `id_daftar`, `kd_obat`, `qty`, `satuan`, `harga`, `total`, `dosis`, `spost`) VALUES
(20, 30, '001', 10, 'tablet', 2000, 20000, '5x1 sehari', 0),
(21, 32, '002', 10, 'tablet', 3000, 30000, '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tr_pelayanan`
--

CREATE TABLE IF NOT EXISTS `tr_pelayanan` (
  `id_pelayanan` int(11) NOT NULL,
  `id_daftar` int(11) NOT NULL,
  `jenis_pasien` text NOT NULL,
  `cara_bayar` text NOT NULL,
  `anamnesa` text NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tr_poli2`
--

CREATE TABLE IF NOT EXISTS `tr_poli2` (
`id_poli2` int(11) NOT NULL,
  `id_daftar` int(11) NOT NULL,
  `kd_petugas` text NOT NULL,
  `nama_poli` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tr_posyandu`
--

CREATE TABLE IF NOT EXISTS `tr_posyandu` (
`id_posyandu` int(11) NOT NULL,
  `nama_posyandu` varchar(200) NOT NULL,
  `rt` varchar(3) NOT NULL,
  `rw` varchar(3) NOT NULL,
  `alamat_posyandu` varchar(150) NOT NULL,
  `kd_desa` int(11) NOT NULL,
  `jml_kader` int(11) NOT NULL,
  `kd_puskes` int(11) NOT NULL,
  `jenis_posyandu` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tr_radiologi`
--

CREATE TABLE IF NOT EXISTS `tr_radiologi` (
`id_radio` int(11) NOT NULL,
  `id_daftar` int(11) NOT NULL,
  `nama_radio` text NOT NULL,
  `qty` int(11) NOT NULL,
  `harga` double NOT NULL,
  `total` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tr_tindakan`
--

CREATE TABLE IF NOT EXISTS `tr_tindakan` (
`id_tindakan` int(11) NOT NULL,
  `id_daftar` int(11) NOT NULL,
  `nama_tindakan` text NOT NULL,
  `harga` double NOT NULL,
  `jml` int(11) NOT NULL,
  `total` double NOT NULL,
  `keterangan` text
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tr_tindakan`
--

INSERT INTO `tr_tindakan` (`id_tindakan`, `id_daftar`, `nama_tindakan`, `harga`, `jml`, `total`, `keterangan`) VALUES
(13, 30, 'Suntikan TBC 1cc', 500000, 1, 500000, '-');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dt_gigi`
--
ALTER TABLE `dt_gigi`
 ADD PRIMARY KEY (`id_gigi`);

--
-- Indexes for table `dt_gizi`
--
ALTER TABLE `dt_gizi`
 ADD PRIMARY KEY (`id_gizi`);

--
-- Indexes for table `dt_imunisasi`
--
ALTER TABLE `dt_imunisasi`
 ADD PRIMARY KEY (`id_imun`);

--
-- Indexes for table `dt_kes_sekolah`
--
ALTER TABLE `dt_kes_sekolah`
 ADD PRIMARY KEY (`id_sekolah`);

--
-- Indexes for table `dt_kesling`
--
ALTER TABLE `dt_kesling`
 ADD PRIMARY KEY (`id_kesling`);

--
-- Indexes for table `dt_kesmas`
--
ALTER TABLE `dt_kesmas`
 ADD PRIMARY KEY (`id_kesmas`);

--
-- Indexes for table `dt_kia`
--
ALTER TABLE `dt_kia`
 ADD PRIMARY KEY (`id_kia`);

--
-- Indexes for table `dt_lab`
--
ALTER TABLE `dt_lab`
 ADD PRIMARY KEY (`id_lab`);

--
-- Indexes for table `dt_olahraga`
--
ALTER TABLE `dt_olahraga`
 ADD PRIMARY KEY (`id_olahraga`);

--
-- Indexes for table `dt_penyakitm`
--
ALTER TABLE `dt_penyakitm`
 ADD PRIMARY KEY (`id_penyakitm`);

--
-- Indexes for table `dt_rawat_tinggal`
--
ALTER TABLE `dt_rawat_tinggal`
 ADD PRIMARY KEY (`id_rawatt`);

--
-- Indexes for table `m_desa`
--
ALTER TABLE `m_desa`
 ADD PRIMARY KEY (`kd_desa`);

--
-- Indexes for table `m_jamkes`
--
ALTER TABLE `m_jamkes`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `m_kamar`
--
ALTER TABLE `m_kamar`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `m_kec`
--
ALTER TABLE `m_kec`
 ADD PRIMARY KEY (`kd_kec`);

--
-- Indexes for table `m_kel`
--
ALTER TABLE `m_kel`
 ADD PRIMARY KEY (`kd_kel`);

--
-- Indexes for table `m_obatalkes`
--
ALTER TABLE `m_obatalkes`
 ADD PRIMARY KEY (`id_obat`);

--
-- Indexes for table `m_pasien`
--
ALTER TABLE `m_pasien`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `m_penyakit`
--
ALTER TABLE `m_penyakit`
 ADD PRIMARY KEY (`id_penyakit`);

--
-- Indexes for table `m_petugas`
--
ALTER TABLE `m_petugas`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `m_poli`
--
ALTER TABLE `m_poli`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `m_puskes`
--
ALTER TABLE `m_puskes`
 ADD PRIMARY KEY (`kd_puskes`);

--
-- Indexes for table `m_ruangan`
--
ALTER TABLE `m_ruangan`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ms_user`
--
ALTER TABLE `ms_user`
 ADD PRIMARY KEY (`id`), ADD KEY `id` (`id`);

--
-- Indexes for table `tr_alergi`
--
ALTER TABLE `tr_alergi`
 ADD PRIMARY KEY (`id_alergi`);

--
-- Indexes for table `tr_bayar`
--
ALTER TABLE `tr_bayar`
 ADD PRIMARY KEY (`id_bayar`);

--
-- Indexes for table `tr_daftar`
--
ALTER TABLE `tr_daftar`
 ADD PRIMARY KEY (`id_daftar`);

--
-- Indexes for table `tr_diagnosa`
--
ALTER TABLE `tr_diagnosa`
 ADD PRIMARY KEY (`id_diagnosa`);

--
-- Indexes for table `tr_gudang`
--
ALTER TABLE `tr_gudang`
 ADD PRIMARY KEY (`id_gudang_ob`);

--
-- Indexes for table `tr_gudang2`
--
ALTER TABLE `tr_gudang2`
 ADD PRIMARY KEY (`id_isi`);

--
-- Indexes for table `tr_imunisasi1`
--
ALTER TABLE `tr_imunisasi1`
 ADD PRIMARY KEY (`id_imun1`);

--
-- Indexes for table `tr_imunisasi2`
--
ALTER TABLE `tr_imunisasi2`
 ADD PRIMARY KEY (`id_imun2`);

--
-- Indexes for table `tr_imunisasi3`
--
ALTER TABLE `tr_imunisasi3`
 ADD PRIMARY KEY (`id_imun3`);

--
-- Indexes for table `tr_inspeksi_htl`
--
ALTER TABLE `tr_inspeksi_htl`
 ADD PRIMARY KEY (`id_inspeksi_htl`);

--
-- Indexes for table `tr_inspeksi_psr`
--
ALTER TABLE `tr_inspeksi_psr`
 ADD PRIMARY KEY (`id_inspeksi_psr`);

--
-- Indexes for table `tr_inspeksi_rm`
--
ALTER TABLE `tr_inspeksi_rm`
 ADD PRIMARY KEY (`id_inspeksi`);

--
-- Indexes for table `tr_inspeksi_rsehat`
--
ALTER TABLE `tr_inspeksi_rsehat`
 ADD PRIMARY KEY (`id_inspeksi_rsehat`);

--
-- Indexes for table `tr_lab`
--
ALTER TABLE `tr_lab`
 ADD PRIMARY KEY (`id_lab`);

--
-- Indexes for table `tr_obat`
--
ALTER TABLE `tr_obat`
 ADD PRIMARY KEY (`id_obat_tr`);

--
-- Indexes for table `tr_poli2`
--
ALTER TABLE `tr_poli2`
 ADD PRIMARY KEY (`id_poli2`);

--
-- Indexes for table `tr_posyandu`
--
ALTER TABLE `tr_posyandu`
 ADD PRIMARY KEY (`id_posyandu`);

--
-- Indexes for table `tr_radiologi`
--
ALTER TABLE `tr_radiologi`
 ADD PRIMARY KEY (`id_radio`);

--
-- Indexes for table `tr_tindakan`
--
ALTER TABLE `tr_tindakan`
 ADD PRIMARY KEY (`id_tindakan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dt_gigi`
--
ALTER TABLE `dt_gigi`
MODIFY `id_gigi` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `dt_gizi`
--
ALTER TABLE `dt_gizi`
MODIFY `id_gizi` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `dt_imunisasi`
--
ALTER TABLE `dt_imunisasi`
MODIFY `id_imun` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `dt_kes_sekolah`
--
ALTER TABLE `dt_kes_sekolah`
MODIFY `id_sekolah` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `dt_kesling`
--
ALTER TABLE `dt_kesling`
MODIFY `id_kesling` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `dt_kesmas`
--
ALTER TABLE `dt_kesmas`
MODIFY `id_kesmas` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `dt_kia`
--
ALTER TABLE `dt_kia`
MODIFY `id_kia` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `dt_lab`
--
ALTER TABLE `dt_lab`
MODIFY `id_lab` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `dt_olahraga`
--
ALTER TABLE `dt_olahraga`
MODIFY `id_olahraga` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `dt_penyakitm`
--
ALTER TABLE `dt_penyakitm`
MODIFY `id_penyakitm` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `dt_rawat_tinggal`
--
ALTER TABLE `dt_rawat_tinggal`
MODIFY `id_rawatt` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `m_desa`
--
ALTER TABLE `m_desa`
MODIFY `kd_desa` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `m_jamkes`
--
ALTER TABLE `m_jamkes`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `m_kamar`
--
ALTER TABLE `m_kamar`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `m_kec`
--
ALTER TABLE `m_kec`
MODIFY `kd_kec` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `m_kel`
--
ALTER TABLE `m_kel`
MODIFY `kd_kel` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `m_obatalkes`
--
ALTER TABLE `m_obatalkes`
MODIFY `id_obat` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `m_pasien`
--
ALTER TABLE `m_pasien`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT for table `m_penyakit`
--
ALTER TABLE `m_penyakit`
MODIFY `id_penyakit` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=93;
--
-- AUTO_INCREMENT for table `m_petugas`
--
ALTER TABLE `m_petugas`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `m_poli`
--
ALTER TABLE `m_poli`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `m_puskes`
--
ALTER TABLE `m_puskes`
MODIFY `kd_puskes` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `m_ruangan`
--
ALTER TABLE `m_ruangan`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `ms_user`
--
ALTER TABLE `ms_user`
MODIFY `id` tinyint(4) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tr_alergi`
--
ALTER TABLE `tr_alergi`
MODIFY `id_alergi` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tr_bayar`
--
ALTER TABLE `tr_bayar`
MODIFY `id_bayar` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tr_daftar`
--
ALTER TABLE `tr_daftar`
MODIFY `id_daftar` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT for table `tr_diagnosa`
--
ALTER TABLE `tr_diagnosa`
MODIFY `id_diagnosa` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `tr_gudang`
--
ALTER TABLE `tr_gudang`
MODIFY `id_gudang_ob` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `tr_gudang2`
--
ALTER TABLE `tr_gudang2`
MODIFY `id_isi` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `tr_imunisasi1`
--
ALTER TABLE `tr_imunisasi1`
MODIFY `id_imun1` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tr_imunisasi2`
--
ALTER TABLE `tr_imunisasi2`
MODIFY `id_imun2` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tr_imunisasi3`
--
ALTER TABLE `tr_imunisasi3`
MODIFY `id_imun3` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tr_inspeksi_htl`
--
ALTER TABLE `tr_inspeksi_htl`
MODIFY `id_inspeksi_htl` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tr_inspeksi_psr`
--
ALTER TABLE `tr_inspeksi_psr`
MODIFY `id_inspeksi_psr` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tr_inspeksi_rm`
--
ALTER TABLE `tr_inspeksi_rm`
MODIFY `id_inspeksi` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tr_inspeksi_rsehat`
--
ALTER TABLE `tr_inspeksi_rsehat`
MODIFY `id_inspeksi_rsehat` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tr_lab`
--
ALTER TABLE `tr_lab`
MODIFY `id_lab` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tr_obat`
--
ALTER TABLE `tr_obat`
MODIFY `id_obat_tr` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `tr_poli2`
--
ALTER TABLE `tr_poli2`
MODIFY `id_poli2` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tr_posyandu`
--
ALTER TABLE `tr_posyandu`
MODIFY `id_posyandu` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tr_radiologi`
--
ALTER TABLE `tr_radiologi`
MODIFY `id_radio` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tr_tindakan`
--
ALTER TABLE `tr_tindakan`
MODIFY `id_tindakan` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
