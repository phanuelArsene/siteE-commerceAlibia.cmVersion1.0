    </div>
<footer class="footer">       

 <!--footer dextop -->
        <div class="foot">
            <div class="copy">
            <?php
                $Object = new DateTime();  
                $Year = $Object->format("Y"); 
             ?>
                Copyright © <?=$Year?>. Tous droits réservés
            </div>
            <div class="icones">
                <a href="https://www.facebook.com/Alibia.cmPS"target="_blank" > <i class="fa fa-facebook" aria-hidden="true"></i></a>
                <a target="_blank" href="https://api.whatsapp.com/send?phone=237696603305&fbclid=IwAR1CYeUlqFkw_z49HvaAjA8y6WaljjfOQZ8ISxY2ejQBz8W1oOnog6YDjdE"><i class="fa fa-whatsapp" aria-hidden="true"></i></a>
            </div>
        </div>
  
    <div class="boxi " >
        
        <!-- menu mobile -->
            <a href="/Fr/Accueil/">
                <div class="icbox">
                    <div class="lol">
                    <img src="/WebRoute/img/icone/home.png" alt="">
                    </div>
                    <div class="txtico">
                       Accueil
                    </div>
                </div>
            </a>
            
            
            <a href="/Fr/Service/">
                <div class="icbox">
                    <div class="lol">
                    <img src="/WebRoute/img/icone/service.jpg" alt="">
                    </div>
                    <div class="txtico">
                    alibia services
                    </div>
                </div>
            </a>
            
            <a href="/Fr/categories/">
                <div class="icbox">
                    <div class="lol">
                    <img src="/WebRoute/img/icone/cathe.png" alt="">
                    </div>
                    <div class="txtico">
                       alibia produits
                    </div>
                </div>
            </a>



            <a href="/Fr/surch/">
                <div class="icbox">
                    <div class="lol">
                    <img src="/WebRoute/img/icone/seach.png" alt="">
                    </div>
                    <div class="txtico">
                    Recherche
                    </div>
                </div>
            </a>
            
            
            <a href="<?php if(isset($_SESSION["user"])):?>
                           /Fr/utilisateurs/           
                         <?php else:?>
                            /Fr/compte/connexion.php
                        <?php endif;?>
                   ">
                <div class="icbox">
                    <div class="lol">
                    <img src="/WebRoute/img/icone/compte.png" alt="">
                    </div>
                    <div class="txtico">
                       Mon Compte
                    </div>
                </div>
            </a>
        
    </div>
</footer>
    
</body>
<script src="/WebRoute/js/lop.js"></script>
<script src="/Fr/Accueil/script.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</html>