<?php


namespace core;


class DetailView extends Widget
{
    protected $model;
    protected $options;

    public function run()
    {
        return self::getTable();
    }

    public function setParams($data = [], $options = [])
    {
        $this->model = $data;
        $this->options = $options;
        return $this;
    }

    public function getTable()
    {
        $table = '';
        $table .= self::setTableSettings($table, 'table', 'table_class', 'table table-striped');
        $table .= self::setTableSettings($table, 'thead', 'thead_class', 'thead-dark');
        $table .= '<tr><th scope="col">Ключ</th><th scope="col">Значение</th></tr></thead>';

        foreach ($this->options['fields'] as $key => $option)

            if(isset($this->model->$key))
                $table .= '<tr><td>'.$this->options['fields'][$key].'</td><td>'.$this->model->$key.'</td></tr>';
            elseif(isset($this->options['fields'][$key]['value']))
                $table .= '<tr><td>'.$this->options['fields'][$key]['label'].'</td><td>'.call_user_func($this->options['fields'][$key]['value'], $this->model).'</td></tr>';
            else
                $table .= '<tr><td></td><td></td></tr>';

        $table .= '</table>';

        return $table;
    }

    public function setTableSettings($table, $tag, $class, $default_class)
    {
        $table .= '<'.$tag.' class="'. ((isset($this->options[$class])) ? $this->options[$class] : $default_class) . '">';

        return $table;
    }
}