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
<!-- Page content-->
<div class="page-content page-container" id="page-content">
    <div class="padding">
        <div class="row">
            <div class="col-sm-12">
                <div class="container">
                    <h2>Administrare cursuri</h2>

                    <a type="button" href="/admin-cursuri/creaza" class="btn btn-success">
                        Creaza curs nou
                    </a>

                    <?php
                    if (count($courses)) {
                        echo '<div class="grid-simple-index">';
                        foreach ($courses as $course) {
                            $View->includeView('admin.course.snippets.course', [
                                'course' => $course,
                            ]);
                        }
                        echo '</div>';
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
$View->includeView('layout.bottom');
?>

