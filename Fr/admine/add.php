<?php
session_start();
require dirname(dirname(__DIR__)) . "/layourt/header2.php";
//CLASSE POUR IMPORTE LA  BDD
require dirname(dirname(__DIR__)) . "/App/DataBase/Database.php";
use App\Database\Database;
$pdo = new Database("Alibia");

require dirname(dirname(__DIR__)) . "/App/model/Category.php";
use App\Model\Category;
$categories = $pdo->getPdo()->query('SELECT * FROM category')->fetchAll(PDO::FETCH_CLASS,Category::class);


require dirname(dirname(__DIR__)) ."/vendor/autoload.php";



$Errors = null;
$win = null;
$v = new Valitron\Validator($_POST);

$v->rule('required', ['title','slug','description','priceF','priceT','deliver','frome','garantie','category']);
if($v->validate() || !empty($_FILE)){

  if(!empty($_FILES["image1"]["name"])){
  $igmPath1 =$_FILES["image1"]["tmp_name"];
  $image1 = $_FILES["image1"]["name"];
  }
  if(!empty($_FILES["image2"]["name"])){
  $igmPath2 =$_FILES["image2"]["tmp_name"];
  $image2 = $_FILES["image2"]["name"];
   }
if(!empty($_FILES["image3"]["name"])){
  $image3 = $_FILES["image3"]["name"];
  $igmPath3 =$_FILES["image3"]["tmp_name"];
  }

  if(!empty($_FILES)){
    if(is_uploaded_file($igmPath1) && is_uploaded_file($igmPath2) && is_uploaded_file($igmPath3)){
        $type1 = mime_content_type($igmPath1);
        $type2 = mime_content_type($igmPath2);
        $type3 = mime_content_type($igmPath3);
        if($type1 && $type2 && $type3){
            if($type1 === "image/jpeg" || $type1 === "image/png" && $type2 === "image/jpeg" || $type2 === "image/png" && $type3 === "image/jpeg" || $type3 === "image/png"){
              $limiSize = 1000000.000000;
                $size1 = filesize($igmPath1);
                $size2 = filesize($igmPath2);
                $size3 = filesize($igmPath3);

                if($size1 > $limiSize && $size2 > $limiSize && $size3 > $limiSize ){

                    $sms4 = "taille de ficier beacoup trop grans 90000 octe vous est recommender";
                }
                else{
 
                     $finalPathNmae1 = "../produitsImg/". $image1;
                     $finalPathNmae2 = "../produitsImg/". $image2;
                     $finalPathNmae3 = "../produitsImg/". $image3;
                      $final1 = move_uploaded_file($igmPath1,$finalPathNmae1);
                      $final2 = move_uploaded_file($igmPath2,$finalPathNmae2);
                      $final3 = move_uploaded_file($igmPath3,$finalPathNmae3);

                }

            }
            else{
                $sms3 = "le fichier doit etre de type jpeg ou png"; 
            }
        }

    }
    else{
        $sms2 = " il y a eu un probleme lord du telechargement du fichier";
    }

}else
{
    $sms = "aucun fichier a telecharger";
}
   
    $title =  $_POST['title'];
    $slug =  $_POST['slug'];
    $true_price = $_POST['priceT'];
    $fals_price = $_POST['priceF'];
    $content = $_POST['description'];
    $frome = $_POST['frome'];
    $deliver = $_POST['deliver'];
    $garantie = $_POST['garantie'];
    $category = $_POST['category'];
   if($title&&$slug&&$true_price&&$fals_price&&$content&&$garantie&&$frome&&$deliver&&$category){

      $update = $pdo->getPdo()->prepare("INSERT INTO  products VALUES(null,'$image1','$image2','$image3','$slug','$title','$true_price','$fals_price','$content','$frome','$garantie','$deliver','$category')");
      $update->execute();
      $win = "Yay! We're all good!";

      

  }
  
  } else {
    // Errors
    $Errors = "Tout les champs doivent etre rempli";
}

?>
<?php if(isset($_SESSION['name'])):?>


<div class="container">
   <div class="w-100 d-flex justify-content-center align-center ">
   <div class="col-md-6" style="margin: 15px;">


   <?php if(!empty($Errors)):?>
        <div class="alert alert-danger">
          <?=$Errors?>
        </div>
        <?php endif;?>
        <?php if(!empty($win)):?>
        <div class="alert alert-success">
          <?=$win?>
        </div>
     <?php endif;?>
     <div class="container">
          <?php if(isset($message)):?>
            <?=$message?>
          <?php endif;?>
          <?php if(isset($sms4 )):?>
            <?=$sms4?>
          <?php endif;?>
          <?php if(isset($sms3 )):?>
            <?=$sms3?>
          <?php endif;?>
      </div>
      <?php if(isset($sms2 )):?>
            <?=$sms2?>
          <?php endif;?>
          <?php if(isset($sms )):?>
            <?=$sms?>
          <?php endif;?>

   <form action="" method="POST" enctype="multipart/form-data">
          <div class="form-group">
            <label for="img">image a la une </label>
             <input  id="img" type="file" name="image1" class="form-control">
          </div>

          <div class="form-group">
            <label for="img">autre image </label>
             <input  id="img" type="file" name="image2" class="form-control">
          </div>
          <div class="form-group">
            <label for="img">autre image </label>
             <input  id="img" type="file" name="image3" class="form-control">
          </div>
          <div class="form-group">
            <label for="title">Nom du nouveaux produit</label>
            <input type="text" name="title" id="title" placeholder="Entre le titre du produit" class="form-control">
          </div>

            <div class="form-group">
               <label for="slug"> Slug </label>
               <input  id="slug" class="form-control" type="text" name="slug" placeholder="Entre le titre url">
             </div>



             <div class="form-group">
               <label for="price">prix du produit barre </label>
               <input  id="price" class="form-control" type="number" name="priceF" placeholder="Entre le prix du produit">
             </div>

             <div class="form-group">
               <label for="price">prix du produit finale </label>
               <input  id="price" class="form-control" type="number" name="priceT" placeholder="Entre le prix du produit final"></input>
             </div>

             <div class="form-group">
               <label for="delive">frais livraisons</label>
               <input  id="delive" class="form-control" type="text" name="deliver"></input>
             </div>

             <div class="form-group">
               <label for="frome">provient de l'entreprise</label>
               <input  id="frome" class="form-control" type="text" name="frome"></input>
             </div>

              <div class="form-group">
               <label for="garantie">durée de garantie</label>
               <input id="garantie" class="form-control" type="text" name="garantie"></input>
             </div>

             <div class="form-group">
                <select name="category" class="form-control">
                <?php foreach($categories as $category):?>
                  <option value="<?=$category->name()?>"><?=$category->name()?></option>
                <?php endforeach;?> 
                 </select>
           </div>
           
             <div class="form-group">
               <label for="description">description</label>
               <textarea  id="description" class="form-control" type="text" name="description" placeholder="Entre la description du produit"></textarea>
             </div>
           <button class="btn btn-primary w-100">Ajouter</button>
    </form>
   </div>
   </div>
</div>
































    

<?php require dirname(dirname(__DIR__)) . "/layourt/footer.php";?>






<?php  else:?>
  <?php 
     header('location:/views/home');
   ?>
<?php endif?>

