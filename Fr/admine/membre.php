<?php
session_start();
require dirname(dirname(__DIR__)) . "/layourt/header2.php";
//CLASSE POUR IMPORTE LA  BDD
require dirname(dirname(__DIR__)) . "/App/DataBase/Database.php";
use App\Database\Database;
//CLASSE POUR IMPORTE LA  BDD
require dirname(dirname(__DIR__)) . "/App/model/user.php";
use App\Model\User;


$pdo = new Database("Alibia");
$posts = $pdo->querys("SELECT * FROM users ORDER BY  id  DESC  ",User::class,"all");
?>
<?php if(isset($_SESSION['name'])):?>









<div class="container">
<div class="row">
               <div class="col-12 sec-stat1" style="text-align: center;">
                   <i style="font-size: 70px;" class="fa fa-users" aria-hidden="true"></i>
                   <h2>Atilisateurs Alibia.cm</h2>
               </div>
           </div>
    <div class="box-content">
        <?php foreach($posts as $post):?>
                <div class="boxs">
                    <div class="img"><i class="fa fa-user" aria-hidden="true"></i></div>
                    <div class="infose">
                        <h5>informations</h5>
                        <hr>
                        <div class="ifos">
                            <div>Nom et Prénom:<?=$post->getuser_name()?></div>
                            <div>Numéro de téléphone :<?=$post->getuser_number()?></div>
                            <div>Address Mail :<address><?=$post->getuser_mail()?></address></div>
                            <div>Membre Depuis Le : <address><?=$post->date()?></address></div>
                        </div>
                    </div>
                    <div class="contact">
                        <div><a href="Tel:<?=$post->getuser_number()?>"><i class="fa fa-phone" aria-hidden="true"></i></a></div>
                       <div> <a href="mailto:<?=$post->getuser_mail()?>"><i class="fa fa-envelope" aria-hidden="true"></i></a></div>
                    </div>
                </div>
        <?php endforeach;?>
    </div>
</div>






<?php require dirname(dirname(__DIR__)) . "/layourt/footer.php";?>
<?php  else:?>
  <?php 
     header('location:/Fr/Accueil/');
   ?>
<?php endif?>