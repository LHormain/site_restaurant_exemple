<?php
// supprimer un admin 
// empecher supression de superadmin
if (isset($_GET['sup']) && $_GET['sup'] != NULL) {
    $id_utilisateur = intval($_GET['sup']);
    
    req_sup_admin($bdd,$id_utilisateur);
}

if(isset($_GET['ordre']) && $_GET['ordre'] != NULL) {
    $ordre = intval($_GET['ordre']);
    if ($ordre == 2) {
        $req_ordre = 'ORDER BY nom_utilisateur';
    }
    else {
        $req_ordre = 'ORDER BY identifiant_utilisateur';
    }
}
else {
    $req_ordre = 'ORDER BY identifiant_utilisateur';
}

    // affiche tous les admins

    $sortie = req_admins($bdd,$req_ordre);
    $admin = $sortie[1];
    $admins = $sortie[0];

    $table = '';
    $table .= table_admins_gestion($admin);
    foreach ($admins as $donnees) {
        $table .= table_admins_gestion($donnees);
    }

?>