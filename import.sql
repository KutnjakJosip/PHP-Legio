CREATE TABLE vijest(
   `id` INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `naslov` VARCHAR(255) NOT NULL,
    `sazetak` TEXT NOT NULL,
  `vijest` TEXT NOT NULL,
  `kategorija` VARCHAR(255) NOT NULL,
  `sakriti` BOOL NOT NULL 
);


CREATE TABLE `users` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `email` VARCHAR(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `password` VARCHAR(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `first_name` VARCHAR(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `last_name` VARCHAR(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `is_active` TINYINT(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=INNODB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



CREATE TABLE dojmovi(
  `id` INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `ime` VARCHAR(255) NOT NULL,
  `prezime` VARCHAR(255) NOT NULL,
  `email` VARCHAR(255) NOT NULL,
  `komentar` TEXT NOT NULL
)