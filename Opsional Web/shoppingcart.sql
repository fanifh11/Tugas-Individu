-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 23 Bulan Mei 2020 pada 14.04
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shoppingcart`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `desc` text NOT NULL,
  `price` decimal(7,2) NOT NULL,
  `rrp` decimal(7,2) NOT NULL DEFAULT 0.00,
  `quantity` int(11) NOT NULL,
  `img` text NOT NULL,
  `date_added` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `products`
--

INSERT INTO `products` (`id`, `name`, `desc`, `price`, `rrp`, `quantity`, `img`, `date_added`) VALUES
(1, 'RG Wing Gundam Zero EW Model Kit', 'The ever iconic winged Gundam from Gundam Wing Endless Waltz returns in Real Grade form! The wing structure of this Wing Zero interpretation are based on application of current real world technology used in aircraft. Considerable thought has been put into heat protection and machine protection as well as design and function for an otherwise unorthodox mecha design. Even the flexible feather shaped extremities incorporate elements from thrust vectoring mechanisms of combat aircraft. Twin Buster Rifle and beam sabers included. Approx 5\" tall. Runner x9, Instruction Manual x1, Realistic decal x1.', '49.99', '0.00', 40, 'G01.jpg', '2020-05-22 21:57:39'),
(2, 'Reborns Gundam HG Gundam 00 Action Figure', 'Used in the final confrontation in the Gundam 00 anime, the Reborn can transform between its cannon mode and standard form. Beam rifle, beam sabers, detachable GN Fangs are included.', '26.95', '0.00', 20, 'G02.jpg', '2020-05-22 22:07:04'),
(3, 'Gundam Build Divers RE:Rise #01 Earthree Gundam, Bandai Spirits HGBD:R1/144', 'Dock\'s with earth armor, hiroto\'s rx-78 inspired core Gundam becomes the earthree Gundam.', '34.50', '0.00', 100, 'G03.jpg', '2020-05-22 22:14:25'),
(4, 'Bandai Hobby HGBD 1/144#13 New Main Mobile Suit (Tentative) Gundam Build Divers, Multi', '#13 New Main Mobile Suit (Tentative) \"Gundam Build Divers\", Bandai Spirits HGBD 1/144 - From \"Gundam Build Divers Re: RISE\", a new enhanced mecha for the main hero arrives sporting a beam gatling gun and backpack unit with remote weapons. Backpack Funnel Bits can detach and held by arms or displayed in mid-air with included stand and features effect parts. Armor unit can recreate normal and high speed forms. Includes Core Gundm with new different colored parts, 2 beam sabers and display stand.', '37.99', '0.00', 44, 'G08.jpg', '2020-05-22 22:21:53'),
(5, 'Gundam Build Divers RE:Rise #08 Core Gundam (Real Type Color) &Marsfour Unit, Bandai Spirits HGBD:R 1/144', '#08 Core Gundam (Real Type Color) & Marsfour Unit \"Gundam Build Divers RE: Rise\", Bandai Spirits HGBD: R 1/144 A set that includes the Core Gundam in Real Type colors and armor set for the MARSFOUR Gundam. Can be combined with BAS5058825 MARSFOUR Weapons to make the MARSFOUR Gundam. Includes Rifle and shield. Can also be combined with other Core Gundam Planet Equipment for custom color combinations.', '40.90', '0.00', 2, 'G06.jpg', '2020-05-22 22:23:49');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
