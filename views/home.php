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
                    <h2 class="mt-4">Bun venit!</h2>
                <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
    $View->includeView('layout.bottom');
?>

