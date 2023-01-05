<div class="container-fluid">
    <div class="clearfix">
        <div class="float-left">
            <h1 class="h3 m-0 text-gray-800"><?= $title ?></h1>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-6">
            <div class="card shadow">
                <div class="card-header"><strong>Isi Form Dibawah Ini!</strong></div>
                <div class="card-body">
                    <form action="<?= base_url('admin/ubah_customer/' . $customer->id) ?>" id="form-tambah" method="POST">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="name"><strong>Nama User</strong></label>
                                <input type="text" name="name" placeholder="Masukkan Nama User" autocomplete="off" class="form-control" required value="<?= $customer->name ?>">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="phone"><strong>Phone</strong></label>
                                <input type="text" name="phone" placeholder="Masukkan Email" autocomplete="off" class="form-control" required value="<?= $customer->phone ?>">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="email"><strong>Email</strong></label>
                                <input type="text" name="email" placeholder="Masukkan Email" autocomplete="off" class="form-control" required value="<?= $customer->email ?>">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="password"><strong>Password</strong></label>
                                <input type="text" name="password" placeholder="Masukkan Password" autocomplete="off" class="form-control" required value="<?= $customer->password ?>">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="role"><strong>Role</strong></label>

                                <select name="role" id="role" value="" class="form_control custom-select">
                                    <option value="<?= $customer->role_id ?>">
                                        <?php
                                        if ($customer->role_id == '1') {
                                            echo 'Admin';
                                        } else if ($customer->role_id == '2') {
                                            echo 'Customer';
                                        } else {
                                            echo 'Teknisi';
                                        }
                                        ?>
                                    </option>
                                    <option value="1">Admin</option>
                                    <option value="2">Customer</option>
                                    <option value="3">Teknisi</option>
                                </select>
                            </div>
                        </div>
                        <hr>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i>&nbsp;&nbsp;Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>