<?= $this->extend('layout/mahasiswa_template') ?>

<?= $this->section('main-content') ?>

<!-- Notifikasi -->
<?php if(session()->getFlashdata('success')): ?>
    <div class="alert alert-success" role="alert">
        <?= session()->getFlashdata('success') ?>
    </div>
<?php endif; ?>
<?php if(session()->getFlashdata('error')): ?>
    <div class="alert alert-danger" role="alert">
        <?= session()->getFlashdata('error') ?>
    </div>
<?php endif; ?>

<h2 class="my-3 mb-4 fw-bold">Ambil Mata Kuliah</h2>
<p class="text-secondary my-3 pb-3"> Pilih mata kuliah yang ingin Anda ambil atau batalkan.</p>
<!-- Form untuk membatalkan mata kuliah -->
<div class="card mb-4">
    <div class="card-header">
        Mata Kuliah yang Sudah Diambil
    </div>
    <div class="card-body">
        <form action="/mahasiswa/matakuliah/batal" method="post">
            <input type="hidden" name="_method" value="DELETE">
            <?= csrf_field() ?>
            <div class="table-responsive matkul-diambil">
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
                        <?php
                        if(isset($matkul_diambil) && !empty($matkul_diambil)):
                            foreach($matkul_diambil as $mk):
                        ?>
                        <tr>
                            <td>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="batal_mk[]" value="<?=$mk['kode_mata_kuliah']?>" id="diambil_<?=$mk['kode_mata_kuliah']?>">
                            </div>
                            </td>
                            <td><label for="diambil_<?=$mk['kode_mata_kuliah']?>"><?=$mk['kode_mata_kuliah']?></label></td>
                            <td><label for="diambil_<?=$mk['kode_mata_kuliah']?>"><?=$mk['nama_mata_kuliah']?></label></td>
                            <td><?=$mk['sks']?></td>
                        </tr>
                        <?php 
                                endforeach;
                            endif;
                        ?>
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
<div class="card matakuliah-tersedia">
    <div class="card-header">
        Mata Kuliah Tersedia
    </div>

    <div class="card-body">
        <p class="sks-terpilih">SKS Terpilih: 0</p>
        <form action="/mahasiswa/matakuliah/ambil" method="post">
             <?= csrf_field() ?>
            <div class="table-responsive matkul-tersedia">
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
                        <!--Mata Kuliah-->
                        <?php
                        if(isset($matkul_tersedia) && !empty($matkul_tersedia)):
                            foreach($matkul_tersedia as $mk):
                        ?>
                        <tr>
                            <td>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="ambil_mk[]" value="<?=$mk['kode_mata_kuliah']?>" id="<?=$mk['kode_mata_kuliah']?>">
                                </div>
                            </td>
                            <td><label for="<?=$mk['kode_mata_kuliah']?>"><?=$mk['kode_mata_kuliah']?></label></td>
                            <td><label for="<?=$mk['kode_mata_kuliah']?>"><?=$mk['nama_mata_kuliah']?></label></td>
                            <td><label class="sks" for="<?=$mk['kode_mata_kuliah']?>"><?=$mk['sks']?></label></td>
                        </tr>

                        <?php 
                                endforeach;
                            endif;
                        ?>
                    </tbody>
                </table>
            </div>
            <div class="d-flex justify-content-end mt-3">
                 <button type="submit" class="btn btn-success" id="ambil-button">Ambil Mata Kuliah yang Dipilih</button>
            </div>
        </form>
    </div>
</div>

<?= $this->endSection() ?>

