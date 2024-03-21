<?php
include('controler/traitement_site_carte_saisie_menu.php');
?>
<div class="col-12">
  <?php
  echo $texte_page_courante;
  ?>
   <form action="#" method="post" enctype="multipart/form-data" class="row">
        <h2>Saisissez un menu</h2>
        <!-- ------------------------------------------ -->
        <!--                  intro                     -->
        <!-- ------------------------------------------ -->
        <!-- <fieldset disabled> -->
          <div class="mb-3">
              <label for="nom_menu" class="form-label">Nom du menu</label>
              <input type="text" class="form-control" name="nom_menu" id="nom_menu" aria-describedby="helpId6" placeholder="" value="<?php echo $nom_menu; ?>" readonly>
              <small id="helpId6" class="form-text text-muted">par default</small>
          </div>
        <!-- </fieldset> -->
        <div class="mb-3">
            <label for="prix_menu" class="form-label">Prix du menu</label>
            <input type="text" class="form-control" name="prix_menu" id="prix_menu" aria-describedby="helpId7" placeholder="" value="<?php echo $prix_menu; ?>" required>
            <small id="helpId7" class="form-text text-muted">Prix de la formule en euro</small>
        </div>
        <!-- -------------------------------------- -->
        <!--                 entré                  -->
        <!-- -------------------------------------- -->
        <!-- ----- nouveau ----- -->
        <h3>Entrée</h3>
        <div class="col-6">
          <h4>Nouvelle entrée</h4>
          <div class="mb-3">
            <label for="nom_entree" class="form-label">Nom du plat</label>
            <input type="text"
              class="form-control" name="nom_entree" id="nom_entree" aria-describedby="helpId1" placeholder="" >
            <small id="helpId1" class="form-text text-muted">Entrer un nom attractif pour le client</small>
          </div>
          <div class="mb-3">
            <label for="liste_entree" class="form-label">Entrer la liste d'ingrédients</label>
            <textarea class="form-control" name="liste_entree" id="liste_entree" rows="3"></textarea>
          </div>
        </div>
        <!-- ----- ou ancien ------ -->
        <div class="col ">
          <h4>Ou</h4>
        </div>
        <div class="col-5">
          <h4>Choisir une entrée existante</h4>
          <div class="mb-3">
            <label for="select_entree" class="form-label"></label>
            <select class="form-select form-select-lg" name="select_entree" id="select_entree">
              <option selected>Choisir une option</option>
              <?php 
                  
                    echo $options_entree;
                ?>
            </select>
          </div>
        </div>
        <!-- -------------------------------------- -->
        <!--                 Plat                   -->
        <!-- -------------------------------------- -->
        <!-- ----- nouveau ----- -->
        <h3>Plat</h3>
        <div class="col-6">
          <h4>Nouveau plat</h4>
          <div class="mb-3">
            <label for="nom_plat" class="form-label">Nom du plat</label>
            <input type="text"
              class="form-control" name="nom_plat" id="nom_plat" aria-describedby="helpId2" placeholder="">
            <small id="helpId2" class="form-text text-muted">Entrer un nom attractif pour le client</small>
          </div>
          <div class="mb-3">
            <label for="liste_plat" class="form-label">Entrer la liste d'ingrédients</label>
            <textarea class="form-control" name="liste_plat" id="liste_plat" rows="3"></textarea>
          </div>
        </div>
        <!-- ----- ou ancien ----- -->
        <div class="col">
          <h4>Ou</h4>
        </div>
        <div class="col-5">
          <h4>Choir un plat existant</h4>
          <div class="mb-3">
            <label for="select_plat" class="form-label"></label>
            <select class="form-select form-select-lg" name="select_plat" id="select_plat">
              <option selected>Choisir une option</option>
              <?php 
                    
                    echo $options_plat;
                ?>
            </select>
          </div>
        </div>
        <!-- -------------------------------------- -->
        <!--                 Dessert                -->
        <!-- -------------------------------------- -->
        <!-- ----- Nouveau ----- -->
        <h3>Dessert</h3>
        <div class="col-6">
          <h4>Nouveau dessert</h4>
          <div class="mb-3">
            <label for="nom_dessert" class="form-label">Nom du plat</label>
            <input type="text"
            class="form-control" name="nom_dessert" id="dessert" aria-describedby="helpId3" placeholder="">
            <small id="helpId3" class="form-text text-muted">Entrer un nom attractif pour le client</small>
          </div>
          <div class="mb-3">
            <label for="liste_dessert" class="form-label">Entrer la liste d'ingrédients</label>
            <textarea class="form-control" name="liste_dessert" id="liste_dessert" rows="3"></textarea>
          </div>
        </div>
        <!-- ----- ou ancien ----- -->
        <div class="col">
          <h4>Ou</h4>
        </div>
        <div class="col-5">
          <h4>Choisir un dessert existant</h4>
          <div class="mb-3">
            <label for="select_dessert" class="form-label"></label>
            <select class="form-select form-select-lg" name="select_dessert" id="select_dessert">
              <option selected>Choisir une option</option>
              <?php 
                    
                    echo $options_dessert;
                ?>
            </select>
          </div>
        </div>
        
        <div class="text-end pe-5">
          <input type="submit" class="btn btn-primary " value="Envoyer">
        </div>

   </form>
</div>