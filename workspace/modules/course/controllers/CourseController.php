<?php


namespace workspace\modules\course\controllers;


use core\App;
use core\Controller;
use workspace\modules\course\models\Course;
use workspace\modules\course\requests\CourseSearchRequest;

class CourseController extends Controller
{
    public $viewPath = '/modules/course/views/';

    protected function init()
    {
        $this->viewPath = '/modules/course/views/';
        $this->layoutPath = App::$config['adminLayoutPath'];
        App::$breadcrumbs->addItem(['text' => 'AdminPanel', 'url' => 'adminlte']);
        App::$breadcrumbs->addItem(['text' => 'Courses', 'url' => 'admin/course']);
    }

    public function actionIndex()
    {
        $request = new CourseSearchRequest();
        $model = Course::search($request);

        return $this->render('course/index.tpl', ['h1' => 'Курсы', 'options' => $this->setOptions($model)]);
    }

    public function actionView($id)
    {
        $model = Course::where('id', $id)->first();

        $options = [
            'fields' => [
                'title' => 'Название',
                'price' => 'Цена',
                'options' => 'Условия',
                'place_left' => 'Осталось мест'
            ]
        ];

        return $this->render('course/view.tpl', ['model' => $model, 'options' => $options]);
    }

    public function actionStore()
    {
        if(isset($_POST['title']) && isset($_POST['price']) && isset($_POST['options'])) {
            $model = new Course();
            $model->title = $_POST['title'];
            $model->price = $_POST['price'];
            $model->options = $_POST['options'];
            $model->place_left = $_POST['place_left'];
            $model->save();

            $this->redirect('admin/course');
        } else
            return $this->render('course/store.tpl', ['h1' => 'Добавить курс']);
    }

    public function actionEdit($id)
    {
        $model = Course::where('id', $id)->first();

        if(isset($_POST['title']) && isset($_POST['price']) && isset($_POST['options'])) {
            $model->title = $_POST['title'];
            $model->price = $_POST['price'];
            $model->options = $_POST['options'];
            $model->place_left = $_POST['place_left'];
            $model->save();

            $this->redirect('admin/course');
        } else
            return $this->render('course/edit.tpl', ['h1' => 'Редактировать: ', 'model' => $model]);
    }

    public function actionDelete()
    {
        Course::where('id', $_POST['id'])->delete();
    }

    public function setOptions($data)
    {
        return [
            'data' => $data,
            'serial' => '#',
            'fields' => [
                'title' => 'Название',
                'price' => 'Цена',
                'options' => 'Условия',
                'place_left' => 'Осталось мест'
            ],
            'baseUri' => 'course'
        ];
    }
}