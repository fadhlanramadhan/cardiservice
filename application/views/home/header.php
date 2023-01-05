<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">

    <title>Cardi Computer & Services</title>

    <meta name="description" content="Description">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=2">

    <link rel="icon" href="<?= base_url(); ?>assets/img/favicon/cardiicon.ico" type="image/x-icon">

    <link rel="stylesheet" href="<?= base_url(); ?>assets/css/libs.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/css/sb-admin-2.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/css/style.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/vendor/fontawesome-free/css/all.min.css" type="text/css">
    <link rel="preload" href="<?= base_url(); ?>assets/fonts/istok-web-v15-latin/istok-web-v15-latin-regular.woff2" as="font" type="font/woff2" crossorigin>
    <link rel="preload" href="<?= base_url(); ?>assets/fonts/istok-web-v15-latin/istok-web-v15-latin-700.woff2" as="font" type="font/woff2" crossorigin>
    <link rel="preload" href="<?= base_url(); ?>assets/fonts/montserrat-v15-latin/montserrat-v15-latin-700.woff2" as="font" type="font/woff2" crossorigin>
    <link rel="preload" href="<?= base_url(); ?>assets/fonts/montserrat-v15-latin/montserrat-v15-latin-600.woff2" as="font" type="font/woff2" crossorigin>

    <link rel="preload" href="<?= base_url(); ?>assets/fonts/material-icons/material-icons.woff2" as="font" type="font/woff2" crossorigin>
    <link rel="preload" href="<?= base_url(); ?>assets/fonts/material-icons/material-icons-outlined.woff2" as="font" type="font/woff2" crossorigin>



</head>

<body>

    <main class="main">

        <div class="main-inner">

            <!-- Begin mobile main menu -->
            <nav class="mmm">
                <div class="mmm-content">
                    <ul class="mmm-list">
                        <li><a href="<?= base_url("home"); ?>">Home</a></li>
                        <li><a href="<?= base_url("home/pricing"); ?>">Pricing</a></li>
                        <li><a href="<?= base_url("home/aboutus"); ?>">About us</a></li>
                        <li><a href="<?= base_url("home/contactus"); ?>">Contact Us</a></li>
                    </ul>
                    <ul>
                        <li><a class="btn btn-with-icon btn-small ripple" href="<?= base_url("auth"); ?>">Log In</a></li>
                    </ul>
                </div>
            </nav><!-- End mobile main menu -->
            <!-- Begin header -->
            <header class="header">
                <!-- Begin header fixed -->
                <nav class="header-fixed">
                    <div class="container">
                        <div class="row flex-nowrap align-items-center justify-content-between">
                            <div class="col-auto d-block d-lg-none header-fixed-col">
                                <div class="main-mnu-btn">
                                    <span class="bar bar-1"></span>
                                    <span class="bar bar-2"></span>
                                    <span class="bar bar-3"></span>
                                    <span class="bar bar-4"></span>
                                </div>
                            </div>
                            <div class="col-auto header-fixed-col">
                                <!-- Begin logo -->
                                <img src="<?= base_url(); ?>assets/img/cardiicon.jpeg" width="72" height="72" alt="Cardi">
                                <!-- End logo -->
                            </div>
                            <div class="col-auto header-fixed-col d-none d-lg-block col-static">
                                <!-- Begin main menu -->
                                <nav class="main-mnu">
                                    <ul class="main-mnu-list">
                                        <li><a href="<?= base_url("home"); ?>" data-title="Home"><span>Home</span></a></li>
                                        <li><a href="<?= base_url("home/pricing"); ?>" data-title="Pricing"><span>Pricing</span></a></li>
                                        <li><a href="<?= base_url("home/aboutus"); ?>" data-title="About us"><span>About us</span></a></li>
                                        <li><a href="<?= base_url("home/contactus"); ?>" data-title="Contact Us"><span>Contact Us</span></a></li>
                                    </ul>
                                </nav><!-- End main menu -->
                            </div>

                            <div class="col-auto header-fixed-col col-static">
                                <!-- Begin header actions -->
                                <ul class="header-actions">
                                    <!-- Begin header profile -->
                                    <nav class="main-mnu">
                                        <ul>
                                            <li><a class="btn btn-with-icon btn-small ripple" href="<?= base_url("auth"); ?>">Log In</a></li>
                                        </ul>
                                    </nav><!-- End main menu -->
                                    <!-- End header profil -->
                                    <!-- Begin header navbar -->
                                    <!-- End header navbar -->
                                </ul><!-- End header actions -->
                            </div>
                        </div>
                    </div>
                </nav><!-- End header fixed -->
            </header><!-- End header -->