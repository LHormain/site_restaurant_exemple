<?php
if(isset($_GET['dis']) && $_GET['dis'] == 1) {
    session_destroy();
    // header("location:index.php"); // ne marche pas car pas en haut de la page, nav viens avant
    ?>
    <script>
        // force le rechargement de la page
        window.location.assign("index.php?page=5");
    </script>
    <?php
}

?>