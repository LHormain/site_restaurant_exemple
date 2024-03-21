<?php
if (isset($_GET['c']) && $_GET['c'] != NULL) {
    $c = intval($_GET['c']);
    if ($c == 1) {
        $titre = 'Menu du jour';
        $texte = 'Chaque jour, notre chef talentueux sélectionne les ingrédients les plus frais pour créer un menu du jour exquis. Découvrez ses choix inspirés et laissez-vous séduire par une expérience gastronomique inoubliable .';
    }
    elseif ($c == 2) {
        $titre = 'Entrées';
        $texte = 'Découvrez l\'harmonie des saveurs et l\'art de la cuisine française à travers notre sélection d\'entrées exquises. Notre carte des entrées est une invitation à un voyage culinaire où chaque plat est une promesse de délices. Des classiques intemporels aux créations audacieuses, nos entrées sont préparées avec passion et présentées avec élégance. Que vous soyez à la recherche d\'une entrée légère pour commencer votre repas ou d\'une expérience gastronomique inoubliable, notre carte des entrées saura combler toutes les attentes. Laissez-nous vous guider à travers un monde de saveurs raffinées, où chaque bouchée est une promesse de bonheur gustatif.';
    }
    elseif ($c == 3) {
        $titre = 'Plats';
        $texte = 'Découvrez l\'âme de la cuisine française à travers notre carte des plats principaux, où chaque assiette est une œuvre d\'art culinaire. Notre menu vous offre un voyage à travers les régions emblématiques de la France, mettant en avant les saveurs traditionnelles et les ingrédients locaux de la région du Grand Est. Choisissez parmi une sélection diversifiée de plats, des classiques réconfortants aux créations contemporaines qui réinventent les traditions. Nous sommes fiers de travailler avec les producteurs locaux pour vous offrir des viandes tendres, des poissons frais et des légumes de saison préparés avec soin et créativité. Chaque plat est une invitation à l\'exploration des richesses gastronomiques françaises, servi avec l\'élégance et le savoir-faire qui font de Chez Roger une destination culinaire incontournable. Venez goûter à l\'excellence de la cuisine française dans un cadre chaleureux et accueillant, où chaque plat raconte une histoire de tradition, de passion et de créativité.';
    }
    elseif ($c == 4) {
        $titre = 'Desserts';
        $texte = 'Terminez votre repas en beauté avec notre irrésistible carte des desserts. Chez Roger, chaque dessert est une déclaration d\'amour à la douceur, à la tradition et à la créativité. Que vous craquiez pour notre classique Tarte aux mirabelles, notre décadente Chti\'ramissu, ou nos créations saisonnières mettant en vedette les fruits locaux, nos desserts sont conçus pour éveiller vos papilles. Savourez chaque bouchée de ces délices sucrés, préparés avec le même dévouement à la qualité et à la fraîcheur des ingrédients qui caractérise Chez Roger. Offrez-vous une fin parfaite à votre repas, où la gourmandise est à l\'honneur, dans un cadre convivial et élégant.';
    }
    elseif ($c == 5) {
        $titre = 'Boissons';
        $texte = '';
    }
    else {
        $titre = 'Carte & Menus';
        $texte = '';
    }
}
else {
    $c = '';
    $titre = 'Carte & Menus';
    $texte = '';
}

$date = 'Carte du 14 Septembre au 20 Septembre';
?>

<section class="container-fluid position-sticky top-0">
    <div class="row">
        <!-- Haut de page -->
        <img src="public/assets/img/illustration_site/place-setting-2110245_1280.jpg" alt="" class="img-fluid en_tete img_en_tete position-relative col-12">
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
            require_once('controler/traitement_carte.php');
        ?>
    </div>
</section>