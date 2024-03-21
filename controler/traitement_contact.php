<?php
$date_message = time();
$texte_page_courante = '';

if (isset($_POST['nom_message'],
          $_POST['prenom_message'],
          $_POST['mail_message'],
          $_POST['sujet_message'],
          $_POST['corps_message']
)
&& $_POST['nom_message'] != NULL
&& $_POST['prenom_message'] != NULL
&& $_POST['mail_message'] != NULL
&& $_POST['sujet_message'] != NULL
&& $_POST['corps_message'] != NULL
) {
    $nom_message = htmlspecialchars($_POST['nom_message']);
    $prenom_message = htmlspecialchars($_POST['prenom_message']);
    $mail_message = htmlspecialchars($_POST['mail_message']);
    $sujet_message = htmlspecialchars($_POST['sujet_message']);
    $corps_message = htmlspecialchars($_POST['corps_message']);

    // enregistre le message en BDD
    req_contact($bdd,$date_message,$nom_message,$prenom_message,$mail_message,$sujet_message,$corps_message); 

    // crée un mail et l'envoie directement sur la boite mail du restaurant
    $headers = 'From: '.$mail_message."\r\n";
    $headers .= "X-Mailer: PHP/".phpversion()."\r\n" ;
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-type: text/html; charset=UTF-8\r\n";
    $headers .= "Content-Transfer-Encoding: 8bit\r\n\r\n";

    $message = '
    <table>
        <tr>
            <td>
                Vous avez reçu un nouveau message de '.$prenom_message.' '.$nom_message.': '.$mail_message.'
                <br>
                le '.date('d-m-Y à H:i',$date_message).'
            </td>
        </tr>
        <tr>
            <td>
                <br>
                '.nl2br($corps_message).'
            </td>
        </tr>
    </table>
    ';

    // fonction mail basique
    // mail($site_mail, $sujet_message, $message, $headers);
    
    //// provisoire en attendant d'envoyer mail
    $file = '../test_contact.html';
    $current = file_get_contents($file);
    $current = $headers;
    $current .= $sujet_message;
    $current .= $message;
    file_put_contents($file, $current);
    /// fin test

    $texte_page_courante = 'Votre message a bien été envoyer. Notre équipe vous répondra dans les plus brefs délais.';
}
else {
    $texte_page_courante = 'Une erreur est survenue. Veuillez réessayer ultérieurement. ';
}

?>