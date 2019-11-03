<?php

class Admin_model extends Model {
    function __construct()
    {
        parent::__construct();
    }
    public function   get_tasks(){
        $sql = "SELECT * FROM `tasks`";
        return $this->db->query($sql)->fetchAll();
    }

    public function get_task($id){
        $sql = "SELECT * FROM tasks WHERE id =:id";
        $query = $this->db->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
        $query->execute(array(':id' => $id));
        $task = $query->fetch();
        return $task;
    }
    public function  success_task($id){
        $sql = "UPDATE `tasks` SET `status`=:status WHERE `id`=:id";
        $query = $this->db->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
        $query->execute(array(':id' => $id, ':status' => 1));

        if(!empty($query->errorCode())) {
            return true;
        }else{
            return false;
        }
    }

    public function  edit_task($id, $name, $email, $text, $is_edited = '1'){
        $sql = "UPDATE `tasks` SET `name`=:username,`email`=:email,`text`=:text,`is_edited`=:is_edited WHERE `id`=:id";
        $query = $this->db->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));

        $query->execute(
            array(
                ':username' => $name,
                ':id' => $id,
                ':email' => $email,
                ':text' => $text,
                ':is_edited' => $is_edited
            )
        );
        if(!empty($query->errorCode())) {
            return true;
        }else{
            return false;
        }
    }
}