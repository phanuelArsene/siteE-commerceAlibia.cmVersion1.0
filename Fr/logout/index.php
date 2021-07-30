<?php
session_start();
setcookie("remember",NULL,-1);
if(isset($_SESSION["user"])){
    
    unset($_SESSION["user"]);
    header("location:/Fr/Accueil/");
}


