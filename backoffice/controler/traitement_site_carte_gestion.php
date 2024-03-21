<?php
// DELETE
if (isset($_GET['sup'])
&& $_GET['sup'] != NULL) {
    $id_assiette = intval($_GET['sup']);

    req_sup_assiette($bdd,$id_assiette);

}

// pour classement
if (isset($_GET['ordre']) && $_GET['ordre'] != NULL) {
    $ordre = intval($_GET['ordre']);

    if ($ordre == 1) {
        $req_ordre = 'ORDER BY assiettes.nom_assiette';
    }
    elseif ($ordre == 2) {
        $req_ordre = 'ORDER BY assiettes.id_cat';
    }
    else {
        $req_ordre = 'ORDER BY assiettes.id_cat';
    }
}
else {
    $req_ordre = 'ORDER BY assiettes.id_cat';
}

// récupération des données de la BDD
    $req_where = "WHERE assiettes.id_cat < 4 ";

    $assiettes = req_assiettes($bdd,$req_where,$req_ordre);

    $table = '';
    foreach ($assiettes as $donnees) {
        $dans_menu = dans_menu($bdd,$donnees['id_assiette']);
        $table .= table_carte_gestion($donnees['nom_assiette'],$donnees['liste_ingredients_assiette'],$donnees['prix_assiette'],$donnees['nom_categorie'],$donnees['afficher_assiette'],$donnees['id_assiette'], $dans_menu);
    }
?>