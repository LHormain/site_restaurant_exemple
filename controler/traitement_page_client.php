<?php
// effacer un devis 
if (isset($_GET['sup']) && $_GET['sup'] != NULL) {
    $id_devis = intval($_GET['sup']);

    req_sup_devis($bdd,$id_devis);
}


// chargement
$identifiant_utilisateur = $_SESSION['id_client'];

$donnees = req_utilisateur_V3($bdd,$identifiant_utilisateur);

$donnees2 = req_all_devis($bdd,$donnees['id_utilisateur']);

$table_devis = '';
foreach ($donnees2 as $ligne) {
    $table_devis .= table_devis($ligne);
}

// test pour savoir si peut faire nouveau devis
$test = req_test_devis($bdd,$donnees['id_utilisateur']);

?>