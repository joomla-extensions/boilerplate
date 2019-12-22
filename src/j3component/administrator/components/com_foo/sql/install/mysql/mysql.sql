CREATE TABLE IF NOT EXISTS `#__foo_items`
(
    `id`        INT(11) UNSIGNED    NOT NULL AUTO_INCREMENT,
    `title`     VARCHAR(255)        NOT NULL,
    `alias`     VARCHAR(255)        NOT NULL,
    `published` TINYINT(1) UNSIGNED NOT NULL DEFAULT '0',
    PRIMARY KEY (`id`)
)
    ENGINE = InnoDb;
