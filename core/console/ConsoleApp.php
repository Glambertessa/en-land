<?php


namespace core\console;


use core\App;
use core\Database;
use Phroute\Phroute\Dispatcher;

class ConsoleApp extends App
{
    public $argv;

    public function run()
    {
        $this->setMods();
        if(!$rout = $this->getRout()){
            echo "Not found \n";
            exit();
        }
        App::$db = new Database();
        $dispatcher = new Dispatcher(App::$collector->getData());
        $response = $dispatcher->dispatch('GET', $rout);
        echo $response;
    }

    public function setConfig($configListFile = 'list.php')
    {
        $this->activeMod();

        if($this->argv[1] !== 'init'){
            App::$configList = (include(CONFIG_DIR . '/' . $configListFile));
            foreach (App::$configList as $item) {
                App::$config = array_merge(App::$config, (include(CONFIG_DIR . '/' . $item)));
            }
        }

        $this->setStat();

        return $this;
    }

    public function setArgv($argv)
    {
        $this->argv = $argv;
        return $this;
    }

    private function getRout()
    {
        if(isset($this->argv[1])){
            return $this->argv[1];
        }
        return null;
    }

    public static function start()
    {
        return new self();
    }


}