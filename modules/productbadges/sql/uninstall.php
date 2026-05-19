<?php

$sql = [];

$sql[] = "DROP TABLE IF EXISTS `" . _DB_PREFIX_ . "productbadges`";
$sql[] = "DROP TABLE IF EXISTS `" . _DB_PREFIX_ . "product_badge`";

foreach ($sql as $query) {
    Db::getInstance()->execute($query);
}