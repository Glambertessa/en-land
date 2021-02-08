<?php

use core\App;

App::$collector->group(['prefix' => 'admin'], function ($router) {
    App::$collector->gridView('settings', ['workspace\modules\settings\controllers\SettingsController']);
});


App::$collector->group(['prefix' => 'admin'], function ($router) {
    App::$collector->gridView('social', ['workspace\modules\settings\controllers\SocialController']);
});