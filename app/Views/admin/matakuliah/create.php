<?= $this->extend('layout/page_template') ?>

<?= $this->section('main-content') ?>
<h2 class="my-3 mb-4 fw-bold">Tambah Mata Kuliah</h2>

<div class="card">
    <div class="card-body">
        <form action="/admin/matakuliah/store" method="post">
            <?= csrf_field() ?>
            <div class="mb-3">
                <label for="kode_mk" class="form-label">Kode Mata Kuliah</label>
                <input type="text" class="form-control" id="kode_mk" name="kode_mk" placeholder="Contoh: IF101" required>
            </div>
            <div class="mb-3">
                <label for="nama_mk" class="form-label">Nama Mata Kuliah</label>
                <input type="text" class="form-control" id="nama_mk" name="nama_mk" placeholder="Contoh: Dasar Pemrograman" required>
            </div>
            <div class="mb-3">
                <label for="sks" class="form-label">Jumlah SKS</label>
                <input type="number" class="form-control" id="sks" name="sks" min="1" max="6" required>
            </div>
            <div class="d-flex justify-content-end">
                <a href="/admin/matakuliah" class="btn btn-secondary me-2">Batal</a>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </div>
</div>

<?= $this->endSection() ?>
