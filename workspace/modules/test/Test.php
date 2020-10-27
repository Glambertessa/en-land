<?php

namespace workspace\modules\test;


use core\App;

class Test
{
    public static function run()
    {
        $config['adminLeftMenu'] = [
            [
                'title' => 'Тесты',
                'url' => '/admin/test',
                'icon' => '<i class="nav-icon fas fa-spell-check"></i>',
            ],
        ];

        App::mergeConfig($config);
    }
}