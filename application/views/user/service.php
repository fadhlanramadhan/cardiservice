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
        <div class="row content-items">
            <div class="col-12">
                <div class="section-heading">
                    <h1><?= $title; ?></h1>
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
                </div>
            </div>
            <div id="content" data-url="<?= base_url('user') ?>" class="col-xl-8 col-md-7 content-item">
                <form action="<?= base_url('user/proses_service') ?>" id="form-tambah" method="POST">
                    <div class="form-group row">
                        <label for="name" class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nama" name="nama" value="<?= $user['name']; ?>" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="phonenumber" class="col-sm-2 col-form-label">Phone Number</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="telpon" name="telpon" value="<?= $user['phone']; ?>" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="device" class="col-sm-2 col-form-label">Device</label>
                        <div class="col-sm-10">
                            <select name="device" id="device" class="form-control">
                                <option value="">-- Pilih Device --</option>
                                <option value="Computer">Computer</option>
                                <option value="Laptop">Laptop</option>
                            </select>
                            <?= form_error('device', '<small class="text-danger pl-1">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="service" class="col-sm-2 col-form-label">Service</label>
                        <div class="col-sm-10">
                            <select name="service" id="service" class="form-control">
                                <option value="">-- Pilih Service --</option>
                                <?php foreach ($all_service as $service) : ?>
                                    <option value="<?= $service->nama_service ?>"><?= $service->nama_service ?></option>
                                <?php endforeach ?>
                            </select>
                            <?= form_error('service', '<small class="text-danger pl-1">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="form-group row" id="alamat">
                        <label for="alamat" class="col-sm-2 col-form-label">Address</label>
                        <div class="col-sm-10">
                            <input type="text" name="alamat" id="alamat" value="" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="issues" class="col-sm-2 col-form-label">Another Issues</label>
                        <div class="col-sm-10">
                            <textarea name="deskripsi" class="form-control" id="deskripsi" cols="30" rows="6" placeholder="Describe more about your issues"></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <input type="text" name="no_transaksi" value="TR<?= time() ?>" readonly class="form-control" hidden>
                        <input type="text" name="tgl_terima" value="<?= date('d/m/Y') ?>" readonly class="form-control" hidden>
                        <input type="text" name="waktu" value="<?= date('H:i:s') ?>" readonly class="form-control" hidden>
                        <input type="text" name="email" value="<?= $user['email']; ?>" readonly class="form-control" hidden>
                        <input type="text" name="status" value="Pengajuan" class="form-control" readonly hidden>
                        <input type="text" name="harga" value="" class="form-control" readonly hidden>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-with-icon btn-small ripple">Order</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-xl-4 col-md-5 content-item">
                <div class="col content-item">
                    <div class="contact-info section-bgc">
                        <h3>Price List</h3>
                        <table class="table-list">
                            <thead>
                                <tr>
                                    <th>Services</th>
                                    <th>Price</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Windows Install</td>
                                    <td>Rp.60k</td>
                                </tr>
                                <tr>
                                    <td>Opt Cleaning</td>
                                    <td>Rp.50k</td>
                                </tr>
                                <tr>
                                    <td>Driver Install</td>
                                    <td>Rp.30k</td>
                                </tr>
                                <tr>
                                    <td>Storage Check</td>
                                    <td>Rp.30k</td>
                                </tr>
                                <tr>
                                    <td>File Backup</td>
                                    <td>Rp.30k</td>
                                </tr>
                                <tr>
                                    <td>File Recovery</td>
                                    <td>Rp.50k</td>
                                </tr>
                                <tr>
                                    <td>Repair</td>
                                    <td>Rp.100k</td>
                                </tr>
                                <tr>
                                    <td>Onsite Serve</td>
                                    <td>Rp.20k</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        $('#alamat').hide();
        $('#service').on('change', function() {
            var optionSelected = $("option:selected", this);
            var valueSelected = this.value;
            if (valueSelected == 'Onsite Service') {
                $("#alamat").show();
            } else {
                $("#alamat").hide();
            }
        });
    });

    $('#service').on('change', function() {

        if ($(this).val() == '') reset()
        else {
            const url_get_all_service = $('#content').data('url') + '/get_all_service'
            $.ajax({
                url: url_get_all_service,
                type: 'POST',
                dataType: 'json',
                data: {
                    nama_service: $(this).val()
                },
                success: function(data) {
                    $('input[name="harga"]').val(data.harga)
                }
            })
        }
    })
</script>