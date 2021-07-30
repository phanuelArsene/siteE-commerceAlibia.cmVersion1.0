<?php
namespace App\Database;
use \PDO;
use App\App;
class Database{
 private  $db_name;
 private  $db_user;
 private  $db_pass;
 private  $db_host;
 private  $pdo;
 

 //var function __construct construi la class avec des valeurs pardefaut

    public function __construct($db_name,$db_user='root',$db_pass='',$db_host='localhost')
    {
 //initialisation des identifiens de la base de donne

        $this->$db_name = $db_name;
        $this->$db_user = $db_user;
        $this->$db_pass = $db_pass;
        $this->$db_host = $db_host;
             
    }
 //Renvoie la conextion a la base de donner 

    public function getPdo(){
      if($this->pdo === null){
        $pdo = new PDO('mysql:dbname=Alibia;host=localhost','root','');
        $pdo->setAttribute(pdo::ATTR_ERRMODE,pdo::ERRMODE_EXCEPTION);
        $this->pdo = $pdo;

      }
           return $this->pdo;
    }


//RENVOI UNE REQUETE query preparer basic
public function query($statment,$value){
   $req = $this->getPdo()->prepare($statment);
   $req->execute($value);
   $user = $req->fetch();
   return $user;
}

//RENVOI UNE REQUETE query basic
public function querys($statment,$classe,$bool){
   if($bool == "one")
   {
      $req = $this->getPdo()->query($statment);
      $req->setFetchMode(PDO::FETCH_CLASS,$classe);
      $data = $req->fetch();
      return $data;
   }
   else if($bool == "all"){
      $req = $this->getPdo()->query($statment);
      $data = $req->fetchAll(PDO::FETCH_CLASS,$classe);
      return $data;
   }
}

public function prepare($statment,$atribut  = []){
   $req = $this->getPdo()->prepare($statment);
   $data = $req->execute($atribut);
   $req->setFetchMode(PDO::FETCH_OBJ);
   return $data;
}
public function numberFormat($number){
   return number_format($number,0 , ',', ' ');
}

public function verifyUrl($get,$getTarget,$getId){
   if(empty($get) || empty($getTarget)|| empty($getId) ||  $getId < 1 && !isset($get) || !isset($getTarget) || !isset($getId) ){
    header("location:../oops/oops/index.html" );
}
}

 
public static function getInt(string $string,int $num =  null){
   if(!isset($_GET[$string])){
        return (int)$num;
   }
   if(!filter_var($_GET[$string],FILTER_VALIDATE_INT)){
      header("location: ../oops/oops/index.html" );
   }
   return (int)$_GET[$string];

}


}