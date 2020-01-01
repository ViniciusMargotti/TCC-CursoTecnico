-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 18-Out-2018 às 21:38
-- Versão do servidor: 10.1.30-MariaDB
-- PHP Version: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pizzaria`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `bairros`
--

CREATE TABLE `bairros` (
  `id_bairro` int(11) NOT NULL,
  `nome_bairro` varchar(50) NOT NULL,
  `id_cidade` int(11) NOT NULL,
  `status_bairro` char(9) NOT NULL DEFAULT 'ativo',
  `taxa_entrega` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `bairros`
--

INSERT INTO `bairros` (`id_bairro`, `nome_bairro`, `id_cidade`, `status_bairro`, `taxa_entrega`) VALUES
(1, 'Mineira Nova', 1, 'ativo', 0.5),
(2, 'Boa vista', 1, 'ativo', 0.5),
(3, 'Lagoa Esteves', 2, 'ativo', 0.5),
(4, 'Aurora', 2, 'ativo', 0.5),
(5, 'Bortolotto', 3, 'ativo', 0.5),
(6, 'Rio Cedro Médio', 3, 'ativo', 0.5);

-- --------------------------------------------------------

--
-- Estrutura da tabela `carrinho`
--

CREATE TABLE `carrinho` (
  `idusuario` int(11) NOT NULL,
  `idproduto` int(11) NOT NULL,
  `qtd` float NOT NULL,
  `tamanho` char(7) DEFAULT NULL,
  `observacao` text,
  `id_item_carrinho` int(11) NOT NULL,
  `valor` double NOT NULL,
  `seq_interno` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `categorias`
--

CREATE TABLE `categorias` (
  `id_categoria` int(11) NOT NULL,
  `descricao_categoria` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `categorias`
--

INSERT INTO `categorias` (`id_categoria`, `descricao_categoria`) VALUES
(1, 'Pizza'),
(2, 'Lanche'),
(3, 'Bebida'),
(4, 'Adicional Pizzas'),
(5, 'Adicional Lanches'),
(6, 'bordas');

-- --------------------------------------------------------

--
-- Estrutura da tabela `cidades`
--

CREATE TABLE `cidades` (
  `id_cidade` int(11) NOT NULL,
  `nome_cidade` varchar(40) CHARACTER SET latin1 NOT NULL,
  `uf` char(2) CHARACTER SET latin1 NOT NULL,
  `status_cidade` char(9) CHARACTER SET latin1 NOT NULL DEFAULT 'ativo'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `cidades`
--

INSERT INTO `cidades` (`id_cidade`, `nome_cidade`, `uf`, `status_cidade`) VALUES
(1, 'Criciúma', 'SC', 'ativo'),
(2, 'Içara', 'SC', 'ativo'),
(3, 'Nova Veneza', 'SC', 'ativo'),
(4, 'Sideropolis', 'SC', 'ativo');

-- --------------------------------------------------------

--
-- Estrutura da tabela `itens_pedidos`
--

CREATE TABLE `itens_pedidos` (
  `id_item` int(11) NOT NULL,
  `id_pedido` int(11) NOT NULL,
  `id_produto` int(11) NOT NULL,
  `qtd_item` double NOT NULL,
  `preco_unitario` double NOT NULL,
  `valor_total` double NOT NULL,
  `observacao` text NOT NULL,
  `tamanho` char(7) DEFAULT NULL,
  `seq_interno` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `itens_pedidos`
--

INSERT INTO `itens_pedidos` (`id_item`, `id_pedido`, `id_produto`, `qtd_item`, `preco_unitario`, `valor_total`, `observacao`, `tamanho`, `seq_interno`) VALUES
(414, 124, 14, 1, 13, 0, '', 'null', 1),
(415, 124, 25, 1, 7.5, 0, '', 'null', 1),
(416, 124, 3, 1, 8.5, 0, '', 'null', 2),
(417, 124, 33, 1, 3, 0, '', 'null', 2),
(418, 124, 28, 1, 7.5, 0, '', 'null', 3),
(419, 125, 14, 1, 13, 0, '', 'null', 1),
(420, 125, 33, 1, 3, 0, '', 'null', 1),
(421, 125, 11, 0.25, 22, 0, '', 'gigante', 2),
(422, 125, 12, 0.25, 27, 0, '', 'gigante', 2),
(423, 125, 38, 0.25, 23, 0, 'Sem adicional', 'gigante', 2),
(424, 125, 1, 0.25, 23, 0, '', 'gigante', 2),
(425, 125, 32, 1, 3, 0, '', 'null', 2),
(434, 174, 7, 1, 28, 0, 'Sem adicional', 'broto', 1),
(435, 174, 32, 1, 3, 0, '', 'null', 1),
(436, 175, 7, 1, 28, 0, '', 'broto', 1),
(437, 175, 32, 1, 3, 0, '', 'null', 1),
(438, 176, 14, 1, 13, 0, '', 'null', 1),
(439, 176, 33, 1, 3, 0, '', 'null', 1),
(440, 177, 39, 1, 8, 0, '', 'null', 1),
(441, 177, 35, 1, 1, 0, '', 'null', 1),
(442, 177, 33, 1, 3, 0, '', 'null', 1),
(443, 178, 7, 1, 28, 0, '', 'broto', 1),
(444, 178, 32, 1, 3, 0, '', 'null', 1),
(445, 178, 14, 1, 13, 0, '', 'null', 2),
(446, 178, 22, 1, 1.25, 0, '', 'null', 2),
(447, 179, 7, 1, 28, 0, '', 'broto', 1),
(448, 179, 32, 1, 3, 0, '', 'null', 1),
(449, 180, 7, 1, 28, 0, '', 'broto', 1),
(450, 180, 32, 1, 3, 0, '', 'null', 1),
(451, 181, 14, 1, 13, 0, '', 'null', 1),
(452, 181, 15, 1, 2.5, 0, '', 'null', 1),
(453, 181, 35, 1, 1, 0, '', 'null', 1),
(454, 181, 33, 1, 3, 0, '', 'null', 1),
(455, 181, 25, 1, 7.5, 0, '', 'null', 1),
(456, 181, 22, 1, 1.25, 0, '', 'null', 1),
(457, 182, 30, 1, 2, 0, '', 'null', 1),
(458, 182, 7, 0.25, 28, 0, '', 'gigante', 1),
(459, 182, 11, 0.25, 22, 0, '', 'gigante', 1),
(460, 182, 12, 0.25, 27, 0, '', 'gigante', 1),
(461, 182, 38, 0.25, 23, 0, '', 'gigante', 1),
(462, 182, 32, 1, 3, 0, '', 'null', 1),
(463, 182, 39, 1, 8, 0, '', 'null', 2),
(464, 182, 35, 1, 1, 0, '', 'null', 2),
(465, 182, 37, 1, 5, 0, '', 'null', 3),
(466, 182, 36, 1, 4.5, 0, '', 'null', 3),
(467, 182, 28, 1, 7.5, 0, '', 'null', 3),
(468, 182, 28, 1, 7.5, 0, '', 'null', 3),
(469, 184, 7, 0.25, 28, 17.5, '', 'gigante', 1),
(470, 184, 11, 0.25, 22, 13.75, '', 'gigante', 1),
(471, 184, 12, 0.25, 27, 16.88, '', 'gigante', 1),
(472, 184, 38, 0.25, 23, 14.38, '', 'gigante', 1),
(473, 184, 8, 5, 6, 30, '', 'null', 2),
(474, 185, 8, 5, 6, 30, '', 'null', 1),
(475, 186, 30, 1, 2, 2, '', 'null', 1),
(476, 186, 7, 0.25, 28, 17.5, '', 'gigante', 1),
(477, 186, 11, 0.25, 22, 13.75, '', 'gigante', 1),
(478, 186, 12, 0.25, 27, 16.88, '', 'gigante', 1),
(479, 186, 38, 0.25, 23, 14.38, '', 'gigante', 1),
(480, 186, 6, 2, 7, 14, '', 'null', 2),
(481, 187, 7, 0.25, 28, 23.33, '', 'gigante', 1),
(482, 187, 11, 0.25, 22, 18.33, '', 'gigante', 1),
(483, 187, 12, 0.25, 27, 22.5, 'Sem Coração', 'gigante', 1),
(484, 187, 32, 1, 3, 3, '', 'null', 1),
(485, 188, 28, 2, 7.5, 15, '', 'null', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `pedidos`
--

CREATE TABLE `pedidos` (
  `id_pedido` int(11) NOT NULL,
  `data_pedido` date NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `hora_pedido` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `valor_total_pedido` double NOT NULL,
  `forma_pagamento` char(8) NOT NULL,
  `status` char(10) NOT NULL DEFAULT 'Pendente',
  `taxa_entrega` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `pedidos`
--

INSERT INTO `pedidos` (`id_pedido`, `data_pedido`, `id_usuario`, `hora_pedido`, `valor_total_pedido`, `forma_pagamento`, `status`, `taxa_entrega`) VALUES
(124, '2018-02-02', 19, '2018-02-02 16:38:58', 40, 'Cartão', 'Finalizado', 0.5),
(125, '2018-03-02', 19, '2018-10-02 18:08:25', 78.89, 'Dinheiro', 'Arquivado', 0.5),
(160, '2018-07-08', 30, '2018-03-05 19:01:22', 324, 'Dinheiro', 'Andamento', 7),
(161, '2018-08-08', 30, '2018-10-05 19:01:22', 324, 'Dinheiro', 'Finalizado', 7),
(162, '2018-01-08', 30, '2018-03-05 19:01:22', 324, 'Dinheiro', 'Pendente', 7),
(163, '2018-01-02', 30, '2018-10-05 19:01:35', 324, 'Dinheiro', 'Andamento', 7),
(164, '2018-11-08', 30, '2018-10-05 19:01:35', 324, 'Dinheiro', 'Andamento', 7),
(165, '2018-12-08', 30, '2018-10-05 19:01:35', 324, 'Dinheiro', 'Pendente', 7),
(166, '2018-09-08', 30, '2018-10-05 19:01:35', 324, 'Dinheiro', 'Pendente', 7),
(167, '2018-05-08', 30, '2018-09-05 19:01:35', 324, 'Dinheiro', 'Pendente', 7),
(168, '2018-10-08', 30, '2018-08-05 19:01:35', 324, 'Dinheiro', 'Pendente', 7),
(169, '2018-10-08', 30, '2018-07-05 19:01:35', 324, 'Dinheiro', 'Pendente', 7),
(170, '2018-10-08', 30, '2018-06-05 19:01:35', 324, 'Dinheiro', 'Pendente', 7),
(171, '2018-01-08', 30, '2018-10-05 19:01:36', 324, 'Dinheiro', 'Pendente', 7),
(172, '2018-01-08', 30, '2018-10-05 19:01:36', 324, 'Dinheiro', 'Pendente', 7),
(173, '2018-01-08', 30, '2018-10-05 19:01:36', 324, 'Dinheiro', 'Pendente', 7),
(174, '2018-10-08', 19, '2018-10-08 15:37:13', 31.5, 'Cartão', 'Pendente', 0.5),
(175, '2018-10-11', 19, '2018-10-11 17:33:48', 31.5, 'Dinheiro', 'Pendente', 0.5),
(176, '2018-10-11', 19, '2018-10-11 17:34:31', 16.5, 'Cartão', 'Pendente', 0.5),
(177, '2018-10-11', 19, '2018-10-11 17:35:56', 12.5, 'Dinheiro', 'Pendente', 0.5),
(178, '2018-10-11', 19, '2018-10-11 17:38:12', 45.75, 'Dinheiro', 'Pendente', 0.5),
(179, '2018-10-11', 19, '2018-10-11 17:38:50', 31.5, 'Dinheiro', 'Pendente', 0.5),
(180, '2018-10-11', 19, '2018-10-11 17:39:20', 31.5, 'Dinheiro', 'Pendente', 0.5),
(181, '2018-10-11', 19, '2018-10-11 18:22:23', 28.75, 'Dinheiro', 'Pendente', 0.5),
(182, '2018-10-11', 27, '2018-10-11 18:31:45', 101.50999999999999, 'Dinheiro', 'Pendente', 0.5),
(183, '2018-10-13', 19, '2018-10-13 21:30:46', 93.00999999999999, 'Dinheiro', 'Pendente', 0.5),
(184, '2018-10-13', 19, '2018-10-13 21:31:16', 93.00999999999999, 'Dinheiro', 'Pendente', 0.5),
(185, '2018-10-13', 19, '2018-10-13 21:32:53', 30.5, 'Dinheiro', 'Pendente', 0.5),
(186, '2018-10-13', 19, '2018-10-13 21:38:37', 79.00999999999999, 'Dinheiro', 'Pendente', 0.5),
(187, '2018-10-16', 19, '2018-10-16 20:23:12', 67.66, 'Dinheiro', 'Pendente', 0.5),
(188, '2018-10-16', 19, '2018-10-16 20:24:55', 15.5, 'Dinheiro', 'Pendente', 0.5);

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos`
--

CREATE TABLE `produtos` (
  `id_produto` int(11) NOT NULL,
  `nome_produto` varchar(50) NOT NULL,
  `preco_produto` double NOT NULL,
  `descricao_produto` text,
  `id_categoria` int(11) NOT NULL,
  `status` char(9) NOT NULL DEFAULT 'Ativo'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `produtos`
--

INSERT INTO `produtos` (`id_produto`, `nome_produto`, `preco_produto`, `descricao_produto`, `id_categoria`, `status`) VALUES
(1, 'Paulista ', 23, 'molho tomate, queijo, presunto, ervilha, palmito, azeitona e orégano.', 1, 'Ativo'),
(2, 'Strogonoff Carne', 26, 'Queijo, creme de leite, milho, ervilha, carne.', 1, 'Ativo'),
(3, 'X-Salada', 8.5, 'molho tomate, queijo, calabresa, presunto, frango, camarão, milho, ervilha, palmito, tomate, azeitona e orégano						', 2, 'Ativo'),
(4, 'X-Galinha', 9, 'molho tomate,calabresa, presunto, frango, camarão, milho, ervilha, palmito, tomate, azeitona e orégano', 2, 'Ativo'),
(6, 'Coca Cola ', 7, '2 Litros', 3, 'Ativo'),
(7, 'Bacon', 28, 'molho tomate, queijo, bacon e orégano.', 1, 'Ativo'),
(8, 'Pepsi', 6, '2 Litros', 3, 'Ativo'),
(9, 'Guaraná', 7, '2 Litros', 3, 'Ativo'),
(11, 'Coração', 22, 'molho tomate, queijo, coração e orégano.', 1, 'Ativo'),
(12, 'Frango', 27, 'molho tomate, queijo e frango ensopado', 1, 'Ativo'),
(14, 'X-coração', 13, 'Coração,Carne,Pão,Maionese,Queijo,Alface,Tomate,Milho,Ervilha\r\n', 2, 'Ativo'),
(15, 'Bacon', 2.5, 'Adiciona extra de Bacon', 5, 'Ativo'),
(18, 'Pizza de chocolate', 23, 'Possui chocolate preto', 1, 'Ativo'),
(20, 'XCasa', 15.5, 'Pimentão,Carne,Pão,Maionese,Queijo,Alface,Tomate,Milho,Ervilha', 2, 'Ativo'),
(22, 'Queijo', 1.25, 'Adiciona extra de queijo', 5, 'Ativo'),
(23, 'Budweiser', 7.5, 'lata 350ml', 3, 'Ativo'),
(25, 'maionese', 7.5, 'Adiciona extra de maionese', 5, 'Ativo'),
(28, 'Fanta Uva', 7.5, '2 litros', 3, 'Ativo'),
(30, 'Borda Catupiry ', 2, '', 6, 'Ativo'),
(31, 'Borda Chocolate', 2.5, '', 6, 'Ativo'),
(32, 'Coração', 3, 'Adiciona extra de Coração', 4, 'Ativo'),
(33, 'Coração', 3, 'Adiciona extra de Coração', 5, 'Ativo'),
(34, 'Cebola', 1, 'Adiciona extra de cebola', 4, 'Ativo'),
(35, 'Cebola', 1, 'Adiciona extra de cebola', 5, 'Ativo'),
(36, 'Fanta Laranja', 4.5, '2 litros', 3, 'Ativo'),
(37, 'Coca-Cola', 5, '1,5 litros', 3, 'Ativo'),
(38, 'Mexicana', 23, 'Queijo, creme de leite, milho, ervilha, carne.', 1, 'Ativo'),
(39, 'X-Egg', 8, 'molho tomate,calabresa, presunto, frango, camarão, milho, ervilha, palmito, tomate, azeitona e orégano', 2, 'Ativo'),
(44, 'Borda Queijo', 2, 'Adiciona Borda de Queijo', 6, 'Ativo');

-- --------------------------------------------------------

--
-- Estrutura da tabela `sistema`
--

CREATE TABLE `sistema` (
  `id_sistema` int(11) NOT NULL,
  `hora_abertura` time NOT NULL,
  `status_sys` char(1) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `sistema`
--

INSERT INTO `sistema` (`id_sistema`, `hora_abertura`, `status_sys`) VALUES
(1, '19:00:00', 'a');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `nome_usuario` varchar(50) NOT NULL,
  `senha_usuario` varchar(32) NOT NULL,
  `cpf_usuario` varchar(11) NOT NULL,
  `email_usuario` varchar(100) DEFAULT NULL,
  `num_casa_usuario` int(11) NOT NULL,
  `status` char(9) NOT NULL DEFAULT 'A',
  `referencia_usuario` varchar(100) NOT NULL,
  `id_bairro` int(11) NOT NULL,
  `nome_endereco` varchar(60) NOT NULL,
  `contato_usuario` int(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nome_usuario`, `senha_usuario`, `cpf_usuario`, `email_usuario`, `num_casa_usuario`, `status`, `referencia_usuario`, `id_bairro`, `nome_endereco`, `contato_usuario`) VALUES
(19, 'Vinicius de Souza Margotti', '95b7d8b31a8133f18024d6282ad48710', '09080004675', 'viniciusmargotti@hotmail.com', 139, 'A', 'Proximo ao JC lanche', 5, 'Rua Iraci Manoel Caetano', 999999999),
(20, 'Vinicius Margotti', '95b7d8b31a8133f18024d6282ad48710', '09080003913', 'joaoteste@hotmail.com', 138, 'A', 'sdadsad', 3, 'Rua Iraçi Manoel Caetano', 998363300),
(21, 'viniciusmargotti@hotmail.com', '95b7d8b31a8133f18024d6282ad48710', '09080003913', 'Marcos@hotmail.com', 456, 'A', 'Proximo ao Bar do tocha', 5, 'Rua Iraci Manoel Caetano', 4234234),
(22, 'Vinicius Margotti', '95b7d8b31a8133f18024d6282ad48710', '09080003913', 'fasd@gmail.com', 24342, 'A', 'proximo a tua casa', 1, 'Rua Iraçi Manoel Caetano', 12312),
(23, 'testes', '95b7d8b31a8133f18024d6282ad48710', '09080003913', 'v@gmail.com', 138, 'A', 'viniciusmargotti@hotmail.com', 5, 'Rua Iraci Manoel Caetano', 123123),
(24, 'vini', '202cb962ac59075b964b07152d234b70', '12345678909', '123@gmail.com', 1, 'A', 'fdc', 2, 'Rua da Pizza', 123),
(26, 'Vitor demo', '202cb962ac59075b964b07152d234b70', '10406608946', 'vitordemboski@hotmail.com', 34, 'A', 'Perto da rodo', 3, 'Rua luiz colle', 9824),
(27, 'admin', '21232f297a57a5a743894a0e4a801fc3', '09080003913', 'admin@admin', 7, 'A', 'Pizzaria', 1, 'Rua da Pizza', 34421324),
(28, 'Lucimar Mariano', '95b7d8b31a8133f18024d6282ad48710', '09080003913', 'lucimarmarianodesouza@hotmail.com', 138, 'A', 'Proximo ao JC Lanches', 1, 'Rua Iraçi Manoel Caetano', 996446528),
(29, 'viniciusmargotti@hotmail.com', '95b7d8b31a8133f18024d6282ad48710', '090.800.039', 'Teste@teste.com', 111, 'A', 'Proximo a rua teste', 5, 'Rua teste', 123798163),
(30, 'Iuri de Lima Marques', '25f9e794323b453885f5181f1b624d0b', '106.309.599', 'iurilmarques@hotmail.com', 110, 'A', 'proximo ao bar', 1, 'Manaus', 99817),
(31, 'teste', '21232f297a57a5a743894a0e4a801fc3', '090.800.039', 'teste@hotmail.com', 1231, 'A', 'testee', 1, 'teste', 100000),
(32, 'teste', '698dc19d489c4e4db73e28a713eab07b', '090.800.039', 'teste@teste1.com', 213, 'A', 'saasd', 1, 'sadsa', 34342),
(33, 'teste', '698dc19d489c4e4db73e28a713eab07b', '090.800.039', 'teste32@teste.com', 1231, 'A', '', 3, 'tdsfds', 98981);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bairros`
--
ALTER TABLE `bairros`
  ADD PRIMARY KEY (`id_bairro`),
  ADD KEY `bairros_cidades` (`id_cidade`);

--
-- Indexes for table `carrinho`
--
ALTER TABLE `carrinho`
  ADD PRIMARY KEY (`id_item_carrinho`),
  ADD KEY `carrinho_produto` (`idproduto`),
  ADD KEY `carrinho_usuario` (`idusuario`);

--
-- Indexes for table `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indexes for table `cidades`
--
ALTER TABLE `cidades`
  ADD PRIMARY KEY (`id_cidade`);

--
-- Indexes for table `itens_pedidos`
--
ALTER TABLE `itens_pedidos`
  ADD PRIMARY KEY (`id_item`),
  ADD KEY `id_pedido` (`id_pedido`),
  ADD KEY `itens_produtos` (`id_produto`);

--
-- Indexes for table `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`id_pedido`),
  ADD KEY `pedido_usuario` (`id_usuario`);

--
-- Indexes for table `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`id_produto`),
  ADD KEY `produtos_categorias` (`id_categoria`);

--
-- Indexes for table `sistema`
--
ALTER TABLE `sistema`
  ADD PRIMARY KEY (`id_sistema`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`),
  ADD KEY `usuarios_bairros` (`id_bairro`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bairros`
--
ALTER TABLE `bairros`
  MODIFY `id_bairro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `carrinho`
--
ALTER TABLE `carrinho`
  MODIFY `id_item_carrinho` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `cidades`
--
ALTER TABLE `cidades`
  MODIFY `id_cidade` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `itens_pedidos`
--
ALTER TABLE `itens_pedidos`
  MODIFY `id_item` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=486;

--
-- AUTO_INCREMENT for table `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `id_pedido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=189;

--
-- AUTO_INCREMENT for table `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id_produto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `sistema`
--
ALTER TABLE `sistema`
  MODIFY `id_sistema` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `bairros`
--
ALTER TABLE `bairros`
  ADD CONSTRAINT `bairros_cidades` FOREIGN KEY (`id_cidade`) REFERENCES `cidades` (`id_cidade`);

--
-- Limitadores para a tabela `carrinho`
--
ALTER TABLE `carrinho`
  ADD CONSTRAINT `carrinho_produto` FOREIGN KEY (`idproduto`) REFERENCES `produtos` (`id_produto`),
  ADD CONSTRAINT `carrinho_usuario` FOREIGN KEY (`idusuario`) REFERENCES `usuarios` (`id_usuario`);

--
-- Limitadores para a tabela `itens_pedidos`
--
ALTER TABLE `itens_pedidos`
  ADD CONSTRAINT `itens_pedido` FOREIGN KEY (`id_pedido`) REFERENCES `pedidos` (`id_pedido`),
  ADD CONSTRAINT `itens_produtos` FOREIGN KEY (`id_produto`) REFERENCES `produtos` (`id_produto`);

--
-- Limitadores para a tabela `pedidos`
--
ALTER TABLE `pedidos`
  ADD CONSTRAINT `pedido_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`);

--
-- Limitadores para a tabela `produtos`
--
ALTER TABLE `produtos`
  ADD CONSTRAINT `produtos_categorias` FOREIGN KEY (`id_categoria`) REFERENCES `categorias` (`id_categoria`);

--
-- Limitadores para a tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_bairros` FOREIGN KEY (`id_bairro`) REFERENCES `bairros` (`id_bairro`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
