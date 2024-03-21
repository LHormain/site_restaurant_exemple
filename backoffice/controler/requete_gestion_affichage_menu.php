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
if (isset($_POST['afficher_menu'],
          $_POST['id_menu']) 
          && $_POST['afficher_menu'] != NULL
          && $_POST['id_menu'] != NULL
    ) {
    $afficher_menu = intval($_POST['afficher_menu']);
    $id_menu = intval($_POST['id_menu']);

    if ($afficher_menu == 1) {
        $afficher_menu = 0;
    }
    else {
        $afficher_menu = 1;
    }
}
else {
    $afficher_menu = 0;
    $id_menu = 0;
}
// recuperation de sous cat dans la bdd 
$requete = "UPDATE `menus` SET afficher_menu = :afficher_menu WHERE id_menu = :id_menu";
$req = $bdd->prepare($requete);
$req->bindValue(':id_menu', $id_menu, PDO::PARAM_INT);
$req->bindValue(':afficher_menu', $afficher_menu, PDO::PARAM_INT);
$req -> execute();

$requete = "SELECT * FROM menus WHERE id_menu = :id_menu";
$req = $bdd->prepare($requete);
$req->bindValue(':id_menu', $id_menu, PDO::PARAM_INT);
$req -> execute();

$tableau_donnees = json_encode($req->fetchAll());
echo $tableau_donnees;
?>