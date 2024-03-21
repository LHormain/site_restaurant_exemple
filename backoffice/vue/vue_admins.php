<div class="col-10 p-5">
    <div class="row">
        <h1>Liste des admins</h1> 

        <a class="btn btn-primary col-2 me-3" href="index.php?page=7&c=1" role="button">Liste des admins</a>
        <a class="btn btn-primary col-2 me-3" href="index.php?page=7&c=2" role="button">Ajouter un admins</a>

        <?php
            include('controler/traitement_admins.php');
        ?>
    </div>
</div>