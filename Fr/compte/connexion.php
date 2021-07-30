<?php 
$titre = "connexion";
//CLASSE POUR IMPORTE LE FORMULAIRE
require dirname(dirname(__DIR__)) . "/App/Form.php";
use App\Form;
$Form = new Form($_POST);


//CLASSE POUR IMPORTE LA  BDD
require dirname(dirname(__DIR__)) . "/App/DataBase/Database.php";
use App\Database\Database;
$pdo = new Database("Alibia");

//CLASSE POUR IMPORTE L ADMINISTRATEUR
require dirname(dirname(__DIR__))  . "/App/model/Admine.php";
use App\Model\Admine;


require dirname(dirname(__DIR__)) . "/layourt/header.php";?>


<?php

if(!empty($_POST) && !empty($_POST["mail"]) &&  !empty($_POST["password"]))
{

if($_POST["mail"] === "cmalibia@gmail.com"){
        
$query = $pdo->querys('SELECT * FROM admine',Admine::class,"one");

$query->getAdmine_name();
$query->getAdmine_password();

$username = $_POST['mail'];
$passord = $_POST['password'];
    
$TruPassword = password_verify($passord,$query->getAdmine_password());

if($username === $query->getAdmine_name() && $TruPassword === true){

     $_SESSION['name'] = $query->getAdmine_name();

        header('location:/Fr/admine/');
  }
  else{
    header('location:/Fr/home/');
  }


    }else{
        $success ="";
        $erros = [];
        $req = $pdo->getPdo()->prepare("SELECT * FROM users WHERE  mail = :username");
        $req->execute(["username" => $_POST["mail"]]);
        $user = $req->fetch(PDO::FETCH_OBJ);

    
        if(is_object($user) && $user->password){
            $user_pass_verify = password_verify($_POST["password"],$user->password);
            
            if($user_pass_verify === true){      
                $_SESSION["user"] = $user->mail;
                if(isset($_POST["remember"])){

                    $remember_me = password_hash("remember_me", PASSWORD_BCRYPT);

                    $pdo->getPdo()->prepare("UPDATE users SET remember_me = ? WHERE  id = ?")->execute([ $remember_me,$user->id]);
                    setcookie("remember", $user->id . '=='. $remember_me . sha1($user->id . "mangue"),time() + 60 * 60 * 24 * 7);

                }

                header('location:/Fr/utilisateurs/');
                exit();
             }
             else{
                 $erros["flash"] = "Email ou mot de passe incorrecte 🙃";
             }
        }
        else{
            $erros["flash"] = "Ce compte n'existe pas Créer votre compte Alibia.cm 😉";
        }
        
    }


}

?>



<div class="container">
    <div class="row extends ">
    <?php if(isset($_GET["action"]) && $_GET["action"]=== "newPassword" ):?>
            <div class="col-12"><h3 style="text-align: center;">changer le mot de passe</h3></div>
        <div class="col-md-6">
            <div class="form">
                <form action="" method="POST" class="">
                    <?=$Form->Input("password","Newpassword","nouveau Mot De Passe")?>
                    <?=$Form->Input("password","NewConfpassword","confirme le nouveau Mot De Passe")?>
                    <?=$Form->submit("changer le mot de passe")?>
                </form>
                <a href="/views/compte/inscription.php">
                    <?=$Form->submit("Créer votre compte Alibia.cm")?>
                </a>
            </div>
        </div>
      
    <?php else:?>
        <div class="col-12"><h3 style="text-align: center;">connexion</h3></div>
        <div class="col-md-6">
            <div class="form">
        <?php if(!empty($erros)):?>
            <div class="alert alert-danger">
                <ul>
                    <li><?=$erros["flash"]?></li>  
                </ul>
            </div>
        <?php endif;?>
                <form action="" method="POST" class="">
                    <?=$Form->Input("email","mail","Votre E-mail")?>
                    <?=$Form->Input("password","password","Mot De Passe")?>
                    <div class="form-group d-flex">
                        <div><input type="checkbox" name="remember" id="">Se Souvenir De Moi</div>
                       
                    </div>
                    <?=$Form->submit("Se connecter")?>
                </form>
                <a href="/Fr/compte/inscription.php">
                    <?=$Form->submit("Créer votre compte Alibia.cm")?>
                </a>
            </div>
        </div>
        <?php endif;?>

    </div>
</div>

 



































<?php require dirname(dirname(__DIR__)) . "/layourt/footer.php";?>
