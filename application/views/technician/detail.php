<div class="container-fluid">
    <div class="clearfix">
        <div class="float-left">
            <h1 class="h3 m-0 text-gray-800"><?= $title ?></h1>
        </div>
        <div class="float-right">
            <a href="<?= base_url('technician/order') ?>" class="btn btn-secondary btn-sm"><i class="fa fa-reply"></i>&nbsp;&nbsp;Kembali</a>
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
        <div class="table-responsive">
            <div class="card-header"><strong><?= $title ?> - <?= $transaksi->no_transaksi ?></strong></div>
            <div class="card-body">
                <form action="<?= base_url('technician/proses_ubah/' . $transaksi->no_transaksi) ?>" method="POST">
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
                                    <td><strong>Status Teknisi</strong></td>
                                    <td>:</td>
                                    <td><?= $transaksi->teknisi ?></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <input type="text" name="teknisi" id="teknisi" value="Selesai" hidden readonly>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary" name="selesai" id="selesai"><i class="fa fa-check"></i>&nbsp;&nbsp;Selesai</button>
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
</div>