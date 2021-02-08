<?php


namespace workspace\modules\course\requests;


use core\RequestSearch;

/**
 * Class SettingsSearchRequest
 * @package workspace\modules\settings\requests
 *
 * @property string $title
 * @property string $price
 * @property string $options
 * @property string $place_left
 */

class CourseSearchRequest extends RequestSearch
{
    public $title;
    public $price;
    public $options;
    public $place_left;

    public function rules()
    {
        return [];
    }
}