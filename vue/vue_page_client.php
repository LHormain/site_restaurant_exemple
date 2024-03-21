<?php
$titre = 'Bienvenu sur votre espace client';
$texte = '';
include('controler/traitement_page_client.php');
?>
<!-- <section class="container-fluid position-sticky top-0">
    <div class="row">
        <img src="public/assets/img/illustration_site/place-setting-2110245_1280.jpg" alt="" class="img-fluid en_tete img_en_tete position-relative col-12">
        <div class="col-12 position-absolute d-flex justify-content-center align-items-end en_tete ">
            <div class="row position-relative">
                </div>
            </div>
        </div>
    </section> -->
    
    <!-- Haut de page -->
    <section class="container-fluid position-relative bg-light ">
        <div class="row ">
        <h1 class="col-12 text-center h1">
            <?php echo $donnees['prenom_utilisateur'].' '.$donnees['nom_utilisateur']; ?><br><?php echo $titre;  ?>
        </h1>
        <p  class="col-8 offset-2 text-center mb-5 bg-transparent bg-gradient d-none d-md-block"><?php echo $texte;  ?></p>
        <div class="offset-2 col-8 offset-md-1">
            <h2 class=" mt-5 text-center">Vos devis en cours</h2>
            <div class="table-responsive mt-5">
                <table class="table table-hover table-borderless table-primary text-center align-middle" >
                    <thead class="table-light">
                        <caption>Liste des devis pour : <?php echo $donnees['prenom_utilisateur'].' '.$donnees['nom_utilisateur']; ?></caption>
                        <tr >
                            <th >N° de devis</th>
                            <th>Date de création</th>
                            <th>Description</th>
                            <th>État</th>
                            <th>Modifier</th>
                            <th>Supprimer</th>
                            <th>Devis</th>
                        </tr>
                        </thead>
                        <tbody class="table-group-divider">
                            <?php
                                echo $table_devis;
                            ?>
                        </tbody>
                        <tfoot>
                            
                        </tfoot>
                </table>
            </div>
            

        </div>
        <div class="offset-2 col-8 offset-md-0 col-md-2 d-flex flex-column mt-5">
            <a class="btn btn-primary my-3" href="index.php?page=1" role="button">Accueil</a>
            <a class="btn btn-primary my-3" href="index.php?page=7&id=<?php echo $donnees['id_utilisateur'];?>" role="button">Changer vos données personnelles</a>
            <a class="btn btn-primary my-3 <?php if ($test != 0) { echo 'disabled';} ?>" href="index.php?page=3&c=3" role="button" >Nouveau devis</a>
            <a class="btn btn-primary my-3" href="index.php?page=6&dis=1" role="button">Déconnexion</a>
        </div>
    </div>
</section>