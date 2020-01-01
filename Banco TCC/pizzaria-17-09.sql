-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 18-Set-2018 às 00:18
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

--
-- Extraindo dados da tabela `carrinho`
--

INSERT INTO `carrinho` (`idusuario`, `idproduto`, `qtd`, `tamanho`, `observacao`, `id_item_carrinho`, `valor`, `seq_interno`) VALUES
(27, 1, 0.5, 'media', NULL, 256, 18.4, 1),
(27, 2, 0.5, 'media', NULL, 257, 20.8, 1);

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
(273, 80, 30, 1, 2, 2, '', 'null', 1),
(274, 80, 1, 0, 23, 14.38, '', 'gigante', 1),
(275, 80, 2, 0, 26, 16.25, '', 'gigante', 1),
(276, 80, 7, 0, 28, 17.5, '', 'gigante', 1),
(277, 80, 11, 0, 22, 13.75, '', 'gigante', 1),
(278, 80, 34, 1, 1, 1, '', 'null', 1),
(279, 80, 4, 1, 9, 9, '', 'null', 2),
(280, 80, 25, 1, 7.5, 7.5, '', 'null', 2),
(281, 80, 6, 1, 7, 7, '', 'null', 3),
(282, 80, 9, 1, 7, 7, '', 'null', 3),
(283, 81, 1, 0, 23, 14.38, '', 'gigante', 1),
(284, 81, 2, 0, 26, 16.25, '', 'gigante', 1),
(285, 81, 31, 1, 2.5, 2.5, '', 'null', 1),
(286, 81, 7, 0, 28, 17.5, '', 'gigante', 1),
(287, 81, 11, 0, 22, 13.75, '', 'gigante', 1),
(288, 81, 34, 1, 1, 1, '', 'null', 1),
(289, 82, 3, 1, 8.5, 8.5, '', 'null', 1),
(290, 82, 22, 1, 1.25, 1.25, '', 'null', 1),
(291, 82, 10, 1, 3.5, 3.5, '', 'null', 2),
(292, 83, 7, 0, 28, 17.5, '', 'gigante', 1),
(293, 83, 2, 0, 26, 16.25, '', 'gigante', 1),
(294, 83, 1, 0, 23, 14.38, '', 'gigante', 1),
(295, 83, 30, 1, 2, 2, '', 'null', 1),
(296, 83, 11, 0, 22, 13.75, 'Sem Borda', 'gigante', 1),
(297, 83, 32, 1, 3, 3, '', 'null', 1),
(298, 84, 4, 1, 9, 9, '', 'null', 1),
(299, 84, 33, 1, 3, 3, '', 'null', 1),
(300, 84, 25, 1, 7.5, 7.5, '', 'null', 1),
(301, 84, 10, 1, 3.5, 3.5, '', 'null', 2),
(302, 84, 10, 1, 3.5, 3.5, '', 'null', 2),
(303, 85, 30, 1, 2, 2, '', 'null', 1),
(304, 85, 1, 0, 23, 14.38, '', 'gigante', 1),
(305, 85, 2, 0, 26, 16.25, '', 'gigante', 1),
(306, 85, 7, 0, 28, 17.5, '', 'gigante', 1),
(307, 85, 11, 0, 22, 13.75, '', 'gigante', 1),
(308, 85, 34, 1, 1, 1, '', 'null', 1),
(309, 85, 1, 1, 23, 23, '', 'grande', 2),
(310, 85, 2, 1, 26, 26, '', 'grande', 2),
(311, 85, 30, 1, 2, 2, '', 'null', 3),
(312, 85, 2, 1, 26, 26, '', 'broto', 3),
(313, 85, 32, 1, 3, 3, '', 'null', 3),
(314, 86, 1, 1, 23, 18.4, '', 'media', 1),
(315, 86, 2, 1, 26, 20.8, '', 'media', 1),
(316, 87, 18, 1, 23, 18.4, '', 'media', 0),
(317, 87, 12, 1, 27, 21.6, '', 'media', 0);

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
(80, '2018-09-17', 19, '2018-09-17 16:00:16', 95.38, 'Cartão', 'Pendente'),
(81, '2018-08-17', 19, '2018-08-17 21:50:50', 65.38, 'Dinheiro', 'Pendente'),
(82, '2018-07-17', 19, '2018-07-17 21:54:03', 13.25, 'Cartão', 'Pendente'),
(83, '2018-05-17', 19, '2018-05-17 21:54:48', 66.88, 'Dinheiro', 'Pendente'),
(84, '2018-06-17', 19, '2018-06-17 21:55:09', 26.5, 'Cartão', 'Pendente'),
(85, '2018-05-17', 19, '2018-05-17 21:55:48', 144.88, 'Cartão', 'Pendente'),
(86, '2018-09-18', 27, '2018-09-17 22:07:53', 39.2, 'Dinheiro', 'Pendente'),
(87, '2018-09-18', 27, '2018-09-17 22:10:21', 40, 'Dinheiro', 'Pendente');

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
  MODIFY `id_item_carrinho` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=258;

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
  MODIFY `id_item` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=318;

--
-- AUTO_INCREMENT for table `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `id_pedido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

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
