<?php


namespace workspace\controllers;


use core\code_generator\CodeGeneratorController;
use core\component_manager\lib\CmService;
use core\Controller;

class CodegenController extends Controller
{
    public function actionCodeGenerator()
    {
        $this->view->setTitle('CodeGen');

        $cg = new CodeGeneratorController();

        if (isset($_POST['table']) && isset($_POST['slug']) && isset($_POST['module']) && isset($_POST['model'])) {
            $info = $cg->genModule($_POST['table'], $_POST['slug'], $_POST['module'], $_POST['model']);

            $cm = new CmService();
            $manifest = json_decode(file_get_contents('workspace/modules/' . $_POST['module'] . '/manifest.json'));
            $data = ['version' => $manifest->version, 'status' => 'inactive', 'type' => 'module'];
            $cm->mod->save($_POST['module'], $data);
        }

        return $this->render('main/codegen.tpl', ['info' => (isset($info)) ? $info : '', 'tables' => $cg->getTables()]);
    }
}