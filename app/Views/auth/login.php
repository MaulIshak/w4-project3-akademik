<?= $this->extend('layout/base_template') ?>

<?= $this->section('content') ?>
<div class="container bg-secondary">
    <div class="row vh-100 d-flex justify-content-center align-items-center">
        <div class="col-md-5">
            <div class="card shadow-sm">
                <div class="card-body p-5">
                    <div class="text-center mb-4">
                        <img src="<?= base_url('img/logo-polban.png') ?>" alt="Logo Polban" style="width: 80px;">
                        <h3 class="mt-3 mb-0 fw-bold"><span class="text-polban-primary">Akademik</span><span class="text-polban-secondary">Polban</span></h3>
                        <p class="text-muted">Silakan login untuk melanjutkan</p>
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

                    <form action="<?= base_url('/auth/login') ?>" method="post">
                        <?= csrf_field() ?>
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control" id="username" name="username" placeholder="Masukkan username" value="<?= old('username') ?>">
                        </div>
                        <div class="mb-4">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan password">
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
