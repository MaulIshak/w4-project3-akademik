<?= $this->extend('layout/page_template') ?>

<?= $this->section('main-content') ?>
<h2 class="my-3 mb-4 fw-bold">Edit Data Mahasiswa</h2>

<div class="card">
    <div class="card-body">
        <!-- Anggap $mahasiswa sudah di-pass dari controller -->
        <?php $mahasiswa = ['nim' => '241511001', 'nama_lengkap' => 'John Doe', 'tahun_masuk' => 2024, 'username' => 'johndoe']; ?>
        <form action="/admin/mahasiswa/update/<?= $mahasiswa['nim'] ?>" method="post">
            <?= csrf_field() ?>
            <input type="hidden" name="_method" value="PUT">
            <div class="mb-3">
                <label for="nim" class="form-label">NIM</label>
                <input type="text" class="form-control" id="nim" name="nim" value="<?= $mahasiswa['nim'] ?>" readonly>
            </div>
             <div class="mb-3">
                <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
                <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" value="<?= $mahasiswa['nama_lengkap'] ?>" required>
            </div>
             <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" id="username" name="username" value="<?= $mahasiswa['username'] ?>" required>
            </div>
            <div class="mb-3">
                <label for="tahun_masuk" class="form-label">Tahun Masuk</label>
                <input type="number" class="form-control" id="tahun_masuk" name="tahun_masuk" min="2000" max="2100" value="<?= $mahasiswa['tahun_masuk'] ?>" required>
            </div>
             <div class="mb-3">
                <label for="password" class="form-label">Reset Password (Opsional)</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Isi untuk mereset password">
            </div>
            <div class="d-flex justify-content-end">
                <a href="/admin/mahasiswa" class="btn btn-secondary me-2">Batal</a>
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>
    </div>
</div>
<?= $this->endSection() ?>
