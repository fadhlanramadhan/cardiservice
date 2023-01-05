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
                                            <td><strong>Device</strong></td>
                                            <td><strong>Service</strong></td>
                                            <td><strong>Description</strong></td>
                                            <td><strong>Price</strong></td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($payment_result as $payment) : ?>
                                            <tr>
                                                <td><?= $payment->device ?></td>
                                                <td><?= $payment->service ?></td>
                                                <td><?= $payment->deskripsi ?></td>
                                                <td><strong><?= $payment->harga ?></strong></td>
                                            </tr>
                                        <?php endforeach ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <?= form_open_multipart('user/upload_bukti'); ?>
                    <div class="form-group row">
                        <input type="text" name="no_transaksi" value="<?= $detail_payment->no_transaksi ?>" hidden>
                        <div class="col-sm-2"><strong>Bukti :</strong></div>
                        <div class="col-sm-10">
                            <div class="row">
                                <div class="col-sm-3">
                                    <img id="upload" src="<?= $payment->bukti ?>" class="img-thumbnail">
                                </div>
                                <div class="col-sm-9">
                                    <input type="file" class="custom-file-input" id="bukti" name="bukti" onchange="readURL(this);">
                                    <label class="custom-file-label" for="bukti">Choose file</label>
                                </div>
                                <input type="text" name="metode" id="metode" value="Transfer" readonly hidden>
                                <input type="text" name="status" id="status" value="Menunggu Verifikasi" readonly hidden>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="form-group">
                        <a href="<?= base_url('user/payment/' . $detail_payment->no_transaksi) ?>" class="btn btn-primary"><i class="fa fa-reply"></i>&nbsp;&nbsp;Back</a>
                        <button type="submit" class="btn btn-primary"><i class="fa fa-forward"></i>&nbsp;&nbsp;Pay</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function readURL(input) { // Mulai membaca inputan gambar
        if (input.files && input.files[0]) {
            var reader = new FileReader(); // Membuat variabel reader untuk API FileReader

            reader.onload = function(e) { // Mulai pembacaan file
                $('#upload') // Tampilkan gambar yang dibaca ke area id #preview_gambar
                    .attr('src', e.target.result)
                    .width(150); // Menentukan lebar gambar preview (dalam pixel)
                //.height(200); // Jika ingin menentukan lebar gambar silahkan aktifkan perintah pada baris ini
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
</script>