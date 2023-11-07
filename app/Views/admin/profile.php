<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>

<main id="main" class="main">

    <div class="pagetitle">
        <h1>Profile</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Users</li>
                <li class="breadcrumb-item active">Profile</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section profile">
        <div class="row">
            <div class="col-xl-12">

                <div class="card">
                    <div class="card-body pt-3">
                        <!-- Bordered Tabs -->
                        <ul class="nav nav-tabs nav-tabs-bordered">
                            <li class="nav-item">
                                <button class="nav-link <?= isset($activeTab) && $activeTab === 'profile-edit' ? 'active' : ''; ?>" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit Profile</button>
                            </li>

                            <li class="nav-item">
                                <button class="nav-link <?= isset($activeTab) && $activeTab === 'profile-change-password' ? 'active' : ''; ?>" data-bs-toggle="tab" data-bs-target="#profile-change-password">Change Password</button>
                            </li>

                            <li class="nav-item">
                                <button class="nav-link <?= isset($activeTab) && $activeTab === 'profile-enable-2fa' ? 'active' : ''; ?>" data-bs-toggle="tab" data-bs-target="#profile-enable-2fa">Enable 2FA</button>
                            </li>
                        </ul>

                        <div class="tab-content pt-2">
                            <?php if (session()->getFlashdata('errors')) : ?>
                                <div class="alert alert-danger"><?= session()->getFlashdata('errors') ?></div>
                            <?php endif; ?>

                            <div class="tab-pane fade show active profile-edit pt-3" id="profile-edit">


                                <!-- Profile Edit Form -->

                                <form action="<?= site_url('profile/update/' .  session()->get('user')['id']) ?>" method="post" class="row g-3 needs-validation" novalidate>
                                    <?= csrf_field() ?>
                                    <input type="hidden" name="id" value="<?= session()->get('user')['id']; ?>">
                                    <div class="col-12">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" name="email" class="form-control " id="email" placeholder="Email " value="<?= old('email',  session()->get('user')['email']) ?>">
                                    </div>
                                    <div class="col-6">
                                        <label for="username" class="form-label">username</label>
                                        <input type="text" name="username" class="form-control" id="username" placeholder="username " value="<?= old('username',  session()->get('user')['username']) ?>">
                                    </div>
                                    <div class="col-6">
                                        <label for="pin" class="form-label">PIN</label>
                                        <input type="number" name="pin" class="form-control " id="pin" placeholder="PIN " value="<?= old('pin', session()->get('user')['pin']) ?>">
                                    </div>

                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary">Save Changes</button>
                                    </div>
                                </form>
                                <!-- End Profile Edit Form -->

                            </div>

                            <div class="tab-pane fade pt-3" id="profile-change-password">

                                <!-- Change Password Form -->
                                <form action="<?= site_url('profile/change-password/' .  session()->get('user')['id']) ?>" method="post">

                                    <?= csrf_field() ?>
                                    <div class="row mb-3">
                                        <label for="current_password" class="col-md-4 col-lg-3 col-form-label">Current Password</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="current_password" type="password" class="form-control" id="current_password" require>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="new_password" class="col-md-4 col-lg-3 col-form-label">New Password</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="new_password" type="password" class="form-control" id="new_password" require>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="confirm_password" class="col-md-4 col-lg-3 col-form-label">Re-enter New Password</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="confirm_password" type="password" class="form-control" id="confirm_password" require>
                                        </div>
                                    </div>

                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary">Change Password</button>
                                    </div>
                                </form><!-- End Change Password Form -->

                            </div>

                            <div class="tab-pane fade pt-3" id="profile-enable-2fa">
                                <h3>Enable 2FA</h3>

                                <?php if (session()->getFlashdata('errors')) : ?>
                                    <div class="alert alert-danger"><?= session()->getFlashdata('errors') ?></div>
                                <?php endif; ?>

                                <?php if (session()->getFlashdata('success')) : ?>
                                    <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
                                <?php endif; ?>

                                <p>Scan the following QR code with your 2FA app and get your SecretKey.</p>
                                <img src="<?= $qr ?>" alt="2FA QR Code">

                                <!-- Enable 2FA Form -->
                                <form action="<?= site_url('profile/2fa/' . session()->get('user')['id']) ?>" method="post" class="mt-4">
                                    <?= csrf_field() ?>
                                    <!-- <div class="mb-3">
                                        <label for="2fa_code" class="form-label">Enter the 2FA Code</label>
                                        <input type="text" name="2fa_code" class="form-control" id="2fa_code" required>
                                    </div> -->
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary">Enable 2FA</button>
                                    </div>
                                </form>
                                <!-- End Enable 2FA Form -->
                            </div>


                        </div><!-- End Bordered Tabs -->

                    </div>
                </div>

            </div>
        </div>
    </section>

</main><!-- End #main -->



<?= $this->endSection() ?>