<div class="col-10 p-5">
    <div class="row">
        <h1>Restaurant - Carte boissons</h1> 

        <a class="btn btn-primary col-2 me-3" href="index.php?page=33&c=1" role="button">Saisir une boisson</a>
        <a class="btn btn-primary col-3 me-3" href="index.php?page=33&c=2" role="button">Gestion de la carte boisons</a>

        <?php
            include('controler/traitement_site_carte_boisson.php');
        ?>
    </div>
</div>