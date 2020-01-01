-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 10-Set-2018 às 22:15
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
  `status_bairro` char(9) NOT NULL DEFAULT 'ativo'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `bairros`
--

INSERT INTO `bairros` (`id_bairro`, `nome_bairro`, `id_cidade`, `status_bairro`) VALUES
(1, 'Mineira Nova', 1, 'ativo'),
(2, 'Boa vista', 1, 'ativo'),
(3, 'Lagoa Esteves', 2, 'ativo'),
(4, 'Aurora', 2, 'ativo'),
(5, 'Bortolotto', 3, 'ativo'),
(6, 'Rio Cedro Médio', 3, 'ativo');

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
  `qtd_item` int(11) NOT NULL,
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
(126, 48, 3, 1, 8.5, 8.5, '', 'null', 1),
(127, 48, 22, 1, 1.25, 1.25, '', 'null', 1),
(128, 49, 30, 1, 2, 2, '', 'null', 1),
(129, 49, 1, 1, 23, 57.5, '', 'gigante', 1),
(130, 49, 32, 1, 3, 3, '', 'null', 1),
(131, 50, 4, 1, 9, 9, '', 'null', 1),
(132, 50, 22, 1, 1.25, 1.25, '', 'null', 1),
(133, 50, 30, 1, 2, 2, '', 'null', 2),
(134, 50, 1, 1, 23, 23, '', 'grande', 2),
(135, 50, 2, 1, 26, 26, '', 'grande', 2),
(136, 50, 32, 1, 3, 3, '', 'null', 2),
(137, 51, 30, 1, 2, 2, '', 'null', 1),
(138, 51, 1, 1, 23, 46, 'Sem cebola', 'grande', 1),
(139, 51, 32, 1, 3, 3, '', 'null', 1),
(140, 52, 30, 1, 2, 2, '', 'null', 1),
(141, 52, 1, 0, 23, 15.33, '', 'grande', 1),
(142, 52, 2, 0, 26, 17.33, '', 'grande', 1),
(143, 52, 7, 0, 28, 18.67, '', 'grande', 1),
(144, 52, 24, 1, 7.5, 7.5, '', 'null', 1),
(145, 53, 1, 1, 23, 23, '', 'broto', 1),
(146, 54, 1, 1, 23, 46, '', 'grande', 1),
(147, 54, 32, 1, 3, 3, '', 'null', 1),
(148, 54, 34, 1, 1, 1, '', 'null', 1),
(149, 54, 24, 1, 7.5, 7.5, '', 'null', 1),
(150, 54, 10, 1, 3.5, 3.5, '', 'null', 2),
(151, 54, 10, 1, 3.5, 3.5, '', 'null', 2),
(152, 54, 10, 1, 3.5, 3.5, '', 'null', 2),
(153, 54, 10, 1, 3.5, 3.5, '', 'null', 2),
(154, 54, 10, 1, 3.5, 3.5, '', 'null', 2),
(155, 54, 10, 1, 3.5, 3.5, '', 'null', 2),
(156, 54, 10, 1, 3.5, 3.5, '', 'null', 2),
(157, 54, 10, 1, 3.5, 3.5, '', 'null', 2),
(158, 54, 10, 1, 3.5, 3.5, '', 'null', 2),
(159, 54, 10, 1, 3.5, 3.5, '', 'null', 2),
(160, 54, 10, 1, 3.5, 3.5, '', 'null', 2),
(161, 54, 10, 1, 3.5, 3.5, '', 'null', 2),
(162, 54, 10, 1, 3.5, 3.5, '', 'null', 3),
(163, 54, 10, 1, 3.5, 3.5, '', 'null', 3),
(164, 54, 10, 1, 3.5, 3.5, '', 'null', 3),
(165, 54, 10, 1, 3.5, 3.5, '', 'null', 3),
(166, 54, 10, 1, 3.5, 3.5, '', 'null', 3),
(167, 54, 10, 1, 3.5, 3.5, '', 'null', 3),
(168, 54, 10, 1, 3.5, 3.5, '', 'null', 3),
(169, 54, 10, 1, 3.5, 3.5, '', 'null', 3),
(170, 54, 10, 1, 3.5, 3.5, '', 'null', 3),
(171, 54, 10, 1, 3.5, 3.5, '', 'null', 3),
(172, 54, 10, 1, 3.5, 3.5, '', 'null', 3),
(173, 54, 10, 1, 3.5, 3.5, '', 'null', 3),
(174, 54, 10, 1, 3.5, 3.5, '', 'null', 3),
(175, 54, 10, 1, 3.5, 3.5, '', 'null', 3),
(176, 54, 10, 1, 3.5, 3.5, '', 'null', 3),
(177, 54, 10, 1, 3.5, 3.5, '', 'null', 3),
(178, 54, 10, 1, 3.5, 3.5, '', 'null', 3),
(179, 54, 10, 1, 3.5, 3.5, '', 'null', 3),
(180, 54, 10, 1, 3.5, 3.5, '', 'null', 3),
(181, 54, 10, 1, 3.5, 3.5, '', 'null', 3),
(182, 54, 10, 1, 3.5, 3.5, '', 'null', 3),
(183, 54, 10, 1, 3.5, 3.5, '', 'null', 3),
(184, 54, 10, 1, 3.5, 3.5, '', 'null', 3),
(185, 54, 10, 1, 3.5, 3.5, '', 'null', 3),
(186, 54, 10, 1, 3.5, 3.5, '', 'null', 3),
(187, 54, 10, 1, 3.5, 3.5, '', 'null', 3),
(188, 54, 10, 1, 3.5, 3.5, '', 'null', 3),
(189, 54, 10, 1, 3.5, 3.5, '', 'null', 3),
(190, 54, 10, 1, 3.5, 3.5, '', 'null', 3),
(191, 54, 10, 1, 3.5, 3.5, '', 'null', 3),
(192, 54, 10, 1, 3.5, 3.5, '', 'null', 3),
(193, 54, 10, 1, 3.5, 3.5, '', 'null', 3),
(194, 54, 10, 1, 3.5, 3.5, '', 'null', 3),
(195, 54, 10, 1, 3.5, 3.5, '', 'null', 3),
(196, 55, 4, 1, 9, 9, '', 'null', 1),
(197, 55, 25, 1, 7.5, 7.5, '', 'null', 1),
(198, 55, 8, 1, 6, 6, '', 'null', 2),
(199, 56, 4, 1, 9, 9, '', 'null', 1),
(200, 56, 25, 1, 7.5, 7.5, '', 'null', 1),
(201, 57, 30, 1, 2, 2, '', 'null', 1),
(202, 57, 1, 1, 23, 28.75, '', 'gigante', 1),
(203, 57, 2, 1, 26, 32.5, '', 'gigante', 1),
(204, 57, 34, 1, 1, 1, '', 'null', 1),
(205, 58, 1, 1, 23, 23, '', 'broto', 1),
(206, 58, 34, 1, 1, 1, '', 'null', 1),
(207, 59, 3, 1, 8.5, 8.5, '', 'null', 1),
(208, 59, 25, 1, 7.5, 7.5, '', 'null', 1),
(209, 60, 3, 1, 8.5, 8.5, '', 'null', 1),
(210, 61, 1, 1, 23, 23, '', 'broto', 1),
(211, 61, 34, 1, 1, 1, '', 'null', 1),
(212, 62, 4, 1, 9, 9, '', 'null', 1),
(213, 62, 35, 1, 1, 1, '', 'null', 1),
(214, 63, 1, 0, 23, 14.38, '', 'gigante', 1),
(215, 63, 2, 0, 26, 16.25, '', 'gigante', 1),
(216, 63, 7, 0, 28, 17.5, '', 'gigante', 1),
(217, 63, 12, 0, 27, 16.88, '', 'gigante', 1),
(218, 63, 32, 1, 3, 3, '', 'null', 1),
(219, 64, 31, 1, 2.5, 2.5, '', 'null', 1),
(220, 64, 1, 0, 23, 15.33, '', 'grande', 1),
(221, 64, 2, 0, 26, 17.33, '', 'grande', 1),
(222, 64, 7, 0, 28, 18.67, '', 'grande', 1),
(223, 65, 3, 1, 8.5, 8.5, '', 'null', 1),
(224, 65, 15, 1, 2.5, 2.5, '', 'null', 1);

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
  `status` char(10) NOT NULL DEFAULT 'Pendente'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `pedidos`
--

INSERT INTO `pedidos` (`id_pedido`, `data_pedido`, `id_usuario`, `hora_pedido`, `valor_total_pedido`, `forma_pagamento`, `status`) VALUES
(48, '2018-09-04', 19, '2018-09-04 14:14:56', 9.75, 'Dinheiro', 'Arquivado'),
(49, '2018-09-04', 19, '2018-09-04 14:15:52', 62.5, 'Dinheiro', 'Andamento'),
(50, '2018-09-04', 19, '2018-09-04 14:18:17', 64.25, 'Dinheiro', 'Finalizado'),
(51, '2018-09-05', 19, '2018-09-04 23:52:33', 51, 'Dinheiro', 'Pendente'),
(52, '2018-09-05', 19, '2018-09-05 12:22:16', 60.83, 'Dinheiro', 'Pendente'),
(53, '2018-09-05', 19, '2018-09-05 12:52:00', 23, 'Dinheiro', 'Pendente'),
(54, '2018-09-05', 30, '2018-09-05 19:15:45', 218.5, 'Dinheiro', 'Pendente'),
(55, '2018-09-06', 19, '2018-09-06 15:45:14', 22.5, 'Dinheiro', 'Pendente'),
(56, '2018-09-06', 19, '2018-09-06 15:47:39', 16.5, 'Dinheiro', 'Pendente'),
(57, '2018-09-06', 19, '2018-09-06 15:51:55', 64.25, 'Dinheiro', 'Pendente'),
(58, '2018-09-07', 19, '2018-09-07 19:22:07', 24, 'Dinheiro', 'Pendente'),
(59, '2018-09-07', 19, '2018-09-07 19:24:23', 16, 'Dinheiro', 'Pendente'),
(60, '2018-09-07', 19, '2018-09-07 19:25:05', 8.5, 'Dinheiro', 'Pendente'),
(61, '2018-09-09', 19, '2018-09-09 20:41:26', 24, 'Dinheiro', 'Pendente'),
(62, '2018-09-09', 19, '2018-09-09 20:46:25', 10, 'Dinheiro', 'Pendente'),
(63, '2018-09-09', 19, '2018-09-09 20:47:49', 68.01, 'Dinheiro', 'Pendente'),
(64, '2018-09-10', 19, '2018-09-10 16:12:04', 53.83, 'Dinheiro', 'Pendente'),
(65, '2018-09-10', 19, '2018-09-10 16:14:38', 11, 'Dinheiro', 'Pendente');

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
(7, 'Bacon', 28, 'molho tomate, queijo, bacon e orégano.\r\n', 1, 'Ativo'),
(8, 'Pepsi', 6, '2 Litros', 3, 'Ativo'),
(9, 'Guaraná', 7, '2 Litros', 3, 'Ativo'),
(10, 'Skol', 3.5, 'Lata', 3, 'Ativo'),
(11, 'Coração', 22, 'molho tomate, queijo, coração e orégano.', 1, 'Ativo'),
(12, 'Frango', 27, 'molho tomate, queijo e frango ensopado', 1, 'Ativo'),
(14, 'X-coração', 13, 'Coração,Carne,Pão,Maionese,Queijo,Alface,Tomate,Milho,Ervilha\r\n', 2, 'Ativo'),
(15, 'Bacon', 2.5, 'Adiciona extra de Bacon', 5, 'Ativo'),
(18, 'Pizza de chocolate', 23, 'Possui chocolate preto', 1, 'Ativo'),
(20, 'XCasa', 15.5, 'Pimentão,Carne,Pão,Maionese,Queijo,Alface,Tomate,Milho,Ervilha', 2, 'Ativo'),
(22, 'Queijo', 1.25, 'Adiciona extra de queijo', 5, 'Ativo'),
(23, 'Budweiser', 7.5, 'lata 350ml', 3, 'Ativo'),
(24, 'maionese', 7.5, 'Adiciona extra de maionese', 4, 'Ativo'),
(25, 'maionese', 7.5, 'Adiciona extra de maionese', 5, 'Ativo'),
(26, 'Subzero', 2, 'lata 350ml', 3, 'Ativo'),
(28, 'Fanta Uva', 7.5, '2 litros', 3, 'Ativo'),
(30, 'Borda Catupiry ', 2, NULL, 6, 'Ativo'),
(31, 'Borda Chocolate', 2.5, NULL, 6, 'Ativo'),
(32, 'Coração', 3, 'Adiciona extra de Coração', 4, 'Ativo'),
(33, 'Coração', 3, 'Adiciona extra de Coração', 5, 'Ativo'),
(34, 'Cebola', 1, 'Adiciona extra de cebola', 4, 'Ativo'),
(35, 'Cebola', 1, 'Adiciona extra de cebola', 5, 'Ativo');

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
(19, 'Vinicius de Souza Margotti', '95b7d8b31a8133f18024d6282ad48710', '09080004675', 'viniciusmargotti@hotmail.com', 139, 'A', 'Proximo ao JC lanches', 5, 'Rua Iraci Manoel Caetano', 999999999),
(20, 'Vinicius Margotti', '95b7d8b31a8133f18024d6282ad48710', '09080003913', 'joaoteste@hotmail.com', 138, 'A', 'sdadsad', 3, 'Rua Iraçi Manoel Caetano', 998363300),
(21, 'viniciusmargotti@hotmail.com', '95b7d8b31a8133f18024d6282ad48710', '09080003913', 'Marcos@hotmail.com', 456, 'A', 'Proximo ao Bar do tocha', 5, 'Rua Iraci Manoel Caetano', 4234234),
(22, 'Vinicius Margotti', '95b7d8b31a8133f18024d6282ad48710', '09080003913', 'fasd@gmail.com', 24342, 'A', 'proximo a tua casa', 1, 'Rua Iraçi Manoel Caetano', 12312),
(23, 'testes', '95b7d8b31a8133f18024d6282ad48710', '09080003913', 'v@gmail.com', 138, 'A', 'viniciusmargotti@hotmail.com', 5, 'Rua Iraci Manoel Caetano', 123123),
(24, 'vini', '202cb962ac59075b964b07152d234b70', '12345678909', '123@gmail.com', 1, 'A', 'fdc', 2, 'Rua da Pizza', 123),
(26, 'Vitor demo', '202cb962ac59075b964b07152d234b70', '10406608946', 'vitordemboski@hotmail.com', 34, 'A', 'Perto da rodo', 3, 'Rua luiz colle', 9824),
(27, 'admin', '21232f297a57a5a743894a0e4a801fc3', '09080003913', 'admin@admin', 7, 'A', 'Pizzaria', 1, 'Rua da Pizza', 34421324),
(28, 'Lucimar Mariano', '95b7d8b31a8133f18024d6282ad48710', '09080003913', 'lucimarmarianodesouza@hotmail.com', 138, 'A', 'Proximo ao JC Lanches', 1, 'Rua Iraçi Manoel Caetano', 996446528),
(29, 'viniciusmargotti@hotmail.com', '95b7d8b31a8133f18024d6282ad48710', '090.800.039', 'Teste@teste.com', 111, 'A', 'Proximo a rua teste', 5, 'Rua teste', 123798163),
(30, 'Iuri de Lima Marques', '25f9e794323b453885f5181f1b624d0b', '106.309.599', 'iurilmarques@hotmail.com', 110, 'A', 'proximo ao bar', 1, 'Manaus', 99817);

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
  MODIFY `id_item_carrinho` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1256;

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
  MODIFY `id_item` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=225;

--
-- AUTO_INCREMENT for table `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `id_pedido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id_produto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

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
