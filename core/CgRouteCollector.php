<?php


namespace core;


use Phroute\Phroute\Route;
use Phroute\Phroute\RouteCollector;

class CgRouteCollector extends RouteCollector
{
    public function crud($route, $handler, array $filters = [])
    {
        $this->addRoute(Route::GET, $route, array_merge($handler, ['actionIndex']), $filters);
        $this->addRoute(Route::GET, $route . '/{id}', array_merge($handler, ['actionView']), $filters);
        $this->addRoute(Route::POST, $route, array_merge($handler, ['actionStore']), $filters);
        $this->addRoute(Route::DELETE, $route, array_merge($handler, ['actionDelete']), $filters);
        return $this->addRoute(Route::ANY, $route . '/update/{id}', array_merge($handler, ['actionEdit']), $filters);
    }

    public function gridView($route, $handler, array $filters = [])
    {
        $this->addRoute(Route::GET, $route, array_merge($handler, ['actionIndex']), $filters);
        $this->addRoute(Route::GET, $route . '/{id}', array_merge($handler, ['actionView']), $filters);
        $this->addRoute(Route::ANY, $route . '/create', array_merge($handler, ['actionStore']), $filters);
        $this->addRoute(Route::POST, $route . '/delete', array_merge($handler, ['actionDelete']), $filters);
        return $this->addRoute(Route::ANY, $route . '/update/{id}', array_merge($handler, ['actionEdit']), $filters);
    }

    public function authorization($route, $handler, array $filters = [])
    {

    }

    public function exclude($action)
    {
    }

    public function console($route, $handler, array $filters = [])
    {
        $this->addRoute(Route::GET, $route, $handler, $filters);
    }

    public function cors($route, $handler, array $action, array $filters = [], $headersParams = [])
    {
        App::$header->add('Access-Control-Allow-Origin',
            (isset($headersParams['options'])) ? $headersParams['options'] : '*');
        App::$header->add('Access-Control-Allow-Methods',
            (isset($headersParams['methods'])) ? $headersParams['methods'] : 'GET, POST, PATCH, PUT, DELETE, OPTIONS');
        App::$header->add('Access-Control-Allow-Headers',
            (isset($headersParams['headers'])) ? $headersParams['headers'] :
                'Content-Type, Authorization, Access-Control-Allow-Methods, Access-Control-Request-Headers');

        return $this->addRoute(Route::ANY, $route, array_merge($handler, $action), $filters);
    }
}