<?php

$menus = req_menu($bdd,'!=');

$sortie = '';
foreach ($menus as $donnees) {
    $id_menu = $donnees['id_menu'];
    $nom_menu = $donnees['nom_menu'];
    $prix = $donnees['prix_menu'];

    $nom_img_g = trouve_nom_image($bdd,a_image($bdd,$donnees['id_menu'], 0), $donnees['id_menu'], 0); //gauche
    $nom_img_d = trouve_nom_image($bdd,a_image($bdd,$donnees['id_menu'], 1), $donnees['id_menu'], 1); //droite

    $entree = trouve_nom_assiette($bdd,1, $donnees['id_menu']);
    $plat = trouve_nom_assiette($bdd,2, $donnees['id_menu']);
    $dessert = trouve_nom_assiette($bdd,3, $donnees['id_menu']);

    $nom_entre = $entree['nom_assiette'];
    $nom_plat = $plat['nom_assiette'];
    $nom_dessert = $dessert['nom_assiette'];
    $ingr_entree = $entree['liste_ingredients_assiette'];
    $ingr_plat = $plat['liste_ingredients_assiette'];
    $ingr_dessert = $dessert['liste_ingredients_assiette'];

    $sortie .= menu_entreprise($id_menu,$nom_menu, $prix, $nom_img_g, $nom_img_d, $nom_entre, $ingr_entree, $nom_plat, $ingr_plat, $nom_dessert, $ingr_dessert);
}
?>