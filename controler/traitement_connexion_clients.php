<?php
$texte_page_courante = '';
// -----------------------------------------------------------
//                traitement de la connexion
// -----------------------------------------------------------
if (isset($_POST['pwd'], $_POST['mail_utilisateur']) && $_POST['pwd'] != NULL && $_POST['mail_utilisateur']) {
    // action de connection

    $pwd = $_POST['pwd'];
    $mail_utilisateur = htmlspecialchars($_POST['mail_utilisateur']);
    
    //----------------------------------------------------------------------------
    //                              connexion
    //----------------------------------------------------------------------------
    $donnees = req_utilisateur($bdd,$mail_utilisateur);
    $user = $donnees[0];
    $compte = $donnees[1];

    if ($compte != 0) {
        if (verification_mdp($bdd,$user['id_utilisateur'], $pwd)) {
        // if (password_verify($pwd, $user['mdp_utilisateur'])) {
            $_SESSION['id_client'] = $user['identifiant_utilisateur']; 
            // header("location:index.php?page=5");
            ?>
            <script>
                // force le rechargement de la page
                window.location.assign("index.php?page=5");
            </script>
            <?php
        }
        else {
            $texte_page_courante = '<p style="color: red;">Identifiant ou mot de passe incorrecte</p>';
        }
    }
    else {
        $texte_page_courante = '<p style="color: red;">Utilisateur inconnu</p>';
    }

} 
else {
    // action pas de connection
    // header("location:index.php?page=5");
}


?>