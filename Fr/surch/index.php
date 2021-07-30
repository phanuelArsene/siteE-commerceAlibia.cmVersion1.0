<?php 
$titre ="recherche";
//RECUPERATION DES ARTICLES
require dirname(dirname(__DIR__)) . "/App/model/Product.php";
use App\Model\Product;
//CLASSE POUR IMPORTE LA  BDD
require dirname(dirname(__DIR__)) . "/App/DataBase/Database.php";
use App\Database\Database;
$pdo = new Database("Alibia");

$query = "SELECT * FROM products";
$params = [];
$resulta = NULL;

if(!empty($_GET['q'])){
    $query .= " WHERE title LIKE :title";
    $params['title'] = '%' . $_GET['q'] . '%';
    $resulta = $_GET['q'];

}

$query .= "  ORDER BY `id` DESC LIMIT 20";
$statement = $pdo->getPdo()->prepare($query);
$statement->execute($params);
$posts = $statement->fetchAll(PDO::FETCH_CLASS,Product::class);





////Pagination
// $courantPage = URL::getInt('page',1);
// URL::getPositiveInt($courantPage ,1);
//   $count = (int)$bdd->query("SELECT COUNT(id) FROM poste")->fetch(PDO::FETCH_NUM)[0];
//   $pages = ceil($count/12); 
//   if($courantPage > $pages){ 
//     throw new Exception('Cette page nexiste pas');
// }
// $ofset =  12 * ($courantPage - 1);

// if(isset($_GET['page']) && $_GET['page'] === '1'){
//    header('location:/views/surch/');

// }
if(isset($_GET['id'],$_GET['slug'])){
    session_start();
    $_SESSION['id'] =  $_GET['id'];
    $_SESSION['slug'] = $_GET['slug'];
    $id = $_SESSION['id'];
    $slug = $_SESSION['slug']; 
    header("location:/Fr/show/?id=$id&Slug=$slug");
}
//COMPTEURS

?>

<?php require dirname(dirname(__DIR__)) . "/layourt/header.php";



?>

<div class="corp">

    <div class="surch">
             <form class="form-inline mt-2 mt-md-0 w-90">
              <input class="form-control " name="q" type="text" placeholder="recherche " aria-label="Search">
              <button class="btn btn-outline-warning my-2 my-sm-0" type="submit">rechercher</button>
            </form>
    </div>
<div class="container" style="margin-top: 30px;">

   <div class="row d-flex">
       <div class="suerch col-12 d-flex  justify-content-center ">

      </div>
<div class="col-12 d-flex justify-content-center">

       <?php if(isset($_GET['q'])):?>
         <h2>résultas de la recherche sur l'article "<mark><?=$resulta?></mark>"</h2>
       <?php else:?>
        <h2>Voici les 20 dernier article faite votre recherche ici</h2>
       <?php endif;?>
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







</div>






<?php require dirname(dirname(__DIR__)) . "/layourt/footer.php";?>
