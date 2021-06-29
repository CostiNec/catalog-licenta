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

                    <div class="account-details-container">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="icon-user">
                                    <i class="<?= $user->icon() ?> fa-4x"></i>
                                </div>
                                <p class="detail-name"><?= $user->fullName() ?></p>
                            </div>
                            <div class="col-md-9">
                                <p>Email <i class="fas fa-at"></i> : <?= $user->email ?></p>
                                <p>Tip utilizator <i class="fas fa-user-alt"></i> : <?= $user->userRoleName() ?></p>
                                <?php if (!$user->isAdmin()) { ?>
                                    <p>Numarul de telefon <i class="fas fa-phone"></i> : <?= $user->phone ?></p>
                                    <p>Data nasterii <i class="fas fa-birthday-cake"></i> : <?= $user->birthday() ?></p>
                                    <p>Sexul <i class="fas fa-venus-mars"></i> : <?= $user->gender() ?></p>
                                <?php } ?>

                                <?php if ($user->isStudent()) { ?>
                                    <p>Grupa: <?= $user->groupName() ?></p>
                                    <p>Serie: <?= $user->serieName() ?></p>
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

