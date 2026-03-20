<?php

class Controller {

    public function model($model) {
        $path = '../app/models/' . $model . '.php';

        if(file_exists($path)) {
            require_once $path;
            return new $model();
        } else {
            die("Model not found: " . $model);
        }
    }

    public function view($view, $data = []) {
        $path = '../app/views/' . $view . '.php';

        if(file_exists($path)) {
            require_once $path;
        } else {
            die("View not found: " . $view);
        }
    }

}