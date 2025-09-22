document.addEventListener("DOMContentLoaded", () => {
  const tableBody = document.getElementById("tbody-data");
  const keywordInput = document.getElementById("keyword");
  const tahunMasukSelect = document.getElementById("tahun_masuk");
  const pageTitle = document.title;

  // Helper fetcher
  async function fetchJSON(url) {
    const response = await fetch(url, {
      headers: { "X-Requested-With": "XMLHttpRequest" },
    });
    if (!response.ok) throw new Error(`Status: ${response.status}`);
    return response.json();
  }

  // Generic table renderer
  function renderTable(data, rowBuilder) {
    if (!data.length) {
      tableBody.innerHTML = `<tr><td colspan="5" class="text-center">Tidak ada data ditemukan</td></tr>`;
      return;
    }
    tableBody.innerHTML = data.map(rowBuilder).join("");
  }

  // Row builders
  const buildMahasiswaRow = (mhs, idx) => `
    <tr>
      <td>${idx + 1}</td>
      <td>${mhs.nim}</td>
      <td>${mhs.nama_lengkap}</td>
      <td>${mhs.tahun_masuk}</td>
      <td class="w-25">
        <div class="d-flex justify-content-evenly">
          <a href="/admin/mahasiswa/detail/${mhs.nim}" class="btn btn-primary btn-sm"><i class="bi bi-info-circle"></i> Detail</a>
          <a href="/admin/mahasiswa/edit/${mhs.nim}" class="btn btn-warning btn-sm"><i class="bi bi-pencil-square"></i> Edit</a>
          <form action="/admin/mahasiswa/delete/${mhs.nim}" method="post" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?');">
            <input type="hidden" name="_method" value="DELETE">
            <button type="submit" class="btn btn-danger btn-sm"><i class="bi bi-trash"></i> Delete</button>
          </form>
        </div>
      </td>
    </tr>`;

  const buildMatkulRow = (mk, idx) => `
    <tr>
      <td>${idx + 1}</td>
      <td>${mk.kode_mata_kuliah}</td>
      <td>${mk.nama_mata_kuliah}</td>
      <td>${mk.sks}</td>
      <td>
        <div class="d-flex justify-content-evenly">
          <a href="/admin/matakuliah/detail/${mk.kode_mata_kuliah}" class="btn btn-primary btn-sm"><i class="bi bi-info-circle"></i> Detail</a>
          <a href="/admin/matakuliah/edit/${mk.kode_mata_kuliah}" class="btn btn-warning btn-sm"><i class="bi bi-pencil-square"></i> Edit</a>
          <form action="/admin/matakuliah/delete/${mk.kode_mata_kuliah}" method="post" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?');">
            <input type="hidden" name="_method" value="DELETE">
            <button type="submit" class="btn btn-danger btn-sm"><i class="bi bi-trash"></i> Delete</button>
          </form>
        </div>
      </td>
    </tr>`;

  // Fetchers
  async function fetchMahasiswa() {
    const keyword = keywordInput.value;
    const tahun = tahunMasukSelect?.value || "";
    const url = `/admin/mahasiswa/search?keyword=${keyword}&tahun_masuk=${tahun}`;
    try {
      const data = await fetchJSON(url);
      renderTable(data, buildMahasiswaRow);
    } catch (e) {
      console.error(e);
    }
  }

  async function fetchMatkul() {
    const keyword = keywordInput.value;
    const url = `/admin/matakuliah/search?keyword=${keyword}`;
    try {
      const data = await fetchJSON(url);
      renderTable(data, buildMatkulRow);
    } catch (e) {
      console.error(e);
    }
  }

  // Initial load & listeners
  if (pageTitle === "Daftar Mahasiswa") {
    fetchMahasiswa();
    tahunMasukSelect?.addEventListener("change", fetchMahasiswa);
    keywordInput?.addEventListener("input", fetchMahasiswa);
  } else if (pageTitle === "Daftar Mata Kuliah") {
    fetchMatkul();
    keywordInput?.addEventListener("input", fetchMatkul);
  }
});
