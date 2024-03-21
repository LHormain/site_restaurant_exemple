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
if (isset($_POST['ordre_affichage_image'],
          $_POST['id_image']) 
          && $_POST['ordre_affichage_image'] != NULL
          && $_POST['id_image'] != NULL
    ) {
    $ordre_affichage_image = intval($_POST['ordre_affichage_image']);
    $id_image = intval($_POST['id_image']);
}
else {
    $ordre_affichage_image = 0;
    $id_image = 0;
}

// // cherche le produit
$requete = "SELECT * FROM images WHERE id_image = :id_image1";
$req = $bdd->prepare($requete);
$req -> bindValue(':id_image1', $id_image, PDO::PARAM_INT);
$req -> execute();
$image = $req -> fetch();

//cherche si position deja affecter pour le produit
$requete = "SELECT * FROM images 
            WHERE id_cat = :id_cat AND ordre_affichage_image = :ordre_affichage_image";
$req = $bdd->prepare($requete);
$req->bindValue(':id_cat', $image['id_cat'], PDO::PARAM_INT);
$req->bindValue(':ordre_affichage_image', $ordre_affichage_image, PDO::PARAM_INT);
$req -> execute();

$double = $req -> fetch();
$test = $req -> rowCount();

if ($test != 0) {
    // si la position est deja prise affecte l'ancienne position de l'image 1 à l'image trouvé
    $requete = "UPDATE `images`
                SET ordre_affichage_image = :ordre_affichage_image
                WHERE id_image = :id_image2
                    "; 
    $req = $bdd->prepare($requete);
    $req->bindValue(':id_image2', $double['id_image'], PDO::PARAM_INT);
    $req->bindValue(':ordre_affichage_image', $image['ordre_affichage_image'], PDO::PARAM_INT);
    $req -> execute();
}
// recuperation de sous cat dans la bdd 
$requete = "UPDATE `images`
            SET ordre_affichage_image = :ordre_affichage_image
            WHERE id_image = :id_image
                "; 
$req4 = $bdd->prepare($requete);
$req4->bindValue(':id_image', $id_image, PDO::PARAM_INT);
$req4->bindValue(':ordre_affichage_image', $ordre_affichage_image, PDO::PARAM_INT);
$req4 -> execute();

$tableau_donnees = json_encode($req4->fetchAll());
echo $tableau_donnees;
?>