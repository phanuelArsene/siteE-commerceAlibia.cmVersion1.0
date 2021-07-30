<?php 
$titre = "Catégories";
//COMPTEURS


require dirname(dirname(__DIR__)) . "/layourt/header.php";


//CLASSE POUR IMPORTE LA  BDD
require dirname(dirname(__DIR__)) . "/App/DataBase/Database.php";
use App\Database\Database;
$pdo = new Database("Alibia");


//RECUPERATION DES ARTICLES
require dirname(dirname(__DIR__)) . "/App/model/Product.php";
use App\Model\Product;

$category = $_SESSION["category"];

 //Pagination

$count = (int)$pdo->getPdo()->query("SELECT COUNT(id) FROM products WHERE category = '$category'")->fetch(PDO::FETCH_NUM)[0];
$courantPage = (int)($_GET["page"] ?? 1)  ?: 1;

if($courantPage <= 0){
  header("location:/Fr/oops/oops/index.html");
}
$perPage = 8;
$pages = ceil($count / $perPage); 

if($courantPage > $pages){
  header("location:/Fr/oops/oops/index.html");
}
$ofset =  $perPage * ($courantPage - 1);

$posts = $pdo->querys("SELECT * FROM products WHERE category = '$category' ORDER BY id DESC LIMIT $perPage OFFSET $ofset",Product::class,"all");

$icone = null;

 if($_SESSION["category"] === "laptop"){
  $icone = "<i class='fa fa-laptop' aria-hidden='true' style='font-size: 30px;'></i>";
 }
 else if($_SESSION["category"] === "gamming"){
  $icone = "<i class='fa fa-gamepad' aria-hidden='true' style='font-size: 30px;'></i>";
 }
 else if($_SESSION["category"] === "macbook"){
  $icone = "<i class='fa fa-laptop' aria-hidden='true' style='font-size: 30px;'></i> ";
 }
 else if($_SESSION["category"] === "android"){
  $icone = "<i class='fa fa-android' aria-hidden='true' style='font-size: 30px;'></i>";
 }
 else if($_SESSION["category"] === "iphone"){
  $icone = "<i class='fa fa-apple' aria-hidden='true' style='font-size: 30px;'></i>";
 }
 else if($_SESSION["category"] === "accessoire"){
  $icone ="
  <span class='acc'>
       <i class='fa fa-laptop' aria-hidden='true'></i>
       <i class='fa fa-desktop' aria-hidden='true'> 
       </i><i class='fa fa-android' aria-hidden='true'></i>
       <i class='fa fa-apple' aria-hidden='true'></i>
  </span>" ;
 }
?>


<div class="container">

  <div class="row rows">
      <div class="col-12">Catégorie | <?=$category ." ". $icone ?></div>
  </div>
  <div class="big">

<div class="container_ali">
    <div class="rowse">      
         <?php foreach($posts as $post):?>
              <div class="contaner reveal-1">
                  <div class="im"><img src="/Fr/produitsImg/<?=$post->image_p()?>" alt=""></div>
                      <div class="txt">
                      <h3><?=$post->title()?></h3>
                      <div class="pric">
                          <div class="p1" style="margin-left: 1px;"><?=$pdo->numberFormat($post->true_price())?> FCFA</div>
                          <div class="p2"><?=$pdo->numberFormat($post->fals_price())?> FCFA</div>
                      </div>
                      </div>
                      <div class="add">
                          <a href="../produit/?slug=<?=$post->slug();?>&amp;id=<?=$post->id()?>">acheter</a>
                      </div>
                  
                      <p id="deliver"><?=$post->deliver()?></p>
              </div>

         <?php endforeach;?>
    </div>

</div>
</div>


<div class="d-flex justify-content-between my-4">
 <?php if($courantPage > 1):?>
        <a class="btn btn-warning" href="/Fr/categories/Article.php?page=<?=$courantPage - 1?>">&laquo; page précédent</a>
    <?php endif;?>
    <?php if($courantPage < $pages):?>
        <a class="btn btn-warning ml-auto" href="/Fr/categories/Article.php?page=<?= $courantPage + 1?>">page suivante &raquo;</a>
    <?php endif;?>
</div>

</div>










<div class="container-fluid">
  <div class="row d-flex justify-content-center">
    <div class="col-12 col" style="text-align: center;">
      <h1>Nos Partenaires !</h1>
    </div>
      <div class="col-12 part">
          <div class="G reveal-1">
              <div class="img">
                 <img  class="gen" src="/WebRoute/img/logo/General-store.png" alt="" width="100%">
              </div>
              <div class="txt"><a target="_blank" href="https://www.facebook.com/general.store.cameroun/">À Propos De La Société</a></div>
          </div>

          <div class="G reveal-1">
            <div class="img">
               <img class="air" src="/WebRoute/img/logo/air.png" alt="" width="10%">
            </div>
            <div class="txt">  <a href="https://www.facebook.com/airplacebypepenoel/" target="_blank">À Propos De La Société</a></div>
        </div>

        <div class="G reveal-1">
          <div class="img">
             <img  class="vpro" src="/WebRoute/img/logo/vpro.png" alt="" width="100%">
          </div>
          <div class="txt"> <a href="https://www.facebook.com/vproomarket" target="_blank" rel="noopener noreferrer">À Propos De La Société</a></div>
      </div>
      </div>
  </div>
</div>


</div>








<?php require dirname(dirname(__DIR__)) . "/layourt/footer.php";?>