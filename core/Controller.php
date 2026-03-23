<?php

class Controller {

    public function model($model) {
        $path = APPROOT . '/models/' . $model . '.php';

        if (file_exists($path)) {
            require_once $path;
            return new $model();
        } else {
            die("Model not found: " . $model);
        }
    }

    public function view($view, $data = []) {
        $path = APPROOT . '/views/' . $view . '.php';

        if (file_exists($path)) {
            extract($data);
            require_once $path;
        } else {
            die("View not found: " . $view . "<br>Expected: " . $path);
        }
    }
}