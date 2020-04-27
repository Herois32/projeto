-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: 27-Abr-2020 às 12:07
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
-- Estrutura da tabela `tb_aulas`
--

CREATE TABLE `tb_aulas` (
  `al_id` int(11) NOT NULL,
  `al_dataInicio` date DEFAULT NULL,
  `al_dataFim` date DEFAULT NULL,
  `al_horaInico` time DEFAULT NULL,
  `al_horaFim` time DEFAULT NULL,
  `al_curso` varchar(150) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `al_arquivos` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `tb_aulas`
--

INSERT INTO `tb_aulas` (`al_id`, `al_dataInicio`, `al_dataFim`, `al_horaInico`, `al_horaFim`, `al_curso`, `al_arquivos`) VALUES
(148, '2020-04-22', '2020-04-22', '09:40:00', '23:55:00', 'aula 1', 'f5ac1d91d3ed01ee4f94f3c840accc83.mp4'),
(149, '2020-04-16', '2020-04-16', '01:00:00', '23:59:00', 'aula 2', '50ca1c4b38e096f05852ab7a62c556cb.mp4'),
(150, '2020-04-20', '2020-04-20', '22:15:00', '22:16:00', 'Aula 3', 'f003d907c18a8076ad5d91f9a4bf31fb.mp4'),
(153, '2020-04-24', '2020-04-24', '18:00:00', '23:59:00', 'Lente de contato', '69ca3e042d387296b711e911cb49b37c.mp4'),
(154, '2020-04-25', '2020-04-25', '09:45:00', '20:46:00', 'Conhecer mais', 'faa521da4902a8bdc6c77bf6f39b2b39.mp4');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_certificados`
--

CREATE TABLE `tb_certificados` (
  `cf_id` int(11) NOT NULL,
  `cf_IdUsr` int(11) NOT NULL,
  `cf_data` date NOT NULL,
  `cf_idAula` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `tb_certificados`
--

INSERT INTO `tb_certificados` (`cf_id`, `cf_IdUsr`, `cf_data`, `cf_idAula`) VALUES
(1, 3, '2020-04-21', 148),
(2, 4, '2020-04-21', 149),
(3, 3, '2020-04-21', 153);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_comentarios`
--

CREATE TABLE `tb_comentarios` (
  `cm_id` int(11) NOT NULL,
  `cm_idUsr` int(11) DEFAULT NULL,
  `cm_cometarios` text CHARACTER SET utf8,
  `cm_data` datetime DEFAULT NULL,
  `cm_nome` varchar(150) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `cm_idRoles` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `tb_comentarios`
--

INSERT INTO `tb_comentarios` (`cm_id`, `cm_idUsr`, `cm_cometarios`, `cm_data`, `cm_nome`, `cm_idRoles`) VALUES
(5, 0, 'Empresa Brasileira de Correios e TelÃ©grafos, ou simplesmente Correios, Ã© uma empresa pÃºblica federal responsÃ¡vel pela execuÃ§Ã£o do sistema de envio e entrega de correspondÃªncias no Brasil. A legislaÃ§Ã£o brasileira prevÃª o monopÃ³lio da ECT nos serviÃ§os de carta, cartÃ£o postal, correspondÃªncia agrupada e', '2020-04-08 00:00:00', 'Fernanda Almeida', 2),
(6, 0, ' Empresa Brasileira de Correios e TelÃ©grafos, ou simplesmente Correios, Ã© uma empresa pÃºblica federal responsÃ¡vel pela execuÃ§Ã£o do sistema de envio e entrega de correspondÃªncias no Brasil. A legislaÃ§Ã£o brasileira prevÃª o monopÃ³lio da ECT nos serviÃ§os de carta, cartÃ£o postal, correspondÃªncia agrupada e', '2020-04-08 00:00:00', 'Fernanda Almeida', 2),
(7, 0, 'Empresa Brasileira de Correios e TelÃ©grafos, ou simplesmente Correios, Ã© uma empresa pÃºblica federal responsÃ¡vel pela execuÃ§Ã£o do sistema de envio e entrega de correspondÃªncias no Brasil. A legislaÃ§Ã£o brasileira ', '2020-04-08 17:00:07', 'Fernanda Almeida', 2),
(8, 0, 'Geo lindÃ£o.', '2020-04-08 17:01:18', 'Fernanda Almeida', 2),
(9, 0, 'sdfdddddddddddddddddddddddddddddddd', '2020-04-08 17:09:11', 'Fernanda Almeida', 2),
(10, 0, 'Empresa Brasileira de Correios e TelÃ©grafos, ou simplesmente Correios, Ã© uma empresa pÃºblica federal responsÃ¡vel pela execuÃ§Ã£o do sistema de envio e entrega de correspondÃªncias no Brasil. A legislaÃ§Ã£o brasileira\nEmpresa Brasileira de Correios e TelÃ©grafos, ou simplesmente Correios, Ã© uma empresa pÃºblica federal responsÃ¡vel pela execuÃ§Ã£o do sistema ', '2020-04-14 16:20:04', 'Cintia Ferreira', 2),
(11, 0, 'Brasil. A legislaÃ§Ã£o brasileira Empresa Brasileira de Correios e TelÃ©grafos, ou simplesmente Correios, Ã© uma empresa pÃºblica federal responsÃ¡vel pela execuÃ§Ã£o do sistema', '2020-04-14 20:16:03', 'Orlando Neto', 2),
(12, 0, 'Empresa Brasileira de Correios e TelÃ©grafos, ou simplesmente Correios, Ã© uma empresa pÃºblica federal responsÃ¡vel pela execuÃ§Ã£o do sistema de envio e entrega de correspondÃªncias no Brasil. A legislaÃ§Ã£o brasileira Empresa Brasileira de Correios e TelÃ©grafos, ou simplesmente Correios, Ã© uma empresa pÃºblica federal responsÃ¡vel pela execuÃ§Ã£o do sistema', '2020-04-14 20:16:14', 'Orlando Neto', 2),
(13, 0, 'Empresa Brasileira de Correios e TelÃ©grafos, ou simplesmente Correios, ', '2020-04-14 20:16:32', 'Orlando Neto', 2),
(14, 4, 'Brasil. A legislaÃ§Ã£o brasileira Empresa Brasileira de Correios e TelÃ©grafos, ou simplesmente Correios, Ã© uma empresa pÃºblica federal responsÃ¡vel pela execuÃ§Ã£o do sistema', '2020-04-14 21:27:00', 'Cintia Ferreira', 2),
(15, 4, 'zsdfsdfasdf', '2020-04-14 21:31:35', 'Cintia Ferreira', 2),
(16, 4, 'aSASasAS', '2020-04-14 21:32:35', 'Cintia Ferreira', 2),
(17, 4, 'csdasdasd', '2020-04-14 21:32:54', 'Cintia Ferreira', 2),
(18, 3, 'dddddsa', '2020-04-14 21:48:55', 'Fernanda Almeida', 2),
(19, 3, 'aaaaaaaaa', '2020-04-14 21:49:05', 'Fernanda Almeida', 2),
(20, 3, 'dddddaaaaaaaa', '2020-04-14 21:49:23', 'Fernanda Almeida', 2),
(21, 3, 'Teste', '2020-04-14 22:17:05', 'Fernanda Almeida', 2),
(22, 3, 'fdsfasdfasdfasdfasdfasdfasdfsadf', '2020-04-14 22:18:00', 'Fernanda Almeida', 2),
(23, 3, 'dfdfasddddddddddddddddddddddd', '2020-04-14 22:18:06', 'Fernanda Almeida', 2),
(24, 3, 'fgsdfgsdfgsdf', '2020-04-14 22:20:14', 'Fernanda Almeida', 2),
(25, 3, 'fdsgfgs', '2020-04-14 22:20:19', 'Fernanda Almeida', 2),
(26, 3, 'gfdhgdff', '2020-04-14 22:20:44', 'Fernanda Almeida', 2),
(27, 3, 'hjjjjjjjjj', '2020-04-14 22:20:51', 'Fernanda Almeida', 2),
(28, 3, 'pppppp', '2020-04-14 22:21:02', 'Fernanda Almeida', 2),
(29, 3, 'Testando', '2020-04-14 22:21:38', 'Fernanda Almeida', 2),
(30, 3, 'teste teste', '2020-04-14 22:22:01', 'Fernanda Almeida', 2),
(31, 3, 'asdasdsd', '2020-04-14 22:22:07', 'Fernanda Almeida', 2),
(32, 3, 'assadsd', '2020-04-14 22:23:02', 'Fernanda Almeida', 2),
(33, 3, 'sddddddddd', '2020-04-14 22:23:27', 'Fernanda Almeida', 2),
(34, 3, 'yt', '2020-04-14 22:23:55', 'Fernanda Almeida', 2),
(35, 3, 'saaaaaaaaaaaa', '2020-04-14 22:24:19', 'Fernanda Almeida', 2),
(36, 3, 'fsdgsdfg', '2020-04-14 22:24:46', 'Fernanda Almeida', 2),
(37, 3, 'Em linguÃ­stica, a noÃ§Ã£o de texto Ã© ampla e ainda aberta a uma definiÃ§Ã£o mais precisa. Grosso modo, pode ser entendido como manifestaÃ§Ã£o linguÃ­stica das ideias de um autor, que serÃ£o interpretadas pelo leitor de acordo com seus conhecimentos linguÃ­sticos e culturais. Seu tamanho Ã© variÃ¡ve', '2020-04-14 22:25:22', 'Fernanda Almeida', 2),
(38, 3, 'Em linguÃ­stica, a noÃ§Ã£o de texto Ã© ampla e ainda aberta a uma definiÃ§Ã£o mais precisa. Grosso modo, pode ser entendido como manifestaÃ§Ã£o linguÃ­stica das ideias de um autor, que serÃ£o interpretadas pelo leitor de acordo com seus conhecimentos linguÃ­sticos e culturais. Seu tamanho Ã© variÃ¡ve', '2020-04-14 22:26:47', 'Fernanda Almeida', 2),
(39, 3, 'Em linguÃ­stica, a noÃ§Ã£o de texto Ã© ampla e ainda aberta a uma definiÃ§Ã£o mais precisa. Grosso modo, pode ser entendido como manifestaÃ§Ã£o linguÃ­stica das ideias de um autor, que serÃ£o interpretadas pelo leitor de acordo com seus conhecimentos linguÃ­sticos e culturais. Seu tamanho Ã© variÃ¡ve', '2020-04-14 22:28:44', 'Fernanda Almeida', 2),
(40, 3, 'kkldsjfkjaskd', '2020-04-14 22:31:46', 'Fernanda Almeida', 2),
(41, 3, 'sadasd', '2020-04-14 22:32:19', 'Fernanda Almeida', 2),
(42, 3, 'George ', '2020-04-14 22:32:54', 'Fernanda Almeida', 2),
(43, 3, 'fasdfsa', '2020-04-14 22:32:58', 'Fernanda Almeida', 2),
(44, 5, 'usuÃ¡rio Orlando', '2020-04-14 22:33:33', 'Orlando Neto', 2),
(45, 5, 'sfdad', '2020-04-14 22:33:57', 'Orlando Neto', 2),
(46, 5, 'asdasda', '2020-04-14 22:34:53', 'Orlando Neto', 2),
(47, 5, 'aaaaaaaaaaaaaaa', '2020-04-14 22:34:57', 'Orlando Neto', 2),
(48, 5, 'qqqqqqqqqq', '2020-04-14 22:35:00', 'Orlando Neto', 2),
(49, 4, 'sddfsd', '2020-04-14 22:35:45', 'Cintia Ferreira', 2),
(50, 4, 'sdasdas', '2020-04-14 22:45:34', 'Cintia Ferreira', 2),
(51, 4, 'sdasdas', '2020-04-14 22:45:38', 'Cintia Ferreira', 2),
(52, 5, 'asdasd', '2020-04-14 22:49:57', 'Orlando Neto', 2),
(53, 5, 'SADDDDDDDD', '2020-04-14 22:52:31', 'Orlando Neto', 2),
(54, 5, 'Dasdasdas', '2020-04-14 22:53:01', 'Orlando Neto', 2),
(55, 4, 'saSADAS', '2020-04-14 22:55:25', 'Cintia Ferreira', 2),
(56, 4, 'saSADAS', '2020-04-14 22:55:29', 'Cintia Ferreira', 2),
(57, 3, 'sads', '2020-04-14 23:08:04', 'Fernanda Almeida', 2),
(58, 5, 'asdsa', '2020-04-14 23:08:57', 'Orlando Neto', 2),
(59, 4, 'sadasd', '2020-04-14 23:10:35', 'Cintia Ferreira', 2),
(60, 4, 'Em linguÃ­stica, a noÃ§Ã£o de texto Ã© ampla e ainda aberta a uma definiÃ§Ã£o mais precisa. Grosso modo, pode ser entendido como manifestaÃ§Ã£o linguÃ­stica das ideias de um autor, que serÃ£o interpretadas pelo leitor de acordo com seus conhecimentos linguÃ­sticos e culturais. Seu tamanho Ã© variÃ¡ve', '2020-04-14 23:10:49', 'Cintia Ferreira', 2),
(61, 4, 'Em linguÃ­stica, a noÃ§Ã£o de texto Ã© ampla e ainda aberta a uma definiÃ§Ã£o mais precisa. Grosso modo, pode ser entendido como manifestaÃ§Ã£o linguÃ­stica das ideias de um autor, que serÃ£o interpretadas pelo leitor de acordo com seus conhecimentos linguÃ­sticos e culturais. Seu tamanho Ã© variÃ¡ve\nEm linguÃ­stica, a noÃ§Ã£o de texto Ã© ampla e ainda aberta a uma', '2020-04-14 23:10:55', 'Cintia Ferreira', 2),
(62, 4, 'Em linguÃ­stica, a noÃ§Ã£o de texto Ã© ampla e ainda aberta a uma definiÃ§Ã£o mais precisa. Grosso modo, pode ser entendido como manifestaÃ§Ã£o linguÃ­stica das ideias de um autor, que serÃ£o interpretadas pelo leitor de acordo com seus conhecimentos linguÃ­sticos e culturais. Seu tamanho Ã© variÃ¡ve Em linguÃ­stica, a noÃ§Ã£o de texto Ã© ampla e ainda aberta a uma', '2020-04-14 23:12:24', 'Cintia Ferreira', 2),
(63, 4, 'Em linguÃ­stica, a noÃ§Ã£o de texto Ã© ampla e ainda aberta a uma definiÃ§Ã£o mais precisa. Grosso modo, pode ser entendido como manifestaÃ§Ã£o linguÃ­stica das ideias de um autor, que serÃ£o interpretadas pelo leitor de acordo com seus conhecimentos linguÃ­sticos e culturais. Seu tamanho Ã© variÃ¡ve Em linguÃ­stica, a noÃ§Ã£o de texto Ã© ampla e ainda aberta a uma\nEm linguÃ­stica, a noÃ§Ã£o de texto Ã© ampla e ainda aberta a uma definiÃ§Ã£o mais precisa. Grosso modo, ', '2020-04-14 23:13:02', 'Cintia Ferreira', 2),
(64, 4, 'Em linguÃ­stica, a noÃ§Ã£o de texto Ã© ampla e ainda aberta a uma definiÃ§Ã£o mais precisa. Grosso modo, pode ser entendido como manifestaÃ§Ã£o linguÃ­stica das ideias de um autor, que serÃ£o interpretadas pelo leitor de acordo c', '2020-04-14 23:13:29', 'Cintia Ferreira', 2),
(65, 4, 'dsadasd', '2020-04-14 23:14:46', 'Cintia Ferreira', 2),
(66, 4, 'ssssssssss', '2020-04-14 23:14:58', 'Cintia Ferreira', 2),
(67, 3, 'Em linguÃ­stica, a noÃ§Ã£o de texto Ã© ampla e ainda aberta a uma definiÃ§Ã£o mais precisa. Grosso modo, pode ser entendido como manifestaÃ§Ã£o linguÃ­stica das ideias de um autor, que serÃ£o interpretadas pelo leitor de acordo com seus conhecimentos linguÃ­sticos e culturais. Seu tamanho Ã© variÃ¡ve Em linguÃ­stica, a noÃ§Ã£o de texto Ã© ampla e ainda aberta a uma', '2020-04-14 23:15:31', 'Fernanda Almeida', 2),
(68, 3, 'vsdfsdfsdf', '2020-04-14 23:16:17', 'Fernanda Almeida', 2),
(69, 3, 'sdfasdfasd', '2020-04-14 23:16:49', 'Fernanda Almeida', 2),
(70, 3, 'dfgsdfgsdf', '2020-04-14 23:17:17', 'Fernanda Almeida', 2),
(71, 5, 'Em linguÃ­stica, a noÃ§Ã£o de texto Ã© ampla e ainda aberta a uma definiÃ§Ã£o mais precisa. Grosso modo, pode ser entendido como manifestaÃ§Ã£o linguÃ­stica das ideias de um autor, que serÃ£o interpretadas pelo leitor de acordo com seus conhecimentos linguÃ­sticos e culturais. Seu tamanho Ã© variÃ¡ve', '2020-04-14 23:17:40', 'Orlando Neto', 2),
(72, 5, 'Em linguÃ­stica, a noÃ§Ã£o de texto Ã© ampla e ainda aberta a uma definiÃ§Ã£o mais precisa. Grosso modo, pode ser entendido como manifestaÃ§Ã£o linguÃ­stica das ideias de um autor, que serÃ£o interpretadas pelo leitor de acordo com seus conhecimentos linguÃ­sticos e culturais. Seu tamanho Ã© variÃ¡ve', '2020-04-14 23:17:53', 'Orlando Neto', 2),
(73, 5, 'Em linguÃ­stica, a noÃ§Ã£o de texto Ã© ampla e ainda aberta a uma definiÃ§Ã£o mais precisa. Grosso modo, pode ser ente', '2020-04-14 23:18:00', 'Orlando Neto', 2),
(74, 5, '\nPÃ¡gina nÃ£o encontrada\nPÃ¡gina nÃ£o encontrada\nPÃ¡gina nÃ£o encontrada\nPÃ¡gina nÃ£o encontrada', '2020-04-15 10:29:30', 'Orlando Neto', 2),
(75, 5, '\nPÃ¡gina nÃ£o encontrada', '2020-04-15 10:29:37', 'Orlando Neto', 2),
(89, 5, 'sdaff', '2020-04-15 16:03:12', 'George Santos', 1),
(91, 5, 'Em linguÃ­stica, a noÃ§Ã£o de texto Ã© ampla e ainda aberta a uma definiÃ§Ã£o mais precisa. Grosso modo, pode ser ente', '2020-04-15 16:04:25', 'George Santos', 1),
(92, 5, 'Em linguÃ­stica, a noÃ§Ã£o de texto Ã© ampla e ainda aberta a uma definiÃ§Ã£o mais precisa. Grosso modo, pode ser enteEm linguÃ­stica, a noÃ§Ã£o de texto Ã© ampla e ainda aberta a uma definiÃ§Ã£o mais precisa. Grosso modo, pode ser ente', '2020-04-15 16:09:02', 'George Santos', 1),
(93, 4, 'Cintia perguntou', '2020-04-15 16:17:17', 'Cintia Ferreira', 2),
(94, 3, 'SÃ³ fique atento que, por motivos alheios ao bom senso, parse_str por padrÃ£o extrai as variÃ¡veis no escopo onde foi chamada. Ã‰ necessÃ¡rio passar um segundo argumento para ter um array gerado por referÃªncia, como no exemplo acima com a variÃ¡vel.', '2020-04-15 16:25:21', 'Fernanda Almeida', 2),
(95, 3, 'Em linguÃ­stica, a noÃ§Ã£o de texto Ã© ampla e ainda aberta a uma definiÃ§Ã£o mais precisa. Grosso modo, pode ser entendido como manifestaÃ§Ã£o linguÃ­stica das ideias de um autor, que serÃ£o interpretadas pelo leitor de acordo com seus conhecimentos linguÃ­sticos e culturais.', '2020-04-15 16:27:56', 'Fernanda Almeida', 2),
(96, 3, 'Mesmo que menos comum (e menos Ãºtil), colocar uma query string numa URL Ã© um trabalho trivial demais pra ser feito com implode, concatenando tudo ou qualquer outro mÃ©todo engenhoso. Desde o lanÃ§amento do PHP 5 Ã© possÃ­vel contar com a http_build_query', '2020-04-15 16:28:35', 'Fernanda Almeida', 2),
(97, 3, 'Mesmo que menos comum (e menos Ãºtil), colocar uma query string numa URL Ã© um trabalho trivial demais pra ser feito com implode, concatenando tudo ou qualquer outro mÃ©todo engenhoso. Desde o lanÃ§amento do PHP 5 Ã© possÃ­vel contar com a http_build_queryMesmo que menos comum (e menos Ãºtil), colocar uma query string numa URL Ã© um trabalho trivial demais pra ser feito com implode, concatenando tudo ou qualquer outro mÃ©todo engenhoso. Desde o lanÃ§amento', '2020-04-15 16:29:07', 'Fernanda Almeida', 2),
(98, 4, 'Video louco \n', '2020-04-15 22:51:51', 'Cintia Ferreira', 2),
(99, 4, 'loucÃ£o mesmo!. ', '2020-04-15 22:57:48', 'Idelvan Isidorio', 1),
(100, 4, 'Testado o usuario Cintia Ferreira', '2020-04-16 11:13:13', 'George Santos', 1),
(101, 4, 'Testou', '2020-04-16 11:26:42', 'Cintia Ferreira', 2),
(102, 4, 'ffffff', '2020-04-16 11:29:02', 'Cintia Ferreira', 2),
(103, 4, 'sdafffffrtertwert rtewtwerte rttweqwbxvbxfg', '2020-04-17 13:49:20', 'George Santos', 1),
(104, 4, 'dsads', '2020-04-18 22:00:33', 'George Santos', 1),
(105, 5, 'sasddfdf', '2020-04-20 20:54:53', 'Orlando Neto', 2),
(106, 3, 'ala boa noite como eu faco para responder a qustao\n', '2020-04-20 20:55:14', 'Fernanda Almeida', 2),
(107, 4, 'O nome do aluno Ã© Gildemar e nÃ£o Gilnar', '2020-04-20 20:56:37', 'Cintia Ferreira', 2),
(108, 4, 'O nome dele Ã© cintia', '2020-04-20 20:57:28', 'George Santos', 1),
(109, 5, 'kkkkkkkkkkkk', '2020-04-20 20:57:43', 'George Santos', 1),
(110, 3, 'Gilmar sua nota Ã© 5 na prova', '2020-04-20 21:00:06', 'George Santos', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_mensagens`
--

CREATE TABLE `tb_mensagens` (
  `ms_id` int(11) NOT NULL,
  `ms_titulo` varchar(150) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `ms_descricao` text CHARACTER SET utf8 NOT NULL,
  `ms_data` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `tb_mensagens`
--

INSERT INTO `tb_mensagens` (`ms_id`, `ms_titulo`, `ms_descricao`, `ms_data`) VALUES
(1, 'Curso de Fundo de Olho', 'Esse nome “fundo de olho” advém da localização da retina, camada interna do olho, localizada no fundo (parte posterior) e não no começo do olho. Muitas doenças podem acometer a retina e levar a baixa visão, por isso uma boa avaliação se faz necessário.', '2020-04-23'),
(2, 'Curso Lente de contato', 'Não fique nervoso. Colocar e tirar suas lentes de contato é mais fácil do que você imagina. Pode levar alguns dias para seus olhos se acostumarem à sensação de usar lentes. Se você está se sentindo incomodado, não force o uso e dê um tempo aos seus olhos, para que eles fiquem confortáveis. Não há pressa, você sempre pode tentar de novo amanhã.', '2020-04-23'),
(7, 'Curso de lente de contato', 'Curso de lente de contato óculos ', '2020-04-25'),
(6, 'Servidores com problema ', 'teste', '2020-04-25');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_roles`
--

CREATE TABLE `tb_roles` (
  `rl_id` int(11) NOT NULL,
  `rl_perfil` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `rl_nivel` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `tb_roles`
--

INSERT INTO `tb_roles` (`rl_id`, `rl_perfil`, `rl_nivel`) VALUES
(1, 'admin', 1),
(2, 'usr', 2);

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
(1, 'george_diu@hotmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'George Santos', '2020-04-03', 'M', '71993565581', '01234567891', 'Online', 1, 124, '2020-04-27 10:41:51', '187.49.153.6', '10:42:49'),
(2, 'idelvan.isidorio@hotmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Idelvan Isidorio', '2020-04-04', 'M', '7199999999', '15236541851', 'Online', 1, 44, '2020-04-22 23:26:33', '189.14.167.11', '16:30:00'),
(3, 'fernanda.almeida@hotmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Fernanda Almeida', '2020-04-04', 'F', '7199858654', '09876543210', 'Online', 2, 77, '2020-04-25 19:56:10', '187.49.153.6', '19:57:04'),
(4, 'cintia.ferreira@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Cintia Ferreira', '2020-04-14', 'F', '71993565581', '15236541412', 'Online', 2, 173, '2020-04-27 09:22:12', '187.49.153.6', '09:22:12'),
(5, 'orlando.neto@hotmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Orlando Neto', '2020-04-14', 'M', '7199853288', '32152369810', 'Online', 2, 25, '2020-04-24 00:01:05', '187.49.153.6', '16:30:00'),
(6, 'jgdahora@gmail.com', '63e429c779309c42569ca36c4230e080', 'Juarez Goncalves', '2020-04-20', 'M', '7199858654', '09876543210', 'Online', 1, 17, '2020-04-25 09:42:32', '179.198.163.21', '16:30:00'),
(7, 'junioroliveira1957@hotmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Gilmar Oliveira', '2020-04-20', 'M', '71993655581', '15236541851', 'Online', 1, 6, '2020-04-24 20:53:38', '179.199.225.127', '16:30:00'),
(22, 'juliana.farias@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Juliana Faria', '2020-04-24', 'M', '71998522111', '011552212211', 'Desativado', 1, 0, '2020-04-24 00:00:00', '1', '16:30:00'),
(12, 'carla.santos@hotmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Carla Ribeiro dos Santos', '2020-04-23', 'M', '71569854455', '122.540.225-53', 'Desativado', 1, 0, '2020-04-23 00:00:00', '1', '16:30:00'),
(21, 'rodrigo.santos@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Rodrigo Santos', '2020-04-24', 'M', '71998522111', '01115110543', 'Desativado', 1, 1, '2020-04-24 19:50:35', '1', '16:30:00'),
(18, 'gustavo.silva@hotmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Gustavo Silva', '2020-04-23', 'M', '71988545210', '24153265987', 'Online', 2, 2, '2020-04-23 21:35:10', '187.49.153.6', '16:30:00'),
(23, 'luis.azevedo@hotmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Luis Azevedo', '2020-04-25', 'M', '(75) 98807161', '122.120.012-22', 'Desativado', 1, 1, '2020-04-25 15:38:53', '1', '16:30:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_aulas`
--
ALTER TABLE `tb_aulas`
  ADD PRIMARY KEY (`al_id`);

--
-- Indexes for table `tb_certificados`
--
ALTER TABLE `tb_certificados`
  ADD PRIMARY KEY (`cf_id`);

--
-- Indexes for table `tb_comentarios`
--
ALTER TABLE `tb_comentarios`
  ADD PRIMARY KEY (`cm_id`);

--
-- Indexes for table `tb_mensagens`
--
ALTER TABLE `tb_mensagens`
  ADD PRIMARY KEY (`ms_id`);

--
-- Indexes for table `tb_roles`
--
ALTER TABLE `tb_roles`
  ADD PRIMARY KEY (`rl_id`);

--
-- Indexes for table `tb_usuarios`
--
ALTER TABLE `tb_usuarios`
  ADD PRIMARY KEY (`usr_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_aulas`
--
ALTER TABLE `tb_aulas`
  MODIFY `al_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=155;

--
-- AUTO_INCREMENT for table `tb_certificados`
--
ALTER TABLE `tb_certificados`
  MODIFY `cf_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_comentarios`
--
ALTER TABLE `tb_comentarios`
  MODIFY `cm_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;

--
-- AUTO_INCREMENT for table `tb_mensagens`
--
ALTER TABLE `tb_mensagens`
  MODIFY `ms_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tb_roles`
--
ALTER TABLE `tb_roles`
  MODIFY `rl_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_usuarios`
--
ALTER TABLE `tb_usuarios`
  MODIFY `usr_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
