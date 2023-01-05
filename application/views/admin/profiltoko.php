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
    <div class="row">
        <div class="col-md-6">
            <div class="card shadow">
                <div class="card-header"><strong>Isi Form Dibawah Ini!</strong></div>
                <div class="card-body">
                    <form action="<?= base_url('admin/proses_ubah') ?>" id="form-tambah" method="post">
                        <div class="form-group">
                            <label for="nama_toko"><strong>Nama Toko : </strong></label>
                            <input type="text" name="nama_toko" id="nama_toko" value="<?= $toko->nama_toko ?>" placeholder="Masukan Nama Toko" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="nama_toko"><strong>Nama Pemilik : </strong></label>
                            <input type="text" name="nama_pemilik" id="nama_pemilik" value="<?= $toko->nama_pemilik ?>" placeholder="Masukan Nama Pemilik" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="nama_toko"><strong>No Telepon : </strong></label>
                            <input type="number" name="no_telepon" id="no_telepon" value="<?= $toko->no_telepon ?>" placeholder="Masukan No Telepon" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="alamat"><strong>Alamat</strong></label>
                            <textarea name="alamattoko" id="alamattoko" class="form-control" placeholder="Masukan Alamat" style="resize: none;"><?= $toko->alamat ?></textarea>
                        </div>
                        <hr>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i>&nbsp;&nbsp;Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>