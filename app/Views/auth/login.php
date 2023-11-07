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
                </div><!-- End Logo -->
                <div class="card mb-3">
                    <div class="card-body">


                        <?php if (session()->getFlashdata('errors')) : ?>
                            <div class="alert alert-danger mt-2 "><?= session()->getFlashdata('errors') ?></div>
                        <?php endif; ?>

                        <div class="pt-4 pb-2">
                            <h5 class="card-title text-center pb-0 fs-4">Login to Your Account</h5>
                            <p class="text-center small">Enter your username & password to login</p>
                        </div>

                        <form action="/mimin/login/authe" method="post" class="row g-3 needs-validation">
                            <?= csrf_field() ?>
                            <div class="col-12">
                                <label for="username" class="form-label"> Username</label>
                                <div class="input-group has-validation">
                                    <input type="text" name="username" class="form-control" id="username" required>
                                </div>
                            </div>
                            <div class="col-12">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" name="password" class="form-control" id="password" required>
                            </div>
                            <div class="col-12">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" value="true" id="rememberMe">
                                    <label class="form-check-label" for="rememberMe">Remember me</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <button class="btn btn-primary w-100" type="submit">Login</button>
                            </div>
                            <div class="col-12">
                                <p class="small mb-0">Don't have account? <a href="<?= route_to('mimin/register') ?>">Create an account</a></p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?= $this->endSection() ?>