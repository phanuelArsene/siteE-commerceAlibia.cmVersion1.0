<?php 
$titre = "Accueil";
//COMPTEURS


require dirname(dirname(__DIR__)) . "/layourt/header.php";


//CLASSE POUR IMPORTE LA  BDD
require dirname(dirname(__DIR__)) . "/App/DataBase/Database.php";
use App\Database\Database;
$pdo = new Database("Alibia");


//RECUPERATION DES ARTICLES
require dirname(dirname(__DIR__)) . "/App/model/Product.php";
use App\Model\Product;







 $posts = $pdo->querys("SELECT * FROM products WHERE category = 'Accueil' ORDER BY id DESC LIMIT 20",Product::class,"all");




?>

<!-- /****************************
*                            *
*   debut du carousel         *  
*                            *
*****************************/ -->
 <div class="body-baner">
  <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>

    </ol>
    <div class="carousel-inner">
      <div class="carousel-item active" id="slid1">
      <div class="sous-slid reveal-1">
            <h2>La BOUTIQUE DIGITALE</h2>
            <p>À DOMICILE</p>
        </div>
      </div>
      <div class="carousel-item " id="slid2">
       <div class="sous-slid reveal-1">
            <h2>Des produits de qualités </h2>
        </div>
      </div>
      <div class="carousel-item" id="slid3">
       <div class="sous-slid reveal-1">
            <h2>DES SERVICES INFORMATIQUE</h2>
            <p>celons vos besoins</p>
        </div>
      </div>
      <div class="carousel-item" id="slid4">
       <div class="sous-slid reveal-1">

        </div>
      </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
 </div>



 <div class="container">


        
<!-- /****************************
*                            *
*   SECTION 1   *  
*                            *
*****************************/ -->
    <div class="sec1 extend">

       <div class="lows reveal-1">
         <img src="/WebRoute/img/icone/livraison.png" alt="">
         <a href="">livraison(S.A.V)</a>  
         <p >
          Une fois votre commande confirmée,  vous êtes livré  <br> 
          3 heurs de temps
           après. NB: expédition possible
           <br> dans tous les villes du <strong>Cameroun</strong> 
         </p>  
       </div>
       <div class="lows reveal-1">
          <img src="/WebRoute/img/icone/gps.png" alt="">
          <a href="">nous localisez</a> 
          <p>
              Nous sommes situés sur <br>
              Douala - Hotel Le Leader 2e etage à Bepanda Petit Marcher  <br>
              et Yaounde - Immeuble Renaprov 2e etage Nkoabang
           </p>      
       </div>
       <div class="lows reveal-1">
         <img src="/WebRoute/img/icone/service.png" alt="">
         <a href="">nos service</a>  
         <p>
             Nous proposons des produits et services 100% <br>
               digital et donnons la possibilité a nos utilisateurs de vendre<br> 
              leurs produits ou services(<a href="/Fr/compte/inscription.php"><strong>crée un compte</strong></a>)
         </p> 
       </div>
    </div><!-- fin section 1 -->



        <div class="sec2 extend">
        <!-- section 2 -->


            <a href="#newarival" class="reveal-1">
                <div class="box">
                    <img src="/WebRoute/img/baner/2.jpg" alt="">
                    <div class="tex">
                        <div class="textContent">
                           Nouvel Arrivage
                        </div>
                    </div>
                </div>
            </a>
                
            <a href="/Fr/promotion/" class="reveal-1">
                    <div class="box">
                    <img src="/WebRoute/img/baner/7.jpg" alt="">
                    <div class="tex">
                        <div class="textContent">
                            En Promotion
                        </div>
                    </div>
                </div>
            </a>
      
            <a href="/Fr/Service/"class="reveal-1">
                    <div class="box">
                    <img src="/WebRoute/img/baner/3.jpeg" alt="">
                    <div class="tex">
                        <div class="textContent">
                           nos services !
                        </div>
                    </div>
                </div>
            </a>
      

      
        <a target="_blank" href="https://api.whatsapp.com/send?phone=237696603305&fbclid=IwAR1CYeUlqFkw_z49HvaAjA8y6WaljjfOQZ8ISxY2ejQBz8W1oOnog6YDjdE"class="reveal-1">
        <div class="box">
            <img src="/WebRoute/img/baner/6.jpg" alt="">
            <div class="tex">
                <div class="textContent">
                   Nous Contactez
                </div>
            </div>
        </div>
        </a>
      
    </div>
</div>


<div class="big">

  <div class="container_ali">
      <div class="rowse">
        <div class="h1" id="newarival"><h1>nouvel  arivage</h1></div>
        
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
              <div class="txt"> <a target="_blank" href="https://www.facebook.com/general.store.cameroun/">À Propos De La Société</a></div>
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
          <div class="txt">
          <a href="https://www.facebook.com/vproomarket" target="_blank" rel="noopener noreferrer">À Propos De La Société</a>
        </div>
      </div>
      </div>
  </div>
</div>


</div>









<?php require dirname(dirname(__DIR__)) . "/layourt/footer.php";?>