<?php
/**
 * @var $View View
 * @var $isDevice MobileDetect
 * @var $users \models\user
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
                    <h2 class="mt-4">Administrare utilizatori</h2>

                    <a type="button" href="/admin-utilizatori/creaza" class="btn btn-success">
                        Creaza utilizator nou
                    </a>

                    <?php
                    if (count($users)) {
                        echo '<div class="grid-simple-index">';
                        foreach ($users as $userTmp) {
                            if ($userTmp->id != $user->id) {
                                $View->includeView('admin.user.snippets.user', [
                                    'userTmp' => $userTmp,
                                ]);
                            }
                        }
                        echo '</div>';
                    }
                    ?>

                    <?php
                        $View->includeView('layout.pagination', [
                                'pages' => $pages
                        ]);
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
$View->includeView('layout.bottom');
?>

