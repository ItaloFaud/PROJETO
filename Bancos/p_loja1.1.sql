-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 21-Set-2018 às 23:48
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
-- Estrutura da tabela `categoria`
--

CREATE TABLE `categoria` (
  `id` int(11) NOT NULL,
  `nome` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `categoria`
--

INSERT INTO `categoria` (`id`, `nome`) VALUES
(2, 'Feminino'),
(1, 'Masculino'),
(3, 'Meninos');

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
(9, 'Luiz', 'fjiashdiofdsafji', 'lkhbsdahbvdjnbj', '448481841', 'jfoadsnon'),
(10, 'Italo', 'Casaco', 'wallace123qwer@outlook.com', '9999999999', 'Oii doidin'),
(11, 'frjnkrfk', 'weioojro', 'qwehifhw9ho', 'fjrnnnnnn', 'quwrjiqewojro');

-- --------------------------------------------------------

--
-- Estrutura da tabela `foto`
--

CREATE TABLE `foto` (
  `id` int(11) NOT NULL,
  `id_produto` int(11) NOT NULL,
  `img1` varchar(35) NOT NULL,
  `img2` varchar(35) NOT NULL,
  `img3` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `foto`
--

INSERT INTO `foto` (`id`, `id_produto`, `img1`, `img2`, `img3`) VALUES
(7, 14, 'boneco-duvida.png', '', ''),
(8, 15, 'polo.jpg', '', ''),
(9, 16, 'Actions-quickopen-icon.png', '', ''),
(10, 17, 'onde-comprar-roupas.jpg', '', ''),
(11, 18, 'Captura2r.PNG', '', ''),
(12, 19, 'ABAAAAZSAAA-1.jpg', '', '');

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
(2, 9, 0),
(3, 10, 0),
(4, 11, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos`
--

CREATE TABLE `produtos` (
  `id` int(11) NOT NULL,
  `id_cat` int(11) NOT NULL,
  `nome` varchar(40) NOT NULL,
  `infos` varchar(200) NOT NULL,
  `preco` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `produtos`
--

INSERT INTO `produtos` (`id`, `id_cat`, `nome`, `infos`, `preco`) VALUES
(15, 1, 'Camisa Polo', '100% Linho', 99.99),
(16, 1, 'Cueca Calvin Klein', '100% Algodao', 77.22),
(17, 2, 'Vestido Homlaw', 'Cor: Verde\r\nTamanho: 45', 99.99),
(18, 2, 'Calca Habanna', 'Jeans Escuro', 99.99),
(19, 1, 'Meia Lupo', 'Algodao ', 22.77);

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
-- Indexes for table `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nome` (`nome`);

--
-- Indexes for table `contato`
--
ALTER TABLE `contato`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `foto`
--
ALTER TABLE `foto`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_produto` (`id_produto`);

--
-- Indexes for table `notificacoes`
--
ALTER TABLE `notificacoes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `produtos`
--
ALTER TABLE `produtos`
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
-- AUTO_INCREMENT for table `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `contato`
--
ALTER TABLE `contato`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `foto`
--
ALTER TABLE `foto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `notificacoes`
--
ALTER TABLE `notificacoes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `user_admin`
--
ALTER TABLE `user_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
