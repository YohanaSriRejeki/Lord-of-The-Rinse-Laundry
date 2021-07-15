<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- My CSS -->
    <link rel="stylesheet" href="<?= base_url() ?>/laundry/assets/css/style.css">

    <title>Lord Of The Rinse</title>

    <style>
        body {
            overflow-x: hidden;
        }
    </style>
</head>

<body>

    <section id="signUp">
        <div class="row">
            <div class="col-md-6">
                <div class="container">
                    <div class="row d-flex align-items-center vh-100">
                        <div class="col-md-6 mx-auto">
                            <h1 style="margin-bottom: 50px;">Masuk <br>ke Akunmu !</h1>
                            <form action="/login/cek" method="POST">
                                <?= csrf_field(); ?>
                                <div class="input-group mb-3">
                                    <input type="text" name="username" class="form-control" placeholder="Username">
                                </div>
                                <div class="input-group mb-3">
                                    <input type="password" name="password" class="form-control" placeholder="Password">
                                </div>
                                <?php
                                if (!empty(session()->getFlashdata('error'))) {
                                    echo '<div class="alert alert-danger" role="alert">
                                             ' . session()->getFlashdata('error') . '
                                          </div>';
                                }
                                ?>

                                <button type="submit" class="btn btn-primary w-100">Masuk!</button>
                                <!-- <a href="user/index.html" class="btn btn-primary w-100">Masuk!</a> -->
                            </form>
                            <!-- <div class="mt-3">
                                <a href="sign-up.html">Belum punya akun?</a>
                            </div> -->
                            <!-- <p class="text-danger mt-3">Email belum terdaftar !</p> -->
                            <!-- <p class="text-danger mt-3">Password yang Anda masukkan salah!</p> -->
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6" style="background-color: #FFE2CD;">
                <div class="container">
                    <div class="row align-items-center vh-100">
                        <div class="col-md-10 mx-auto">
                            <h1 class="fw-bold text-white">LORD</h1>
                            <img src="<?= base_url() ?>/laundry/assets/img/img-2.png" alt="" class="w-100">
                            <div style="margin-top: -80px;">
                                <h4 class="text-end fw-bold">of</h4>
                                <h2 class="text-end fw-bold">THE</h2>
                                <h1 class="text-end fw-bold">RINSE</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>

</html>