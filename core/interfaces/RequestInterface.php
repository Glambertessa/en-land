<?php
namespace core\interfaces;

interface RequestInterface{
    public function isValid();
    public function getErrors();
}