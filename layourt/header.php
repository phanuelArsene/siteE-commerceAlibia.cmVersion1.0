<?php session_start();?>
<!DOCTYPE html>
<html lang="fr">
<head>
    
     
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" type="image/png" sizes="16x16" href="/WebRoute/img/logo/logo.png"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="/WebRoute/Css/sty.css">

    <!-- PWA -->
    <link rel="manifest" href="/Fr/Accueil/manifest.json"/>
    <link rel="apple-touch-icon" href="/icone/2.png"/>
    <meta name="apple-mobile-web-app-status-bar" content="white"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <meta name="theme-color" content="white"/>

<!-- PWA -->
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-title" content="Alibia.cm" />
    <meta name="msapplication-TileImage" content="/icone/2.png" />
    <meta name="msapplication-TileColor" content="#FFFFFF" />
    <title>
     <?php if(isset($titre)){
             echo "Alibia.cm | " . $titre;
            }
            else{
                echo  "Alibia.cm";
            }
        ?>
    </title>
</head>
<body>

    <div class="header">
        <div class="header nav">
                <div class="logo">
                    <img src="/WebRoute/img/logo/alibia.png" alt="le logo" title="logo">
                </div>
                <div class="menu">
                    <ul>
                        <li><a href="/Fr/Accueil/" title="Accueil">Accueil</a></li>
                        <li><a href="/Fr/Service" title="service">alibia services</a></li>
                        <li><a href="/Fr/categories" title="catégories">alibia produits</a></li>
                        <li><a href="/Fr/Propos/" title="à propos">à propos</a></li>
                    </ul>
                </div>

                <div class="pha">
                    <div class="rec">
                        <a href="/Fr/surch/" title="faite une recherche"><img src="/WebRoute/img/icone/seach.png" alt="" width="30px"></a>
                    </div>
                    <div class="ac">
                         <?php if(isset($_SESSION["user"])):?>
                           <a href="/Fr/utilisateurs/"> <img src="/WebRoute/img/icone/compte.png" alt="" width="30px"> mon compte !</a> 
                         <?php else:?>
                           <a class="pa" href="/Fr/compte/inscription.php">crée un compte </a>|<a class="pa" href="/Fr/compte/connexion.php">se connecter</a>
                         <?php endif;?>
                    </div>
                </div>
                 <div class="icones navicone">
                    <a href="https://www.facebook.com/Alibia.cmPS"target="_blank" > <i class="fa fa-facebook" aria-hidden="true"></i></a>
                    <a target="_blank" href="https://api.whatsapp.com/send?phone=237696603305&fbclid=IwAR1CYeUlqFkw_z49HvaAjA8y6WaljjfOQZ8ISxY2ejQBz8W1oOnog6YDjdE"><i class="fa fa-whatsapp" aria-hidden="true"></i></a>
               </div>
        </div>
    </div>
    <div class="body">

     
   
