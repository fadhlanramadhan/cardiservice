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
    <div class="card shadow">
        <div class="card-header"><strong><?= $title ?> - <?= $transaksi->no_transaksi ?></strong></div>
        <div class="card-body">
            <form action="<?= base_url('transaction/proses_ubah/' . $transaksi->no_transaksi) ?>" method="POST">
                <div class="row">
                    <div class="col-md-6">
                        <table class="table table-borderless">
                            <tr>
                                <td><strong>No Transaksi</strong></td>
                                <td>:</td>
                                <td><?= $transaksi->no_transaksi ?></td>
                            </tr>
                            <tr>
                                <td><strong>Tanggal Transaksi</strong></td>
                                <td>:</td>
                                <td><?= $transaksi->tgl_terima ?></td>
                            </tr>
                            <tr>
                                <td><strong>Waktu Transaksi</strong></td>
                                <td>:</td>
                                <td><?= $transaksi->waktu ?></td>
                            </tr>
                            <tr>
                                <td><strong>Nama Teknisi</strong></td>
                                <td>:</td>
                                <td>
                                    <select name="nama_teknisi" id="nama_teknisi" class="form-control">
                                        <option value="">-- Pilih Teknisi --</option>
                                        <?php foreach ($all_teknisi as $teknisi) : ?>
                                            <?php if ($teknisi->name == $transaksi->nama_teknisi) : ?>
                                                <option value="<?= $teknisi->name ?>" selected><?= $teknisi->name ?></option>
                                            <?php else :  ?>
                                                <option value="<?= $teknisi->name ?>"><?= $teknisi->name ?></option>
                                            <?php endif; ?>
                                        <?php endforeach ?>
                                    </select>
                                    <?= form_error('nama_teknisi', '<small class="text-danger pl-1">', '</small>'); ?>
                                </td>
                            </tr>
                            <tr>
                                <td><strong>Status</strong></td>
                                <td>:</td>
                                <td>
                                    <select name="status" id="status" class="form-control">
                                        <option value=""><?= $transaksi->status ?></option>
                                        <?php foreach ($status as $status) : ?>
                                            <option value="<?= $status->nama_status ?>"><?= $status->nama_status ?></option>
                                        <?php endforeach ?>
                                    </select>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
                <input type="text" name="teknisi" value="Proses" class="form-control" readonly hidden>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary" name="proses" id="proses"><i class="fa fa-check"></i>&nbsp;&nbsp;Submit</button>
                    <a href="<?= base_url('transaction/dibatalkan/' . $transaksi->no_transaksi) ?>" class="btn btn-danger" name="dibatalkan" id="dibatalkan"><i class="fas fa-times"></i>&nbsp;&nbsp;Batal Transaksi</a>
                    <?php
                    if ($transaksi->teknisi == 'Selesai') :
                    ?>
                        <a href="<?= base_url('transaction/payment/' . $transaksi->no_transaksi) ?>" class="btn btn-success"><i class="fa fa-forward"></i>&nbsp;&nbsp;Proses Pembayaran</a>
                    <?php endif ?>
                </div>
            </form>
            <hr>
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <td><strong>No</strong></td>
                                <td><strong>Nama</strong></td>
                                <td><strong>Telpon</strong></td>
                                <td><strong>Device</strong></td>
                                <td><strong>Service</strong></td>
                                <td><strong>Alamat</strong></td>
                                <td><strong>Deskripsi</strong></td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($all_detail_transaksi as $detail_transaksi) : ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $detail_transaksi->nama ?></td>
                                    <td><?= $detail_transaksi->telpon ?></td>
                                    <td><?= $detail_transaksi->device ?></td>
                                    <td><?= $detail_transaksi->service ?></td>
                                    <td><?= $detail_transaksi->alamat ?></td>
                                    <td><?= $detail_transaksi->deskripsi ?></td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#dibatalkan').hide();
        $('#status').on('change', function() {
            var optionSelected = $("option:selected", this);
            var valueSelected = this.value;
            if (valueSelected == 'Dibatalkan') {
                $("#dibatalkan").show();
            } else {
                $("#dibatalkan").hide();
            }
        });
    });
    $(document).ready(function() {
        $('#proses').hide();
        $('#status').on('change', function() {
            var optionSelected = $("option:selected", this);
            var valueSelected = this.value;
            if (valueSelected == 'Proses') {
                $("#proses").show();
            } else {
                $("#proses").hide();
            }
        });
    });
</script>