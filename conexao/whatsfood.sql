-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 21/05/2023 às 04:12
-- Versão do servidor: 10.4.28-MariaDB
-- Versão do PHP: 8.2.4

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
(5, 'GUARANÁ ANTARCTICA BLACK 2 LITROS', 'REFRIGERANTE GUARANÁ ANTARCTICA BLACK 2 LITROS', 10.00, 'guaranablack2L.jpg', 'Bebidas'),
(6, 'Coca-Cola 2 Litros', '1 Coca-Cola 2 Litros.', 10.00, 'cocacola2L.png', 'Bebidas'),
(7, 'Pudim de Leite Condensado.', 'Pudim de Leite Condensado delicioso.', 5.00, 'pudimsobremesa.jpg', 'Sobremesas'),
(8, 'Petit Gâteau Tradicional', 'Petit Gâteau Tradicional delicioso.', 5.00, 'petitgateausobremesas.png', 'Sobremesas');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `food`
--
ALTER TABLE `food`
  ADD PRIMARY KEY (`id_food`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `food`
--
ALTER TABLE `food`
  MODIFY `id_food` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
