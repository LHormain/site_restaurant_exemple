<?php
include('controler/traitement_admins_gestion.php');
?>
<div class="col-12">
    <h2>Liste des admins</h2>
    <div class="table-responsive">
        <table class="table table-striped
        table-hover	
        table-borderless
        table-primary
        align-middle text-center">
            <thead class="table-light ">
                <caption>Table Name</caption>
                <tr>
                    <th>N° utilisateur</th>
                    <th><a href="index.php?page=7&ordre=2">Nom</a></th>
                    <th>Prénom</th>
                    <th>Mail</th>
                    <th>Téléphone</th>
                    <th>Modifier</th>
                    <th>Supprimer</th>
                </tr>
            </thead>
            <tbody class="table-group-divider ">
                <?php
                echo $table;
                ?>
            </tbody>
            <tfoot>
                
            </tfoot>
        </table>
    </div>
    
</div>