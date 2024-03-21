<?php 
include('controler/traitement_site_carte_saisie_boisson.php');

?>
<div class="col-12">
   <form action="" method="post">
        <h2>Saisissez une boisson</h2>
        <div class="mb-3">
            <label for="id_cat" class="form-label">Catégories</label>
            <select class="form-select form-select-lg" name="id_cat" id="id_cat" required>
            <option selected>Choisir une option</option>
                <?php 
                
                    echo $options_select;
                ?>
            </select>
        </div>
        <div class="mb-3">
            <label for="nom_assiette" class="form-label">Nom de la boisson</label>
            <input type="text" class="form-control" name="nom_assiette" id="nom_assiette" aria-describedby="helpId1" placeholder="" value="<?php  echo $nom_assiette;?>" required>
            <small id="helpId" class="form-text text-muted">Entré un nom attractif pour le client</small>
        </div>
        <div class="mb-3">
            <label for="liste_ingredients_assiette" class="form-label">Entrer la liste des parfums disponibles ou les volumes disponibles</label>
            <textarea class="form-control" name="liste_ingredients_assiette" id="liste_ingredients_assiette" rows="3" required><?php  echo $liste_ingredients_assiette;?></textarea>
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Prix</label>
            <input type="text"  class="form-control" name="prix_assiette" id="prix_assiette" aria-describedby="helpId2" placeholder="" value="<?php  echo $prix_assiette;?>" required>
            <small id="helpId" class="form-text text-muted">Prix au verre ou à la bouteille</small>
        </div>

        <button type="submit" class="btn btn-primary">Envoyer</button>
   </form>
</div>