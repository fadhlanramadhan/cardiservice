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

<div class="section">
    <div class="container">
        <div class="col">
            <div class="col-12">
                <div class="section-heading">
                    <h1><?= $title; ?></h1>
                    <hr>
                </div>
            </div>
            <div class="card shadow">
                <div class="card-header"><strong><?= $title ?> - <?= $detail_payment->no_transaksi ?></strong></div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="table-responsive">
                                <table class="table table-borderless">
                                    <tr>
                                        <td><strong>Transaction Number</strong></td>
                                        <td>:</td>
                                        <td><?= $detail_payment->no_transaksi ?></td>
                                    </tr>
                                    <tr>
                                        <td><strong>Date</strong></td>
                                        <td>:</td>
                                        <td><?= $detail_payment->tgl_terima ?></td>
                                    </tr>
                                    <tr>
                                        <td><strong>Time</strong></td>
                                        <td>:</td>
                                        <td><?= $detail_payment->waktu ?></td>
                                    </tr>
                                    <tr>
                                        <td><strong>Status</strong></td>
                                        <td>:</td>
                                        <td>
                                            <?php if ($detail_payment->pembayaran == 'Lunas') : ?> <span class="badge bg-success">Lunas</span>
                                            <?php else : ($detail_payment->pembayaran == 'Belum Lunas') ?> <span class="badge bg-danger">Belum Lunas</span>
                                            <?php endif ?>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <td><strong>No</strong></td>
                                            <td><strong>Name</strong></td>
                                            <td><strong>Phone Number</strong></td>
                                            <td><strong>Device</strong></td>
                                            <td><strong>Service</strong></td>
                                            <td><strong>Address</strong></td>
                                            <td><strong>Description</strong></td>
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
                    <br>
                    <div class="form-group">
                        <a href="<?= base_url('user/history') ?>" class="btn btn-primary"><i class="fa fa-reply"></i>&nbsp;&nbsp;Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>