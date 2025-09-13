<?= $this->extend('layout/base_template') ?>
<?= $this->section('content') ?>

<!-- Header background + logo polban -->
<header class="hero-section">
  <div class="text-white d-flex align-items-center justify-content-center gap-4">
    <img src="<?=base_url('img/logo-polban.png')?>" class="img-fluid" style="max-width:75px;" alt="logo polban">
    <h2 class="fw-bold fs-1"><span class="text-polban-primary">Akademik</span><span class="text-polban-secondary">Polban</span></h2>
  </div>
</header>

<!-- Mavbar -->
<nav class="navbar navbar-expand-lg bg-polban-primary" data-bs-theme="dark">
  <div class="container-fluid"> 
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="/admin/dashboard">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/admin/mahasiswa">Mahasiswa</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Mata Kuliah</a>
        </li>
        <!-- <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Dropdown
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        </li> -->
      </ul>
        <button class="btn btn-danger">Logout</button>
    </div>
  </div>
</nav>

  <main class="p-3 min-h-vh">
    <?= $this->renderSection('main-content')?>
  </main>

  <footer class="bg-dark text-center p-2 text-light">
    
    &copy; Polban 2025

  </footer>


<?= $this->endsection() ?>