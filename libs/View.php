<?php

class View {
    function render($name, $arg = false)
    {
        require_once 'views/header.php';
        require_once 'views/'. $name. '.php';
        require_once 'views/footer.php';
    }
}