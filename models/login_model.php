<?php

class Login_model extends Model
{
    function __construct()
    {
        parent::__construct();
    }
    public function login($username, $password){
        $sql = "SELECT * FROM users WHERE username =:username";
        $query = $this->db->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
        $query->execute(array(':username' => $username));
        $user = $query->fetch();

        if($user['password'] == $password && !!$user){
            return $_SESSION['is_login'] = true;
        }
        else{
            return false;
        }

    }
    public function  logout(){
        unset($_SESSION['is_login']);
        return true;
    }
}