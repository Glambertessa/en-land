<?php

use core\App;

App::$collector->any('finder-connector', ['workspace\modules\elfinder\controllers\ConnectorController', 'actionIndex']);

App::$collector->group(['prefix' => 'admin'], function ($router) {
    App::$collector->get('elfinder', ['workspace\modules\elfinder\controllers\ConnectorController', 'actionMainAdmin']);
});