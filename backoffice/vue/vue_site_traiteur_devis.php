<?php
include('controler/traitement_site_traiteur_devis.php');
?>

<div class="col-12">
    <div class="row">
        <div class=" col-7 mb-5 " >
            <img src="../public/assets/img/illustration_site/logo2.png" alt="" class="img-fluid logo imprimer "> 
            <p class="entreprise imprimer">Chez Roger</p>
            <p class="imprimer"><?php echo $site_adresse; ?></p>
            <p class="imprimer"><?php echo $site_tel; ?></p>
            <p class="imprimer"><a href="index.php?page=4"><?php echo $site_mail; ?></a></p>
        </div>
        <div class="col-5 mb-5 pt-5">
            <h2 class="mt-5">Devis n° : <?php echo $donnees['id_devis']; ?></h2>
            <p class="imprimer">Paris, le <?php echo date('d-m-Y', $donnees['date_creation_devis']); ?></p>
        </div>
        <div class="  col-7">
            <p><strong>Nom client : </strong><?php echo $donnees['prenom_utilisateur']; ?> <?php echo $donnees['nom_utilisateur']; ?></p>
            <p><strong>Mail : </strong><?php echo $donnees['mail_utilisateur']; ?></p>
            <p><strong>Téléphone : </strong><?php echo $donnees['tel_utilisateur']; ?></p>
        </div>
        <div class="col-5">
            <p class="no-print"><strong>Date de création du devis : </strong><?php echo date('Y-m-d',$donnees['date_creation_devis']); ?></p>
            <p class="<?php if (date_verification($bdd,$donnees['date_evenement_devis'], $donnees['id_devis'])) { echo 'reservation';} ?>"><strong>Date de l'événement : </strong><?php echo date('Y-m-d',$donnees['date_evenement_devis']); ?></p>
            <p><strong>Type d'événement : </strong><?php echo $donnees['type_evenement_devis']; ?></p>
            <p class="<?php if (capacite_max_depasser($donnees['nbr_personnes_devis'])) { echo 'max_capacite';} ?>"><strong>Nombre de personne : </strong><?php echo $donnees['nbr_personnes_devis']; ?></p>
        </div>
    </div>

    <div class="table-responsive mb-5  col-12">
        <table class="table table-primary ">
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
                    <td class="text-end"><strong>Total HT : </strong></td>
                    <td><?php echo devis($donnees); ?> </td>
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
    
    <p class="mb-5 no-print"><strong>Informations complémentaires : </strong><?php echo $donnees['message_devis']; ?></p>
    <div class="mb-3 row no-print">
        <label  class="form-label col-2"><strong>État d'avancement du projet : </strong></label>
        <div class="col-4">
            <select class="form-select form-select-lg py-1" name="etat_devis" id="etat_devis" >
                <?php echo $options_select; ?>
            </select>
        </div>
        <button type="button" class="btn btn-primary col-1" id="modif_etat" onclick="updateSelect(<?php echo $donnees['id_devis'];?>,etat_devis, message)">modifier</button>
        <div id="message" class="col-4 align-middle"></div>
    </div>

    <!-- <a role="button " href="index.php?page=345&id=<?php echo $donnees['id_utilisateur']; ?>&c=1" class="btn btn-primary no-print">Répondre au client</a> -->
    <a role="button " href="mailto:<?php echo $donnees['mail_utilisateur']; ?>?subject=Chez%20Roger%20votre%20devis" class="btn btn-primary no-print">Répondre au client</a>
    <button class="btn btn-primary no-print" id="imprimer" role="button">Imprimer un devis</button> <!-- imprime ou génère un pdf à voir -->
    <a  class="btn btn-primary no-print" href="index.php?page=4&c=1" role="button">Retour à la liste des devis</a>
</div>


<script src="public/asset/js/update_etat_devis.js"></script>
<script src="../public/assets/js/print.js"></script>