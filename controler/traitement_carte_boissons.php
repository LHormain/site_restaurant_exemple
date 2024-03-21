<?php
// softs
$donnees1 = req_assiettes($bdd,4);

$table1 = '';
foreach ($donnees1 as $ligne) {
    $table1 .= card_boisson($ligne['nom_assiette'], $ligne['liste_ingredients_assiette'], $ligne['prix_assiette']);
}
// alcool
$donnees3 = req_assiettes($bdd,5);

$table3 = '';
foreach ($donnees3 as $ligne) {
    $table3 .= card_boisson($ligne['nom_assiette'], $ligne['liste_ingredients_assiette'], $ligne['prix_assiette']);
}
// chaud
$donnees2 = req_assiettes($bdd,6);

$table2 = '';
foreach ($donnees2 as $ligne) {
    $table2 .= card_boisson($ligne['nom_assiette'], $ligne['liste_ingredients_assiette'], $ligne['prix_assiette']);
}
// apéro
$donnees4 = req_assiettes($bdd,7);

$table4 = '';
foreach ($donnees4 as $ligne) {
    $table4 .= card_boisson($ligne['nom_assiette'], $ligne['liste_ingredients_assiette'], $ligne['prix_assiette']);
}
?>