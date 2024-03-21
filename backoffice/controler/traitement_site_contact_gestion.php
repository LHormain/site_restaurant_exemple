<?php
$messages = req_messages($bdd);
$table_contact = '';
foreach ($messages as $donnees) {
    $table_contact .= table_contact_gestion($donnees);
}
?>