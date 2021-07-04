<?php
/**
 * @var $View View
 * @var $isDevice MobileDetect
 */

use core\Helper;
use core\View;
use Detection\MobileDetect;

$View->includeView('template.head');
?>

<body>
<div class="d-flex" id="wrapper">
    <!-- Sidebar-->
    <div class="border-end bg-white" id="sidebar-wrapper">
        <div class="sidebar-heading border-bottom bg-light d-flex justify-content-center">
            <a href="/">
                <img width="100" height="100" src="/media/LOGO_UPB_oficial_RO.png">
            </a>
        </div>
        <?php if ($auth) { ?>
        <div class="list-group list-group-flush">
            <a class="list-group-item list-group-item-action list-group-item-light p-3" href="/">Dashboard</a>
            <a class="list-group-item list-group-item-action list-group-item-light p-3" href="/detalii-cont">Detalii cont</a>

            <?php if ($user->isAdmin()) { ?>
                <a class="list-group-item list-group-item-action list-group-item-light p-3" href="/admin-cursuri">Administreaza cursuri</a>
                <a class="list-group-item list-group-item-action list-group-item-light p-3" href="/admin-utilizatori">Administreaza utilizatori</a>
            <?php } ?>

            <?php if ($user->isTeacher()) { ?>
                <a class="list-group-item list-group-item-action list-group-item-light p-3" href="/profesor-cursuri">Administreaza cursuri</a>
            <?php } ?>

            <?php if ($user->isStudent()) { ?>
                <a class="list-group-item list-group-item-action list-group-item-light p-3" href="/cursurile-mele">Cursurile mele</a>
            <?php } ?>

            <a class="list-group-item list-group-item-action list-group-item-light p-3" href="/statistici">Statistici</a>
        </div>
        <?php } ?>
    </div>
    <!-- Page content wrapper-->
    <div id="page-content-wrapper">
        <!-- Top navigation-->
        <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
            <div class="container-fluid">
                <button class="navbar-toggler navbar-toggler-desktop" id="sidebarToggle" type="button"><span class="navbar-toggler-icon"></span></button>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mt-2 mt-lg-0">
                        <?php if ($guest) { ?>
                            <li class="nav-item"><a class="nav-link" href="/conectare">Conectare</a></li>
                        <?php } ?>

                        <?php if ($auth) { ?>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?= $user->fullName() ?></a>
                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="/logout">Deconectare</a>
                                </div>
                            </li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </nav>
