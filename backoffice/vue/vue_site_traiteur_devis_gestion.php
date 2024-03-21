<?php
include('controler/traitement_site_traiteur_devis_gestion.php');
?>

<div class="col-12">
    <h2>Devis</h2>
    <div class="table-responsive mt-3">
        <table class="table table-striped
        table-hover	
        table-borderless
        table-primary
        align-middle">
            <thead class="table-light">
                <caption>Table Name</caption>
                <tr>
                    <th>N° devis</th>
                    <th><a href="index.php?page=4&c=1&ordre=1">Date de création</a></th>
                    <th><a href="index.php?page=4&c=1&ordre=2">Nom client</a></th>
                    <th><a href="index.php?page=4&c=1&ordre=3">Date de l'événement</a></th>
                    <th>Type d'événement</th>
                    <th>Voir devis</th>
                    <th>Répondre</th>
                    <th><a href="index.php?page=4&c=1&ordre=4">État</a></th>
                </tr>
                </thead>
                <tbody class="table-group-divider">
                    <?php echo $table_devis; ?>
                </tbody>
                <tfoot>
                    
                </tfoot>
        </table>
    </div>
    
</div>