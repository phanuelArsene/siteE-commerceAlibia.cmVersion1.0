<?php 
$titre = "S'inscrire";
//CLASSE POUR IMPORTE LE FORMULAIRE
require dirname(dirname(__DIR__)) . "/App/Form.php";
use App\Form;
$Form = new Form($_POST);

//CLASSE POUR IMPORTE LA  BDD
require dirname(dirname(__DIR__)) . "/App/DataBase/Database.php";
use App\Database\Database;
$pdo = new Database("Alibia");

//CLASSE POUR IMPORTE LE VALIDATEURS
require dirname(dirname(__DIR__)) . "/App/ValidForm.php";
use App\ValidForm;




require dirname(dirname(__DIR__)) . "/layourt/header.php";?>


<?php
if(!empty($_POST)){
    

$data = $ValidForm = new ValidForm($_POST["useranme"],$_POST["Last_useranme"],$_POST["number"],$_POST["mail"],$_POST["ville"],$_POST["password"],$_POST["Cpassword"],$_POST["genre"],$pdo);

if($data->isValid() === true){

   // date_default_timezone_set('Africa/Douala');
   // $created_at = date('d-m-y h:i:s');  

   $password = $_POST["password"];
   $mdp = password_hash("$password", PASSWORD_BCRYPT);


   //INSERT INTO `users`(`id`, `username`, `mail`, `password`) VALUES ([value-1],[value-2],[value-3],[value-4])
   $values = [$_POST["useranme"],$_POST["Last_useranme"],$_POST["number"],$_POST["mail"],$_POST["ville"],$_POST["genre"],$mdp];
   $pdo->prepare("INSERT INTO users set name = ? , lastname	 = ? , number = ?,mail = ?, ville = ?,sex  = ?, password = ?,date = NOW()",$values);

/// RECUPERATION DE L"UTILISATEURS DANS LA BDD POUR STOKER DANS LA SESSION
   $_SESSION["user"] = $_POST["mail"];
   header('location:/Fr/utilisateurs/');

}


else{
   $errors = $data->getEroors();
  
}

}
?>




    <div class="container">
        <div class="row extends">
           <div class="col-12"><h3 style="text-align: center;">Créer votre compte Alibia.cm</h3></div>
            <div class="col-md-6">
                <div class="form">
                    <?php if(!empty($errors)):?>
                        <div class="alert alert-danger">
                            <ul>
                                <?php foreach($errors as $error):?>
                                    <li style="list-style: outside;"><?=$error?></li>
                                <?php endforeach;?>
                            </ul>
                        </div>
                    <?php endif;?>
                    <form action="" method="POST" class=" d-flex flex-column justify-content-center align-center">
                        <?=$Form->Input("text","useranme","Nom")?>
                        <?=$Form->Input("text","Last_useranme","Prenom")?>
                        <?=$Form->Input("number","number","Numéro de téléphone (WhatsApp)")?>
                        <?=$Form->Input("email","mail","Votre E-mail")?>
                        <?=$Form->Input("text","ville","votre ville")?>
                        <?=$Form->Input("password","password","Mot De Passe")?>
                        <?=$Form->Input("password","Cpassword","Confirme Le Mot De Passe")?>
                        <div class="form-group sex">
                            <div class="sex1">
                                <input class="w3-radio" type="radio" name="genre" value="M" checked>
                                <label class="label">je suis un homme</label>
                            </div>
                            <div class="sex2">
                                <input class="w3-radio" type="radio" name="genre" value="F" >
                                <label class="label">je suis une femme</label>
                            </div>
                        </div>
                        <?=$Form->submit("Créer votre compte Alibia.cm")?>
                   </form>
                </div>
            </div>
        </div>
    </div>





































<?php require dirname(dirname(__DIR__)) . "/layourt/footer.php";?>
