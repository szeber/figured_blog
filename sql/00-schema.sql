CREATE TABLE `users` (
    `id`             INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
    `name`           VARCHAR(255)     NOT NULL,
    `username`       VARCHAR(255)     NOT NULL,
    `password`       VARCHAR(255)     NOT NULL,
    `remember_token` VARCHAR(100)              DEFAULT NULL,
    `created_at`     TIMESTAMP        NULL     DEFAULT NULL,
    `updated_at`     TIMESTAMP        NULL     DEFAULT NULL,
    PRIMARY KEY (`id`),
    UNIQUE KEY `users_username_unique` (`username`)
) ENGINE = InnoDB DEFAULT CHARSET = utf8 COLLATE = utf8_unicode_ci;
