<?php
if (isset($_GET['dev']) && $_GET['dev'] != NULL) {
    $id_devis = intval($_GET['dev']);

    $donnees = req_devis($bdd, $id_devis);

    $client = req_utilisateur_v2($bdd,$donnees['id_utilisateur']);
    $tarif = tarif();
    $grille_tarifaire = $tarif[0];
    $couvert = $tarif[1];
    $prestation = $tarif[2];
    $prestation_unitaire = $tarif[3];
    $boisson = $tarif[4];
    $boisson_unitaire = $tarif[5];

    $table = '
    <tr class="">
        <td scope="row">Prestation de base</td>
        <td>-</td>
        <td>'.$prestation.'</td>
        <td>'.$prestation.'</td>
    </tr>
    <tr class="">
        <td scope="row">Service </td>
        <td>'.$donnees['nbr_personnes_devis'].'</td>
        <td>'.$prestation_unitaire.'</td>
        <td>'.$prestation_unitaire*$donnees['nbr_personnes_devis'].'</td>
    </tr>';
    if ($donnees['type_repas_devis'] == 'assiette') {
        $table .= '
        <tr class="">
            <td scope="row">Couver </td>
            <td>'.$donnees['nbr_personnes_devis'].'</td>
            <td>'.$couvert.'</td>
            <td>'.$couvert*$donnees['nbr_personnes_devis'].'</td>
        </tr>';
    }
    $table .= '
    <tr class="">
        <td scope="row">'.$donnees['type_repas_devis'].'</td>
        <td>'.$donnees['nbr_personnes_devis'].'</td>
        <td>'.$grille_tarifaire[$donnees['type_evenement_devis']][$donnees['type_repas_devis']].'</td>
        <td>'.$grille_tarifaire[$donnees['type_evenement_devis']][$donnees['type_repas_devis']]*$donnees['nbr_personnes_devis'].'</td>
    </tr>
    <tr class="">
    <td scope="row">Service boisson </td>
        <td>-</td>
        <td>'.$boisson.'</td>
        <td>'.$boisson.'</td>
    </tr>
    <tr class="">
        <td scope="row">Boisson </td>
        <td>'.$donnees['nbr_personnes_devis'].'</td>
        <td>'.$boisson_unitaire.'</td>
        <td>'.$boisson_unitaire*$donnees['nbr_personnes_devis'].'</td>
    </tr>
    ';
}

?>