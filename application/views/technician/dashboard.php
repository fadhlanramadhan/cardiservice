<div class="container-fluid">
    <div class="clearfix">
        <div class="float-left">
            <h1 class="h3 m-0 text-gray-800"><?= $title ?></h1>
        </div>
    </div>
    <hr>
    <?php if ($this->session->flashdata('success')) : ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?= $this->session->flashdata('success') ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php elseif ($this->session->flashdata('error')) : ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <?= $this->session->flashdata('error') ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php endif ?>
    <div class="row mb-3">
        <!-- Earnings (Monthly) Card Example -->
        <div class="col-md-6">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Pesanan Masuk</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?= $pesanan_masuk ?>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-box fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Earnings (Monthly) Card Example -->
        <div class="col-md-6">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Pesanan Selesai</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $pesanan_selesai ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="card shadow">
                <div class="card-header"><strong>Profil Toko</strong></div>
                <div class="card-body">
                    <strong>Nama Toko : </strong><br>
                    <input type="text" value="<?= $toko->nama_toko ?>" readonly class="form-control mt-2 mb-2">
                    <strong>Nama Pemilik : </strong><br>
                    <input type="text" value="<?= $toko->nama_pemilik ?>" readonly class="form-control mt-2 mb-2">
                    <strong>No Telepon : </strong><br>
                    <input type="text" value="<?= $toko->no_telepon ?>" readonly class="form-control mt-2 mb-2">
                    <strong>Alamat : </strong><br>
                    <input type="text" value="<?= $toko->alamat ?>" readonly class="form-control mt-2">
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card shadow">
                <div class="card-header"><strong>User Sedang Login</strong></div>
                <div class="card-body">
                    <strong>Nama : </strong><br>
                    <input type="text" value="<?= $user['name'] ?>" readonly class="form-control mt-2 mb-2">
                    <strong>Username : </strong><br>
                    <input type="text" value="<?= $user['email'] ?>" readonly class="form-control mt-2 mb-2">
                    <strong>Role : </strong><br>
                    <input type="text" value="<?= $role->role ?>" readonly class="form-control mt-2 mb-2">
                </div>
            </div>
        </div>
    </div>
</div>
</div>