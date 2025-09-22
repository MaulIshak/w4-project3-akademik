document.addEventListener("DOMContentLoaded", () => {
  const tableBody = document.getElementById("tbody-data");
  const keywordInput = document.getElementById("keyword");
  const tahunMasukSelect = document.getElementById("tahun_masuk_filter");
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
          <form data-nama="${mhs.nama_lengkap}" data-nim="${mhs.nim}" action="/admin/mahasiswa/delete/${mhs.nim}" method="post">
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
          <form data-nama="${mk.nama_mata_kuliah}" action="/admin/matakuliah/delete/${mk.kode_mata_kuliah}" method="post">
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

  const deleteConfirmModal = new bootstrap.Modal(document.getElementById("deleteConfirmModal"));
  const deleteForm = document.getElementById("deleteForm");
  const deleteModalBody = document.getElementById("deleteModalBody");
  const deleteButton = document.getElementById("deleteButtonModal");

  // Menambahkan event listener ke semua form yang memiliki action delete
  document.body.addEventListener("submit", async function (e) {
    if (e.target && e.target.matches('form[action*="/delete"]') && e.target.id !== "deleteForm") {
      e.preventDefault(); // Mencegah form submit secara langsung
      deleteButton.disabled = true;
      const form = e.target;
      const nama = form.dataset.nama || "data ini";
      const info = "Data yang dihapus tidak dapat dikembalikan";
      // Menyiapkan modal dengan informasi yang relevan
      deleteModalBody.innerHTML = `Apakah Anda yakin ingin menghapus <strong>${nama}</strong>?<br><small class="text-muted">${info}</small>`;
      deleteForm.action = form.action;
      deleteForm.dataset.targetRowSelector = `form[action='${form.getAttribute("action")}']`;
      deleteConfirmModal.show();

      // Simpan teks asli
      const originalText = deleteButton.textContent;
      deleteButton.textContent = `${originalText} (menunggu 3 detik...)`;

      // Setelah 3 detik, enable kembali
      deleteButton.textContent = `${originalText} (3)`;
      setTimeout(() => {
        deleteButton.textContent = `${originalText} (2)`;
        setTimeout(() => {
          deleteButton.textContent = `${originalText} (1)`;
          setTimeout(() => {
            deleteButton.disabled = false;
            deleteButton.textContent = originalText;
          }, 1000);
        }, 1000);
      }, 1000);
      
    }
  });

  // Event submit pada form konfirmasi
  deleteForm.addEventListener("submit", async function (e) {
    e.preventDefault(); // cegah reload halaman

    const url = deleteForm.action;
    const targetRow = document.querySelector(deleteForm.dataset.targetRowSelector)?.closest("tr");
    try {
      const response = await fetch(url, {
        method: "DELETE",
        headers: {
          "Content-Type": "application/json",
          "X-Requested-With": "XMLHttpRequest",
          "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]')?.content || "",
        },
      });

      if (!response.ok) {
        throw new Error(`Gagal delete: ${response.status}`);
      }

      // Tutup modal
      deleteConfirmModal.hide();

      // Bisa hapus elemen row dari tabel
      // const deletedRow = document.querySelector(`form[action="${url}"]`)?.closest("tr");
      if (targetRow) targetRow.remove();

      // Atau tampilkan notifikasi
      console.log("Delete berhasil");
    } catch (err) {
      console.error("Error delete:", err);
      alert("Terjadi kesalahan saat menghapus data.");
    }
  });
});
