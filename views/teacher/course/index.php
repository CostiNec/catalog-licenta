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
                                    <div><a href="/stundenti/<?= $course->id ?>" data-abc="true"><span class="w-40 avatar gd-primary"><?= $course->getAbbreviation() ?></span></a></div>
                                    <div class="flex"> <a href="/stundenti/<?= $course->id ?>" class="item-author text-color" data-abc="true"><?= $course->name ?></a>
                                        <div class="item-except text-muted text-sm h-1x"><?= $course->description ?></div>
                                    </div>
                                    <div>
                                        <div class="item-action dropdown">
                                            <a href="#" data-toggle="dropdown" class="text-muted" data-abc="true">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-vertical">
                                                    <circle cx="12" cy="12" r="1"></circle>
                                                    <circle cx="12" cy="5" r="1"></circle>
                                                    <circle cx="12" cy="19" r="1"></circle>
                                                </svg>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right bg-black" role="menu">
                                                <a class="dropdown-item" href="/acces-cursuri-studenti/<?= $course->id ?>" data-abc="true">Gestioneaza acces studenti </a>
                                                <a class="dropdown-item" href="/stundenti/<?= $course->id ?>">Gestioneaza note studenti </a>
                                            </div>
                                        </div>
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

