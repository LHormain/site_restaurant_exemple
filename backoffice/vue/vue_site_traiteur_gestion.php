<?php
include('controler/traitement_site_traiteur_gestion.php');
?>
<div class="col-12">
    <h2>Gestion des Menus entreprises</h2>
    <div class="table-responsive mt-3">
        <table class="table table-striped
        table-hover	
        table-borderless
        table-primary
        align-middle">
            <thead class="table-light">
                <caption>Menu entreprises</caption>
                <tr>
                    <th>Menu n°</th>
                    <th>Nom</th>
                    <th>Prix</th>
                    <th>Entrée</th>
                    <th>Plat</th>
                    <th>Dessert</th>
                    <th>image droite</th>
                    <th>image gauche</th>
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
<script src="public/asset/js/gestion_affichage_menu_traiteur.js"></script>