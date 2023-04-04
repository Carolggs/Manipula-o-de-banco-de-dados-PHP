-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 23-Set-2022 às 17:24
-- Versão do servidor: 10.4.22-MariaDB
-- versão do PHP: 8.0.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `pet_shop`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `cuidador`
--

CREATE TABLE `cuidador` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `data_cadastro` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `cuidador`
--

INSERT INTO `cuidador` (`id`, `nome`, `email`, `data_cadastro`) VALUES
(1, 'Malvino Claúdio', 'malcla@gmail.com', '2022-09-08 00:00:00'),
(2, 'Maria', 'donamaria@gmail.com', '2022-09-23 00:00:00'),
(3, 'Liminha', 'liminhalimao@gmail.com', '2022-09-23 00:00:00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `cuidador_pet`
--

CREATE TABLE `cuidador_pet` (
  `id_cuidador` int(11) NOT NULL,
  `id_pet` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `cuidador_pet`
--

INSERT INTO `cuidador_pet` (`id_cuidador`, `id_pet`) VALUES
(1, 2),
(2, 1),
(2, 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `pet`
--

CREATE TABLE `pet` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `descricao` varchar(300) NOT NULL,
  `tel_tutor` varchar(11) NOT NULL,
  `data_cadastro` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `pet`
--

INSERT INTO `pet` (`id`, `nome`, `descricao`, `tel_tutor`, `data_cadastro`) VALUES
(1, 'lulu', 'Lulu da Pomerânia', '16999999999', '2022-09-21 00:00:00'),
(2, 'Marie', 'gata', '999999999', '2022-09-23 11:56:38');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `cuidador`
--
ALTER TABLE `cuidador`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Índices para tabela `cuidador_pet`
--
ALTER TABLE `cuidador_pet`
  ADD PRIMARY KEY (`id_cuidador`,`id_pet`),
  ADD KEY `id_pet` (`id_pet`);

--
-- Índices para tabela `pet`
--
ALTER TABLE `pet`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `cuidador`
--
ALTER TABLE `cuidador`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `pet`
--
ALTER TABLE `pet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `cuidador_pet`
--
ALTER TABLE `cuidador_pet`
  ADD CONSTRAINT `cuidador_pet_ibfk_1` FOREIGN KEY (`id_cuidador`) REFERENCES `cuidador` (`id`),
  ADD CONSTRAINT `cuidador_pet_ibfk_2` FOREIGN KEY (`id_pet`) REFERENCES `pet` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
