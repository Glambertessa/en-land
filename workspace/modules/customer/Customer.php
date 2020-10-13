<?php

namespace workspace\modules\customer;


use core\App;

class Customer
{
    public static function run()
    {
        $config['adminLeftMenu'] = [
            [
                'title' => 'Заказчики',
                'url' => '/admin/customer',
                'icon' => '<i class="nav-icon fa fa-file"></i>',
            ],
        ];

        App::mergeConfig($config);
    }
}