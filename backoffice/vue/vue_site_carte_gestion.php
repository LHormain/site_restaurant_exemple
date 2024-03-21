<?php
include('controler/traitement_site_carte_gestion.php');
?>

<div class="col-12">
    <h2>Gestion des plats</h2>
    <div class="table-responsive mt-3">
        <table class="table table-striped
        table-hover	
        table-borderless
        table-primary
        align-middle">
            <thead class="table-light">
                <caption>Carte</caption>
                <tr>
                    <th><a href="index.php?page=3&c=2&ordre=1">Nom</a></th>
                    <th>Ingrédients</th>
                    <th>Prix</th>
                    <th><a href="index.php?page=3&c=2&ordre=2">Catégorie</a></th>
                    <th>Dans Menus?</th>
                    <th>Afficher</th>
                    <th>Modifier</th>
                    <th>Supprimer</th>
                </tr>
                </thead>
                <tbody class="table-group-divider">
                    <?php
                    
                        echo $table;
                    ?>
                </tbody>
                <tfoot>
                    
                </tfoot>
        </table>
    </div>
</div>

<script src="public/asset/js/gestion_affichage.js"></script>