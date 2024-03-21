<?php


// si update de devis
if (isset($_GET['id']) && $_GET['id'] != NULL) {

    $id_devis = intval($_GET['id']);

    $devis = req_devis_pour_update($bdd,$id_devis);
        
    $nom_utilisateur = $devis['nom_utilisateur'];
    $prenom_utilisateur = $devis['prenom_utilisateur'];
    $mail_utilisateur = $devis['mail_utilisateur'];
    $tel_utilisateur = $devis['tel_utilisateur'];
    $type_evenement_devis = $devis['type_evenement_devis'];
    $type_repas_devis = $devis['type_repas_devis'];
    $nbr_personnes_devis = $devis['nbr_personnes_devis'];
    $date_evenement_devis = date('Y-m-d',$devis['date_evenement_devis']);
    $message_devis = $devis['message_devis'];
}
else {
    $id_devis = '';
    $nom_utilisateur = '';
    $prenom_utilisateur = '';
    $mail_utilisateur = '';
    $tel_utilisateur = '';
    $type_evenement_devis = '';
    $type_repas_devis = '';
    $nbr_personnes_devis = '';
    $date_evenement_devis = '';
    $message_devis = '';

}
// récupération des données si l'utilisateur est connecté
if (isset($_SESSION['id_client'])) {
    $identifiant_utilisateur = $_SESSION['id_client'];
    
    $donnees = req_utilisateur_V3($bdd,$identifiant_utilisateur); 

    $nom_utilisateur = $donnees['nom_utilisateur'];
    $prenom_utilisateur = $donnees['prenom_utilisateur'];
    $mail_utilisateur = $donnees['mail_utilisateur'];
    $tel_utilisateur = $donnees['tel_utilisateur'];
}

$message_page_courante = '';
$mdp_taille_mini = 5;


//------------------------------------------------------------------------
//                     enregistrement du devis
//------------------------------------------------------------------------
if (isset($_POST['nom_utilisateur'],
          $_POST['prenom_utilisateur'],
          $_POST['mail_utilisateur'],
          $_POST['tel_utilisateur'],
          $_POST['type_evenement_devis'],
          $_POST['type_repas_devis'],
          $_POST['nbr_personnes_devis'],
          $_POST['date_evenement_devis']
) 
&& $_POST['nom_utilisateur'] != NULL
&& $_POST['prenom_utilisateur'] != NULL
&& $_POST['mail_utilisateur'] != NULL
&& $_POST['tel_utilisateur'] != NULL
&& $_POST['type_evenement_devis'] != NULL
&& $_POST['type_repas_devis'] != NULL
&& $_POST['nbr_personnes_devis'] != NULL
&& $_POST['date_evenement_devis'] != NULL
) {
    $date_creation_devis = time();

    $nom_utilisateur = htmlspecialchars($_POST['nom_utilisateur']);
    $prenom_utilisateur = htmlspecialchars($_POST['prenom_utilisateur']);
    $mail_utilisateur = htmlspecialchars($_POST['mail_utilisateur']);
    $tel_utilisateur = htmlspecialchars($_POST['tel_utilisateur']);
    $type_evenement_devis = htmlspecialchars($_POST['type_evenement_devis']);
    $type_repas_devis = htmlspecialchars($_POST['type_repas_devis']);
    $nbr_personnes_devis = htmlspecialchars($_POST['nbr_personnes_devis']);
    $date_evenement_devis = strtotime(htmlspecialchars($_POST['date_evenement_devis']));
    
    if (isset($_POST['message_devis']) && $_POST['message_devis'] != NULL) {
        $message_devis = htmlspecialchars($_POST['message_devis']);
    }
    else {
        $message_devis = 'Aucun message';
    }

    //------------------------------------
    // récupération de l'id_utilisateur
    //------------------------------------
    if (isset($_SESSION['id_client']) && $_POST['message_devis'] != NULL) {
        // si utilisateur connecté
        $id_utilisateur = $donnees['id_utilisateur'];

        // limitation à un seul devis en cours ou en attente de traitement
        si_existe_devis($bdd,$id_utilisateur,$id_devis);
    }
    else {
        // sinon crée un compte ou connecte 
        if(isset($_POST['mdp_utilisateur'],
                 $_POST['mdp_check'])
        && $_POST['mdp_utilisateur'] != NULL 
        && $_POST['mdp_check'] != NULL
        ) {
            $mdp_utilisateur = $_POST['mdp_utilisateur']; //
            $mdp_check = $_POST['mdp_check'];
            
            // tester si mail_utilisateur est unique
            
            $test_username = req_utilisateur($bdd,$mail_utilisateur);
            
            if (!isset($test_username['id_utilisateur'])) {
                // création de compte
                $identifiant_utilisateur = time();
                // tester le mdp et le traiter si ok passe à la suite
                $mdp_hash = password_hash($mdp_utilisateur, PASSWORD_DEFAULT );

                if ($mdp_utilisateur == $mdp_check 
                && $mdp_utilisateur >= $mdp_taille_mini
                && preg_match('#^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W)#', $mdp_utilisateur) 
                ) {
                
                    req_insert_client($bdd,$identifiant_utilisateur,$nom_utilisateur,$prenom_utilisateur,$mail_utilisateur,$tel_utilisateur,$mdp_hash);

                    $message_page_courante = 'Votre compte a été correctement créé.<br> Bienvenue Chez Roger<br>';
                    // connecté si viens de s'inscrire
                    $_SESSION['id_client'] = $identifiant_utilisateur;

                    // récupération de l'id_utilisateur

                    $temp = req_utilisateur_V3($bdd,$identifiant_utilisateur);
                    $id_utilisateur = $temp['id_utilisateur'];
                }
                else {
                    $message_page_courante = 'Vous devez entrer deux fois le même mot de passe.';
                }
            }
            else {
                // vérifie la combinaison mail mot de passe pour connecter l'utilisateur
                if (verification_mdp($bdd,$test_username['id_utilisateur'], $mdp_utilisateur)) {
                // if (password_verify($mdp_utilisateur, $test_username['mdp_utilisateur'])) {
                    $_SESSION['id_client'] = $test_username['identifiant_utilisateur'];
                    $id_utilisateur = $test_username['id_utilisateur'];

                    // limitation à un seul devis en cours ou en attente de traitement
                    si_existe_devis($bdd,$id_utilisateur);
                }
                else {
                    $message_page_courante = 'Vous avez déjà un compte sur chez Roger. Veuillez vous connecter.';
                }
            }
        }
    }
    //----------------------------------------------------------------------------
    // entrer les données dans la table devis seulement si id_utilisateur existe
    //----------------------------------------------------------------------------
    if (isset($id_utilisateur)) {
        if (isset($_GET['id']) && $_GET['id'] != NULL) {
            //update
            req_update_devis($bdd,$id_devis,$type_evenement_devis,$type_repas_devis,$nbr_personnes_devis,$date_evenement_devis,$message_devis,$date_creation_devis);
        }
        else {
            //insert
            req_insert_devis($bdd,$id_utilisateur,$type_evenement_devis,$type_repas_devis,$nbr_personnes_devis,$date_evenement_devis,$message_devis,$date_creation_devis);
        }

        // envoie un mail sur la boite mail du restaurant pour signaler qu'un nouveau devis à été déposer
        $headers = 'From: '.$mail_utilisateur."\r\n";
        $headers .= "X-Mailer: PHP/".phpversion()."\r\n" ;
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-type: text/html; charset=UTF-8\r\n";
        $headers .= "Content-Transfer-Encoding: 8bit\r\n\r\n";

        $message = '
        <table>
            <tr>
                <td>
                    Vous avez reçu une nouvelle demande de devis de '.$prenom_utilisateur.' '.$nom_utilisateur.'.
                    <br>
                    le '.date('d-m-Y à H:i',time()).'
                </td>
            </tr>

        </table>
        ';

        // fonction mail basique
        // mail($site_mail, $sujet_message, $message, $headers);
        
        //// provisoire en attendant d'envoyer mail
        $file = '../test_demande_devis.html';
        $current = file_get_contents($file);
        $current = $headers;
        $current .= $sujet_message;
        $current .= $message;
        file_put_contents($file, $current);
        /// fin test
    
        $message_page_courante .= 'Votre devis a bien été enregistré. Notre équipe vous contactera dans les plus brefs délais pour discuter de votre événement.';
    }
}
else {

    if (isset($_POST) && $_POST != NULL) {
        $message_page_courante = 'Une erreur est survenue. Vérifiez que tous les champs sont correctement remplie.';
        //----------------------------------------------
        // récupère données pour ne pas tout retaper
        //----------------------------------------------
        $nom_utilisateur = $_POST['nom_utilisateur'];
        $prenom_utilisateur = $_POST['prenom_utilisateur'];
        $mail_utilisateur = $_POST['mail_utilisateur'];
        $tel_utilisateur = $_POST['tel_utilisateur'];
        $type_evenement_devis = $_POST['type_evenement_devis'];
        $type_repas_devis = $_POST['type_repas_devis'];
        $nbr_personnes_devis = $_POST['nbr_personnes_devis'];
        $date_evenement_devis = $_POST['date_evenement_devis'];
        $message_devis = $_POST['message_devis'];
    }
}
?>