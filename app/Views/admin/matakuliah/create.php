<?= $this->extend('layout/page_template') ?>

<?= $this->section('main-content') ?>
<?php $validation = session()->get('validation') ?? \Config\Services::validation(); ?>
<h2 class="my-3 mb-4 fw-bold">Tambah Mata Kuliah</h2>
<p class="text-secondary my-3 pb-3"> Gunakan form di bawah ini untuk menambahkan mata kuliah baru ke dalam sistem.</p>
<div class="card">
    <div class="card-body">
        <form id="createMatkulForm" action="/admin/matakuliah/store" method="post">
            <?= csrf_field() ?>
            <div class="mb-3">
                <label for="kode_mata_kuliah" class="form-label">Kode Mata Kuliah</label>
                <input type="text" class="form-control <?= $validation->hasError('kode_mata_kuliah') ? 'is-invalid' : '' ?>" id="kode_mata_kuliah" name="kode_mata_kuliah" value="<?= old('kode_mata_kuliah') ?>" placeholder="Contoh: IF101" required>
                <div class="invalid-feedback">
                <?php if ($validation->hasError('kode_mata_kuliah')): ?>
                        <?= $validation->getError('kode_mata_kuliah') ?>
                        <?php endif; ?>
                    </div>
            </div>
            <div class="mb-3">
                <label for="nama_mata_kuliah" class="form-label">Nama Mata Kuliah</label>
                <input type="text" class="form-control <?= $validation->hasError('nama_mata_kuliah') ? 'is-invalid' : '' ?>" id="nama_mata_kuliah" name="nama_mata_kuliah" value="<?= old('nama_mata_kuliah') ?>" placeholder="Contoh: Dasar Pemrograman" required>
                <div class="invalid-feedback">
                 <?php if ($validation->hasError('nama_mata_kuliah')): ?>
                        <?= $validation->getError('nama_mata_kuliah') ?>
                        <?php endif; ?>
                    </div>
            </div>
            <div class="mb-3">
                <label for="sks" class="form-label">Jumlah SKS</label>
                <input type="number" class="form-control <?= $validation->hasError('sks') ? 'is-invalid' : '' ?>" id="sks" name="sks" min="1" value="<?= old('sks') ?>" required>
                <div class="invalid-feedback">
                 <?php if ($validation->hasError('sks')): ?>
                        <?= $validation->getError('sks') ?>
                        <?php endif; ?>
                    </div>
            </div>
            <div class="d-flex justify-content-end">
                <a href="/admin/matakuliah" class="btn btn-secondary me-2">Batal</a>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </div>
</div>

<?= $this->endSection() ?>
