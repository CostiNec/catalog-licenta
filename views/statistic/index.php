<?php
/**
 * @var $View View
 * @var $isDevice MobileDetect
 */

use core\View;
use Detection\MobileDetect;

$View->includeView('layout.app');
?>
<script>
    var values = <?= json_encode($values) ?>;
    var promoted = <?= json_encode($promoted) ?>;
</script>
<!-- Page content-->
<div class="page-content page-container" id="page-content">
    <div class="padding">
        <div class="mb-5">
            <label for="coursesChart">Alegeti un curs</label>
            <select class="js-example-basic-multiple w-100" id="coursesChart" name="courses[]" multiple="multiple">
                <?php foreach ($courses as $course) { ?>
                    <option value="<?= $course->id ?>"><?= $course->name ?></option>
                <?php } ?>
            </select>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <div style="max-width: 400px">
                                <canvas id="barChart" width="400" height="400"></canvas>
                            </div>

                            <div style="max-width: 400px; margin-top: 25px">
                                <canvas id="lineChart" width="400" height="400"></canvas>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div style="max-width: 400px">
                                <canvas id="pieChart" width="400" height="400"></canvas>
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

