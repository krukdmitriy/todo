<?php

class Login extends Controller{
    function __construct()
    {
       parent::__construct();
    }

    public function index()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (empty($_POST["username"])) {
                $data['error_massages'][] = "Поле с именем обьязательно к заполнению";
            }

            if (empty($_POST["password"])) {
                $data['error_massages'][] = "Поле с паролем обьязательно к заполнению";
            }

            if(empty($data['error_massages'][0])) {
                $is_login = $this->model->login($_POST['username'], $_POST['password']);
                if ($is_login == true) {
                    header('Location: ' .'/admin');
                    exit();
                }
                else{
                    $data['error_massages'][] = "Не правельный логин или пароль";
                }
            }
        }
        $this->view->render('login/index', $data);
    }

    public function logout(){
        $this->model->logout();
            header('Location: ' . '/');
            die();
    }

}