-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1:3306
-- Üretim Zamanı: 02 Haz 2020, 16:19:24
-- Sunucu sürümü: 5.7.24
-- PHP Sürümü: 7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `web_gunluk_vt`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kategoriler`
--

DROP TABLE IF EXISTS `kategoriler`;
CREATE TABLE IF NOT EXISTS `kategoriler` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kategori` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `aciklama` varchar(300) COLLATE utf8_turkish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=27 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `kategoriler`
--

INSERT INTO `kategoriler` (`id`, `kategori`, `aciklama`) VALUES
(23, 'Elektronik', 'elektronikle ilgili yazÄ±lar'),
(22, 'Bilgisayar', 'bilgisayarla ilgili yazÄ±lar'),
(21, 'Denemeler', 'Deneme tÃ¼rÃ¼nde yazÄ±lar'),
(10, 'Ä°slam', 'Ä°slam ile ilgili konular');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `uyeler`
--

DROP TABLE IF EXISTS `uyeler`;
CREATE TABLE IF NOT EXISTS `uyeler` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kullanici_adi` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `sifre` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `ad` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `soyad` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `email` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `telefon` varchar(30) COLLATE utf8_turkish_ci NOT NULL,
  `tur` varchar(30) COLLATE utf8_turkish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `uyeler`
--

INSERT INTO `uyeler` (`id`, `kullanici_adi`, `sifre`, `ad`, `soyad`, `email`, `telefon`, `tur`) VALUES
(6, 'deneme', '123', 'deneme', 'soyad', 'dfffff@dfs.com', '1234567', 'ABONE'),
(3, 'ali', '123', 'ali', 'can', 'gggg@bbbb.com', '123456', 'ABONE'),
(5, 'mehmet', '123456', 'Mehmet', 'Ã–ztÃ¼rk', 'ozmehh@gmail.com', '5342181836', 'YAZAR');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `yazilar`
--

DROP TABLE IF EXISTS `yazilar`;
CREATE TABLE IF NOT EXISTS `yazilar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `baslik` varchar(500) COLLATE utf8_turkish_ci NOT NULL,
  `icerik` text COLLATE utf8_turkish_ci NOT NULL,
  `kategori` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `tarih` datetime NOT NULL,
  `kullanici_adi` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `yazilar`
--

INSERT INTO `yazilar` (`id`, `baslik`, `icerik`, `kategori`, `tarih`, `kullanici_adi`) VALUES
(9, 'raspberry', ' mini bilgisayardÄ±r. arm mimarisini kullanan iÅŸlemciye sahiptir. 1, 2, 4 gb ram e sahiptir.', 'Elektronik', '2020-02-06 00:00:00', 'mehmet'),
(11, 'netbeans', 'java kullanabileceÄŸimiz bir ide dir. apache foundation tarafÄ±ndan Ã¼retilmektedir.', 'Bilgisayar', '2020-03-14 00:00:00', 'mehmet'),
(6, 'bismillah', ' bismillah diyerek baÅŸlÄ±yoruz. baÅŸarÄ± da baÅŸarÄ±sÄ±zlÄ±k da allah tandÄ±r.', 'Ä°slam', '2020-05-08 00:00:00', 'mehmet'),
(13, 'Delphi', 'GeliÅŸmiÅŸ multi platform uygulama geliÅŸtirebileceÄŸimiz bir IDE.', 'Bilgisayar', '2020-04-02 00:00:00', 'mehmet');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `yorumlar`
--

DROP TABLE IF EXISTS `yorumlar`;
CREATE TABLE IF NOT EXISTS `yorumlar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `yorum` text COLLATE utf8_turkish_ci NOT NULL,
  `yazi_id` int(11) NOT NULL,
  `kullanici_adi` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `tarih` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `yorumlar`
--

INSERT INTO `yorumlar` (`id`, `yorum`, `yazi_id`, `kullanici_adi`, `tarih`) VALUES
(3, 'deneme', 6, 'mehmet', '2020-03-24 13:36:50');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
