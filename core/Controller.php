<?php


namespace core;


class Controller
{
    public $tpl;
    public $layout = 'main.tpl';
    public $layoutPath = null;
    public $viewPath = '/views/';
    private $defaultViewPath = '/views/';

    /**
     * @var View
     */
    public $view;

    public function __construct()
    {
        $this->view = View::get();

        $this->init();

        $this->view->setViewPath(WORKSPACE_DIR . $this->viewPath);
    }

    public function render($tpl, $data = [])
    {
        $this->view->tpl->assign('view', $this->view);

        $view = $this->view->getTpl($tpl, $data);
        $this->view->tpl->assign('title', $this->view->title);
        $this->view->tpl->assign('meta', $this->view->getMetaHtml());
        $this->view->tpl->assign('css', $this->view->getCssHtml());
        $this->view->tpl->assign('jsHead', $this->view->getJsHtml());
        $this->view->tpl->assign('jsEndBody', $this->view->getJsHtml(true));

        $layoutPath = WORKSPACE_DIR;
        if ($this->layoutPath) {
            $layoutPath .= $this->layoutPath;
        } elseif (isset(App::$config['layoutPath'])) {
            $layoutPath .= App::$config['layoutPath'];
        } else {
            $layoutPath = WORKSPACE_DIR . $this->defaultViewPath . 'layouts/';
        }

        $this->view->tpl->template_dir = $layoutPath;

        return $this->view->tpl->fetch($this->layout, ['content' => $view]);
    }

    public function redirect($url)
    {
        $uri = sprintf(
            "%s://%s",
            isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off' ? 'https' : 'http',
            $_SERVER['SERVER_NAME']
        );

        header('Location: ' . $uri . '/' . $url);
        die();
    }

    protected function setViewPath($dir)
    {
        $this->tpl->template_dir = WORKSPACE_DIR . $dir;
    }

    public function setLayout($name)
    {
        $this->layout = $name;
    }

    protected function init()
    {

    }

}