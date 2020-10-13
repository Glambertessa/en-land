<?php


namespace workspace\widgets;


use core\Widget;

class Language extends Widget
{

    public function run()
    {
        $languages = \workspace\models\Language::query()->select('name')->get();
        echo $this->view->getTpl('language.tpl', ['languages' => $languages]);
    }

}