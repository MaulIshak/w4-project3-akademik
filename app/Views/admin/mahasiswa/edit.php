<?= $this->extend('layout/page_template') ?>

<?= $this->section('main-content') ?>

<?php 
    $validation = session()->getFlashdata('validation') ?? \Config\Services::validation(); 
?>


<h2 class="my-3 mb-4 fw-bold">Edit Data Mahasiswa</h2>
<p class="text-secondary my-3 pb-3"> Ubah informasi mahasiswa pada form di bawah ini.</p>

<div class="card">
    <div class="card-body">
        <form action="<?= route_to('admin.mahasiswa.update', $mahasiswa['nim']) ?>" method="post">
            <?= csrf_field() ?>
            <input type="hidden" name="_method" value="PUT">
            <div class="mb-3">
                <label for="nim" class="form-label">NIM</label>
                <input type="text" class="form-control <?= $validation->hasError('nim') ? 'is-invalid' : '' ?>" id="nim" name="nim" value="<?= old('nim', $mahasiswa['nim']) ?>">
                 <?php if ($validation->hasError('nim')): ?>
                    <div class="invalid-feedback">
                        <?= $validation->getError('nim') ?>
                    </div>
                <?php endif; ?>
            </div>
             <div class="mb-3">
                <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
                <input type="text" class="form-control <?= $validation->hasError('nama_lengkap') ? 'is-invalid' : '' ?>" id="nama_lengkap" name="nama_lengkap" value="<?= old('nama_lengkap', $mahasiswa['nama_lengkap']) ?>" required>
                 <?php if ($validation->hasError('nama_lengkap')): ?>
                    <div class="invalid-feedback">
                        <?= $validation->getError('nama_lengkap') ?>
                    </div>
                <?php endif; ?>
            </div>
             <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control <?= $validation->hasError('username') ? 'is-invalid' : '' ?>" id="username" name="username" value="<?= old('username', $mahasiswa['username']) ?>" required>
                 <?php if ($validation->hasError('username')): ?>
                    <div class="invalid-feedback">
                        <?= $validation->getError('username') ?>
                    </div>
                <?php endif; ?>
            </div>
            <div class="mb-3">
                <label for="tahun_masuk" class="form-label">Tahun Masuk</label>
                <input type="number" class="form-control <?= $validation->hasError('tahun_masuk') ? 'is-invalid' : '' ?>" id="tahun_masuk" name="tahun_masuk" min="2000" max="2100" value="<?= old('tahun_masuk', $mahasiswa['tahun_masuk']) ?>" required>
                 <?php if ($validation->hasError('tahun_masuk')): ?>
                    <div class="invalid-feedback">
                        <?= $validation->getError('tahun_masuk') ?>
                    </div>
                <?php endif; ?>
            </div>
             <div class="mb-3">
                <label for="password" class="form-label">Reset Password</label>
                <div class="input-group">
                    <input type="password" class="form-control <?= $validation->hasError('password') ? 'is-invalid' : '' ?>" id="password" name="password" placeholder="Isi untuk mereset password">
                     <span class="input-group-text toggle-password" style="cursor: pointer;" data-target="password">
                        <i class="bi bi-eye-slash"></i>
                    </span>
                    <?php if ($validation->hasError('password')): ?>
                        <div class="invalid-feedback">
                            <?= $validation->getError('password') ?>
                        </div>
                    <?php endif; ?>
                </div>
                <small class="form-text text-muted">Kosongkan jika tidak ingin mengubah password.</small>
            </div>
            <div class="d-flex justify-content-end">
                <a href="<?= route_to('admin.mahasiswa') ?>" class="btn btn-secondary me-2">Batal</a>
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>
    </div>
</div>
<?= $this->endSection() ?>
