<?php

//-------------------------------------------------------------
//                  suppression
//-------------------------------------------------------------
// "suppression" d'un client et de tous les devis associés
if (isset($_GET['sup']) && $_GET['sup'] != NULL) {
    $id_utilisateur = intval($_GET['sup']);
    
    req_sup_utilisateur($bdd, $id_utilisateur);
}
// réactivation du compte
if (isset($_GET['add']) && $_GET['add'] != NULL) {
    $id_utilisateur = intval($_GET['add']);
    req_reactive_user($bdd, $id_utilisateur);
}

// ------------------------------------------
//                  affichage
// ------------------------------------------

// purge client inactif depuis plus de 2 ans 
// req_purge($bdd);

// choix ordre affichage
if(isset($_GET['ordre']) && $_GET['ordre'] != NULL) {
    $ordre = intval($_GET['ordre']);
    if ($ordre == 1) {
        $req_ordre = 'ORDER BY identifiant_utilisateur';
    }
    elseif ($ordre == 2) {
        $req_ordre = 'ORDER BY nom_utilisateur';
    }
    else {
        $req_ordre = 'ORDER BY identifiant_utilisateur';
    }
}
else {
    $req_ordre = 'ORDER BY identifiant_utilisateur';
}

if (isset($_GET['id']) && $_GET['id'] != NULL) {
    // n'affiche que le client sélectionner dans la catégorie devis
    $id_utilisateur = htmlspecialchars($_GET['id']);

    $donnees = req_utilisateur($bdd, $id_utilisateur);
    $table = '';
        $table .= table_clients_gestion($donnees);
}
else {
    // affiche tous les clients
    $clients = req_tout_clients($bdd,$req_ordre);

    $table = '';
    foreach ($clients as $donnees) {
        $table .= table_clients_gestion($donnees);
    }
}

?>