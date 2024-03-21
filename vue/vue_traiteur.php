<?php
if (isset($_GET['c']) && $_GET['c'] != NULL) {
    $c = intval($_GET['c']);
    if ($c == 1) {
        $titre = 'Menus entreprises';
        $texte = 'Nous proposons des prestations sur-mesure et nous chargeons de la mise en place de vos réceptions professionnelles comme un buffet, une inauguration, un séminaire, un congrès ou un cocktail de même que de l\'organisation de réceptions et dîners privés destinés à un cercle choisi de convives.<br>
        Ces menus présentent les traditions culinaires du Grand Est et des Hauts de France, tout en offrant une option végétarienne pour satisfaire tous les palais lors de vos événements d\'entreprise. Chaque plat est préparé avec soin pour capturer l\'essence des saveurs régionales de ces régions.';
    }
    elseif ($c == 2) {
        $titre = 'Événements privées';
        $texte = '';
    }
    elseif ($c == 3) {
        $titre = 'Votre événement sur mesure';
        $texte = 'Besoin d\'un estimatif budgétaire ou d\'un devis détaillé pour votre prochain événement ? Rien de plus simple, il vous suffit juste de remplir le formulaire. Notre service dédié s\'occupe du reste et vous recontacte sous 48h.';
    }
    else {
        $titre = 'Traiteur';
        $texte = '';
    }
}
else {
    $c = '';
    $titre = 'Traiteur';
    $texte = '';
}

$date = 'Carte du 14 Septembre au 20 Septembre';
?>

<section class="container-fluid position-sticky top-0">
    <div class="row">
        <!-- Haut de page -->
        <img src="public/assets/img/illustration_site/restaurant-bern-179047_1280.jpg" alt="" class="img-fluid en_tete img_en_tete position-relative col-12">
        <div class="col-12 position-absolute d-flex justify-content-center align-items-end en_tete ">
            <div class="row position-relative">
                <h1 class="col-12 text-center"><?php echo $titre;  ?></h1>
                <p  class="col-8 offset-2 text-center mb-5 bg-transparent bg-gradient d-none d-md-block"><?php echo $texte;  ?></p>
            </div>
        </div>
    </div>
</section>
</section>
<section class="container-fluid position-relative bg-light pb-5 carte">
    <div class="row">
        
        <!-- Routeur -->
        <?php

            require_once('controler/traitement_traiteur.php');

        ?>
    </div>
</section>