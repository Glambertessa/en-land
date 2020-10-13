<?php


namespace core\helpers;


class Form
{

    /**
     * @param string $name
     * @param array $data
     * @param array $options
     * @return string
     */
    public static function select(string $name, array $data, array $options):string
    {
        $params = self::generateAdditionalParams($options['attr']);
        $form = '<select name="'.$name.'" '.$params.'>';
        foreach ($data as $key => $datum){
            $selected = (isset($options['selected']) && $key = $options['selected']) ? 'selected' : '';
            $disabled = (isset($options['disabled']) && $key = $options['disabled']) ? 'disabled' : '';
            $form .= "<option $selected $disabled value='$key'>$datum</option>";
        }
        $form .= "</select>";

        return $form;
    }

    /**
     * @param $data
     * @return string
     */
    private static function generateAdditionalParams($data)
    {
        $params = '';
        foreach ((array)$data as $key => $datum) {
            $params .= $key . '="' . $datum . '" ';
        }

        return $params;
    }

}