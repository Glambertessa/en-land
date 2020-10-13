<?php


namespace core;


class Header
{
    protected $list = [];

    public function add($key, $value)
    {
        $this->list[$key] = $value;
    }

    public function set()
    {
        foreach ($this->list as $key=>$v){
            header($key . ": " . $v);
        }
    }

}