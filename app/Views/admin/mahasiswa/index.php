<?= $this->extend('layout/page_template'); ?>
<?= $this->section('main-content'); ?>

<h2 class=" my-3 mb-4 fw-bold">Daftar Mahasiswa</h2>
<p class="text-secondary my-3 pb-3"> Berikut adalah daftar mahasiswa yang terdaftar dalam sistem.</p>
<div class="d-flex my-3 row">

  <div class="row col-auto">
    <!-- Search Form -->
    <form action="" class="row col-auto">
        <div class="input-group">
            <input type="text" name="keyword" id="keyword" placeholder="Cari..." class="form-control col-3">
              <select name="tahun_masuk" id="tahun_masuk" class="form-select col-1">
               <option value="">Semua Tahun</option>
                <?php foreach($tahun_masuk_options as $tahun): ?>
                    <option value="<?= $tahun['tahun_masuk'] ?>" <?= ($selected_tahun ?? '') == $tahun['tahun_masuk'] ? 'selected' : '' ?>>
                        <?= $tahun['tahun_masuk'] ?>
                    </option>
                <?php endforeach; ?>
            </select>
            <button type="submit" class="btn btn-primary">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0"/>
              </svg>
            </button>
        </div>


        
       </form>
    </div>
    
    <div class="col-auto ms-auto">
          <a href="/admin/mahasiswa/create" class="btn btn-success">+ Tambah Mahasiswa</a>
      </div>
  <div>

  </div>
</div>
  <table class="table table-bordered table-striped">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">NIM</th>
        <th scope="col">Nama Lengkap</th>
        <th scope="col">Tahun Masuk</th>
        <th scope="col w-25">Aksi</th>
      </tr>
   </thead>
    <tbody id="tbody-data">
      <!-- <?php
        if(isset($mahasiswa)): 
          if(!empty($mahasiswa)):
            $count = 1;
            foreach($mahasiswa as $mhs):
      ?>
        <tr>
          <td><?=$count++?></td>
          <td><?=$mhs['nim']?></td>
          <td><?=$mhs['nama_lengkap']?></td>
          <td><?=$mhs['tahun_masuk']?></td>
          <td class="w-25">
            <div class="d-flex justify-content-evenly">
              <a href="/admin/mahasiswa/detail/<?=$mhs['nim']?>" class="btn btn-primary btn-sm">
                <i class="bi bi-info-circle"></i> Detail</a>
              <a href="/admin/mahasiswa/edit/<?=$mhs['nim']?>" class="btn btn-warning btn-sm">
                <i class="bi bi-pencil-square"></i> Edit</a>

                <form action="/admin/mahasiswa/delete/<?= $mhs['nim'] ?>" method="post" onsubmit="return confirm('Apakah Anda yakin ingin mengirim data ini?');" >
                  <input type="hidden" name="_method" value="DELETE">
                  <button type="submit"  class="btn btn-danger btn-sm">
                    <i class="bi bi-trash"></i> Delete
                  </button>
                </form>
            </div>
          </td>
        </tr>
      <?php
            endforeach;
          endif; 
        endif;
        ?> -->
  </tbody>
  </table>

<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahMahasiswa">
  Tambah Mahasiswa
</button>

<!-- Modal -->
<div class="modal fade" id="tambahMahasiswa" tabindex="-1" aria-labelledby="tambahMahasiswaLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="tambahMahasiswaLabel">Tambah Mahasiswa Baru</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="<?= route_to('admin.mahasiswa.store') ?>" method="post">
            <div class="mb-3">
                <label for="nim" class="form-label">NIM</label>
                <input type="text" class="form-control " id="nim" name="nim" value="<?= old('nim') ?>" required>
            </div>
             <div class="mb-3">
                <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
                <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap"  required>
            </div>
             <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control " id="username" name="username"  required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password Default</label>
                <div class="input-group">
                    <input type="password" class="form-control" id="password" name="password" required>
                    <span class="input-group-text toggle-password" style="cursor: pointer;" data-target="password">
                        <i class="bi bi-eye-slash"></i>
                    </span>
                </div>
            </div>
            <div class="mb-3">
                <label for="tahun_masuk" class="form-label">Tahun Masuk</label>
                <input type="number" class="form-control" id="tahun_masuk" name="tahun_masuk" min="2000" max="2100" required>

            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-primary">Simpan</button>
          </div>
        </form>
    </div>
  </div>
</div>

<?= $this->endSection(); ?>