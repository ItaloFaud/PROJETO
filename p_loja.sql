-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 11-Set-2018 às 22:55
-- Versão do servidor: 10.1.34-MariaDB
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `p_loja`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `contato`
--

CREATE TABLE `contato` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `assunto` varchar(32) NOT NULL,
  `email` varchar(100) NOT NULL,
  `tel` varchar(16) NOT NULL,
  `msg` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `contato`
--

INSERT INTO `contato` (`id`, `nome`, `assunto`, `email`, `tel`, `msg`) VALUES
(1, 'Italo', 'Futebol', 'italofaud10@hotmail.com', '8896445437', 'O jogador mais caro Ã© DD'),
(2, 'Italo', 'Futebol', 'italofaud10@hotmail.com', '8896445437', 'Oi\r\n'),
(3, 'Oi', 'Casaco', 'joao@hotmail.com', '213131', 'NÃ£o presta. Muito Ruim. Por favor melhorem seu atendimento.'),
(4, 'Luizinho', 'Lixo', 'luizinhooespalhalixo10@hotmail.com', '123321', 'Cara. Deixa eu espalhar meu lixo vÃ©i.'),
(5, 'Pedim', 'Lixo', 'italofaud10@hotmail.com', '123', 'poipewipfsdcnidsfnonfjrs5g'),
(6, 'Pedim', 'Lixo', 'italofaud10@hotmail.com', '123', 'poipewipfsdcnidsfnonfjrs5g'),
(7, 'Pedim', 'Lixo', 'italofaud10@hotmail.com', '123', 'poipewipfsdcnidsfnonfjrs5g'),
(8, 'Italo', 'Lixo', 'italofaud10@hotmail.com', '123', 'poipewipfsdcnidsfnonfjrs5g'),
(9, 'Luiz', 'fjiashdiofdsafji', 'lkhbsdahbvdjnbj', '448481841', 'jfoadsnon');

-- --------------------------------------------------------

--
-- Estrutura da tabela `notificacoes`
--

CREATE TABLE `notificacoes` (
  `id` int(11) NOT NULL,
  `idcontato` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `notificacoes`
--

INSERT INTO `notificacoes` (`id`, `idcontato`, `status`) VALUES
(1, 8, 0),
(2, 9, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `user_admin`
--

CREATE TABLE `user_admin` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `senha` varchar(32) NOT NULL,
  `email` varchar(100) NOT NULL,
  `urlImg` varchar(36) DEFAULT NULL,
  `nivel` enum('0','1') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `user_admin`
--

INSERT INTO `user_admin` (`id`, `nome`, `usuario`, `senha`, `email`, `urlImg`, `nivel`) VALUES
(1, 'Ítalo Faud de Sena Nogueira', 'admin', 'qwert', 'italofaud10@hotmail.com', 'user.png', '0');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contato`
--
ALTER TABLE `contato`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notificacoes`
--
ALTER TABLE `notificacoes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_admin`
--
ALTER TABLE `user_admin`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contato`
--
ALTER TABLE `contato`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `notificacoes`
--
ALTER TABLE `notificacoes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_admin`
--
ALTER TABLE `user_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
