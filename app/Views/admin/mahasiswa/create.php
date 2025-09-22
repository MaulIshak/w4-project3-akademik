<?= $this->extend('layout/page_template') ?>

<?= $this->section('main-content') ?>

<?php $validation = session()->getFlashdata('validation') ?? \Config\Services::validation();
    // d($validation->listErrors());
?>

<h2 class="my-3 mb-4 fw-bold">Tambah Mahasiswa Baru</h2>
<p class="text-secondary my-3 pb-3"> Isi form di bawah untuk menambahkan data mahasiswa baru.</p>

<div class="card">
    <div class="card-body">
        <?php if(session()->getFlashdata('error')): ?>
            <div class="alert alert-danger" role="alert">
                <?= session()->getFlashdata('error') ?>
            </div>
        <?php endif; ?>

        <form action="<?= route_to('admin.mahasiswa.store') ?>" method="post">
             <?= csrf_field() ?>
            <div class="mb-3">
                <label for="nim" class="form-label">NIM</label>
                <input type="text" class="form-control <?= $validation->hasError('nim') ? 'is-invalid' : '' ?>" id="nim" name="nim" value="<?= old('nim') ?>" required>
                <div class="invalid-feedback">
                <?php if ($validation->hasError('nim')): ?>
                        <?= $validation->getError('nim') ?>
                        <?php endif; ?>
                    </div>
            </div>
             <div class="mb-3">
                <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
                <input type="text" class="form-control <?= $validation->hasError('nama_lengkap') ? 'is-invalid' : '' ?>" id="nama_lengkap" name="nama_lengkap" value="<?= old('nama_lengkap') ?>" required>
                <div class="invalid-feedback">
                 <?php if ($validation->hasError('nama_lengkap')): ?>
                        <?= $validation->getError('nama_lengkap') ?>
                        <?php endif; ?>
                    </div>
            </div>
             <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control <?= $validation->hasError('username') ? 'is-invalid' : '' ?>" id="username" name="username" value="<?= old('username') ?>" required>
                <div class="invalid-feedback">
                <?php if ($validation->hasError('username')): ?>
                        <?= $validation->getError('username') ?>
                        <?php endif; ?>
                    </div>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password Default</label>
                <div class="input-group">
                    <input type="password" class="form-control <?= $validation->hasError('password') ? 'is-invalid' : '' ?>" id="password" name="password" required>
                    <span class="input-group-text toggle-password" style="cursor: pointer;" data-target="password">
                        <i class="bi bi-eye-slash"></i>
                    </span>
                    <div class="invalid-feedback">
                    <?php if ($validation->hasError('password')): ?>
                            <?= $validation->getError('password') ?>
                            <?php endif; ?>
                        </div>
                </div>
            </div>
            <div class="mb-3">
                <label for="tahun_masuk" class="form-label">Tahun Masuk</label>
                <input type="number" class="form-control <?= $validation->hasError('tahun_masuk') ? 'is-invalid' : '' ?>" id="tahun_masuk" name="tahun_masuk" min="2000" max="2100" value="<?= old('tahun_masuk', date('Y')) ?>" required>
                <div class="invalid-feedback">
                <?php if ($validation->hasError('tahun_masuk')): ?>
                        <?= $validation->getError('tahun_masuk') ?>
                        <?php endif; ?>
                    </div>
            </div>
            <div class="d-flex justify-content-end">
                <a href="<?= route_to('admin.mahasiswa') ?>" class="btn btn-secondary me-2">Batal</a>
                <button type="submit" class="btn btn-primary" id="btnSubmit">Simpan</button>
            </div>
        </form>
    </div>
</div>
<?= $this->endSection() ?>
