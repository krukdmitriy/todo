<?php

class Main extends Controller{
    function __construct()
    {
       parent::__construct();
    }
    public function index() {

        $data['page'] = $this->page = intval($_GET['page']?? 1);
        $this->limit = 5;
        $this->count = $this->model->get_count_task();
        $data['total_page'] = intval(ceil($this->count / $this->limit));

        $this->sort = !empty($data['sort']) ? explode(' ', $data['sort']) : ['id', 'desc'];
        $offset = ($data['page'] - 1) * $this->limit;

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (empty($_POST["name"])) {
                $data['error_massages'][] = "Поле с именем обьязательно к заполнению";
            } else {
                if (strlen($_POST["name"]) < 4) {
                    $data['error_massages'][] = "Поле с именем не может быть меньше 4 символов";
                }
            }

            if (empty($_POST["email"])) {
                $massages[] = "Поле с Емейлом обьязательно к заполнению";
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

            if(empty($data['error_massages'][0])){
                $this->model->set_task($_POST['name'], $_POST['email'], $_POST['text']);
                $data['success_massages'] = 'Задание успешно добавлено';
                $data['input'] = ['name'=>'','email'=> '', 'text'=>''];
            }
            else{
                $data['input'] = ['name'=>$_POST['name'],'email'=> $_POST['email'], 'text'=>$_POST['text']];
            }

        }

        $data['tasks'] = $this->model->task_model($offset, $this->limit, $this->sort);
        $this->view->render('main/index', $data);
    }
}