-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 23/09/2024 às 18:27
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
-- Banco de dados: `teste_darla_db`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `cpf` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `telefone` varchar(255) NOT NULL,
  `cep` varchar(255) NOT NULL,
  `endereco` varchar(255) NOT NULL,
  `numero` varchar(255) NOT NULL,
  `complemento` varchar(255) NOT NULL,
  `bairro` varchar(255) NOT NULL,
  `cidade` varchar(255) NOT NULL,
  `estado` varchar(255) NOT NULL,
  `nascimento` date NOT NULL,
  `senha` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'ATIVO'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `users`
--

INSERT INTO `users` (`id`, `nome`, `cpf`, `email`, `telefone`, `cep`, `endereco`, `numero`, `complemento`, `bairro`, `cidade`, `estado`, `nascimento`, `senha`, `status`) VALUES
(1, 'Darla', '01870799607', 'darla@email.com', '992242000', '8729399', 'Rua', '234', 'Casa', 'Bairro', 'Uberaba', 'Minas Gerais', '2002-01-31', '$2y$10$UwamXftXnVM8CfhYVz/I1OOdi0vcXhJvtkJybp4defuZklfTOkEta', 'BLOQUEADO'),
(3, 'Lunna', '01870799607', 'lunna@email.com', '34332233999', '3829399', 'Rua', '89', 'Casa', 'Merces', 'Uberaba', 'Minas Gerais', '2008-05-20', '$2y$10$Kjp1ZsrxV0zE1SNq2PPrxOMrhEJmNRwNlJ3xSsI2xdS.p.FNhRAT2', 'ATIVO'),
(4, 'Usuario', '12425427015', 'email@email.com', '34577786', '334576', 'Rua Girassol', '34', 'Casa', 'Morada das Flores', 'Uberaba', 'Minas Gerais', '2002-10-22', '$2y$10$baNrH172/pw1Rjb3ZF9XlOLlv5IowRcvVZ1BGPoKhOQUDqgQXU5Gi', 'ATIVO'),
(5, 'Luana', '38374164026', 'luana@email.com', '992234000', '34568789', 'Avenida Saudade', '344', 'Apto', 'Bairro', 'Uberaba', 'Minas Gerais', '1998-10-18', '$2y$10$avt9VNinaq8GhoDJN1tLGeD/4psQGj4YI.Ovy/J43oeds32q4oyTC', 'ATIVO'),
(6, 'Daniel', '87760545002', 'dan@email.com', '993882990', '34657689', 'Rua Ricardo', '117', 'Casa cinza', 'Mercês', 'Uberaba', 'Minas Gerais', '1980-02-22', '$2y$10$8hCqhZMKTZfBYhPvjVtvruORawgLYOVUOaAvh/llvk4NAvXQtMABS', 'ATIVO'),
(7, 'Ana', '49368648034', 'ana@email.com', '2234567898', '23142324', 'Rua Rua', '23', 'Casa', 'Bairro', 'Uberaba', 'Minas Gerais', '1975-08-15', '$2y$10$Sf5mrgxzNNdUflxe1V1A9OEiKXdYZb5ap.dt20/ha51DfpMMeAE7G', 'ATIVO'),
(8, 'Sandra', '12193660050', 'sandra@email.com', '998752344', '3455421', 'Rua rua', '234', 'casa', 'bairro', 'Uberaba', 'Minas Gerais', '1967-06-10', '$2y$10$00o8z8cBqgdyh4xiQMtSJ.xCHw4nwTwO1mwM70tLNfTZ79.9uImF6', 'ATIVO'),
(9, 'Itamar', '87704375059', 'itamar@email.com', '2345774333', '23435423', 'Rua rua', '46', 'casa', 'bairro', 'cidade', 'mg', '1978-11-18', '$2y$10$TW1IzifttB7/ocqcWEoCKeximkfH7O993Wuui/KgYs84z2KyJlkVm', 'ATIVO'),
(10, 'Mariana', '35531765045', 'mariana@email.com', '4576542333', '34544323', 'rua', '23', 'casa', 'bairro', 'cidade', 'mg', '1989-03-31', '$2y$10$16CL0d/D6cFEXjxi5bKR5OaxBA/BEXjIUjYRSZ67Wwv263wJ..Zt6', 'ATIVO'),
(11, 'Arthur', '42482223024', 'arthur@email.com', '244789997', '2345673', 'rua', '23', 'casa', 'bairro', 'cidade', 'mg', '2004-02-24', '$2y$10$9eHPgnm/lrNx05JbLNHG2..kS5EXMQCZ7JhtKk7PZZAYMwiyCi9Di', 'ATIVO'),
(12, 'Leonardo', '35255167037', 'leo@email.com', '23478908887', '23432233', 'rua', '12', 'casa', 'bairro', 'cidade', 'mg', '2003-09-12', '$2y$10$p7WV/JRSYmFYxe7.mClT2uFCf6FxAdh5LmxV3P4LdUd5eiRLvjlbi', 'ATIVO');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
