<?php
if (isset($_GET['cas']) && $_GET['cas'] != NULL) {
    $cas = intval($_GET['cas']);

    if ($cas == 1 ) {
        // connexion client
        include_once('vue/vue_page_client.php');
    }
    elseif ($cas == 2) {
        // inscription réussie
        echo ' 
        <section class="container-fluid position-relative bg-light pb-5 carte">
            <div class="row">
                <div class="offset-lg-2 col-lg-8 text-center my-5">
                    <h2>
                        Votre compte a été correctement créé.<br> Bienvenue Chez Roger
                    </h2>
                    <a class="btn btn-primary" href="index.php?page=3&c=3" role="button" >Vers demande de devis</a>
                    <a class="btn btn-primary" href="index.php?page=1" role="button">Retour vers l\'accueil</a>
                </div>
            </div>
        </section>
        ';   
    }
    elseif ($cas == 3) {
        // mise à jour client réussie 
        echo ' 
        <section class="container-fluid position-relative bg-light pb-5 carte">
            <div class="row">
                <div class="offset-lg-2 col-lg-8 text-center my-5">
                    <h2>
                        Vos nouvelles données ont étés correctement enregistrées
                    </h2>
                    <a class="btn btn-primary" href="index.php?page=3&c=3" role="button" >Vers demande de devis</a>
                    <a class="btn btn-primary" href="index.php?page=1" role="button">Retour vers l\'accueil</a>
                </div>
            </div>
        </section>
        ';
    }
    elseif ($cas == 4) {
        //demande de changement de mdp
        echo '
        <section class="container-fluid position-relative bg-light mt-5">
            <div class="row ">
                <h2 class="text-center">Mot de passe oublié</h2>
                <div class="text-center my-5">
                    Un liens pour réinitialiser votre mot de passe vient d\'être envoyé sur votre boite mail. Il sera valide 30 minutes.
                </div>
                
            </div>
        </section>
        ';
    }
    elseif ($cas == 5) {
        // changement de mdp
        echo '
        <section class="container-fluid position-relative bg-light mt-5">
            <div class="row ">
                <div class="text-center my-5">Votre mot de passe à été réinitialisé.</div>
            </div>
        </section>
        ';
    }
}

?>