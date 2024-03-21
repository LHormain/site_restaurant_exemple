<?php
include('controler/traitement_site_carte_saisie_menu_img.php');
?>
<h3>Saisie d'une image</h3>
<?php
    echo $texte_page_courante;
?>
<div class="col-12">
    <form action="#" method="post" enctype="multipart/form-data">
        <!-- Nom de l'image -->
        <div class="mb-3">
          <label for="nom_image" class="form-label">Nom de l'image</label>
          <input type="text"
            class="form-control" name="nom_image" id="nom_image" aria-describedby="helpId1" placeholder="">
          <small id="helpId1" class="form-text text-muted">Pas d'espaces ou de caractères spéciaux</small>
        </div>
        <!-- catégorie du menu à laquelle cette image appartient -->
        <div class="mb-3">
            <label for="id_cat" class="form-label">Section de la carte</label>
            <select class="form-select form-select-lg" name="id_cat" id="id_cat" >
                <option selected>Choisir une option</option>
                <?php 
                
                    echo $options_select;
                ?>
            </select>
        </div>
        <!-- fichier image -->
        <div class="mb-3">
          <label for="photo" class="form-label">Choisir un fichier</label>
          <input type="file" class="form-control" name="photo" id="photo" placeholder="" aria-describedby="fileHelpId2">
          <div id="fileHelpId2" class="form-text">jpeg, jpg, png, gif ou webp. Max 256Mo.</div>
        </div>
        <!-- -------------------------------------- -->
        <input type="submit" class="btn btn-primary" value="Envoyer">
    </form>
</div>