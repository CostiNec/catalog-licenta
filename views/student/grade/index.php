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
                    <?php if (count($grades)) { ?>
                    <div class="list list-row card">
                        <div class="row">
                            <div class="col-md-12">
                                <?php foreach ($grades as $grade) { ?>
                                    <div class="list-item">
                                        <div>
                                            <a data-abc="true">
                                                <span <?= $grade->value < 5 ? 'style="background: #ff0000 linear-gradient(45deg, #c31323, #f19494);"': '' ?> class="w-40 avatar gd-primary"><?= $grade->value ?></span>
                                            </a>
                                        </div>
                                        <div class="flex">
                                            <a class="item-author text-color" data-abc="true"><?= $grade->name ?></a>
                                            <div class="item-except text-sm h-1x">Corectat de <?= $grade->extra['teacher']->fullName() ?></div>
                                            <div class="item-except text-muted text-sm h-1x"><?= $grade->feedback ?></div>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                        <?php } else { ?>
                            <h3>Nicio nota listata</h3>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php
    $View->includeView('layout.bottom');
    ?>

