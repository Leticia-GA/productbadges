<?php

$sql = [];
$result = true;

$sql[] = "DROP TABLE IF EXISTS `" . _DB_PREFIX_ . "product_badge`";
$sql[] = "DROP TABLE IF EXISTS `" . _DB_PREFIX_ . "product_badges`";
$sql[] = "DROP TABLE IF EXISTS `" . _DB_PREFIX_ . "product_badge_lang`";

foreach ($sql as $query) {
    $result &= Db::getInstance()->execute($query);
}