-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 12/04/2024 às 03:25
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
-- Estrutura para tabela `alunos`
--

CREATE TABLE `alunos` (
  `nome_aluno` varchar(140) NOT NULL,
  `id_aluno` int(11) NOT NULL,
  `datanasc_aluno` date NOT NULL,
  `curso_aluno` varchar(20) NOT NULL,
  `sala_aluno` int(11) NOT NULL,
  `peso_aluno` float NOT NULL,
  `altura_aluno` float NOT NULL,
  `cir_quadril_aluno` float NOT NULL,
  `genero_aluno` varchar(20) NOT NULL,
  `imc_aluno` float NOT NULL,
  `iac_aluno` float NOT NULL,
  `resultado_imc` varchar(140) NOT NULL,
  `resultado_iac` varchar(140) NOT NULL,
  `datacadas_aluno` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `alunos`
--

INSERT INTO `alunos` (`nome_aluno`, `id_aluno`, `datanasc_aluno`, `curso_aluno`, `sala_aluno`, `peso_aluno`, `altura_aluno`, `cir_quadril_aluno`, `genero_aluno`, `imc_aluno`, `iac_aluno`, `resultado_imc`, `resultado_iac`, `datacadas_aluno`) VALUES
('kaio', 35, '2024-02-28', 'adm', 3, 444, 44, 0, 'feeminino', 0.229339, 0, '', '', '2024-04-12 01:24:20'),
('kaio', 36, '2024-02-28', 'adm', 3, 444, 44, 0, 'feeminino', 0.229339, 0, '', '', '2024-04-12 01:24:20'),
('reqre', 39, '2024-02-29', '324', 234234, 67.9, 234, 0, '3243', 0.00124005, 0, '', '', '2024-04-12 01:24:20'),
('kaio', 40, '2024-03-08', 'adm', 3, 66.8, 1, 0, 'masculino', 66.8, 0, '', '', '2024-04-12 01:24:20'),
('Neymar', 53, '2024-03-23', 'Informática', 3, 69.7, 1.75, 90, 'Masculino', 22.7592, 20.8763, 'Normal', 'Gordura moderada', '2024-04-12 01:24:20'),
('Neymar', 54, '2024-03-23', 'Informática', 3, 69.7, 1.75, 90, 'Masculino', 22.7592, 20.8763, 'Normal', 'Gordura moderada', '2024-04-12 01:24:20'),
('gustavo', 55, '2024-03-15', 'Enfermagem', 2, 32.12, 7.47, 100, 'Feminino', 0.575618, -13.102, 'Magreza', 'Gordura muito baixa', '2024-04-12 01:24:20'),
('gustavo', 56, '2024-03-15', 'Enfermagem', 2, 32.12, 7.47, 100, 'Feminino', 0.575618, -13.102, 'Magreza', 'Gordura muito baixa', '2024-04-12 01:24:20'),
('gustavo', 57, '2024-03-15', 'Enfermagem', 2, 32.12, 7.47, 100, 'Feminino', 0.575618, -13.102, 'Magreza', 'Gordura muito baixa', '2024-04-12 01:24:20'),
('marcos', 58, '2024-03-06', 'Informática', 2, 99.9, 2, 70, 'Masculino', 24.975, 6.74874, 'Sobrepeso', 'Gordura muito baixa', '2024-04-12 01:24:20'),
('errewrereerwrew', 59, '2024-04-20', 'Enfermagem', 1, 342.33, 3.24, 324, 'Masculino', 32.6103, 37.5556, 'Obesidade grau I', 'Excesso de gordura', '2024-04-12 01:24:20'),
('errewrereerwrew', 60, '2024-04-20', 'Enfermagem', 1, 342.33, 3.24, 324, 'Masculino', 32.6103, 37.5556, 'Obesidade grau I', 'Excesso de gordura', '2024-04-12 01:24:20'),
('errewrereerwrew', 61, '2024-04-20', 'Enfermagem', 1, 342.33, 3.24, 324, 'Masculino', 32.6103, 37.5556, 'Obesidade grau I', 'Excesso de gordura', '2024-04-12 01:24:20'),
('errewrereerwrew', 62, '2024-04-20', 'Enfermagem', 1, 342.33, 3.24, 324, 'Masculino', 32.6103, 37.5556, 'Obesidade grau I', 'Excesso de gordura', '2024-04-12 01:24:20'),
('errewrereerwrew', 63, '2024-04-20', 'Enfermagem', 1, 342.33, 3.24, 324, 'Masculino', 32.6103, 37.5556, 'Obesidade grau I', 'Excesso de gordura', '2024-04-12 01:24:20'),
('errewrereerwrew', 64, '2024-04-20', 'Enfermagem', 1, 342.33, 3.24, 324, 'Masculino', 32.6103, 37.5556, 'Obesidade grau I', 'Excesso de gordura', '2024-04-12 01:24:20'),
('errewrereerwrew', 65, '2024-04-20', 'Enfermagem', 1, 342.33, 3.24, 324, 'Masculino', 32.6103, 37.5556, 'Obesidade grau I', 'Excesso de gordura', '2024-04-12 01:24:20'),
('errewrereerwrew', 66, '2024-04-20', 'Enfermagem', 1, 342.33, 3.24, 324, 'Masculino', 32.6103, 37.5556, 'Obesidade grau I', 'Excesso de gordura', '2024-04-12 01:24:20'),
('errewrereerwrew', 67, '2024-04-20', 'Enfermagem', 1, 342.33, 3.24, 324, 'Masculino', 32.6103, 37.5556, 'Obesidade grau I', 'Excesso de gordura', '2024-04-12 01:24:20'),
('errewrereerwrew', 68, '2024-04-20', 'Enfermagem', 1, 342.33, 3.24, 324, 'Masculino', 32.6103, 37.5556, 'Obesidade grau I', 'Excesso de gordura', '2024-04-12 01:24:20'),
('errewrereerwrew', 69, '2024-04-20', 'Enfermagem', 1, 342.33, 3.24, 324, 'Masculino', 32.6103, 37.5556, 'Obesidade grau I', 'Excesso de gordura', '2024-04-12 01:24:20'),
('errewrereerwrew', 70, '2024-04-20', 'Enfermagem', 1, 342.33, 3.24, 324, 'Masculino', 32.6103, 37.5556, 'Obesidade grau I', 'Excesso de gordura', '2024-04-12 01:24:20'),
('errewrereerwrew', 71, '2024-04-20', 'Enfermagem', 1, 342.33, 3.24, 324, 'Masculino', 32.6103, 37.5556, 'Obesidade grau I', 'Excesso de gordura', '2024-04-12 01:24:20'),
('Kakaka', 72, '2024-04-12', 'Informática', 2, 333.21, 2.12, 212, 'Feminino', 74.1389, 50.6803, 'Obesidade grau III', 'Excesso de gordura', '2024-04-12 01:24:20');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `alunos`
--
ALTER TABLE `alunos`
  ADD PRIMARY KEY (`id_aluno`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `alunos`
--
ALTER TABLE `alunos`
  MODIFY `id_aluno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
