<?php
if (isset($_GET['id']) && $_GET['id'] != NULL) {

    $id_message = htmlspecialchars($_GET['id']);

    // update le statu du message en lue
    req_lu($bdd,$id_message);

    // récupère le message pour affichage
    $donnees = req_message($bdd,$id_message);


}

?>