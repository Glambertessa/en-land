<?php


namespace workspace\modules\result\controllers;


use core\App;
use core\Controller;
use workspace\modules\result\models\Result;
use workspace\modules\result\requests\ResultSearchRequest;

class ResultController extends Controller
{
    protected function init()
    {
        $this->viewPath = '/modules/result/views/';
        $this->layoutPath = App::$config['adminLayoutPath'];
        App::$breadcrumbs->addItem(['text' => 'AdminPanel', 'url' => 'adminlte']);
        App::$breadcrumbs->addItem(['text' => 'Result', 'url' => 'admin/result']);
    }

    public function actionIndex()
    {
        $request = new ResultSearchRequest();
        $model = Result::search($request);

        return $this->render('result/index.tpl', ['h1' => 'Result', 'options' => $this->setOptions($model)]);
    }

    public function actionView($id)
    {
        $model = Result::where('id', $id)->first();

        $options = $this->setOptions();

        return $this->render('result/view.tpl', ['model' => $model, 'options' => $options]);
    }

    public function actionStore()
    {
        if($this->validation()) {
            $model = new Result();
            $model->_save();

            $this->redirect('admin/result');
        } else
            return $this->render('result/store.tpl', ['h1' => 'Добавить']);
    }

    public function actionEdit($id)
    {
        $model = Result::where('id', $id)->first();

        if($this->validation()) {
            $model->_save();

            $this->redirect('admin/result');
        } else
            return $this->render('result/edit.tpl', ['h1' => 'Редактировать: ', 'model' => $model]);
    }

    public function actionDelete()
    {
        Result::where('id', $_POST['id'])->delete();
    }

    public function setOptions($data)
    {
        return [
            'data' => $data,
            'serial' => '#',
            'fields' => [
                'id' => 'Id',
                'min_score' => 'Min_score',
                'max_score' => 'Max_score',
                'title' => 'Title',
                'description' => 'Description',
                'photo' => 'Photo',
                'test_id' => 'Test_id',
                'created_at' => 'Created_at',
                'updated_at' => 'Updated_at',
            ],
            'baseUri' => 'result'
        ];
   }

   public function validation()
   {
       return (isset($_POST["min_score"]) && isset($_POST["max_score"]) && isset($_POST["title"]) && isset($_POST["description"]) && isset($_POST["photo"]) && isset($_POST["test_id"])) ? true : false;
   }
}