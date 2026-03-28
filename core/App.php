<?php

class App {

    protected $controller = 'Home';
    protected $method = 'index';
    protected $params = [];

    public function __construct() {

        $url = $this->parseUrl();

        if (isset($url[0]) && !empty($url[0])) {
            $controllerName = ucfirst($url[0]);

            if (file_exists(APPROOT . '/controllers/' . $controllerName . '.php')) {
                $this->controller = $controllerName;
                unset($url[0]);
            }
        }

        require_once APPROOT . '/controllers/' . $this->controller . '.php';
        $this->controller = new $this->controller;

        if (isset($url[1]) && !empty($url[1])) {
            $requestedMethod = $url[1];
            $camelMethod = lcfirst(str_replace(' ', '', ucwords(str_replace(['-', '_'], ' ', $requestedMethod))));

            if (method_exists($this->controller, $requestedMethod)) {
                $this->method = $requestedMethod;
                unset($url[1]);
            } elseif (method_exists($this->controller, $camelMethod)) {
                $this->method = $camelMethod;
                unset($url[1]);
            }
        }

        $this->params = $url ? array_values($url) : [];

        call_user_func_array([$this->controller, $this->method], $this->params);
    }

    public function parseUrl() {
        if (isset($_GET['url'])) {
            return explode('/', filter_var(rtrim($_GET['url'], '/'), FILTER_SANITIZE_URL));
        }

        return [];
    }
}