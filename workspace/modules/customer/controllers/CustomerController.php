<?php


namespace workspace\modules\customer\controllers;


use core\App;
use core\Controller;
use workspace\modules\customer\models\Customer;
use workspace\modules\customer\requests\CustomerSearchRequest;

class CustomerController extends Controller
{
    protected function init()
    {
        $this->viewPath = '/modules/customer/views/';
        $this->layoutPath = App::$config['adminLayoutPath'];
        App::$breadcrumbs->addItem(['text' => 'AdminPanel', 'url' => 'adminlte']);
        App::$breadcrumbs->addItem(['text' => 'Customer', 'url' => 'admin/customer']);
    }

    public function actionIndex()
    {
        $request = new CustomerSearchRequest();
        $model = Customer::search($request);

        return $this->render('customer/index.tpl', ['h1' => 'Заказчики', 'options' => $this->setOptions($model)]);
    }

    public function actionView($id)
    {
        $model = Customer::where('id', $id)->first();

        $options = $this->setOptions($model);

        return $this->render('customer/view.tpl', ['model' => $model, 'options' => $options]);
    }

    public function actionStore()
    {
        if($this->validation()) {
            $model = new Customer();
            $model->_save();

            $this->redirect('admin/customer');
        } else
            return $this->render('customer/store.tpl', ['h1' => 'Добавить']);
    }

    public function actionEdit($id)
    {
        $model = Customer::where('id', $id)->first();

        if($this->validation()) {
            $model->_save();

            $this->redirect('admin/customer');
        } else
            return $this->render('customer/edit.tpl', ['h1' => 'Редактировать: ', 'model' => $model]);
    }

    public function actionDelete()
    {
        Customer::where('id', $_POST['id'])->delete();
    }

    public function setOptions($data)
    {
        return [
            'data' => $data,
            'serial' => '#',
            'fields' => [
                'id' => 'Id',
                'name' => 'Name',
                'phone' => 'Phone',
                'social_network' => 'Social_network',
                'created_at' => 'Created_at',
                'updated_at' => 'Updated_at',
            ],
            'baseUri' => 'customer'
        ];
   }

   public function validation()
   {
       return isset($_POST["name"]) && isset($_POST["phone"]) && isset($_POST["social_network"]);
   }
}