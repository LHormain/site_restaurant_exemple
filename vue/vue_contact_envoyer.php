<?php
include('controler/traitement_contact.php');

?>
<section class="container-fluid position-sticky top-0 demi_hauteur">
    <div class="row">
        <!-- Haut de page -->
        <img src="public/assets/img/illustration_site/couverts-or-fond-noir.jpg" alt="" class="img-fluid en_tete img_en_tete position-relative col-12">
        <div class="col-12 position-absolute d-flex justify-content-center align-items-start en_tete p-5">
            <div class="row position-relative p-5">
                <h1 class="col-12 text-center">Contactez-nous</h1>
                <p  class="col-8 offset-2 text-center mb-5 bg-transparent bg-gradient"></p>
            </div>
        </div>
    </div>
</section>
</section>
<section class="container-fluid position-relative bg-light pb-5 carte">
    <div class="row">
        <div class="offset-lg-2 col-lg-8 text-center mt-5">
            <?php
                echo $texte_page_courante;
            ?>
        </div>
    </div>
</section>