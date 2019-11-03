<?php

class Main_model extends Model
{
    function __construct()
    {
        parent::__construct();
    }

    public function  get_count_task(){
        $sql = "SELECT * FROM `tasks`";
        $query = $this->db->query($sql);
        return $query->rowCount();
    }

    public function  task_model($offset, $limit, $sort){
        $sort_string = isset($sort)? " ORDER BY ". $sort[0] ." " . mb_strtoupper($sort[1]): "";
        $limit_string = " LIMIT ". $offset .", " . $limit . " ";

        $sql = "SELECT * FROM `tasks`" . $sort_string . $limit_string;

        return $query = $this->db->query($sql)->fetchAll();
    }

    public function  set_task($name, $email, $text){
        $sql = "INSERT INTO `tasks` (`name`,`email`,`text`) VALUES (?,?,?);";
        $query = $this->db->prepare($sql);
        return $query->execute([$name,$email,$text]);
    }
}