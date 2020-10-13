<?php


namespace workspace\console\controllers;


use core\console\ConsoleController;

class RunController extends ConsoleController
{

    public function actionRun()
    {
        $this->out->r('run/parse', 'green');
    }

}