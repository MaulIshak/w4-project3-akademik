<?= $this->extend('layout/mahasiswa_template') ?>

<?= $this->section('main-content') ?>

<h2 class="my-3 mb-4 fw-bold">Ambil Mata Kuliah</h2>

<!-- Form untuk membatalkan mata kuliah -->
<div class="card mb-4">
    <div class="card-header">
        Mata Kuliah yang Sudah Diambil
    </div>
    <div class="card-body">
        <form action="/mahasiswa/matakuliah/batalkan" method="post">
            <?= csrf_field() ?>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th style="width: 5%;">#</th>
                            <th>Kode MK</th>
                            <th>Nama Mata Kuliah</th>
                            <th>SKS</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Contoh Data, nantinya dari controller -->
                        <tr>
                            <td>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="batal_mk[]" value="IF101" id="batal_IF101">
                                </div>
                            </td>
                            <td><label for="batal_IF101">IF101</label></td>
                            <td><label for="batal_IF101">Dasar Pemrograman</label></td>
                            <td>3</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="d-flex justify-content-end">
                <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin membatalkan mata kuliah yang dipilih?');">Batalkan yang Dipilih</button>
            </div>
        </form>
    </div>
</div>

<!-- Form untuk mengambil mata kuliah baru -->
<div class="card">
    <div class="card-header">
        Mata Kuliah Tersedia
    </div>
    <div class="card-body">
        <form action="/mahasiswa/matakuliah/ambil" method="post">
             <?= csrf_field() ?>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th style="width: 5%;">#</th>
                            <th>Kode MK</th>
                            <th>Nama Mata Kuliah</th>
                            <th>SKS</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Contoh Data, nantinya dari controller -->
                        <tr>
                            <td>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="ambil_mk[]" value="IF102" id="ambil_IF102">
                                </div>
                            </td>
                            <td><label for="ambil_IF102">IF102</label></td>
                            <td><label for="ambil_IF102">Struktur Data</label></td>
                            <td>3</td>
                        </tr>
                        <tr>
                            <td>
                                 <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="ambil_mk[]" value="IF201" id="ambil_IF201">
                                </div>
                            </td>
                            <td><label for="ambil_IF201">IF201</label></td>
                            <td><label for="ambil_IF201">Basis Data</label></td>
                            <td>3</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="d-flex justify-content-end mt-3">
                 <button type="submit" class="btn btn-success">Ambil Mata Kuliah yang Dipilih</button>
            </div>
        </form>
    </div>
</div>

<?= $this->endSection() ?>

