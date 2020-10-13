<?php

namespace core;

use Illuminate\Database\Capsule\Manager as Capsule;
use Illuminate\Database\Schema\Builder;
use Illuminate\Events\Dispatcher;
use Illuminate\Container\Container;

class Database
{
    /** @var Builder $capsule */
    public $schema;

    /** @var Capsule $capsule */
    public $capsule;

    function __construct()
    {
        if(isset(App::$config['db'])) {
            $this->capsule = new Capsule;
            $this->capsule->addConnection([
                'driver' => App::$config['db']['driver'],
                'host' => App::$config['db']['host'],
                'database' => App::$config['db']['db_name'],
                'username' => App::$config['db']['user'],
                'password' => App::$config['db']['pass'],
                'charset' => App::$config['db']['charset'],
                'collation' => App::$config['db']['collation'],
                'prefix' => App::$config['db']['prefix'],
            ]);
            // Setup the Eloquent ORM…

            $this->capsule->setEventDispatcher(new Dispatcher(new Container));

            $this->capsule->setAsGlobal();

            $this->capsule->bootEloquent();

            $this->schema = $this->capsule->schema();
        }
    }
}