-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 22/10/2024 às 21:40
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `bd_autoria`
--
create database `bd_autoria`;
use  `bd_autoria`;
-- --------------------------------------------------------

--
-- Estrutura para tabela `autor`
--

CREATE TABLE `autor` (
  `Cod_Autor` int(11) NOT NULL,
  `Nome_Autor` varchar(30) NOT NULL,
  `Sobrenome` varchar(30) NOT NULL,
  `EmaIl` varchar(70) NOT NULL,
  `Data_Nascimento` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Despejando dados para a tabela `autor`
--

INSERT INTO `autor` (`Cod_Autor`, `Nome_Autor`, `Sobrenome`, `EmaIl`, `Data_Nascimento`) VALUES
(1, 'Jack', 'Snicket', 'jacksnicket@gmail.com', '1986-09-04'),
(2, 'Lemony ', 'Montgomery', 'Lemonymontgomery12@gmail.com', '1984-05-23'),
(3, 'Joseph', 'Maquiavel', 'JoeMaquiavel@gmail.com', '1969-01-21'),
(4, 'Gabriel', ' Santos', 'Gabrielsantos23@gmail.com', '1970-09-10'),
(5, 'Daniel ', 'Hoffman', 'DanielHoffman76@gmail.com', '1981-10-12'),
(6, 'João', 'Gomes', 'JoãoGomes44@gmail.com', '1986-03-19'),
(7, 'Leonard', 'Snart', 'LeoSnart78@gmail.com', '1988-07-10');

-- --------------------------------------------------------

--
-- Estrutura para tabela `autoria`
--

CREATE TABLE `autoria` (
  `Cod_autor` int(11) NOT NULL,
  `Cod_livro` int(11) NOT NULL,
  `Data_Lancamento` date NOT NULL,
  `Editora` varchar(60) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Despejando dados para a tabela `autoria`
--

INSERT INTO `autoria` (`Cod_autor`, `Cod_livro`, `Data_Lancamento`, `Editora`) VALUES
(1, 1, '2023-05-01', 'Maximum Books'),
(2, 1, '2023-05-01', 'Maximum Books'),
(3, 2, '2019-02-01', 'Saturno'),
(4, 2, '2019-05-01', 'Saturno'),
(5, 3, '2024-04-20', 'Titanium Books'),
(6, 3, '2024-04-30', 'Titanium Books'),
(7, 4, '2016-08-17', 'Saraiva');

-- --------------------------------------------------------

--
-- Estrutura para tabela `livro`
--

CREATE TABLE `livro` (
  `Cod_Livro` int(11) NOT NULL,
  `Titulo` varchar(60) NOT NULL,
  `Categoria` varchar(60) NOT NULL,
  `ISBN` varchar(25) NOT NULL,
  `Idioma` varchar(40) NOT NULL,
  `QtdePag` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Despejando dados para a tabela `livro`
--

INSERT INTO `livro` (`Cod_Livro`, `Titulo`, `Categoria`, `ISBN`, `Idioma`, `QtdePag`) VALUES
(1, 'Desventuras em Série: Mau começo', 'Ação e Aventura ', '978-65-00001-01-2', 'Português', 180),
(2, 'Desventuras em Série: A Sala dos Répteis', 'Ação e Aventura ', '978-65-00001-02-7', 'Português', 230),
(3, 'Revolução dos Bichos', 'Fábula, Sátira e Ficção distópica', '978-65-00002-01-3', 'Português', 276),
(4, 'O Príncipe', 'Não ficção, Medieval', '978-65-00003-01-4', 'Português ', 176),
(5, 'O Pequeno Príncipe', 'Aventura e Fantasia', '978-65-00004-03-9', 'Português', 213);

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuario`
--

CREATE TABLE `usuario` (
  `Login` varchar(50) NOT NULL,
  `Senha` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `usuario`
--

INSERT INTO `usuario` (`Login`, `Senha`) VALUES
  ('UsuarioA', 123),
  ('UsuarioB', 456),
  ('Gabriel', 000),

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `autor`
--
ALTER TABLE `autor`
  ADD PRIMARY KEY (`Cod_Autor`);

--
-- Índices de tabela `livro`
--
ALTER TABLE `livro`
  ADD PRIMARY KEY (`Cod_Livro`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `autor`
--
ALTER TABLE `autor`
  MODIFY `Cod_Autor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `livro`
--
ALTER TABLE `livro`
  MODIFY `Cod_Livro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
