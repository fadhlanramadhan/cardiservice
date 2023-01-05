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


        <!-- Page Heading -->
        <h1><?= $title; ?></h1>
        <hr>
        <?= $this->session->flashdata('message'); ?>

        <div class="row">
            <div class="col-lg-8">

                <?= form_open_multipart('user/editprofile'); ?>
                <div class="form-group row">
                    <label for="email" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="email" name="email" value="<?= $user['email']; ?>" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="name" class="col-sm-2 col-form-label">Full Name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="name" name="name" onkeyup="isEmpty()" value="<?= $user['name']; ?>">
                        <?= form_error('name', '<small class="text-danger pl-3">', ' </small>'); ?>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-2">Picture</div>
                    <div class="col-sm-10">
                        <div class="row">
                            <div class="col-sm-3">
                                <img src="<?= base_url('assets/img/profile/') . $user['image']; ?>" class="img-thumbnail">
                            </div>
                            <div class="col-sm-9">
                                <input type="file" class="custom-file-input" id="image" name="image">
                                <label class="custom-file-label" for="image">Choose file</label>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="form-group row justify-content-end">
                    <div class="col-sm-10">
                        <button type="submit" id="btn" class="btn btn-primary" disabled>Edit</button>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    function isEmpty() {
        let name = document.getElementById("name").value;

        if (name != "") {
            document.getElementById("btn").removeAttribute("disabled");
        }
    }
</script>