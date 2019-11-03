<?php

session_start();
$url = $_GET['url'];
$url = explode('/', $url);

if(empty($url[0])) {

    require_once 'controllers/main.php';
    $controller = new Main();
    $controller->loadModel('main');
    $controller->index();
}
else{

    $path = 'controllers/' . $url[0] . '.php';
        if(file_exists($path)){
            require_once $path;
            $controller = new $url[0];
            $controller->loadModel($url[0]);
        }
        else{
            require_once 'controllers/main.php';
            $controller = new Main();
            $controller->loadModel('main');
        }

        if(!empty($url[2])){
            if(method_exists($controller, $url[1])){
                $controller->{$url[1]}($url[2]);
            }else{
                $controller->{$url[1]}();
                $controller->index();
            }
        }
        else{
            if(!empty($url[1])){
                if(method_exists($controller, $url[1])){
                    $controller->{$url[1]}();
                }else{
                    $controller->index();
                }
            }
            else{
                $controller->index();
            }
        }
}



