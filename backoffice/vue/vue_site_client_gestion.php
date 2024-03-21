<?php
include('controler/traitement_site_client_gestion.php');
?>
<div class="col-12">
    <h2>Liste des clients</h2>
    <div class="table-responsive">
        <table class="table table-striped
        table-hover	
        table-borderless
        table-primary
        align-middle text-center">
            <thead class="table-light">
                <!-- <caption>Table Name</caption> -->
                <tr>
                    <th>N° client</th>
                    <th><a href="index.php?page=6&ordre=1">Date d'inscription</a></th>
                    <th><a href="index.php?page=6&ordre=2">Nom</a></th>
                    <th>Prénom</th>
                    <th>Mail</th>
                    <th>Téléphone</th>
                    <th>Voir les devis</th>
                    <?php 
                        if ($_SESSION['connexion'] == 2) {
                            ?>
                            <th>Désactiver le compte</th>
                            <?php
                        }
                    ?>
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