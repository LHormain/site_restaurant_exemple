<?php
include('controler/traitement_mdp_reinitialise.php');
$texte_page_courante = '';
$titre = '';
$texte = '';
?>
<section class="container-fluid position-sticky top-0 demi_hauteur">
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
    <div class="row ">
        <?php 
            if ($id_user != '' && !(isset($_POST['mdp'], $_POST['mdp_confirmation']))) {
        ?>
        <form action="#" method="post" class="my-5 offset-4 col-4 text-center">
            <h2>Réinitialisation du mot de passe</h2>
            <input type="hidden" name="token" value="<?= htmlspecialchars($token) ?>">

            <div class="mb-3 text-start">
                <label class="form-label" for="mdp">Nouveau mot de passe</label>
                <input class="form-control" type="password"  id="mdp" name="mdp">
            </div>
            <div class="mb-3 text-start">
                <label class="form-label" for="mdp_confirmation">Confirmation du mot de passe</label>
                <input class="form-control" type="password"  id="mdp_confirmation" name="mdp_confirmation">
            </div>
            <input type="submit" value="Envoyer" class="btn btn-primary">
        </form>
        <?php
            }
            else {
                // echo $message;
                
                ?>
                <script>
                    window.location.assign("index.php?page=10&cas=5");
                </script>
                <?php

            }
        ?>
    </div>
</section>