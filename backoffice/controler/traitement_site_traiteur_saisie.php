<?php
$dossier = '../public/assets/img/plat';
$texte_page_courante = '';
$timestamp = time();



//---------------------------------------------------------------------------------------
//                       récupération des données pour un update
//---------------------------------------------------------------------------------------
if (isset($_GET['id'])
&& $_GET['id'] != NULL
){
    $id_menu = intval($_GET['id']);
    $texte_page_courante = '<h2>Modifier les champs, tous les champs sont obligatoires</h2>';

    // récupération du nom et du prix
    $donnees = req_un_menu($bdd, $id_menu);

    $nom_menu = $donnees['nom_menu'];
    $prix_menu = $donnees['prix_menu'];

    // récupération des 3 assiettes : 
    // entrée
    $donnees = req_assiette_menu($bdd, $id_menu, 1);
    $id_entree = $donnees['id_assiette'];

    // plat
    $donnees = req_assiette_menu($bdd, $id_menu, 2);
    $id_plat = $donnees['id_assiette'];

    // dessert
    $donnees = req_assiette_menu($bdd, $id_menu, 3);
    $id_dessert = $donnees['id_assiette'];

    // //récupération des images
    // // gauche
    // $requete = "SELECT * FROM illustration_menu
    //             WHERE id_menu = :id_menu AND position_image = 1
    // ";
    // $req = $bdd->prepare($requete);
    // $req->bindValue(':id_menu', $id_menu, PDO::PARAM_INT);
    // $req -> execute();
    // while($donnees = $req->fetch()) {
    //     $id_image_gauche = $donnees['id_image'];
    // }
    // // droite
    // $requete = "SELECT * FROM illustration_menu
    //             WHERE id_menu = :id_menu AND position_image = 2
    // ";
    // $req = $bdd->prepare($requete);
    // $req->bindValue(':id_menu', $id_menu, PDO::PARAM_INT);
    // $req -> execute();
    // while($donnees = $req->fetch()) {
    //     $id_image_droite = $donnees['id_image'];
    // }
}
else {
    $texte_page_courante = '<h2>Remplissez les champs, tous les champs sont obligatoires</h2>';

    $id_menu = '';
    $nom_menu = 'Menu Entreprise';
    $prix_menu = '';
    $id_entree = '';
    $id_plat = '';
    $id_dessert = '';
    // $id_image_gauche = '';
    // $id_image_droite = '';
}
// -----------------------------------------------------------------------------------
//                                 INSERT et UPDATE
// -----------------------------------------------------------------------------------

//----------------------------------
//              MENU
//----------------------------------
if (isset($_POST['nom_menu'],
$_POST['prix_menu']
) 
&& $_POST['nom_menu'] != NULL
&& $_POST['prix_menu'] != NULL
) {
    $nom_menu = htmlspecialchars($_POST['nom_menu']);
    $prix_menu = htmlspecialchars($_POST['prix_menu']);

    
    if (isset($_GET['id'])
    && $_GET['id'] != NULL
    ){
        $id_menu = intval($_GET['id']);
        // UPDATE 
        req_update_menu($bdd,$id_menu,$nom_menu,$prix_menu);

    }
    else {
        // INSERT
        $donnees = req_insert_menu($bdd,$nom_menu,$prix_menu);
        
        $id_menu = $donnees['id_menu'];
    }

    $texte_page_courante =' <h2>L\'opération sur le menu à été réalisé avec succès</h2>';
            
}

// --------------------------------------
//        ENTREE, PLAT, DESSERT
// --------------------------------------

//---------
//  entree
//---------
if (isset($_POST['nom_entree'],
$_POST['liste_entree']
) 
&& $_POST['nom_entree'] != NULL
&& $_POST['liste_entree'] != NULL
) {
    // création d'une nouvelle assiette
    $nom_entree = htmlspecialchars($_POST['nom_entree']);
    $liste_entree = htmlspecialchars($_POST['liste_entree']);
        
    req_insert_assiette($bdd,1,$nom_entree,$liste_entree,0,0);

    // récupération de l'id juste créée
    $donnees = req_last_assiette($bdd);
    $id_entree = $donnees['id_assiette'];

   
    $texte_page_courante =' <h2>L\'opération sur le menu à été réalisé avec succès</h2>';
    
}
elseif (isset($_POST['select_entree'])
&& $_POST['select_entree'] != NULL
) {
    // récupère une assiette déjà existante
    $id_entree = $_POST['select_entree'];
    $texte_page_courante =' <h2>L\'opération sur le menu à été réalisé avec succès</h2>';
}
//-------
// plat
//-------
if (isset($_POST['nom_plat'],
$_POST['liste_plat']
) 
&& $_POST['nom_plat'] != NULL
&& $_POST['liste_plat'] != NULL
) {
    // création d'une nouvelle assiette
    $nom_plat = htmlspecialchars($_POST['nom_plat']);
    $liste_plat = htmlspecialchars($_POST['liste_plat']);
        
    req_insert_assiette($bdd,2,$nom_plat,$liste_plat,0,0 );

    // récupération de l'id juste créée
    $donnees = req_last_assiette($bdd);
    $id_plat = $donnees['id_assiette'];

    $texte_page_courante =' <h2>L\'opération sur le menu à été réalisé avec succès</h2>';
    
}
elseif (isset($_POST['select_plat'])
&& $_POST['select_plat'] != NULL
) {
    // récupère une assiette déjà existante
    $id_plat = $_POST['select_plat'];
    $texte_page_courante =' <h2>L\'opération sur le menu à été réalisé avec succès</h2>';
}
//-------
//dessert
//-------
if (isset($_POST['nom_dessert'],
$_POST['liste_dessert']
) 
&& $_POST['nom_dessert'] != NULL
&& $_POST['liste_dessert'] != NULL
) {
    // création d'une nouvelle assiette
    $nom_dessert = htmlspecialchars($_POST['nom_dessert']);
    $liste_dessert = htmlspecialchars($_POST['liste_dessert']);
        
    req_insert_assiette($bdd,3,$nom_dessert,$liste_dessert,0,0 );

    // récupération de l'id juste créée
    $donnees = req_last_assiette($bdd);
    $id_dessert = $donnees['id_assiette'];

    $texte_page_courante =' <h2>L\'opération sur le menu à été réalisé avec succès</h2>';
    
}
elseif (isset($_POST['select_dessert'])
&& $_POST['select_dessert'] != NULL
) {
    // récupère une assiette déjà existante
    $id_dessert = $_POST['select_dessert'];
    $texte_page_courante =' <h2>L\'opération sur le menu à été réalisé avec succès</h2>';
}

// update et insert de la composition du menu
// test si il existe déjà des assiettes associé à ce menu
$si_assiettes = req_un_menu_2($bdd,$id_menu);

$test = $si_assiettes[0];
$assiettes = $si_assiettes[1];

if ($test != 0) {
    foreach ($assiettes as $assiette) {
        req_sup_assiette_menu($bdd,$id_menu,$assiette['id_cat']);
    }
}


if ($id_entree != '') {
    //insert 
    req_insert_assiette_menu($bdd,$id_menu,$id_entree,1);
}
if ($id_plat != '') {
    req_insert_assiette_menu($bdd,$id_menu,$id_plat,2);
}
if ($id_dessert != '') {
    req_insert_assiette_menu($bdd,$id_menu,$id_dessert,3);
}


//-------------------------------------------------------------------------
//               récupération des assiette dans la BDD
//-------------------------------------------------------------------------
// liste des entrées
$req_where = " WHERE categories_assiettes.id_cat = 1 ";
$req_ordre = "";

$entree = req_assiettes($bdd,$req_where,$req_ordre);

$options_entree = '';
foreach ($entree as $donnees) {
    if ($donnees['id_assiette'] == $id_entree) {
        $options_entree .= '
        <option value="'.$donnees['id_assiette'].'" selected>'.$donnees['nom_assiette'].'</option>
        ';
    }
    else {
        $options_entree .= '
        <option value="'.$donnees['id_assiette'].'">'.$donnees['nom_assiette'].'</option>
        ';  
    }
}
// liste des plats
$req_where = "WHERE categories_assiettes.id_cat = 2 ";

$plats = req_assiettes($bdd,$req_where,$req_ordre);

$options_plat = '';
foreach ($plats as $donnees) {
    if ($donnees['id_assiette'] == $id_plat) {
        $options_plat .= '
        <option value="'.$donnees['id_assiette'].'" selected>'.$donnees['nom_assiette'].'</option>
        ';
    }
    else {
        $options_plat .= '
        <option value="'.$donnees['id_assiette'].'">'.$donnees['nom_assiette'].'</option>
        ';  
    }
}
// liste des dessert
$req_where = "WHERE categories_assiettes.id_cat = 3 ";

$dessert = req_assiettes($bdd,$req_where,$req_ordre);

$options_dessert = '';
foreach ($dessert as $donnees) {
    if ($donnees['id_assiette'] == $id_dessert) {
        $options_dessert .= '
        <option value="'.$donnees['id_assiette'].'" selected>'.$donnees['nom_assiette'].'</option>
        ';
    }
    else {
        $options_dessert .= '
        <option value="'.$donnees['id_assiette'].'">'.$donnees['nom_assiette'].'</option>
        ';  
    }
}

?>