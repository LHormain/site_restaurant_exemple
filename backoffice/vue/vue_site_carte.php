<div class="col-10 p-5">
    <div class="row">
        <h1>Restaurant - Carte</h1> 

        <a class="btn btn-primary col-2 me-3" href="index.php?page=3&c=1" role="button">Saisir un plat</a>
        <a class="btn btn-primary col-2 me-3" href="index.php?page=3&c=2" role="button">Gestion de la carte</a>

        <?php
            include('controler/traitement_site_carte.php');
        ?>
    </div>
</div> 