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
    <div class="card shadow">
        <div class="card-header"><strong><?= $title ?></strong></div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <td>No</td>
                            <td>No Transaksi</td>
                            <td>Nama</td>
                            <td>Device</td>
                            <td>Service</td>
                            <td>Tanggal</td>
                            <td>Waktu</td>
                            <td>Aksi</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($all_order as $order) : ?>
                            <?php if ($order->nama_teknisi == $user['name']) : ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $order->no_transaksi ?></td>
                                    <td><?= $order->nama ?></td>
                                    <td><?= $order->device ?>
                                    <td><?= $order->service ?>
                                    <td><?= $order->tgl_terima ?>
                                    <td><?= $order->waktu ?>
                                    <td>
                                        <a href="<?= base_url('technician/detail_selesai/' . $order->no_transaksi) ?>" class="btn btn-success btn-sm"><i class="fa fa-eye"></i></a>
                                    </td>
                                </tr>
                            <?php endif ?>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</div>