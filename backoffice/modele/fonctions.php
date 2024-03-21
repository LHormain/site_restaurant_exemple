<?php
// ----------------------------------------------------------------------------------
//                                   Accueil
// ----------------------------------------------------------------------------------
function req_message_non_lu($bdd) {
    $requete = "SELECT COUNT(id_message) AS nbr_messages FROM messages 
                WHERE lu_message = 0 ";
    $req = $bdd->prepare($requete);
    $req -> execute();

    $donnees = $req -> fetch();
    return $donnees;
}
function req_devis_en_attente($bdd) {
    $requete = "SELECT COUNT(id_devis) AS nbr_devis FROM devis 
                WHERE id_etat = 1 ";
    $req = $bdd->prepare($requete);
    $req -> execute();
    
    $donnees = $req -> fetch();
    return $donnees;
}
// ----------------------------------------------------------------------------------
//                         Gestion Restaurant
// ----------------------------------------------------------------------------------
// si le prix à une virgule changement par point
function gestion_prix($prix_produit) {
    if (str_contains($prix_produit, ',')) {
        $prix_produit = str_replace(',', '.', $prix_produit);
     }
     return $prix_produit;
}
// affichage du tableau gestion de la carte
function table_carte_gestion($nom_assiette,$liste_ingredients_assiette,$prix_assiette,$nom_categorie,$afficher_assiette,$id_assiette,$dans_menu) {
    $boite = '
    <tr class="table-primary" >
        <td scope="row">'.$nom_assiette.'</td>
        <td>'.$liste_ingredients_assiette.'</td>
        <td>'.$prix_assiette.'</td>
        <td>'.$nom_categorie.'</td>';
    if ($dans_menu == 1) {
        $boite .= '
        <td><img src="public/asset/img/icones/verifier.png" alt="" class="icone_tab afficher "></td>';
    }
    else {
        $boite .= '
        <td><img src="public/asset/img/icones/verifier.png" alt="" class="icone_tab "></td>';
    }
    if ($afficher_assiette == 1) {
        $boite .= '
            <td><button type="button" class="btn btn-link btn_aff" id="'.$id_assiette.'" value="'.$afficher_assiette.'"><img src="public/asset/img/icones/verifier.png" alt="" class="icone_tab afficher changer"></button></td>';
    }
    else {
        $boite .= '
            <td><button type="button" class="btn btn-link btn_aff" id="'.$id_assiette.'"value="'.$afficher_assiette.'"><img src="public/asset/img/icones/verifier.png" alt="" class="icone_tab changer"></button></td>';
    }
    $boite .= '
        <td><a href="index.php?page=3&c=1&id='.$id_assiette.'"><img src="public/asset/img/icones/roue-dentee.png" alt="" class="icone_tab modifier"></a></td>
        <td><a href="index.php?page=3&c=2&sup='.$id_assiette.'" onclick="return(confirm(\'Voulez vous supprimer cette entrée ?\'))"><img src="public/asset/img/icones/poubelle.png" alt="" class="icone_tab supprimer"></a></td>
    </tr>
    ';

    return $boite;
}

// détermine si une assiette est dans la table composition_menu
function dans_menu($bdd,$id_assiette) {
    $requete = "SELECT id_menu FROM composition_menu 
                WHERE id_assiette = $id_assiette LIMIT 1";
    $req = $bdd->prepare($requete);
    $req -> execute();

    $test = '';
    while ($donnees = $req -> fetch()) {
        $test = $donnees['id_menu'];
    }
    
    if ($test != '') {
        $dans_menu = 1;
    }
    else {
        $dans_menu = 0;
    }
    return $dans_menu;
}

// affichage du tableau de gestion des images
function table_image_gestion($nom_image,$nom_categorie,$id_image,$ordre_affichage_image,$afficher_image) {
    $boite ='
    <tr class="table-primary" >
        <td scope="row"><img src="../public/assets/img/plat/'.$nom_image.'" class="img_tab"></td>
        <td>'.$nom_categorie.'</td>
        <td id="'.$id_image.'"><input type="text" id="ordre'.$id_image.'" value="'.$ordre_affichage_image.'" class="input_dispo"></td>'; 
    if ($afficher_image == 1) {
        $boite .= '
            <td><button type="button" class="btn btn-link btn_aff" id="aff'.$id_image.'" value="'.$afficher_image.'"><img src="public/asset/img/icones/verifier.png" alt="" class="icone_tab afficher changer"></button></td>';
    }
    else {
        $boite .= '
            <td><button type="button" class="btn btn-link btn_aff" id="aff'.$id_image.'" value="'.$afficher_image.'"><img src="public/asset/img/icones/verifier.png" alt="" class="icone_tab changer"></button></td>';
    }
    $boite .= '
        <td><a href="index.php?page=31&c=1&id='.$id_image.'"><img src="public/asset/img/icones/roue-dentee.png" alt="" class="icone_tab modifier"></a></td>
        <td><a href="index.php?page=31&c=2&sup='.$id_image.'" onclick="return(confirm(\'Voulez vous supprimer cette entrée ?\'))"><img src="public/asset/img/icones/poubelle.png" alt="" class="icone_tab supprimer"></a></td>
    </tr>
    ';

    return $boite;
}

// affichage du tableau gestion de la carte boisson
function table_carte_gestion_boisson($nom_assiette,$liste_ingredients_assiette,$prix_assiette,$nom_categorie,$afficher_assiette,$id_assiette) {
    $boite = '
    <tr class="table-primary" >
        <td scope="row">'.$nom_assiette.'</td>
        <td>'.$liste_ingredients_assiette.'</td>
        <td>'.$prix_assiette.'</td>
        <td>'.$nom_categorie.'</td>';
    
    if ($afficher_assiette == 1) {
        $boite .= '
            <td><button type="button" class="btn btn-link btn_aff" id="aff'.$id_assiette.'" value="'.$afficher_assiette.'"><img src="public/asset/img/icones/verifier.png" alt="" class="icone_tab afficher changer"></button></td>';
    }
    else {
        $boite .= '
            <td><button type="button" class="btn btn-link btn_aff" id="aff'.$id_assiette.'" value="'.$afficher_assiette.'"><img src="public/asset/img/icones/verifier.png" alt="" class="icone_tab changer"></button></td>';
    }
    $boite .= '
        <td><a href="index.php?page=33&c=1&id='.$id_assiette.'"><img src="public/asset/img/icones/roue-dentee.png" alt="" class="icone_tab modifier"></a></td>
        <td><a href="index.php?page=33&c=2&sup='.$id_assiette.'" onclick="return(confirm(\'Voulez vous supprimer cette entrée ?\'))"><img src="public/asset/img/icones/poubelle.png" alt="" class="icone_tab supprimer"></a></td>
    </tr>
    ';

    return $boite;
}

// affichage du tableau gestion du menu carte
function table_carte_gestion_menu($nom_entree, $nom_plat, $nom_dessert, $id_menu, $afficher_menu, $a_img_g, $a_img_d, $nom_img_g, $nom_img_d, $nom_menu, $prix_menu) {
    $boite = '
    <tr class="table-primary">
        <td scope="row">'.$id_menu.'</td>
        <td>'.$nom_menu.'</td>
        <td>'.$prix_menu.'</td>
        <td>'.$nom_entree.'</td>
        <td>'.$nom_plat.'</td>
        <td>'.$nom_dessert.'</td>';
    // image de gauche position = 0
    if ($a_img_g == 1) {
        $action = 1; // update
        $icone = '../public/assets/img/plat/'.$nom_img_g;
        $class = 'img_tab';
    }
    else {
        $action = 0; // insert
        $icone = 'public/asset/img/icones/pictures.png';
        $class = 'icone_tab modifier';
    }
    $boite .= '
        <td><a href="index.php?page=32&c=3&id='.$id_menu.'&img=0&ins='.$action.'"><img src="'.$icone.'" class="'.$class.'"></a></td>';
    // image de droite position = 1
    if ($a_img_d == 1) {
        $action = 1; // update
        $icone = '../public/assets/img/plat/'.$nom_img_d;
        $class = 'img_tab';
    }
    else {
        $action = 0; // insert
        $icone = 'public/asset/img/icones/pictures.png';
        $class = 'icone_tab modifier';
    }
    $boite .= '
        <td><a href="index.php?page=32&c=3&id='.$id_menu.'&img=1&ins='.$action.'"><img src="'.$icone.'" class="'.$class.'"></a></td>';
    // affichage sur menus
    if ($afficher_menu == 1){
        $boite .= '
            <td><button type="button" class="btn btn-link btn_aff" id="aff'.$id_menu.'" value="'.$afficher_menu.'"><img src="public/asset/img/icones/verifier.png" alt="" class="icone_tab afficher changer"></button></td>';
    }
    else {
        $boite .= '
            <td><button type="button" class="btn btn-link btn_aff" id="aff'.$id_menu.'" value="'.$afficher_menu.'"><img src="public/asset/img/icones/verifier.png" alt="" class="icone_tab changer"></button></td>';
    }
    $boite .= '
        <td><a href="index.php?page=32&c=1&id='.$id_menu.'"><img src="public/asset/img/icones/roue-dentee.png" alt="" class="icone_tab modifier"></a></td>
        <td><a href="index.php?page=32&c=2&sup='.$id_menu.'" onclick="return(confirm(\'Voulez vous supprimer cette entrée ?\'))"><img src="public/asset/img/icones/poubelle.png" alt="" class="icone_tab supprimer"></a></td>
    </tr>
    ';

    return $boite;
}
// détermine si un menu a une image
function a_image($bdd,$id_menu,$position_img) {
    $requete = "SELECT id_image FROM illustration_menu 
                WHERE id_menu = $id_menu AND position_image = $position_img 
                LIMIT 1";
    $req2 = $bdd->prepare($requete);
    $req2 -> execute();

    $test = '';
    while ($donnees = $req2 -> fetch()) {
        $test = $donnees['id_image'];
    }
    
    if ($test != '') {
        $a_image = 1;
    }
    else {
        $a_image = 0;
    }
    return $a_image;
}
// retourne le nom d'une image du menu si elle existe
function trouve_nom_image($bdd,$a_image, $id_menu, $position_img) {
    if ($a_image == 1) {
        $requete = "SELECT images.nom_image FROM images 
                    INNER JOIN illustration_menu ON images.id_image = illustration_menu.id_image
                    WHERE illustration_menu.id_menu = $id_menu AND illustration_menu.position_image = $position_img";
        $req2 = $bdd->prepare($requete);
        $req2 -> execute();

        $donnees2 = $req2 -> fetch();
        $nom_image = $donnees2['nom_image'];
        return $nom_image;
    }
}
//  --------------------- assiettes ---------------------------
// retourne le nom d'une assiette appartenant à un menu
function trouve_nom_assiette($bdd,$cat_assiette, $id_menu) {
    $requete = "SELECT assiettes.nom_assiette FROM assiettes
                INNER JOIN composition_menu ON assiettes.id_assiette = composition_menu.id_assiette
                WHERE composition_menu.id_menu = $id_menu AND composition_menu.id_cat = $cat_assiette";
    $req2 = $bdd->prepare($requete);
    $req2 -> execute();

    $donnees2 = $req2 -> fetch();
    return $donnees2['nom_assiette'];
}

// delete assiette
function req_sup_assiette($bdd,$id_assiette) {
    $requete = "DELETE FROM assiettes WHERE id_assiette = :id_assiette"; // ne pas oublier le where !!!
    $req = $bdd->prepare($requete);
    $req->bindValue(':id_assiette', $id_assiette, PDO::PARAM_INT);
    $req -> execute();
}
// récupère assiettes
function req_assiettes($bdd,$req_where,$req_ordre) {
    $requete = 'SELECT * FROM assiettes 
                INNER JOIN categories_assiettes ON categories_assiettes.id_cat = assiettes.id_cat
                '.$req_where
                .$req_ordre; 
    $req = $bdd->prepare($requete);
    $req -> execute();

    $donnees = $req -> fetchAll();
    return $donnees;
}
// récupère une assiette précise
function req_assiette($bdd, $id_assiette) {
    $requete = "SELECT * FROM `assiettes` 
                WHERE id_assiette = :id_assiette";
    $req = $bdd->prepare($requete);
    $req->bindValue(':id_assiette', $id_assiette, PDO::PARAM_INT);
    $req -> execute();

    $donnees = $req -> fetch();
    return $donnees;
}
// update assiette
function req_update_assiette($bdd,$id_assiette,$nom_assiette,$liste_ingredients_assiette,$prix_assiette,$id_cat) {
    $requete = "UPDATE `assiettes` SET nom_assiette = :nom_assiette, 
                                        liste_ingredients_assiette = :liste_ingredients_assiette, 
                                        prix_assiette = :prix_assiette, 
                                        id_cat = :id_cat 
                WHERE id_assiette = :id_assiette"; 
    $req = $bdd->prepare($requete);
    $req->bindValue(':id_assiette', $id_assiette, PDO::PARAM_INT); 
    $req->bindValue(':nom_assiette', $nom_assiette, PDO::PARAM_STR);  
    $req->bindValue(':liste_ingredients_assiette',$liste_ingredients_assiette, PDO::PARAM_STR); 
    $req->bindValue(':prix_assiette',$prix_assiette, PDO::PARAM_STR); 
    $req->bindValue(':id_cat', $id_cat, PDO::PARAM_INT); 
    $req -> execute();
}
// insert assiette
function req_insert_assiette($bdd,$id_cat,$nom_assiette,$liste_ingredients_assiette,$prix_assiette,$afficher_assiette ) {
    $requete = "INSERT INTO `assiettes`(`id_assiette`, `nom_assiette`, `liste_ingredients_assiette`, `prix_assiette`, `afficher_assiette`, `id_cat`) 
                VALUES (0,:nom_assiette, :liste_ingredients_assiette, :prix_assiette, $afficher_assiette, :id_cat)"; 
    $req = $bdd->prepare($requete);
    $req->bindValue(':nom_assiette', $nom_assiette, PDO::PARAM_STR);  
    $req->bindValue(':liste_ingredients_assiette',$liste_ingredients_assiette, PDO::PARAM_STR); 
    $req->bindValue(':prix_assiette',$prix_assiette, PDO::PARAM_STR); 
    $req->bindValue(':id_cat', $id_cat, PDO::PARAM_INT); 
    $req -> execute();
}
// récupère la dernière assiette créée
function req_last_assiette($bdd) {
    $requete = "SELECT * FROM assiettes 
                ORDER BY id_assiette DESC 
                LIMIT 1";
    $req = $bdd->prepare($requete);
    $req -> execute();
    $donnees = $req->fetch();
    return $donnees;
}
// récupère categorie assiette
function req_cat($bdd, $req_limit) {
    $requete = 'SELECT * FROM `categories_assiettes` 
                ORDER BY id_cat 
                '.$req_limit;
    $req2 = $bdd->prepare($requete);
    $req2 -> execute();

    $donnees = $req2 -> fetchAll();
    return $donnees;
}
// ------------------------------ images ----------------------------------
// select image précise
function req_image($bdd,$id_image) {
    $requete = "SELECT * FROM `images` WHERE id_image = :id_image";
    $req = $bdd->prepare($requete);
    $req->bindValue(':id_image', $id_image, PDO::PARAM_INT);
    $req -> execute();

    $donnees = $req -> fetch();
    return $donnees;
}
// delete image carte
function req_sup_img_carte($bdd,$id_image) {
    // efface l'image dans le dossier
    $nom_image = req_image($bdd,$id_image);
    $chemin = '../public/assets/img/plat/'.$nom_image['nom_image'];
    if (file_exists($chemin)) {
        unlink($chemin);
        // echo 'image effacer';
    }
    // else { echo 'erreur';} 
    
    $requete = "DELETE FROM images WHERE id_image = :id_image"; // ne pas oublier le where !!!
    $req = $bdd->prepare($requete);
    $req->bindValue(':id_image', $id_image, PDO::PARAM_INT);
    $req -> execute();
}
// select images carte
function req_images($bdd) {
    $requete = "SELECT * FROM images 
                INNER JOIN categories_assiettes ON images.id_cat = categories_assiettes.id_cat
                ORDER BY images.id_cat
                "; 
    $req = $bdd->prepare($requete);
    $req -> execute();

    $donnees = $req -> fetchAll();
    return $donnees;
}
// update image
function req_update_image($bdd,$id_image,$nom_image,$id_cat) {
    // efface l'image dans le dossier
    $old_image = req_image($bdd,$id_image);
    $chemin = '../public/assets/img/plat/'.$old_image['nom_image'];
    if (file_exists($chemin)) {
        unlink($chemin);
        // echo 'image effacer';
    }
    // else { echo 'erreur';} 
    $requete = "UPDATE `images` SET nom_image = :nom_image, 
                                    id_cat = :id_cat 
                WHERE id_image = :id_image"; 
    $req = $bdd->prepare($requete);
    $req->bindValue(':id_image', $id_image, PDO::PARAM_INT); 
    $req->bindValue(':nom_image', $nom_image, PDO::PARAM_STR);  
    $req->bindValue(':id_cat', $id_cat, PDO::PARAM_INT); 
    $req -> execute();
}
// insert image carte
function req_insert_image($bdd,$id_cat,$nom_image) {
                    // vérification si il existe déjà une image pour ce produit et ajoute image avec position après la dernière
    $requete = "SELECT * FROM images
                INNER JOIN categories_assiettes ON images.id_cat = categories_assiettes.id_cat
                WHERE images.id_cat = :id_cat
                ";
    $req = $bdd->prepare($requete);
    $req->bindValue(':id_cat', $id_cat, PDO::PARAM_INT);
    $req -> execute();
    
    $i = 0;
    while($donnees = $req->fetch()) {
        if ($donnees['ordre_affichage_image'] > $i) { $i = $donnees['ordre_affichage_image'];}
    }
    $position_image = $i + 1;
    $requete = "INSERT INTO `images`(`id_image`, `nom_image`, `afficher_image`, `ordre_affichage_image`, `id_cat`)
                VALUES (0,:nom_image, 1,$position_image, :id_cat)"; 
    $req = $bdd->prepare($requete);
    $req->bindValue(':nom_image', $nom_image, PDO::PARAM_STR);  
    $req->bindValue(':id_cat', $id_cat, PDO::PARAM_INT); 
    $req -> execute();
}
// ------------------------- menus ------------------------------------
// efface un menu en entier
function req_sup_menu($bdd, $id_menu) {
    // efface la composition du menu
    $requete = "DELETE FROM composition_menu WHERE id_menu = :id_menu"; // ne pas oublier le where !!!
    $req = $bdd->prepare($requete);
    $req->bindValue(':id_menu', $id_menu, PDO::PARAM_INT);
    $req -> execute();

    // efface les images dans le dossier
    $requete = "SELECT * FROM images 
                INNER JOIN illustration_menu ON images.id_image = illustration_menu.id_image
                WHERE id_menu = :id_menu";
    $req = $bdd->prepare($requete);
    $req->bindValue(':id_menu', $id_menu, PDO::PARAM_INT);
    $req -> execute();

    $id_image = array();
    $i = 0;
    while ($image = $req-> fetch()) {
        $id_image[$i] = $image['id_image'];
        $chemin = '../public/assets/img/plat/'.$image['nom_image'];
        if (file_exists($chemin)) {
            unlink($chemin);
            // echo 'image effacer';
        }
        // else { echo 'erreur';} 
    }

    // efface la table d'illustration du menu
    $requete = "DELETE FROM illustration_menu WHERE id_menu = :id_menu"; // ne pas oublier le where !!!
    $req = $bdd->prepare($requete);
    $req->bindValue(':id_menu', $id_menu, PDO::PARAM_INT);
    $req -> execute();

    // efface les images dans la table images
    for ($i = 0; $i < count($id_image); $i++) {
        $requete = "DELETE FROM images WHERE id_image = :id_image"; // ne pas oublier le where !!!
        $req = $bdd->prepare($requete);
        $req->bindValue(':id_image', $id_image[$i], PDO::PARAM_INT);
        $req -> execute();

    }

    // efface le menu
    $requete = "DELETE FROM menus WHERE id_menu = :id_menu"; // ne pas oublier le where !!!
    $req = $bdd->prepare($requete);
    $req->bindValue(':id_menu', $id_menu, PDO::PARAM_INT);
    $req -> execute();
}
// sélectionne les menus
function req_menus($bdd, $req_where) {
    $requete = 'SELECT * FROM menus
                INNER JOIN composition_menu ON menus.id_menu = composition_menu.id_menu
                '.$req_where.'
                GROUP BY composition_menu.id_menu'; 
    $req = $bdd->prepare($requete);
    $req -> execute();

    $donnees = $req -> fetchAll();
    return $donnees;
}
// insert image menu 
function req_insert_img_menu($bdd,$nom_image,$id_cat,$id_menu,$position_image) {
    $requete = "INSERT INTO `images`(`id_image`, `nom_image`, `afficher_image`, `ordre_affichage_image`, `id_cat`)
                VALUES (0,:nom_image, 1,0, :id_cat)"; 
    $req = $bdd->prepare($requete);
    $req->bindValue(':nom_image', $nom_image, PDO::PARAM_STR);  
    $req->bindValue(':id_cat', $id_cat, PDO::PARAM_INT); 
    $req -> execute();

    // récupère l'id créée
    $requete = "SELECT id_image FROM images
                ORDER BY id_image DESC 
                LIMIT 1";
    $req = $bdd->prepare($requete);
    $req -> execute();
    $donnees = $req -> fetch();
    $id_image = $donnees['id_image'];

    // crée l'entrée dans la table illustration image
    $requete = "INSERT INTO illustration_menu 
                VALUES ($id_image, :id_menu, :position_image)";
    $req = $bdd->prepare($requete);
    $req->bindValue(':id_menu', $id_menu, PDO::PARAM_INT); 
    $req->bindValue(':position_image', $position_image, PDO::PARAM_INT); 
    $req -> execute();
}
//update image menu 
function req_update_img_menu($bdd,$id_menu,$position_image,$nom_image,$id_cat) {
    // récupère l'id de l'image 
    $requete = "SELECT id_image FROM illustration_menu
                WHERE id_menu = :id_menu AND position_image = :position_image";
    $req = $bdd->prepare($requete);
    $req->bindValue(':id_menu', $id_menu, PDO::PARAM_INT); 
    $req->bindValue(':position_image', $position_image, PDO::PARAM_INT); 
    $req -> execute();

    $donnees = $req -> fetch();
    $id_image = $donnees['id_image'];
    $old_image = req_image($bdd,$id_image);
    $chemin = '../public/assets/img/plat/'.$old_image['nom_image'];
    if (file_exists($chemin)) {
        unlink($chemin);
        // echo 'image effacer';
    }
    // else { echo 'erreur';} 

    // UPDATE 
    $requete = "UPDATE `images` SET nom_image = :nom_image, 
                                    id_cat = :id_cat 
                WHERE id_image = :id_image"; 
    $req = $bdd->prepare($requete);
    $req->bindValue(':id_image', $id_image, PDO::PARAM_INT); 
    $req->bindValue(':nom_image', $nom_image, PDO::PARAM_STR);  
    $req->bindValue(':id_cat', $id_cat, PDO::PARAM_INT); 
    $req -> execute();
}
// récupère un menu particulier dans table menu
function req_un_menu($bdd, $id_menu) {
    $requete = "SELECT * FROM `menus` 
                WHERE id_menu = :id_menu";
    $req = $bdd->prepare($requete);
    $req->bindValue(':id_menu', $id_menu, PDO::PARAM_INT);
    $req -> execute();
    $donnees = $req -> fetch();
    return $donnees;
}
// récupère un menu en particulier dans composition menu
function req_un_menu_2($bdd,$id_menu) {
    $requete = "SELECT * FROM composition_menu 
                WHERE id_menu = :id_menu";
    $req = $bdd->prepare($requete);
    $req->bindValue(':id_menu', $id_menu, PDO::PARAM_INT); 
    $req -> execute();

    $assiettes = $req -> fetchAll();
    $nbr = $req -> rowCount();
    $donnees = [$nbr,$assiettes];
    return $donnees;
}
// supprime une assiette de composition menu
function req_sup_assiette_menu($bdd,$id_menu,$id_cat) {
    $requete = "DELETE FROM composition_menu WHERE id_menu = :id_menu AND id_cat = $id_cat ";
    $req = $bdd->prepare($requete);
    $req->bindValue(':id_menu', $id_menu, PDO::PARAM_INT); 
    $req -> execute();
}
// récupération d'une assiette d'un menu
function req_assiette_menu($bdd, $id_menu, $id_cat) {
    $requete = "SELECT * FROM `composition_menu` 
                INNER JOIN assiettes ON assiettes.id_assiette = composition_menu.id_assiette
                WHERE composition_menu.id_menu = :id_menu AND assiettes.id_cat = $id_cat";
    $req = $bdd->prepare($requete);
    $req->bindValue(':id_menu', $id_menu, PDO::PARAM_INT);
    $req -> execute();

    $donnees = $req -> fetch();
    return $donnees;
}
// update menu
function req_update_menu($bdd,$id_menu,$nom_menu,$prix_menu) {
    $requete = "UPDATE `menus` SET nom_menu = :nom_menu, 
                                    prix_menu = :prix_menu 
                WHERE id_menu = :id_menu"; 
    $req = $bdd->prepare($requete);
    $req->bindValue(':id_menu', $id_menu, PDO::PARAM_INT); 
    $req->bindValue(':nom_menu', $nom_menu, PDO::PARAM_STR);  
    $req->bindValue(':prix_menu',$prix_menu, PDO::PARAM_STR); 
    $req -> execute();
}
// insert menu 
function req_insert_menu($bdd,$nom_menu,$prix_menu) {
    $requete = "INSERT INTO `menus`(`id_menu`, `nom_menu`, `prix_menu`, `afficher_menu`) 
                VALUES (0,:nom_menu, :prix_menu, 1)"; 
    $req = $bdd->prepare($requete);
    $req->bindValue(':nom_menu', $nom_menu, PDO::PARAM_STR);  
    $req->bindValue(':prix_menu',$prix_menu, PDO::PARAM_STR); 
    $req -> execute();

    // récupération de l'id juste créée
    $requete = "SELECT * FROM menus 
                ORDER BY id_menu DESC 
                LIMIT 1";
    $req = $bdd->prepare($requete);
    $req -> execute();
    $donnees = $req->fetch();
    return $donnees;
}
// insert dans composition menu 
function req_insert_assiette_menu($bdd,$id_menu,$id_assiette,$id_cat) {
    $requete = "INSERT INTO composition_menu 
                VALUES (:id_entree, :id_menu, $id_cat)";
    $req = $bdd->prepare($requete);
    $req->bindValue(':id_menu', $id_menu, PDO::PARAM_INT);
    $req->bindValue(':id_entree', $id_assiette, PDO::PARAM_INT);
    $req -> execute();
}
// ----------------------------------------------------------------------------------
//                           Gestion traiteur
// ----------------------------------------------------------------------------------
// affichage du tableau gestion du menu traiteur
function table_traiteur_gestion_menu($nom_entree, $nom_plat, $nom_dessert, $id_menu, $afficher_menu, $a_img_g, $a_img_d, $nom_img_g, $nom_img_d, $nom_menu, $prix_menu) {
    $boite = '
    <tr class="table-primary">
        <td scope="row">'.$id_menu.'</td>
        <td>'.$nom_menu.'</td>
        <td>'.$prix_menu.'</td>
        <td>'.$nom_entree.'</td>
        <td>'.$nom_plat.'</td>
        <td>'.$nom_dessert.'</td>';
    // image de gauche position = 0
    if ($a_img_g == 1) {
        $action = 1; // update
        $icone = '../public/assets/img/plat/'.$nom_img_g;
        $class = 'img_tab';
    }
    else {
        $action = 0; // insert
        $icone = 'public/asset/img/icones/pictures.png';
        $class = 'icone_tab modifier';
    }
    $boite .= '
        <td><a href="index.php?page=4&c=4&id='.$id_menu.'&img=0&ins='.$action.'"><img src="'.$icone.'" class="'.$class.'"></a></td>';
    // image de droite position = 1
    if ($a_img_d == 1) {
        $action = 1; // update
        $icone = '../public/assets/img/plat/'.$nom_img_d;
        $class = 'img_tab';
    }
    else {
        $action = 0; // insert
        $icone = 'public/asset/img/icones/pictures.png';
        $class = 'icone_tab modifier';
    }
    $boite .= '
        <td><a href="index.php?page=4&c=4&id='.$id_menu.'&img=1&ins='.$action.'"><img src="'.$icone.'" class="'.$class.'"></a></td>';
    // affichage sur menus
    if ($afficher_menu == 1){
        $boite .= '
            <td><button type="button" class="btn btn-link btn_aff" id="aff'.$id_menu.'" value="'.$afficher_menu.'"><img src="public/asset/img/icones/verifier.png" alt="" class="icone_tab afficher changer"></button></td>';
    }
    else {
        $boite .= '
            <td><button type="button" class="btn btn-link btn_aff" id="aff'.$id_menu.'" value="'.$afficher_menu.'"><img src="public/asset/img/icones/verifier.png" alt="" class="icone_tab changer"></button></td>';
    }
    $boite .= '
        <td><a href="index.php?page=4&c=3&id='.$id_menu.'"><img src="public/asset/img/icones/roue-dentee.png" alt="" class="icone_tab modifier"></a></td>
        <td><a href="index.php?page=4&c=2&sup='.$id_menu.'" onclick="return(confirm(\'Voulez vous supprimer cette entrée ?\'))"><img src="public/asset/img/icones/poubelle.png" alt="" class="icone_tab supprimer"></a></td>
    </tr>
    ';

    return $boite;
}

function table_traiteur_devis($donnees) {
    if ($donnees['id_etat'] == 1) {
        $badge = '<span class="position-absolute top-0 start-50 translate-middle badge rounded-pill bg-danger">
        Nouveau
        <span class="visually-hidden">unread messages</span>
      </span>';
    }
    else {
        $badge ='';
    }
    $boite = '
    <tr class="table-primary" >
        <td scope="row" class="position-relative">'.$donnees['id_devis'].$badge.'</td>
        <td>'.date('Y-m-d',$donnees['date_creation_devis']).'</td>
        <td><a href="index.php?page=6&c=1&id='.$donnees['id_utilisateur'].'">'.$donnees['prenom_utilisateur'].' '.$donnees['nom_utilisateur'].'</a></td>
        <td>'.date('Y-m-d',$donnees['date_evenement_devis']).'</td>
        <td>'.$donnees['type_evenement_devis'].'</td>
        <td><a href="index.php?page=4&c=5&id='.$donnees['id_devis'].'"><img src="public/asset/img/icones/commander.png" alt="" class="icone_tab modifier"></a></td>';
    $boite .= '
        <td><a href="mailto:'.$donnees['mail_utilisateur'].'?subject=Chez%20Roger%20votre%20devis"><img src="public/asset/img/icones/feather-pen.png" alt="" class="icone_tab modifier"></a></td>';
        // <td><a href="index.php?page=345&id='.$donnees['id_devis'].'&c=1"><img src="public/asset/img/icones/feather-pen.png" alt="" class="icone_tab modifier"></a></td>';
    if ($donnees['id_etat'] == 1) {
        $boite .= '
            <td class="bg-warning">';
    }
    elseif ($donnees['id_etat'] == 6) {
        $boite .= '
            <td class="bg-danger text-white">';
    }
    elseif ($donnees['id_etat'] == 7) {
        $boite .= '
            <td class="bg-dark text-white">';
    }
    else {
        $boite .= '
            <td class="bg-success">';
    }
    $boite .= $donnees['nom_etat'].'</td>
    </tr>
    ';

    return $boite;
}

// détermine si le nombre de personne d'un devis est supérieur à la capacité max
function capacite_max_depasser($nbr) {
    $capacite_max = 50;

    if ($nbr > $capacite_max) {
        $depasser = true;
    }
    else {
        $depasser = false;
    }
    return $depasser;
}

// détermine si la date de l'événement est déjà réservé
function date_verification($bdd,$date_evenement, $id_devis) {
    $requete = "SELECT * FROM devis WHERE date_evenement_devis = :date_evenement AND id_etat > 1 AND id_etat < 6";
    $req = $bdd -> prepare($requete);
    $req -> bindValue(':date_evenement', $date_evenement, PDO::PARAM_INT);
    $req -> execute();

    $date = $req -> fetch();
    if ($date != NULL) {
        if ($date['date_evenement_devis'] == $date_evenement && $date['id_devis'] != $id_devis) {
            $reservation = true;
        }
        else {
            $reservation = false;
        }
    }
    else {
        $reservation = false;
    }
    return $reservation;
}

// établissement d'un devis
function devis($donnees) {
    $tarif = tarif();
    $grille_tarifaire = $tarif[0];
    $couvert = $tarif[1];
    $prestation = $tarif[2];
    $prestation_unitaire = $tarif[3];
    $boisson = $tarif[4];
    $boisson_unitaire = $tarif[5];

    $prix = $prestation + ($prestation_unitaire*$donnees['nbr_personnes_devis']) + $boisson + ($boisson_unitaire*$donnees['nbr_personnes_devis']);
    if ($donnees['type_repas_devis'] == 'assiette') {
        $prix += $couvert*$donnees['nbr_personnes_devis'];
    }
    $prix += $donnees['nbr_personnes_devis']*$grille_tarifaire[$donnees['type_evenement_devis']][$donnees['type_repas_devis']];

    return $prix;
}
function tarif() {
    $grille_tarifaire = array (
        "mariage" => array("froid" => 25 ,"chaud" => 35 ,"assiette" => 45,"cocktail" => 25),
        "anniversaire" => array("froid" => 20 ,"chaud" => 25 ,"assiette" => 35 ,"cocktail"=> 25),
        "cocktail" => array("froid" => 20 ,"chaud" => 25 ,"assiette" => 35 ,"cocktail"=> 25),
        "religieux" => array("froid" => 20 ,"chaud" => 25 ,"assiette" => 35 ,"cocktail"=> 25),
        "entreprise" => array("froid" => 20 ,"chaud" => 25 ,"assiette" => 35 ,"cocktail"=> 25),
        "inauguration" => array("froid" => 20 ,"chaud" => 25 ,"assiette" => 35 ,"cocktail"=> 25),
        "seminaire" => array("froid" => 20 ,"chaud" => 25 ,"assiette" => 35 ,"cocktail"=> 25),
        "autre" => array("froid" => 20 ,"chaud" => 25 ,"assiette" => 35 ,"cocktail"=> 25)
    );
    $couvert = 15.00;
    $prestation = 100.00;
    $prestation_unitaire = 25.00;

    $boisson = 50.00;
    $boisson_unitaire = 16.50; // prix max

    $tarif = [$grille_tarifaire,$couvert,$prestation,$prestation_unitaire,$boisson,$boisson_unitaire];
    return $tarif;
}
// devis
function req_devis($bdd,$req_where,$req_ordre,$id_utilisateur) {
    $requete = 'SELECT * from devis
                INNER JOIN utilisateurs ON devis.id_utilisateur = utilisateurs.id_utilisateur
                INNER JOIN etat_devis ON devis.id_etat = etat_devis.id_etat
                '.$req_where
                .$req_ordre;
    $req = $bdd->prepare($requete);
    if ($req_where != '') {
        $req->bindValue(':id_utilisateur', $id_utilisateur, PDO::PARAM_INT);
    }
    $req -> execute(); 

    $donnees = $req -> fetchAll();
    return $donnees;
}
function req_un_devis($bdd,$id_devis) {
    $requete = "SELECT * from devis
                INNER JOIN utilisateurs ON devis.id_utilisateur = utilisateurs.id_utilisateur
                WHERE devis.id_devis = :id_devis
                ";
    $req = $bdd->prepare($requete);
    $req->bindValue(':id_devis', $id_devis, PDO::PARAM_INT);
    $req -> execute();  

    $donnees = $req -> fetch();
    return $donnees;
}
function req_etat_devis($bdd) {
    $requete = "SELECT * FROM etat_devis";
    $req = $bdd->prepare($requete);
    $req -> execute();  
    $donnees = $req -> fetchAll();
    return $donnees;
}
// ----------------------------------------------------------------------------------
//                      Gestion contact/utilisateur
// ----------------------------------------------------------------------------------
// gestion contacts
function table_contact_gestion($donnees) {
    if ($donnees['lu_message'] == 0) {
        $badge = '<span class="position-absolute top-0 start-50 translate-middle badge rounded-pill bg-danger">
        Nouveau
        <span class="visually-hidden">unread messages</span>
      </span>';
    }
    else {
        $badge ='';
    }
    $boite = '
    <tr class="table-primary" >
        <td scope="row"  class="position-relative">'.date('d/m/Y à H:i', $donnees['date_message']).$badge.'</td>
        <td>'.$donnees['nom_message'].'</td>
        <td>'.$donnees['prenom_message'].'</td>
        <td>'.$donnees['mail_message'].'</td>
        <td>'.$donnees['sujet_message'].'</td>
        <td><a href="index.php?page=5&c=2&id='.$donnees['id_message'].'"><img src="public/asset/img/icones/email.png" alt="" class="icone_tab modifier"></a></td>';
    if ($donnees['lu_message'] == 1) {
        $boite .= '
            <td><img src="public/asset/img/icones/verifier.png" alt="" class="icone_tab afficher"></td>';
    }
    else {
        $boite .= '
            <td><img src="public/asset/img/icones/verifier.png" alt="" class="icone_tab"></td>';
    }
    $boite .= '
    <td><a href="mailto:'.$donnees['mail_message'].'?subject=Chez%20Roger%20contact" onclick="gestionAfficher('.$donnees['id_message'].','.$donnees['repondu_message'].')"><img src="public/asset/img/icones/feather-pen.png" alt="" class="icone_tab modifier"></a></td> ';
        // <td><a href="index.php?page=345&id='.$donnees['id_message'].'&c=2" onclick="gestionAfficher('.$donnees['id_message'].','.$donnees['repondu_message'].')"><img src="public/asset/img/icones/feather-pen.png" alt="" class="icone_tab modifier"></a></td> ';
    if ($donnees['repondu_message'] == 1) {
        $boite .= '
            <td id='.$donnees['id_message'].'><img src="public/asset/img/icones/verifier.png" alt="" class="icone_tab afficher"></td>';
    }
    else {
        $boite .= '
            <td id='.$donnees['id_message'].'><img src="public/asset/img/icones/verifier.png" alt="" class="icone_tab "></td>';
    }
    $boite .= '
        <td><a href="index.php?page=5&c=1&sup='.$donnees['id_message'].'" onclick="return(confirm(\'Voulez vous supprimer cette entrée ?\'))"><img src="public/asset/img/icones/poubelle.png" alt="" class="icone_tab supprimer"></a></td>
    </tr>
    ';

    return $boite;
}
function req_messages($bdd) {
    $requete = "SELECT * FROM `messages` ";
    $req = $bdd->prepare($requete);
    $req -> execute();
    $donnees = $req -> fetchAll();
    return $donnees;
}
function req_message($bdd,$id_message) {
    $requete = "SELECT * FROM `messages` 
                WHERE id_message = :id_message";
    $req = $bdd->prepare($requete);
    $req->bindValue(':id_message', $id_message, PDO::PARAM_INT);
    $req -> execute();

    $donnees = $req -> fetch();
    return $donnees;
}
function req_lu($bdd,$id_message) {
    $requete = "UPDATE `messages` SET `lu_message`= 1 
                WHERE id_message = :id_message";
    $req = $bdd->prepare($requete);
    $req->bindValue(':id_message', $id_message, PDO::PARAM_INT);
    $req -> execute();
}
// -------------------------- clients ------------------------------------
function table_clients_gestion($donnees) {
    $boite = '
    <tr class="';
    if ($donnees['compte_actif'] == 1) {
        $boite .= 'table-primary';
    }
    else {
        $boite .= 'table-danger text-decoration-line-through ';
    }
    $boite .= '" >
        <td scope="row">'.$donnees['id_utilisateur'].'</td>
        <td >'.date('d/m/Y',$donnees['identifiant_utilisateur']).'</td>
        <td >'.$donnees['nom_utilisateur'].'</td>
        <td>'.$donnees['prenom_utilisateur'].'</td>';
    $boite .= '
    <td><a href="mailto:'.$donnees['mail_utilisateur'].'?subject=Chez%20Roger"><img src="public/asset/img/icones/feather-pen.png" alt="" class="icone_tab modifier"></a></td>';
        // <td><a href="index.php?page=345&id='.$donnees['id_utilisateur'].'&c=3"><img src="public/asset/img/icones/feather-pen.png" alt="" class="icone_tab modifier"></a></td>';
    $boite .= '
        <td>'.$donnees['tel_utilisateur'].'</td>
        <td><a href="index.php?page=4&c=1&id='.$donnees['id_utilisateur'].'"><img src="public/asset/img/icones/commander.png" alt="" class="icone_tab modifier"></a></td>';
    if ($_SESSION['connexion'] == 2) {
        if ($donnees['compte_actif'] == 1) {
            $boite .= '
            <td><a href="index.php?page=6&c=1&sup='.$donnees['id_utilisateur'].'" onclick="return(confirm(\'Voulez vous supprimer cette entrée ?\'))"><img src="public/asset/img/icones/poubelle.png" alt="" class="icone_tab supprimer"></a></td>
            ';
        }
        else {
            $boite .= '<td><a href="index.php?page=6&c=1&add='.$donnees['id_utilisateur'].'" onclick="return(confirm(\'Voulez vous réactiver cette entrée ?\'))">Réactiver?</a></td>';
        }
    }
    $boite .= '
    </tr>
    ';

    return $boite;
}
// purge des utilisateurs inactif depuis plus de deux ans 
function req_purge($bdd) {
    $date = time() - 2*365*24*60*60;

    $requete = "SELECT * FROM utilisateurs 
                WHERE identifiant_utilisateur < $date";
    $req = $dd -> prepare($requete);
    $req -> execute();
    $donnee = $req -> fetchAll();

    foreach ($donnee as $key) {
        // recherche le dernier devis  déposer (chercher la dernière date d'évènement?)
        $requete = "SELECT * FROM devis 
                    WHERE id_utilisateur = :id_utilisateur 
                    ORDER BY date_creation_devis DESC 
                    LIMIT 1 ";
        $req = $dd -> prepare($requete);
        $req -> bindValue(':id_utilisateur', $key['id_utilisateur'], PDO::PARAM_INT);
        $req -> execute();

        $last_devis = $req -> fetch();
        if ($last_devis['date_creation_devis'] < $date) {
            $requete = "DELETE FROM devis WHERE id_utilisateur = :id_utilisateur";
            $req = $bdd -> prepare($requete);
            $req -> bindValue(':id_utilisateur', $key['id_utilisateur'], PDO::PARAM_INT);
            $req -> execute();

            $requete = "DELETE FROM utilisateurs WHERE id_utilisateur = :id_utilisateur";
            $req = $bdd -> prepare($requete);
            $req -> bindValue(':id_utilisateur', $key['id_utilisateur'], PDO::PARAM_INT);
            $req -> execute();
        }
    }
}
// supprime un utilisateur et ses devis
function req_sup_utilisateur($bdd, $id_utilisateur) {
    // $requete = "DELETE FROM devis WHERE id_utilisateur = :id_utilisateur";
    // $req = $bdd -> prepare($requete);
    // $req -> bindValue(':id_utilisateur', $id_utilisateur, PDO::PARAM_INT);
    // $req -> execute();

    // $requete = "DELETE FROM utilisateurs WHERE id_utilisateur = :id_utilisateur";
    // $req = $bdd -> prepare($requete);
    // $req -> bindValue(':id_utilisateur', $id_utilisateur, PDO::PARAM_INT);
    // $req -> execute();

    $requete = "UPDATE utilisateurs SET compte_actif = 0 
                WHERE id_utilisateur = :id_utilisateur";
    $req = $bdd -> prepare($requete);
    $req -> bindValue(':id_utilisateur', $id_utilisateur, PDO::PARAM_INT);
    $req -> execute();
}
function req_reactive_user($bdd, $id_utilisateur) {
    $requete = "UPDATE utilisateurs SET compte_actif = 1 
                WHERE id_utilisateur = :id_utilisateur";
    $req = $bdd -> prepare($requete);
    $req -> bindValue(':id_utilisateur', $id_utilisateur, PDO::PARAM_INT);
    $req -> execute();
}
// affiche tous les clients
function req_tout_clients($bdd,$req_ordre) {
    $requete = 'SELECT * FROM utilisateurs 
                WHERE id_cat_utilisateur = 2
                '.$req_ordre;
    $req = $bdd->prepare($requete);
    $req -> execute();
    $donnees = $req -> fetchAll();
    return $donnees;
}

// -------------------------- admins ---------------------------------
function table_admins_gestion($donnees) {
    $boite = '
    <tr class="table-primary" >
        <td scope="row">'.$donnees['id_utilisateur'].'</td>
        <td >'.$donnees['nom_utilisateur'].'</td>
        <td>'.$donnees['prenom_utilisateur'].'</td>';
    if ($donnees['id_cat_utilisateur'] == 1) {
        $boite .= '
        <td><a href="mailto:'.$donnees['mail_utilisateur'].'?subject=Chez%20Roger%20Administration"><img src="public/asset/img/icones/feather-pen.png" alt="" class="icone_tab modifier"></a></td>';
            // <td><a href="index.php?page=345&id='.$donnees['id_utilisateur'].'&c=4"><img src="public/asset/img/icones/feather-pen.png" alt="" class="icone_tab modifier"></a></td>';
        }
    else {
        $boite .= '<td>---</td>';
    }
    $boite .= '
        <td>'.$donnees['tel_utilisateur'].'</td>
        ';
        if ($donnees['id_cat_utilisateur'] == 1) {
            $boite .= '
            <td><a href="index.php?page=7&c=2&id='.$donnees['id_utilisateur'].'"><img src="public/asset/img/icones/roue-dentee.png" alt="" class="icone_tab modifier"></a></td>
            <td><a href="index.php?page=7&c=1&sup='.$donnees['id_utilisateur'].'" onclick="return(confirm(\'Voulez vous supprimer cette entrée ?\'))"><img src="public/asset/img/icones/poubelle.png" alt="" class="icone_tab supprimer"></a></td>';
    }
    else {
        $boite .= '
            <td>---</td>
            <td>---</td>
        ';
    }
    $boite .= '
    </tr>
    ';

    return $boite;
}

//---------------------------------------------------------------------------
//                             admin
//---------------------------------------------------------------------------
function req_sup_admin($bdd,$id_utilisateur) {
    $requete = "DELETE FROM utilisateurs WHERE id_utilisateur = :id_utilisateur AND id_cat_utilisateur != 3";
    $req = $bdd -> prepare($requete);
    $req -> bindValue(':id_utilisateur', $id_utilisateur, PDO:: PARAM_INT);
    $req -> execute();
}
function req_admins($bdd,$req_ordre) {
    $requete = 'SELECT * FROM utilisateurs 
                WHERE id_cat_utilisateur = 1 OR id_cat_utilisateur = 3
                '.$req_ordre;
    $req = $bdd->prepare($requete);
    $req -> execute();
    $donnees = $req -> fetchAll();

    $requete = "SELECT * FROM administrateurs";
    $req = $bdd->prepare($requete);
    $req -> execute();

    $admin = $req -> fetch();

    $sortie = [$donnees,$admin];
    return $sortie;
}
function req_utilisateur($bdd, $id_utilisateur) { // select par id
    $requete = "SELECT * FROM utilisateurs 
                WHERE id_utilisateur = :id_utilisateur ";
    $req = $bdd -> prepare($requete);
    $req -> bindValue(':id_utilisateur', $id_utilisateur, PDO::PARAM_INT);
    $req -> execute();

    $donnees = $req -> fetch();
    return $donnees;
}
function req_admin($bdd, $id_utilisateur) { // select par id
    $requete = "SELECT * FROM utilisateurs 
                WHERE id_utilisateur = :id_utilisateur";
    $req = $bdd -> prepare($requete);
    $req -> bindValue(':id_utilisateur', $id_utilisateur, PDO::PARAM_INT);
    $req -> execute();

    $donnees = $req -> fetch();
    return $donnees;
}
function req_utilisateur_v2($bdd, $mail_utilisateur) { //select par mail
    $requete = "SELECT mail_utilisateur FROM utilisateurs 
                WHERE mail_utilisateur = :mail_utilisateur";
    $req = $bdd->prepare($requete);
    $req->bindValue(':mail_utilisateur', $mail_utilisateur, PDO::PARAM_STR); 
    $req -> execute();

    $donnees = $req -> fetch();
    return $donnees;
}
function req_admin_v2($bdd, $mail_utilisateur) { //select par mail
    $requete = "SELECT mail_utilisateur FROM utilisateurs 
                WHERE mail_utilisateur = :mail_utilisateur";
    $req = $bdd->prepare($requete);
    $req->bindValue(':mail_utilisateur', $mail_utilisateur, PDO::PARAM_STR); 
    $req -> execute();

    $donnees = $req -> fetch();
    return $donnees;
}
function req_update_admins($bdd,$id_utilisateur,$nom_utilisateur,$prenom_utilisateur,$mail_utilisateur,$tel_utilisateur,$mdp_hash) {
    $requete = "UPDATE `utilisateurs` SET `nom_utilisateur`= :nom_utilisateur,
                                            `prenom_utilisateur`= :prenom_utilisateur,
                                            `mail_utilisateur`= :mail_utilisateur,
                                            `tel_utilisateur`= :tel_utilisateur,
                                            `mdp_utilisateur`= :mdp_utilisateur
                WHERE id_utilisateur = :id_utilisateur
                ";
    $req = $bdd -> prepare($requete);
    $req -> bindValue('id_utilisateur', $id_utilisateur,PDO::PARAM_INT);
    $req->bindValue(':nom_utilisateur', $nom_utilisateur, PDO::PARAM_STR); 
    $req->bindValue(':prenom_utilisateur', $prenom_utilisateur, PDO::PARAM_STR); 
    $req->bindValue(':mail_utilisateur', $mail_utilisateur, PDO::PARAM_STR); 
    $req->bindValue(':tel_utilisateur', $tel_utilisateur, PDO::PARAM_STR); 
    $req->bindValue(':mdp_utilisateur', $mdp_hash, PDO::PARAM_STR); 
    $req -> execute();
}
function req_insert_admins($bdd,$identifiant_utilisateur,$nom_utilisateur,$prenom_utilisateur,$mail_utilisateur,$tel_utilisateur,$mdp_hash) {
    $requete = "INSERT INTO `utilisateurs`(`id_utilisateur`, `identifiant_utilisateur`, `nom_utilisateur`, `prenom_utilisateur`, `mail_utilisateur`, `tel_utilisateur`, `mdp_utilisateur`, `id_cat_utilisateur`) 
                VALUES (0,:identifiant_utilisateur,:nom_utilisateur,:prenom_utilisateur,:mail_utilisateur,:tel_utilisateur,:mdp_utilisateur,1)";
    $req = $bdd->prepare($requete);
    $req->bindValue(':identifiant_utilisateur', $identifiant_utilisateur, PDO::PARAM_INT); 

    $req->bindValue(':nom_utilisateur', $nom_utilisateur, PDO::PARAM_STR); 
    $req->bindValue(':prenom_utilisateur', $prenom_utilisateur, PDO::PARAM_STR); 
    $req->bindValue(':mail_utilisateur', $mail_utilisateur, PDO::PARAM_STR); 
    $req->bindValue(':tel_utilisateur', $tel_utilisateur, PDO::PARAM_STR); 
    $req->bindValue(':mdp_utilisateur', $mdp_hash, PDO::PARAM_STR); 
    $req -> execute();
}
?>