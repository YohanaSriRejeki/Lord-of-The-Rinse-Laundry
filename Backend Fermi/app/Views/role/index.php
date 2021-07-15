<?= $this->extend('/layouts/admin/master'); ?>

<?= $this->section('name'); ?>
<?= $nama; ?>
<?= $this->endsection(); ?>

<?= $this->section('content'); ?>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold">Manajemen Role</h6>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-6">
                <a href="/role/tambah" class="btn btn-primary mt-2">Tambah</a>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <table class="table table-bordered mt-2">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Jenis Role</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1;; ?>
                        <?php foreach ($role as $r) : ?>
                            <tr>
                                <th scope="row"><?= $i; ?></th>
                                <td><?= $r->level; ?></td>
                                <td>
                                    <a href="/role/edit/<?= $r->idRole; ?>" class="btn btn-primary">Edit</a>
                                    <form action="/role/hapus/<?php echo $r->idRole ?>" method="POST" class="d-inline">
                                        <?= csrf_field(); ?>
                                        <input type="hidden" name="_method" value="DELETE">
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            <?php $i++; ?>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?= $this->endsection(); ?>