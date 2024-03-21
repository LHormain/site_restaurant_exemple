<?php
if (isset( $_GET['page']) 
&& $_GET['page']) {
    $page = $_GET['page'];
}
else {
    $page = 1;
}
if (isset( $_GET['c']) 
&& $_GET['c']) {
    $c = $_GET['c'];
}
else {
    $c = 1;
}
include('controler/composant/traitement_nav.php');
?>
<nav class="col-2 bg-dark ">
    <a  class="btn btn-primary my-3" href="index.php?page=1" role="button">Accueil</a>
    <!-- ---------------------------------------------------------------------------------- -->
    <!--                                        carte                                       -->
    <!-- ---------------------------------------------------------------------------------- -->
    <h3 class="text-light text-center"></h3>
    <div class="accordion accordion-flush" id="accordionBackoffice">
        
        <br>
        <div class="accordion-item">
            <h2 class="accordion-header" id="flush-headingOne">
                <?php
                if (in_array($page, [3,31,32,33])) {
                    ?>
                    <button class="accordion-button bg-dark text-light" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="true" aria-controls="flush-collapseOne">
                    <?php
                }
                else {
                    ?>
                    <button class="accordion-button bg-dark text-light collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="true" aria-controls="flush-collapseOne">
                    <?php
                }
                ?>
                    Restaurant
                </button>
            </h2>
            <?php 
            if (in_array($page, [3,31,32,33])) {
                ?>
                <div id="flush-collapseOne" class="accordion-collapse bg-dark collapse show" aria-labelledby="flush-headingOne" data-bs-parent="#accordionBackoffice">
                <?php
            }
            else {
                ?>
                <div id="flush-collapseOne" class="accordion-collapse bg-dark collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionBackoffice">
                <?php
            }
            ?>
                <div class="accordion-body d-flex flex-column">
                    <?php
                    // carte
                    if ($page == 3) {
                        ?>
                        <a class="btn btn-warning my-3" href="index.php?page=3" role="button">Carte</a>
                        <?php 
                        if ($c == 1) {
                            ?>
                            <a class="btn btn-outline-warning my-3" href="index.php?page=3&c=1" role="button">Saisir un plat</a>
                            <a class="btn btn-outline-primary my-3" href="index.php?page=3&c=2" role="button">Gestion de la carte</a>
                            <?php
                        }
                        else {
                            ?>
                            <a class="btn btn-outline-primary my-3" href="index.php?page=3&c=1" role="button">Saisir un plat</a>
                            <a class="btn btn-outline-warning my-3" href="index.php?page=3&c=2" role="button">Gestion de la carte</a>
                            <?php
                        }
                    }
                    else {
                        ?>
                        <a class="btn btn-primary my-3" href="index.php?page=3" role="button">Carte</a>
                        <?php
                    }
                    if ($page == 31) {
                        ?>
                        <a class="btn btn-warning my-3" href="index.php?page=31" role="button">Images</a>
                        <?php  
                        if ($c == 1) {
                            ?>
                            <a class="btn btn-outline-warning my-3" href="index.php?page=31&c=1" role="button">Saisir une image</a>
                            <a class="btn btn-outline-primary my-3" href="index.php?page=31&c=2" role="button">Gestion des images</a>
                            <?php
                        }
                        else {
                            ?>
                            <a class="btn btn-outline-primary my-3" href="index.php?page=31&c=1" role="button">Saisir une image</a>
                            <a class="btn btn-outline-warning my-3" href="index.php?page=31&c=2" role="button">Gestion des images</a>
                            <?php
                        }
                    }
                    else {
                        ?>
                        <a class="btn btn-primary my-3" href="index.php?page=31" role="button">Images</a>
                        <?php
                    }
                    if ($page == 32) {
                        ?>
                        <a class="btn btn-warning my-3" href="index.php?page=32" role="button">Menus</a>
                        <?php
                        if ($c == 2) {
                            ?>
                            <a class="btn btn-outline-primary my-3" href="index.php?page=32&c=1" role="button">Saisir un menu</a>
                            <a class="btn btn-outline-warning my-3" href="index.php?page=32&c=2" role="button">Gestion du menu</a>
                            <?php
                        }  
                        else {
                            ?>
                            <a class="btn btn-outline-warning my-3" href="index.php?page=32&c=1" role="button">Saisir un menu</a>
                            <a class="btn btn-outline-primary my-3" href="index.php?page=32&c=2" role="button">Gestion du menu</a>
                            <?php
                        }
                    }
                    else {
                        ?>
                        <a class="btn btn-primary my-3" href="index.php?page=32" role="button">Menus</a>
                        <?php
                    }
                    if ($page == 33) {
                        ?>
                        <a class="btn btn-warning my-3" href="index.php?page=33" role="button">Boissons</a>
                        <?php  
                        if ($c == 1) {
                            ?>
                            <a class="btn btn-outline-warning my-3" href="index.php?page=33&c=1" role="button">Saisir une boisson</a>
                            <a class="btn btn-outline-primary my-3" href="index.php?page=33&c=2" role="button">Gestion de la carte boissons</a>
                            <?php
                        }
                        else {
                            ?>
                            <a class="btn btn-outline-primary my-3" href="index.php?page=33&c=1" role="button">Saisir une boisson</a>
                            <a class="btn btn-outline-warning my-3" href="index.php?page=33&c=2" role="button">Gestion de la carte boissons</a>
                            <?php
                        }
                    }
                    else {
                        ?>
                        <a class="btn btn-primary my-3" href="index.php?page=33" role="button">Boissons</a>
                        <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    <!-- ---------------------------------------------------------------------------------- -->
    <!--                                    Traiteur                                        -->
    <!-- ---------------------------------------------------------------------------------- -->
    <div class="accordion-item">
        <h2 class="accordion-header" id="flush-headingTwo">
            <?php
            if ($page == 4) {
                ?>
                <button class="accordion-button bg-dark text-light " type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="true" aria-controls="flush-collapseTwo">
                <?php
            }
            else {
                ?>
                <button class="accordion-button bg-dark text-light collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="true" aria-controls="flush-collapseTwo">
                <?php
            }
            ?>
                Traiteur
            </button>
        </h2>
        <?php
        if ($page == 4) {
            ?>
            <div id="flush-collapseTwo" class="accordion-collapse collapse bg-dark show" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionBackoffice">
            <?php
        }
        else {
            ?>
            <div id="flush-collapseTwo" class="accordion-collapse collapse bg-dark" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionBackoffice">
            <?php
        }
        ?>
            <div class="accordion-body  d-flex flex-column">
                <?php
                if ($page == 4) {
                    ?>
                    <a class="btn btn-warning my-3" href="index.php?page=4" role="button">Traiteur </a>
                    <?php 
                    if ($c == 1 || $c == 5) {
                        ?>
                        <a class="btn btn-outline-warning my-3 position-relative" href="index.php?page=4&c=1" role="button">Devis <span class="badge bg-danger border border-dark fs-6 position-absolute top-0 start-100 translate-middle p-2"><?php echo $nbr_devis; ?></span></a>
                        <a class="btn btn-outline-primary my-3" href="index.php?page=4&c=2" role="button">Gestion des Menus entreprise</a>
                        <a class="btn btn-outline-primary my-3" href="index.php?page=4&c=3" role="button">Saisie d'un Menu entreprise</a>
                        <?php
                    }
                    elseif ($c == 2) {
                        ?>
                        <a class="btn btn-outline-primary my-3 position-relative" href="index.php?page=4&c=1" role="button">Devis <span class="badge bg-danger border border-dark fs-6 position-absolute top-0 start-100 translate-middle p-2"><?php echo $nbr_devis; ?></span></a>
                        <a class="btn btn-outline-warning my-3" href="index.php?page=4&c=2" role="button">Gestion des Menus entreprise</a>
                        <a class="btn btn-outline-primary my-3" href="index.php?page=4&c=3" role="button">Saisie d'un Menu entreprise</a>
                        <?php
                    }
                    else {
                        ?>
                        <a class="btn btn-outline-primary my-3 position-relative" href="index.php?page=4&c=1" role="button">Devis <span class="badge bg-danger border border-dark fs-6 position-absolute top-0 start-100 translate-middle p-2"><?php echo $nbr_devis; ?></span></a>
                        <a class="btn btn-outline-primary my-3" href="index.php?page=4&c=2" role="button">Gestion des Menus entreprise</a>
                        <a class="btn btn-outline-warning my-3" href="index.php?page=4&c=3" role="button">Saisie d'un Menu entreprise</a>
                        <?php
                    }
                }
                else {
                    ?>
                    <a class="btn btn-primary my-3 position-relative" href="index.php?page=4" role="button">Traiteur <span class="badge bg-danger border border-dark fs-6 position-absolute top-0 start-100 translate-middle p-2"><?php echo $nbr_devis; ?></span></a>
                    <?php
                }
                ?>
            </div>
        </div>
    </div>  
    <!-- ---------------------------------------------------------------------------------- -->
    <!--                                    Administratif                                        -->
    <!-- ---------------------------------------------------------------------------------- -->
    <div class="accordion-item">
        <h2 class="accordion-header" id="flush-headingTree">
            <?php
            if (in_array($page, [5,6,7])) {
                ?>
                <button class="accordion-button bg-dark text-light " type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse-Tree" aria-expanded="true" aria-controls="flush-collapse-Tree">
                <?php
            }
            else {
                ?>
                <button class="accordion-button bg-dark text-light collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse-Tree" aria-expanded="true" aria-controls="flush-collapse-Tree">
                <?php
            }
            ?>
                Administratif
            </button>
        </h2>
        <?php
        if (in_array($page, [5,6,7])) {
            ?>
            <div id="flush-collapse-Tree" class="accordion-collapse collapse bg-dark show" aria-labelledby="flush-headingTree" data-bs-parent="#accordionBackoffice">
            <?php
        }
        else {
            ?>
            <div id="flush-collapse-Tree" class="accordion-collapse collapse bg-dark" aria-labelledby="flush-headingTree" data-bs-parent="#accordionBackoffice">
            <?php
        }
        ?>
            <div class="accordion-body  d-flex flex-column">
                <?php
                if ($page == 5) {
                    ?>
                    <a class="btn btn-warning my-3 position-relative" href="index.php?page=5" role="button">Contact <span class="badge bg-danger border border-dark fs-6 position-absolute top-0 start-100 translate-middle p-2"><?php echo $nbr_contact; ?></span></a>
                    <?php
                }
                else {
                    ?>
                    <a class="btn btn-primary my-3 position-relative" href="index.php?page=5" role="button">Contact<span class="badge bg-danger border border-dark fs-6 position-absolute top-0 start-100 translate-middle p-2"><?php echo $nbr_contact; ?></span></a>
                    <?php
                }
                if ($page == 6) {
                    ?>
                    <a class="btn btn-warning my-3" href="index.php?page=6" role="button">Clients</a>
                    <?php
                }
                else {
                    ?>
                    <a class="btn btn-primary my-3" href="index.php?page=6" role="button">Clients</a>
                    <?php
                }
                if ($_SESSION['connexion'] == 2 ){
                    if ($page == 7) {
                        ?>
                        <a class="btn btn-warning my-3" href="index.php?page=7" role="button">Gestion des admins</a>
                        <?php
                    }
                    else {
                        ?>
                        <a class="btn btn-primary my-3" href="index.php?page=7" role="button">Gestion des admins</a>
                        <?php
                    }
                }
                ?>
            </div>
        </div>
    </div> 
    <br>
    </div>
    <a  class="btn btn-primary my-3" href="index.php?page=2&dis=1" role="button">Déconnexion</a>
</nav>