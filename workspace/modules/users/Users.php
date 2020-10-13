<?php

namespace workspace\modules\users;


use core\App;

class Users
{
    public static function run()
    {
        $config['adminLeftMenu'] = [
            [
                'title' => 'Пользователи',
                'url' => '/admin/users',
                'icon' => '<i class="nav-icon fa fa-users"></i>',
            ],
        ];

        App::mergeConfig($config);
    }
}