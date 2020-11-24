<?php


namespace core;

class View
{
    public $title = 'No title';
    public $meta = [];
    public $js = [];
    public $css = [];
    public $tpl;
    public static $instance;

    public function __construct()
    {
        self::$instance = $this;
        $this->tpl = new \Smarty();

        $this->tpl->template_dir = WORKSPACE_DIR . '/views/';
        $this->tpl->compile_dir = WORKSPACE_DIR . '/views_c/';
        $this->tpl->config_dir = ROOT_DIR . '/config';
        $this->tpl->cache_dir = ROOT_DIR . '/cache';

        $this->tpl->assign('res_dir', RESOURCES_DIR);
        $this->tpl->assign('workspace_dir', WORKSPACE_DIR);
        $this->tpl->assign('title', $this->title);
    }

    public static function get() {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function getTpl($tpl, $data = [])
    {
        foreach ((array)$data as $key => $datum) {
            $this->tpl->assign($key, $datum);
        }

        return $this->tpl->fetch($tpl);
    }

    public function setTitle($title)
    {
        $this->title = $title;
    }

    public function addMeta($name, $content, $params = [], $options = ['attribute_name' => 'name'])
    {
        $this->meta[] = [$options['attribute_name'] => $name, 'content' => $content, 'params' => $params];
    }

    public function getMetaHtml()
    {
        $metaHtml = '';
        foreach ($this->meta as $item) {
            $params = $this->generateAdditionalParams($item['params']);
            if(isset($item['property']))
                $metaHtml .= "<meta property='" . $item['property'];
            else
                $metaHtml .= "<meta name='" . $item['name'];
            $metaHtml .= "' content='" . $item['content'] . "' " . $params . " >" . "\n";
        }
        return $metaHtml;
    }

    public function registerJs($js, $params = [], $endOfBody = false)
    {
        $this->js[] = ['src' => $js, 'params' => $params, 'endOfBody' => $endOfBody];
    }

    public function registerCss($css, $params = [])
    {
        $this->css[] = ['href' => $css, 'params' => $params];
    }

    public function getCssHtml()
    {
        $cssHtml = '';
        foreach ((array)$this->css as $css){
            $params = $this->generateAdditionalParams($css['params']);
            $cssHtml .= "<link href='" . $css['href'] . "' rel='stylesheet' ". $params .">";
        }
        return $cssHtml;
    }

    public function getJsHtml($endOfBody = false)
    {
        $jsHtml = '';
        foreach ((array)$this->js as $j) {
            $params = $this->generateAdditionalParams($j['params']);
            if ($j['endOfBody'] === $endOfBody) {
                $jsHtml .= "<script src='" . $j['src'] . "' " . $params . " ></script>" . "\n";
            }
        }

        return $jsHtml;
    }

    public function setViewPath($dir)
    {
        $this->tpl->template_dir = $dir;
    }

    private function generateAdditionalParams($data)
    {
        $params = '';
        foreach ((array)$data as $key => $datum) {
            $params .= $key . '="' . $datum . '" ';
        }

        return $params;
    }
}