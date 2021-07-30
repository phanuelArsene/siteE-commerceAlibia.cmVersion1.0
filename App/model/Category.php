<?php
namespace App\Model;

class  Category{
    private $id;
    private $name;



     public function id():int{
        return $this->id;
    }
         public function name():string{
        return $this->name;
    }
    
    

}