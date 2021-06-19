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
                    <h2>Cursurile dumneavoastra</h2>
                    <div class="list list-row card">
                        <div class="row">
                            <div class="col-md-12">
                                <?php foreach ($courses as $course) { ?>
                                    <div class="list-item">
                                        <div><a href="/notele-mele/<?= $course->id ?>" data-abc="true"><span class="w-40 avatar gd-primary"><?= $course->getAbbreviation() ?></span></a></div>
                                        <div class="flex"> <a href="/notele-mele/<?= $course->id ?>" class="item-author text-color" data-abc="true"><?= $course->name ?></a>
                                            <div class="item-except text-muted text-sm h-1x"><?= $course->description ?></div>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
$View->includeView('layout.bottom');
?>

