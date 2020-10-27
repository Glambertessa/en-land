<?php

namespace workspace\modules\question;


use core\App;

class Question
{
    public static function run()
    {
        $config['adminLeftMenu'] = [
            [
                'title' => 'Question',
                'url' => '/admin/question',
                'icon' => '<i class="nav-icon fa fa-file"></i>',
            ],
        ];

        App::mergeConfig($config);
    }
}