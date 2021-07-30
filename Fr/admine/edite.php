<?php
session_start();
require dirname(dirname(__DIR__)) . "/layourt/header2.php";
//CLASSE POUR IMPORTE LA  BDD
require dirname(dirname(__DIR__)) . "/App/DataBase/Database.php";
use App\Database\Database;
$pdo = new Database("Alibia");
//CLASSE POUR IMPORTE LE FORMULAIRE
require dirname(dirname(__DIR__)) . "/App/Form.php";
use App\Form;
$Form = new Form($_POST);

require dirname(dirname(__DIR__)) . "/App/model/Category.php";
use App\Model\Category;

//RECUPERATION DES ARTICLES
require dirname(dirname(__DIR__)) . "/App/model/Product.php";
use App\Model\Product;


?>
<?php if(isset($_SESSION['name'])):?>
<?php 
$win = null;
   $id = (int)$_GET['action'];
   $query = $pdo->getPdo()->query("SELECT * FROM products WHERE id = $id");
   $posts = $query->fetchAll(PDO::FETCH_CLASS,Product::class);
  $categories = $pdo->getPdo()->query('SELECT * FROM category')->fetchAll(PDO::FETCH_CLASS,Category::class);


  if(!empty($_POST)){
   
    $title =  $_POST['title'];
    $slug =  $_POST['slug'];
    $true_price = $_POST['Trueprice'];
    $fals_price = $_POST['Falsprice'];
    $content = $_POST['description'];
    $garantie = $_POST['slug'];
    $frome = $_POST['frome'];
    $deliver = $_POST['deliver'];
    $garantie = $_POST['garantie'];
    $category = $_POST['category'];
 
  
      $update = $pdo->getPdo()->prepare("UPDATE products SET 
          slug ='$slug',
          title ='$title',
          true_price='$true_price',
          fals_price='$fals_price',
          content='$content',
          garantie = '$garantie',
          frome = '$frome',
          deliver = '$deliver',
          category='$category'
          WHERE id = $id"
       );
      $update->execute();
      $win = "Votre article a bient ete mis a jour";

      

  }
?>




















  <div class="container ">
   <div class="w-100 d-flex justify-content-center align-center ">
   <div class="col-md-6" style="margin: 15px;">

        <?php if(isset($win)):?>
        <div class="alert alert-success">
          <?=$win?>
        </div>
     <?php endif;?>


   <form action="" method="POST">
   <?php foreach($posts as $post):?>
    <?php //var_dump($post->getContent(),$post->getPrice(),$post->getPrix()) ?>
          <div class="form-group">
            <label for="title">Nom du nouveaux produit</label>
            <input type="text" value="<?=$post->title()?>" name="title" id="title" placeholder="Entre le titre du produit" class="form-control">
          </div>

            <div class="form-group">
               <label for="slug">Nom du  nouveaux Slug </label>
               <input  id="slug" value="<?=$post->slug()?>" class="form-control" type="text" name="slug" placeholder="Entre le titre url">
             </div>



             <div class="form-group">
               <label for="price">prix du produit barre </label>
               <input  id="price" value="<?=(int)$post->fals_price()?>" class="form-control" type="number" name="Falsprice" >
             </div>

             <div class="form-group">
               <label for="price">prix du produit finale </label>
               <input  id="price" value="<?=$post->true_price()?>" class="form-control" type="number" name="Trueprice"></input>
             </div>
             
              <div class="form-group">
               <label for="delive">frais livraisons</label>
               <input  id="delive" value="<?=$post->deliver()?>" class="form-control" type="text" name="deliver"></input>
             </div>

              <div class="form-group">
               <label for="frome"> provient de l'entreprise</label>
               <input  id="frome" value="<?=$post->frome()?>" class="form-control" type="text" name="frome"></input>
             </div>
              <div class="form-group">
               <label for="garantie">durée de garantie</label>
               <input  id="garantie" value="<?=$post->garantie()?>" class="form-control" type="text" name="garantie"></input>
             </div>
             <?php endforeach;?>

             <div class="form-group">
                <select name="category" class="form-control">
                <?php foreach($categories as $category):?>
                  <option value="<?=$category->name()?>"><?=$category->name()?></option>
                <?php endforeach;?> 
                 </select>
           </div>
 
              <div class="form-group">
               <label for="description">Description Et Caracteristique </label>
               <textarea  id="description" class="form-control" type="text" name="description" placeholder="Entre la description du produit"><?=$post->content()?></textarea>
             </div>
           
           <button class="btn btn-primary w-100">Modifier</button>
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
