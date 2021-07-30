<?php
session_start();
//COMPTEURS

require dirname(dirname(__DIR__)) . "/layourt/header2.php";



//CLASSE POUR IMPORTE LA  BDD
require dirname(dirname(__DIR__)) . "/App/DataBase/Database.php";
use App\Database\Database;
$pdo = new Database("Alibia");
$users = (int)$pdo->getPdo()->query("SELECT COUNT(id) FROM users")->fetch(PDO::FETCH_NUM)[0];

?>
<?php if(isset($_SESSION['name'])):?>


<div class="container">
<div class="row"  style="width: 100%;">
<div class="col-md-6 bg-dark" style="width: 100%;">
  <div class="box-stat" style="height: 70vh;width: 100%;">

      <div class="stat-visit stat" style="width: 100%;">
           <h6>nombre total d'utilisateurs</h6>
           <div class="stat-num">
               <?=$pdo->numberFormat($users)?>
           </div>
      </div>
  </div>
</div>

<div class="col-md-6 bg-dark" style="width: 100%;">
  <div class="box-stat" style="height: 70vh;width: 100%;">

      <div class="stat-visit stat" style="width: 100%;">
           <h6>nombre total d'utilisateurs</h6>
           <div class="stat-num">
               <?=$pdo->numberFormat($users)?>
           </div>
      </div>
  </div>
</div>


</div>
</div>





<?php require dirname(dirname(__DIR__)) . "/layourt/footer.php";?>
<?php  else:?>
  <?php 
     header('location:/Fr/Accueil/');
   ?>
<?php endif?>