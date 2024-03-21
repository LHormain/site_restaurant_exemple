<?php
//-----------------------------------
//               carte
//-----------------------------------
function card_boisson($nom_plat, $ingredients, $prix) {
    $texte = '
        <div class="ps-5">
            <div class="row">
                <div class="col-lg-9 col-8">
                    <span>'.$nom_plat.'</span><br>
                </div>';

    if ($ingredients != '') {
        $texte .= '
                    <div class="col-lg-9 col-8">
                    '.$ingredients.'
                    </div>'; 
    }

    $texte .= '
                <div class="col-lg-2 col-2">
                    '.$prix.' €
                </div>
            </div>
        </div>
    ';
    return $texte;
}
function req_assiettes($bdd,$id_cat) {
    $requete = "SELECT * from assiettes
                WHERE afficher_assiette = 1 AND id_cat = $id_cat";
    $req1 = $bdd->prepare($requete);
    $req1 -> execute();
    $donnees = $req1 -> fetchAll();
    return $donnees;
}
function card_plat($nom_plat, $ingredients, $prix) {
    $texte = '
        <div class="ms-5">
            <div class="row">
                <div class="col-12 ">
                    <span>'.$nom_plat.'</span><br>
                </div>
                <div class="col-md-10 col-8">
                ('.$ingredients.')
                </div> 
                <div class="col-md-2 col-3">
                    '.$prix.' €
                </div>
            </div>
        </div>
    ';
    return $texte;
}
function req_images_carte($bdd,$id_cat,$limit) {
    $requete = "SELECT * FROM images 
                WHERE id_cat = $id_cat AND afficher_image = 1
                ORDER BY ordre_affichage_image
                LIMIT $limit";
    $req = $bdd->prepare($requete);
    $req -> execute();

    $donnees = $req -> fetchAll();
    return $donnees;
}

//-------------------------------------
//                menus
//-------------------------------------
function req_menu($bdd,$operateur) {
    $requete = "SELECT * FROM menus
                INNER JOIN composition_menu ON composition_menu.id_menu = menus.id_menu
                WHERE menus.nom_menu ".$operateur." 'Menu du jour' AND menus.afficher_menu = 1 
                GROUP BY composition_menu.id_menu
                " ;
    $req = $bdd->prepare($requete);
    $req -> execute();

    $donnees = $req -> fetchAll();
    return $donnees;
}
//         menu entreprise
function menu_entreprise($i,$nom_menu, $prix, $nom_img1, $nom_img2, $nom_entre, $ingr_entree, $nom_plat, $ingr_plat, $nom_dessert, $ingr_dessert) {
    $texte = '
    <div class="offset-lg-1 col-lg-10 my-5 ">
        <h2 class="text-center col-12">Menu Entreprise '.$i.' : "'.$nom_menu.'"</h2>
        <p class="text-center col-12"> '.$prix.' €</p>
        <div class="row">
            <div class="col-lg-3 text-center">
                <img src="'.image_par_default('public/assets/img/plat/', $nom_img1).'" class="border border-primary rounded img_plat_menu" alt="">
            </div>
            <div class="col-lg-6">
                <h3>Entrée</h3>
                <div class="ms-5">
                    <span>'.$nom_entre.'</span><br>
                    ('.$ingr_entree.')
                </div>
                <h3>Plat</h3>
                <div class="ms-5">
                    <span>'.$nom_plat.'</span><br>
                    ('.$ingr_plat.')
                </div>
                <h3>Dessert</h3>
                <div class="ms-5">
                    <span>'.$nom_dessert.'</span><br>
                    ('.$ingr_dessert.')
                </div>
            </div>
            <div class="col-lg-3 text-center">
                <img src="'.image_par_default('public/assets/img/plat/', $nom_img2).'" class="border border-primary rounded img_plat_menu" alt="">
            </div>
        </div>
    </div>
    ';
    return $texte;
}

//        menu du jour
function menu_jour($nom_menu, $prix, $nom_img1, $nom_img2, $nom_entre, $ingr_entree, $nom_plat, $ingr_plat, $nom_dessert, $ingr_dessert) {
    $texte = '
    <div class="offset-lg-1 col-lg-10 my-5 ">
        <h2 class="text-center col-12">'.$nom_menu.'</h2>
        <p class="text-center col-12"> '.$prix.' €</p>
        <div class="row">
            <div class="col-lg-3 text-center">
                <img src="'.image_par_default('public/assets/img/plat/', $nom_img1).'" class="border border-primary rounded img_plat_menu" alt="">
            </div>
            <div class="col-lg-6">
                <h3>Entrée</h3>
                <div class="ms-5">
                    <span>'.$nom_entre.'</span><br>
                    ('.$ingr_entree.')
                </div>
                <h3>Plat</h3>
                <div class="ms-5">
                    <span>'.$nom_plat.'</span><br>
                    ('.$ingr_plat.')
                </div>
                <h3>Dessert</h3>
                <div class="ms-5">
                    <span>'.$nom_dessert.'</span><br>
                    ('.$ingr_dessert.')
                </div>
            </div>
            <div class="col-lg-3 text-center">
                <img src="'.image_par_default('public/assets/img/plat/', $nom_img2).'" class="border border-primary rounded img_plat_menu" alt="">
            </div>
        </div>
    </div>
    ';
    return $texte;
}

// détermine si un menu a une image
function a_image($bdd,$id_menu,$position_img) {
    $requete = "SELECT id_image FROM illustration_menu WHERE id_menu = $id_menu AND position_image = $position_img LIMIT 1";
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
// retourne le nom d'une assiette appartenant à un menu
function trouve_nom_assiette($bdd,$cat_assiette, $id_menu) {
    $requete = "SELECT * FROM assiettes
                INNER JOIN composition_menu ON assiettes.id_assiette = composition_menu.id_assiette
                WHERE composition_menu.id_menu = $id_menu AND composition_menu.id_cat = $cat_assiette";
    $req2 = $bdd->prepare($requete);
    $req2 -> execute();

    $donnees2 = $req2 -> fetch();
    return $donnees2;
}

// si il n'existe pas d'image remplacer par le logo du site
function image_par_default($chemin, $nom_img) {
    if ($nom_img == '' ) {
        $chemin_img = 'public/assets/img/icones/logo2.png';
    }
    else {
        $chemin_img = $chemin.$nom_img;
    }

    return $chemin_img;
}
//-------------------------------------------------
//             Devis et page client
//-------------------------------------------------
// table devis client
function table_devis($donnees2) {
    
    $boite = '
    <tr class="table-primary" >
        <td scope="row">'.$donnees2['id_devis'].'</td>
        <td>'.date('d/m/Y',$donnees2['date_creation_devis']).'</td>
        <td>'.date('d/m/Y',$donnees2['date_evenement_devis']).'<br>'.$donnees2['type_evenement_devis'].'<br>'.$donnees2['nbr_personnes_devis'].' personnes</td>
        <td>'.$donnees2['nom_etat'].'</td>';
    if ($donnees2['id_etat'] == 1) {
        $boite .= '
            <td><a href="index.php?page=3&c=3&id='.$donnees2['id_devis'].'"><img src="public/assets/img/icones/roue-dentee.png" class="icone_tab"></a></td>
            <td><a href="index.php?page=10&cas=1&sup='.$donnees2['id_devis'].'"><img src="public/assets/img/icones/poubelle.png" class="icone_tab"></a></td>
            <td>';
    }
    else {
        $boite .= '
        <td>-</td>
        <td>-</td>
        <td>
        ';
    }
    if ($donnees2['id_etat'] > 1 && $donnees2['id_etat'] < 6) {
        $boite .= '<a href="index.php?page=31&dev='.$donnees2['id_devis'].'">Voir</a>';
    }
    else {
        $boite .= '';
    }
    $boite .= '
        </td>
    </tr>';
    return $boite;
}

function si_existe_devis($bdd,$id_utilisateur,$id_devis) {
    // vérifie si il a un devis en cours pour id_utilisateur
    include('site.php');

    $requete = "SELECT * FROM devis WHERE id_utilisateur = :id_utilisateur AND id_etat < 4";
    $req = $bdd -> prepare($requete);
    $req -> bindValue(':id_utilisateur', $id_utilisateur, PDO::PARAM_INT);
    $req -> execute();

    $test = $req -> rowCount();
    if (($test != 0) && ($id_devis == '')) {
        exit('<p class="offset-lg-2 col-lg-8 offset-1 col-10 text-center my-5">Un devis est déjà en cours d\'examination pour ce compte. Pour réserver plus de date veuillez nous contacter au '.$site_tel.'.<br>'.$id_devis.'<br><br><a class="btn btn-primary" href="index.php">Accueil</a></p>');
    }
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
function devis($donnees) {
    // calcul du montant du devis
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
// 1 devis précis
function req_devis($bdd, $id_devis) { 
    $requete = "SELECT * FROM devis
                WHERE id_devis = :id_devis";
    $req = $bdd -> prepare($requete);
    $req -> bindValue(':id_devis', $id_devis, PDO::PARAM_INT);
    $req -> execute();

    $donnees = $req -> fetch();
    return $donnees;
}
// tous les devis
function req_all_devis($bdd,$id_utilisateur) {
    $requete = "SELECT * FROM devis
                INNER JOIN etat_devis ON devis.id_etat = etat_devis.id_etat
                WHERE devis.id_utilisateur = :id_utilisateur";
    $req2 = $bdd->prepare($requete);
    $req2 -> bindValue(':id_utilisateur', $id_utilisateur, PDO::PARAM_INT); 
    $req2 -> execute(); 

    $donnees = $req2 -> fetchAll();
    return $donnees;
}
function req_sup_devis($bdd,$id_devis) {
    $requete = "DELETE FROM devis WHERE id_devis = :id_devis";
    $req = $bdd -> prepare($requete);
    $req -> bindValue(':id_devis', $id_devis, PDO::PARAM_INT);
    $req -> execute();
}
function req_utilisateur_V3($bdd,$identifiant_utilisateur) { // sélectionne par l'identifiant stocké en session
    $requete = "SELECT * FROM utilisateurs 
                WHERE identifiant_utilisateur = :identifiant_utilisateur";
    $req = $bdd->prepare($requete);
    $req->bindValue(':identifiant_utilisateur', $identifiant_utilisateur, PDO::PARAM_INT); 
    $req -> execute();  

    $donnees = $req -> fetch(); 
    return $donnees;
}

function req_test_devis($bdd,$id_utilisateur) {
    $requete = "SELECT * FROM devis WHERE id_utilisateur = :id_utilisateur AND id_etat < 4";
    $req = $bdd->prepare($requete);
    $req->bindValue(':id_utilisateur', $id_utilisateur, PDO::PARAM_INT); 
    $req -> execute(); 
    
    $test = $req -> rowCount();
    return $test;
}

function req_devis_pour_update($bdd,$id_devis) {
    $requete = "SELECT * FROM devis 
                INNER JOIN utilisateurs ON devis.id_utilisateur = utilisateurs.id_utilisateur
                WHERE devis.id_devis = :id_devis";
    $req = $bdd->prepare($requete);
    $req->bindValue(':id_devis', $id_devis, PDO::PARAM_INT); 
    $req -> execute(); 

    $devis = $req -> fetch();
    return $devis;
}
function req_update_devis($bdd,$id_devis,$type_evenement_devis,$type_repas_devis,$nbr_personnes_devis,$date_evenement_devis,$message_devis,$date_creation_devis) {
    $requete = "UPDATE `devis` SET `type_evenement_devis`= :type_evenement_devis,
                                    `type_repas_devis`= :type_repas_devis,
                                    `nbr_personnes_devis`= :nbr_personnes_devis,
                                    `date_evenement_devis`= :date_evenement_devis,
                                    `message_devis`= :message_devis,
                                    `date_creation_devis`= :date_creation_devis,
                                    `id_etat`= 1
            WHERE `id_devis`= :id_devis";
    $req_crea = $bdd->prepare($requete);
    $req_crea->bindValue(':id_devis', $id_devis, PDO::PARAM_INT); 
    $req_crea->bindValue(':type_evenement_devis', $type_evenement_devis, PDO::PARAM_STR); 
    $req_crea->bindValue(':type_repas_devis', $type_repas_devis, PDO::PARAM_STR); 
    $req_crea->bindValue(':nbr_personnes_devis', $nbr_personnes_devis, PDO::PARAM_INT); 
    $req_crea->bindValue(':date_evenement_devis', $date_evenement_devis, PDO::PARAM_STR); 
    $req_crea->bindValue(':message_devis', $message_devis, PDO::PARAM_STR); 
    $req_crea->bindValue(':date_creation_devis', $date_creation_devis, PDO::PARAM_STR); 
    $req_crea -> execute();
}
function req_insert_devis($bdd,$id_utilisateur,$type_evenement_devis,$type_repas_devis,$nbr_personnes_devis,$date_evenement_devis,$message_devis,$date_creation_devis) {
    $requete = "INSERT INTO `devis`(`id_devis`, `type_evenement_devis`, `type_repas_devis`, `nbr_personnes_devis`, `date_evenement_devis`, `message_devis`, `date_creation_devis`, `id_etat`, `id_utilisateur`) 
                VALUES (0,:type_evenement_devis,:type_repas_devis,:nbr_personnes_devis,:date_evenement_devis,:message_devis,:date_creation_devis,1,:id_utilisateur)";
    $req_crea = $bdd->prepare($requete);
    $req_crea->bindValue(':id_utilisateur', $id_utilisateur, PDO::PARAM_INT); 
    $req_crea->bindValue(':type_evenement_devis', $type_evenement_devis, PDO::PARAM_STR); 
    $req_crea->bindValue(':type_repas_devis', $type_repas_devis, PDO::PARAM_STR); 
    $req_crea->bindValue(':nbr_personnes_devis', $nbr_personnes_devis, PDO::PARAM_INT); 
    $req_crea->bindValue(':date_evenement_devis', $date_evenement_devis, PDO::PARAM_STR); 
    $req_crea->bindValue(':message_devis', $message_devis, PDO::PARAM_STR); 
    $req_crea->bindValue(':date_creation_devis', $date_creation_devis, PDO::PARAM_STR); 
    $req_crea -> execute();
}
//--------------------------------------------------------------
//              connexion, inscription et mdp oublier
//--------------------------------------------------------------
// utiliser pour connexion et devis
function verification_mdp($bdd,$id_utilisateur, $mdp) {

    $test = req_utilisateur_v2($bdd,$id_utilisateur);
    return password_verify($mdp, $test['mdp_utilisateur']);
}
function req_utilisateur($bdd,$mail_utilisateur) { // sélectionner par son mail
    $requete = "SELECT * FROM utilisateurs WHERE mail_utilisateur = :mail_utilisateur AND compte_actif = 1";
    $req = $bdd->prepare($requete);
    $req -> bindValue(':mail_utilisateur', $mail_utilisateur, PDO::PARAM_STR);
    $req -> execute();

    $user = $req -> fetch();
    $compte = $req -> rowCount();
    $donnees = [$user,$compte];
    return $donnees;
}
function req_utilisateur_v2($bdd,$id_utilisateur) { // sélectionner par son id
    $requete = "SELECT * FROM utilisateurs WHERE id_utilisateur = :id_utilisateur";
    $req = $bdd -> prepare($requete);
    $req -> bindValue(':id_utilisateur', $id_utilisateur, PDO::PARAM_INT);
    $req -> execute();

    $donnees = $req -> fetch();
    return $donnees;
}
function req_insert_client($bdd,$identifiant_utilisateur,$nom_utilisateur,$prenom_utilisateur,$mail_utilisateur,$tel_utilisateur,$mdp_hash) {
    $requete = "INSERT INTO `utilisateurs`(`id_utilisateur`, `identifiant_utilisateur`, `nom_utilisateur`, `prenom_utilisateur`, `mail_utilisateur`, `tel_utilisateur`, `mdp_utilisateur`, `id_cat_utilisateur`) 
                VALUES (0,:identifiant_utilisateur,:nom_utilisateur,:prenom_utilisateur,:mail_utilisateur,:tel_utilisateur,:mdp_utilisateur,2)";
    $req = $bdd->prepare($requete);
    $req->bindValue(':identifiant_utilisateur', $identifiant_utilisateur, PDO::PARAM_INT); 
    $req->bindValue(':nom_utilisateur', $nom_utilisateur, PDO::PARAM_STR); 
    $req->bindValue(':prenom_utilisateur', $prenom_utilisateur, PDO::PARAM_STR); 
    $req->bindValue(':mail_utilisateur', $mail_utilisateur, PDO::PARAM_STR); 
    $req->bindValue(':tel_utilisateur', $tel_utilisateur, PDO::PARAM_STR); 
    $req->bindValue(':mdp_utilisateur', $mdp_hash, PDO::PARAM_STR); 
    $req -> execute();
}
function req_update_client($bdd,$nom_utilisateur,$prenom_utilisateur,$mail_utilisateur,$tel_utilisateur,$id_utilisateur) {
    $requete = "UPDATE `utilisateurs` SET `nom_utilisateur`= :nom_utilisateur,
                        `prenom_utilisateur`= :prenom_utilisateur,
                        `mail_utilisateur`= :mail_utilisateur,
                        `tel_utilisateur`= :tel_utilisateur
                WHERE id_utilisateur = :id_utilisateur";
    $req = $bdd -> prepare($requete);
    $req -> bindValue(':nom_utilisateur',$nom_utilisateur,PDO::PARAM_STR);
    $req -> bindValue(':prenom_utilisateur',$prenom_utilisateur,PDO::PARAM_STR);
    $req -> bindValue(':mail_utilisateur',$mail_utilisateur,PDO::PARAM_STR);
    $req -> bindValue(':tel_utilisateur',$tel_utilisateur,PDO::PARAM_STR);
    $req -> bindValue(':id_utilisateur',$id_utilisateur,PDO::PARAM_INT);
    $req -> execute();
}
function req_token_client($bdd,$expiration_date,$token_hash,$mail) {
    $requete = "UPDATE `utilisateurs` SET `token`=:token_hash,
                       `expiration_date`=:expiration_date 
                WHERE mail_utilisateur = :mail AND id_cat_utilisateur = 2";
    $req = $bdd -> prepare($requete);
    $req -> bindValue(':expiration_date', $expiration_date, PDO::PARAM_INT);
    $req -> bindValue(':token_hash', $token_hash, PDO::PARAM_STR);
    $req -> bindValue(':mail', $mail, PDO::PARAM_STR);
    $req -> execute();

    $nbr = $req -> rowCount();
    return $nbr;
}
function req_utilisateur_token($bdd) {
    $requete = "SELECT * FROM utilisateurs WHERE token != 'NULL'";
    $req = $bdd -> prepare($requete);
    $req -> execute();
    $liste_token = $req -> fetchAll();
    return $liste_token;
}
function req_update_mdp($bdd,$id_user,$mdp_hash) {
    $requete = "UPDATE utilisateurs SET `mdp_utilisateur`=:mdp_hash, 
                                        `token`= NULL,
                                        `expiration_date`= NULL
                WHERE  id_utilisateur = $id_user";
    $req = $bdd -> prepare($requete);
    $req -> bindValue(':mdp_hash', $mdp_hash, PDO::PARAM_STR);
    $req -> execute();
}
//------------------------------------------------
//                 contact
//------------------------------------------------
function req_contact($bdd,$date_message,$nom_message,$prenom_message,$mail_message,$sujet_message,$corps_message) {
    $requete = "INSERT INTO `messages`(`id_message`, `nom_message`, `prenom_message`, `mail_message`, `sujet_message`, `corps_message`, `date_message`, `lu_message`, `repondu_message`) 
                VALUES (0,:nom_message,:prenom_message,:mail_message,:sujet_message,:corps_message,$date_message,0,0)";
    $req = $bdd->prepare($requete);
    $req->bindValue(':nom_message', $nom_message, PDO::PARAM_STR);  
    $req->bindValue(':prenom_message', $prenom_message, PDO::PARAM_STR);  
    $req->bindValue(':mail_message', $mail_message, PDO::PARAM_STR);  
    $req->bindValue(':sujet_message', $sujet_message, PDO::PARAM_STR);  
    $req->bindValue(':corps_message', $corps_message, PDO::PARAM_STR);  
    $req -> execute();
}
?>