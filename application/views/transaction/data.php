<div class="container-fluid">
    <div class="clearfix">
        <div class="float-left">
            <h1 class="h3 m-0 text-gray-800"><?= $title ?></h1>
        </div>
        <div class="float-right">
            <a href="<?= base_url('transaction/tambah') ?>" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i>&nbsp;&nbsp;Tambah</a>
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
                            <td>Status</td>
                            <td>Aksi</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($all_transaksi as $transaksi) : ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $transaksi->no_transaksi ?></td>
                                <td><?= $transaksi->nama ?></td>
                                <td><?= $transaksi->device ?></td>
                                <td><?= $transaksi->service ?></td>
                                <td><?= $transaksi->tgl_terima ?></td>
                                <td><?= $transaksi->waktu ?></td>
                                <td>
                                    <?php if ($transaksi->status == 'Pengajuan') : ?> <span class="badge bg-secondary">Pengajuan</span>
                                    <?php elseif ($transaksi->status == 'Proses') : ?> <span class="badge bg-warning">Proses</span>
                                    <?php elseif ($transaksi->status == 'Menunggu Pembayaran') : ?> <span class="badge bg-warning">Menunggu Pembayaran</span>
                                    <?php elseif ($transaksi->status == 'Menunggu Verifikasi') : ?> <span class="badge bg-warning">Menunggu Verifikasi</span>
                                    <?php elseif ($transaksi->status == 'Selesai') : ?> <span class="badge bg-success">Selesai</span>
                                    <?php elseif ($transaksi->status == 'Closed') : ?> <span class="badge bg-success">Closed</span>
                                    <?php else : ?> <span class="badge bg-danger">Dibatalkan</span>
                                    <?php endif ?>
                                </td>
                                <td>
                                    <a href="<?= base_url('transaction/detail/' . $transaksi->no_transaksi) ?>" class="btn btn-success btn-sm"><i class="fa fa-eye"></i></a>
                                    <a onclick="return confirm('apakah anda yakin?')" href="<?= base_url('transaction/hapus/' . $transaksi->no_transaksi) ?>" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</div>