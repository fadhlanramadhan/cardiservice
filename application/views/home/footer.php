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
                <div class="col-xl-2 offset-xl-1 col-md-3 col-5 col-lg-2 item">
                    <div class="footer-item">
                        <p class="footer-item-heading">Menu</p>
                        <nav class="footer-nav">
                            <ul class="footer-mnu">
                                <li><a href="<?= base_url("user/service"); ?>" class="hover-link" data-title="Services"><span>Services</span></a></li>
                                <li><a href="<?= base_url("home/pricing"); ?>" class="hover-link" data-title="Pricing"><span>Pricing</span></a></li>
                                <li><a href="<?= base_url("home/aboutus"); ?>" class="hover-link" data-title="About Us"><span>About Us</span></a></li>
                                <li><a href="<?= base_url("home/contactus"); ?>" class="hover-link" data-title="Contact Us"><span>Contact Us</span></a></li>
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

</body>

</html>