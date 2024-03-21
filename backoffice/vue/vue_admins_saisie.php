<?php
include('controler/traitement_admins_saisie.php');
?>
<div class="col-12">
    <h2><?php echo $titre; ?> d'un admins</h2>
    <p><?php echo $message_page_courante; ?></p>
    <form action="" method="post" class="my-5 text-start">
        <div class="row">
            <!-- nom complet -->
            <div class="mb-3 col">
                <label for="nom_utilisateur" class="form-label">Nom*</label>
                <input type="text" class="form-control" name="nom_utilisateur" id="nom_utilisateur" aria-describedby="" placeholder=" nom" value="<?php echo $nom_utilisateur; ?>" required>
            </div>
            <div class="mb-3 col">
                <label for="prenom_utilisateur" class="form-label">Prénom*</label>
                <input type="text" class="form-control" name="prenom_utilisateur" id="prenom_utilisateur" aria-describedby="" placeholder=" prénom" value="<?php echo $prenom_utilisateur; ?>" required>
            </div>
            <!-- mail -->
            <div class="mb-3">
                <label for="mail_utilisateur" class="form-label">E-mail*</label>
                <input type="email" class="form-control" name="mail_utilisateur" id="mail_utilisateur" aria-describedby="" placeholder="mail@fournisseur.com" value="<?php echo $mail_utilisateur; ?>" required>
            </div>
            <!-- telephone -->
            <div class="mb-3">
                <label for="tel_utilisateur" class="form-label">Téléphone*</label>
                <input type="text" class="form-control" name="tel_utilisateur" id="tel_utilisateur" aria-describedby="" placeholder="00 00 00 00 00 " value="<?php echo $tel_utilisateur; ?>" required>
            </div>
            <!-- mot de passe -->
            <fieldset class="mb-3">
                <legend>Mot de passe</legend>
                <small class="form-text text-muted">Minimum 5 caractères, 1 chiffre, 1 lettre minuscule, 1 majuscule et un caractère spécial</small>
                <div class="row">
                    <div class="mb-3 col">
                        <label for="mdp_utilisateur" class="form-label">Choisisser votre mot de passe*</label>
                        <input type="password" class="form-control py-2" name="mdp_utilisateur" id="mdp_utilisateur" aria-describedby="HelpIdMDP" placeholder="" required>
                        <small id="helpIdMDP" class="form-text text-muted visually-hidden">12 caractères minimum. Doit comporter des majuscules, minuscules et des chiffres</small>
                    </div>
                    <div class="mb-3 col">
                        <label for="mdp_check" class="form-label">Confirmer votre mot de passe*</label>
                        <input type="password" class="form-control py-2" name="mdp_check" id="mdp_check" aria-describedby="helpIdMDP2" placeholder="" required>
                        <small id="helpIdMDP2" class="form-text text-muted visually-hidden">Répéter votre mot de passe pour confirmation</small>
                    </div>
                </div>
            </fieldset>
            
        </div>
        <!-- envoyer -->
        <div class="mb-3 row justify-content-center">
            <div class="col-lg-2 col-6">
                <input type="submit" value="Envoyer" class="form-control btn btn-primary ">
            </div>
        </div>
    </form>
</div>