<?php
/**
 * @var $View View
 * @var $isDevice MobileDetect
 */

use core\Helper;
use core\View;
use Detection\MobileDetect;

$View->includeView('layout.app');

?>
<div class="page-content page-container" id="page-content">
    <div class="padding">
        <div class="row">
            <div class="col-sm-12">
                <div class="container">
                    <h2>Cursurile dumneavoastra</h2>
                    <form class="form-group" method="post" action="/grant-access/<?= $course->id ?>">
                        <input name="csrf_token" value="<?= $_SESSION['csrf_token'] ?>" hidden>

                        <div class="d-flex flex-column">
                            <label for="usersIds" class="mt-3">Studentii cursului</label>
                            <select class="js-example-basic-multiple form-control" id="usersIds" name="usersIds[]" multiple="multiple">
                                <?php foreach ($usersFormatted as $value => $userFormatted) { ?>
                                    <option <?= in_array($value,$students) ? 'selected' : '' ?> value="<?=$value?>"><?=$userFormatted?></option>
                                <?php } ?>
                            </select>
                        </div>


                        <button class="btn btn-success mt-2">Salveaza</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
$View->includeView('layout.bottom');
?>
