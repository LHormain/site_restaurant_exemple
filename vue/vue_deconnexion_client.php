<?php
$texte = '';
$titre = 'Au revoir et à bientôt Chez Roger';
include ('controler/deconnexion.php');
?>
<section class="container-fluid position-sticky top-0">
    <div class="row">
        <!-- Haut de page -->
        <img src="public/assets/img/illustration_site/place-setting-2110245_1280.jpg" alt="" class="img-fluid en_tete img_en_tete position-relative col-12">
        <div class="col-12 position-absolute d-flex justify-content-center align-items-end en_tete ">
            <div class="row position-relative">
                <h1 class="col-12 text-center"><?php echo $titre;  ?></h1>
                <p  class="col-8 offset-2 text-center mb-5 bg-transparent bg-gradient d-none d-md-block"><?php echo $texte;  ?></p>
            </div>
        </div>
    </div>
</section>
<section class="container-fluid position-relative bg-light mt-5">
<div class="row">
    <div class="offset-lg-2 col-lg-8 text-center my-5">
        <a class="btn btn-primary" href="index.php?page=1" role="button">Retour vers l'accueil</a>
    </div>
</div>
</section>