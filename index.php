<?php 
    session_start();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurant</title>
    <!-- icône onglet -->
    <link rel="shortcut icon" type="image/ico" href="favicon.ico"/>
    <!-------------------     Bootstrap    --------------------->
    <!-- CND -->
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> -->
    <!-- local version ready to use -->
    <link href="public/assets/bootstrap_5/css/bootstrap.min.css" rel="stylesheet" >
    <!-- <link href="public/assets/bootstrap-5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" > -->
    <!---------------------------------------------------------->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <!-------------------     polices      --------------------->
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Oswald:wght@200;300;400;500;600;700&family=Tangerine:wght@400;700&display=swap" rel="stylesheet">
    <!-- --------------------   CSS   ---------------------- -->
    <link rel="stylesheet" href="public/assets/css/fontawesome-6.4.0/css/all.css">
    <link rel="stylesheet" href="public/assets/css/style.css">
</head>
<body>
    <?php 
    // Connexion à une base de donné //
    require_once('modele/connexion_bdd.php');
    // debut des includes //
    require_once('site.php');
    require_once('modele/fonctions.php');
    require_once('vue/composant/vue_header.php');
    require_once('vue/composant/vue_nav.php');
    require_once('vue/composant/vue_scroll_top.php');
    if (isset($_GET['page']) && $_GET['page'] != NULL) {
        $page = intval($_GET['page']);
        if ($page == 1) {
            include('vue/vue_accueil.php');
        }
        elseif ($page == 2) {
            include('vue/vue_carte.php');
        }
        elseif($page == 3) {
            include('vue/vue_traiteur.php');
        }
        elseif($page == 31) {
            include('vue/vue_devis_client.php');
        }
        elseif($page == 4) {
            include('vue/vue_contact.php');
        }
        elseif($page == 41) {
            include('vue/vue_contact_envoyer.php');
        }
        elseif($page == 5) {
            include('vue/vue_connexion_client.php');
        }
        elseif($page == 51) {
            include('vue/vue_mdp_oublier.php');
        }
        elseif($page == 52) {
            include('vue/vue_mdp_reinitialise.php');
        }
        elseif($page == 6) {
            include('vue/vue_deconnexion_client.php'); 
        }
        elseif($page == 7) {
            include('vue/vue_inscription_client.php');
        }
        elseif($page == 8) {
            include('vue/vue_legal.php');
        }
        elseif($page == 9) {
            include('vue/vue_plan.php');
        }
        elseif ($page == 10) {
            include('vue/vue_sortie_formulaire.php');
        }
        else {
            include('vue/vue_accueil.php');
        }
    }
    else {
        include('vue/vue_accueil.php');
    }
    require_once('vue/composant/vue_footer.php');
    ?>
    <!-------------------     Bootstrap    --------------------->
    <!-- CND -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script> -->
    <!-- local -->
    <script src="public/assets/bootstrap_5/js/bootstrap.bundle.min.js"></script>
    <!---------------------------------------------------------->
    <script src="public/assets/js/scroll_top.js"></script>
</body>
</html>