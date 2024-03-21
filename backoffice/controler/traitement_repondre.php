<?php
$texte_page_courante ='';
$date = time();
include('../site.php');

// récupération des infos du client à qui on envoie le message
if (isset($_GET['id'],$_GET['c'])
&& $_GET['id'] != NULL
&& $_GET['c'] != NULL
) {
    $id = htmlspecialchars($_GET['id']);
    $c = intval($_GET['c']);

    if ($c == 1) {
        // réponse à un devis
        $sujet = $site_nom.': Merci de nous avoir choisis ! Réponse à votre demande de devis';
        $devis = req_un_devis($bdd,$id);
        $user = req_utilisateur($bdd, $devis['id_utilisateur']);
        $mail = $user['mail_utilisateur'];

    }
    elseif ($c == 2) {
        // réponse à message contact
        $sujet = 'Suivi de votre demande - '.$site_nom.' vous répond';
        $contact = req_message($bdd,$id);
        $user = '';
        $mail = $contact['mail_message'];
    }
    elseif ($c == 3) {
        // envoie d'un message à un client
        $sujet = 'Découvrez les dernières actualités et saveurs chez '.$site_nom;
        $user = req_utilisateur($bdd, $id);
        $mail = $user['mail_utilisateur'];
    }
    elseif ($c == 4) {
        // envoie d'un message à un admin
        $sujet = 'Administration '.$site_nom;
        $user = req_utilisateur($bdd, $id);
        $mail = $user['mail_utilisateur'];
    }
    else {
        $sujet = '';
        $user = '';
    }

}
else {
    $sujet = '';
    $user = '';
    $mail = '';
}

// envoie du message
if (isset($_POST['message'])
&& $_POST['message'] != NULL
) {
    $message_form = htmlspecialchars($_POST['message']);

    $headers = 'From: '.$site_mail."\r\n";
    $headers .= "X-Mailer: PHP/".phpversion()."\r\n" ;
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-type: text/html; charset=UTF-8\r\n";
    $headers .= "Content-Transfer-Encoding: 8bit\r\n\r\n";

    $message = '<table><tr><td>Cher(e) ';
    if ($user != '') {
        $message .= $user['prenom_utilisateur'].' '.$user['nom_utilisateur'].'<br><br>';
    }
    else {
        $message .= 'client(e) <br><br>';
    }
    $message .= '</td></tr><tr><td>'.nl2br($message_form).'</td></tr>';
    $message .= '<tr><td>Cordialement,<br> L\'équipe '.$site_nom.'</td></tr>';

    // fonction mail basique
    // mail($mail, $sujet, $message, $headers);

    //// provisoire en attendant d'envoyer mail
    $file = '../../test_reponse_bo.html';
    $current = file_get_contents($file);
    $current = $headers;
    $current .= $sujet;
    $current .= $message;
    file_put_contents($file, $current);
    /// fin test

    //enregistrer le message dans une table réponse restaurant
    // créer une table message_reponses
    // colonnes : date (utiliser comme id et remplie avec un timestamp), id_entree (l'id pris en get), cat_reponse (le c pris en get), contenu, id_utilisateur(null si contact), cat_utilisateur (null si contact)
    // faire un insert

    $texte_page_courante = 'Message envoyé';
}
?>