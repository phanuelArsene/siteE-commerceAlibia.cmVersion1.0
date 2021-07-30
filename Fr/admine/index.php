<?php
session_start();
require dirname(dirname(__DIR__)) . "/layourt/header2.php";

$titre = "connexion";
//CLASSE POUR IMPORTE LE FORMULAIRE
require dirname(dirname(__DIR__)) . "/App/Form.php";
use App\Form;
$Form = new Form($_POST);


//CLASSE POUR IMPORTE LA  BDD
require dirname(dirname(__DIR__)) . "/App/DataBase/Database.php";
use App\Database\Database;
$pdo = new Database("Alibia");
//RECUPERATION DES ARTICLES
require dirname(dirname(__DIR__)) . "/App/model/Product.php";
use App\Model\Product;

//CLASSE POUR IMPORTE L ADMINISTRATEUR
require dirname(dirname(__DIR__))  . "/App/model/Admine.php";
use App\Model\Admine;
?>
<?php if(isset($_SESSION['name'])):?>



<?php




//Pagination
$courantPage = (int)($_GET["page"] ?? 1)  ?: 1;

$count = (int)$pdo->getPdo()->query("SELECT COUNT(id) FROM products")->fetch(PDO::FETCH_NUM)[0];
if($courantPage <= 0){
  header("location:/Fr/oops/oops/index.html");
}

$perPage = 16;
$pages = ceil($count / $perPage); 

if($courantPage > $pages){
  header("location:/Fr/oops/oops/index.html");
}


  // if($courantPage > $pages){ 
  //          header("location: ../oops/oops/index.html" );
  //     }
$ofset =  $perPage * ($courantPage - 1);
$query = $pdo->getPdo()->query("SELECT * FROM products ORDER BY `id` DESC LIMIT $perPage OFFSET $ofset");
$posts = $query->fetchAll(PDO::FETCH_CLASS,Product::class);


?>

<div class="container">
<table class ="table">
  <thead>
      <th># ID</th>
      <th>Titre</th>
      <th>Action</th>

  </thead>
  <tbody>
<?php ob_start();?>
      <?php foreach($posts as $post):?>
        <tr>
           <td>
             #<?=$post->id()?>
           </td>
           <td>
             <a style="color: black;" href="edite.php?action=<?=$post->id()?>"><?=$post->title()?></a>
           </td>
           <td style="display:flex; flex-wrap:wrap;">
             <a style="display:inline" class="alert alert-primary" href="edite.php?action=<?=$post->id()?>">Modifier</a>
             <form action="delete.php?action=<?=$post->id()?>" method="POST"
                 onsubmit="return confirm('Voulez vous vraiment effectuer cette action ??')" style="display:inline">
                 <button class="alert alert-danger" name="delete">Supprimer</button> 
             </form> 
           </td>
        </tr>
      <?php endforeach;?>
      <?php ob_get_contents()?>
  </tbody>
</table>

 <div class="d-flex justify-content-between my-4">
 <?php if($courantPage > 1):?>
        <a class="btn btn-warning" href="/Fr/admine/?page=<?=$courantPage - 1?>">&laquo; page precedente</a>
    <?php endif;?>
    <?php if($courantPage < $pages):?>
        <a class="btn btn-warning ml-auto" href="/Fr/admine/?page=<?= $courantPage + 1?>">page suivante &raquo;</a>
    <?php endif;?>
</div>
</div>

<?php 

if(isset($_GET['action'])){
  if($_GET['action'] === 'add'){
    header('location:/Fr/admin/add.php');
  }
  if($_GET['action'] === 'add_cat'){
    header('location:/Fr/admin/add_cat.php');
  }
}
?>






<?php require dirname(dirname(__DIR__)) . "/layourt/footer.php";?>



<?php  else:?>
  <?php 
     header('location:/Fr/Accueil/');
     var_dump($_SESSION['id'],$_SESSION['name'])
   ?>
<?php endif?>



















