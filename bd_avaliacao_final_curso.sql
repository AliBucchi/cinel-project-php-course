-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 18, 2023 at 11:59 AM
-- Server version: 5.7.37
-- PHP Version: 8.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `avaliacao`
--

-- --------------------------------------------------------

--
-- Table structure for table `imagem`
--

CREATE TABLE `imagem` (
  `idImagem` int(11) NOT NULL,
  `src` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `imagem`
--

INSERT INTO `imagem` (`idImagem`, `src`) VALUES
(2, 'assets/img/avatars/dnByZXNzMTE2MC5qcGc=230218101557.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `ufcd`
--

CREATE TABLE `ufcd` (
  `idUFCD` int(11) NOT NULL,
  `codigo` char(4) NOT NULL,
  `designacao` varchar(50) NOT NULL,
  `estado` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ufcd`
--

INSERT INTO `ufcd` (`idUFCD`, `codigo`, `designacao`, `estado`) VALUES
(2, '0001', 'UFCD 0001', 1),
(3, '0003', 'UFCD 0003', 1),
(5, '4321', 'Algoritmia 4321', 1),
(10, '4587', 'Teste 4587', 1),
(11, '0023', 'Teste 023', 1);

-- --------------------------------------------------------

--
-- Table structure for table `utilizador`
--

CREATE TABLE `utilizador` (
  `idUtilizador` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `senha` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `utilizador`
--

INSERT INTO `utilizador` (`idUtilizador`, `username`, `senha`) VALUES
(3, 'pedro', '123'),
(4, 'jorge', '40bd001563085fc35165329ea1ff5c5ecbdbbeef'),
(5, 'tone', '361a34850bcd4ccb8150c7672eb9ecbe6eb1484f'),
(6, 'helena@cinel.pt', 'aa743a0aaec8f7d7a1f01442503957f4d7a2d634'),
(7, 'antonio', '361a34850bcd4ccb8150c7672eb9ecbe6eb1484f'),
(8, 'allison@mail.pt', '40bd001563085fc35165329ea1ff5c5ecbdbbeef'),
(9, 'marco@mail.pt', '40bd001563085fc35165329ea1ff5c5ecbdbbeef'),
(10, 'maria@mail.pt', '40bd001563085fc35165329ea1ff5c5ecbdbbeef'),
(11, 'smsxasith\'s@mail.pt', '40bd001563085fc35165329ea1ff5c5ecbdbbeef');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `imagem`
--
ALTER TABLE `imagem`
  ADD PRIMARY KEY (`idImagem`);

--
-- Indexes for table `ufcd`
--
ALTER TABLE `ufcd`
  ADD PRIMARY KEY (`idUFCD`);

--
-- Indexes for table `utilizador`
--
ALTER TABLE `utilizador`
  ADD PRIMARY KEY (`idUtilizador`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `imagem`
--
ALTER TABLE `imagem`
  MODIFY `idImagem` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ufcd`
--
ALTER TABLE `ufcd`
  MODIFY `idUFCD` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `utilizador`
--
ALTER TABLE `utilizador`
  MODIFY `idUtilizador` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
