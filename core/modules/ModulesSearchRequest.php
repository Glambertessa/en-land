<?php


namespace core\modules;


use core\RequestSearch;

/**
 * Class ModulesSearchRequest
 * @package workspace\classes
 *
 * @var string $status
 * @var string $name
 * @var string $description
 * @var string $version
 */
class ModulesSearchRequest extends RequestSearch
{
    public $status;
    public $name;
    public $description;
    public $version;

    public function rules()
    {
        return [];
    }
}