<?php

class ProductBadge extends ObjectModel
{
    public $id_badge;
    public $active;
    public $bg_color;
    public $text_color;
    public $position;
    public $text;

    public static $definition = [
        'table' => 'product_badge',
        'primary' => 'id_badge',
        'fields' => [
            'active' => [
                'type' => self::TYPE_BOOL,
                'validate' => 'isBool',
            ],
            'bg_color' => [
                'type' => self::TYPE_STRING,
                'validate' => 'isColor',
                'size' => 7,
                'required' => true,
            ],
            'text_color' => [
                'type' => self::TYPE_STRING,
                'validate' => 'isColor',
                'size' => 7,
                'required' => true,
            ],
            'position' => [
                'type' => self::TYPE_STRING,
                'validate' => 'isString',
                'size' => 20,
                'required' => true,
            ],
            'text' => [
                'type' => self::TYPE_STRING,
                'lang' => true,
                'validate' => 'isGenericName',
                'required' => true,
                'size' => 255,
            ],
        ],
    ];
}