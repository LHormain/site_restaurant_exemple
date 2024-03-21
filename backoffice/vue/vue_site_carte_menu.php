<div class="col-10 p-5">
    <div class="row">
        <h1>Restaurant - Menu du jour</h1> 

        <a class="btn btn-primary col-2 me-3" href="index.php?page=32&c=1" role="button">Saisir un menu</a>
        <a class="btn btn-primary col-2 me-3" href="index.php?page=32&c=2" role="button">Gestion du menu</a>

        <?php
            include('controler/traitement_site_carte_menu.php');
        ?>
    </div>
</div>