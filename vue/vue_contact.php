

<section class="container-fluid position-sticky top-0 demi_hauteur">
    <div class="row">
        <!-- Haut de page -->
        <img src="public/assets/img/illustration_site/couverts-or-fond-noir.jpg" alt="" class="img-fluid en_tete img_en_tete position-relative col-12">
        <div class="col-12 position-absolute d-flex justify-content-center align-items-start en_tete p-5">
            <div class="row position-relative p-5">
                <h1 class="col-12 text-center">Contactez-nous</h1>
                <p  class="col-8 offset-2 text-center mb-5 bg-transparent bg-gradient"></p>
            </div>
        </div>
    </div>
</section>
</section>
<section class="container-fluid position-relative bg-light pb-5 carte">
    <div class="row">
        <div class="offset-lg-2 col-lg-8 text-center mt-5">
            <p>
                Merci de bien vouloir nous confirmer votre réservation le matin même par e-mail ou par téléphone. <br>  
                Pour toute réservation de plus de 7 personnes, nous vous invitons à nous contacter par <a href="mailto:<?php echo $site_mail; ?>">mail</a> ou par téléphone au <?php echo $site_tel; ?>.
            </p>
            <p>
                Les champs suivit d'un * sont obligatoire.
            </p>
            <!-- formulaire de contact -->
            <form action="index.php?page=41" method="post" class="my-5 text-start">
                <div class="row">
                    <!-- nom complet -->
                    <div class="mb-3 col">
                        <label for="nom_message" class="form-label">Nom*</label>
                        <input type="text" class="form-control" name="nom_message" id="nom_message" aria-describedby="helpId1" placeholder="Votre nom" required>
                        <small id="helpId1" class="form-text text-muted visually-hidden">Votre nom</small>
                    </div>
                    <div class="mb-3 col">
                        <label for="prenom_message" class="form-label">Prénom*</label>
                        <input type="text" class="form-control" name="prenom_message" id="prenom_message" aria-describedby="helpId2" placeholder="Votre prénom" required>
                        <small id="helpId2" class="form-text text-muted visually-hidden">Votre prénom</small>
                    </div>
                    <!-- mail -->
                    <div class="mb-3">
                        <label for="mail_message" class="form-label">E-mail*</label>
                        <input type="email" class="form-control" name="mail_message" id="mail_message" aria-describedby="helpId3" placeholder="votremail@fournisseur.com" required>
                        <small id="helpId3" class="form-text text-muted visually-hidden">Votre adresse e-mail complète</small>
                    </div>
                    <!-- sujet -->
                    <div class="mb-3">
                        <label for="sujet_message" class="form-label">Sujet*</label>
                        <input type="text" class="form-control" name="sujet_message" id="sujet_message" aria-describedby="helpId4" placeholder="" required>
                        <small id="helpId4" class="form-text text-muted visually-hidden">Le sujet de votre message</small>
                    </div>
                    <!-- votre message -->
                    <div class="mb-3">
                    <label for="corps_message" class="form-label">Votre message*</label>
                    <textarea class="form-control" name="corps_message" id="corps_message" rows="3" required></textarea>
                    </div>
                    <!-- protection donnée personnelle -->
                    <div class="form-check mb-3 mx-3 col-11">
                        <input class="form-check-input" type="checkbox" value="legal" id="legal" name="legal" required>
                        <label class="form-check-label" for="legal" id="condition_label">
                            J'accepte l'utilisation de mon adresse mail dans le but exclusivement de me contacter suite à ma demande d'information ou de réservation.*
                        </label>
                    </div>
                    <!-- captcha -->
                    <!-- code de verification -->
                    <div class="label col-lg-4 mb-lg-3" >
                        <label for="captcha">Écrivez dans la case de droite uniquement les chiffres apparaissant dans le code suivant : <br> <span id="code"></span></label>
                    </div>
                    <div class="champ col-7 offset-lg-1 mb-lg-3">
                        <input type="text" name="captcha" id="captcha" required>
                    </div>
                </div>
                <!-- envoyer -->
                <div class="mb-3 row justify-content-center">
                    <div class="col-md-2 col-4 mt-3">
                        <input type="submit" value="Envoyer" class="form-control btn btn-primary " disabled>
                    </div>
                </div>
            </form>
            <!-- fin formulaire -->
        </div>
    </div>
</section>
<script src="public/assets/js/captcha.js"></script>
<script src="public/assets/js/formulaire_contact.js"></script>