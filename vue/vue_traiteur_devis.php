<?php
include('controler/traitement_traiteur_devis.php'); 

?>

<div class="offset-lg-2 col-lg-8 offset-1 col-10 text-center mt-5">
    <strong><?php echo $message_page_courante; ?></strong>
    <p class="">
        Merci de bien vouloir nous confirmer votre réservation le matin même par <a href="mailto:<?php echo $site_mail; ?>">e-mail</a> ou par téléphone au <?php echo $site_tel; ?>. <br>
        Notre système ne gère qu'un seul devis en attente par client. Pour réserver plusieurs date veuillez indiquer vos souhaits dans la section "Votre message". 
    </p>
    <p>
        Les champs suivit d'un * sont obligatoire.
    </p>
    <form action="#" method="post" class="text-start my-5 " >
        <div class="row">
            <!-- nom complet -->
            <div class="mb-3 col">
                <label for="nom_utilisateur" class="form-label">Nom*</label>
                <input type="text" class="form-control" name="nom_utilisateur" id="nom_utilisateur" aria-describedby="helpId" placeholder="Votre nom"  value="<?php echo $nom_utilisateur; ?>" <?php if (isset($_SESSION['id_client'])) { echo 'readonly';} else { echo 'required';} ?>>
            </div>
            <div class="mb-3 col">
              <label for="prenom_utilisateur" class="form-label">Prénom*</label>
              <input type="text" class="form-control" name="prenom_utilisateur" id="prenom_utilisateur" aria-describedby="helpId" placeholder="Votre prénom"  value="<?php echo $prenom_utilisateur; ?>" <?php if (isset($_SESSION['id_client'])) { echo 'readonly';} else { echo 'required';} ?>>
            </div>
            <!-- mail -->
            <div class="mb-3">
              <label for="mail_utilisateur" class="form-label">E-mail*</label>
              <input type="email" class="form-control" name="mail_utilisateur" id="mail_utilisateur" aria-describedby="helpId" placeholder="votremail@fournisseur.com"  value="<?php echo $mail_utilisateur; ?>" <?php if (isset($_SESSION['id_client'])) { echo 'readonly';} else { echo 'required';} ?>>
            </div>
            <!-- telephone -->
            <div class="mb-3">
              <label for="tel_utilisateur" class="form-label">Téléphone*</label>
              <input type="text" class="form-control" name="tel_utilisateur" id="tel_utilisateur" aria-describedby="helpId" placeholder="votre numéro de téléphone"  value="<?php echo $tel_utilisateur; ?>" <?php if (isset($_SESSION['id_client'])) { echo 'readonly';} else { echo 'required';} ?>>
            </div>
            <!-- type d’événement -->
            <div class="mb-3" id="evenement_box">
                <label class="form-label">Type d'événement*</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" value="mariage" id="mariage" name="type_evenement_devis" <?php if ($type_evenement_devis == 'mariage') {echo 'checked';} ?>>
                    <label class="form-check-label" for="mariage" >
                        Mariage
                    </label >
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" value="anniversaire" id="anniversaire"  name="type_evenement_devis" <?php if ($type_evenement_devis == 'anniversaire') {echo 'checked';} ?>>
                    <label class="form-check-label" for="anniversaire" >
                        Anniversaire
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" value="cocktail" id="cocktail"  name="type_evenement_devis" <?php if ($type_evenement_devis == 'cocktail') {echo 'checked';} ?>>
                    <label class="form-check-label" for="cocktail">
                        Cocktail
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" value="religieux" id="religieux"  name="type_evenement_devis" <?php if ($type_evenement_devis == 'religieux') {echo 'checked';} ?>>
                    <label class="form-check-label" for="religieux">
                        Communion/baptême/...
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" value="entreprise" id="entreprise"  name="type_evenement_devis" <?php if ($type_evenement_devis == 'entreprise') {echo 'checked';} ?>>
                    <label class="form-check-label" for="entreprise">
                        Réception d'entreprise
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" value="inauguration" id="inauguration"  name="type_evenement_devis" <?php if ($type_evenement_devis == 'inauguration') {echo 'checked';} ?>>
                    <label class="form-check-label" for="inauguration">
                        Inauguration
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" value="seminaire" id="seminaire"  name="type_evenement_devis" <?php if ($type_evenement_devis == 'seminaire') {echo 'checked';} ?>>
                    <label class="form-check-label" for="seminaire">
                        Séminaire/congrès
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" value="autre" id="autre"  name="type_evenement_devis" <?php if ($type_evenement_devis == 'autre') {echo 'checked';} ?>>
                    <label class="form-check-label" for="autre">
                        Autre
                    </label>
                </div>
            </div>
            <!-- type de repas -->
            <div class="mb-3 col-lg-6" id="repas_box">
                <label class="form-label">Type de repas*</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" value="froid" id="froid" name="type_repas_devis" <?php if ($type_repas_devis == 'froid') {echo 'checked';} ?>>
                    <label class="form-check-label" for="froid">
                      Buffet froid
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" value="chaud" id="chaud" name="type_repas_devis" <?php if ($type_repas_devis == 'chaud') {echo 'checked';} ?>>
                    <label class="form-check-label" for="chaud">
                      Buffet chaud
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" value="assiette" id="assiette" name="type_repas_devis" <?php if ($type_repas_devis == 'assiette') {echo 'checked';} ?>> 
                    <label class="form-check-label" for="assiette">
                      Plat à l'assiette
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" value="cocktail" id="r_cocktail" name="type_repas_devis" <?php if ($type_repas_devis == 'cocktail') {echo 'checked';} ?>>
                    <label class="form-check-label" for="r_cocktail">
                      Cocktail
                    </label>
                </div>
            </div>
            <!-- si plat à l'assiette coché -->
            <div class="mb-3 col-lg-6 d-none" id="assiettes">
                <h3>Pour les entreprises :</h3>
                Pour personnaliser votre expérience, veuillez sélectionner <a href="index.php?page=3&c=1">le ou les menu(s) entreprise</a> de votre choix. Lors de votre entretien téléphonique avec notre équipe dédiée, veuillez indiquer les plats choisis ainsi que les quantités requises. Nous sommes impatients de créer un repas exceptionnel pour votre événement.
            </div>
            <!-- nombre de personne -->
            <div class="mb-3">
              <label for="nbr_personnes_devis" class="form-label">Nombre de personnes*</label>
              <input type="text" class="form-control" name="nbr_personnes_devis" id="nbr_personnes_devis" aria-describedby="helpId" placeholder="à partir de 10" required value="<?php echo $nbr_personnes_devis; ?>">
            </div>
            <!-- date de l'événement -->
            <div class="mb-3">
              <label for="date_evenement_devis" class="form-label">Date de l'événement*</label>
              <input type="date" class="form-control" name="date_evenement_devis" id="date_evenement_devis" aria-describedby="helpId" placeholder=""  value="<?php echo $date_evenement_devis; ?>" required>
            </div>
            <!-- votre message -->
            <div class="mb-3">
              <label for="message_devis" class="form-label">Votre message*</label>
              <textarea class="form-control" name="message_devis" id="message_devis" rows="3" placeholder="Renseignements complémentaire comme : plage horaire où l'on peut vous recontacter, restriction alimentaire particulière, ..." required><?php echo $message_devis; ?></textarea>
            </div>
            
            <!-- // si non connecter créer un compte client. -->
            
            <!-- mot de passe -->
            <div class="<?php if (isset($_SESSION['id_client'])) { echo 'visually-hidden';}?>">
            <input type="hidden" name="mdp_test" id="mdp_test" value="<?php if (isset($_SESSION['id_client'])) { echo 1;} else {echo 0;}?>">
            <fieldset class="mb-3 ">
                <legend class="fs-6">Pour le suivi de votre devis nous allons vous créer un compte client. Veuillez choisir un mot de passe pour y accéder. <br> Déjà client? Entrez votre mot de passe dans les deux champs prévue dans ce formulaire et connecter vous automatiquement. </legend>
                <small class="form-text text-muted">Minimum 5 caractères, 1 chiffre, 1 lettre minuscule, 1 majuscule et un caractère spécial</small>
                <div class="row">
                    <div class="mb-3 col">
                        <label for="mdp_utilisateur" class="form-label">Choisisser votre mot de passe*</label>
                        <input type="password" class="form-control py-2" name="mdp_utilisateur" id="mdp_utilisateur" aria-describedby="HelpIdMDP" placeholder="" <?php if (!isset($_SESSION['id_client'])) { echo 'required';}?>>
                        <small id="helpIdMDP" class="form-text text-muted visually-hidden">12 caractères minimum. Doit comporter des majuscules, minuscules et des chiffres</small>
                    </div>
                    <div class="mb-3 col">
                        <label for="mdp_check" class="form-label">Confirmer votre mot de passe*</label>
                        <input type="password" class="form-control py-2" name="mdp_check" id="mdp_check" aria-describedby="helpIdMDP2" placeholder="" <?php if (!isset($_SESSION['id_client'])) { echo 'required';}?>>
                        <small id="helpIdMDP2" class="form-text text-muted visually-hidden">Répéter votre mot de passe pour confirmation</small>
                    </div>
                </div>
            </fieldset>
            </div>
            <!-- protection donnée personnelle -->
            <div class="form-check mb-3 col-11 mx-3">
              <input class="form-check-input " type="checkbox" value="legal" id="legal" name="" required>
              <label class="form-check-label" for="legal" id="condition_label">
                J'accepte l'utilisation de mon adresse mail dans le but exclusivement de me contacter suite à ma demande d'information ou de réservation.
              </label>
            </div>
            <!-- captcha -->
            <!-- code de verification aléatoire -->
            <div class="label col-lg-4 mb-3" >
                <label for="captcha">Écrivez dans la case de droite uniquement les chiffres apparaissant dans le code suivant : <br> <span id="code"></span></label>
            </div>
            <div class="champ col-7 offset-lg-1 mb-3">
                <input type="text" name="captcha" id="captcha">
            </div>
        </div>

        <!-- envoyer -->
        <div class="mb-3 row justify-content-center">
            <div class="col-md-2 col-4">
                <input type="submit" value="Envoyer" class="form-control btn btn-primary " disabled>
            </div>
        </div>
    </form>
</div>

<script src="public/assets/js/captcha.js"></script>
<script src="public/assets/js/formulaire_devis.js"></script>

<script src="public/assets/js/limite_date.js"></script>