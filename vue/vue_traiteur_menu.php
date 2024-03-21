<?php
include('controler/traitement_traiteur_menu.php');
?>

<div class="offset-lg-3 col-lg-6 my-5 text-center">
Pour personnaliser votre expérience, veuillez sélectionner le ou les menu(s) entreprise de votre choix. Lors de votre entretien téléphonique avec notre équipe dédiée, veuillez indiquer les plats choisis ainsi que les quantités requises. Nous sommes impatients de créer un repas exceptionnel pour votre événement.
</div>

<?php
echo $sortie;
?>
        

<!-- boissons -->
<div class="offset-lg-3 col-lg-6 my-5 ">
    <div class="row">
        <h3>Forfait boissons </h3>
        <div class="ps-5 text-start">
            <div class="row">
                <div class="col-12">
                    <span>Classique</span><br>
                </div>
                <div class="col-lg-8">
                (Vin rouge et blanc, bière, eau plate et gazeuse, jus de fruit, thé, café)
                </div> 
                <div class="col-lg-4">
                    6.50 €/personne
                </div>
            </div>
        </div>

        <div class="ps-5 text-start">
            <div class="row">
                <div class="col-12">
                    <span>Prestige</span><br>
                </div>
                <div class="col-lg-8">
                (Vin rouge et blanc, bière, eau plate et gazeuse, jus de fruit, thé, café, Vin rouge et blanc, bière, eau plate et gazeuse, jus de fruit, thé, café)
                </div> 
                <div class="col-lg-4">
                    16.50 €/personne
                </div>
            </div>
        </div>

    </div>
    <div class="text-center">
        <a href="index.php?page=3&c=3" type="button" class="btn btn-primary my-5">Demander un Devis</a>
    </div>
</div>