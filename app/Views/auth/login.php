<?= $this->extend('layout/base_template') ?>

<?= $this->section('content') ?>
<div class="container">
    <div class="row vh-100 d-flex justify-content-center align-items-center">
        <div class="col-md-5">
            <div class="card shadow-sm">
                <div class="card-body p-5">
                    <div class="text-center mb-4">
                        <img src="<?= base_url('img/logo-polban.png') ?>" alt="Logo Polban" style="width: 80px;">
                        <h3 class="mt-3 mb-0 fw-bold"><span class="text-polban-primary">Akademik</span><span class="text-polban-secondary">Polban</span></h3>
                        <p class="text-muted">Silakan login untuk melanjutkan</p>
                    </div>
                    <form>
                        <div class="mb-3">
                            <label for="username" class="form-label">Username / NIM</label>
                            <input type="text" class="form-control" id="username" placeholder="Masukkan username atau NIM">
                        </div>
                        <div class="mb-4">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" placeholder="Masukkan password">
                        </div>
                        <div class="d-grid">
                            <button type="submit" class="btn bg-polban-primary text-white">Login</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
