<?php
/**
 * @var $View View
 * @var $isDevice MobileDetect
 * @var $courses \models\Course
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
                    <h2 class="mt-4">Editeaza utilizator</h2>

                    <?php $View->includeView('admin.user.snippets._form', [
                        'type' => 'edit',
                        'userTmp' => $userTmp
                    ]) ;?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
$View->includeView('layout.bottom');
?>

