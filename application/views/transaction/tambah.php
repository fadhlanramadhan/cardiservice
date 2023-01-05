<div class="container-fluid">
    <div class="clearfix">
        <div class="float-left">
            <h1 class="h3 m-0 text-gray-800"><?= $title ?></h1>
        </div>
        <div class="float-right">
            <a href="<?= base_url('admin/index') ?>" class="btn btn-secondary btn-sm"><i class="fa fa-reply"></i>&nbsp;&nbsp;Kembali</a>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col">
            <div class="card shadow">
                <div class="card-header"><strong>Isi Form Dibawah Ini!</strong></div>
                <div class="card-body">
                    <form action="<?= base_url('transaction/proses_tambah') ?>" id="form-tambah" method="POST">
                        <h5>Data Transaksi</h5>
                        <hr>
                        <input type="text" name="status" value="Pengajuan" class="form-control" readonly hidden>
                        <div class="form-row">
                            <div class="form-group col-4">
                                <label>No. Transaksi</label>
                                <input type="text" name="no_transaksi" value="TR<?= time() ?>" readonly class="form-control">
                            </div>
                            <div class="form-group col-4">
                                <label>Tanggal Transaksi</label>
                                <input type="text" name="tgl_terima" value="<?= date('d/m/Y') ?>" readonly class="form-control">
                            </div>
                            <div class="form-group col-4">
                                <label>Waktu Transaksi</label>
                                <input type="text" name="waktu" value="<?= date('H:i:s') ?>" readonly class="form-control">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-row">
                                    <div class="form-group col-6">
                                        <label>Nama</label>
                                        <input type="text" name="nama" placeholder="Masukkan Nama" class="form-control" value="<?= set_value('nama'); ?>">
                                        <?= form_error('nama', '<small class="text-danger pl-1">', '</small>'); ?>
                                    </div>
                                    <div class="form-group col-6">
                                        <label>Telpon</label>
                                        <input type="text" name="telpon" placeholder="Masukkan Telpon" class="form-control" value="<?= set_value('telpon'); ?>">
                                        <?= form_error('telpon', '<small class="text-danger pl-1">', '</small>'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-row">
                                    <div class="form-group col-6">
                                        <label for="device">Device</label>
                                        <select name="device" id="device" class="form-control">
                                            <option value="">-- Pilih Device --</option>
                                            <option value="Computer">Computer</option>
                                            <option value="Laptop">Laptop</option>
                                        </select>
                                        <?= form_error('device', '<small class="text-danger pl-1">', '</small>'); ?>
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="service">Service</label>
                                        <select name="service" id="service" class="form-control">
                                            <option value="">-- Pilih Service --</option>
                                            <?php foreach ($all_service as $service) : ?>
                                                <option value="<?= $service->nama_service ?>"><?= $service->nama_service ?></option>
                                            <?php endforeach ?>
                                        </select>
                                        <?= form_error('service', '<small class="text-danger pl-1">', '</small>'); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-row">
                                    <div class="form-group col-12">
                                        <label>Deskripsi</label>
                                        <textarea name="deskripsi" placeholder="Masukkan Deskripsi" class="form-control" cols="30" rows="6"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3" id="alamat">
                                <div class="form-row">
                                    <div class="form-group col-12">
                                        <label>Alamat</label>
                                        <input type="text" name="alamat" placeholder="Masukkan Alamat" class="form-control" value="<?= set_value('alamat'); ?>">
                                    </div>
                                </div>
                            </div>
                        </div>
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