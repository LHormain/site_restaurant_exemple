<?php
$user = 'root';
$pass = '';

try {
    $bdd = new PDO('mysql:host=localhost;dbname=restaurant',$user,$pass); // concerne la base
}
catch(PDOException $e) {
    die('Erreur : '.$e->getMessage());
}


// récupération des catégories 
if (isset($_POST['afficher_assiette'],
          $_POST['id_assiette']) 
          && $_POST['afficher_assiette'] != NULL
          && $_POST['id_assiette'] != NULL
    ) {
    $afficher_assiette = intval($_POST['afficher_assiette']);
    $id_assiette = intval($_POST['id_assiette']);

    if ($afficher_assiette == 1) {
        $afficher_assiette = 0;
    }
    else {
        $afficher_assiette = 1;
    }
}
else {
    $afficher_assiette = 0;
    $id_assiette = 0;
}
// recuperation de sous cat dans la bdd 
$requete = "UPDATE `assiettes` SET afficher_assiette = :afficher_assiette WHERE id_assiette = :id_assiette";
$req = $bdd->prepare($requete);
$req->bindValue(':id_assiette', $id_assiette, PDO::PARAM_INT);
$req->bindValue(':afficher_assiette', $afficher_assiette, PDO::PARAM_INT);
$req -> execute();

$requete = "SELECT * FROM assiettes WHERE id_assiette = :id_assiette";
$req = $bdd->prepare($requete);
$req->bindValue(':id_assiette', $id_assiette, PDO::PARAM_INT);
$req -> execute();

$tableau_donnees = json_encode($req->fetchAll());
echo $tableau_donnees;
?>