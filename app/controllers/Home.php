<?php

class Home extends Controller {

    public function index() {

        $db = new Database();                // create DB object
        $db->query("SELECT NOW() as time");  // simple query
        $result = $db->single();             // fetch single row

        $this->view('home', ['time' => $result->time]);
    }

}