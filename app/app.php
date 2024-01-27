<?php

class App
{
    public function __construct()
    {
        $url = $this->getUrl();
        // echo $url;
        $urlArr = explode('/', $url);

        // handle controller
        if (!empty($urlArr[0])) {
            $controller = ucfirst($urlArr[0]);
            unset($urlArr[0]);
        } else {
            $controller = 'Khong co';
        }

        // handle action
        if (!empty($urlArr[1])) {
            $action = $urlArr[1];
            unset($urlArr[1]);
        } else {
            $action = 'index';
        }

        // handle params
        $params = array_values($urlArr);

        if (file_exists('app/controllers/' . $controller . '.php')) {
            require_once 'app/controllers/' . $controller . '.php';

            $controller = new $controller();
        } else {
            $this->loadError();
        }

        if (method_exists($controller, $action)) {
            call_user_func_array([$controller, $action], $params);
        } else {
            $this->loadError();
        }
    }

    public function getUrl()
    {
        if (!empty($_SERVER['PATH_INFO'])) {
            $url = $_SERVER['PATH_INFO'];
        } else {
            $url = '/';
        }
        $url = trim($url, '/');

        return $url;
    }

    public function loadError($name = '404')
    {
        require_once 'app/errors/' . $name . '.php';
        exit();
    }
}