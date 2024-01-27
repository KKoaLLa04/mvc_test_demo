<?php

class Controller
{
    public function getModel($model)
    {
        if (file_exists('app/models/' . $model . '.php')) {
            require_once 'app/models/' . $model . '.php';

            $modelObject = new $model();
            return $modelObject;
        } else {
            echo 'Không có model ' . $model;
            exit();
        }
    }

    public function render($name, $data = [])
    {
        extract($data);
        if (file_exists('app/views/' . $name . '.php')) {
            require_once 'app/views/' . $name . '.php';
            return true;
        }

        return false;
    }
}