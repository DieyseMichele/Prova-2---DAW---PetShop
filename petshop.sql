-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 08-Jan-2021 às 18:59
-- Versão do servidor: 10.4.13-MariaDB
-- versão do PHP: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `petshop`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `cadastroanimal`
--

CREATE TABLE `cadastroanimal` (
  `id` int(11) NOT NULL,
  `nomeAnimal` varchar(200) NOT NULL,
  `nomeDono` varchar(200) NOT NULL,
  `idEspecie` int(11) NOT NULL,
  `raca` varchar(100) NOT NULL,
  `dataNascimento` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `cadastroanimal`
--

INSERT INTO `cadastroanimal` (`id`, `nomeAnimal`, `nomeDono`, `idEspecie`, `raca`, `dataNascimento`) VALUES
(2, 'Lily', 'Dieyse', 4, 'poodle', '2020-12-16'),
(3, 'Bolinha', 'Ana Leal', 2, 'persa', '2020-12-29');

-- --------------------------------------------------------

--
-- Estrutura da tabela `cadastroespecie`
--

CREATE TABLE `cadastroespecie` (
  `id` int(11) NOT NULL,
  `descricao` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `cadastroespecie`
--

INSERT INTO `cadastroespecie` (`id`, `descricao`) VALUES
(2, 'gato'),
(3, 'coelho'),
(4, 'cachorro'),
(6, 'papagaio'),
(7, 'cavalo');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `cadastroanimal`
--
ALTER TABLE `cadastroanimal`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `cadastroespecie`
--
ALTER TABLE `cadastroespecie`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `cadastroanimal`
--
ALTER TABLE `cadastroanimal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `cadastroespecie`
--
ALTER TABLE `cadastroespecie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
