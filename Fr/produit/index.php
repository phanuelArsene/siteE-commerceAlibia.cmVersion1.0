<?php
$titre = "produit";
//COMPTEURS

require dirname(dirname(__DIR__)) . "/layourt/header.php";


//CLASSE POUR IMPORTE LA  BDD
require dirname(dirname(__DIR__)) . "/App/DataBase/Database.php";
use App\Database\Database;
$pdo = new Database("Alibia");
$id = (int)$_GET["id"];
$slug = $_GET["slug"];

$pdo->verifyUrl($_GET,$slug,$id);

 

//RECUPERATION DES ARTICLES
require dirname(dirname(__DIR__)) . "/App/model/Product.php";
use App\Model\Product;

$url = $_SERVER['SCRIPT_FILENAME'] . $_SERVER["REQUEST_URI"] ;

$product = $pdo->querys("SELECT * FROM products where id = $id ",Product::class,"one");
// var_dump($product);

 $urlFusin = $slug."-".$id;
 $command = "Pouvez vous confirmer ma commande svp"."? Je suis intéressé par cet article ==> ". $urlFusin . " Description = " .$product->content();

?>


<div class="container">

<div class="row" style="margin-top: 10px;">
   <div class="col-md-6">
    <div class="col-md-12 df">
   <div id="carouselExampleIndicators" class="carousel showid1 slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner showid">
    <div class="carousel-item active">
      <img src="/Fr/produitsImg/<?=$product->image_p()?>" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="/Fr/produitsImg/<?=$product->image_2()?>" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="/Fr/produitsImg/<?=$product->image_3()?>" class="d-block w-100" alt="...">
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
   </div>
   <div class="col-md-6">
        <div class="prod-title-box">
          <h5 class="prod-title ">description et caractéristique du produit</h5>
          <hr>
          <div class="prod-descrip">
               <div class="title-bar  bg-warning w-100">
                      <div class="row" style="margin-top:10px;margin-bottom:10px; padding:10px 0px;padding-left:5px;">
                          <div class="col-md-6">
                             <?=$product->title()?>
                          </div>
                          <div class="col-md-6">
                              <?=$product->deliver()?>
                          </div>
                      </div>
               </div>
               <div>
                   <?=$product->content()?>
               </div>
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

<div class="recap-footer ">
    <div class="row reveal-1" >
           <div class="col-md-6 bg-dark" style="color: white; padding:10px">
                <div class="recap">
                  <h4 style="text-transform: capitalize;">récapitulatif</h4>
                   <div class="req">
                     <ul style="text-transform: capitalize;">
                       <li>✔ Nom: <?=$product->title()?></li>
                       <li>✔ Prix : <?=$pdo->numberFormat($product->true_price());?> FCFA au lieu de  <em class="p2rec"><?=$pdo->numberFormat($product->fals_price());?> FCFA</em> </li>
                       <li>✔ <?=$product->deliver()?> 😱</li>
                       <li>✔ provient de l'entreprise: <em class="g"><?=$product->garantie()?></em></li>
                       <li>✔   <?=$product->frome()?> avec facture😱</li>
                       <li>✔ disponible sur : douala ,yaounde</li>
                       <li>✔ Expédition Possible Dans Tous Les Villes Du Cameroun ✈</li>
                     </ul>
                   </div>
                </div>
           </div>
           <div class="col-md-6 b6 ">
                <h4>passer votre commande par :</h4>
                <div class="by-box">
                     <a href="Tel:696603305" target="_blank">
                          <div class="zap blue">
                              <div class="img">
                                <img src="/WebRoute/img/icone/call.png" alt="">
                              </div>
                              <div class="txt">
                                Appelle Téléphonique
                              </div>
                        </div>
                     </a>
                </div>


                <div class="by-box">
                <a href="sms://+237696603305&body=<?=htmlentities($command)?>" target="_blank">
                          <div class="zap green">
                              <div class="img">
                                <img src="/WebRoute/img/icone/sms.png" alt="">
                              </div>
                              <div class="txt">
                               nous envoyer un message
                              </div>
                        </div>
                     </a>
                </div>

                  <div class="by-box">
                     <a href="https://wa.me/237696603305?text=<?=htmlentities($command)?>" target="_blank">
                          <div class="zap green">
                              <div class="img">
                                <img src="/WebRoute/img/icone/zapp.png" alt="">
                              </div>
                              <div class="txt">
                               un sms whatsapp
                              </div>
                        </div>
                     </a>
                </div>

                           

                  <div class="by-box">
                     <a href="mailto:cmalibia@gmail.com" target="_blank">
                          <div class="zap green">
                              <div class="img">
                                <img src="/WebRoute/img/icone/mail.png" alt="">
                              </div>
                              <div class="txt">
                               nous envoyer un mail
                              </div>
                        </div>
                     </a>
                </div>
           </div>
    </div>
</div>

</div>


</div>









<?php require dirname(dirname(__DIR__)) . "/layourt/footer.php";?>