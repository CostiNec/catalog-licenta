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
                    <?php if (!count($students)) { ?>
                        <h2>Nu aveti niciun student inregistrat la cursul dvs.</h2>
                        <p>Puteti inscrie studenti apasan <a href="/stundenti/<?= $course->id ?>">aici</a></p>
                    <?php } else { ?>
                    <h2>Studentii dumneavoastra</h2>
                    <table id="dtBasicExample" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th class="th-sm">Nume
                            </th>
                            <th class="th-sm">Grupa
                            </th>
                            <th class="th-sm">Email
                            </th>
                            <th class="th-sm">Actiuni
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($students as $student) { ?>
                                <tr>
                                    <td><?= $student->id ?></td>
                                    <td><?= $student->group_name ?></td>
                                    <td><?= $student->email ?></td>
                                    <td>
                                        <div>
                                            <a href="/note/<?= $course->id ?>/<?= $student->id ?>">Editeaza note</a>
                                        </div>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tfoot>
                    </table>
                    <?php } ?>

                </div>
            </div>
        </div>
    </div>
</div>

<?php
$View->includeView('layout.bottom');
?>

