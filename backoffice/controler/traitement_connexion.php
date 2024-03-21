<?php
include('modele/connexion_bdd.php');

$pwd = $_POST['pwd'];
$username = htmlspecialchars($_POST['username']);

// liste des administrateurs autorisés
$requete = "SELECT * FROM utilisateurs WHERE mail_utilisateur = :username AND (id_cat_utilisateur = 1 OR id_cat_utilisateur = 3)";
$req = $bdd -> prepare($requete);
$req -> bindValue(':username', $username, PDO::PARAM_STR);
$req -> execute();

$user = $req -> fetch();
$compte = $req -> rowCount();

$requete = "SELECT * FROM administrateurs WHERE mail_utilisateur = :username";
$req = $bdd -> prepare($requete);
$req -> bindValue(':username', $username, PDO::PARAM_STR);
$req -> execute();

$admin = $req -> fetch();
$compte2 = $req -> rowCount();

if ( $compte != 0) {

    if (password_verify($pwd, $user['mdp_utilisateur'])) {
        $_SESSION['connexion'] = 1;
        header("location:index.php");
    }
    else {
        // le mot de passe est faux
        header("location:index.php?page=1");
    }
}
elseif ($compte2 != 0) {
    if (password_verify($pwd, $admin['mdp_utilisateur'])) {
        $_SESSION['connexion'] = 2;
        header("location:index.php");
    }
    else {
        // le mot de passe est faux
        header("location:index.php?page=1");
    }
}
else {
    header("location:index.php");
}

?>