<?= $this->extend('/layouts/admin/master'); ?>

<?= $this->section('name'); ?>
<?= $nama; ?>
<?= $this->endsection(); ?>

<?= $this->section('content'); ?>


<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="col-md-7">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold">Ubah Data Paket</h6>
            </div>
            <div class="card-body">
                <form action="/paket/update/<?= $paket["idPaket"]; ?>" method="POST">
                    <?= csrf_field(); ?>
                    <div class="form-group">
                        <label for="paket">Jenis Paket</label>
                        <input type="text" name="paket" class="form-control" id="paket" value="<?= $paket["paket"]; ?>" placeholder="Masukan Jenis Paket">
                    </div>
                    <div class="form-group">
                        <label for="harga">Harga</label>
                        <input type="text" name="harga" class="form-control" id="harga" value="<?= $paket["harga"]; ?>" placeholder="Masukan harga">
                    </div>
                    <button type="submit" class="btn btn-primary">Ubah</button>
                </form>
            </div>
        </div>
    </div>


</div>
<?= $this->endsection(); ?>