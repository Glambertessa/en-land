<?php

use core\App;

App::$collector->group(['before' => 'auth'], function ($router){
    App::$collector->group(['prefix' => 'admin'], function ($router) {
        App::$collector->gridView('test-questions', ['workspace\modules\test_questions\controllers\TestQuestionsController']);
    });
});