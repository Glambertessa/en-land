<?php

namespace core\component_manager\lib;


class Component implements \core\component_manager\interfaces\Component
{
    public $version;
    public $name;
    public $type;

    /**
     * Component constructor.
     * @param array $data
     */
    public function __construct(array $data = [])
    {
        $this->load($data);
    }

    /**
     * @param array $data
     */
    public function load(array $data = [])
    {
        foreach ((array)$data as $key => $datum)
            $this->{$key} = $datum;
    }
}