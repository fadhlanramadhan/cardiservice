<!-- Begin bread crumbs -->
<nav class="bread-crumbs">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <ul class="bread-crumbs-list">
                    <li>
                        <a href="<?= base_url('user') ?>">Home</a>
                        <i class="material-icons md-18">chevron_right</i>
                    </li>
                    <li><a href="#!"><?= $title; ?></a></li>
                </ul>
            </div>
        </div>
    </div>
</nav><!-- End bread crumbs -->

<!-- Begin Page Content -->
<div class="section">
    <div class="container">
        <div class="row content-items">

            <!-- Page Heading -->
            <div class="col-12">
                <div class="section-heading">
                    <h1><?= $title; ?></h1>
                    <hr>
                    <?= $this->session->flashdata('message'); ?>
                </div>
            </div>

            <div class="col-xl-10 col-md-7 content-item">
                <form action="<?= base_url('user/changepassword'); ?>" method="post">
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="current_password">Current Password</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" id="current_password" name="current_password">
                            <?= form_error('current_password', '<small class="text-danger pl-3">', ' </small>'); ?>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="new_password1">New Password</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" id="new_password1" name="new_password1">
                            <?= form_error('new_password1', '<small class="text-danger pl-3">', ' </small>'); ?>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="new_password2">Repeat Password</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" id="new_password2" name="new_password2">
                            <?= form_error('new_password2', '<small class="text-danger pl-3">', ' </small>'); ?>
                        </div>
                    </div>
                    <div class="form-group row">
                        <button type="submit" class="btn btn-primary">Change</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>