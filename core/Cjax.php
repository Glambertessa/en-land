<?php


namespace core;


class Cjax extends Widget
{
    public $options;
    public $data;

    public function __construct($options)
    {
        parent::__construct();

        $this->options = $options;

        return $this;
    }

    public function run()
    {
        if(isset($this->options['data']))
            return '<div id="'.$this->options['id'].'">'.$this->options['data'].'</div>';
        elseif (isset($this->options['point']) && $this->options['point'] == 'start')
            return '<div id="'.$this->options['id'].'">';
        elseif (isset($this->options['point']) && $this->options['point'] == 'end')
            return '</div>';
        else
            return '';
    }
}