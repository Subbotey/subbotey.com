<?php

namespace core\base\settings;

use core\base\settings\Settings;

class ShopSettings
{
    private static $_instance;
    private $baseSettings;

    private $routes = [
        'admin' => [
            'name' => 'sudo'
        ],
        'vasya' => [
            'name' => 5
        ]
    ];

    private $templateArr = [
        'text' => ['price', 'short'],
        'textarea' => ['goods_content']
        ];

    public static function get($property)
    {
        return self::instance()->$property;
    }
    
    public static function instance()
    {
        if (self::$_instance instanceof self) {
            return self::$_instance;
        }

        self::$_instance = new self;
        self::$_instance->baseSettings = Settings::instance();
        $baseProperties = self::$_instance->baseSettings->clueProperties(get_class());
        self::$_instance->setProperty($baseProperties);

        return self::$_instance;
    }

    protected function setProperty($properties)
    {
        if ($properties) {
            foreach ($properties as $name => $property) {
                $this->$name = $property;
            }
        }
    }
    
    private function __construct()
    {
    }

    private function __clone()
    {
    }
}
