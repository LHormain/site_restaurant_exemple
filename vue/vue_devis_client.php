<?php
$titre = '';
$texte = '';
include('controler/traitement_devis_client.php');
?>

<section class="container-fluid position-sticky top-0 demi_hauteur no-print">
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
<section class="container-fluid position-relative bg-light mt-md-5 " >
    <div class="row ">
        <div class="offset-md-1 col-md-7 my-md-5" >
            <img src="public/assets/img/illustration_site/logo2.png" alt="" class="img-fluid logo"> 
            <p class="d-inline" style="font-family: var(--tangerine); font-size:40px; font-weight:700;">Chez Roger</p>
            <p><?php echo $site_adresse; ?></p>
            <p><?php echo $site_tel; ?></p>
            <p><a href="index.php?page=4"><?php echo $site_mail; ?></a></p>
        </div>
        <div class="col-md-3 mt-md-5 devis_td">
            <p class="mt-md-5 pt-md-5"><h2>Devis n° : <?php echo $donnees['id_devis']; ?></h2></p>
            <p>Paris, le <?php echo date('d-m-Y', $donnees['date_creation_devis']); ?></p>
        </div>
        <div class="offset-md-1 col-md-7">
            <strong>Nom client : </strong><?php echo $client['prenom_utilisateur'].' '.$client['nom_utilisateur']; ?><br>
            <strong>Mail : </strong><?php echo $client['mail_utilisateur']; ?><br>
            <strong>Téléphone : </strong></strong><?php echo $client['tel_utilisateur']; ?>
        </div>
        <div class="col-md-3 devis_td">
            <strong>Type d'évènement : </strong><?php echo $donnees['type_evenement_devis'] ?> <br>
            <strong>Date : </strong> <?php echo date('d-m-Y',$donnees['date_evenement_devis']); ?><br>
            <strong>Nombre de personne : </strong> <?php echo $donnees['nbr_personnes_devis']; ?>
        </div>
        <div class="table-responsive my-5 offset-md-1 col-md-10">
            <table class="table table-primary table-hover ">
                <thead>
                    <tr>
                        <th scope="col">Type de repas</th>
                        <th scope="col">Quantité</th>
                        <th scope="col">Prix unitaire en €</th>
                        <th scope="col">Total en €</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        echo $table;
                    ?>
                </tbody>
                <tfoot>
                    <tr>
                        <td></td>
                        <td></td>
                        <td class="text-end"><strong>Evaluation du montant du devis en € </strong></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td class="text-end">Total HT : </td>
                        <td><?php echo devis($donnees); ?></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td class="text-end">TVA : </td>
                        <td><?php echo devis($donnees)*0.1; ?></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td class="text-end"><strong>Total net  : </strong></td>
                        <td><?php echo devis($donnees)*1.1; ?></td>
                    </tr>
                </tfoot>
            </table>
        </div>
        <div class="offset-md-1 col-md-10 mb-5 no-print">
        Nous vous remercions de considérer Chez Roger pour votre événement spécial. <br>Notre équipe traiteur est déterminée à créer une expérience culinaire exceptionnelle qui ravira vos invités. Les prix indiqués dans ce devis sont une estimation donnée à titre indicatif et sont susceptibles de changer après avoir affiné le projet avec vous. Nous sommes impatients de mettre en œuvre chaque détail de votre événement et de faire de cette occasion un moment mémorable. <br>Pour discuter davantage de votre projet, personnaliser votre expérience traiteur et obtenir une estimation plus précise, n'hésitez pas à nous contacter. Chez Roger, nous transformons chaque événement en une célébration gastronomique inoubliable. Merci de nous faire confiance pour vos moments précieux.
        </div>
        <div class="offset-md-1 col-md-10 text-center mb-5 no-print">
            <button type="button" class="btn btn-primary " id="imprimer">Imprimer</button>
        </div>
    </div>
</section>

<script src="public/assets/js/print.js"></script>