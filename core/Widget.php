<?php


namespace core;


class Widget
{
    /**
     * @var View
     */
    public $view;

    public $viewPath = '/widgets/views/';
    private $defaultViewPath = '/widgets/views/';

    public function __construct($data = [])
    {
        $this->view = View::get();

        $this->view->setViewPath(WORKSPACE_DIR . $this->viewPath);

        if (!empty($data)) {
            foreach ($data as $key => $item) {
                $this->{$key} = $item;
                $this->data[$key] = $item;
            }
        }
    }

    public function run()
    {
    }

    public static function widget($data = [])
    {
        $class = get_called_class();
        return new $class($data);
    }

}