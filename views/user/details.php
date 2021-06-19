<?php
/**
 * @var $View View
 * @var $isDevice MobileDetect
 * @var $user \models\User
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
                    <h2>Detalii cont</h2>
                    <p>Nume: <?= $user->fullName() ?></p>
                    <p>Email: <?= $user->email ?></p>
                    <p>Tip utilizator: <?= $user->userRoleName() ?></p>
                    <?php if (!$user->isAdmin()) { ?>
                        <p>Numaru de telefon: <?= $user->phone ?></p>
                        <p>Data nasterii: <?= $user->birthday() ?></p>
                        <p>Sexul: <?= $user->gender() ?></p>
                    <?php } ?>

                    <?php if ($user->isStudent()) { ?>
                        <p>Grupa: <?= $user->group_name ?></p>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
$View->includeView('layout.bottom');
?>

