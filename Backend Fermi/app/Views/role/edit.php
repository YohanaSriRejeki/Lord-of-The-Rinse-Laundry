<?= $this->extend('/layouts/admin/master'); ?>

<?= $this->section('name'); ?>
<?= $nama; ?>
<?= $this->endsection(); ?>

<?= $this->section('content'); ?>
<h1>Edit Data Role</h1>

<!-- form -->

<!-- form -->

<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="col-md-7">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold">Ubah Data Role</h6>
            </div>
            <div class="card-body">
                <form action="/role/update/<?= $user["idRole"]; ?>" method="POST">
                    <?= csrf_field(); ?>
                    <div class="form-group">
                        <label for="nama">Role</label>
                        <input type="text" name="level" value="<?= $user["level"]; ?>" class="form-control" id="nama" placeholder="Masukan Role">
                    </div>
                    <button type="submit" class="btn btn-primary">Ubah</button>
                </form>
            </div>
        </div>
    </div>


</div>
<?= $this->endsection(); ?>