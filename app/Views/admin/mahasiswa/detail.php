<?= $this->extend('layout/page_template') ?>
<?= $this->section('main-content') ?>
<h2 class="my-3 mb-4 fw-bold">Detail Mahasiswa</h2>

<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
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

        <h4 class="mt-4">Mata Kuliah yang Diambil</h4>
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Kode MK</th>
                    <th>Nama Mata Kuliah</th>
                    <th>SKS</th>
                    <th>Tanggal Mengambil</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $count = 1;
                    if(!empty($mahasiswa['mata_kuliah'])):
                        foreach($mahasiswa['mata_kuliah'] as $matkul):
                ?>
                <tr>
                    <td><?= $count++ ?></td>
                    <td><?= $matkul['kode_mata_kuliah'] ?></td>
                    <td><?= $matkul['nama_mata_kuliah'] ?></td>
                    <td><?= $matkul['sks'] ?></td>
                    <td><?= $matkul['tanggal_mengambil'] ?></td>
                </tr>

                <?php
                        endforeach;
                    endif;
                ?>
            </tbody>
        </table>
        
        <div class="mt-4">
             <a href="/admin/mahasiswa" class="btn btn-secondary">Kembali</a>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
