<?php
    $page = 1;

    if (empty($pages)) {
        $pages = 1;
    }

    if (!empty($_GET['page'])) {
        $page = $_GET['page'];
    }
?>

<nav aria-label="Page navigation example">
    <ul class="pagination">
        <?php for ($pageNr = 1; $pageNr <= $pages; $pageNr++) { ?>
            <li class="page-item <?= $pageNr == $page ? 'active' : '' ?>"><a class="page-link" href="<?= getUrlOfSpecificPage($pageNr) ?>"><?= $pageNr ?></a></li>
        <?php } ?>
    </ul>
</nav>
