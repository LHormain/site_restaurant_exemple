<?php
include('controler/traitement_site_carte_gestion_boisson.php');
?>
<div class="col-12">
    <h2>Gestion des boissons</h2>
    <div class="table-responsive mt-3">
        <table class="table table-striped
        table-hover	
        table-borderless
        table-primary
        align-middle">
            <thead class="table-light">
                <caption>Menu du jour - boissons</caption>
                <tr>
                    <th><a href="index.php?page=33&c=2&ordre=1">Nom</a></th>
                    <th>Parfums</th>
                    <th>Prix</th>
                    <th><a href="index.php?page=33&c=2&ordre=2">Catégorie</a></th>
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
<script src="public/asset/js/gestion_affichage_boisson.js"></script>