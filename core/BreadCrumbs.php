<?php


namespace core;


class BreadCrumbs extends Widget
{
    public $options;

    public function setParams()
    {
        $this->options = App::$breadcrumbs->getItems();

        return $this;
    }

    public function getBC()
    {
        $class_name = $this->getField('class');
        $class = ($class_name) ? 'class="'.$class_name.'"' : '';
        $separator = $this->getField('separator', ' / ');

        $bc = ''; $j = 0;
        $amount = count($this->options['items']);
        for ($i = 0; $i < $amount; $i++)
            if(isset($this->options['items'][$i]['text']) && $this->options['items'][$i]['text'])
                $bc .= (($j++) ? $separator : '') . '<span '
                    . ((isset($this->options['items'][$i]['class']) && $this->options['items'][$i]['class'])
                        ? ' class="'.$this->options['items'][$i]['class'].'">'
                        : '>')
                    . ((isset($this->options['items'][$i]['url']) && $this->options['items'][$i]['url'] && isset($this->options['items'][$i + 1]['text']))
                        ? '<a href="/' . $this->options['items'][$i]['url'] . '">' . $this->options['items'][$i]['text'] . '</a></span>'
                        : $this->options['items'][$i]['text'].'</span>');

        return '<div ' . $class .'>' . $bc .'</div>';
    }

    public function getField($field_key, $default_value = '')
    {
        return (isset($this->options[$field_key]) && $this->options[$field_key]) ? $this->options[$field_key] : $default_value;
    }

    public function run()
    {
        $this->setParams();

        return $this->getBC();
    }
}