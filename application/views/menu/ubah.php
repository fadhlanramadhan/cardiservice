<div class="container-fluid">
    <div class="clearfix">
        <div class="float-left">
            <h1 class="h3 m-0 text-gray-800"><?= $title ?></h1>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-3">
            <div class="card shadow">
                <div class="card-header"><strong>Isi Form Dibawah Ini!</strong></div>
                <div class="card-body">
                    <form action="<?= base_url('menu/proses_ubah/' . $menu->id) ?>" id="form-tambah" method="POST">
                        <div class="form-row">
                            <div class="form-group col-md">
                                <div class="form-row">
                                    <div class="form-group col-md">
                                        <label for="menu"><strong>Menu</strong></label>
                                        <input type="text" name="menu" placeholder="Masukkan Menu" autocomplete="off" class="form-control" value="<?= $menu->menu ?>">
                                        <?= form_error('menu', '<small class="text-danger pl-1">', '</small>'); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i>&nbsp;&nbsp;Simpan</button>
                            <button type="reset" class="btn btn-danger"><i class="fa fa-times"></i>&nbsp;&nbsp;Batal</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>