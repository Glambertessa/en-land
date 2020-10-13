<?php


namespace workspace\console\controllers;


use core\console\ConsoleController;


class DbController extends ConsoleController
{
    public function actionInit()
    {
        try {
            $db_name = (isset($this->argv['db_name'])) ? $this->argv['db_name'] : '';
            $user = (isset($this->argv['user'])) ? $this->argv['user'] : '';
            $pass = (isset($this->argv['pass'])) ? $this->argv['pass'] : '';

            $this->createConfig($db_name, $user, $pass);

            $this->out->r("DB config created successfully", 'green');
        } catch (\Exception $e) {
            $this->out->r('Error message: ' .$e->getMessage(), 'red');
        }
    }

    protected function createConfig($db_name, $user, $pass)
    {
        mkdir("config/local");
        $file = file_get_contents("core/stubs/db_config.stub");
        $file = str_replace('{dummyDb}', $db_name, $file);
        $file = str_replace('{dummyUser}', $user, $file);
        $file = str_replace('{dummyPass}', $pass, $file);

        file_put_contents('config/local/main.php', $file);
    }
}