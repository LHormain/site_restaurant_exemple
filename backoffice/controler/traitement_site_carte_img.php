<?php
if (isset($_GET['c']) && $_GET['c'] != NULL) {
    $c = intval(htmlspecialchars($_GET['c']));
    if ($c == 1) {
        include('vue/vue_site_carte_saisie_img.php');
    }
    elseif ($c == 2) {
        include('vue/vue_site_carte_gestion_img.php');
    }
    else {
        include('vue/vue_site_carte_saisie_img.php');
    }
}
else {
    include('vue/vue_site_carte_saisie_img.php');
}
?>