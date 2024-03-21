<?php
include('controler/traitement_site_carte_gestion_img.php');
?>

<div class="col-12">
    <h2>Gestion des images</h2>
    <div class="table-responsive">
        <table class="table table-striped
        table-hover	
        table-borderless
        table-primary
        align-middle">
            <thead class="table-light">
                <caption>Gestion des images</caption>
                <tr>
                    <th>Image</th>
                    <th>Section de la carte</th>
                    <th>Ordre d'affichage</th>
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

<script src="public/asset/js/input_position.js"></script>
<script src="public/asset/js/gestion_affichage_image.js"></script>