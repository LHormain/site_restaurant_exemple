<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top shadow no-print">
    <div class="container">
        <a class="navbar-brand" href="index.php?page=1">
            <img src="public/assets/img/illustration_site/logo2.png" alt="" class="img-fluid logo">
        </a>
        <button class="navbar-toggler hidden-lg-up bg-dark" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavBar" aria-controls="collapsibleNavBar" aria-expanded="false" aria-label="Toggle navigation"></button>
        <div class="collapse navbar-collapse " id="collapsibleNavBar">
            <ul class="navbar-nav me-auto mt-1 mt-lg-0 flex-lg-row-reverse flex-column-reverse w-100">
              <!-- Les liens sont en sens inverse de l'affichage -->
                <?php 
                if (isset($_SESSION['id_client'])) {
                    // si client connecté vers espace client et déconnexion
                    ?>
                    <li class="nav-item dropdown text-center text-lg-start">
                      <a class="nav-link dropdown-toggle" href="index.php?page=5" id="dropdownClient" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Espace Client</a>
                      <ul class="dropdown-menu" aria-labelledby="dropdownClient">
                        <li><a class="dropdown-item text-center text-lg-start" href="index.php?page=5">Espace client</a></li>
                        <li><a class="dropdown-item text-center text-lg-start" href="index.php?page=6&dis=1">Déconnexion</a></li>
                      </ul>
                    </li>
                    <?php
                } 
                else { 
                    // sinon vers connexion
                    ?>
                    <li class="nav-item text-center text-lg-start">
                      <a class="nav-link" href="index.php?page=5">Connexion</a>
                    </li>
                    <?php
                } 
                ?>
                <li class="nav-item text-center text-lg-start">
                    <a class="nav-link" href="index.php?page=4">Contact</a>
                </li>
                <!-- Traiteur -->
                <li class="nav-item dropdown text-center text-lg-start">
                    <a class="nav-link dropdown-toggle" href="index.php?page=3" id="dropdownTraiteur" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Traiteur</a>
                    <ul class="dropdown-menu" aria-labelledby="dropdownTraiteur">
                        <li><a class="dropdown-item text-center text-lg-start" href="index.php?page=3&c=1">Menus Entreprises</a></li>
                        <li><a class="dropdown-item text-center text-lg-start" href="index.php?page=3&c=2">Événements privés</a></li>
                        <li><a class="dropdown-item text-center text-lg-start" href="index.php?page=3&c=3">Demande de devis</a></li>
                    </ul>
                </li>
                <!-- Carte -->
                <li class="nav-item dropdown text-center text-lg-start">
                    <a class="nav-link dropdown-toggle" href="index.php?page=2" id="dropdownCarte" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Carte</a>
                    <ul class="dropdown-menu" aria-labelledby="dropdownCarte">
                        <li><a class="dropdown-item text-center text-lg-start" href="index.php?page=2&c=1">Menu du jour</a></li>
                        <li><a class="dropdown-item text-center text-lg-start" href="index.php?page=2&c=2">Entrée </a></li>
                        <li><a class="dropdown-item text-center text-lg-start" href="index.php?page=2&c=3">Plat </a></li>
                        <li><a class="dropdown-item text-center text-lg-start" href="index.php?page=2&c=4">Dessert</a></li>
                        <li><a class="dropdown-item text-center text-lg-start" href="index.php?page=2&c=5">Boisson</a></li>
                    </ul>
                </li>
                <!-- Accueil -->
                <li class="nav-item text-center text-lg-start">
                    <a class="nav-link active" href="index.php?page=1" aria-current="page">Accueil <span class="visually-hidden">(current)</span></a>
                </li>
            </ul>
          
        </div>
    </div>
</nav>

<script>

</script>