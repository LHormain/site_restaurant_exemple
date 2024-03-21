<?php
include('controler/traitement_accueil_bo.php');
?>
<div class="col-10 p-5">
    <div class="row">
        <h1 class="text-center">Accueil</h1>
        <!-- ----------------------------------------------------------------------------------------------- -->
        <!--                                          Restaurant                                             -->
        <!-- ----------------------------------------------------------------------------------------------- -->
        <h2>Restaurant</h2>
        <a href="index.php?page=3" class="col-3 my-3">
            <div class="card text-center ">
                <div class="card-header">
                    Carte de la semaine
                </div>
                <div class="card-body position-relative">
                    <img src="public/asset/img/icones/liste-de-prix.png" class="img-fluid rounded-top" alt="">
                    <p class="card-text  ">Ajouter et gérer les plats de la carte et du menu du jour</p>
                </div>
            </div>
        </a>
        <a href="index.php?page=31" class="col-3 my-3">
            <div class="card text-center ">
                <div class="card-header">
                    Illustration de la carte
                </div>
                <div class="card-body position-relative">
                    <img src="public/asset/img/icones/viande.png" class="img-fluid rounded-top" alt="">
                    <p class="card-text  ">Ajouter et gérer les photos décorant la carte</p>
                </div>
            </div>
        </a>
        <a href="index.php?page=32" class="col-3 my-3">
            <div class="card text-center ">
                <div class="card-header">
                    Menu du jour
                </div>
                <div class="card-body position-relative">
                    <img src="public/asset/img/icones/riz.png" class="img-fluid rounded-top" alt="">
                    <p class="card-text  ">Gestion du menu du jour</p>
                </div>
            </div>
        </a>
        <a href="index.php?page=33" class="col-3 my-3">
            <div class="card text-center ">
                <div class="card-header">
                    Boissons
                </div>
                <div class="card-body position-relative">
                    <img src="public/asset/img/icones/boissons.png" class="img-fluid rounded-top" alt="">
                    <p class="card-text  ">Gestion de la carte boisson</p>
                </div>
            </div>
        </a>
        <!-- ----------------------------------------------------------------------------------------------- -->
        <!--                                          Traiteur                                               -->
        <!-- ----------------------------------------------------------------------------------------------- -->
        <h2>Traiteur</h2>
        <a href="index.php?page=4&c=2" class="col-3 my-3">
            <div class="card text-center">
                <div class="card-header">
                    Menu entreprises
                </div>
                <div class="card-body ">
                    <img src="public/asset/img/icones/serveur.png" class="img-fluid rounded-top" alt="">
                    <p class="card-text  ">Ajouter et gérer les menus à l'assiette pour les repas d'entreprises</p>
                </div>
            </div>
        </a>
        <a href="index.php?page=4&c=1" class="col-3 my-3">
            <div class="card text-center">
                <div class="card-header ">
                    Devis<span class="badge bg-danger border border-dark fs-6 position-absolute top-0 start-100 translate-middle p-2"><?php echo $nbr_devis; ?></span>
                </div>
                <div class="card-body ">
                    <img src="public/asset/img/icones/commander.png" class="img-fluid rounded-top" alt="">
                    <p class="card-text ">Gestion des devis Traiteur</p>
                </div>
            </div>
        </a>
        <!-- ----------------------------------------------------------------------------------------------- -->
        <!--                                          Administratif                                          -->
        <!-- ----------------------------------------------------------------------------------------------- -->
        <h2>Administratif</h2>
        <a href="index.php?page=5" class="col-3 my-3">
            <div class="card text-center">
                <div class="card-header ">
                    Messages reçus<span class="badge bg-danger border border-dark fs-6 position-absolute top-0 start-100 translate-middle p-2"><?php echo $nbr_messages; ?></span>
                </div>
                <div class="card-body ">
                    <img src="public/asset/img/icones/email.png" class="img-fluid rounded-top" alt="">
                    <p class="card-text ">Boite de réception des messages de contact</p>
                </div>
            </div>
        </a>
        <a href="index.php?page=6" class="col-3 my-3 ">
            <div class="card text-center">
                <div class="card-header ">
                    Clients 
                </div>
                <div class="card-body ">
                    <img src="public/asset/img/icones/table-a-dinner.png" class="img-fluid rounded-top" alt="">
                    <p class="card-text ">Liste des clients</p>
                </div>
            </div>
        </a>
        <?php 
        if ($_SESSION['connexion'] == 2) {
        ?>
        <a href="index.php?page=7" class="col-3 my-3 ">
            <div class="card text-center">
                <div class="card-header ">
                    Administrateurs 
                </div>
                <div class="card-body ">
                    <img src="public/asset/img/icones/admin.png" class="img-fluid rounded-top" alt="">
                    <p class="card-text ">Liste des admins</p>
                </div>
            </div>
        </a>
        <?php
        }
        ?>
    </div>
</div>