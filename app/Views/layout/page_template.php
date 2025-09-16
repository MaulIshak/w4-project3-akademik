<?= $this->extend('layout/base_template') ?>
<?= $this->section('content') ?>

<!-- Header background + logo polban -->
<header class="hero-section">
  <div class="text-white d-flex align-items-center justify-content-center gap-4">
    <img src="<?=base_url('img/logo-polban.png')?>" class="img-fluid" style="max-width:75px;" alt="logo polban">
    <h2 class="fw-bold fs-1"><span class="text-polban-primary">SiAkad</span><span class="text-polban-secondary">Polban</span></h2>
  </div>
</header>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg bg-polban-primary" data-bs-theme="dark">
  <div class="container-fluid"> 
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link <?= $title=='Dashboard Admin' ? 'active' : '' ?>" aria-current="page" href="/admin/dashboard">Dashboard</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?= $title=='Daftar Mahasiswa' ? 'active' : '' ?>" href="/admin/mahasiswa">Mahasiswa</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?= $title=='Daftar Mata Kuliah' ? 'active' : '' ?>" href="/admin/matakuliah">Mata Kuliah</a>
        </li>
      </ul>
      <form action="/auth/logout" method="post" onsubmit="return confirm('Anda yakin ingin logout?');">
          <
        <button class="btn btn-danger">Logout</button>
      </form>
    </div>
  </div>
</nav>
  <main class="p-3 min-h-vh">
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
    <?= $this->renderSection('main-content')?>
  </main>

  <footer class="bg-dark text-center p-3 text-light">
    &copy; Polban <?= date('Y') ?>
  </footer>


<?= $this->endsection() ?>
