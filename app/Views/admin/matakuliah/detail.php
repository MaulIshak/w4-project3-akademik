<?= $this->extend('layout/page_template') ?>

<?= $this->section('main-content') ?>
<h2 class="my-3 mb-4 fw-bold">Detail Mata Kuliah</h2>

<div class="card">
    <div class="card-body">
        <!-- Data contoh, nantinya akan di-pass dari controller -->
        <?php $matakuliah = ['kode_mk' => 'IF101', 'nama_mk' => 'Dasar Pemrograman', 'sks' => 3]; ?>
        <div class="row">
            <div class="col-md-8">
                <table class="table table-borderless">
                    <tr>
                        <th style="width: 200px;">Kode Mata Kuliah</th>
                        <td>: <?= $matakuliah['kode_mk'] ?></td>
                    </tr>
                    <tr>
                        <th>Nama Mata Kuliah</th>
                        <td>: <?= $matakuliah['nama_mk'] ?></td>
                    </tr>
                     <tr>
                        <th>Jumlah SKS</th>
                        <td>: <?= $matakuliah['sks'] ?></td>
                    </tr>
                </table>
            </div>
        </div>

        <h4 class="mt-4">Daftar Mahasiswa Pengambil</h4>
        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>NIM</th>
                        <th>Nama Lengkap</th>
                        <th>Tanggal Mengambil</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Data contoh mahasiswa, nantinya dari controller -->
                    <tr>
                        <td>241511001</td>
                        <td>John Doe</td>
                        <td>2025-09-10</td>
                    </tr>
                     <tr>
                        <td>241511016</td>
                        <td>Maulana Ishak</td>
                        <td>2025-09-11</td>
                    </tr>
                </tbody>
            </table>
        </div>
        
        <div class="mt-4 d-flex justify-content-end">
             <a href="/admin/matakuliah" class="btn btn-secondary">Kembali ke Daftar</a>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
