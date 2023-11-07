<?= $this->extend('layout/templateLogin') ?>
<?= $this->section('content') ?>
<section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">
                <div class="card mb-3">
                    <div class="card-body">


                        <?php if (session()->getFlashdata('errors')) : ?>
                            <div class="alert alert-danger mt-2 "><?= session()->getFlashdata('errors') ?></div>
                        <?php endif; ?>

                        <div class="pt-4 pb-2">
                            <h5 class="card-title text-center pb-0 fs-4">Two-Factor Authentication</h5>
                            <p class="text-center small">Enter your Key Secret</p>
                        </div>

                        <form action="/mimin/verifikasi-2fa" method="post" class="row g-3 needs-validation">
                            <?= csrf_field() ?>
                            <div class="col-12">
                                <label for="username" class="form-label"> Kode A2F</label>
                                <div class="input-group has-validation">
                                    <input type="text" name="2fa_code" class="form-control" id="username" required>
                                </div>
                            </div>
                            <div class="col-12">
                                <button class="btn btn-primary w-100" type="submit">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<?= $this->endSection() ?>