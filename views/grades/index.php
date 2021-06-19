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
                    <h3>Notele lui <?= $student->fullName() ?> la materia <?= $course->name ?></h3>
                    <a href="/nota/creaza/<?= $course->id ?>/<?= $student->id ?>" class="btn btn-success mb-3">Adauga nota</a>
                    <?php if (count($grades)) { ?>
                    <div class="list list-row card">
                    <div class="row">
                        <div class="col-md-12">
                        <?php foreach ($grades as $grade) { ?>
                            <div class="list-item">
                                <div>
                                    <a href="/stundenti/<?= $grade->id ?>" data-abc="true">
                                        <span <?= $grade->value < 5 ? 'style="background: #ff0000 linear-gradient(45deg, #c31323, #f19494);"': '' ?> class="w-40 avatar gd-primary"><?= $grade->value ?></span>
                                    </a>
                                </div>
                                <div class="flex"> <a href="/stundenti/<?= $grade->id ?>" class="item-author text-color" data-abc="true"><?= $grade->name ?></a>
                                    <div class="item-except text-muted text-sm h-1x"><?= $grade->feedback ?></div>
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
                                            <a class="dropdown-item" href="/nota/editeaza/<?= $grade->id ?>" data-abc="true"> Editeaza nota </a>
                                            <a data-toggle="modal" class="dropdown-item" href="#" data-target="#deleteGrade<?=$grade->id?>">Sterge nota</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade" id="deleteGrade<?=$grade->id?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Esti sigur ca vrei sa stergi nota?</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>

                                        <form method="post" action="/grade/delete/<?=$grade->id?>">
                                            <input name="csrf_token" value="<?=$_SESSION['csrf_token']?>" hidden>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Inchide</button>
                                                <button type="submit" class="btn btn-danger">Sunt sigur</button>
                                            </div>
                                        </form>
                                    </div>
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

