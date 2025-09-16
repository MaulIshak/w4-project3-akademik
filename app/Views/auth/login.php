<?= $this->extend('layout/base_template') ?>

<?= $this->section('content') ?>
<?php $validation = session()->get('validation') ?? \Config\Services::validation(); ?>
<div class="container bg-secondary">
    <div class="row vh-100 d-flex justify-content-center align-items-center">
        <div class="col-md-5">
            <div class="card shadow-sm">
                <div class="card-body p-5">
                    <div class="text-center mb-4">
                        <img src="<?= base_url('img/logo-polban.png') ?>" alt="Logo Polban" style="width: 80px;">
                        <h3 class="mt-3 mb-0 fw-bold"><span class="text-polban-primary">SiAkad</span><span class="text-polban-secondary">Polban</span></h3>
                        <p class="text-muted">Sistem akademik polban versi mini</p>
                    </div>

                    <!-- Menampilkan notifikasi -->
                    <?php if(session()->getFlashdata('success')): ?>
                        <div class="alert alert-success" role="alert">
                            <?= session()->getFlashdata('success') ?>
                        </div>
                    <?php endif; ?>
                    <?php if(session()->getFlashdata('error')): ?>
                        <div class="alert alert-danger" role="alert">
                            <?= session()->getFlashdata('error') ?>
                        </div>
                    <?php endif; ?>
                     <?php if($validation->getErrors()): ?>
                        <div class="alert alert-danger" role="alert">
                           Mohon periksa kembali inputan Anda.
                        </div>
                    <?php endif; ?>

                    <form action="<?= route_to('login.attempt') ?>" method="post">
                        <?= csrf_field() ?>
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control <?= $validation->hasError('username') ? 'is-invalid' : '' ?>" id="username" name="username" placeholder="Masukkan username" value="<?= old('username') ?>">
                             <?php if ($validation->hasError('username')): ?>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('username') ?>
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="mb-4">
                            <label for="password" class="form-label">Password</label>
                            <div class="input-group">
                                <input type="password" class="form-control <?= $validation->hasError('password') ? 'is-invalid' : '' ?>" id="password" name="password" placeholder="Masukkan password">
                                <span class="input-group-text toggle-password" style="cursor: pointer;" data-target="password">
                                    <i class="bi bi-eye-slash"></i>
                                </span>
                                <?php if ($validation->hasError('password')): ?>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('password') ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary bg-polban-primary">Login</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
