<?php
include('controler/traitement_site_contact_gestion.php');
?>

<div class="table-responsive">
    <table class="table table-striped
    table-hover	
    table-borderless
    table-primary
    align-middle">
        <thead class="table-light">
            <caption>Liste des messages reçus</caption>
            <tr>
                <th>Date</th>
                <th>Nom</th>
                <th>Prénom</th>
                <th>E-mail</th>
                <th>Sujet</th>
                <th>Lire</th>
                <th>Lu</th>
                <th>Répondre</th>
                <th>Répondu</th>
                <th>Supprimer</th>
            </tr>
            </thead>
            <tbody class="table-group-divider">
                <?php
                
                    echo $table_contact;
                ?>
            </tbody>
            <tfoot>
                
            </tfoot>
    </table>
</div>
        
<script src="public/asset/js/gestion_repondu.js"></script>