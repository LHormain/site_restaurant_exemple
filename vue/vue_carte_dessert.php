<?php

    include('controler/traitement_carte_dessert.php');
?>

<!-- Dessert -->
<div class="offset-md-1 col-md-10 my-5 ">
    <div class="row">
        <div class="col-lg-2 d-flex justify-content-center align-items-center">
            <img src="<?php if (array_key_exists(0,$nom_img)) {echo image_par_default('public/assets/img/plat/',$nom_img[0]);} else {echo image_par_default('public/assets/img/plat/', '');} ?>" class="border border-primary rounded img_plat_carte" alt="">
        </div>
        <div class="col-lg-8">
            <h3>Dessert</h3>
            <!--  -->
            <?php 
                echo $carte;
            ?>
            <!--  -->
            
        </div>
        <div class="col-lg-2  d-flex justify-content-center align-items-center">
            <img src="<?php  if (array_key_exists(1,$nom_img)) {echo image_par_default('public/assets/img/plat/',$nom_img[1]);} else {echo image_par_default('public/assets/img/plat/', '');} ?>" class="border border-primary rounded img_plat_carte mt-3 mt-md-0" alt="">
        </div>
    </div>
</div>
