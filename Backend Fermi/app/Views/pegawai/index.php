<?= $this->extend('/layouts/admin/master'); ?>

<?= $this->section('name'); ?>
<?= $nama; ?>
<?= $this->endsection(); ?>

<?= $this->section('content'); ?>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold">Manajemen Akun</h6>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-6">
                <a href="/pegawai/tambah" class="btn btn-primary mt-3">Tambah</a>
                <form action="" method="POST">
                    <div class="input-group mb-3 mt-3">
                        <input type="text" class="form-control" name="keyword" placeholder="Cari Nama...." aria-label="Recipient's username" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="submit" name="submit">Cari</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Username</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Alamat</th>
                            <th scope="col">Level</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1 + (6 * ($currentPage - 1)); ?>
                        <?php foreach ($pegawai as $user) : ?>
                            <tr>
                                <td><?= $i; ?></td>
                                <td><?= $user['username']; ?></td>
                                <td><?= $user['nama']; ?></td>
                                <td><?= $user['alamat']; ?></td>
                                <td><?= $user['level']; ?></td>
                                <td>
                                    <a href="/pegawai/edit/<?= $user['id']; ?>" class="btn btn-primary">Edit</a>
                                    <?php
                                    if ($user["level"] == "pegawai") {
                                        echo '<form action="/pegawai/hapus/' . $user['id'] . '" method="POST" class="d-inline">
                                        <?= csrf_field(); ?>
                                        <input type="hidden" name="_method" value="DELETE">
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>';
                                    } else {
                                        echo "";
                                    }

                                    ?>
                                </td>
                            </tr>
                            <?php $i++; ?>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <?= $pager->links('pegawai', 'pegawai_pagination') ?>
            </div>
        </div>
    </div>
</div>
<?= $this->endsection(); ?>