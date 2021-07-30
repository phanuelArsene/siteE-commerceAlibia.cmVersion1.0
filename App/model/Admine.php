<?php
namespace App\Model;

class  Admine{

    private $id;
    private $user_admin;
    private $password_admin;


    public function getId():int{
        return $this->id;
    }

    public function getAdmine_name(){
        return $this->user_admin;
    }

    public function getAdmine_password(){
        return $this->password_admin;
    }

}



   
