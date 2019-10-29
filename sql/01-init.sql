CREATE TABLE `book` (
  `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` VARCHAR(255) NOT NULL,
  `author` VARCHAR(255) NOT NULL,
  `year` INT(4),
  `location` VARCHAR(100),
  PRIMARY KEY (`id`)
) ENGINE=INNODB CHARSET=utf8 COLLATE=utf8_polish_ci;


CREATE TABLE `appuser` (
   `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
   `login` VARCHAR(100) NOT NULL,
   `email` VARCHAR(255) NOT NULL,
   `password` VARCHAR(255) NOT NULL,
   `role` TEXT NOT NULL,
   PRIMARY KEY (`id`)
);

CREATE TABLE `lease` (
     `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
     `book_id` INT(10) UNSIGNED NOT NULL,
     `reader_id` INT(10) UNSIGNED NOT NULL,
     `from` DATETIME NOT NULL,
     `to` DATETIME,
     `deadline` DATETIME NOT NULL,
     PRIMARY KEY (`id`)
);

CREATE TABLE `reader` (
      `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
      `firstname` VARCHAR(255) NOT NULL,
      `lastname` VARCHAR(255) NOT NULL,
      `pesel` VARCHAR(11) NOT NULL,
      PRIMARY KEY (`id`)
);
