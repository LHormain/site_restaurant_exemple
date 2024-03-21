<?php
include('controler/traitement_mdp_oublier.php');
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
        <h2 class="text-center">Mot de passe oublié</h2>

        <?php 
        if (!(isset($_POST['mail']) && $_POST['mail'] != NULL)) {

        ?>
        <form action="" method="post" class="my-5 text-center offset-4 col-4">
            <div class="mb-3 text-start">
              <label for="mail" class="form-label">Entrez votre adresse e-mail</label>
              <input type="email"
                class="form-control" name="mail" id="mail" aria-describedby="helpId" placeholder="">
              <small id="helpId" class="form-text text-muted">Entrez une adresse e-mail valide</small>
            </div>
            <input type="submit" value="Envoyer" class="btn btn-primary">
        </form>
        <?php
        }
        else {
            // echo $message;
            // // en attendant de faire marcher l'envoie de mail
            // echo $message_content;
            // //
            ?>
            <script>
                window.location.assign("index.php?page=10&cas=4");
            </script>
            <?php
        }
        ?>
    </div>
</section>