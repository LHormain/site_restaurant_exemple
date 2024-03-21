<?php
    if ($c == 1) {
        include('vue/vue_traiteur_menu.php');
    }
    elseif ($c == 2) {
        include('vue/vue_traiteur_prive.php');
    }
    elseif ($c == 3) {
        include('vue/vue_traiteur_devis.php');
    }
    else {
        include('vue/vue_traiteur_menu.php');
        include('vue/vue_traiteur_prive.php');
    }


    
?>