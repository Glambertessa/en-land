<?php

namespace core;

use Rakit\Validation\Validator;

class Request
{
    /**
     * @var string $host Абсолютный адрес сервера
     */
    public $host;

    /**
     * @var array $headers Заголовки запроса
     */
    public $headers;

    /**
     * @var array
     */
    public $data = [];

    /**
     * @var array
     */
    public $errors = [];


    public function __construct($data = [])
    {
        $this->headers = $this->getRequestHeaders();
        $this->load($data);
    }


    /**
     * @return array
     */
    public function rules()
    {
        return [];
    }

    /**
     * @return array
     */
    public function messages()
    {
        return [];
    }

    /**
     * Возвращает абсолютный адрес сервера.
     * @return string
     */
    public function getHost(): string
    {
        if ($this->host !== null) {
            return $this->host;
        }

        $http = $this->getIsSecure() ? 'https' : 'http';

        if ($this->headerExist('Host')) {
            $this->host = $http . '://' . $this->getHeader('Host');
        } elseif (isset($_SERVER['SERVER_NAME'])) {
            $this->host = $http . '://' . $_SERVER['SERVER_NAME'];
        }

        return $this->host;
    }


    /**
     * Возвращает true если шифрование https, иначе false.
     * @return bool
     */
    public function getIsSecure(): bool
    {
        if (isset($_SERVER['HTTPS']) && (strcasecmp($_SERVER['HTTPS'], 'on') === 0 || $_SERVER['HTTPS'] == 1)) {
            return true;
        }

        return false;
    }


    /**
     * Проверяет был ли передан заголовок запроса.
     * @return bool
     */
    public function headerExist($header): bool
    {
        return isset($this->headers[$header]);
    }


    /**
     * Возвращает заголовок запроса
     * @param string $header Заголовок.
     * @param mixed $defaultValue Значение если, параметр не передан.
     * @return mixed|null
     */
    public function getHeader($header, $defaultValue = null)
    {
        return $this->headers[$header] ?? $defaultValue;
    }


    /**
     * Возвращает GET - параметр.
     * @param string $param Параметр.
     * @param mixed $defaultValue Значение если, параметр не передан.
     * @return mixed
     */
    public function get($param = null, $defaultValue = null)
    {
        if (is_null($param)) {
            return $_GET;
        }

        return $_GET[$param] ?? $defaultValue;
    }


    /**
     * Возвращает POST - параметр.
     * @param string $param Параметр.
     * @param mixed $defaultValue Значение если, параметр не передан.
     * @return mixed
     */
    public function post($param = null, $defaultValue = null)
    {
        if (is_null($param)) {
            return $_POST;
        }

        return $_POST[$param] ?? $defaultValue;
    }


    /**
     * Был ли POST - запрос.
     * @return bool
     */
    public function isPost(): bool
    {
        return ($_SERVER['REQUEST_METHOD'] === 'POST');
    }

    /**
     * Был ли GET - запрос.
     * @return bool
     */
    public function isGet(): bool
    {
        return ($_SERVER['REQUEST_METHOD'] === 'GET');
    }

    /**
     * Загружаем свойсва
     * @param array $data
     */
    public function load($data = [])
    {
        if (!empty($_REQUEST)) {
            foreach ($_REQUEST as $key => $item) {
                $this->{$key} = $item;
                $this->data[$key] = $item;
            }
        }
        elseif (!empty($data)){
            foreach ($data as $key => $item){
                $this->{$key} = $item;
                $this->data[$key] = $item;
            }
        }
    }

    /**
     * @return bool
     */
    public function validate()
    {
        if (!empty($this->data)) {
            $valid = new Validator();
            $validation = $valid->make($this->data, $this->rules());
            $validation->setMessages($this->messages());
            $validation->validate();
            if ($validation->fails()) {
                $this->errors = $validation->errors();
                return false;
            }
        }

        return true;
    }

    /**
     * @return array
     */
    public function getMessagesArray()
    {
        $msgs = [];
        if($this->errors){
            foreach ($this->errors->toArray() as $item){
                $msgs[] = array_values($item)[0];
            }
        }

        return $msgs;
    }

    /**
     * @return array
     */
    protected function getRequestHeaders()
    {
        $headers = array();
        foreach ($_SERVER as $key => $value) {
            if (substr($key, 0, 5) <> 'HTTP_') {
                continue;
            }
            $header = str_replace(' ', '-', ucwords(str_replace('_', ' ', strtolower(substr($key, 5)))));
            $headers[$header] = $value;
        }

        return $headers;
    }
}
