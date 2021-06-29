<?php
/**
 * @var $View View
 * @var $isDevice MobileDetect
 */

use core\Helper;
use core\View;
use Detection\MobileDetect;

?>
<head>
    <title>NecuFrame</title>

    <link rel="stylesheet" type="text/css" href="/assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="/assets/css/bootstrap-grid.css">
    <link rel="stylesheet" type="text/css" href="/assets/css/bootstrap-reboot.css">
    <link rel="stylesheet" type="text/css" href="/assets/css/login.css">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" size="100" href="https://necuframe.com/assets/img/metaimg.png" type="image/png">

    <script src="/assets/js/jquery.min.js/"></script>
    <script src="/assets/js/bootstrap.js/"></script>

</head>

<div class="container-fluid px-1 px-md-5 px-lg-1 px-xl-5 py-5 mx-auto">
    <div class="card card0 border-0 color-grey">
        <div class="row d-flex">
            <div class="col-lg-6">
                <div class="card1 pb-5">
                    <div class="row">
                        <a href="/">
                            <img src="/media/LOGO_UPB_oficial_RO.png" class="logo"> </div>
                        </a>
                    <div class="row px-3 justify-content-center mt-4 mb-5 border-line"> <img src="/media/students-logo.png" class="image"> </div>
                </div>
            </div>
            <div class="col-lg-6 d-flex justify-content-center align-items-center">
                <div class="card2 card border-0 px-4 py-5">
                    <form method="post" action="/login">
                        <input name="csrf_token" value="<?= $_SESSION['csrf_token'] ?>" hidden>
                        <div class="row px-3"> <label class="mb-1">
                                <h6 class="mb-0 text-sm">Adresa email</h6>
                            </label> <input class="mb-4" type="text" name="email" placeholder="Enter a valid email address" required>
                        <?php if (!empty($_GET['email']) && $_GET['email'] ) {?>
                        <small class="alert alert-danger">Adresa de email nu este inregistrata in baza noastra de date!</small>
                        <?php } ?>
                        </div>
                        <div class="row px-3"> <label class="mb-1">
                                <h6 class="mb-0 text-sm">Parola</h6>
                            </label> <input type="password" name="password" placeholder="Enter password">
                            <?php if (!empty($_GET['parola']) && $_GET['parola']) {?>
                                <small class="alert alert-danger mt-4">Parola incorecta!</small>
                            <?php } ?>
                        </div>

                        <!--                        <div class="row px-3 mb-4">-->
<!--                            <div class="custom-control custom-checkbox custom-control-inline"> <input id="chk1" type="checkbox" name="chk" class="custom-control-input" required> <label for="chk1" class="custom-control-label text-sm">Remember me</label> </div> <a href="#" class="ml-auto mb-0 text-sm">Forgot Password?</a>-->
<!--                        </div>-->
                        <div class="row mb-3 px-3"> <button type="submit" class="btn btn-blue text-center mt-3">Conectare</button> </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="bg-blue py-4">
            <div class="row px-3"> <small class="ml-4 ml-sm-5 mb-2">Copyright &copy; 2021. All rights reserved.</small>
                <div class="social-contact ml-4 ml-sm-auto"> <span class="fa fa-facebook mr-4 text-sm"></span> <span class="fa fa-google-plus mr-4 text-sm"></span> <span class="fa fa-linkedin mr-4 text-sm"></span> <span class="fa fa-twitter mr-4 mr-sm-5 text-sm"></span> </div>
            </div>
        </div>
    </div>
</div>
