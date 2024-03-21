<?php
// if (isset($_POST['mail_utilisateur'], $_POST['pwd']) && $_POST['mail_utilisateur'] != NULL && $_POST['mail_utilisateur']) {
    require('controler/traitement_connexion_clients.php');
// }
// else {
    $texte_page_courante = '';
    $titre = '';
    $texte = '';
    
    // si utilisateur non connecté
    if (!isset($_SESSION['id_client'])) {    
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
        <form action="#" method="post" class="py-3 mb-5 text-center col-lg-4 offset-lg-2" autocomplete="off">
            <h3 class=" pt-5">Connexion</h3>
            <?php echo $texte_page_courante; ?>
            <div class="mb-3">
                <input type="text" name="mail_utilisateur" aria-describedby="helpId1" placeholder="votre adresse mail">
                <small id="helpId1" class="form-text text-muted visually-hidden">votre adresse e-mail pour vous connecter</small>
            </div>
            <div class="mb-3">
                <input type="password" name="pwd" aria-describedby="helpId2" placeholder="Mot de passe">
                <small id="helpId2" class="form-text text-muted visually-hidden">votre mot de passe</small><br>
                <small class="form-text text-muted"><a href="index.php?page=51">Mot de passe oublié?</a></small>
            </div>

            <div class="mb-3">
                <input type="submit" value="Connexion" class="btn btn-primary">
            </div>
        </form>
        <div class="text-center col-lg-4 py-3 mb-5">
            <h3 class=" pt-5">Pas encore client?</h3>
            <a class="btn btn-primary" href="index.php?page=7" role="button">Créer un compte</a>
        </div>
    </div>
</section>

<?php 
    }
    // si utilisateur connecté
    else { 
        ?><script>
            window.location.assign("index.php?page=10&cas=1");
        </script><?php
    }
// }
?>