<?php


namespace workspace\modules\elfinder\widgets;


use Illuminate\Filesystem\Filesystem;

class ElfinderBtnWidget extends ElfinderWidget
{
    protected $name;
    protected $value;
    protected $id;
    protected $label = 'Файлы';
    protected $btnClass = 'btn btn-dark';
    protected $btnValue = 'Выбрать';

    public function run()
    {
        $this->regCss();
        $this->regJs();
        $isImg = false;
        if ($this->value) {
            $fs = new Filesystem();
            $ext = $fs->extension(RESOURCES_DIR . '/' . $this->value);
            if (in_array($ext, $this->imgExt())){
                $isImg = true;
            }
        }

        return $this->view->getTpl('select-form.tpl', [
            'name' => $this->name,
            'value' => $this->value,
            'label' => $this->label,
            'btnClass' => $this->btnClass,
            'btnValue' => $this->btnValue,
            'id' => $this->id ? $this->id : $this->name,
            'isImg' => $isImg
        ]);

    }

    private function imgExt()
    {
        return [
            'png',
            'jpe',
            'jpeg',
            'gif',
            'bmp',
            'jpg',
            'ico',
            'tiff',
        ];
    }
}