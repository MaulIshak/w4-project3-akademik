<?= $this->extend('layout/page_template'); ?>
<?= $this->section('main-content'); ?>

<h2 class="mb-3">List Mahasiswa</h2>
  <table class="table table-bordered table-striped">
    <thead>
      <tr>
        <th scope="col">NIM</th>
        <th scope="col">Nama Lengkap</th>
        <th scope="col">Tahun Masuk</th>
        <th scope="col">Aksi</th>
      </tr>
   </thead>
    <tbody>
    <tr>
      <th scope="row">1</th>
      <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>Jacob</td>
      <td>Thornton</td>
      <td>@fat</td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td>John</td>
      <td>Doe</td>
      <td>@social</td>
    </tr>
  </tbody>
  </table>

<?= $this->endSection(); ?>