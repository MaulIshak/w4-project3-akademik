<?= $this->extend('layout/mahasiswa_template') ?>

<?= $this->section('main-content') ?>

<?php
// d($matkul_tersedia);
// dd($matkul_diambil);
?>

<h2 class="my-3 mb-4 fw-bold">Ambil Mata Kuliah</h2>

<!-- Form untuk membatalkan mata kuliah -->
<div class="card mb-4">
    <div class="card-header">
        Mata Kuliah yang Sudah Diambil
    </div>
    <div class="card-body">
        <form action="/mahasiswa/matakuliah/batal" method="post">
            <input type="hidden" name="_method" value="DELETE">
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
                            <td><?=$mk['sks']?></td>
                        </tr>

                        <?php 
                                endforeach;
                            endif;
                        ?>
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

