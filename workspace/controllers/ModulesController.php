<?php


namespace workspace\controllers;


use core\App;
use core\component_manager\lib\CM;
use core\component_manager\lib\Mod;
use core\Controller;
use core\GridView;
use core\GridViewHelper;
use core\modules\Modules;
use core\modules\ModulesHandler;
use core\modules\ModulesSearchRequest;

class ModulesController extends Controller
{
    public function actionModules()
    {
        $this->view->setTitle('Modules');

        $model = Modules::search(new ModulesSearchRequest(), ModulesHandler::getAllModules());

        return $this->render('main/modules.tpl', ['options' => $this->setModulesOptions($model)]);
    }

    public function actionModuleUpload()
    {
        $cm = new CM();
        $cm->upload($_POST['data']);

        ModulesHandler::clearRequest();
        $model = Modules::search(new ModulesSearchRequest(), ModulesHandler::getAllModules());

        return GridView::widget($this->setModulesOptions($model))->run();
    }

    public function actionModuleDownload()
    {
        $cm = new CM();
        $cm->download($_POST['data']);

        $data = json_decode($_POST['data']);
        $rel_arr = ModulesHandler::post_file_get_contents(App::$config['component_manager']['url'] . '/relations',
            ['slug' => $data->name, 'version' => $data->version]);

        if($rel_arr)
            foreach ($rel_arr as $value)
                $cm->download(json_encode($value));

        ModulesHandler::clearRequest();
        $model = Modules::search(new ModulesSearchRequest(), ModulesHandler::getAllModules());

        return GridView::widget($this->setModulesOptions($model))->run();
    }

    public function actionModuleUpdate()
    {
        $cm = new CM();
        $cm->update($_POST['data']);

        ModulesHandler::clearRequest();
        $model = Modules::search(new ModulesSearchRequest(), ModulesHandler::getAllModules());

        return GridView::widget($this->setModulesOptions($model))->run();
    }

    public function actionSetActive()
    {
        $cm = new CM();
        $cm->modChangeStatusToActive($_POST['data']);

        ModulesHandler::clearRequest();
        $model =  Modules::search(new ModulesSearchRequest(), ModulesHandler::getAllModules());

        return GridView::widget($this->setModulesOptions($model))->run();
    }

    public function actionSetInactive()
    {
        $cm = new CM();
        $cm->modChangeStatusToInactive($_POST['data']);

        ModulesHandler::clearRequest();
        $model = Modules::search( new ModulesSearchRequest(), ModulesHandler::getAllModules());

        return GridView::widget($this->setModulesOptions($model))->run();
    }

    public function actionModuleDelete()
    {
        $slug = json_decode($_POST['data'])->name;

        $mod = new Mod();
        $mod->deleteDirectory(ROOT_DIR . '/workspace/modules/' . $slug);

        $cm = new CM();
        $cm->modDeleteFromJson($slug);

        ModulesHandler::clearRequest();
        $model = Modules::search(new ModulesSearchRequest(), ModulesHandler::getAllModules());

        return GridView::widget($this->setModulesOptions($model))->run();
    }

    public function actionAddLocalModulesToManifest()
    {
        $module = new ModulesHandler();
        $module->addToManifest();

        $this->redirect('modules');
    }

    public function actionChangeVersion()
    {
        $mh = new ModulesHandler();

        return GridView::widget($this->setModulesOptions($mh->versionChanged()))->run();
    }

    public function setModulesOptions($data)
    {
        return [
            'data' => $data,
            'serial' => '#',
            'actionBtn' => 'del_all',
            'fields' => [
                'download' => [
                    'label' => '',
                    'showFilter' => false,
                    'value' => function ($model) {
                        $name = $model[0]->name;
                        $version = $model[0]->version;
                        $localStatus = $model[0]->localStatus;
                        $fl = 0;
                        foreach ($model as $item)
                            if ($item->localStatus == 'local')
                                $fl = 1;
                        if ($localStatus == 'server' && $fl == 0)
                            return GridViewHelper::button("download-$name", '__cjax', 'Скачать',
                                'cloud-download-alt', 'data-name="' . $name . '" data-version="' . $version
                                . '" data-action="module-download" data-target="cjax"');
                        elseif ($localStatus == 'local')
                            return GridViewHelper::button("update-$name", '__cjax', 'Обновить',
                                'redo', 'data-name="' . $name . '" data-version="' . $version
                                . '" data-action="module-update" data-target="cjax"');
                        else return GridViewHelper::div('', 'fixed-width');
                    }
                ],
                'upload' => [
                    'label' => '',
                    'showFilter' => false,
                    'value' => function ($model) {
                        $name = $model[0]->name;

                        return ($model[0]->localStatus == 'local')
                            ? GridViewHelper::button("upload-$name", '__cjax', 'Загрузить в облако',
                                'cloud-upload-alt', 'data-name="' . $name . '" data-version="' . $model[0]->version
                                . '" data-action="module-upload" data-target="cjax"')
                            : GridViewHelper::div('', 'fixed-width');
                    }
                ],
                'toggle' => [
                    'label' => '',
                    'showFilter' => false,
                    'value' => function ($model) {
                        $name = $model[0]->name;
                        $version = $model[0]->version;
                        $status = $model[0]->status;

                        if ($status == 'active')
                            return GridViewHelper::button("set-inactive-$name", '__cjax', 'Отключить',
                                'toggle-on', 'data-name="' . $name . '" data-version="' . $version
                                . '" data-action="module-set-inactive" data-target="cjax"');
                        elseif ($status == 'inactive')
                            return GridViewHelper::button("set-active-$name", '__cjax', 'Включить',
                                'toggle-off', 'data-name="' . $name . '" data-version="' . $version
                                . '" data-action="module-set-active" data-target="cjax"');
                        else
                            return GridViewHelper::div('', 'fixed-width');
                    },
                ],
                'delete' => [
                    'label' => '',
                    'showFilter' => false,
                    'value' => function ($model) {
                        $name = $model[0]->name;

                        return ($model[0]->localStatus == 'local')
                            ? GridViewHelper::button("delete-$name", '__cjax', 'Удалить',
                                'trash', 'data-name="' . $name . '" data-version="' . $model[0]->version
                                . '" data-action="module-delete" data-target="cjax"')
                            : GridViewHelper::div('', 'fixed-width');
                    },
                ],
                'status' => [
                    'label' => 'Статус',
                    'value' => function ($model) {
                        return ($model[0]->localStatus == 'server')
                            ? GridViewHelper::div('not downloaded')
                            : GridViewHelper::div($model[0]->status);
                    }
                ],
                'name' => [
                    'label' => 'Название',
                    'value' => function ($model) {
                        return GridViewHelper::div($model[0]->name);
                    }
                ],
                'description' => [
                    'label' => 'Описание',
                    'value' => function ($model) {
                        return GridViewHelper::div($model[0]->description);
                    }
                ],
                'version' => [
                    'label' => 'Версия',
                    'value' => function ($model) {
                        return GridViewHelper::select($model, '__cjax', 'data-name="'
                            . $model[0]->name . '" data-action="change-version" data-target="cjax"');
                    }
                ],
                'linked' => [
                    'label' => 'Связанные модули',
                    'value' => function($model) {
                        $relations = '';
                        if(isset($model[0]->relations) && $model[0]->relations)
                            foreach ($model[0]->relations as $relation)
                                $relations .= "$relation->name - $relation->version <br>";

                        return GridViewHelper::div($relations);
                    },
                    'showFilter' => false,
                ],
            ],
            'baseUri' => 'modules',
            'pagination' => [
                'per_page' => 10
            ]
        ];
    }
}