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
                                        <td><strong>Status</strong></td>
                                        <td>:</td>
                                        <td><span class="badge bg-secondary"><?= $detail_payment->pembayaran ?></span></td>
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
                                        <?php foreach ($payment_result as $result) : ?>
                                            <tr>
                                                <td><?= $result->device ?></td>
                                                <td><?= $result->service ?></td>
                                                <td><?= $result->deskripsi ?></td>
                                                <td><strong><?= $result->harga ?></strong></td>
                                            </tr>
                                        <?php endforeach ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <br>
                    <form action="<?= base_url('user/proses_metode/' . $detail_payment->no_transaksi) ?>" method="POST">
                        <label for="payment" class="col-sm-2 col-form-label">Payment Method</label>
                        <div class="col-sm-10">
                            <select name="metode" id="metode" class="form-control">
                                <option value="">Choose..</option>
                                <option value="Cash">Cash</option>
                                <option value="Transfer">Transfer</option>
                            </select>
                        </div>
                        <input type="text" name="status" id="status" value="Menunggu Verifikasi" readonly hidden>
                        <br>
                        <div class="form-group">
                            <a href="<?= base_url('user/detail_servis/' . $detail_payment->no_transaksi) ?>" class="btn btn-primary"><i class="fa fa-reply"></i>&nbsp;&nbsp;Back</a>
                            <button id="cash" type="submit" class="btn btn-primary"><i class="fas fa-money-bill-wave"></i>&nbsp;&nbsp;Pay</button>
                            <a href="<?= base_url('user/pay/' . $detail_payment->no_transaksi) ?>" class="btn btn-success" name="transfer" id="transfer"><i class="fas fa-check-circle"></i>&nbsp;&nbsp;Pay</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#transfer').hide();
        $('#metode').on('change', function() {
            var optionSelected = $("option:selected", this);
            var valueSelected = this.value;
            if (valueSelected == 'Transfer') {
                $("#transfer").show();
            } else {
                $("#transfer").hide();
            }
        });
    });

    $(document).ready(function() {
        $('#cash').hide();
        $('#metode').on('change', function() {
            var optionSelected = $("option:selected", this);
            var valueSelected = this.value;
            if (valueSelected == 'Cash') {
                $("#cash").show();
            } else {
                $("#cash").hide();
            }
        });
    });
</script>