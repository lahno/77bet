-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Май 23 2018 г., 23:41
-- Версия сервера: 5.7.20
-- Версия PHP: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `betbet`
--

-- --------------------------------------------------------

--
-- Структура таблицы `codes`
--

CREATE TABLE `codes` (
  `id` int(10) UNSIGNED NOT NULL,
  `code` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` int(10) UNSIGNED NOT NULL,
  `used` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci
ROW_FORMAT=DYNAMIC;

--
-- Дамп данных таблицы `codes`
--

INSERT INTO `codes` (`id`, `code`, `value`, `used`, `created_at`, `updated_at`) VALUES
(1, '0000001', 100, 1, '2018-05-23 17:27:39', '2018-05-23 18:28:42');

-- --------------------------------------------------------

--
-- Структура таблицы `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci
ROW_FORMAT=DYNAMIC;

--
-- Дамп данных таблицы `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(8, '2014_10_12_000000_create_users_table', 1),
(9, '2014_10_12_100000_create_password_resets_table', 1),
(10, '2018_05_22_125456_create_rates_table', 1),
(11, '2018_05_23_093746_create_transactions_table', 1),
(12, '2018_05_23_123423_create_codes_table', 1),
(13, '2018_05_23_213614_create_settings_table', 2);

-- --------------------------------------------------------

--
-- Структура таблицы `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci
ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Структура таблицы `rates`
--

CREATE TABLE `rates` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `label` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_left` datetime NOT NULL,
  `coefficient` double(2,1) NOT NULL,
  `chance` int(11) NOT NULL,
  `cost` int(11) NOT NULL,
  `body` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci
ROW_FORMAT=DYNAMIC;

--
-- Дамп данных таблицы `rates`
--

INSERT INTO `rates` (`id`, `name`, `label`, `date_left`, `coefficient`, `chance`, `cost`, `body`, `created_at`, `updated_at`) VALUES
(1, 'Test1', 'ярлык1', '2018-05-25 00:00:00', 1.7, 95, 1500, 'body', '2018-05-23 16:40:58', '2018-05-23 16:43:47'),
(2, 'Test2', 'ярлык2', '2018-05-27 03:00:00', 1.5, 98, 500, 'body2', '2018-05-23 16:42:50', '2018-05-23 16:42:50'),
(3, 'Test3', 'ярлык3', '2018-05-27 06:00:00', 1.3, 98, 800, 'body3', '2018-05-23 16:43:13', '2018-05-23 16:43:13');

-- --------------------------------------------------------

--
-- Структура таблицы `settings`
--

CREATE TABLE `settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `telegram_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fb_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vk_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `graph` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci
ROW_FORMAT=DYNAMIC;

--
-- Дамп данных таблицы `settings`
--

INSERT INTO `settings` (`id`, `telegram_link`, `fb_link`, `vk_link`, `instagram_link`, `phone`, `graph`, `created_at`, `updated_at`) VALUES
(1, 'Telegram link', 'Facebook link', 'VK link', 'Instagram link2', '+7 (889) 426 84 26', '0, 7, 14, 21, 31', NULL, '2018-05-23 20:17:48');

-- --------------------------------------------------------

--
-- Структура таблицы `transactions`
--

CREATE TABLE `transactions` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rate_id` int(10) UNSIGNED NOT NULL,
  `order_id` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` int(10) UNSIGNED NOT NULL,
  `status` enum('created','paid','payment_error','canceled','errors_insert') COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci,
  `code` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci
ROW_FORMAT=DYNAMIC;

--
-- Дамп данных таблицы `transactions`
--

INSERT INTO `transactions` (`id`, `user_email`, `rate_id`, `order_id`, `value`, `status`, `comment`, `code`, `created_at`, `updated_at`) VALUES
(1, 'lahno.dima@gmail.com', 1, '180523074613_1', 1500, 'created', NULL, NULL, '2018-05-23 16:46:13', '2018-05-23 16:46:13'),
(2, 'lahno.dima@gmail.com', 1, '180523090901_1', 1400, 'created', NULL, NULL, '2018-05-23 18:09:01', '2018-05-23 18:09:01'),
(3, 'lahno.dima@gmail.com', 1, '180523090959_1', 1400, 'created', NULL, NULL, '2018-05-23 18:09:59', '2018-05-23 18:09:59'),
(4, 'lahno.dima@gmail.com', 1, '180523091104_1', 1500, 'created', NULL, NULL, '2018-05-23 18:11:04', '2018-05-23 18:11:04'),
(5, 'lahno.dima@gmail.com', 1, '180523091422_1', 1400, 'created', NULL, NULL, '2018-05-23 18:14:22', '2018-05-23 18:14:22'),
(6, 'lahno.dima@gmail.com', 2, '180523091758_1', 400, 'created', NULL, NULL, '2018-05-23 18:17:58', '2018-05-23 18:17:58'),
(7, 'lahno.dima@gmail.com', 3, '180523091909_1', 700, 'created', NULL, NULL, '2018-05-23 18:19:09', '2018-05-23 18:19:09'),
(8, 'lahno.dima@gmail.com', 3, '180523091944_1', 700, 'created', NULL, NULL, '2018-05-23 18:19:44', '2018-05-23 18:19:44'),
(9, 'lahno.dima@gmail.com', 1, '180523092452_1', 1400, 'created', NULL, '0000001', '2018-05-23 18:24:52', '2018-05-23 18:24:52'),
(10, 'lahno.dima@gmail.com', 2, '180523092557_1', 500, 'created', NULL, NULL, '2018-05-23 18:25:57', '2018-05-23 18:25:57'),
(11, 'lahno.dima@gmail.com', 3, '180523092842_1', 700, 'created', NULL, '0000001', '2018-05-23 18:28:42', '2018-05-23 18:28:42');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `adm` tinyint(1) NOT NULL DEFAULT '0',
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci
ROW_FORMAT=DYNAMIC;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `adm`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Дмитрий Лахно', 'lahno.dima@gmail.com', '932277199', 1, '$2y$10$vhZG4BlQIeRTbajk.rKG8uqp9qydwXoeeYTzUHUSk.RB2JgG04UOa', NULL, '2018-05-23 16:39:52', '2018-05-23 16:39:52');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `codes`
--
ALTER TABLE `codes`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Индексы таблицы `rates`
--
ALTER TABLE `rates`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `codes`
--
ALTER TABLE `codes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT для таблицы `rates`
--
ALTER TABLE `rates`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
