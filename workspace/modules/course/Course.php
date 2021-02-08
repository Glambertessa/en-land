<?php

namespace workspace\modules\course;


use core\App;

class Course
{
    public static function run()
    {
        $config['adminLeftMenu'] = [
            [
                'title' => 'Курсы',
                'url' => '/admin/course',
                'icon' => '<i class="nav-icon fa fa-cog"></i>',
            ]
        ];

        App::mergeConfig($config);
    }
}