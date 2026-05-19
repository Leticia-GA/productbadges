<?php

$sql = [];
$result = true;

$sql[] = "CREATE TABLE IF NOT EXISTS `" . _DB_PREFIX_ . "product_badge` (
    `id_badge` INT UNSIGNED NOT NULL AUTO_INCREMENT,
    `active` TINYINT(1) NOT NULL DEFAULT 1,
    `bg_color` VARCHAR(7) NOT NULL,
    `text_color` VARCHAR(7) NOT NULL,
    `position` VARCHAR(20) NOT NULL DEFAULT 'left',
    PRIMARY KEY (`id_badge`)
) ENGINE=" . _MYSQL_ENGINE_ . " DEFAULT CHARSET=utf8mb4;
";

$sql[] = "CREATE TABLE IF NOT EXISTS `" . _DB_PREFIX_ . "product_badges` (
    `id_product` INT UNSIGNED NOT NULL,
    `id_badge` INT UNSIGNED NOT NULL,
    PRIMARY KEY (`id_product`, `id_badge`)
) ENGINE=" . _MYSQL_ENGINE_ . " DEFAULT CHARSET=utf8mb4;
";

$sql[] = "CREATE TABLE IF NOT EXISTS `" . _DB_PREFIX_ . "product_badge_lang` (
    `id_badge` INT UNSIGNED NOT NULL,
    `id_lang` INT UNSIGNED NOT NULL,
    `text` VARCHAR(255) NOT NULL,
    PRIMARY KEY (id_badge, id_lang)
) ENGINE=" . _MYSQL_ENGINE_ . " DEFAULT CHARSET=utf8mb4;
";

foreach ($sql as $query) {
    $result &= Db::getInstance()->execute($query);
}