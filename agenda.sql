-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 18-Out-2020 às 21:08
-- Versão do servidor: 10.4.8-MariaDB
-- versão do PHP: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `agenda`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `contato`
--

CREATE TABLE `contato` (
  `id` int(11) NOT NULL,
  `tipo` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `contato`
--

INSERT INTO `contato` (`id`, `tipo`) VALUES
(1, 'Email'),
(2, 'Celular'),
(3, 'Telefone');

-- --------------------------------------------------------

--
-- Estrutura da tabela `contato_pessoa`
--

CREATE TABLE `contato_pessoa` (
  `id_c_p` int(11) NOT NULL,
  `contato` varchar(60) NOT NULL,
  `pessoa_id` int(11) NOT NULL,
  `contato_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `contato_pessoa`
--

INSERT INTO `contato_pessoa` (`id_c_p`, `contato`, `pessoa_id`, `contato_id`) VALUES
(27, '(79)3246-3936', 15, 3),
(29, '(79)98849-8888', 16, 2),
(31, 'camila@yahoo.com', 17, 1),
(32, 'guinho@yahoo.comlima', 22, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `pessoa`
--

CREATE TABLE `pessoa` (
  `id` int(11) NOT NULL,
  `nome` varchar(60) NOT NULL,
  `sobrenome` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `pessoa`
--

INSERT INTO `pessoa` (`id`, `nome`, `sobrenome`) VALUES
(15, 'Wagner', 'Ramos Lima'),
(16, 'ATONIO', 'Lima'),
(17, 'Camila', 'Soares'),
(18, 'Matheus', 'Rocha'),
(19, 'Zezinho', 'Lima'),
(20, 'João', 'Lima'),
(21, 'Camila', 'Santos Soares'),
(22, 'Luana', 'Lima');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `contato`
--
ALTER TABLE `contato`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `contato_pessoa`
--
ALTER TABLE `contato_pessoa`
  ADD PRIMARY KEY (`id_c_p`),
  ADD KEY `contato_id` (`contato_id`),
  ADD KEY `contato_pessoa_ibfk_2` (`pessoa_id`);

--
-- Índices para tabela `pessoa`
--
ALTER TABLE `pessoa`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `contato`
--
ALTER TABLE `contato`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `contato_pessoa`
--
ALTER TABLE `contato_pessoa`
  MODIFY `id_c_p` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT de tabela `pessoa`
--
ALTER TABLE `pessoa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `contato_pessoa`
--
ALTER TABLE `contato_pessoa`
  ADD CONSTRAINT `contato_pessoa_ibfk_1` FOREIGN KEY (`contato_id`) REFERENCES `contato` (`id`),
  ADD CONSTRAINT `contato_pessoa_ibfk_2` FOREIGN KEY (`pessoa_id`) REFERENCES `pessoa` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
