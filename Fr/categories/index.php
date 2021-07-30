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


 $posts = $pdo->querys("SELECT * FROM products ORDER BY id DESC LIMIT 20",Product::class,"all");



if(!empty($_GET)){
  $categories = $_GET['category'];
  $_SESSION["category"] = $categories;
  header('location:/Fr/categories/Article.php');

}





?>


        <div class="container cat">
          
          
   

        <div class="sec2 extendse">
 
          <div class="" style="width: 100%; text-align: center;"> <h1 style="color: #868686;">Catégories </h1></div>
        <!-- section 2 -->         
            <a href="?category=laptop" class="reveal-1">
                <div class="box">
                    <div class="imgCAt">
                    </div>
                    <div class="tex">
                        <div class="textContents">
                        <div><i class="fa fa-laptop" aria-hidden="true" style="font-size: 30px;"></i></div>
                           pc windows  laptop
                        </div>
                    </div>
                </div>
            </a>
                


            <a href="?category=gamming" class="reveal-1">
                <div class="box">
                    <div class="imgCAt gamming">
                    </div>
                    <div class="tex">
                        <div class="textContents">
                          <div><i class="fa fa-gamepad" aria-hidden="true" style="font-size: 35px;"></i> </div>
                           pc gamming
                        </div>
                    </div>
                </div>
            </a>


            <a href="?category=macbook" class="reveal-1">
                <div class="box">
                    <div class="imgCAt macbook">
                    </div>
                    <div class="tex">
                        <div class="textContents">
                          <div>
                                <i class="fa fa-laptop" aria-hidden="true"style="font-size: 35px;"></i>
                                <i class="fa fa-desktop" aria-hidden="true"style="font-size: 35px;"></i>
                          </div>
                           macbook et imac 
                        </div>
                    </div>
                </div>
            </a>


            <a href="?category=android" class="reveal-1">
                <div class="box">
                    <div class="imgCAt android">
                    </div>
                    <div class="tex">
                        <div class="textContents">
                           <div> <i class="fa fa-android" aria-hidden="true" style="font-size: 35px;"></i></div>
                            mobile android 
                        </div>
                    </div>
                </div>
            </a>


             <a href="?category=iphone" class="reveal-1">
                <div class="box">
                    <div class="imgCAt iphone">
                    </div>
                    <div class="tex">
                       <div class="textContents">
                        <div>
                            <i class="fa fa-apple" aria-hidden="true" style="font-size: 35px;"></i>
                          </div>
                           mobile iphone 
                        </div>
                    </div>
                </div>
            </a>



            <a href="?category=accessoire" class="reveal-1">
                <div class="box">
                    <div class="imgCAt ACCESSOIRES">
                    </div>
                    <div class="tex">
                       <div class="textContents">
                            <div>
                                <i class="fa fa-laptop" aria-hidden="true"></i>
                                <i class="fa fa-desktop" aria-hidden="true"></i>
                                <i class="fa fa-android" aria-hidden="true"></i>
                                <i class="fa fa-apple" aria-hidden="true"></i>
                            </div>
                           ACCESSOIRES
                        </div>
                    </div>
                </div>
            </a>
                
    
      
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