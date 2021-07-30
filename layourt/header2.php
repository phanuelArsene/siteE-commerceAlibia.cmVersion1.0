
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" type="image/png" sizes="16x16" href="/WebRoute/img/logo/po.jpg"/>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="/WebRoute/Css/sty.css">

    <style>
      .container{
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
      }
      .box-content{
        display: flex;
        justify-content: center;
        width: 100%;
        flex-wrap: wrap;
      }
          .boxs{
               background-color: rgb(250, 250, 250);
               box-shadow: 0px 0px 6px rgba(130, 130, 130, 0.576);
               display: flex;
               justify-content: center;
               align-items: center;
               flex-direction: column;
               padding: 5px;
               width: 300px;
               margin: 5px;
               border-radius: 10px;
        }
        .boxs .img{
          background-color: rgb(123, 252, 98);

          padding: 5px;
          height: 100px;
          width: 100px;
          display: flex;
          justify-content: center;
          align-items: center;
          border-radius: 50%;
        }
        .ifos{
          color: gray;
        }

        .boxs .img .fa-user{
          font-size: 60px;
          color: rgb(255, 255, 78);
        }
        h5{
          text-align: center;
          text-transform: capitalize;
          margin: 5px 0px;
        }
        hr{
          width: 100%;
          background-color: rgba(25, 232, 60, 0.391);
        }
        .contact{
          width: 90%;
          display: flex;
        }
        .contact div{
          width: 50%;
          margin: 0px 5px;
          text-align: center;
          background-color:  rgb(123, 252, 98);
         }
         .contact div a{
          padding:  8px;
          text-align: center;
         }
         .contact div a .fa{
          color: yellow;
         } 
    </style>
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
     
       <nav class="navbar navbar-expand-md navbar-dark bg-dark ">
  <a class="navbar-brand" href="#"><img src="/layourt/logo/scoole (2).png" alt="" width="80px"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarsExampleDefault">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="/Fr/admine/">Accueil <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="membre.php">membres <span class="sr-only">(current)</span></a>
      </li>
     <li class="nav-item active">
        <a class="nav-link" href="statistique.php">statistique <span class="sr-only">(current)</span></a>
      </li>

        <li class="nav-item active">
        <a class="nav-link" href="amélioré.php">amélioration <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="add.php">ajouter un article <span class="sr-only">(current)</span></a>
      </li>
      <!-- <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown</a>
        <div class="dropdown-menu" aria-labelledby="dropdown01">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li> -->
    </ul>

    <div class="form-inline my-2 my-lg-0">
         <a style="color: white;" class="nav-link" href="../logout/out.php">se déconnecter</a>
    </div>
  </div>
</nav>