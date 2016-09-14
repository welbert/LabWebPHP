-- phpMyAdmin SQL Dump
-- version 4.0.4.2
-- http://www.phpmyadmin.net
--
-- Máquina: localhost
-- Data de Criação: 11-Set-2016 às 14:56
-- Versão do servidor: 5.6.13
-- versão do PHP: 5.4.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de Dados: `mybase`
--
CREATE DATABASE IF NOT EXISTS `mybase` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `mybase`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `formulario`
--

CREATE TABLE IF NOT EXISTS `formulario` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `nome` varchar(75) NOT NULL,
  `email` varchar(75) NOT NULL,
  `assunto` varchar(75) NOT NULL,
  `mensagem` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

