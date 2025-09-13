<?= $this->extend('layout/mahasiswa_template') ?>

<?= $this->section('main-content') ?>
<h2 class="my-3 mb-4 fw-bold">Profil Mahasiswa</h2>

<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                Informasi Pribadi
            </div>
            <div class="card-body">
                <!-- Anggap $mahasiswa sudah di-pass dari controller -->
                <?php $mahasiswa = ['nim' => '241511001', 'nama_lengkap' => 'John Doe', 'tahun_masuk' => 2024]; ?>
                <table class="table table-borderless">
                    <tr>
                        <th style="width: 150px;">NIM</th>
                        <td>: <?= $mahasiswa['nim'] ?></td>
                    </tr>
                    <tr>
                        <th>Nama Lengkap</th>
                        <td>: <?= $mahasiswa['nama_lengkap'] ?></td>
                    </tr>
                     <tr>
                        <th>Tahun Masuk</th>
                        <td>: <?= $mahasiswa['tahun_masuk'] ?></td>
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
                <form action="/mahasiswa/profile/update_password" method="post">
                    <?= csrf_field() ?>
                    <div class="mb-3">
                        <label for="current_password" class="form-label">Password Saat Ini</label>
                        <input type="password" class="form-control" id="current_password" name="current_password" required>
                    </div>
                    <div class="mb-3">
                        <label for="new_password" class="form-label">Password Baru</label>
                        <input type="password" class="form-control" id="new_password" name="new_password" required>
                    </div>
                     <div class="mb-3">
                        <label for="confirm_password" class="form-label">Konfirmasi Password Baru</label>
                        <input type="password" class="form-control" id="confirm_password" name="confirm_password" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
