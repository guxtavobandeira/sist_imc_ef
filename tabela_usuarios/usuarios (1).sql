-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 24/02/2024 às 23:29
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
-- Banco de dados: `ev_fisica`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `email` varchar(140) NOT NULL,
  `nome` varchar(140) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `senha`, `email`, `nome`) VALUES
(3, '$2y$10$NHnf9tKt/T3mJPiQGMiowO0UKa8ZLhaQrqVvnXcCocZ77ixThxKXS', 'joao@joao.com', ''),
(4, '$2y$10$zLv6zDs.LzFcLmhmahmt5OPs/a3nv.PJ4szj1CvGNNIAu6RHQgfwm', 'mateus@gmail.com', ''),
(5, '$2y$10$ty9rKUeyb9eXXm/z4V3Hneb.Gw7cMwgDD9eKOJRGYGSoqx0NEecGi', 'teste@teste.com', ''),
(6, '$2y$10$8s20dtPEJICt92upqfrhJuS8HqDyIsqxknph2ieubnii1x/rXUH8S', 'victoria@1.com', ''),
(7, '$2y$10$Nrz.7pfFGAT01aCf/.Fj3.UnaOU.h4o2q6PM6wHI0.uKZk3reI0Ey', 'gustavo_@1.com', 'gustavo_@1.com'),
(8, '$2y$10$LuCJy9w24RmBqXmV.DD9HuhJZfTsp6oip6zqpK3wNc/5bX1z0oZ2i', 'neymar@neymar.com', 'neymar'),
(9, '$2y$10$jT8Q/Nj2.9ukkATeOpBZMOwffgGglKJU1cbJvVxgzL9Wnnbm1FOua', 'neymar@neymar.com', 'neymar'),
(10, '$2y$10$O3GdMMNcEcZBm4WL0vQj5uyz3Uuhh8T3833gb/2NBwHM65bkWb4EK', 'neymar@neymar.com', 'neymar');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
