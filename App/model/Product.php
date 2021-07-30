<?php
namespace App\Model;

class  Product{
    private $id;
    private $image_p;
    private $image_2;
    private $image_3;
    private $slug;
    private $title;
    private $true_price;
    private $fals_price;
    private $content;
    private $garantie;
    private $frome;
    private $deliver;
    private $category;

    public function id():int{
        return (int)$this->id;
    }

      public function image_p():string{
        return $this->image_p;
    }

    public function image_2():string{
        return $this->image_2;
    }

        public function image_3():string{
        return $this->image_3;
    }


     public function slug():string{
        return $this->slug;
    }

    public function title():string{
            return htmlentities($this->title);
    }
         public function true_price():int{
           
// 1 234,56
        return $this->true_price;
    }

     public function fals_price():int{
        return $this->fals_price;
    }

         public function content():string{
        return nl2br(htmlentities($this->content));
    }
             public function garantie(){
        return htmlentities($this->garantie);
    }

    public function frome():string{
        return htmlentities($this->frome);
    }
     
         public function deliver():string{
        return htmlentities($this->deliver);
    }
         public function category():string{
        return htmlentities($this->category);
    }
    
    

}