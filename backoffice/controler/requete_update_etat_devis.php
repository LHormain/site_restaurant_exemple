<?php
$user = 'root';
$pass = '';

try {
    $bdd = new PDO('mysql:host=localhost;dbname=restaurant',$user,$pass); // concerne la base
}
catch(PDOException $e) {
    die('Erreur : '.$e->getMessage());
}

if (isset($_POST['id_devis'], 
          $_POST['id_etat'])
    && $_POST['id_devis'] != NULL
    && $_POST['id_etat'] != NULL
) {
    $id_devis = htmlspecialchars($_POST['id_devis']);
    $id_etat = htmlspecialchars($_POST['id_etat']);

    $requete = "UPDATE devis SET id_etat = :id_etat WHERE id_devis = :id_devis";
    $req = $bdd->prepare($requete);
    $req->bindValue(':id_etat', $id_etat, PDO::PARAM_INT);
    $req->bindValue(':id_devis', $id_devis, PDO::PARAM_INT);
    $req -> execute();

    if ($id_etat == 2) {
        // envois un mail au client
        $site_mail = 'contact@chezroger-grandest.com';
        $headers = 'From: '.$site_mail."\r\n";
        $headers .= "X-Mailer: PHP/".phpversion()."\r\n" ;
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-type: text/html; charset=UTF-8\r\n";
        $headers .= "Content-Transfer-Encoding: 8bit\r\n\r\n";

        $sujet = 'Chez Roger : Merci de nous avoir choisis ! Réponse à votre demande de devis';

        $requete = "SELECT * FROM utilisateurs
                    INNER JOIN devis ON devis.id_utilisateur = utilisateurs.id_utilisateur
                    WHERE devis.id_devis = :id_devis";
        $req = $bdd->prepare($requete);
        $req->bindValue(':id_devis', $id_devis, PDO::PARAM_INT);
        $req -> execute();
        $user = $req -> fetch();
        $mail = $user['mail_utilisateur'];

        $message = 'Votre devis à été accepté. Une version imprimable est disponible sur votre espace personnelle.<br><br> Cordialement,<br> L\'équipe Chez Roger';

        // fonction mail basique
        // mail($mail, $sujet, $message, $headers);
            //// provisoire en attendant d'envoyer mail
            $file = '../../../test_accept_devis.html';
            $current = file_get_contents($file);
            $current = $headers;
            $current .= $sujet;
            $current .= $message;
            file_put_contents($file, $current);
            /// fin test
    }

$tableau_donnees = json_encode($req->fetchAll());
echo $tableau_donnees;
}

?>