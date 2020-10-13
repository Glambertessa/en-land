<?php


namespace core;


class BCContainer
{
    protected $options;

    public function addItem(array $data)
    {
        if($data && isset($data['text']))
            $this->options['items'][] = $data;
    }

    public function getItems()
    {
        return $this->options;
    }

    public function addSetting($name, $value)
    {
        if($name && isset($name) && $value && isset($name))
            $this->options[$name] = $value;
    }
}