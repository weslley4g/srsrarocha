-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 13/05/2023 às 19:31
-- Versão do servidor: 10.4.28-MariaDB
-- Versão do PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `whatsfood`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `administrador`
--

CREATE TABLE `administrador` (
  `id_administrador` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `administrador`
--

INSERT INTO `administrador` (`id_administrador`, `nome`, `email`, `senha`, `img`) VALUES
(1, 'Weslley Zanirate Mendes', 'weslley@gmail.com', '123', ''),
(2, 'Santhiago Da Silva Rocha', 'santhiago@gmail.com', '123', '');

-- --------------------------------------------------------

--
-- Estrutura para tabela `cardapio`
--

CREATE TABLE `cardapio` (
  `id_cardapio` int(11) NOT NULL,
  `id_food` int(11) NOT NULL,
  `nome_cardapio` varchar(255) NOT NULL,
  `id_situacao` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `cardapio`
--

INSERT INTO `cardapio` (`id_cardapio`, `id_food`, `nome_cardapio`, `id_situacao`) VALUES
(1, 2, 'segunda', 2),
(2, 4, 'terça', 2);

-- --------------------------------------------------------

--
-- Estrutura para tabela `food`
--

CREATE TABLE `food` (
  `id_food` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `descricao` varchar(255) NOT NULL,
  `valor` decimal(10,2) NOT NULL,
  `img` varchar(255) NOT NULL,
  `Categoria` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `food`
--

INSERT INTO `food` (`id_food`, `nome`, `descricao`, `valor`, `img`, `Categoria`) VALUES
(1, 'Bife à milanesa', 'Acompanhar o arroz, o feijão, o purê de batata e a salada de alface.', 20.00, 'bifeamilanesa.jpg', 'Refeicoes'),
(2, 'Strogonoff de frango', 'Acompanhado por arroz, batata palha e frango.', 30.00, 'strogonoffdefrango.jpg', 'Refeicoes'),
(3, 'Bife bovino', 'Acompanha o bife, arroz, feijão, batata frita, farofa e salada de tomate e alface.', 40.00, 'bifebovino.jpg', 'Refeicoes'),
(4, ' Fanta Uva 2 Litros', '1  Fanta Uva 2 Litros.', 10.00, 'fantauva2L.png', 'Bebidas'),
(5, 'Pepsi 2 Litros', '1 Pepsi 2 Litros.', 10.00, 'pepsi2L.png', 'Bebidas'),
(6, 'Coca-Cola 2 Litros', '1 Coca-Cola 2 Litros.', 10.00, 'cocacola2L.png', 'Bebidas'),
(7, 'Pudim de Leite Condensado.', 'Pudim de Leite Condensado delicioso.', 5.00, 'pudimsobremesa.jpg', 'Sobremesas'),
(8, 'Petit Gâteau Tradicional', 'Petit Gâteau Tradicional delicioso.', 5.00, 'petitgateausobremesas.png', 'Sobremesas');

-- --------------------------------------------------------

--
-- Estrutura para tabela `situacao`
--

CREATE TABLE `situacao` (
  `id_situacao` int(11) NOT NULL,
  `tipo_situacao` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `situacao`
--

INSERT INTO `situacao` (`id_situacao`, `tipo_situacao`) VALUES
(1, 'acabou'),
(2, 'tem'),
(3, 'falta');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `administrador`
--
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`id_administrador`);

--
-- Índices de tabela `cardapio`
--
ALTER TABLE `cardapio`
  ADD PRIMARY KEY (`id_cardapio`),
  ADD KEY `id_food` (`id_food`),
  ADD KEY `id_situacao` (`id_situacao`);

--
-- Índices de tabela `food`
--
ALTER TABLE `food`
  ADD PRIMARY KEY (`id_food`);

--
-- Índices de tabela `situacao`
--
ALTER TABLE `situacao`
  ADD PRIMARY KEY (`id_situacao`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `administrador`
--
ALTER TABLE `administrador`
  MODIFY `id_administrador` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `cardapio`
--
ALTER TABLE `cardapio`
  MODIFY `id_cardapio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `food`
--
ALTER TABLE `food`
  MODIFY `id_food` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `situacao`
--
ALTER TABLE `situacao`
  MODIFY `id_situacao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `cardapio`
--
ALTER TABLE `cardapio`
  ADD CONSTRAINT `id_food` FOREIGN KEY (`id_food`) REFERENCES `food` (`id_food`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `id_situacao` FOREIGN KEY (`id_situacao`) REFERENCES `situacao` (`id_situacao`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
