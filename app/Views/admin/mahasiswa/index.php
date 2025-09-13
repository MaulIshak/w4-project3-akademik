<?= $this->extend('layout/page_template'); ?>
<?= $this->section('main-content'); ?>

<h2 class=" my-3 mb-4 fw-bold">Daftar Mahasiswa</h2>
<div class="d-flex my-3 row">

  <div class="row col-auto">
    <!-- Search Form -->
    <form action="" class="row col-auto">
        <div class="input-group">
            <input type="text" name="keyword" id="keyword" placeholder="Cari..." class="form-control">
            <button type="submit" class="btn btn-primary">Cari</button>
        </div>
       </form>
      <!-- Filter Form -->
      <form action="" class="row col-auto" >
        <div class="col-auto input-group">
          <select class="form-select" aria-label="Filter Tahun Masuk">
            <option selected>-- Pilih Tahun Masuk--</option>
            <option value="2023">2024</option>
            <option value="2024">2025</option>
            <option value="2025">2025</option>
          </select>
          <button type="submit" class="btn btn-primary">Filter</button>
        </div>
      </form>
    </div>
    
    <div class="col-auto ms-auto">
          <a href="" class="btn btn-success">+ Tambah Mahasiswa</a>
      </div>
  <div>

  </div>
</div>
  <table class="table table-bordered table-striped">
    <thead>
      <tr>
        <th scope="col">NIM</th>
        <th scope="col">Nama Lengkap</th>
        <th scope="col">Tahun Masuk</th>
        <th scope="col w-25">Aksi</th>
      </tr>
   </thead>
    <tbody>
      <?php
        if(isset($mahasiswa)): 
          if(!empty($mahasiswa)):
            foreach($mahasiswa as $mhs):
      ?>
        <tr>
          <td><?=$mhs['nim']?></td>
          <td><?=$mhs['nama_lengkap']?></td>
          <td><?=$mhs['tahun_masuk']?></td>
          <td class="w-25">
            <div class="d-flex justify-content-evenly">
              <a href="" class="btn btn-primary btn-sm">
                <!-- Bootstrap Detail Icon -->
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-circle" viewBox="0 0 16 16">
                  <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/>
                  <path d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0"/>
                </svg> Detail</a>
              <a href="" class="btn btn-warning btn-sm">
                <!-- Bootstrap Edit Icon -->
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                  <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                  <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
                </svg> Edit</a>
              <a href="" class="btn btn-danger btn-sm">
                <!-- Bootstrap Delete Icon -->
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                  <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/>
                  <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/>
                </svg> Delete</a>
            </div>
          </td>
        </tr>
      <?php
            endforeach;
          endif; 
        endif;
        ?>
  </tbody>
  </table>

<?= $this->endSection(); ?>