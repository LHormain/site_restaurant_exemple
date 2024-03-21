<?php
if (isset($_GET['c']) && $_GET['c'] != NULL) {
    $c = intval(htmlspecialchars($_GET['c']));
    if ($c == 1) {
        include('vue/vue_site_carte_saisie_menu.php');
    }
    elseif ($c == 2) {
        include('vue/vue_site_carte_gestion_menu.php');
    }
    elseif ($c == 3) {
        include('vue/vue_site_carte_saisie_menu_img.php');
    }
    else {
        include('vue/vue_site_carte_saisie_menu.php');
    }
}
else {
    include('vue/vue_site_carte_saisie_menu.php');
}
?>