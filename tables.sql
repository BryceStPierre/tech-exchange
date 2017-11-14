CREATE TABLE `UserCodes` (
  `user_code` int NOT NULL PRIMARY KEY,
  `user_description` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE `Users` (
  `id` int(10) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `user_code` int(2) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE `Categories` (
  `id` int(10) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `label` varchar(30) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE `Ads` (
  `id` int(10) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `title` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(2000) COLLATE utf8_unicode_ci NOT NULL,
  `telephone` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `price` float(10) NOT NULL,
  `image` blob,
  `type` tinyint NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_id` int(10) NOT NULL,
  `category_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


ALTER TABLE `Users`
  ADD CONSTRAINT `Users_ibfk_1` FOREIGN KEY (`user_code`) REFERENCES `UserCodes` (`user_code`);

ALTER TABLE `Ads`
  ADD CONSTRAINT `Ads_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `Users` (`id`);

ALTER TABLE `Ads`
  ADD CONSTRAINT `Ads_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `Categories` (`id`);


INSERT INTO `UserCodes` (`user_code`, `user_description`) VALUES
 (1, 'superuser'),
 (2, 'admin'),
 (3, 'user');

INSERT INTO `Users` (`email`, `name`, `password`, `user_code`) VALUES
 ('superuser', 'superuser', 'stpierrb123', 1);