-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 29 Eyl 2024, 18:57:56
-- Sunucu sürümü: 10.4.32-MariaDB
-- PHP Sürümü: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `blog_crud`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Bilim', 'bilim', '2024-09-27 14:52:13', '2024-09-29 13:20:33'),
(2, 'Teknoloji', 'teknoloji', '2024-09-28 11:09:16', '2024-09-28 11:09:16'),
(3, 'Seyahat', 'seyahat', '2024-09-28 11:09:16', '2024-09-28 11:09:16'),
(4, 'Yemek Tarifleri', 'yemek-tarifleri', '2024-09-28 11:09:16', '2024-09-28 11:09:16'),
(5, 'Sağlık', 'saglik', '2024-09-28 11:09:16', '2024-09-28 11:09:16'),
(6, 'Eğitim', 'egitim', '2024-09-28 11:09:16', '2024-09-28 11:09:16'),
(7, 'Moda', 'moda', '2024-09-28 11:09:16', '2024-09-28 11:09:16'),
(8, 'Spor', 'spor', '2024-09-28 11:09:16', '2024-09-28 11:09:16'),
(9, 'Oyun', 'oyun', '2024-09-28 11:09:16', '2024-09-28 11:09:16'),
(10, 'Haberler', 'haberler', '2024-09-28 11:09:16', '2024-09-28 11:09:16'),
(11, 'Kültür ve Sanat', 'kultur-ve-sanat', '2024-09-28 11:09:16', '2024-09-28 11:09:16');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `failed_jobs`
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
-- Tablo için tablo yapısı `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2024_09_27_173719_create_categories_table', 1),
(5, '2024_09_27_173719_create_posts_table', 1),
(6, '2024_09_27_173719_create_subscriptions_table', 1),
(7, '2024_09_28_105023_add_image_and_counter_to_posts_table', 2),
(8, '2024_09_28_114407_add_superadmin_to_users_table', 3),
(9, '2024_09_28_124652_add_banner_to_posts_table', 4);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `views` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `banner` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `posts`
--

INSERT INTO `posts` (`id`, `user_id`, `category_id`, `title`, `slug`, `content`, `created_at`, `updated_at`, `image`, `views`, `banner`) VALUES
(3, 1, 1, 'Web Tasarım Nedir?', 'web-tasarim-nedir', 'Web tasarım, bir web sitesinin görsel ve işlevsel öğelerinin oluşturulmasıdır...', '2024-09-28 11:31:33', '2024-09-29 12:59:29', '9dpHHEWp0FqYRshDkxH7erxWIc7a0phpvFtJkbmB.webp', 2, '1'),
(4, 1, 2, 'Web Tasarım Süreçleri', 'web-tasarim-surecleri', 'Web tasarım süreci, araştırma, tasarım, geliştirme ve test aşamalarını içerir.', '2024-09-28 11:31:33', '2024-09-29 13:24:09', 'MJLhsGxnTaXEGakVQrUOwVYjAtE82xZJ11wAxoa4.webp', 0, NULL),
(5, 1, 3, 'Responsive Web Tasarım', 'responsive-web-tasarim', 'Responsive tasarım, web sitelerinin farklı cihazlarda uyumlu görünmesini sağlar.', '2024-09-28 11:31:33', '2024-09-29 13:24:11', 'tjPC5gAFtGAX3b70u0chxLnJEo1DJJNhP2KJdHqY.webp', 0, NULL),
(6, 1, 4, 'HTML ve CSS ile Web Tasarım', 'html-ve-css-ile-web-tasarim', 'HTML ve CSS, web sayfalarının yapısını ve stilini belirler.', '2024-09-28 11:31:33', '2024-09-29 13:24:13', 'DoSbGhxgzDWS41sPKNTbRyhojrj4yWFi4k6nS7z3.webp', 0, NULL),
(7, 1, 5, 'SEO Uyumlu Web Tasarımı', 'seo-uyumlu-web-tasarimi', 'SEO uyumlu web tasarımı, arama motorlarında daha görünür olmanıza yardımcı olur.', '2024-09-28 11:31:33', '2024-09-29 13:24:21', 'Z28dErqngAeH92D0ziynBZh7srVTXoeuetxdy3Hz.webp', 0, NULL),
(8, 1, 6, 'Kullanıcı Deneyimi Tasarımı', 'kullanici-deneyimi-tasarimi', 'Kullanıcı deneyimi tasarımı, kullanıcıların bir web sitesini kullanma şekline odaklanır.', '2024-09-28 11:31:33', '2024-09-29 13:24:20', 'FzlCOqrXLMzV5og6X9lsOKwQUtF5EQw3PKHQZGQW.webp', 0, NULL),
(9, 1, 7, 'Web Tasarım Araçları', 'web-tasarim-araclari', 'Web tasarımı için kullanılan popüler araçlar arasında Adobe XD ve Figma bulunur.', '2024-09-28 11:31:33', '2024-09-29 13:24:18', 'wYVyMOaGw0wKar6uAVUXptuKMBTIDICflr90Rz0V.webp', 0, NULL),
(10, 1, 8, 'Web Tasarımında Renk Seçimi', 'web-tasariminda-renk-secimi', 'Renk seçimi, bir web tasarımının etkisini büyük ölçüde etkiler.', '2024-09-28 11:31:33', '2024-09-29 13:24:15', 'i87ESVKupINKGvs4mi4GFVDr7xFa3W8A1cPdd8wB.webp', 0, NULL),
(11, 1, 9, 'Modern Web Tasarım Trendleri', 'modern-web-tasarim-trendleri', 'Her yıl yeni web tasarım trendleri ortaya çıkmaktadır.', '2024-09-28 11:31:33', '2024-09-29 13:24:23', 'ILaEbFrVlOBJZN79fql7Oopq8IVoHgkz4aAZSCGo.webp', 1, NULL),
(12, 1, 10, 'Web Tasarımında Hatalar', 'web-tasariminda-hatalar', 'Web tasarımında sık yapılan hatalar, projelerin başarısını etkileyebilir.', '2024-09-28 11:31:33', '2024-09-29 13:24:25', 'yJigolfz1BCGBWHoN5mFDz34J2BYP8IsEbcObJCu.webp', 0, NULL),
(13, 1, 1, 'Mobil Uyumlu Web Tasarım', 'mobil-uyumlu-web-tasarim', 'Mobil uyumlu tasarım, mobil kullanıcı deneyimini iyileştirir.', '2024-09-28 11:31:33', '2024-09-29 13:24:27', 'IhSeAfFcDPqNYNe2BbLG5qpnqvDr1HvN29LXI5rT.webp', 0, NULL),
(14, 1, 2, 'Web Tasarım ve E-ticaret', 'web-tasarim-ve-e-ticaret', 'E-ticaret siteleri için özel web tasarım çözümleri.', '2024-09-28 11:31:33', '2024-09-29 13:24:30', 'FZyxBo3gmOB1UbO8ESfIUxyeTgKJUs5hrZYHdKnN.webp', 0, NULL),
(15, 1, 3, 'HTML5 ile Web Tasarım', 'html5-ile-web-tasarim', 'HTML5, modern web tasarımında yaygın olarak kullanılmaktadır.', '2024-09-28 11:31:33', '2024-09-29 13:24:32', '59TpYi64fQcya7OsKncn1XePiS6L5XSL0BgJ90Jm.webp', 1, NULL),
(16, 1, 4, 'CSS3 ile Animasyonlar', 'css3-ile-animasyonlar', 'CSS3, web sitelerinde etkileyici animasyonlar oluşturmanıza olanak tanır.', '2024-09-28 11:31:33', '2024-09-29 13:24:34', 'cYiR2gkvSSNHQzDyHadD0Ldn2XBh5LyVyvzaFtJe.webp', 0, NULL),
(17, 1, 5, 'Web Tasarımında Typografi', 'web-tasariminda-typografi', 'İyi bir tipografi, web tasarımının önemli bir parçasıdır.', '2024-09-28 11:31:33', '2024-09-29 13:24:37', '3trrGQ0ykeLC1UcqP2mjiQDyqF7pXk0GSWNJZvmR.webp', 0, NULL),
(18, 1, 6, 'Web Tasarımında İçerik Yönetimi', 'web-tasariminda-icerik-yonetimi', 'İçerik yönetimi sistemleri, web sitelerinin yönetimini kolaylaştırır.', '2024-09-28 11:31:33', '2024-09-29 13:24:39', 'Hx41jWu3Mx5cpWd7K8sZZKVOzs4PONyZo74OxKts.webp', 0, NULL),
(19, 1, 7, 'Açık Kaynak Web Tasarım Araçları', 'acik-kaynak-web-tasarim-araclari', 'Açık kaynaklı araçlar ile maliyetleri düşürebilirsiniz.', '2024-09-28 11:31:33', '2024-09-28 11:31:33', NULL, 0, NULL),
(20, 1, 8, 'Web Tasarımında Güvenlik', 'web-tasariminda-guvenlik', 'Web tasarımı sürecinde güvenliği göz önünde bulundurmak önemlidir.', '2024-09-28 11:31:33', '2024-09-28 11:31:33', NULL, 0, NULL),
(21, 1, 9, 'Web Tasarımında Test Süreci', 'web-tasariminda-test-sureci', 'Web sitelerinin düzgün çalışıp çalışmadığını test etmek kritik bir aşamadır.', '2024-09-28 11:31:33', '2024-09-28 11:31:33', NULL, 0, NULL),
(22, 1, 10, 'İyi Bir Web Tasarımının Özellikleri', 'iyi-bir-web-tasariminin-ozellikleri', 'İyi bir web tasarımında dikkat edilmesi gereken unsurlar.', '2024-09-28 11:31:33', '2024-09-28 11:31:33', NULL, 0, NULL),
(28, 1, 1, 'Lorem ipsum dolor sit', 'Lorem ipsum dolor sit', 'Lorem ipsum dolor sit Lorem ipsum dolor sitLorem ipsum dolor sitLorem ipsum dolor sit Lorem ipsum dolor sit', '2024-09-28 10:39:28', '2024-09-29 12:59:36', 'fdMwii4IC1UEsIFlx4jY6AeXfVxTvfhdLLq8JNGy.webp', 1, NULL);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('IjACvB2sjbynhiiawgsV5EwxAEAfZumwRvvr3KpV', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/129.0.0.0 Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoiS1pzdlV1OHJNUVlYRkZiRVV3S2pGYkluV3RTUXdzYm1TS1RaTWVnWiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzQ6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9wb3N0cy9jcmVhdGUiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjEzOiJ2aXNpdGVkX3Bvc3RzIjthOjM6e2k6MDtpOjM7aToxO2k6Mjg7aToyO2k6MTE7fXM6MzoidXJsIjthOjA6e31zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO30=', 1727627532);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `subscriptions`
--

CREATE TABLE `subscriptions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `subscriptions`
--

INSERT INTO `subscriptions` (`id`, `email`, `status`, `created_at`, `updated_at`) VALUES
(1, 'mustafa@alestamedya.com', 1, '2024-09-27 14:52:32', '2024-09-27 14:52:32');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `superadmin` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `superadmin`) VALUES
(1, 'Mustafa ARSLANTAŞ', 'mustafa@alestamedya.com', NULL, '$2y$12$N9n8OE0UyiOHQdsp.HEUau3tlI98G1.r9dyjad3QwS0Ptj/Yk6hrO', NULL, '2024-09-27 15:03:13', '2024-09-27 15:03:13', 1);

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Tablo için indeksler `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Tablo için indeksler `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_slug_unique` (`slug`);

--
-- Tablo için indeksler `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Tablo için indeksler `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Tablo için indeksler `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Tablo için indeksler `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `posts_slug_unique` (`slug`),
  ADD KEY `posts_user_id_foreign` (`user_id`),
  ADD KEY `posts_category_id_foreign` (`category_id`);

--
-- Tablo için indeksler `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Tablo için indeksler `subscriptions`
--
ALTER TABLE `subscriptions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `subscriptions_email_unique` (`email`);

--
-- Tablo için indeksler `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Tablo için AUTO_INCREMENT değeri `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Tablo için AUTO_INCREMENT değeri `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- Tablo için AUTO_INCREMENT değeri `subscriptions`
--
ALTER TABLE `subscriptions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Tablo için AUTO_INCREMENT değeri `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Dökümü yapılmış tablolar için kısıtlamalar
--

--
-- Tablo kısıtlamaları `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `posts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
