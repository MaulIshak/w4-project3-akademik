<?= $this->extend('layout/page_template') ?>

<?= $this->section('main-content') ?>
<?php $validation = session()->get('validation') ?? \Config\Services::validation(); ?>
<h2 class="my-3 mb-4 fw-bold">Edit Mata Kuliah</h2>
<p class="text-secondary my-3 pb-3"> Ubah informasi mata kuliah pada form di bawah ini.</p>
<div class="card">
    <div class="card-body">
        <form action="/admin/matakuliah/update/<?= $matakuliah['kode_mata_kuliah'] ?>" method="post">
            <?= csrf_field() ?>
            <input type="hidden" name="_method" value="PUT">
            <div class="mb-3">
                <label for="kode_mata_kuliah" class="form-label">Kode Mata Kuliah</label>
                <input type="text" class="form-control <?= $validation->hasError('kode_mata_kuliah') ? 'is-invalid' : '' ?>" id="kode_mata_kuliah" name="kode_mata_kuliah" value="<?= $matakuliah['kode_mata_kuliah'] ?>">
                 <?php if ($validation->hasError('kode_mata_kuliah')): ?>
                    <div class="invalid-feedback">
                        <?= $validation->getError('kode_mata_kuliah') ?>
                    </div>
                <?php endif; ?>
            </div>
            <div class="mb-3">
                <label for="nama_mata_kuliah" class="form-label">Nama Mata Kuliah</label>
                <input type="text" class="form-control <?= $validation->hasError('nama_mata_kuliah') ? 'is-invalid' : '' ?>" id="nama_mata_kuliah" name="nama_mata_kuliah" value="<?= old('nama_mata_kuliah', $matakuliah['nama_mata_kuliah']) ?>" required>
                 <?php if ($validation->hasError('nama_mata_kuliah')): ?>
                    <div class="invalid-feedback">
                        <?= $validation->getError('nama_mata_kuliah') ?>
                    </div>
                <?php endif; ?>
            </div>
            <div class="mb-3">
                <label for="sks" class="form-label">Jumlah SKS</label>
                <input type="number" class="form-control <?= $validation->hasError('sks') ? 'is-invalid' : '' ?>" id="sks" name="sks" min="1" max="6" value="<?= old('sks', $matakuliah['sks']) ?>" required>
                 <?php if ($validation->hasError('sks')): ?>
                    <div class="invalid-feedback">
                        <?= $validation->getError('sks') ?>
                    </div>
                <?php endif; ?>
            </div>
            <div class="d-flex justify-content-end">
                <a href="/admin/matakuliah" class="btn btn-secondary me-2">Batal</a>
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>
    </div>
</div>

<?= $this->endSection() ?>
