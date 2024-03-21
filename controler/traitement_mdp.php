<?php
// utiliser pour connexion et devis
function verification_mdp($id_utilisateur, $mdp) {
    $user = 'root';
    $pass = '';

    try {
        $bdd = new PDO('mysql:host=localhost;dbname=restaurant',$user,$pass); // concerne la base
    }
    catch(PDOException $e) {
        die('Erreur : '.$e->getMessage());
    }

    $requete = "SELECT mdp_utilisateur FROM utilisateurs WHERE id_utilisateur = $id_utilisateur";

    $req_mdp = $bdd->prepare($requete);
    $req_mdp -> execute();
    $test = $req_mdp -> fetch();
    return password_verify($mdp, $test['mdp_utilisateur']);
}

?>