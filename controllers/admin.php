<?php

class Admin extends Controller{
    function __construct()
    {
       parent::__construct();

        if($_GET['url'] === 'admin/edit'){
            header('Location: '. '/admin');
        }
        if(empty($_SESSION['is_login'])){
            header('Location: '. '/');
        }
    }
    public function index() {
        $data =  $this->model->get_tasks();
        $this->view->render('admin/index', $data);
    }
    public function success($page) {
        $this->model->success_task($page);
        header('Location: '. '/admin');
    }

    public function edit($page) {

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (empty($_POST["name"])) {
                $data['error_massages'][] = "Поле с именем обьязательно к заполнению";
            } else {
                if (strlen($_POST["name"]) < 4) {
                    $data['error_massages'][] = "Поле с именем не может быть меньше 4 символов";
                }
            }

            if (empty($_POST["email"])) {
                $massages[] = "Поле с Емайлом обьязательно к заполнению";
            } else {
                $email = $_POST["email"];
                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $data['error_massages'][] = "email не валиден";
                }
            }

            if (empty($_POST["text"])) {
                $data['error_massages'][] = "Поле с описание задачи обьязательно к заполнению";
            } else {
                if (strlen($_POST["text"]) < 4) {
                    $data['error_massages'][] = "Поле с описанием задачи не может быть меньше 4 символов";
                }
            }

            if (empty($data['error_massages'][0])) {
                $data['input'] = ['name'=> $_POST['name'],'email'=> $_POST['email'], 'text'=> $_POST['text']];
                $task = $this->model->edit_task($page,  $data['input']['name'],  $data['input']['email'], $data['input']['text'], 1);
                $data['success_massages'] = 'Задание успешно редактировано';
                $data['input'] = ['name' => '', 'email' => '', 'text' => ''];
            } else {
                $data['input'] = $this->model->get_task($page);
            }
        }

        $data['input'] = $this->model->get_task($page);
        $data['page'] = $page;

        $this->view->render('admin/edit', $data);
    }
}