<?= $this->extend('layout/page_template') ?>

<?= $this->section('main-content') ?>
<h2 class="my-3 mb-4 fw-bold">Edit Mata Kuliah</h2>

<div class="card">
    <div class="card-body">
        <!-- Anggap saja $matakuliah sudah di-pass dari controller -->
        <?php $matakuliah = ['kode_mk' => 'IF101', 'nama_mk' => 'Dasar Pemrograman', 'sks' => 3]; ?>
        <form action="/admin/matakuliah/update/<?= $matakuliah['kode_mk'] ?>" method="post">
            <?= csrf_field() ?>
            <input type="hidden" name="_method" value="PUT">
            <div class="mb-3">
                <label for="kode_mk" class="form-label">Kode Mata Kuliah</label>
                <input type="text" class="form-control" id="kode_mk" name="kode_mk" value="<?= $matakuliah['kode_mk'] ?>" readonly>
            </div>
            <div class="mb-3">
                <label for="nama_mk" class="form-label">Nama Mata Kuliah</label>
                <input type="text" class="form-control" id="nama_mk" name="nama_mk" value="<?= $matakuliah['nama_mk'] ?>" required>
            </div>
            <div class="mb-3">
                <label for="sks" class="form-label">Jumlah SKS</label>
                <input type="number" class="form-control" id="sks" name="sks" min="1" max="6" value="<?= $matakuliah['sks'] ?>" required>
            </div>
            <div class="d-flex justify-content-end">
                <a href="/admin/matakuliah" class="btn btn-secondary me-2">Batal</a>
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>
    </div>
</div>

<?= $this->endSection() ?>
