<?= $this->extend('/layouts/pegawai/master'); ?>

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
                <h6 class="m-0 font-weight-bold">Edit Data Laundry</h6>
            </div>
            <div class="card-body">
                <form action="/pelanggan/update/<?= $user["id"]; ?>" method="POST">
                    <?= csrf_field(); ?>
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" name="nama" class="form-control" id="nama" value="<?= $user["nama"]; ?>" placeholder="Masukan Nama">
                    </div>
                    <div class="form-group">
                        <label for="berat">Berat</label>
                        <input type="text" name="berat" class="form-control" id="berat" value="<?= $user["berat"]; ?>" placeholder="Masukan Berat">
                    </div>
                    <label class="my-1 mr-2" for="inlineFormCustomSelectPref">Paket</label>
                    <select class="custom-select my-1 mr-sm-2" name="paket" id="inlineFormCustomSelectPref">
                        <option selected>Pilih Paket</option>
                        <?php foreach ($paket as $p) : ?>
                            <option value="<?= $p['idPaket'] ?>" <?= $user["idPaket"] == $p['idPaket'] ? "selected" : ""; ?>><?= $p['paket'] ?></option>
                        <?php endforeach ?>
                    </select>
                    <div class="form-group">
                        <label for="tglMasuk">Tanggal Masuk</label>
                        <input type="date" name="tglMasuk" class="form-control" id="tglMasuk" value="<?= $user["tglMasuk"]; ?>" placeholder="Masukan Tanggal">
                    </div>
                    <div class="form-group">
                        <label for="tglKeluar">Tanggal Keluar</label>
                        <input type="date" name="tglKeluar" class="form-control" id="tglKeluar" value="<?= $user["tglKeluar"]; ?>" placeholder="Masukan Tanggal">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">status</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="status" id="status1" <?= $user["status"] == 1 ? "checked" : ""; ?> value="1">
                            <label class="form-check-label" for="status1">
                                Diambil
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="status" id="status2" <?= $user["status"] == 0 ? "checked" : ""; ?> value="0">
                            <label class="form-check-label" for="status2">
                                Belum diambil
                            </label>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>


</div>
<?= $this->endsection(); ?>