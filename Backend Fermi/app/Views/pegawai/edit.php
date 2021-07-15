<?= $this->extend('/layouts/admin/master'); ?>

<?= $this->section('name'); ?>
<?= $nama; ?>
<?= $this->endsection(); ?>

<?= $this->section('content'); ?>
<!-- form -->

<!-- form -->

<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="col-md-7">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold">Manage Account Detail</h6>
            </div>
            <div class="card-body">
                <form action="/pegawai/update/<?= $user["id"]; ?>" method="POST">
                    <?= csrf_field(); ?>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Username</label>
                        <input type="text" name="username" value="<?= $user["username"]; ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukan username">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" name="password" value="<?= $user["password"]; ?>" class="form-control" id="exampleInputPassword1" placeholder="Password">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nama</label>
                        <input type="text" name="nama" class="form-control" value="<?= $user["nama"]; ?>" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukan nama">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Alamat</label>
                        <input type="text" name="alamat" class="form-control" value="<?= $user["alamat"]; ?>" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukan address">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Level</label>
                        <select class="form-control" name="level" id="exampleFormControlSelect1">
                            <option selected>Pilih...</option>
                            <?php foreach ($role as $r) : ?>
                                <option value="<?= $r->idRole; ?>" <?= $user["level"] == $r->idRole ? "selected" : ""; ?>><?= $r->level; ?></option>
                            <?php endforeach; ?>

                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>


</div>
<?= $this->endsection(); ?>