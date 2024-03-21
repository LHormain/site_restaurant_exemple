<?php
$dossier = '../public/assets/img/plat';
$texte_page_courante = '';
$timestamp = time();


// récupération des données pour un update
if (isset($_GET['id'])
&& $_GET['id'] != NULL
){
    $id_image = intval($_GET['id']);
    $texte_page_courante = '<h2>Modifier les champs, tous les champs sont obligatoires</h2>';

    $donnees = req_image($bdd,$id_image);

    $nom_image = substr($donnees['nom_image'], 0, strrpos($donnees['nom_image'], "."));
    $id_cat = $donnees['id_cat'];
}
else {
    $texte_page_courante = '<h2>Remplissez les champs, tous les champs sont obligatoires</h2>';
    $nom_image = '';
    $id_cat = '';
}

// INSERT
if (isset($_FILES['photo']) && $_FILES['photo'] != NULL) {
    if (isset($_POST['nom_image'], $_POST['id_cat']
        ) 
        && $_POST['nom_image'] != NULL
        && $_POST['id_cat'] != NULL
        ) {
            $nom_image = htmlspecialchars($_POST['nom_image']).$timestamp;
            $id_cat = intval($_POST['id_cat']);

        $extensions_valides = array('jpeg','jpg','png', 'gif', 'webp'); 
     	$extension_upload = substr(strrchr($_FILES['photo']['name'],'.'),1);

         if(in_array($extension_upload, $extensions_valides)) {     
            $nom_image = $nom_image.'.'.$extension_upload;
            $chemin = $dossier."/".$nom_image;       
            $resultat = move_uploaded_file($_FILES['photo']['tmp_name'], $chemin);  
            if($resultat) {
                echo '<h2 class="mt-5">Transfert reussi</h2>';   
                
                if (isset($_GET['id'])
                && $_GET['id'] != NULL
                ){
                    $id_image = intval($_GET['id']);
                    // UPDATE avec nouvelle image
                    req_update_image($bdd,$id_image,$nom_image,$id_cat);
                }
                else {
                    // INSERT
                    req_insert_image($bdd,$id_cat,$nom_image);
                }
                $texte_page_courante =' <h2>L\'opération à été réalisé avec succès</h2>';
			} 
            else {
                $texte_page_courante = '<h2>Un problème s\'est produit.</h2>';
            }
		}
        else {
    
            $texte_page_courante =' <h2>votre fichier n\'est pas valide.</h2>';
        }
    }
}

// récupération des catégories dans la BDD
    $req_limit = "Limit 3";
    $categories = req_cat($bdd, $req_limit);

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