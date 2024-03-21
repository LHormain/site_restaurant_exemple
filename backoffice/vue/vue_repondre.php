<?php
include('controler/traitement_repondre.php');
?>
<div class="col-10 my-5">
    <div class="row">
        <h1>Écrire un message à <?php if ($user != '') {echo $user['prenom_utilisateur'].' '.$user['nom_utilisateur'];} else {echo 'un(e) client(e)';}  ?></h1>
        <p class="text-center"><?php echo $texte_page_courante; ?></p>
        <form action="#" method="post" class="offset-1 col-10">
            <div class="mb-3">
              <label for="mail" class="form-label">Destinataire</label>
              <input type="text"
                class="form-control" name="mail" id="mail" aria-describedby="helpId" placeholder="" value="<?php echo $mail; ?>">
              <small id="helpId" class="form-text text-muted">Adresse mail du client</small>
            </div>
            <div class="mb-3">
              <label for="sujet" class="form-label">Sujet</label>
              <input type="text"
                class="form-control" name="sujet" id="sujet" aria-describedby="helpId2" placeholder="" value="<?php echo $sujet; ?>">
              <small id="helpId2" class="form-text text-muted">En tête du message</small>
            </div>
            <div class="mb-3">
              <label for="message" class="form-label">Cher(e) <?php if ($user != '') {echo $user['prenom_utilisateur'].' '.$user['nom_utilisateur'];} else {echo 'client(e)';}  ?>,</label>
              <textarea class="form-control" name="message" id="message" rows="3"></textarea>
            </div>
            <div class="text-end">
                <input type="submit" value="Envoyer" class="btn btn-primary">
            </div>
        </form>
        <div class="offset-8 col">
            Cordialement,<br> L'équipe <?php echo $site_nom ?>
        </div>

    </div>
</div>