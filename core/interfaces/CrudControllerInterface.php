<?php


namespace core\interfaces;


interface CrudControllerInterface
{
    public function actionStore();
    public function actionIndex();
    public function actionEdit($id);
    public function actionDelete($id);
    public function actionView($id);
}