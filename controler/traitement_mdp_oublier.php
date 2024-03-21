<?php
$message = '';
$message_content = '';

if (isset($_POST['mail']) && $_POST['mail'] != NULL) {
    $mail = htmlspecialchars($_POST['mail']);

    // génération d'une clé aléatoire et d'une date d'expiration de 30 minutes à conté du moment de création
    $token = bin2hex(random_bytes(16));
    $token_hash = password_hash($token, PASSWORD_DEFAULT);
    $expiration_date = time() + 60*30;

    $user = req_utilisateur($bdd,$mail);
    $nom = $user[0];
    // update l'utilisateur avec le token et la date
    // empêche l'update des admins
    $nbr = req_token_client($bdd,$expiration_date,$token_hash,$mail);

    // conte le nombre de ligne affecté par la requête si = 1 envoie le message
    if ($nbr == 1) {
        // $message_content = 'Cliquez <a href="http://localhost/projet/restaurant/mvc/index.php?page=52&token='.$token.'">ici</a> pour réinitialiser votre mot de passe.';
        $message_content = '
            <table>
                <tr>
                    <td>
                     Cher(e) '.$nom['prenom_utilisateur'].' '.$nom['nom_utilisateur'].',
                    </td>
                </tr><tr>
                    <td>
                        Nous avons reçu une demande de réinitialisation de mot de passe pour votre compte Chez Roger. Pour créer un nouveau mot de passe, veuillez cliquer sur le lien ci-dessous :
                    </td>
                </tr><tr>
                    <td>
                        Cliquez <a href="http://localhost/restaurant/mvc/index.php?page=52&token='.$token.'">ici</a> pour r&eacute;initialiser votre mot de passe.
                    </td>
                </tr><tr>
                    <td>
                        Ce lien sera actif 30 minutes.
                    </td>
                </tr><tr>
                    <td>
                        Si vous n\'avez pas demandé cette réinitialisation, veuillez ignorer cet e-mail. Votre mot de passe actuel restera inchangé.
                        <br>
                        Merci de votre confiance en Chez Roger, les Hauts Fourneaux du Grand Est.
                    </td>
                </tr><tr>
                    <td>
                        Cordialement,<br>
                        L\'équipe Chez Roger 
                    </td>
                </tr>
            </table>
        ';
        $subject = 'r&eacute;initialisation de votre mot de passe';
        $headers = 'From: '.$site_mail."\r\n";
        $headers .= "X-Mailer: PHP/".phpversion()."\r\n" ;
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-type: text/html; charset=UTF-8\r\n";
        $headers .= "Content-Transfer-Encoding: 8bit\r\n\r\n";

        //// provisoire en attendant d'envoyer mail
        $file = '../test_mdp_change.html';
        $current = file_get_contents($file);
        $current = $headers;
        $current .= $subject;
        $current .= $message_content;
        file_put_contents($file, $current);
        /// fin test


        // fonction mail basique
        // mail($mail, $subject, $message_content, $headers);
    }
    $message = '<div class="text-center my-5">Un liens pour réinitialiser votre mot de passe vient d\'être envoyé sur votre boite mail. Il sera valide 30 minutes.</div>';

}
else {
    $message = '<div class="text-center my-5">Une erreur est survenue. Veuillez contacter un administrateur.</div>';
}
?>