<?php

namespace workspace\modules\settings;


use core\App;

class Settings
{
    public static function run()
    {
        $config['adminLeftMenu'] = [
            [
                'title' => 'Соц. Сети',
                'url' => '/admin/social',
                'icon' => '<i class="nav-icon fa fa-address-book"></i>',
            ],
            [
                'title' => 'Настройки',
                'url' => '/admin/settings',
                'icon' => '<i class="nav-icon fa fa-cog"></i>',
            ]
        ];

        App::mergeConfig($config);
    }
}