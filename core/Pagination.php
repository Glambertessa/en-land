<?php


namespace core;

/*
    $options = [
        'pagination' => [
            'per_page' => 10,
            'class' => '...',
            'class-active' => '...',
            'class-control' => '...',
        ]
    ];

    App::$collector->get('article/{page:i}?', [workspace\controllers\ArticleController::class, 'actionIndex']);

    public function actionIndex($page = 1) { ... }

    {core\Pagination::widget()->setParams('article/', count($data), $options['pagination'], $page)->run()}
 */

class Pagination extends Widget
{
    private $amount_of_data;
    private $amount_of_buttons;
    private $per_page;
    private $page;
    private $buttons;
    private $options;
    private $url;

    public function setParams($url, $amount_of_data, $options, $current_page = null)
    {
        $this->amount_of_data = $amount_of_data;
        $this->options = $options;
        $this->url = $url;
        $this->per_page = (isset($this->options['per_page']) && $this->options['per_page']) ?
            $this->options['per_page'] : 20;
        $this->setPage($current_page);

        $this->amount_of_buttons = ceil($this->amount_of_data / $this->per_page);
        $this->generateButtons($current_page);

        return $this;
    }

    public function run()
    {
        return $this->getButtons();
    }

    public function getAmountOfData()
    {
        return $this->amount_of_data;
    }

    public function getPerPage()
    {
        return $this->per_page;
    }

    public function getPage()
    {
        return $this->page;
    }

    public function setPage($current_page = null)
    {
        if($current_page) $this->page = $current_page;
        elseif(isset($_GET['page']) && $_GET['page'])
            $this->page = $_GET['page'];
        else $this->page = 1;
    }

    public function generateButtons($current_page = null)
    {
        $start = '<<';
        $prev = '<';
        $next = '>';
        $end = '>>';
        $class_control = ((isset($this->options['class-control']) && $this->options['class-control']) ?
            $this->options['class-control'] : 'btn btn-outline-dark');

        $this->buttons = '';

        if($this->page == 0)
            $this->page = 1;

        if($this->page > $this->amount_of_buttons)
            $this->page = $this->amount_of_buttons;

        if($this->page - 1 > 0)
            if($current_page)
                $this->buttons .= '<div><a href="' . $this->url . 1 . '" class="' . $class_control .'" title="start">'
                    . $start . '</a> <a href="' . $this->url . ($this->page - 1) .'" class="' . $class_control
                    . '" title="previous">' . $prev . '</a> ';
            else
                $this->buttons .= '<div><a href="' . $this->url . '?page=' . 1 . '" class="' . $class_control
                    . '" title="start">' . $start . '</a> <a href="' . $this->url . '?page=' . ($this->page - 1)
                    . '" class="' . $class_control .'" title="previous">' . $prev . '</a> ';

        for($i = 1; $i <= $this->amount_of_buttons; $i++) {
            if($i == $this->page)
                if($current_page)
                    $this->buttons .= '<a href="' . $this->url . $i . '" class="'
                        . ((isset($this->options['class-active']) && $this->options['class-active']) ?
                            $this->options['class-active'] : 'btn btn-secondary') . '">'.$i.'</a> ';
                else
                    $this->buttons .= '<a href="' . $this->url . '?page=' . $i . '" class="'
                        . ((isset($this->options['class-active']) && $this->options['class-active']) ?
                            $this->options['class-active'] : 'btn btn-secondary') . '">'.$i.'</a> ';
            else
                if($current_page)
                    $this->buttons .= '<a href="' . $this->url . $i . '" class="'
                        . ((isset($this->options['class']) && $this->options['class']) ?
                            $this->options['class'] : 'btn btn-dark') . '">'.$i.'</a> ';
                else
                    $this->buttons .= '<a href="' . $this->url . '?page=' . $i . '" class="'
                        . ((isset($this->options['class']) && $this->options['class']) ?
                            $this->options['class'] : 'btn btn-dark') . '">'.$i.'</a> ';
        }

        if($this->page + 1 <= $this->amount_of_buttons)
            if($current_page)
                $this->buttons .= '<a href="' . $this->url . ($this->page + 1) . '" class="' . $class_control
                    . '" title="next">' . $next . '</a> <a href="' . $this->url . $this->amount_of_buttons
                    . '" class="' . $class_control . '" title="end">' . $end . '</a></div>';
            else
                $this->buttons .= '<a href="' .  $this->url . '?page=' . ($this->page + 1) . '" class="'
                    . $class_control .'" title="next">' . $next . '</a> <a href="' . $this->url . '?page='
                    . $this->amount_of_buttons .'" class="' . $class_control . '" title="end">' . $end . '</a></div>';
    }

    public function getButtons()
    {
        if($this->amount_of_buttons > 1)
            return $this->buttons;
    }
}