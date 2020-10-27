<?php

namespace workspace\modules\test_questions;


use core\App;

class Test_questions
{
    public static function run()
    {
        $config['adminLeftMenu'] = [
            [
                'title' => 'TestQuestions',
                'url' => '/admin/test-questions',
                'icon' => '<i class="nav-icon fa fa-file"></i>',
            ],
        ];

        App::mergeConfig($config);
    }
}