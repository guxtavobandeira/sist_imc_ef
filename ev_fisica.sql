-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 09/06/2024 às 19:02
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
('Eduardo', 184, '2006-09-10', 'Administração', 3, 80, 1.8, 95, 'Masculino', 24.69, 3.89, 'Obesidade grau I', 'Excesso de gordura', '2024-05-15 03:00:00'),
('Beatriz', 185, '2005-04-02', 'Enfermagem', 1, 50, 1.55, 75, 'Feminino', 20.8, 4.52, 'Magreza', 'Gordura muito baixa', '2024-05-20 03:00:00'),
('Rodrigo', 186, '2007-11-25', 'Informática', 2, 75, 1.7, 88, 'Masculino', 25.95, 4.39, 'Sobrepeso', 'Gordura ideal', '2024-05-25 03:00:00'),
('Isabela', 187, '2005-08-05', 'Comércio', 3, 70, 1.65, 90, 'Feminino', 25.71, 4.07, 'Sobrepeso', 'Gordura moderada', '2024-05-30 03:00:00'),
('Leticia', 189, '2006-10-30', 'Enfermagem', 2, 52, 1.58, 77, 'Feminino', 20.83, 4.46, 'Normal', 'Gordura ideal', '2024-06-05 03:00:00'),
('Vinicius', 190, '2005-05-15', 'Informática', 3, 78, 1.75, 95, 'Masculino', 25.47, 4.52, 'Obesidade grau I', 'Gordura muito baixa', '2024-06-10 03:00:00'),
('Fernando', 191, '2008-03-20', 'Comércio', 1, 80, 1.7, 92, 'Masculino', 27.68, 4.26, 'Obesidade grau I', 'Gordura ideal', '2024-06-15 03:00:00'),
('Tatiane', 192, '2006-09-08', 'Administração', 2, 90, 1.75, 100, 'Feminino', 29.39, 4.57, 'Obesidade grau II', 'Excesso de gordura', '2024-06-20 03:00:00'),
('Vanessa', 193, '2005-01-25', 'Enfermagem', 3, 48, 1.55, 73, 'Feminino', 19.96, 4.37, 'Magreza', 'Gordura baixa', '2024-06-25 03:00:00'),
('Luciana', 194, '2007-07-10', 'Informática', 1, 68, 1.68, 87, 'Feminino', 24.1, 4.24, 'Sobrepeso', 'Gordura muito baixa', '2024-07-01 03:00:00'),
('Ricardo', 195, '2005-02-18', 'Comércio', 2, 72, 1.72, 93, 'Masculino', 24.34, 4.14, 'Sobrepeso', 'Gordura ideal', '2024-07-05 03:00:00'),
('Roberta', 196, '2008-06-25', 'Administração', 3, 75, 1.65, 88, 'Feminino', 27.55, 4.35, 'Sobrepeso', 'Gordura moderada', '2024-07-10 03:00:00'),
('Paulo', 197, '2006-11-05', 'Enfermagem', 1, 55, 1.6, 80, 'Masculino', 21.48, 4.52, 'Normal', 'Gordura baixa', '2024-07-15 03:00:00'),
('Natália', 198, '2005-10-12', 'Informática', 2, 80, 1.75, 98, 'Feminino', 26.12, 4.47, 'Obesidade grau I', 'Gordura ideal', '2024-07-20 03:00:00'),
('Renato', 199, '2007-03-28', 'Comércio', 3, 70, 1.7, 90, 'Masculino', 24.22, 4.15, 'Sobrepeso', 'Excesso de gordura', '2024-07-25 03:00:00'),
('Simone', 200, '2005-07-15', 'Administração', 1, 85, 1.78, 100, 'Feminino', 26.85, 4.26, 'Obesidade grau I', 'Gordura moderada', '2024-08-01 03:00:00'),
('Roberto', 201, '2008-04-02', 'Enfermagem', 2, 60, 1.65, 85, 'Masculino', 22.04, 4.33, 'Sobrepeso', 'Gordura muito baixa', '2024-08-05 03:00:00'),
('Monica', 202, '2006-01-20', 'Informática', 3, 75, 1.7, 92, 'Feminino', 25.95, 4.39, 'Sobrepeso', 'Gordura ideal', '2024-08-10 03:00:00'),
('Marcelo', 203, '2005-09-10', 'Comércio', 1, 82, 1.75, 95, 'Masculino', 26.78, 4.37, 'Obesidade grau I', 'Gordura baixa', '2024-08-15 03:00:00'),
('Natalia', 204, '2007-05-05', 'Administração', 2, 88, 1.8, 100, 'Feminino', 27.16, 4.19, 'Obesidade grau II', 'Gordura ideal', '2024-08-20 03:00:00'),
('Joana', 205, '2005-12-28', 'Enfermagem', 3, 53, 1.63, 76, 'Feminino', 19.95, 4.11, 'Magreza', 'Gordura baixa', '2024-08-25 03:00:00'),
('Pedro', 206, '2006-04-30', 'Informática', 1, 78, 1.78, 95, 'Masculino', 24.62, 4.29, 'Sobrepeso', 'Gordura muito baixa', '2024-09-01 03:00:00'),
('Carolina', 207, '2005-11-15', 'Comércio', 2, 68, 1.65, 88, 'Feminino', 24.98, 4.3, 'Sobrepeso', 'Gordura ideal', '2024-09-05 03:00:00'),
('Bruno', 208, '2008-08-20', 'Administração', 3, 90, 1.85, 100, 'Masculino', 26.3, 4.36, 'Obesidade grau I', 'Gordura moderada', '2024-09-10 03:00:00'),
('Raquel', 209, '2006-02-10', 'Enfermagem', 1, 58, 1.62, 82, 'Feminino', 22.11, 4.27, 'Sobrepeso', 'Excesso de gordura', '2024-09-15 03:00:00'),
('Guilherme', 210, '2005-07-02', 'Informática', 2, 80, 1.75, 98, 'Masculino', 26.12, 4.47, 'Obesidade grau I', 'Gordura ideal', '2024-09-20 03:00:00'),
('Julia', 211, '2007-04-18', 'Comércio', 3, 72, 1.68, 92, 'Feminino', 25.51, 4.4, 'Sobrepeso', 'Gordura muito baixa', '2024-09-25 03:00:00'),
('Thiago', 212, '2005-12-05', 'Administração', 1, 85, 1.8, 100, 'Masculino', 26.23, 4.28, 'Obesidade grau I', 'Gordura ideal', '2024-10-01 03:00:00'),
('Aline', 213, '2006-10-28', 'Enfermagem', 2, 55, 1.6, 78, 'Feminino', 21.48, 4.22, 'Normal', 'Gordura baixa', '2024-10-05 03:00:00'),
('Diego', 214, '2005-09-15', 'Informática', 3, 75, 1.7, 90, 'Masculino', 25.95, 4.39, 'Sobrepeso', 'Gordura ideal', '2024-10-10 03:00:00'),
('Fernanda', 215, '2008-03-10', 'Comércio', 1, 80, 1.7, 92, 'Feminino', 27.68, 4.26, 'Obesidade grau I', 'Gordura moderada', '2024-10-15 03:00:00'),
('Bruna', 216, '2006-12-28', 'Administração', 2, 90, 1.75, 100, 'Feminino', 29.39, 4.57, 'Obesidade grau II', 'Excesso de gordura', '2024-10-20 03:00:00'),
('Rafael', 217, '2005-02-20', 'Enfermagem', 3, 48, 1.55, 73, 'Masculino', 19.96, 4.37, 'Magreza', 'Gordura baixa', '2024-10-25 03:00:00'),
('Camila', 218, '2007-07-25', 'Informática', 1, 68, 1.68, 87, 'Feminino', 24.1, 4.24, 'Sobrepeso', 'Gordura muito baixa', '2024-11-01 03:00:00'),
('Lucas', 219, '2005-01-28', 'Comércio', 2, 72, 1.72, 93, 'Masculino', 24.34, 4.14, 'Sobrepeso', 'Gordura ideal', '2024-11-05 03:00:00'),
('Renata', 220, '2008-06-15', 'Administração', 3, 75, 1.65, 88, 'Feminino', 27.55, 4.35, 'Sobrepeso', 'Gordura moderada', '2024-11-10 03:00:00'),
('Gustavo', 221, '2006-11-10', 'Enfermagem', 1, 55, 1.6, 80, 'Masculino', 21.48, 4.52, 'Normal', 'Gordura baixa', '2024-11-15 03:00:00'),
('Ana', 222, '2005-10-02', 'Informática', 2, 80, 1.75, 98, 'Feminino', 26.12, 4.47, 'Obesidade grau I', 'Gordura ideal', '2024-11-20 03:00:00'),
('Daniel', 223, '2007-03-28', 'Comércio', 3, 70, 1.7, 90, 'Masculino', 24.22, 4.15, 'Sobrepeso', 'Excesso de gordura', '2024-11-25 03:00:00'),
('Mariana', 224, '2005-07-15', 'Administração', 1, 85, 1.78, 100, 'Feminino', 26.85, 4.26, 'Obesidade grau I', 'Gordura moderada', '2024-12-01 03:00:00'),
('Giovanni', 225, '2008-04-02', 'Enfermagem', 2, 60, 1.65, 85, 'Masculino', 22.04, 4.33, 'Sobrepeso', 'Gordura muito baixa', '2024-12-05 03:00:00'),
('Caroline', 226, '2006-01-20', 'Informática', 3, 75, 1.7, 92, 'Feminino', 25.95, 4.39, 'Sobrepeso', 'Gordura ideal', '2024-12-10 03:00:00'),
('Bruno', 227, '2005-09-10', 'Comércio', 1, 82, 1.75, 95, 'Masculino', 26.78, 4.37, 'Obesidade grau I', 'Gordura baixa', '2024-12-15 03:00:00'),
('Vanessa', 228, '2007-05-05', 'Administração', 2, 88, 1.8, 100, 'Feminino', 27.16, 4.19, 'Obesidade grau II', 'Gordura ideal', '2024-12-20 03:00:00'),
('Joana', 229, '2005-12-28', 'Enfermagem', 3, 53, 1.63, 76, 'Feminino', 19.95, 4.11, 'Magreza', 'Gordura baixa', '2024-12-25 03:00:00'),
('Pedro', 230, '2006-04-30', 'Informática', 1, 78, 1.78, 95, 'Masculino', 24.62, 4.29, 'Sobrepeso', 'Gordura muito baixa', '2024-09-01 03:00:00'),
('Carolina', 231, '2005-11-15', 'Comércio', 2, 68, 1.65, 88, 'Feminino', 24.98, 4.3, 'Sobrepeso', 'Gordura ideal', '2024-09-05 03:00:00'),
('Bruno', 232, '2008-08-20', 'Administração', 3, 90, 1.85, 100, 'Masculino', 26.3, 4.36, 'Obesidade grau I', 'Gordura moderada', '2024-09-10 03:00:00'),
('Raquel', 233, '2006-02-10', 'Enfermagem', 1, 58, 1.62, 82, 'Feminino', 22.11, 4.27, 'Sobrepeso', 'Excesso de gordura', '2024-09-15 03:00:00'),
('Guilherme', 234, '2005-07-02', 'Informática', 2, 80, 1.75, 98, 'Masculino', 26.12, 4.47, 'Obesidade grau I', 'Gordura ideal', '2024-09-20 03:00:00'),
('Julia', 235, '2007-04-18', 'Comércio', 3, 72, 1.68, 92, 'Feminino', 25.51, 4.4, 'Sobrepeso', 'Gordura muito baixa', '2024-09-25 03:00:00'),
('Thiago', 236, '2005-12-05', 'Administração', 1, 85, 1.8, 100, 'Masculino', 26.23, 4.28, 'Obesidade grau I', 'Gordura ideal', '2024-10-01 03:00:00'),
('Aline', 237, '2006-10-28', 'Enfermagem', 2, 55, 1.6, 78, 'Feminino', 21.48, 4.22, 'Normal', 'Gordura baixa', '2024-10-05 03:00:00'),
('Diego', 238, '2005-09-15', 'Informática', 3, 75, 1.7, 90, 'Masculino', 25.95, 4.39, 'Sobrepeso', 'Gordura ideal', '2024-10-10 03:00:00'),
('Fernanda', 239, '2008-03-10', 'Comércio', 1, 80, 1.7, 92, 'Feminino', 27.68, 4.26, 'Obesidade grau I', 'Gordura moderada', '2024-10-15 03:00:00'),
('Bruna', 240, '2006-12-28', 'Administração', 2, 90, 1.75, 100, 'Feminino', 29.39, 4.57, 'Obesidade grau II', 'Excesso de gordura', '2024-10-20 03:00:00'),
('Rafael', 241, '2005-02-20', 'Enfermagem', 3, 48, 1.55, 73, 'Masculino', 19.96, 4.37, 'Magreza', 'Gordura baixa', '2024-10-25 03:00:00'),
('Camila', 242, '2007-07-25', 'Informática', 1, 68, 1.68, 87, 'Feminino', 24.1, 4.24, 'Sobrepeso', 'Gordura muito baixa', '2024-11-01 03:00:00'),
('Lucas', 243, '2005-01-28', 'Comércio', 2, 72, 1.72, 93, 'Masculino', 24.34, 4.14, 'Sobrepeso', 'Gordura ideal', '2024-11-05 03:00:00'),
('Renata', 244, '2008-06-15', 'Administração', 3, 75, 1.65, 88, 'Feminino', 27.55, 4.35, 'Sobrepeso', 'Gordura moderada', '2024-11-10 03:00:00'),
('Gustavo', 245, '2006-11-10', 'Enfermagem', 1, 55, 1.6, 80, 'Masculino', 21.48, 4.52, 'Normal', 'Gordura baixa', '2024-11-15 03:00:00'),
('Ana', 246, '2005-10-02', 'Informática', 2, 80, 1.75, 98, 'Feminino', 26.12, 4.47, 'Obesidade grau I', 'Gordura ideal', '2024-11-20 03:00:00'),
('Daniel', 247, '2007-03-28', 'Comércio', 3, 70, 1.7, 90, 'Masculino', 24.22, 4.15, 'Sobrepeso', 'Excesso de gordura', '2024-11-25 03:00:00'),
('Mariana', 248, '2005-07-15', 'Administração', 1, 85, 1.78, 100, 'Feminino', 26.85, 4.26, 'Obesidade grau I', 'Gordura moderada', '2024-12-01 03:00:00'),
('Giovanni', 249, '2008-04-02', 'Enfermagem', 2, 60, 1.65, 85, 'Masculino', 22.04, 4.33, 'Sobrepeso', 'Gordura muito baixa', '2024-12-05 03:00:00'),
('Caroline', 250, '2006-01-20', 'Informática', 3, 75, 1.7, 92, 'Feminino', 25.95, 4.39, 'Sobrepeso', 'Gordura ideal', '2024-12-10 03:00:00'),
('Bruno', 251, '2005-09-10', 'Comércio', 1, 82, 1.75, 95, 'Masculino', 26.78, 4.37, 'Obesidade grau I', 'Gordura baixa', '2024-12-15 03:00:00'),
('Vanessa', 252, '2007-05-05', 'Administração', 2, 88, 1.8, 100, 'Feminino', 27.16, 4.19, 'Obesidade grau II', 'Gordura ideal', '2024-12-20 03:00:00'),
('Joana', 253, '2005-12-28', 'Enfermagem', 3, 53, 1.63, 76, 'Feminino', 19.95, 4.11, 'Magreza', 'Gordura baixa', '2024-12-25 03:00:00'),
('Pedro', 254, '2006-04-30', 'Informática', 1, 78, 1.78, 95, 'Masculino', 24.62, 4.29, 'Sobrepeso', 'Gordura muito baixa', '2024-09-01 03:00:00'),
('Carolina', 255, '2005-11-15', 'Comércio', 2, 68, 1.65, 88, 'Feminino', 24.98, 4.3, 'Sobrepeso', 'Gordura ideal', '2024-09-05 03:00:00'),
('Bruno', 256, '2008-08-20', 'Administração', 3, 90, 1.85, 100, 'Masculino', 26.3, 4.36, 'Obesidade grau I', 'Gordura moderada', '2024-09-10 03:00:00'),
('Raquel', 257, '2006-02-10', 'Enfermagem', 1, 58, 1.62, 82, 'Feminino', 22.11, 4.27, 'Sobrepeso', 'Excesso de gordura', '2024-09-15 03:00:00'),
('Guilherme', 258, '2005-07-02', 'Informática', 2, 80, 1.75, 98, 'Masculino', 26.12, 4.47, 'Obesidade grau I', 'Gordura ideal', '2024-09-20 03:00:00'),
('Julia', 259, '2007-04-18', 'Comércio', 3, 72, 1.68, 92, 'Feminino', 25.51, 4.4, 'Sobrepeso', 'Gordura muito baixa', '2024-09-25 03:00:00'),
('Thiago', 260, '2005-12-05', 'Administração', 1, 85, 1.8, 100, 'Masculino', 26.23, 4.28, 'Obesidade grau I', 'Gordura ideal', '2024-10-01 03:00:00'),
('Aline', 261, '2006-10-28', 'Enfermagem', 2, 55, 1.6, 78, 'Feminino', 21.48, 4.22, 'Normal', 'Gordura baixa', '2024-10-05 03:00:00'),
('Diego', 262, '2005-09-15', 'Informática', 3, 75, 1.7, 90, 'Masculino', 25.95, 4.39, 'Sobrepeso', 'Gordura ideal', '2024-10-10 03:00:00'),
('Fernanda', 263, '2008-03-10', 'Comércio', 1, 80, 1.7, 92, 'Feminino', 27.68, 4.26, 'Obesidade grau I', 'Gordura moderada', '2024-10-15 03:00:00'),
('Bruna', 264, '2006-12-28', 'Administração', 2, 90, 1.75, 100, 'Feminino', 29.39, 4.57, 'Obesidade grau II', 'Excesso de gordura', '2024-10-20 03:00:00'),
('Rafael', 265, '2005-02-20', 'Enfermagem', 3, 48, 1.55, 73, 'Masculino', 19.96, 4.37, 'Magreza', 'Gordura baixa', '2024-10-25 03:00:00'),
('Camila', 266, '2007-07-25', 'Informática', 1, 68, 1.68, 87, 'Feminino', 24.1, 4.24, 'Sobrepeso', 'Gordura muito baixa', '2024-11-01 03:00:00'),
('Lucas', 267, '2005-01-28', 'Comércio', 2, 72, 1.72, 93, 'Masculino', 24.34, 4.14, 'Sobrepeso', 'Gordura ideal', '2024-11-05 03:00:00'),
('Renata', 268, '2008-06-15', 'Administração', 3, 75, 1.65, 88, 'Feminino', 27.55, 4.35, 'Sobrepeso', 'Gordura moderada', '2024-11-10 03:00:00'),
('Gustavo', 269, '2006-11-10', 'Enfermagem', 1, 55, 1.6, 80, 'Masculino', 21.48, 4.52, 'Normal', 'Gordura baixa', '2024-11-15 03:00:00'),
('Ana', 270, '2005-10-02', 'Informática', 2, 80, 1.75, 98, 'Feminino', 26.12, 4.47, 'Obesidade grau I', 'Gordura ideal', '2024-11-20 03:00:00'),
('Daniel', 271, '2007-03-28', 'Comércio', 3, 70, 1.7, 90, 'Masculino', 24.22, 4.15, 'Sobrepeso', 'Excesso de gordura', '2024-11-25 03:00:00'),
('Mariana', 272, '2005-07-15', 'Administração', 1, 85, 1.78, 100, 'Feminino', 26.85, 4.26, 'Obesidade grau I', 'Gordura moderada', '2024-12-01 03:00:00'),
('Giovanni', 273, '2008-04-02', 'Enfermagem', 2, 60, 1.65, 85, 'Masculino', 22.04, 4.33, 'Sobrepeso', 'Gordura muito baixa', '2024-12-05 03:00:00'),
('Caroline', 274, '2006-01-20', 'Informática', 3, 75, 1.7, 92, 'Feminino', 25.95, 4.39, 'Sobrepeso', 'Gordura ideal', '2024-12-10 03:00:00'),
('Bruno', 275, '2005-09-10', 'Comércio', 1, 82, 1.75, 95, 'Masculino', 26.78, 4.37, 'Obesidade grau I', 'Gordura baixa', '2024-12-15 03:00:00'),
('Vanessa', 276, '2007-05-05', 'Administração', 2, 88, 1.8, 100, 'Feminino', 27.16, 4.19, 'Obesidade grau II', 'Gordura ideal', '2024-12-20 03:00:00'),
('Joana', 277, '2005-12-28', 'Enfermagem', 3, 53, 1.63, 76, 'Feminino', 19.95, 4.11, 'Magreza', 'Gordura baixa', '2024-12-25 03:00:00');

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `email` varchar(140) NOT NULL,
  `nome` varchar(140) NOT NULL,
  `caminho_imagem` varchar(255) NOT NULL,
  `genero` varchar(20) DEFAULT NULL,
  `telefone` varchar(20) DEFAULT NULL,
  `data_nascimento` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `senha`, `email`, `nome`, `caminho_imagem`, `genero`, `telefone`, `data_nascimento`) VALUES
(23, '$2y$10$mgp4H/dSAoUnK9vPost8qe0KgdVcpy5WxHUETceXWPTXMATZTC9Q.', 'samuel@gmail.com', 'Samuel Coordenador', '../uploads/Captura de tela 2023-12-03 232117.png', 'Masculino', '(88) 8 8888-8888', '2024-05-24'),
(29, '$2y$10$g2ky7arif/mq/gcUQX4uBuDFbA3wqoMhXA57yMa4yb/nE.MwxxU3O', 'oscar@gmail.com', 'Oscar Paulino', '../uploads/Captura de tela 2024-06-09 115959.png', 'Masculino', '(88) 9 4002-8922', '1980-05-20'),
(30, '$2y$10$6lLjnNQlAGXBj.HDKQWrlOt0RrWuwmER46IaJZ96bcjGWUpOlmgLK', 'teste@gmail.com', 'Usuário Teste', '', NULL, NULL, NULL);

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `alunos`
--
ALTER TABLE `alunos`
  ADD PRIMARY KEY (`id_aluno`);

--
-- Índices de tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `alunos`
--
ALTER TABLE `alunos`
  MODIFY `id_aluno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=281;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
