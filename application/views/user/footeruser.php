<!-- Begin footer -->
<footer class="footer">
    <div class="footer-main">
        <div class="container">
            <div class="row items">
                <div class="col-xl-3 col-lg-3 col-md-5 col-12 item">
                    <!-- Begin company info -->
                    <div class="footer-company-info">
                        <div class="footer-company-top">
                            <a href="/" class="logo" title="PathSoft">
                                <img data-src="<?= base_url(); ?>assets/img/cardiicon.jpeg" width="115" height="72" class="lazy" src="data:image/gif;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII=" alt="PathSoft">
                            </a>
                            <div class="footer-company-desc">
                                <p>Cardi is a shop that specializes in computer service and sales of various accessories and computer/laptop parts.</p>
                            </div>
                        </div>
                    </div>
                    <!-- End company info -->
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

                <div class="col-xl-2 offset-xl-1 col-md-3 col-5 col-lg-2 item">
                    <div class="footer-item">
                        <p class="footer-item-heading">Menu</p>
                        <nav class="footer-nav">
                            <ul class="footer-mnu">

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
                                        <li><a class="hover-link" href="<?= base_url($sm['url']); ?>" data-title="<?= $sm['title']; ?>"><span><?= $sm['title']; ?></span></a></li>
                                    <?php endforeach; ?>

                                <?php endforeach; ?>
                            </ul>
                        </nav>
                    </div>
                </div>
                <div class="col-xs-4 col-lg-4 col-12 item">
                    <div class="footer-item">
                        <p class="footer-item-heading">Our contacts</p>
                        <ul class="footer-contacts">
                            <li>
                                <i class="material-icons md-22">location_on</i>
                                <div class="footer-contact-info">
                                    Jl. Kelengkeng No.49, Oro-Oro Ombo, Kec. Batu, Kota Batu, Jawa Timur 65316
                                </div>
                            </li>
                            <li>
                                <i class="material-icons md-22 footer-contact-tel">smartphone</i>
                                <div class="footer-contact-info">
                                    <a href="#!" class="formingHrefTel">+62 851-5544-8406</a>
                                </div>
                            </li>
                            <li>
                                <i class="material-icons md-22 footer-contact-email">email</i>
                                <div class="footer-contact-info">
                                    <a href="mailto:mail@example.com">cardi.something@gmail.com</a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="container">
            <div class="row justify-content-between items">
                <div class="col-md-auto col-12 item">
                    <div class="copyright">© 2022 Cardi. All rights reserved.</div>
                </div>
            </div>
        </div>
    </div>
</footer><!-- End footer -->

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="<?= base_url('auth/logout'); ?>">Logout</a>
            </div>
        </div>
    </div>
</div>


</main><!-- End main -->
<script src="<?= base_url(); ?>assets/vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url(); ?>assets/libs/jquery/jquery.min.js"></script>
<script src="<?= base_url(); ?>assets/libs/lozad/lozad.min.js"></script>
<script src="<?= base_url(); ?>assets/libs/device/device.js"></script>
<script src="<?= base_url(); ?>assets/libs/ScrollToFixed/jquery-scrolltofixed-min.js"></script>
<script src="<?= base_url(); ?>assets/libs/spincrement/jquery.spincrement.min.js"></script>
<script src="<?= base_url(); ?>assets/libs/jquery-validation-1.19.3/jquery.validate.min.js"></script>
<script src="<?= base_url(); ?>assets/js/custom.js"></script>
<script src="<?= base_url(); ?>assets/js/sb-admin-2.min.js"></script>
<script src="<?= base_url(); ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?= base_url(); ?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>

<script src="<?= base_url('assets/'); ?>vendor/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url('assets/'); ?>vendor/datatables/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url('assets/'); ?>js/demo/datatables-demo.js"></script>

<script type="text/javascript">
    $('.custom-file-input').on('change', function() {
        let fileName = $(this).val().split('\\').pop();
        $(this).next('.custom-file-label').addClass("selected").html(fileName);
    });

    window.setTimeout(function() {
        $(".alert").fadeTo(1000, 0).slideUp(500, function() {
            $(this).remove();
        });
    }, 1500);
</script>

</body>

</html>