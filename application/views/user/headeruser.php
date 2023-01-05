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

    <link href="<?= base_url('assets/') ?>vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>

<body>

    <main class="main">

        <div class="main-inner">

            <!-- Begin mobile main menu -->
            <nav class="mmm">
                <div class="mmm-content">
                    <ul class="mmm-list">
                        <?php
                        $role_id = $user['role_id'];
                        //<<Disini mungkin karena versi php nya berbeda
                        $queryMenu = "SELECT `user_menu`.`id`,`menu`
                                      FROM `user_menu` JOIN `user_access_menu`
                                      ON `user_menu`. `id` = `user_access_menu`.`menu_id`
                                      WHERE `user_access_menu`.`role_id`= $role_id 
                                      ORDER BY `user_access_menu`.`menu_id` ASC
                                      ";
                        $menu = $this->db->query($queryMenu)->result_array(); ?>
                        <!-- Looping Menu -->
                        <?php foreach ($menu as $m) : ?>

                            <!-- Sub Menu -->
                            <?php
                            $menuId = $m['id'];
                            $querysubMenu = "SELECT *
                                             FROM `user_sub_menu` JOIN `user_menu`
                                             ON `user_sub_menu`.`menu_id` = `user_menu`.`id`
                                             WHERE `user_sub_menu`.`menu_id` = $menuId
                                             AND `user_sub_menu`.`is_active` = 1
                                             ";
                            $subMenu = $this->db->query($querysubMenu)->result_array();
                            ?>

                            <?php foreach ($subMenu as $sm) : ?>
                                <li><a href="<?= base_url($sm['url']); ?>" data-title="<?= $sm['title']; ?>"><span><?= $sm['title']; ?></span></a></li>
                            <?php endforeach; ?>

                        <?php endforeach; ?>
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

                            <?php
                            $role_id = $user['role_id'];
                            //<<Disini mungkin karena versi php nya berbeda
                            $queryMenu = "SELECT `user_menu`.`id`,`menu`
                    FROM `user_menu` JOIN `user_access_menu`
                      ON `user_menu`. `id` = `user_access_menu`.`menu_id`
                   WHERE `user_access_menu`.`role_id`= $role_id 
                ORDER BY `user_access_menu`.`menu_id` ASC
                ";
                            $menu = $this->db->query($queryMenu)->result_array(); ?>

                            <div class="col-auto header-fixed-col d-none d-lg-block col-static">
                                <!-- Begin main menu -->
                                <nav class="main-mnu">
                                    <ul class="main-mnu-list">

                                        <!-- Looping Menu -->
                                        <?php foreach ($menu as $m) : ?>

                                            <!-- Sub Menu -->
                                            <?php
                                            $menuId = $m['id'];
                                            $querysubMenu = "SELECT *
                           FROM `user_sub_menu` JOIN `user_menu`
                             ON `user_sub_menu`.`menu_id` = `user_menu`.`id`
                          WHERE `user_sub_menu`.`menu_id` = $menuId
                            AND `user_sub_menu`.`is_active` = 1
                        ";
                                            $subMenu = $this->db->query($querysubMenu)->result_array();
                                            ?>

                                            <?php foreach ($subMenu as $sm) : ?>
                                                <li><a href="<?= base_url($sm['url']); ?>" data-title="<?= $sm['title']; ?>"><span><?= $sm['title']; ?></span></a></li>
                                            <?php endforeach; ?>

                                        <?php endforeach; ?>

                                    </ul>
                                </nav><!-- End main menu -->
                            </div>

                            <div class="col-auto header-fixed-col col-static">
                                <!-- Begin header actions -->
                                <ul class="header-actions">
                                    <!-- Begin header profile -->
                                    <nav class="main-mnu">
                                        <ul>
                                            <?php if ($user) :   ?>
                                                <!-- Nav Item - User Information -->
                                                <li class="nav-item dropdown no-arrow">
                                                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <span class="mr-2 d-none d-lg-inline text-gray-600"><?= $user['name']; ?></span>
                                                        <img class="img-profile rounded-circle" width="32px" src="<?= base_url('assets/img/profile/') . $user['image']; ?>">
                                                    </a>
                                                    <!-- Dropdown - User Information -->
                                                    <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                                        <a class="dropdown-item" href="<?= base_url('user/changepassword'); ?>">
                                                            <i class="fas fa-fw fa-key mr-2 text-gray-400"></i>
                                                            Change Password
                                                        </a>
                                                        <div class="dropdown-divider"></div>
                                                        <a class="dropdown-item" href="<?= base_url('auth/logout'); ?>" data-toggle="modal" data-target="#logoutModal">
                                                            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                                            Logout
                                                        </a>
                                                    </div>
                                                </li>
                                            <?php else :  ?>
                                                <li><a href="<?= base_url("auth"); ?>" class="btn btn-with-icon btn-small ripple">Log In</a></li>
                                            <?php endif ?>
                                        </ul>
                                    </nav><!-- End main menu -->
                                    <!-- End header profil -->
                                </ul><!-- End header actions -->
                            </div>
                        </div>
                    </div>
                </nav><!-- End header fixed -->
            </header><!-- End header -->