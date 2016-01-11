DROP TABLE IF EXISTS `publ_categories`;

CREATE TABLE `publ_categories` (
  `id` bigint(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `publ_posts`;

CREATE TABLE `publ_posts` (
  `id` bigint(11) unsigned NOT NULL AUTO_INCREMENT,
  `category_id` bigint(11) unsigned DEFAULT NULL,
  `user_id` bigint(10) unsigned DEFAULT NULL,
  `title` varchar(200) DEFAULT NULL,
  `contents` longtext,
  `thumbnail` text,
  `registered` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `post_to_users` (`user_id`),
  KEY `post_to_categories` (`category_id`),
  CONSTRAINT `post_to_categories` FOREIGN KEY (`category_id`) REFERENCES `publ_categories` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `post_to_users` FOREIGN KEY (`user_id`) REFERENCES `publ_users` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `publ_users`;

CREATE TABLE `publ_users` (
  `id` bigint(11) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(200) DEFAULT NULL,
  `password` varchar(200) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `level` int(11) DEFAULT '100',
  `registered` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `publ_users` WRITE;
/*!40000 ALTER TABLE `publ_users` DISABLE KEYS */;

INSERT INTO `publ_users` (`id`, `username`, `password`, `email`, `level`, `registered`)
VALUES
	(1,'wan2land','NTA2NDYyYjljNDQ1NjY5Y2FhZjc4NTU0ZDhlZGRiNGYwZDllOGMwNw==','wan2land@gmail.com',0,'2015-06-07 11:03:26');

/*!40000 ALTER TABLE `publ_users` ENABLE KEYS */;
UNLOCK TABLES;
