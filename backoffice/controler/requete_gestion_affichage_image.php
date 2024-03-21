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
if (isset($_POST['afficher_image'],
          $_POST['id_image']) 
          && $_POST['afficher_image'] != NULL
          && $_POST['id_image'] != NULL
    ) {
    $afficher_image = intval($_POST['afficher_image']);
    $id_image = intval($_POST['id_image']);

    if ($afficher_image == 1) {
        $afficher_image = 0;
    }
    else {
        $afficher_image = 1;
    }
}
else {
    $afficher_image = 0;
    $id_image = 0;
}
// recuperation de sous cat dans la bdd 
$requete = "UPDATE `images` SET afficher_image = :afficher_image WHERE id_image = :id_image";
$req = $bdd->prepare($requete);
$req->bindValue(':id_image', $id_image, PDO::PARAM_INT);
$req->bindValue(':afficher_image', $afficher_image, PDO::PARAM_INT);
$req -> execute();

$requete = "SELECT * FROM images WHERE id_image = :id_image";
$req = $bdd->prepare($requete);
$req->bindValue(':id_image', $id_image, PDO::PARAM_INT);
$req -> execute();

$tableau_donnees = json_encode($req->fetchAll());
echo $tableau_donnees;
?>