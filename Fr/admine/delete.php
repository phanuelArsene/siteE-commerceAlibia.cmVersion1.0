<?php
//CLASSE POUR IMPORTE LA  BDD
require dirname(dirname(__DIR__)) . "/App/DataBase/Database.php";
use App\Database\Database;
$pdo = new Database("Alibia");

 if(isset($_GET['action'])){
    $id = $_GET['action'];
    $delete = $pdo->getPdo()->prepare("DELETE  FROM products  WHERE id = $id");
    $delete->execute();
    header('location:/Fr/admine/');
  }




