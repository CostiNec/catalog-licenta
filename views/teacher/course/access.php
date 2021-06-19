<?php
/**
 * @var $View View
 * @var $isDevice MobileDetect
 */

use core\View;
use Detection\MobileDetect;

$View->includeView('layout.app');

?>
<div class="page-content page-container" id="page-content">
    <div class="padding">
        <div class="row">
            <div class="col-sm-12">
                <div class="container">
                    <h2>Ofera studentilor acces la cursul <?= $course->name ?></h2>

                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#manualAccess">
                        Ofera acces manual
                    </button>

                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#seriesAccess">
                        Ofera acces unei serii intregi
                    </button>

                    <div class="modal fade" id="manualAccess" tabindex="-1" role="dialog"
                         aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Ofera access manual</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form class="form-group" method="post" action="/grant-access/<?= $course->id ?>">
                                    <div class="modal-body">
                                        <input name="csrf_token" value="<?= $_SESSION['csrf_token'] ?>" hidden>

                                        <div class="d-flex flex-column">
                                            <label for="usersIds" class="mt-3">Studentii cursului</label>
                                            <select class="js-example-basic-multiple form-control" id="usersIds"
                                                    name="usersIds[]" multiple="multiple">
                                                <?php foreach ($usersFormatted as $value => $userFormatted) { ?>
                                                    <option <?= in_array($value, $students) ? 'selected' : '' ?>
                                                            value="<?= $value ?>"><?= $userFormatted ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Inchide
                                        </button>
                                        <button class="btn btn-success mt-2">Salveaza</button>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>

                    <div class="modal fade" id="seriesAccess" tabindex="-1" role="dialog"
                         aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Ofera access unei serii</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form class="form-group" method="post" action="/grant-access-serie/<?= $course->id ?>">
                                    <div class="modal-body">
                                        <input name="csrf_token" value="<?= $_SESSION['csrf_token'] ?>" hidden>

                                        <div class="d-flex flex-column">
                                            <label for="usersIdsGroup" class="mt-3">Studentii cursului</label>
                                            <select class="js-example-basic-multiple-group form-control"
                                                    id="usersIdsGroup" name="seriesIds[]" multiple="multiple">
                                                <?php foreach ($series as $serie) { ?>
                                                    <option <?= in_array($serie->id, $seriesFormatted) ? 'selected' : '' ?>
                                                            value="<?= $serie->id ?>"><?= $serie->name ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Inchide
                                        </button>
                                        <button class="btn btn-success mt-2">Salveaza</button>
                                    </div>
                                </form>

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
