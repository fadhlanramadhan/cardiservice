<div class="container-fluid">
    <div class="clearfix">
        <div class="float-left">
            <h1 class="h3 m-0 text-gray-800"><?= $title ?></h1>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-6">
            <div class="card shadow">
                <div class="card-header"><strong>Isi Form Dibawah Ini!</strong></div>
                <div class="card-body">
                    <form action="<?= base_url('submenu/proses_ubah/' . $submenu->id) ?>" id="form-tambah" method="POST">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="submenu"><strong>Sub Menu</strong></label>
                                <input type="text" name="submenu" placeholder="Masukkan nama Sub Menu" autocomplete="off" class="form-control" value="<?= $submenu->title ?>">
                                <?= form_error('submenu', '<small class="text-danger pl-1">', '</small>'); ?>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="menu"><strong>Menu</strong></label>
                                <select name="menu" id="menu" class="form_control custom-select">
                                    <option value="">Pilih Menu...</option>
                                    <?php foreach ($menu as $m) :  ?>
                                        <option value="<?= $m['id']; ?>"><?= $m['menu']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <?= form_error('menu', '<small class="text-danger pl-1">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="url"><strong>Url</strong></label>
                                <input type="text" name="url" placeholder="Masukkan Url Sub Menu" autocomplete="off" class="form-control" value="<?= $submenu->url ?>">
                                <?= form_error('url', '<small class="text-danger pl-1">', '</small>'); ?>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="ikon"><strong>Icon</strong></label>
                                <input type="text" name="ikon" placeholder="Masukkan Icon" autocomplete="off" class="form-control" value="<?= $submenu->icon ?>">
                                <?= form_error('ikon', '<small class="text-danger pl-1">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="aktif" name="aktif" value="1" checked>
                                    <label class="custom-control-label" for="aktif">Aktif?</label>
                                </div>
                            </div>
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