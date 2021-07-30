<?php 
$titre = "Promotion | article";



require dirname(dirname(__DIR__)) . "/layourt/header.php";

//COMPTEURS



//CLASSE POUR IMPORTE LA  BDD
require dirname(dirname(__DIR__)) . "/App/DataBase/Database.php";
use App\Database\Database;
$pdo = new Database("Alibia");


//RECUPERATION DES ARTICLES
require dirname(dirname(__DIR__)) . "/App/model/Product.php";
use App\Model\Product;

 $posts = $pdo->querys("SELECT * FROM products WHERE category = 'promotion' ORDER BY `id` DESC",Product::class,"all");

 $icone = null;




  if(empty($posts)){
     $message= "désolé pour le moment aucune entreprise ne dispose de produit en promotion 😥😥";
 }

?>



<div class="container">
        <div class="cat_service">
            <h3>PROMOTION DE LA SEMAINE </h3>
        </div>


        <div class="big">

  <div class="container_ali">
      <div class="rowse">
        <?php if(isset($message)):?>
            <div class="alert alert-danger" style="margin-bottom: 220px;text-transform: capitalize;" >
                <?=$message?>
            </div>
        <?php else:?>
             <?php foreach($posts as $post):?>
                <div class="contaner reveal-1">
                    <div class="im"><img src="/WebRoute/img/product/windows/acer1.jpg" alt=""></div>
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
                    
                        <p><?=$post->deliver()?></p>
                </div>
  
           <?php endforeach;?>
     <?php endif;?>
      </div>
  </div>
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
            <div class="txt"> <a href="https://www.facebook.com/airplacebypepenoel/" target="_blank">À Propos De La Société</a></div>
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



<?php require dirname(dirname(__DIR__)) . "/layourt/footer.php";?>
