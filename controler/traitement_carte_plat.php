<?php
// images
$donnees = req_images_carte($bdd,2,2);

$i = 0;
foreach ($donnees as $ligne) {
    $nom_img[$i] = $ligne['nom_image'];
    $i++;
}

// les entrées
$donnees = req_assiettes($bdd,2);
$carte = '';
foreach ($donnees as $ligne) {
    $carte .= card_plat($ligne['nom_assiette'], $ligne['liste_ingredients_assiette'], $ligne['prix_assiette']);
}
?>