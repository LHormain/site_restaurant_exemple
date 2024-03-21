<?php
include('controler/traitement_site_contact_lire.php');
?>

<div>
    <p><strong>Expediteur : </strong><?php echo $donnees['prenom_message'].' '.$donnees['nom_message']; ?></p>
    <p><strong>Sujet : </strong><?php echo $donnees['sujet_message']; ?></p>
    <p><?php echo $donnees['corps_message']; ?></p>
</div>
<div>
    <a  class="btn btn-primary" href="index.php?page=5&c=1" role="button">Retour à la page gestion</a>
    <!-- <a  class="btn btn-primary" href="index.php?page=345&id=<?php echo $donnees['id_message']; ?>&c=2" role="button" onclick="gestionAfficher(<?php echo $donnees['id_message']; ?>,<?php echo $donnees['repondu_message']; ?>)">Répondre</a> -->
    <a  class="btn btn-primary" href="mailto:<?php echo $donnees['mail_message']; ?>?subject=Chez%20Roger%20contact" role="button" onclick="gestionAfficher(<?php echo $donnees['id_message']; ?>,<?php echo $donnees['repondu_message']; ?>)">Répondre</a>
</div>

<script src="public/asset/js/gestion_repondu.js"></script>