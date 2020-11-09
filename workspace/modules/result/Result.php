<?php

namespace workspace\modules\result;


use core\App;

class Result
{
    public static function run()
    {
        $config['adminLeftMenu'] = [
            [
                'title' => 'Результаты',
                'url' => '/admin/result',
                'icon' => '<i class="nav-icon fas fa-poll"></i>',
            ],
        ];

        App::mergeConfig($config);
    }
}