<?php
$mdp_taille_mini = 5;

if (isset($_GET['id']) && $_GET['id'] != NULL) {
    // récupération des données pour un update
    $titre = 'Modification ';
    $message_page_courante = 'Vous pourvez réinitialiser le mot de passe de l\'admin ici';
    $id_utilisateur = intval($_GET['id']);

    $donnees = req_admin($bdd, $id_utilisateur);

    $nom_utilisateur = $donnees['nom_utilisateur'];
    $prenom_utilisateur = $donnees['prenom_utilisateur'];
    $mail_utilisateur = $donnees['mail_utilisateur'];
    $tel_utilisateur = $donnees['tel_utilisateur'];
}
else {
    $titre = 'Saisie';
    $message_page_courante = 'Formulaire d\'inscription';
    $nom_utilisateur = '';
    $prenom_utilisateur = '';
    $mail_utilisateur = '';
    $tel_utilisateur = '';
}
$mdp_utilisateur = '';
$mdp_check = '';

//---------------------------------------------------------------
//                 traitement de l'inscription
//---------------------------------------------------------------
if (isset($_POST['nom_utilisateur'],
          $_POST['prenom_utilisateur'],
          $_POST['mail_utilisateur'],
          $_POST['tel_utilisateur'],
          $_POST['mdp_utilisateur'],
          $_POST['mdp_check']
) 
&& $_POST['nom_utilisateur'] != NULL 
&& $_POST['prenom_utilisateur'] != NULL 
&& $_POST['mail_utilisateur'] != NULL 
&& $_POST['tel_utilisateur'] != NULL 
&& $_POST['mdp_utilisateur'] != NULL 
&& $_POST['mdp_check'] != NULL 
) {
    $identifiant_utilisateur = time(); 

    $nom_utilisateur = htmlspecialchars($_POST['nom_utilisateur']);
    $prenom_utilisateur = htmlspecialchars($_POST['prenom_utilisateur']);
    $mail_utilisateur = htmlspecialchars($_POST['mail_utilisateur']);
    $tel_utilisateur = htmlspecialchars($_POST['tel_utilisateur']);
    $mdp_utilisateur = $_POST['mdp_utilisateur']; //
    $mdp_check = $_POST['mdp_check'];

    if (isset($_GET['id']) && $_GET['id']) {
        //update
        $mdp_hash = password_hash($mdp_utilisateur, PASSWORD_DEFAULT );

        if ($mdp_utilisateur == $mdp_check 
        && $mdp_utilisateur >= $mdp_taille_mini
        && preg_match('#^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W)#', $mdp_utilisateur) 
        ) {
            req_update_admins($bdd,$id_utilisateur,$nom_utilisateur,$prenom_utilisateur,$mail_utilisateur,$tel_utilisateur,$mdp_hash);

            $message_page_courante = 'L\'admin a été mis à jour';
        }
        else {
            $message_page_courante = 'Vous devez entrer deux fois le même mot de passe.';
        }
    }
    else {
                   
        //insert
        // tester si mail_utilisateur est unique

        $test_username = req_admin_v2($bdd, $mail_utilisateur);

        if (!isset($test_username['mail_utilisateur'])) {

            // tester le mdp et le traiter si ok passe à la suite
            $mdp_hash = password_hash($mdp_utilisateur, PASSWORD_DEFAULT );

            if ($mdp_utilisateur == $mdp_check 
            && $mdp_utilisateur >= $mdp_taille_mini
            && preg_match('#^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W)#', $mdp_utilisateur) 
            ) {

                req_insert_admins($bdd,$identifiant_utilisateur,$nom_utilisateur,$prenom_utilisateur,$mail_utilisateur,$tel_utilisateur,$mdp_hash);
            
                $message_page_courante = 'L\'admin a été correctement créé.';
            }
            else {
                $message_page_courante = 'Vous devez entrer deux fois le même mot de passe.';
            }
        }
        else {
            $message_page_courante = 'Cette adresse existe déjà. Veuillez en choisir une autre.';
        }
    }

}
?>