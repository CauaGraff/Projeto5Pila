-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 07/05/2024 às 23:44
-- Versão do servidor: 10.4.28-MariaDB
-- Versão do PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `projeto5pila`
--

--
-- Despejando dados para a tabela `contas_plano_contas`
--

INSERT INTO `contas_plano_contas` (`id`, `descricao`, `tipo`, `agrupamento`, `created_at`, `updated_at`) VALUES
(1, 'Receitas', 'A', '1.', '2024-05-06 03:07:44', '2024-05-06 03:07:44'),
(2, 'Receitas Sobre Salários', 'A', '1.01', '2024-05-06 03:07:54', '2024-05-06 03:07:54'),
(3, 'Salarios Recebidos', 'A', '1.01.01', '2024-05-06 03:08:05', '2024-05-06 03:08:05'),
(4, 'Salario Empresa X', 'S', '1.01.01.01', '2024-05-06 03:08:18', '2024-05-06 03:08:18'),
(5, 'Salario Empresa Y', 'S', '1.01.01.02', '2024-05-06 03:08:28', '2024-05-06 03:08:28'),
(6, 'Recebimentos Diversos', 'A', '1.01.02', NULL, NULL),
(7, 'Criação de projetos', 'S', '1.01.02.01', NULL, NULL),
(8, 'Consultoria', 'S', '1.01.02.02', NULL, NULL),
(9, 'Desenvolvimento de Sistemas', 'S', '1.01.02.03', NULL, NULL),
(10, 'Manutenção de Sistemas/Projetos', 'S', '1.01.02.04', NULL, NULL),
(11, 'Despesas', 'A', '2', NULL, NULL),
(12, 'Despesas Fixas', 'A', '2.01', NULL, NULL),
(13, 'Despesas Mensais com Empresa', 'A', '2.01.01', NULL, NULL),
(14, 'Agua', 'S', '2.01.01.01', NULL, NULL),
(15, 'Luz', 'S', '2.01.01.02', NULL, NULL),
(16, 'Telefone', 'S', '2.01.01.03', NULL, NULL),
(17, 'Aluguel', 'S', '2.01.01.04', NULL, NULL),
(18, 'Internet', 'S', '2.01.01.05', NULL, NULL),
(19, 'Despesas Mensais com Funcionários', 'A', '2.01.02', NULL, NULL),
(20, 'Pagamento de Salários', 'S', '2.01.02.01', NULL, NULL),
(21, 'Pagamento de Terceirizados', 'S', '2.01.02.02', NULL, NULL),
(22, 'Encargos/Taxas Sociais', 'S', '2.01.02.03', NULL, NULL),
(23, 'Despesas Variáveis', 'A', '2.02', NULL, NULL),
(24, 'Despesas com Materiais e de Limpeza', 'A', '2.02.01', NULL, NULL),
(25, 'Materiais de Escritório', 'S', '2.02.01.01', NULL, NULL),
(26, 'Materiais de Limpeza', 'S', '2.02.01.02', NULL, NULL),
(27, 'Supermercado', 'S', '2.02.01.03', NULL, NULL),
(28, 'Aluguel/Locação de salas ou equipamentos', 'S', '2.02.01.03', NULL, NULL),
(29, 'Bancos', 'A', '3', NULL, NULL),
(30, 'Entradas', 'A', '3.01', NULL, NULL),
(31, 'Depósitos', 'A', '3.01.01', NULL, NULL),
(32, 'Depósito Conta 1', 'S', '3.01.01.01', NULL, NULL),
(33, 'Depósito Conta 2', 'S', '3.01.01.02', NULL, NULL),
(34, 'Saídas', 'A', '3.02', NULL, NULL),
(35, 'Saques', 'A', '3.02.01', NULL, NULL),
(36, 'Saques Conta 1', 'S', '3.02.01.01', NULL, NULL),
(37, 'Saques Conta 2', 'S', '3.02.01.02', NULL, NULL);

--
-- Despejando dados para a tabela `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(5, '2014_10_12_000000_create_users_table', 1),
(6, '2014_10_12_100000_create_password_resets_table', 1),
(7, '2019_08_19_000000_create_failed_jobs_table', 1),
(21, '2019_12_14_000001_create_personal_access_tokens_table', 2),
(23, '2024_05_05_222340_create_lancamentos_caixa_table', 2),
(24, '2024_05_05_214618_create_contas_plano_contas_table', 3),
(25, '2024_05_06_001405_create_parametros_table', 4);

--
-- Despejando dados para a tabela `parametros`
--

INSERT INTO `parametros` (`id`, `descricao`, `indice`, `p_v`, `aplicacao`, `created_at`, `updated_at`) VALUES
(1, 'Juros', 0.03, 'P', 'ao dia', NULL, NULL),
(2, 'Multa', 1.00, 'P', 'do valor da parcela', NULL, NULL),
(3, 'Acréscimos', 0.00, 'V', 'repassar valor', NULL, NULL),
(4, 'Descontos', 5.00, 'P', 'do valor da parcela se pago antes do vencimento', NULL, NULL);

--
-- Despejando dados para a tabela `users`
--

INSERT INTO `users` (`id`, `user`, `password`, `type`, `created_at`, `updated_at`) VALUES
(1, 'caua', '$2y$10$sMCy9yNkAs7zW3J1qiEyi.MMY91fbH4xRQGo/tHrVgaLUE3fl57jy', 'A', '2024-04-17 01:31:44', '2024-04-17 01:31:44'),
(2, 'teste2', '$2y$10$uUlX8S4Ass7n.e0mCxqZC.YzqS85.ova5HCBB//CCVyEm1sLLuDre', 'A', '2024-04-17 01:40:48', '2024-04-17 01:40:48'),
(3, 'teste3', '$2y$10$6BFXxSHtUK7aNndaiBk2Ae58USFdVagFt.W8aFCQrUpUuioIg8VIi', 'A', '2024-04-17 01:44:14', '2024-04-17 01:44:14');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
