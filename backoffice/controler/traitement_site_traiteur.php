<?php
if (isset($_GET['c']) && $_GET['c'] != NULL) {
    $c = intval(htmlspecialchars($_GET['c']));
    if ($c == 1) {
        include('vue/vue_site_traiteur_devis_gestion.php');
    }
    elseif ($c == 2) {
        include('vue/vue_site_traiteur_gestion.php');
    }
    elseif ($c == 3) {
        include('vue/vue_site_traiteur_saisie.php');
    }
    elseif ($c == 4) {
        include('vue/vue_site_carte_saisie_menu_img.php');
    }
    elseif ($c == 5) {
        include('vue/vue_site_traiteur_devis.php');
    }
    else {
        include('vue/vue_site_traiteur_devis_gestion.php');
    }
}
else {
    include('vue/vue_site_traiteur_devis_gestion.php');
}
?>