<?php

use core\App;

App::$collector->group(['prefix' => 'admin'], function ($router) {
    App::$collector->gridView('settings', ['workspace\modules\settings\controllers\SettingsController']);
});