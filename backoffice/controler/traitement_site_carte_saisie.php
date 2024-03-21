<?php
$texte_page_courante = '';

// récupération des données pour un update
if (isset($_GET['id'])
&& $_GET['id'] != NULL
){
    $id_assiette = intval($_GET['id']);
    $texte_page_courante = '<h2>Modifier les champs, tous les champs sont obligatoires</h2>';
    // récupération 
    $donnees = req_assiette($bdd, $id_assiette);
    
    $nom_assiette = $donnees['nom_assiette'];
    $liste_ingredients_assiette = $donnees['liste_ingredients_assiette'];
    $prix_assiette = $donnees['prix_assiette'];
    $id_cat = $donnees['id_cat'];


}
else {
    $texte_page_courante = '<h2>Remplissez les champs, tous les champs sont obligatoires</h2>';
    $nom_assiette = '';
    $liste_ingredients_assiette = '';
    $prix_assiette = '';
    $id_cat = '';
}

// INSERT et UPDATE
if (isset($_POST['nom_assiette'],
$_POST['liste_ingredients_assiette'], 
$_POST['prix_assiette'],
$_POST['id_cat']
) 
&& $_POST['nom_assiette'] != NULL
&& $_POST['liste_ingredients_assiette'] != NULL
&& $_POST['prix_assiette'] != NULL
&& $_POST['id_cat'] != NULL
) {
    $nom_assiette = htmlspecialchars($_POST['nom_assiette']);
    $liste_ingredients_assiette = htmlspecialchars($_POST['liste_ingredients_assiette']);
    $prix_assiette = gestion_prix(htmlspecialchars($_POST['prix_assiette']));
    $id_cat = htmlspecialchars($_POST['id_cat']);


    if (isset($_GET['id'])
    && $_GET['id'] != NULL
    ){
        $id_assiette = intval($_GET['id']);
        // UPDATE 
        req_update_assiette($bdd,$id_assiette,$nom_assiette,$liste_ingredients_assiette,$prix_assiette,$id_cat);
    }
    else {
        // INSERT
        req_insert_assiette($bdd,$id_cat,$nom_assiette,$liste_ingredients_assiette,$prix_assiette,1 );
    }

    $texte_page_courante =' <h2>L\'opération à été réalisé avec succès</h2>';
            
}

// récupération des données de la base catégorie
$req_limit = "LIMIT 3";
$categories =req_cat($bdd, $req_limit);

$options_select = '';
foreach ($categories as $donnees) {
    if ($donnees['id_cat'] == $id_cat) {
        $options_select .= '
        <option value="'.$donnees['id_cat'].'" selected>'.$donnees['nom_categorie'].'</option>
        ';
    }
    else {
        $options_select .= '
        <option value="'.$donnees['id_cat'].'">'.$donnees['nom_categorie'].'</option>
        ';  
    }
}
?>