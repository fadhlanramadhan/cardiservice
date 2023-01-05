<div class="container-fluid">
    <div class="clearfix">
        <div class="float-left">
            <h1 class="h3 m-0 text-gray-800"><?= $title ?></h1>
        </div>
        <div class="float-right">
            <a href="<?= base_url('admin/payment') ?>" class="btn btn-secondary btn-sm"><i class="fa fa-reply"></i>&nbsp;&nbsp;Kembali</a>
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
        <div class="card-header"><strong><?= $title ?> - <?= $all_payment->no_transaksi ?></strong></div>
        <div class="card-body">
            <form action="<?= base_url('admin/ubah_payment/' . $all_payment->no_transaksi) ?>" method="POST">
                <div class="row">
                    <div class="col-md-6">
                        <table class="table table-borderless">
                            <tr>
                                <td><strong>No Transaksi</strong></td>
                                <td>:</td>
                                <td><?= $all_payment->no_transaksi ?></td>
                            </tr>
                            <tr>
                                <td><strong>Tanggal Transaksi</strong></td>
                                <td>:</td>
                                <td><?= $all_payment->tgl_terima ?></td>
                            </tr>
                            <tr>
                                <td><strong>Waktu Transaksi</strong></td>
                                <td>:</td>
                                <td><?= $all_payment->waktu ?></td>
                            </tr>
                            <tr>
                                <td><strong>Metode Pembayaran</strong></td>
                                <td>:</td>
                                <td>
                                    <select name="metode" id="metode" class="form-control">
                                        <option value=""><?= $all_payment->metode ?></option>
                                        <option value="Cash">Cash</option>
                                        <option value="Transfer">Transfer</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td><strong>Status</strong></td>
                                <td>:</td>
                                <td>
                                    <select name="pembayaran" id="pembayaran" class="form-control">
                                        <option selected><?= $all_payment->pembayaran ?></option>
                                        <option value="Lunas">Lunas</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td><strong>Bukti Pembayaran</strong></td>
                                <td>:</td>
                                <td>
                                    <div class="col-sm-3">
                                        <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
                                            <img src="<?= base_url('assets/img/bukti/') . $all_payment->bukti ?>" class="img-thumbnail" width="300">
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <input type="text" name="status" id="status" value="Selesai" readonly hidden>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-check"></i>&nbsp;&nbsp;Selesai</button>
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
                                <td><strong>Harga</strong></td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($detail_payment as $payment) : ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $payment->nama ?></td>
                                    <td><?= $payment->telpon ?></td>
                                    <td><?= $payment->device ?></td>
                                    <td><?= $payment->service ?></td>
                                    <td><?= $payment->alamat ?></td>
                                    <td><?= $payment->deskripsi ?></td>
                                    <td><strong><?= $payment->harga ?></strong></td>
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
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Bukti Pembayaran</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body text-center">
                <img src="<?= base_url('assets/img/bukti/') . $all_payment->bukti ?>" alt="" class="img-responsive">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<script>
    $(function() {
        $('.pop').on('click', function() {
            $('.imagepreview').attr('src', $(this).find('img').attr('src'));
            $('#imagemodal').modal('show');
        });
    });
</script>