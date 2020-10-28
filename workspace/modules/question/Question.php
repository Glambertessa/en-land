<?php

namespace workspace\modules\question;


use core\App;

class Question
{
    public static function run()
    {
        $config['adminLeftMenu'] = [
            [
                'title' => 'Вопросы',
                'url' => '/admin/question',
                'icon' => '<i class="nav-icon fas fa-question"></i>',
            ],
        ];

        App::mergeConfig($config);
    }
}