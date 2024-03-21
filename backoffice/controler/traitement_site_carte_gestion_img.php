<?php
// DELETE
if (isset($_GET['sup'])
&& $_GET['sup'] != NULL) {
    $id_image = intval($_GET['sup']);

    req_sup_img_carte($bdd,$id_image);
}

// récupération des données de la BDD
    $images = req_images($bdd);

    $table = '';
    foreach ($images as $donnees) {
        $table .= table_image_gestion($donnees['nom_image'],$donnees['nom_categorie'],$donnees['id_image'],$donnees['ordre_affichage_image'],$donnees['afficher_image']);
    }
?>