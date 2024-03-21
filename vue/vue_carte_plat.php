<?php

include('controler/traitement_carte_plat.php');
?>

<!-- Plat -->
<div class="offset-md-1 col-md-10 my-5 ">
    <div class="row">
        <!-- illustrations -->
        <div class="col-lg-2 d-flex flex-lg-column justify-content-evenly align-items-center">
            <img src="<?php  if (array_key_exists(0,$nom_img)) {echo image_par_default('public/assets/img/plat/',$nom_img[0]);} else {echo image_par_default('public/assets/img/plat/', '');} ?>" class="border border-primary rounded img_plat_carte" alt="">
            <img src="<?php  if (array_key_exists(1,$nom_img)) {echo image_par_default('public/assets/img/plat/',$nom_img[1]);} else {echo image_par_default('public/assets/img/plat/', '');} ?>" class="border border-primary rounded img_plat_carte d-none d-md-block" alt="">
        </div>
        <div class="col-lg-8">
            <h3>Plat</h3>
            <h4 class="text-center" style="font-family: var(--montserrat); font-size: 14px;">Tous nos plat sont accompagnés au choix par des frittes, des spätzle ou des Kneffes</h4>
            <!-- boucle sur les plats de la carte -->
            <?php 
                echo $carte;
            ?>
            
            <!--  -->
        </div>
        <!-- illustrations -->
        <div class="col-lg-2 d-flex flex-lg-column justify-content-evenly align-items-center mt-3 mt-lg-0">
            <img src="<?php if (array_key_exists(2,$nom_img)) {echo image_par_default('public/assets/img/plat/',$nom_img[2]);} else {echo image_par_default('public/assets/img/plat/', '');} ?>" class="border border-primary rounded img_plat_carte " alt="">
            <img src="<?php if (array_key_exists(3,$nom_img)) {echo image_par_default('public/assets/img/plat/',$nom_img[3]);} else {echo image_par_default('public/assets/img/plat/', '');} ?>" class="border border-primary rounded img_plat_carte d-none d-md-block" alt="">
        </div>
    </div>
</div>
