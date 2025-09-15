<?= $this->extend('layout/mahasiswa_template') ?>

<?= $this->section('main-content') ?>

<h2 class="my-3 mb-1 fw-bold">Dashboard Mahasiswa</h2>
<h1>Selamat datang, <span class="text-success"><?= esc($mahasiswa['nama_lengkap']) ?></span>!</h1>
<p class="text-secondary my-3 pb-3">Ini adalah halaman dasbor Anda. Silakan pilih menu di atas untuk navigasi.</p>


  <div class="col-xl-4 col-md-6 mb-4">
      <div class="card shadow h-100 py-2 bg-primary">
          <div class="card-body">
              <div class="d-flex align-items-center">
                  <div class="col mr-2">
                      <div class="text-xs fw-bold text-white text-uppercase mb-1">
                          Mata Kuliah Diambil</div>
                      <div class="h5 mb-0 font-weight-bold text-white">
                       <table class="table table-borderless">
                            <tr >
                                <th class="bg-primary text-white">Jumlah Mata Kuliah:</th>
                                <td class="bg-primary text-white"><?= $jumlah_matkul ?></td>
                            </tr>
                            <tr>
                                <th class="bg-primary text-white">Jumlah SKS:</th>
                                <td class="bg-primary text-white"><?= $total_sks ?></td>
                            </tr>
                        </table>
                      </div>
                  </div>
                  <div class="col-auto">
                     <i class="bi bi-book-fill text-dark opacity-50 fs-1"></i>
                  </div>
              </div>
          </div>
        <div class="card-footer py-2">
            <a href="/mahasiswa/matakuliah" class="text-white">Lihat Selengkapnya &rightarrowtail; </a>
        </div>
      </div>
  </div>

<?= $this->endSection()?>
