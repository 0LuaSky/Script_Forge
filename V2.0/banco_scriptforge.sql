-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 30, 2024 at 03:52 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `banco_scriptforge`
--

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE `usuarios` (
  `cd_usuario` int(11) NOT NULL,
  `nm_usuario` varchar(60) NOT NULL,
  `nm_email_usuario` varchar(120) NOT NULL,
  `cd_senha` varchar(60) NOT NULL,
  `dt_cadastro` date NOT NULL DEFAULT current_timestamp(),
  `dt_alteracao` date NOT NULL DEFAULT current_timestamp(),
  `im_usuario` int(11) NOT NULL,
  `sg_admin_s` varchar(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`cd_usuario`, `nm_usuario`, `nm_email_usuario`, `cd_senha`, `dt_cadastro`, `dt_alteracao`, `im_usuario`, `sg_admin_s`) VALUES
(12, 'admin', 'admin@admin.com', 'd033e22ae348aeb5660fc2140aec35850c4da997', '2024-10-15', '2024-10-17', 0, 'S'),
(13, 'Luana', 'luana@admin.com', 'd033e22ae348aeb5660fc2140aec35850c4da997', '2024-10-15', '2024-10-27', 0, 'S'),
(18, 'carlos', 'carlos@gmail.com', 'da39a3ee5e6b4b0d3255bfef95601890afd80709', '2024-10-17', '2024-10-17', 0, NULL),
(19, 'Pedro', 'pedro@gmail.com', '01b307acba4f54f55aafc33bb06bbbf6ca803e9a', '2024-10-17', '2024-10-17', 0, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`cd_usuario`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `cd_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
