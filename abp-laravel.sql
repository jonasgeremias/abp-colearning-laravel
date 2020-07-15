-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 16-Jul-2020 às 01:25
-- Versão do servidor: 10.4.11-MariaDB
-- versão do PHP: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `abp-laravel`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `empresas`
--

CREATE TABLE `empresas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `nome_fantasia` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `razao_social` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cnpj` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `part_satc` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nome_ceo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `data_inicio_contrato` date NOT NULL,
  `data_vigencia_1` date NOT NULL,
  `data_vigencia_2` date NOT NULL,
  `anexo_cont_social` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `anexo_cont_incub` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `anexo_adit_incub` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `obs` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `empresas`
--

INSERT INTO `empresas` (`id`, `created_at`, `updated_at`, `nome_fantasia`, `razao_social`, `cnpj`, `part_satc`, `nome_ceo`, `email`, `data_inicio_contrato`, `data_vigencia_1`, `data_vigencia_2`, `anexo_cont_social`, `anexo_cont_incub`, `anexo_adit_incub`, `obs`, `status_id`) VALUES
(1, '2020-07-15 01:07:21', '2020-07-15 01:09:58', 'Empresa 1', 'Empresa UM', '123456789', '40', 'Jonas P.', 'teste@teste', '2020-07-01', '2021-07-01', '2022-07-01', 'documentos/3vX72TNeQ8XJ81ETb05iaZjXbMjRI40AFSNl4bJ1.pdf', 'documentos/7rlL9IZLbLaqMDDjxFQsESCoont0EDfvBxvqufHj.pdf', 'documentos/BvNPMlyOu0dc4C6AzipHksHaw6JZEpZhmgnHE9tB.pdf', 'teste', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `empresa_membros`
--

CREATE TABLE `empresa_membros` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `pessoa_id` bigint(20) UNSIGNED NOT NULL,
  `empresa_id` bigint(20) UNSIGNED NOT NULL,
  `funcao_membro_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `data_inicio` date NOT NULL,
  `data_vigencia` date DEFAULT NULL,
  `anexo_documentos` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `anexo_contratos` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `empresa_status`
--

CREATE TABLE `empresa_status` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `desc_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `empresa_status`
--

INSERT INTO `empresa_status` (`id`, `desc_status`, `created_at`, `updated_at`) VALUES
(1, 'Ativo', NULL, NULL),
(2, 'Inativo', NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `membro_funcao`
--

CREATE TABLE `membro_funcao` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `desc_funcao` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `membro_funcao`
--

INSERT INTO `membro_funcao` (`id`, `desc_funcao`, `created_at`, `updated_at`) VALUES
(1, 'Administrador', NULL, NULL),
(2, 'Bolsista', NULL, NULL),
(3, 'Sócio', NULL, NULL),
(4, 'Colaborador', NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `membro_status`
--

CREATE TABLE `membro_status` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `desc_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `membro_status`
--

INSERT INTO `membro_status` (`id`, `desc_status`, `created_at`, `updated_at`) VALUES
(1, 'Ativo', NULL, NULL),
(2, 'Inativo', NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2020_06_15_011644_create_empresas_table', 1),
(4, '2020_06_15_020622_create_pessoas_table', 1),
(5, '2020_06_15_024825_create_pessoa_tipo_table', 1),
(6, '2020_06_15_024853_create_membro_funcao_table', 1),
(7, '2020_06_15_024917_create_pessoa_status_table', 1),
(8, '2020_06_15_024933_create_empresa_status_table', 1),
(9, '2020_06_17_023936_create_prestacao_contas_table', 1),
(10, '2020_06_17_025711_create_prestacao_status_table', 1),
(11, '2020_06_17_035106_create_prestacao_registro_membro_table', 1),
(12, '2020_06_17_040221_create_membro_status_table', 1),
(13, '2020_06_17_041510_create_empresa_membro_table', 1),
(14, '2020_06_23_233652_create_user_permission_table', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `pessoas`
--

CREATE TABLE `pessoas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `nome` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cpf` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rg` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_wifi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pass_wifi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `obs` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tipo_id` bigint(20) UNSIGNED NOT NULL,
  `status_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `pessoas`
--

INSERT INTO `pessoas` (`id`, `created_at`, `updated_at`, `nome`, `cpf`, `rg`, `email`, `user_wifi`, `pass_wifi`, `obs`, `tipo_id`, `status_id`) VALUES
(1, '2020-07-14 02:18:37', '2020-07-14 02:18:37', 'Jonas P. Geremias', '087.259.689-39', '7984512', 'jonasgeremiasjj@gmail.com', 'JONAS12345789', '1234567985645132', 'hjashdlaslhdaJKDASD', 1, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `pessoa_status`
--

CREATE TABLE `pessoa_status` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `desc_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `pessoa_status`
--

INSERT INTO `pessoa_status` (`id`, `desc_status`, `created_at`, `updated_at`) VALUES
(1, 'Ativo', NULL, NULL),
(2, 'Inativo', NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `pessoa_tipo`
--

CREATE TABLE `pessoa_tipo` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `desc_tipo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `pessoa_tipo`
--

INSERT INTO `pessoa_tipo` (`id`, `desc_tipo`, `created_at`, `updated_at`) VALUES
(1, 'Masculino', NULL, NULL),
(2, 'Feminino', NULL, NULL),
(3, 'Outros', NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `prestacao_contas`
--

CREATE TABLE `prestacao_contas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `empresa_id` bigint(20) UNSIGNED NOT NULL,
  `status_id` bigint(20) UNSIGNED NOT NULL,
  `registro_membros_id` bigint(20) UNSIGNED NOT NULL,
  `mes_referencia` int(11) NOT NULL,
  `faturamento_bruto` double(8,2) NOT NULL,
  `faturamento_liquido` double(8,2) NOT NULL,
  `custo_operacional` double(8,2) NOT NULL,
  `anexo_dre` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `obs` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `qtd_cliente` int(11) NOT NULL,
  `qtd_novos_clientes` int(11) NOT NULL,
  `qtd_perda_clientes` int(11) NOT NULL,
  `cac` double(8,2) NOT NULL,
  `prev_lancamento` int(11) NOT NULL,
  `per_vendas` int(11) NOT NULL,
  `per_tecnicos` int(11) NOT NULL,
  `per_juridicos` int(11) NOT NULL,
  `per_pessoas` int(11) NOT NULL,
  `per_financeiro` int(11) NOT NULL,
  `per_marketing` int(11) NOT NULL,
  `per_gestao` int(11) NOT NULL,
  `nivel_otimismo` int(11) NOT NULL,
  `nivel_interacao` int(11) NOT NULL,
  `nivel_satisfacao` int(11) NOT NULL,
  `proximos_passos` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `part_satc` int(11) NOT NULL,
  `faturamento_satc` double(8,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `prestacao_registro_membro`
--

CREATE TABLE `prestacao_registro_membro` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pretacao_contas_id` bigint(20) UNSIGNED NOT NULL,
  `membro_id` bigint(20) UNSIGNED NOT NULL,
  `nome_membro` bigint(20) UNSIGNED NOT NULL,
  `desc_membro_status` bigint(20) UNSIGNED NOT NULL,
  `desc_membro_funcao` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `prestacao_status`
--

CREATE TABLE `prestacao_status` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `desc_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `prestacao_status`
--

INSERT INTO `prestacao_status` (`id`, `desc_status`, `created_at`, `updated_at`) VALUES
(1, 'Aprovada', NULL, NULL),
(2, 'Reprovada', NULL, NULL),
(3, 'Em análise', NULL, NULL),
(4, 'Incompleta', NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `avatar`, `email_verified_at`, `permission_id`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@admin', 'users/wBZuL7nYSmu6wpqjznqnUEHcV9fxLGkyh4nYDeI5.png', NULL, 1, '$2y$10$Y2gI1U2KUAHQZHuCDlEbN.65Oad72FLHAQF3yLVbANCZunIhErK/G', NULL, NULL, '2020-07-14 02:27:54'),
(2, 'Operador', 'jonasgeremias@hotmail.com', NULL, NULL, 2, '$2y$10$b.cSTIJ1R4p6DYf0GW433.jR.2UILsXHXZfiuw.bICGJxXG/vO.Ly', NULL, '2020-07-14 05:30:33', '2020-07-14 05:30:33');

-- --------------------------------------------------------

--
-- Estrutura da tabela `user_permissions`
--

CREATE TABLE `user_permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `desc_permission` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `user_permissions`
--

INSERT INTO `user_permissions` (`id`, `desc_permission`, `created_at`, `updated_at`) VALUES
(1, 'Admin', NULL, NULL),
(2, 'Read', NULL, NULL),
(3, 'Read and Write', NULL, NULL);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `empresas`
--
ALTER TABLE `empresas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `empresas_cnpj_unique` (`cnpj`),
  ADD UNIQUE KEY `empresas_email_unique` (`email`);

--
-- Índices para tabela `empresa_membros`
--
ALTER TABLE `empresa_membros`
  ADD PRIMARY KEY (`id`),
  ADD KEY `empresa_membros_pessoa_id_index` (`pessoa_id`),
  ADD KEY `empresa_membros_empresa_id_index` (`empresa_id`);

--
-- Índices para tabela `empresa_status`
--
ALTER TABLE `empresa_status`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `membro_funcao`
--
ALTER TABLE `membro_funcao`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `membro_status`
--
ALTER TABLE `membro_status`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Índices para tabela `pessoas`
--
ALTER TABLE `pessoas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pessoas_cpf_unique` (`cpf`),
  ADD UNIQUE KEY `pessoas_rg_unique` (`rg`),
  ADD UNIQUE KEY `pessoas_email_unique` (`email`);

--
-- Índices para tabela `pessoa_status`
--
ALTER TABLE `pessoa_status`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `pessoa_tipo`
--
ALTER TABLE `pessoa_tipo`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `prestacao_contas`
--
ALTER TABLE `prestacao_contas`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `prestacao_registro_membro`
--
ALTER TABLE `prestacao_registro_membro`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `prestacao_status`
--
ALTER TABLE `prestacao_status`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_permission_id_index` (`permission_id`);

--
-- Índices para tabela `user_permissions`
--
ALTER TABLE `user_permissions`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `empresas`
--
ALTER TABLE `empresas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `empresa_membros`
--
ALTER TABLE `empresa_membros`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `empresa_status`
--
ALTER TABLE `empresa_status`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `membro_funcao`
--
ALTER TABLE `membro_funcao`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `membro_status`
--
ALTER TABLE `membro_status`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de tabela `pessoas`
--
ALTER TABLE `pessoas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `pessoa_status`
--
ALTER TABLE `pessoa_status`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `pessoa_tipo`
--
ALTER TABLE `pessoa_tipo`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `prestacao_contas`
--
ALTER TABLE `prestacao_contas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `prestacao_registro_membro`
--
ALTER TABLE `prestacao_registro_membro`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `prestacao_status`
--
ALTER TABLE `prestacao_status`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `user_permissions`
--
ALTER TABLE `user_permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
