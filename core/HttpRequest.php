<?php
namespace core;

use core\interfaces\RequestInterface;

class HttpRequest implements RequestInterface{

    public function isValid()
    {
        if(gettype($this)==='integer'){
            return true;
        }else return false;
    }

    public function getErrors()
    {
        // TODO: Implement getErrors() method.
    }

    /**
     * Возвращает GET - параметр.
     * @param string $param Параметр.
     * @param mixed $defaultValue Значение если, параметр не передан.
     * @return mixed
     */
    public function get($param, $defaultValue = null)
    {
        return $_GET[$param] ?? $defaultValue;
    }

    /**
     * Возвращает POST - параметр.
     * @param string $param Параметр.
     * @param mixed $defaultValue Значение если, параметр не передан.
     * @return mixed
     */
    public function post($param, $defaultValue = null)
    {
        return $_POST[$param] ?? $defaultValue;
    }

    /**
     * Был ли POST - запрос.
     * @return bool
     */
    public function isPost() : bool
    {
        return ($_SERVER['REQUEST_METHOD'] === 'POST');
    }

    /**
     * Был ли GET - запрос.
     * @return bool
     */
    public function isGet() : bool
    {
        return ($_SERVER['REQUEST_METHOD'] === 'GET');
    }
}