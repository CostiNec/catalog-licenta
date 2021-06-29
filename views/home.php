<?php
/**
 * @var $View View
 * @var $isDevice MobileDetect
 */

use core\View;
use Detection\MobileDetect;

$View->includeView('layout.app');
?>
 <!-- Page content-->
<div class="page-content page-container" id="page-content">
    <div class="padding">
        <div class="row">
            <div class="col-sm-12">
                <div class="container">
                <?php if ($guest) { ?>
                    <h2 class="mt-4">Catalog online</h2>
                    <p>Aceasta este o platforma online pentru a gestiona situatia studentilor</p>
                    <p>Va rugam sa va conectati cu contul dumneavoastra pentru a putea accesa platforma</p>
                <?php } ?>

                <?php if ($auth) { ?>
                    <?php if ($user->isStudent()) { ?>
                        <h2 class="mt-4">Bun venit, <?= $user->fullName()?>!</h2>
                        <p>Aceasta este o platforma online pentru a gestiona situatia dumneavostra scolara</p>
                        <p>Accesati "Cursurile mele" pentru a vedea daca profesorii dumnevoastra v-au modificat sau adaugat noi note</p>

                    <?php } ?>

                    <?php if ($user->isTeacher()) { ?>
                        <h2 class="mt-4">Bun venit, <?= $user->fullName()?>!</h2>
                        <p>Accesati sectiuna de "Administreaza cursuri" pentru a modifica situatia scolara a studentilor dumnevoastra</p>

                    <?php } ?>

                    <?php if ($user->isAdmin()) { ?>
                        <h2 class="mt-4">Bun venit, <?= $user->fullName()?>!</h2>
                        <p>Ai dreptul sa adaugi noi utilizatori cu rol de profesor sau student</p>
                        <p>De asemenea poti administra si cursurile, sa adaugi sau sa stergi</p>

                    <?php } ?>
                <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
    $View->includeView('layout.bottom');
?>

