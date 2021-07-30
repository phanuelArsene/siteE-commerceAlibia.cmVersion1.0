<?php
session_start();
require dirname(dirname(__DIR__)) . "/layourt/header2.php";

//CLASSE POUR IMPORTE LE FORMULAIRE
require dirname(dirname(__DIR__)) . "/App/Form.php";
use App\Form;
$Form = new Form($_POST);

//CLASSE POUR IMPORTE LA  BDD
require dirname(dirname(__DIR__)) . "/App/DataBase/Database.php";
use App\Database\Database;
$pdo = new Database("Alibia");

//CLASS POUR IMPORTE LE VALIDATEUR DE SUGGESTON

require dirname(dirname(__DIR__)) . "/App/MESSAGE.php";
use App\Message;
?>
<?php if(isset($_SESSION['name'])):?>






<?php
$success = FALSE;
if(isset($_POST["username"],$_POST["sms"])){
    $message = new Message($_POST["username"],$_POST["sms"]);
   if($message->isValid()){
        $username = $_POST["username"];
        $sms= $_POST["sms"];
        $date = new DateTime();
        $insert =  $pdo->getPdo()->prepare("INSERT INTO  livre VALUES(null,'$username','$sms',NOW())");
        $insert->execute();

   }
   else{
       $errors = $message->getEroors();
   }
}
                 $req = $pdo->getPdo()->query("SELECT *  FROM  livre ORDER BY id DESC");
                 $posts = $req->fetchAll(PDO::FETCH_OBJ);
?>


<div class="container">
<div class="row" style="margin: 0;">
<div class="col-2"></div>
<div class="col-2"></div>
</div>
    <div class="row">
      <div class="col-2"></div>
                  <div class="col-md-8" style="margin-top: 60px;">
               <h3>Vos Suggestions </h3>

                 <div  class="container">
                     
             <?php foreach($posts as $post):?>
                 <p style="width: 100%;">
                   <strong><?=htmlentities($post->pseudo)?></strong>  <em> le <?=$post->date?></em> <br>
                  <em style="width: 600px;"> <?=nl2br(htmlentities($post->descrip))?></em> 
                 </p>
               <?php endforeach;?>
                 </div>
            </div>
      <div class="col-2"></div>


    </div>
</div>










<?php require dirname(dirname(__DIR__)) . "/layourt/footer.php";?>
<?php  else:?>
  <?php 
     header('location:/Fr/Accueil/');
   ?>
<?php endif?>