<?= $this->extend('layout/mahasiswa_template') ?>

<?= $this->section('main-content') ?>
<?php $validation = session()->getFlashData('validation') ??  \Config\Services::validation(); ?>
<!-- Notifikasi -->
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

<h2 class="my-3 mb-4 fw-bold">Profil Mahasiswa</h2>
<p class="text-secondary my-3 pb-3"> Kelola informasi pribadi dan ubah password akun Anda.</p>

<div class="row">
    <div class="col-md-6 mb-4">
        <div class="card">
            <div class="card-header">
                Informasi Pribadi
            </div>
            <div class="card-body">
                <table class="table table-borderless">
                    <tr>
                        <th style="width: 150px;">NIM</th>
                        <td>: <?= esc($mahasiswa['user_id']) ?></td>
                    </tr>
                    <tr>
                        <th>Nama Lengkap</th>
                        <td>: <?= esc($mahasiswa['nama_lengkap']) ?></td>
                    </tr>
                     <tr>
                        <th>Tahun Masuk</th>
                        <td>: <?= esc($mahasiswa['tahun_masuk']) ?></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card">
             <div class="card-header">
                Ubah Password
            </div>
            <div class="card-body">
                <form action="<?= route_to('mahasiswa.password.update') ?>" method="post">
                    <?= csrf_field() ?>
                    <div class="mb-3">
                        <label for="current_password" class="form-label">Password Saat Ini</label>
                        <div class="input-group">
                            <input type="password" class="form-control <?= $validation->hasError('current_password') ? 'is-invalid' : '' ?>" id="current_password" name="current_password" value="<?=old('current_password')??''?>" required>
                            <span class="input-group-text toggle-password" style="cursor: pointer;" data-target="current_password">
                                <i class="bi bi-eye-slash"></i>
                            </span>
                             <?php if ($validation->hasError('current_password')): ?>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('current_password') ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="new_password" class="form-label">Password Baru</label>
                         <div class="input-group">
                            <input type="password" class="form-control <?= $validation->hasError('new_password') ? 'is-invalid' : '' ?>" id="new_password" name="new_password" value="<?=old('new_password')??''?>" required>
                             <span class="input-group-text toggle-password" style="cursor: pointer;" data-target="new_password">
                                <i class="bi bi-eye-slash"></i>
                            </span>
                            <?php if ($validation->hasError('new_password')): ?>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('new_password') ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                     <div class="mb-3">
                        <label for="confirm_password" class="form-label">Konfirmasi Password Baru</label>
                        <div class="input-group">
                            <input type="password" class="form-control <?= $validation->hasError('confirm_password') ? 'is-invalid' : '' ?>" id="confirm_password" name="confirm_password" value="<?=old('confirm_password')??''?>" required>
                            <span class="input-group-text toggle-password" style="cursor: pointer;" data-target="confirm_password">
                                <i class="bi bi-eye-slash"></i>
                            </span>
                            <?php if ($validation->hasError('confirm_password')): ?>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('confirm_password') ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
