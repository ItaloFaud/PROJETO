-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 11-Out-2018 às 21:06
-- Versão do servidor: 10.1.35-MariaDB
-- versão do PHP: 7.2.9

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
-- Estrutura da tabela `endereco`
--

CREATE TABLE `endereco` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `cep` varchar(20) NOT NULL,
  `estado` varchar(50) NOT NULL,
  `cidade` varchar(70) NOT NULL,
  `rua` varchar(70) NOT NULL,
  `numero` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `endereco`
--

INSERT INTO `endereco` (`id`, `id_usuario`, `cep`, `estado`, `cidade`, `rua`, `numero`) VALUES
(10, 6, '63460000', 'Ceara', 'Pereiro', 'Rua JoÃ£o Holanda', '289'),
(11, 6, '63460000', 'CearÃ¡', 'Pereiro', 'Sem Rua', '0');

-- --------------------------------------------------------

--
-- Estrutura da tabela `fatura`
--

CREATE TABLE `fatura` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_endereco` int(11) NOT NULL,
  `valor` float NOT NULL,
  `prazo` int(11) NOT NULL,
  `frete` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `fatura`
--

INSERT INTO `fatura` (`id`, `id_usuario`, `id_endereco`, `valor`, `prazo`, `frete`) VALUES
(10, 6, 10, 214, 8, 115);

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
(20, 27, 'f7042d06.jpg', '9a451327.jpg', ''),
(21, 28, 'psg 1.jpg', 'psg 2.jpg', 'pag 3.jpg'),
(22, 29, 'relogio 2.jpg', 'religio 3.jpg', 'relogio 1.jpg'),
(23, 30, 'adidas spingblade img2.jpg', 'adidas spingblade img3.jpg', 'adidas springblade img1.jpg'),
(24, 31, 'nike shox avenue masculino 2.jpg', 'nike shox avenue masculino 1.jpg', 'nike shox avenue masculino 3.jpg'),
(25, 32, 'sol 1.jpg', 'sol 2.jpg', 'sol 3.jpg');

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
-- Estrutura da tabela `pedido`
--

CREATE TABLE `pedido` (
  `id` int(11) NOT NULL,
  `id_fatura` int(11) NOT NULL,
  `id_produto` int(11) NOT NULL,
  `qtn` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `pedido`
--

INSERT INTO `pedido` (`id`, `id_fatura`, `id_produto`, `qtn`) VALUES
(11, 10, 27, 1);

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
(27, 1, 'Motetom Brooks', 'Vermelho', 69, 'M', 'Moletom do mais puro algodÃ£o, produzido e distribuÃ­do pela Brooks LTDA.', 99.99),
(28, 1, 'Camisa PSG', 'Roxo', 50, 'G', 'Camisa de time Europeu da marca Nike', 198.99),
(29, 1, 'RelÃ³gio ESTEVEX', 'Preto ', 90, 'G', ' RelÃ³gio que marcas as horas ', 90.09),
(30, 1, 'Tenis Adidas springblade', 'Branco', 200, 'M', 'Tenis Adidas springblade tenis de corrida', 1201.86),
(31, 1, 'Tenis Nike shox avenue', 'Preto ', 50, 'M', 'Tenis Nike shox', 600.93),
(32, 1, 'OcÃºlos  Ray-Ban', 'Preto ', 10, 'M', 'OcÃºlos  Ray-Ban', 150.48);

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
(6, 'Italo Fuad', 'qwert', 'hooper76@outlook.com', '321321232112312', '28c2a73998e77bdb3a0819a0d4b044e9.jpg', '2001-12-09');

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
-- Indexes for table `endereco`
--
ALTER TABLE `endereco`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fatura`
--
ALTER TABLE `fatura`
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
-- Indexes for table `pedido`
--
ALTER TABLE `pedido`
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
-- AUTO_INCREMENT for table `endereco`
--
ALTER TABLE `endereco`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `fatura`
--
ALTER TABLE `fatura`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `foto`
--
ALTER TABLE `foto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `notificacoes`
--
ALTER TABLE `notificacoes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `pedido`
--
ALTER TABLE `pedido`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

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
