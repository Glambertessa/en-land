<?php

use core\App;

App::$collector->group(['after' => 'main_group', 'params' => ['AFTER']], function ($router) {
    App::$collector->group(['before' => 'next'], function ($router) {
        App::$collector->get('/', [workspace\controllers\MainController::class, 'actionIndex'],
            ['before' => 'some', 'params' => ['param to some, BEFORE']]);
    });
});
App::$collector->any('sign-up', ['workspace\controllers\MainController', 'actionSignUp']);
App::$collector->any('sign-in', ['workspace\controllers\MainController', 'actionSignIn']);
App::$collector->any('logout', ['workspace\controllers\MainController', 'actionLogout']);

App::$collector->group(['before' => 'auth'], function ($router) {
    App::$collector->any('admin', ['workspace\modules\adminlte\controllers\AdminController', 'actionIndex']);
});

App::$collector->any('test', ['workspace\controllers\MainController', 'actionTest']);
App::$collector->any('test-handler', ['workspace\controllers\MainController', 'actionTestHandler']);

if (App::$config['codegen'] == 'on')
    App::$collector->any('codegen', ['workspace\controllers\CodegenController', 'actionCodeGenerator']);

if (App::$config['modules_manager'] == 'on')
    App::$collector->cors('modules', ['workspace\controllers\ModulesController'], ['actionModules']);

App::$collector->any('module-upload', ['workspace\controllers\ModulesController', 'actionModuleUpload']);
App::$collector->any('module-update', ['workspace\controllers\ModulesController', 'actionModuleUpdate']);
App::$collector->any('module-download', ['workspace\controllers\ModulesController', 'actionModuleDownload']);
App::$collector->any('module-set-active', ['workspace\controllers\ModulesController', 'actionSetActive']);
App::$collector->any('module-set-inactive', ['workspace\controllers\ModulesController', 'actionSetInactive']);
App::$collector->any('module-delete', ['workspace\controllers\ModulesController', 'actionModuleDelete']);
App::$collector->any('change-version', ['workspace\controllers\ModulesController', 'actionChangeVersion']);
App::$collector->any('update-manifest', ['workspace\controllers\ModulesController', 'actionAddLocalModulesToManifest']);

App::$collector->any('add-order', ['workspace\controllers\MainController', 'actionAddOrder']);
App::$collector->any('show-test', ['workspace\controllers\MainController', 'actionShowTest']);
App::$collector->any('get-vocabulary', ['workspace\controllers\MainController', 'actionGetVocabulary']);