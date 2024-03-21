<?php
    if ($c == 1) {
        include('vue/vue_carte_menu.php');
    }
    elseif ($c == 2) {
        echo '<h2 class="col-12 text-center mt-5">'.$date.'</h2>';
        include('vue/vue_carte_entre.php');
    }
    elseif ($c == 3) {
        echo '<h2 class="col-12 text-center mt-5">'.$date.'</h2>';
        include('vue/vue_carte_plat.php');
    }
    elseif ($c == 4) {
        echo '<h2 class="col-12 text-center mt-5">'.$date.'</h2>';
        include('vue/vue_carte_dessert.php');
    }
    elseif ($c == 5) {
        echo '<h2 class="col-12 text-center mt-5">'.$date.'</h2>';
        include('vue/vue_carte_boissons.php');
    }
    else {
        include('vue/vue_carte_menu.php');
        echo '<h2 class="col-12 text-center">'.$date.'</h2>';
        include('vue/vue_carte_entre.php');
        include('vue/vue_carte_plat.php');
        include('vue/vue_carte_dessert.php');
        include('vue/vue_carte_boissons.php');
    }

?>