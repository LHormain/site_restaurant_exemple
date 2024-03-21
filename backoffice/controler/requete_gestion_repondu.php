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
if (isset($_POST['repondu_message'],
          $_POST['id_message']) 
          && $_POST['repondu_message'] != NULL
          && $_POST['id_message'] != NULL
    ) {
    $repondu_message = intval($_POST['repondu_message']);
    $id_message = intval($_POST['id_message']);

    if ($repondu_message == 1) {
        $repondu_message = 0;
    }
    else {
        $repondu_message = 1;
    }
}
else {
    $repondu_message = 0;
    $id_message = 0;
}
// recuperation de sous cat dans la bdd 
$requete = "UPDATE `messages` SET repondu_message = :repondu_message WHERE id_message = :id_message";
$req = $bdd->prepare($requete);
$req->bindValue(':id_message', $id_message, PDO::PARAM_INT);
$req->bindValue(':repondu_message', $repondu_message, PDO::PARAM_INT);
$req -> execute();

$requete = "SELECT * FROM messages WHERE id_message = :id_message";
$req = $bdd->prepare($requete);
$req->bindValue(':id_message', $id_message, PDO::PARAM_INT);
$req -> execute();

$tableau_donnees = json_encode($req->fetchAll());
echo $tableau_donnees;
?>