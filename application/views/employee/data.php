<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>


    <div class="row">
        <div class="col-lg-10">

            <?php if (validation_errors()) : ?>

                <div class="alert alert-danger" role="alert">
                    <?= validation_errors(); ?>
                </div>

            <?php endif; ?>

            <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>') ?>

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

            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Password</th>
                        <th scope="col">Role</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($employee as $emp) : ?>
                        <tr>
                            <th scope="row"><?= $i; ?></th>
                            <td><?= $emp['name']; ?></td>
                            <td><?= $emp['email']; ?></td>
                            <td><?= $emp['password']; ?></td>
                            <td><?= $emp['role_id']; ?></td>
                            <td>
                                <a href="<?= base_url(); ?>employee/ubah/<?= $emp['id'] ?>" class="badge badge-success">Edit</a>
                                <a href="<?= base_url(); ?>employee/delete/<?= $emp['id'] ?>" class="badge badge-danger" onclick="return confirm('Are you sure?');">Delete</a>
                            </td>
                        </tr>
                        <?php $i++ ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->