-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: 08-Maio-2020 às 09:35
-- Versão do servidor: 5.6.41-84.1
-- versão do PHP: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sofdev27_sistemaaula`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_usuarios`
--

CREATE TABLE `tb_usuarios` (
  `usr_id` int(11) NOT NULL,
  `usr_email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `usr_password` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `usr_nome` varchar(200) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `usr_data_registro` date NOT NULL,
  `usr_sexo` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `usr_telefone` varchar(13) COLLATE utf8_unicode_ci DEFAULT NULL,
  `usr_cpf` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `usr_status` varchar(12) COLLATE utf8_unicode_ci DEFAULT NULL,
  `usr_id_roles` int(11) DEFAULT NULL,
  `usr_logado` int(11) DEFAULT NULL,
  `usr_ultimo_acesso` datetime DEFAULT NULL,
  `usr_ip` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `usr_hora` time DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `tb_usuarios`
--

INSERT INTO `tb_usuarios` (`usr_id`, `usr_email`, `usr_password`, `usr_nome`, `usr_data_registro`, `usr_sexo`, `usr_telefone`, `usr_cpf`, `usr_status`, `usr_id_roles`, `usr_logado`, `usr_ultimo_acesso`, `usr_ip`, `usr_hora`) VALUES
(1, 'george_diu@hotmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'George Santos', '2020-04-03', 'M', '71993565581', '01234567891', 'Online', 1, 152, '2020-04-30 10:41:43', '187.49.153.6', '09:27:33'),
(2, 'idelvan.isidorio@hotmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Idelvan Isidorio', '2020-04-04', 'M', '7199999999', '15236541851', 'Desativado', 1, 48, '2020-04-29 23:40:25', '1', '22:42:45'),
(3, 'fernanda.almeida@hotmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Fernanda Almeida', '2020-04-04', 'F', '7199858654', '09876543210', 'Desativado', 2, 88, '2020-04-30 10:41:17', '1', '19:16:00'),
(4, 'cintia.ferreira@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Cintia Ferreira', '2020-04-14', 'F', '71993565581', '15236541412', 'Desativado', 2, 178, '2020-04-27 20:52:10', '1', '22:38:10'),
(5, 'orlando.neto@hotmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Orlando Neto', '2020-04-14', 'M', '7199853288', '32152369810', 'Desativado', 2, 26, '2020-04-28 20:47:35', '1', '20:47:52'),
(6, 'jgdahora@gmail.com', '63e429c779309c42569ca36c4230e080', 'Juarez Goncalves', '2020-04-20', 'M', '7199858654', '09876543210', 'Online', 1, 21, '2020-04-30 07:53:35', '177.25.166.215', '22:01:09'),
(7, 'junioroliveira1957@hotmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Gildemar Oliveira', '2020-04-20', 'M', '71993655581', '15236541851', 'Desativado', 1, 12, '2020-04-29 22:50:45', '1', '22:38:25'),
(22, 'juliana.farias@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Juliana Faria', '2020-04-24', 'M', '71998522111', '011552212211', 'Desativado', 1, 0, '2020-04-24 00:00:00', '1', '16:30:00'),
(12, 'carla.santos@hotmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Carla Ribeiro dos Santos', '2020-04-23', 'M', '71569854455', '122.540.225-53', 'Desativado', 1, 0, '2020-04-23 00:00:00', '1', '16:30:00'),
(21, 'rodrigo.santos@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Rodrigo Santos', '2020-04-24', 'M', '71998522111', '01115110543', 'Online', 1, 1, '2020-04-24 19:50:35', '189.40.94.172', '22:18:15'),
(18, 'gustavo.silva@hotmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Gustavo Silva', '2020-04-23', 'M', '71988545210', '24153265987', 'Desativado', 2, 2, '2020-04-23 21:35:10', '187.49.153.6', '16:30:00'),
(23, 'luis.azevedo@hotmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Luis Azevedo', '2020-04-25', 'M', '(75) 98807161', '122.120.012-22', 'Online', 1, 1, '2020-04-25 15:38:53', '187.49.153.6', '22:23:26');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_usuarios`
--
ALTER TABLE `tb_usuarios`
  ADD PRIMARY KEY (`usr_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_usuarios`
--
ALTER TABLE `tb_usuarios`
  MODIFY `usr_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=134;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
