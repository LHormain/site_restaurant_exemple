<?php
// pour classer
if(isset($_GET['ordre']) && $_GET['ordre'] != NULL) {
    $ordre = intval($_GET['ordre']);
    if ($ordre == 1) {
        $req_ordre = 'ORDER BY devis.date_creation_devis';
    }
    elseif ($ordre == 2) {
        $req_ordre = 'ORDER BY utilisateurs.nom_utilisateur';
    }
    elseif ($ordre == 3 ) {
        $req_ordre = 'ORDER BY devis.date_evenement_devis';
    }
    elseif ($ordre == 4 ) {
        $req_ordre = 'ORDER BY devis.id_etat';
    }
    else {
        $req_ordre = 'ORDER BY devis.date_creation_devis';
    }
}
else {
    $req_ordre = 'ORDER BY devis.date_creation_devis';
}

if (isset($_GET['id']) && $_GET['id'] != NULL) {
    // devis d'un utilisateur particulier
    $id_utilisateur = htmlspecialchars($_GET['id']);
    $req_where = "WHERE devis.id_utilisateur = :id_utilisateur ";
}
else {
    // tous les devis
    $id_utilisateur = '';
    $req_where = '';  
}

$devis = req_devis($bdd,$req_where,$req_ordre,$id_utilisateur);

$table_devis = '';
foreach ($devis as $donnees) {
    $table_devis .= table_traiteur_devis($donnees);
}
?>