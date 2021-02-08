<?php

use core\App;

App::$collector->group(['prefix' => 'admin'], function ($router) {
    App::$collector->gridView('course', ['workspace\modules\course\controllers\CourseController']);
});
