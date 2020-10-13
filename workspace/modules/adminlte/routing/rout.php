<?php

use core\App;

App::$collector->group(['before' => 'auth'], function ($router) {
    App::$collector->group(['prefix' => 'admin'], function ($router) {
        App::$collector->get('adminlte', ['workspace\modules\adminlte\controllers\AdminController', 'actionIndex']);
    });
});

//App::$collector->get('adminlte', ['workspace\modules\adminlte\controllers\AdminController', 'actionIndex']);