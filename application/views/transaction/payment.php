<div class="container-fluid">
    <div class="clearfix">
        <div class="float-left">
            <h1 class="h3 m-0 text-gray-800"><?= $title ?></h1>
        </div>
        <div class="float-right">
            <a href="<?= base_url('transaction/detail/' . $transaksi->no_transaksi) ?>" class="btn btn-secondary btn-sm"><i class="fa fa-reply"></i>&nbsp;&nbsp;Kembali</a>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col">
            <div class="card shadow">
                <div class="card-header"><strong>Isi Form Dibawah Ini!</strong></div>
                <div class="card-body">
                    <form action="<?= base_url('transaction/proses_payment/' . $transaksi->no_transaksi) ?>" id="form-tambah" method="POST">
                        <h5>Data Transaksi</h5>
                        <hr>
                        <input type="text" name="pembayaran" value="Belum Lunas" class="form-control" readonly hidden>
                        <input type="text" name="email" value="<?= $transaksi->email ?>" class="form-control" readonly hidden>
                        <div class="form-row">
                            <div class="form-group col-4">
                                <label>No. Transaksi</label>
                                <input type="text" name="no_transaksi" value="<?= $transaksi->no_transaksi ?>" readonly class="form-control">
                            </div>
                            <div class="form-group col-4">
                                <label>Tanggal Transaksi</label>
                                <input type="text" name="tgl_terima" value="<?= $transaksi->tgl_terima ?>" readonly class="form-control">
                            </div>
                            <div class="form-group col-4">
                                <label>Waktu Transaksi</label>
                                <input type="text" name="waktu" value="<?= $transaksi->waktu ?>" readonly class="form-control">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-row">
                                    <div class="form-group col-6">
                                        <label>Nama</label>
                                        <input type="text" name="nama" placeholder="Masukkan Nama" class="form-control" value="<?= $transaksi->nama ?>" readonly>
                                        <?= form_error('nama', '<small class="text-danger pl-1">', '</small>'); ?>
                                    </div>
                                    <div class="form-group col-6">
                                        <label>Telpon</label>
                                        <input type="text" name="telpon" placeholder="Masukkan Telpon" class="form-control" value="<?= $transaksi->telpon ?>" readonly>
                                        <?= form_error('telpon', '<small class="text-danger pl-1">', '</small>'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-row">
                                    <div class="form-group col-6">
                                        <label for="device">Device</label>
                                        <select name="device" id="device" class="form-control" readonly>
                                            <option value="<?= $transaksi->device ?>"><?= $transaksi->device ?></option>
                                        </select>
                                        <?= form_error('device', '<small class="text-danger pl-1">', '</small>'); ?>
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="service">Service</label>
                                        <select name="service" id="service" class="form-control" readonly>
                                            <option value="<?= $transaksi->service ?>"><?= $transaksi->service ?></option>
                                        </select>
                                        <?= form_error('service', '<small class="text-danger pl-1">', '</small>'); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-row">
                                    <div class="form-group col-6">
                                        <label>Deskripsi</label>
                                        <textarea name="deskripsi" placeholder="Masukkan Deskripsi" class="form-control" cols="30" rows="6" readonly><?= $transaksi->deskripsi ?></textarea>
                                    </div>
                                    <div class="form-group col-6">
                                        <label>Alamat</label>
                                        <input type="text" name="alamat" placeholder="Masukkan Alamat" class="form-control" value="<?= $transaksi->alamat ?>" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-row">
                                    <div class="form-group col-6">
                                        <label>Harga</label>
                                        <input type="number" name="harga" value="<?= set_value('harga', $transaksi->harga); ?>" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <input type="text" name="status" value="Menunggu Pembayaran" class="form-control" readonly hidden>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i>&nbsp;&nbsp;Proses</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>