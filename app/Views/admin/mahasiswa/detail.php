<?= $this->extend('layout/page_template') ?>

<?= $this->section('main-content') ?>
<h2 class="my-3 mb-4 fw-bold">Detail Mahasiswa</h2>

<div class="card">
    <div class="card-body">
        <!-- Anggap $mahasiswa sudah di-pass dari controller -->
        <?php $mahasiswa = ['nim' => '241511001', 'nama_lengkap' => 'John Doe', 'tahun_masuk' => 2024]; ?>
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
                    <th>Kode MK</th>
                    <th>Nama Mata Kuliah</th>
                    <th>SKS</th>
                </tr>
            </thead>
            <tbody>
                <!-- Contoh Data Mata Kuliah -->
                <tr>
                    <td>IF101</td>
                    <td>Dasar Pemrograman</td>
                    <td>3</td>
                </tr>
                 <tr>
                    <td>IF102</td>
                    <td>Struktur Data</td>
                    <td>3</td>
                </tr>
            </tbody>
        </table>
        
        <div class="mt-4">
             <a href="/admin/mahasiswa" class="btn btn-secondary">Kembali</a>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
