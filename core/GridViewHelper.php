<?php


namespace core;


class GridViewHelper
{
    public static function button($id, $action, $title, $icon, $data = '')
    {
        return '<a class="custom-link fixed-width ' . $action . '" 
                    title="' . $title . '" id="' . $id . '" href="#" ' . $data . '>
                    <i class="nav-icon fas fa-' . $icon . '"></i>
                 </a> ';
    }

    public static function select($model, $js_class_action, $data)
    {
        $res = '<select class="form-control ' . $js_class_action . '" ' . $data . '>';
        foreach ($model as $item)
            $res .= '<option>' . $item->version . '</option>';
        $res .= '</select>';

        return $res;
    }

    public static function div($content, $class = '', $id = '', $data = '')
    {
        return '<div' . (($class) ? ' class="' . $class . '"' : '')
            . (($id) ? ' id="' . $id . '"' : '')
            . (($data) ? ' ' . $data : '') . '>' . $content . '</div>';
    }
}