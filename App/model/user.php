<?php
namespace App\Model;

class  User{
    private $id;
    private $name;
    private $lastname;
    private $number;
    private $mail;
    private $ville;
    private $sex;
    private $date;

    public function getuser_id():int{
        return (int)$this->id;
    }

      public function getuser_name():string{
        return $this->name;
    }

    public function getuser_lastname():string{
        return $this->lastname;
    }
        public function getuser_number():int{
        return (int)$this->number;
    }
            public function getuser_mail():string{
            return $this->mail;
    }
         public function getuser_ville():string{
        return $this->ville;
    }

     public function getuser_sex():string{
        return $this->sex;
    }
         public function date():string{
        return $this->date;
    }


    
    

}