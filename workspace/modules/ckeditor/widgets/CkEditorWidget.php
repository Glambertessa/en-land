<?php


namespace workspace\modules\ckeditor\widgets;


use core\Widget;

class CkEditorWidget extends Widget
{
    public $viewPath = '/modules/ckeditor/widgets/views/';
    private static $iter = 0; // count ckeditors on one page
    protected $id = 'editor';
    protected $name = 'editorName';
    protected $text = '';
    protected $type = 'v4_full';


    public function run()
    {
        $conf = require WORKSPACE_DIR . '/modules/ckeditor/config/main.php';
        if (array_key_exists($this->type, $conf)) {
            $this->view->registerJs($conf[$this->type]['cdn']);
            ++self::$iter;
            return $this->view->getTpl($conf[$this->type]['view'],
                ['id' => $this->id . self::$iter,
                    'name' => $this->name,
                    'text' => $this->text]);
        }
        return false;
    }

    public function setType($type)
    {
        $conf = require WORKSPACE_DIR . '/modules/ckeditor/config/main.php';

        if (key_exists($type, $conf)) {
            $this->type = $type;
        }
        return $this;
    }
}