<?php
$dossier = '../public/assets/img/plat';
$texte_page_courante = '';
$timestamp = time();



// récupération des données en get
if (isset($_GET['id'],
          $_GET['img'],
          $_GET['ins'])
&& $_GET['id'] != NULL
&& $_GET['img'] != NULL
&& $_GET['ins'] != NULL
){
    $id_menu = intval($_GET['id']);
    $position_image = intval($_GET['img']);
    // $id_cat = 8;
    $texte_page_courante = '<h2>Tous les champs sont obligatoires</h2>';

    if (intval($_GET['ins']) == 0 ) { // INSERT
        if (isset($_FILES['photo']) && $_FILES['photo'] != NULL) {
            if (isset($_POST['nom_image'], 
                      $_POST['id_cat']) 
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
                    
                        // insert image
                        req_insert_img_menu($bdd,$nom_image,$id_cat,$id_menu,$position_image);
                
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
    }
    elseif (intval($_GET['ins']) == 1 ) { // UPDATE
        if (isset($_FILES['photo']) && $_FILES['photo'] != NULL) {
            if (isset($_POST['nom_image'], 
                      $_POST['id_cat']) 
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
                        
                        req_update_img_menu($bdd,$id_menu,$position_image,$nom_image,$id_cat);
                
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
    }
   
}
else {
    $texte_page_courante = '<h2>Vous n\'êtes pas arrivé par le bon chemin faites demi-tour</h2>';
}

// 


// récupération des catégories dans la BDD
$req_limit = "LIMIT 7,1";
$categories = req_cat($bdd, $req_limit);

$options_select = '';
foreach ($categories as $donnees) {
    $options_select .= '
    <option value="'.$donnees['id_cat'].'" selected>'.$donnees['nom_categorie'].'</option>
    ';
}

?>