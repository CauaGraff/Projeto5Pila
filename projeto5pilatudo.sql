-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 07/05/2024 às 23:43
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

-- --------------------------------------------------------

--
-- Estrutura para tabela `contas_plano_contas`
--

CREATE TABLE `contas_plano_contas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `descricao` varchar(255) NOT NULL,
  `tipo` enum('A','S') NOT NULL,
  `agrupamento` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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

-- --------------------------------------------------------

--
-- Estrutura para tabela `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `lancamentos_caixas`
--

CREATE TABLE `lancamentos_caixas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `data` date NOT NULL,
  `historico` varchar(255) NOT NULL,
  `valor` decimal(10,2) NOT NULL,
  `tipo` enum('C','D') NOT NULL,
  `conta_id` bigint(20) UNSIGNED NOT NULL,
  `data_vencimento` date DEFAULT NULL,
  `data_baixa` date DEFAULT NULL,
  `juros` decimal(10,2) NOT NULL DEFAULT 0.00,
  `acrescimos` decimal(10,2) NOT NULL DEFAULT 0.00,
  `descontos` decimal(10,2) NOT NULL DEFAULT 0.00,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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

-- --------------------------------------------------------

--
-- Estrutura para tabela `parametros`
--

CREATE TABLE `parametros` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `descricao` varchar(255) NOT NULL,
  `indice` decimal(10,2) NOT NULL,
  `p_v` enum('P','V') NOT NULL,
  `aplicacao` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `parametros`
--

INSERT INTO `parametros` (`id`, `descricao`, `indice`, `p_v`, `aplicacao`, `created_at`, `updated_at`) VALUES
(1, 'Juros', 0.03, 'P', 'ao dia', NULL, NULL),
(2, 'Multa', 1.00, 'P', 'do valor da parcela', NULL, NULL),
(3, 'Acréscimos', 0.00, 'V', 'repassar valor', NULL, NULL),
(4, 'Descontos', 5.00, 'P', 'do valor da parcela se pago antes do vencimento', NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `type` char(1) NOT NULL COMMENT 'A = Administrador, U = Usuario',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `users`
--

INSERT INTO `users` (`id`, `user`, `password`, `type`, `created_at`, `updated_at`) VALUES
(1, 'caua', '$2y$10$sMCy9yNkAs7zW3J1qiEyi.MMY91fbH4xRQGo/tHrVgaLUE3fl57jy', 'A', '2024-04-17 01:31:44', '2024-04-17 01:31:44'),
(2, 'teste2', '$2y$10$uUlX8S4Ass7n.e0mCxqZC.YzqS85.ova5HCBB//CCVyEm1sLLuDre', 'A', '2024-04-17 01:40:48', '2024-04-17 01:40:48'),
(3, 'teste3', '$2y$10$6BFXxSHtUK7aNndaiBk2Ae58USFdVagFt.W8aFCQrUpUuioIg8VIi', 'A', '2024-04-17 01:44:14', '2024-04-17 01:44:14');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `contas_plano_contas`
--
ALTER TABLE `contas_plano_contas`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Índices de tabela `lancamentos_caixas`
--
ALTER TABLE `lancamentos_caixas`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `parametros`
--
ALTER TABLE `parametros`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`email`);

--
-- Índices de tabela `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Índices de tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `contas_plano_contas`
--
ALTER TABLE `contas_plano_contas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT de tabela `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `lancamentos_caixas`
--
ALTER TABLE `lancamentos_caixas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de tabela `parametros`
--
ALTER TABLE `parametros`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
