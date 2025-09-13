<?= $this->extend('layout/page_template') ?>

<?= $this->section('main-content') ?>
<h2 class="my-3 mb-4 fw-bold">Tambah Mahasiswa Baru</h2>

<div class="card">
    <div class="card-body">
        <form action="/admin/mahasiswa/store" method="post">
             <?= csrf_field() ?>
            <div class="mb-3">
                <label for="nim" class="form-label">NIM</label>
                <input type="text" class="form-control" id="nim" name="nim" required>
            </div>
             <div class="mb-3">
                <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
                <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" required>
            </div>
             <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" id="username" name="username" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password Default</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <div class="mb-3">
                <label for="tahun_masuk" class="form-label">Tahun Masuk</label>
                <input type="number" class="form-control" id="tahun_masuk" name="tahun_masuk" min="2000" max="2100" required>
            </div>
            <div class="d-flex justify-content-end">
                <a href="/admin/mahasiswa" class="btn btn-secondary me-2">Batal</a>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </div>
</div>
<?= $this->endSection() ?>
