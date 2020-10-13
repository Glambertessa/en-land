<?php

namespace core;


class VueForm
{

    public static function find($id)
    {
        if(method_exists(static::class, $id)){
            return static::$id();
        }
        return ['error' => 'form not found'];
    }

}