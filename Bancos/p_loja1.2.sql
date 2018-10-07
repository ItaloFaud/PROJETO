-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 05-Out-2018 às 12:31
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
(11, 'frjnkrfk', 'weioojro', 'qwehifhw9ho', 'fjrnnnnnn', 'quwrjiqewojro'),
(12, 'Italo', 'Camisas', 'italofaud10@hotmail.com', '433434', 'Camisas rasgam facilmente'),
(13, 'Italo', 'Camisas de time', 'italofaud10@hotmail.com', '123323897', 'Falsa  )B|'),
(14, 'Pomba', 'Vestidos', 'Pombinha@gmail.com', '123123', 'Sujos'),
(15, 'Italo', 'Calca', 'italofaud10@hotmail.com', '12332123', 'so tem jeans'),
(16, 'aa', 'qqwe', '1@1', '4', 'qweqwe'),
(17, 'aa', 'qqwe', '1@1', '4', 'qweqwe'),
(18, 'aa', 'qqwe', '1@1', '4', 'qweqwe'),
(19, 'Italo', 'Wsadsad', 'italofaud10@hotmail.com', '12332123', 'asdsadfdasfdsa'),
(20, 'Italo', 'Wsadsad', 'italofaud10@hotmail.com', '12332123', 'asdsadfdasfdsa'),
(21, 'Italo', 'Wsadsad', 'italofaud10@hotmail.com', '12332123', 'asdsadfdasfdsa'),
(22, 'Italo', 'Wsadsad', 'italofaud10@hotmail.com', '12332123', 'asdsadfdasfdsa'),
(23, 'Italo', 'Wsadsad', 'italofaud10@hotmail.com', '12332123', 'asdsadfdasfdsa');

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
(8, 15, 'polo.jpg', 'onde-comprar-roupas.jpg', 'polo.jpg'),
(9, 16, 'Actions-quickopen-icon.png', 'onde-comprar-roupas.jpg', ''),
(10, 17, 'onde-comprar-roupas.jpg', '', ''),
(11, 18, 'Captura2r.PNG', '', ''),
(12, 19, 'ABAAAAZSAAA-1.jpg', '', ''),
(13, 20, 'scorpion-2880x1800-mortal-kombat-x-', '', ''),
(14, 21, 'avengers.jpg', '', ''),
(15, 22, 'infinitewar-wallpaper1.jpg', '', ''),
(16, 23, 'imagens-do-anti-heroi-mais-tagarela', '', ''),
(17, 24, 'Nissan_Sports_Car_Wallpapers_freeco', '', ''),
(18, 25, 'Coutois.PNG', '', ''),
(19, 26, 'Pg.PNG', '', '');

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
(4, 11, 0),
(5, 12, 0),
(6, 13, 0),
(7, 14, 0),
(8, 15, 0),
(9, 16, 0),
(10, 17, 0),
(11, 18, 0),
(12, 19, 0),
(13, 20, 0),
(14, 21, 0),
(15, 22, 0),
(16, 23, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos`
--

CREATE TABLE `produtos` (
  `id` int(11) NOT NULL,
  `id_cat` int(11) NOT NULL,
  `nome` varchar(40) NOT NULL,
  `cor` varchar(20) NOT NULL,
  `qtd` int(11) NOT NULL,
  `tamanho` enum('G','M','P') NOT NULL,
  `infos` varchar(200) NOT NULL,
  `preco` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `produtos`
--

INSERT INTO `produtos` (`id`, `id_cat`, `nome`, `cor`, `qtd`, `tamanho`, `infos`, `preco`) VALUES
(15, 1, 'Camisa Polo', 'Azul marinho', 10, 'G', '100% Linho', 99.99),
(16, 1, 'Cueca Calvin Klein', 'Amarela', 10, 'G', '100% Algodao', 77.22),
(17, 2, 'Vestido Homlaw', 'Verde e vermelho', 10, 'G', 'Cor: Verde\r\nTamanho: 45', 99.99),
(18, 2, 'Calca Habanna', 'Jeans Escuro', 10, 'G', 'Jeans Escuro', 99.99),
(19, 1, 'Meia Lupo', 'Branca', 10, 'G', 'Algodao ', 22.77),
(20, 1, 'Camiseta Hollister', 'Azul', 60, 'M', 'MUito bem feita, com algodÃ£o', 79.56),
(21, 1, 'Camisa Supreme All-Star', 'Cinza', 70, 'M', 'TOPPPPPPP', 1000.11),
(22, 1, 'Calca jeans Paco', 'Azul clara', 80, 'M', 'Top demais junio', 150.45),
(23, 1, 'Camisa Lupo', 'Azul Escuro', 89, 'M', 'Linda', 70.38),
(24, 1, 'SandÃ¡lia Keener', 'Preta', 100, 'P', 'Linda', 89.25),
(25, 1, 'Camisa regata John John', 'Branca', 67, 'G', '100% ', 87.21),
(26, 1, 'Camisa Brooks', 'Amarela', 67, 'G', '139', 78.03);

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `senha` varchar(18) NOT NULL,
  `email` varchar(100) NOT NULL,
  `CPF` varchar(25) NOT NULL,
  `foto` varchar(200) NOT NULL,
  `nasc` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `nome`, `senha`, `email`, `CPF`, `foto`, `nasc`) VALUES
(4, 'Italo', 'q1w2e3r4t5', 'italofaud10@hotmail.com', '123123123', 'Darth_Vader_TFU.jpg', '0000-00-00'),
(5, 'Itinho', 'qwert', 'joao@hotmail.com', '123123123123123', 'scorpion-2880x1800-mortal-kombat-x-pc-games-xbox-one-ps4-24.jpg', '0000-00-00'),
(6, 'Italo Fuad', 'qwert', 'hooper76@outlook.com', '321321232112312', 'Darth_Vader_TFU.jpg', '2001-12-09');

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
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `foto`
--
ALTER TABLE `foto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `notificacoes`
--
ALTER TABLE `notificacoes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user_admin`
--
ALTER TABLE `user_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
