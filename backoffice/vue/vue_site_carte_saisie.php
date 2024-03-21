<?php
include('controler/traitement_site_carte_saisie.php');
?>

<div class="col-12">
   <form action="#" method="post">
        <h2>Saisissez un plat</h2>
        <?php
            echo $texte_page_courante;
        ?>
        <!-- catégorie du plat -->
        <div class="mb-3">
            <label for="id_cat" class="form-label">Catégories</label>
            <select class="form-select form-select-lg" name="id_cat" id="id_cat" required>
                <option selected>Choisir une option</option>
                <?php 
                
                    echo $options_select;
                ?>
            </select>
        </div>
        <!-- nom -->
        <div class="mb-3">
            <label for="nom_assiette" class="form-label">Nom du plat</label>
            <input type="text" class="form-control" name="nom_assiette" id="nom_assiette" aria-describedby="helpId1" placeholder="" value="<?php  echo $nom_assiette;?>" required>
            <small id="helpId1" class="form-text text-muted">Entrer un nom attractif pour le client</small>
        </div>
        <!-- ingrédients -->
        <div class="mb-3">
            <label for="liste_ingredients_assiette" class="form-label">Entrer la liste d'ingrédients</label>
            <textarea class="form-control" name="liste_ingredients_assiette" id="liste_ingredients_assiette" rows="3" required><?php  echo $liste_ingredients_assiette;?></textarea>
        </div>
        <!-- prix -->
        <div class="mb-3">
            <label for="prix_assiette" class="form-label">Prix</label>
            <input type="text"  class="form-control" name="prix_assiette" id="prix_assiette" aria-describedby="helpId2" placeholder="" value="<?php  echo $prix_assiette;?>" required>
            <small id="helpId2" class="form-text text-muted">Prix du plat à l'assiette</small>
        </div>

        <input type="submit" class="btn btn-primary" value="Envoyer">
   </form>
</div>