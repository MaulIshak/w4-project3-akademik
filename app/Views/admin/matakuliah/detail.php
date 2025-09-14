<?= $this->extend('layout/page_template') ?>

<?= $this->section('main-content') ?>
<h2 class="my-3 mb-4 fw-bold">Detail Mata Kuliah</h2>

<div class="card">
    <div class="card-body">
        <!-- Data contoh, nantinya akan di-pass dari controller -->
        <div class="row">
            <div class="col-md-8">
                <table class="table table-borderless">
                    <tr>
                        <th style="width: 200px;">Kode Mata Kuliah</th>
                        <td>: <?= $mataKuliah['kode_mata_kuliah'] ?></td>
                    </tr>
                    <tr>
                        <th>Nama Mata Kuliah</th>
                        <td>: <?= $mataKuliah['nama_mata_kuliah'] ?></td>
                    </tr>
                     <tr>
                        <th>Jumlah SKS</th>
                        <td>: <?= $mataKuliah['sks'] ?></td>
                    </tr>
                </table>
            </div>
        </div>

        <h4 class="mt-4">Daftar Mahasiswa Pengambil</h4>
        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>NIM</th>
                        <th>Nama Lengkap</th>
                        <th>Tanggal Mengambil</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                $count = 1;
                    if(!empty($mataKuliah['mahasiswa'])):
                        foreach($mataKuliah['mahasiswa'] as $mhs):
                ?>
                    <tr>
                        <td><?= $count++ ?></td>
                        <td><?= $mhs['nim'] ?></td>
                        <td><?= $mhs['nama_lengkap'] ?></td>
                        <td><?= $mhs['tanggal_mengambil'] ?></td>
                    </tr>
                <?php
                        endforeach;
                    endif;
                ?>
                </tbody>
            </table>
        </div>
        
        <div class="mt-4 d-flex justify-content-start">
             <a href="/admin/matakuliah" class="btn btn-secondary">Kembali</a>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
