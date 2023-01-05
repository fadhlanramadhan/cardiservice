<!-- Begin intro -->
<div class="section-bgc intro">
    <div class="intro-slider">
        <div class="intro-item" style="background-image: url(<?= base_url() ?>assets/img/intro-img1.jpg);">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="intro-content">
                            <div class="section-heading shm-none">
                                <h1>Welcome Back, <?= $user['name']; ?></h1>
                                <p class="section-desc">Cardi is a shop that specializes in computer service and sales of various accessories and computer/laptop parts.</p>
                            </div>
                            <div class="wrap-btn intro-btns">
                                <a href="<?= base_url('user/service'); ?>" class="btn btn-with-icon btn-small ripple">
                                    <span>Get Started</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div><!-- End intro -->

<!-- Begin services -->
<section class="section services">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-heading heading-center">
                    <div class="section-subheading">What we serve</div>
                    <h2>Our Services</h2>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-12 item">
                <a class="iitem item-style">
                    <div class="iitem-icon">
                        <i class="material-icons material-icons-outlined md-48">perm_device_information</i>
                    </div>
                    <div class="iitem-icon-bg">
                        <i class="material-icons material-icons-outlined">perm_device_information</i>
                    </div>
                    <h3 class="iitem-heading item-heading-large">Free Diagnosis</h3>
                    <div class="iitem-desc">We offers free diagnostics for your device.</div>
                </a>
            </div>
            <div class="col-lg-4 col-md-6 col-12 item">
                <a class="iitem item-style">
                    <div class="iitem-icon">
                        <i class="material-icons material-icons-outlined md-48">assignment_ind</i>
                    </div>
                    <div class="iitem-icon-bg">
                        <i class="material-icons material-icons-outlined">assignment_ind</i>
                    </div>
                    <h3 class="iitem-heading item-heading-large">Trained Technicians</h3>
                    <div class="iitem-desc">Our technicians are highly trained professionals and can solve your technical problem.
                    </div>
                </a>
            </div>
            <div class="col-lg-4 col-md-12 col-12 item">
                <a class="iitem item-style">
                    <div class="iitem-icon">
                        <i class="material-icons material-icons-outlined md-48">beenhere</i>
                    </div>
                    <div class="iitem-icon-bg">
                        <i class="material-icons material-icons-outlined">beenhere</i>
                    </div>
                    <h3 class="iitem-heading item-heading-large">Trusted</h3>
                    <div class="iitem-desc">Leave it to us.</div>
                </a>
            </div>
        </div>
    </div>
</section><!-- End services -->