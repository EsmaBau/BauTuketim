-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 28 Mar 2024, 13:18:53
-- Sunucu sürümü: 10.4.32-MariaDB
-- PHP Sürümü: 8.2.12
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";
/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */
;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */
;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */
;
/*!40101 SET NAMES utf8mb4 */
;
--
-- Veritabanı: `bau_tuketim`
--

-- --------------------------------------------------------
--
-- Tablo için tablo yapısı `elektrikokuma`
--

CREATE TABLE `elektrikokuma` (
  `ElektrikOkumaId` int(11) NOT NULL,
  `KampusAd` text NOT NULL,
  `Tip` text NOT NULL,
  `TesisatNo` varchar(11) NOT NULL,
  `OkumaTarihi` date NOT NULL,
  `T1` int(11) NOT NULL,
  `T2` int(11) NOT NULL,
  `T3` int(11) NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8 COLLATE = utf8_turkish_ci;
--
-- Tablo döküm verisi `elektrikokuma`
--

INSERT INTO `elektrikokuma` (
    `ElektrikOkumaId`,
    `KampusAd`,
    `Tip`,
    `TesisatNo`,
    `OkumaTarihi`,
    `T1`,
    `T2`,
    `T3`
  )
VALUES (1, '1', '1', '1', '2024-03-05', 20, 30, 40);
-- --------------------------------------------------------
--
-- Tablo için tablo yapısı `gidertipis`
--

CREATE TABLE `gidertipis` (
  `GiderTipiId` int(11) NOT NULL,
  `Tip` text NOT NULL,
  `KampusId` int(11) NOT NULL,
  `GiderTipiStatus` int(11) NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8 COLLATE = utf8_turkish_ci;
--
-- Tablo döküm verisi `gidertipis`
--

INSERT INTO `gidertipis` (
    `GiderTipiId`,
    `Tip`,
    `KampusId`,
    `GiderTipiStatus`
  )
VALUES (1, 'Elektrik', 1, 1),
  (2, 'Su', 1, 1),
  (3, 'Doğalgaz', 1, 1),
  (4, 'Elektrik', 2, 1),
  (5, 'Su', 2, 1),
  (6, 'Doğalgaz', 2, 1),
  (7, 'Elektrik', 3, 1),
  (8, 'Su', 3, 1),
  (9, 'Doğalgaz', 3, 1),
  (10, 'Elektrik', 4, 1),
  (11, 'Su', 4, 1),
  (12, 'Doğalgaz', 4, 1);
-- --------------------------------------------------------
--
-- Tablo için tablo yapısı `kampuss`
--

CREATE TABLE `kampuss` (
  `KampusId` int(11) NOT NULL,
  `KampusAd` text NOT NULL,
  `KampusStatus` int(11) NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8 COLLATE = utf8_turkish_ci;
--
-- Tablo döküm verisi `kampuss`
--

INSERT INTO `kampuss` (`KampusId`, `KampusAd`, `KampusStatus`)
VALUES (1, 'Beşiktaş Güney Kampüs', 1),
  (2, 'Beşiktaş Kuzey Kampüs', 1),
  (3, 'Kemerburgaz(Future) Kampüs', 1),
  (4, 'Galata Kampüs', 1),
  (5, 'Pera Kampüs', 1),
  (6, 'Göztepe Kampüs', 1),
  (7, 'balmumcu Kampüs', 1),
  (8, 'Galata-İdea Kampüs', 1);
-- --------------------------------------------------------
--
-- Tablo için tablo yapısı `kampus_yetkis`
--

CREATE TABLE `kampus_yetkis` (
  `KampusYetkiId` int(11) NOT NULL,
  `KampusId` int(11) NOT NULL,
  `YetkiId` int(11) NOT NULL,
  `KampusYetkiStatus` int(11) NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8 COLLATE = utf8_turkish_ci;
--
-- Tablo döküm verisi `kampus_yetkis`
--

INSERT INTO `kampus_yetkis` (
    `KampusYetkiId`,
    `KampusId`,
    `YetkiId`,
    `KampusYetkiStatus`
  )
VALUES (1, 1, 1, 1),
  (2, 2, 2, 1),
  (3, 1, 3, 1),
  (4, 2, 3, 1),
  (5, 2, 1, 1);
-- --------------------------------------------------------
--
-- Tablo için tablo yapısı `kullaniciis`
--

CREATE TABLE `kullaniciis` (
  `KullaniciId` int(11) NOT NULL,
  `KullaniciAd` text NOT NULL,
  `KullaniciSoyad` text NOT NULL,
  `YetkiId` int(11) NOT NULL,
  `Email` text NOT NULL,
  `Sifre` int(11) NOT NULL,
  `KullaniciTelefon` int(11) NOT NULL,
  `KullaniciStatus` int(11) NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8 COLLATE = utf8_turkish_ci;
--
-- Tablo döküm verisi `kullaniciis`
--

INSERT INTO `kullaniciis` (
    `KullaniciId`,
    `KullaniciAd`,
    `KullaniciSoyad`,
    `YetkiId`,
    `Email`,
    `Sifre`,
    `KullaniciTelefon`,
    `KullaniciStatus`
  )
VALUES (
    1,
    'Esma',
    'Çelebi',
    3,
    'esma@gmail.com',
    1234,
    2147483647,
    1
  ),
  (
    2,
    'nazlıcan ',
    'kürbüz',
    1,
    'nazo@gmail.com',
    2345,
    2147483647,
    1
  );
-- --------------------------------------------------------
--
-- Tablo için tablo yapısı `tesisats`
--

CREATE TABLE `tesisats` (
  `TesisatId` int(11) NOT NULL,
  `TesisatNo` varchar(11) NOT NULL,
  `GiderTipiId` int(11) NOT NULL,
  `TesisatStatus` int(11) NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8 COLLATE = utf8_turkish_ci;
--
-- Tablo döküm verisi `tesisats`
--

INSERT INTO `tesisats` (
    `TesisatId`,
    `TesisatNo`,
    `GiderTipiId`,
    `TesisatStatus`
  )
VALUES (1, '2345678', 1, 1),
  (2, '76543', 2, 1),
  (3, '3456723', 3, 1),
  (4, '25983', 4, 1),
  (5, '2341122', 7, 1),
  (6, '34562009900', 10, 1);
-- --------------------------------------------------------
--
-- Tablo için tablo yapısı `yetkis`
--

CREATE TABLE `yetkis` (
  `YetkiId` int(11) NOT NULL,
  `YetkiAd` text NOT NULL,
  `YetkiStatus` int(11) NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8 COLLATE = utf8_turkish_ci;
--
-- Tablo döküm verisi `yetkis`
--

INSERT INTO `yetkis` (`YetkiId`, `YetkiAd`, `YetkiStatus`)
VALUES (1, 'Beşiktaş Güney Kampüs Elektrik Okuma', 1),
  (2, 'Beşiktaş Kuzey Kampüs Elektrik Okuma', 1),
  (3, 'Admin', 1),
  (4, 'Misafir', 1),
  (5, 'Beşiktaş Güney Kampüs Su Okuma', 1);
--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `elektrikokuma`
--
ALTER TABLE `elektrikokuma`
ADD PRIMARY KEY (`ElektrikOkumaId`);
--
-- Tablo için indeksler `gidertipis`
--
ALTER TABLE `gidertipis`
ADD PRIMARY KEY (`GiderTipiId`);
--
-- Tablo için indeksler `kampuss`
--
ALTER TABLE `kampuss`
ADD PRIMARY KEY (`KampusId`);
--
-- Tablo için indeksler `kampus_yetkis`
--
ALTER TABLE `kampus_yetkis`
ADD PRIMARY KEY (`KampusYetkiId`);
--
-- Tablo için indeksler `kullaniciis`
--
ALTER TABLE `kullaniciis`
ADD PRIMARY KEY (`KullaniciId`);
--
-- Tablo için indeksler `tesisats`
--
ALTER TABLE `tesisats`
ADD PRIMARY KEY (`TesisatId`);
--
-- Tablo için indeksler `yetkis`
--
ALTER TABLE `yetkis`
ADD PRIMARY KEY (`YetkiId`);
--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `elektrikokuma`
--
ALTER TABLE `elektrikokuma`
MODIFY `ElektrikOkumaId` int(11) NOT NULL AUTO_INCREMENT,
  AUTO_INCREMENT = 2;
--
-- Tablo için AUTO_INCREMENT değeri `gidertipis`
--
ALTER TABLE `gidertipis`
MODIFY `GiderTipiId` int(11) NOT NULL AUTO_INCREMENT,
  AUTO_INCREMENT = 13;
--
-- Tablo için AUTO_INCREMENT değeri `kampuss`
--
ALTER TABLE `kampuss`
MODIFY `KampusId` int(11) NOT NULL AUTO_INCREMENT,
  AUTO_INCREMENT = 9;
--
-- Tablo için AUTO_INCREMENT değeri `kampus_yetkis`
--
ALTER TABLE `kampus_yetkis`
MODIFY `KampusYetkiId` int(11) NOT NULL AUTO_INCREMENT,
  AUTO_INCREMENT = 6;
--
-- Tablo için AUTO_INCREMENT değeri `kullaniciis`
--
ALTER TABLE `kullaniciis`
MODIFY `KullaniciId` int(11) NOT NULL AUTO_INCREMENT,
  AUTO_INCREMENT = 3;
--
-- Tablo için AUTO_INCREMENT değeri `tesisats`
--
ALTER TABLE `tesisats`
MODIFY `TesisatId` int(11) NOT NULL AUTO_INCREMENT,
  AUTO_INCREMENT = 7;
--
-- Tablo için AUTO_INCREMENT değeri `yetkis`
--
ALTER TABLE `yetkis`
MODIFY `YetkiId` int(11) NOT NULL AUTO_INCREMENT,
  AUTO_INCREMENT = 6;
COMMIT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */
;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */
;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */
;