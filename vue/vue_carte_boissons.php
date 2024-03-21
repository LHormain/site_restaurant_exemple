<?php
include('controler/traitement_carte_boissons.php')
?>

<!-- Boisson -->
<div class="offset-md-1 col-md-10 my-5 ">
    <div class="row">
        <div class="offset-lg-1 col-lg-10">
            <h3>Boissons</h3>
            <div class="row">
                <div class="col-lg-6 ">
                    <!-- soft -->
                    <h4>Softs</h4>
                    <div class="row">
                        <?php
                            echo $table1;
                        ?>
                    </div>
                    <h4 class="mt-3">Café et infusion</h4>
                    <div class="row">
                        <!-- chaud -->
                        <?php
                            echo $table2;
                        ?>

                    </div>
                </div>
                <div class="col-lg-6">
                    <h4>Alcools</h4>
                    <div class="row">
                        <?php
                            echo $table3;
                        ?>
                    </div>
                    <h4 class="mt-3">Aperitifs</h4>
                    <div class="row">
                        <?php
                            echo $table4;
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>