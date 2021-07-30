<?php 
$titre = "Bienvenue";

require dirname(dirname(__DIR__)) . "/layourt/header.php";





//CLASSE POUR IMPORTE LE FORMULAIRE
require dirname(dirname(__DIR__)) . "/App/Form.php";
use App\Form;
$Form = new Form($_POST);

//CLASSE POUR IMPORTE LA  BDD
require dirname(dirname(__DIR__)) . "/App/DataBase/Database.php";
use App\Database\Database;
$pdo = new Database("Alibia");
$user = $_SESSION["user"];
 
?>

<?php 

//CLASSE POUR IMPORTE Le USER
 require dirname(dirname(__DIR__)) . "/App/model/user.php";
 use App\Model\User;

  if(empty($_SESSION["user"])){
      header("location:/Fr/Accueil/");
  }
  else{
        $pdo->getPdo()->query("SELECT * FROM users where mail ='$user'")->setFetchMode(PDO::FETCH_OBJ);
        $Object_user = $pdo->getPdo()->query("SELECT * FROM users where mail ='$user'")->fetch();
        $_SESSION["name_user"] = $Object_user[1];
  }

 
?>




    <div class="user">
        <div class="img">
            <img src="/WebRoute/img/logo/default.png" alt="" width="100%">
        </div>
        <div class="user_txt">
            bienvenue <?php if(isset($Object_user[6]) && $Object_user[6] === "M"):?>
                        mr.
                     <?php elseif(isset($Object_user[6]) && $Object_user[6] === "F"):?>
                        mme.
                      <?php else:?>

                     <?php endif;?>
            <?=$Object_user[1]?> <br>
            <?=$Object_user[4]?>
        </div>
    </div>
    <?php
    
    ?>

  <div class="cantainer user_cont">
    <div class="user_page" style="margin-bottom: 45px;">

    <?php if(isset($_GET["action"]) && $_GET["action"]=== "info" ):?>
        
          <div class="info">
            <p>Nom: <?=$Object_user[1]?> </p>
            <p>Prenom: <?=$Object_user[2]?> </p>
            <p>Numéro de téléphone (WhatsApp): <?=$Object_user[3]?> </p>
            <p>Votre E-mail: <?=$Object_user[4]?> </p>
            <p>Votre Ville: <?=$Object_user[5]?> </p>
            <?php if(isset($Object_user[6]) && $Object_user[6] === "M"):?>
               <p>sexe: Masculin</p>
            <?php elseif(isset($Object_user[6]) && $Object_user[6] === "F"):?>
             <p>sexe: Féminin</p>

            <?php else:?>

            <?php endif;?>
           
          </div>
          
            <div class="d-flex   justify-content-center">
               <a href="/Fr/utilisateurs/ " class="50"> <button class="btn btn-warning w-100">retour</button></a>
             </div>
      
    <?php elseif(isset($_GET["action"]) && $_GET["action"]=== "Statistique"):?>

         <div class="row">
           <div class="col-12">
             <div class="alert alert-danger">
                    <h2>⛔ Désolé <?=$Object_user[1]?> tu n'a pas le droit d'accéder à cette page 🚫☢️</h2>
              </div>
             <div class="d-flex   justify-content-center">
               <a href="/Fr/utilisateurs/ " class="50"> <button class="btn btn-warning w-100">retour</button></a>
             </div>
           </div>
         </div>

    <?php else:?>
        <div class="box_user">
            <div class="icone_box">
                <div class="icone_user">
                    <img src="/WebRoute/img/icone/state.png" alt="" width="100%">
                </div>
            </div>
            <div class="action_user"><a href="?action=Statistique">Statistique Du Site Alibia.Cm</a></div>
        </div>


        <div class="box_user">
            <div class="icone_box">
                <div class="icone_user">
                    <img src="/WebRoute/img/icone/lio.png" alt="" width="100%">
                </div>
            </div>
            <div class="action_user"><a href="amélioré.php">Que pouvons nous amélioré sur le site ?</a></div>
        </div>

        <div class="box_user">
            <div class="icone_box">
                <div class="icone_user">
                    <img src="/WebRoute/img/icone/about.png" alt="" width="100%">
                </div>
            </div>
            <div class="action_user"><a href="?action=info">vos informations</a></div>
        </div>

        <div class="box_user">
            <div class="icone_box">
                <div class="icone_user">
                    <img src="/WebRoute/img/icone/deconet.png" alt="" width="100%">
                </div>
            </div>
            <div class="action_user"><a href="/Fr/logout/index.php">se deconnecter</a></div>
        </div>


     <?php endif;?>




    </div>
  </div>










<?php require dirname(dirname(__DIR__)) . "/layourt/footer.php";

?>

