<?php

class Application {

    public static function process() {
        $controller = new \Controllers\Controller();

        $task = "index";

        if(!empty($_GET['task'])) {
            $task = $_GET['task'];
        }

        $controller->$task();
    }
}