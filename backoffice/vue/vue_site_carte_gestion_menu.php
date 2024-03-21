<?php
include('controler/traitement_site_carte_gestion_menu.php');
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
                <caption>Menu du jour</caption>
                <tr>
                    <th>Menu n°</th>
                    <th>Nom</th>
                    <th>Prix</th>
                    <th>Entré</th>
                    <th>Plat</th>
                    <th>Dessert</th>
                    <th>Image gauche</th>
                    <th>Image droite</th>
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
<script src="public/asset/js/gestion_affichage_menu.js"></script>