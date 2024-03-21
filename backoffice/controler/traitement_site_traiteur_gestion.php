<?php
// DELETE
if (isset($_GET['sup'])
&& $_GET['sup'] != NULL) {
    $id_menu = intval($_GET['sup']);

    req_sup_menu($bdd, $id_menu);
}

// récupération des données de la BDD 
    $req_where = "WHERE  menus.nom_menu != 'Menu du jour' ";

    $menus =req_menus($bdd, $req_where);

    $table = '';
    foreach ($menus as $donnees) {
        $a_img_g = a_image($bdd,$donnees['id_menu'],'0');
        $a_img_d = a_image($bdd,$donnees['id_menu'],'1');

        $nom_img_g = trouve_nom_image($bdd,$a_img_g, $donnees['id_menu'], '0');
        $nom_img_d = trouve_nom_image($bdd,$a_img_d, $donnees['id_menu'], '1');

        $nom_entree = trouve_nom_assiette($bdd,1, $donnees['id_menu']);
        $nom_plat = trouve_nom_assiette($bdd,2, $donnees['id_menu']);
        $nom_dessert = trouve_nom_assiette($bdd,3, $donnees['id_menu']);

        $table .= table_traiteur_gestion_menu($nom_entree, $nom_plat, $nom_dessert, $donnees['id_menu'], $donnees['afficher_menu'], $a_img_g, $a_img_d, $nom_img_g, $nom_img_d, $donnees['nom_menu'], $donnees['prix_menu']);
    }
?>