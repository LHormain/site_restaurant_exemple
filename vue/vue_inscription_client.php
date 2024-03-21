<?php
include('controler/traitement_inscription_clients.php');
?>

<section class="container-fluid position-sticky top-0">
    <div class="row">
        <!-- Haut de page -->
        <img src="public/assets/img/illustration_site/couverts-or-fond-noir.jpg" alt="" class="img-fluid en_tete img_en_tete position-relative col-12">
        <div class="col-12 position-absolute d-flex justify-content-center align-items-end en_tete ">
            <div class="row position-relative">
                <h1 class="col-12 text-center">Inscription</h1>
                <p  class="col-8 offset-2 text-center mb-5 bg-transparent bg-gradient"></p>
            </div>
        </div>
    </div>
</section>
<section class="container-fluid position-relative bg-light pb-5 carte">
<?php
// si non connecté
if (!isset($_SESSION['id_client']) || (isset($_GET['id']) && $_GET['id'] != NULL)) {
?>
    <div class="row">
        <div class="offset-lg-2 col-lg-8 text-center mt-5">
            <h2><?php echo $message_page_courante; ?></h2>
            <p>
                Les champs suivit d'un * sont obligatoire.
            </p>
            <!-- formulaire d'inscription -->
            <form action="" method="post" class="my-5 text-start">
                <div class="row">
                    <!-- nom complet -->
                    <div class="mb-3 col">
                        <label for="nom_utilisateur" class="form-label">Nom*</label>
                        <input type="text" class="form-control" name="nom_utilisateur" id="nom_utilisateur" aria-describedby="" placeholder="Votre nom" value="<?php echo $nom_utilisateur; ?>" required>
                    </div>
                    <div class="mb-3 col">
                        <label for="prenom_utilisateur" class="form-label">Prénom*</label>
                        <input type="text" class="form-control" name="prenom_utilisateur" id="prenom_utilisateur" aria-describedby="" placeholder="Votre prénom" value="<?php echo $prenom_utilisateur; ?>" required>
                    </div>
                    <!-- mail -->
                    <div class="mb-3">
                        <label for="mail_utilisateur" class="form-label">E-mail*</label>
                        <input type="email" class="form-control" name="mail_utilisateur" id="mail_utilisateur" aria-describedby="" placeholder="votremail@fournisseur.com" value="<?php echo $mail_utilisateur; ?>"  <?php if (isset($_GET['id']) && $_GET['id'] != NULL) {echo 'readonly';} else {echo 'required';} ?>>
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
                                <label for="mdp_utilisateur" class="form-label"><?php if (isset($_GET['id'])) { echo 'Entrez ';} else { echo 'Choisissez ';} ?> votre mot de passe*</label>
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
                    <!-- protection donnée personnelle -->
                    <div class="form-check mb-3">
                        <input class="form-check-input" type="checkbox" value="legal" id="legal" name="" required>
                        <label class="form-check-label" for="legal" id="condition_label">
                            J'accepte l'utilisation de mon adresse mail dans le but exclusivement de me contacter suite à mes demandes.*
                        </label>
                    </div>
                    <!-- captcha -->
                    <!-- code de verification -->
                    <div class="label col-lg-4 mb-3" >
                        <label for="captcha">Écrivez dans la case de droite uniquement les chiffres apparaissant dans le code suivant : <br> <span id="code"></span></label>
                    </div>
                    <div class="champ col-7 offset-lg-1 mb-3">
                        <input type="text" name="captcha" id="captcha" required>
                    </div>
                </div>
                <!-- envoyer -->
                <div class="mb-3 row justify-content-center">
                    <div class="col-lg-2 col-6">
                        <input type="submit" value="Envoyer" class="form-control btn btn-primary " disabled>
                    </div>
                </div>
            </form>
            <!-- fin formulaire -->
        </div>
    </div>
    <script src="public/assets/js/captcha.js"></script>
    <script src="public/assets/js/formulaire_inscription.js"></script>
    
    <?php
}
else {
    // l'inscription a réussi
    ?>
    <script>
        window.location.assign("index.php?page=10&cas=2");
    </script>
    <?php
}
?>
</section>