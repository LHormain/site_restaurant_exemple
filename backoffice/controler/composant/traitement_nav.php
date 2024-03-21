<?php
// récupération du nombre de massage non lue
$donnees = req_message_non_lu($bdd);

$nbr_contact = $donnees['nbr_messages'];

// récupération du nombre de devis en attente de traitement.
$donnees = req_devis_en_attente($bdd);
$nbr_devis = $donnees['nbr_devis'];

?>