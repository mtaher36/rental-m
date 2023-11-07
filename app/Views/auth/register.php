<?= $this->extend('layout/templateLogin') ?>
<?= $this->section('content') ?>

<section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">
                <div class="d-flex justify-content-center py-4">
                    <div class="profile-image">
                        <img src="<?= base_url(); ?>/img/pp.jpeg" alt="Profile Image">
                    </div>
                </div>
                <div class="card mb-3">
                    <div class="card-body">
                        <?php if (session()->getFlashdata('_ci_validation_errors')) : ?>
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>Terjadi kesalahan Penginputan Data Saat Validasi</strong>
                                <br>
                                <ul>
                                    <?php foreach (session()->getFlashdata('_ci_validation_errors') as $k) : ?>
                                        <li><?= $k ?></li>
                                    <?php endforeach ?>
                                </ul>
                                <button type="button" class="btn btn-close" data-bs-dismiss="alert" aria-label="close"></button>
                            </div>
                        <?php endif ?>

                        <div class="pt-4 pb-2">
                            <h5 class="card-title text-center pb-0 fs-4">Register to Your Account</h5>
                            <p class="text-center small">Isi Data Diri Anda</p>
                        </div>

                        <form action="/mimin/register/auth" method="post" class="row g-3 needs-validation">
                            <?= csrf_field() ?>
                            <div class="col-6">
                                <label for="username" class="form-label">Username</label>
                                <input type="text" name="username" class="form-control" id="username">
                            </div>

                            <div class="col-6">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" name="email" class="form-control" id="email">
                            </div>

                            <div class="col-12">
                                <label for="pin" class="form-label">PIN</label>
                                <input type="text" name="pin" class="form-control" id="pin">
                            </div>

                            <div class="col-6">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" name="password" class="form-control" id="password">
                            </div>

                            <div class="col-6">
                                <label for="confirm_password" class="form-label">Confirm Password</label>
                                <input type="password" name="confirm_password" class="form-control" id="confirm_password">
                            </div>

                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">Register</button>
                            </div>
                            <div class="col-12">
                                <p class="small mb-0">Have an Account? <a href="<?= route_to('mimin/login') ?>">Log in</a></p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?= $this->endSection() ?>