function togglePasswordVisibility(inputId) {
  const passwordInput = document.getElementById(inputId);
  const icon = passwordInput.nextElementSibling.querySelector("i");
  if (passwordInput.type === "password") {
    passwordInput.type = "text";
    icon.classList.remove("bi-eye-slash");
    icon.classList.add("bi-eye");
  } else {
    passwordInput.type = "password";
    icon.classList.remove("bi-eye");
    icon.classList.add("bi-eye-slash");
  }
}

document.addEventListener("DOMContentLoaded", function () {
  const passwordToggles = document.querySelectorAll(".toggle-password");
  passwordToggles.forEach((toggle) => {
    toggle.addEventListener("click", function () {
      const targetId = this.getAttribute("data-target");
      togglePasswordVisibility(targetId);
    });
  });
});

document.addEventListener("DOMContentLoaded", function () {
  const keywordInput = document.getElementById("keyword");
  const tahunMasukSelect = document.getElementById("tahun_masuk");

  const tableBody = document.getElementById("tbody-data");

  function fetchData() {
    const keyword = keywordInput.value;

    if (document.getElementsByTagName("title")[0].innerText == "Daftar Mahasiswa") {
      const tahunMasuk = tahunMasukSelect.value;
      const urlMhs = `/admin/mahasiswa/search?keyword=${keyword}&tahun_masuk=${tahunMasuk}`;
      fetch(urlMhs)
        .then((response) => response.json())
        .then((data) => {
          let html = "";
          let count = 1;
          if (data.length > 0) {
            data.forEach((mhs) => {
              html += `
              <tr>
                  <td>${count++}</td>
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
            });
          } else {
            html = '<tr><td colspan="5" class="text-center">Tidak ada data ditemukan</td></tr>';
          }
          tableBody.innerHTML = html;
        });
    } else if (document.getElementsByTagName("title")[0].innerText == "Daftar Mata Kuliah") {
      const urlMk = `/admin/matakuliah/search?keyword=${keyword}`;

      fetch(urlMk)
        .then((response) => response.json())
        .then((data) => {
          let html = "";
          let count = 1;
          if (data.length > 0) {
            data.forEach((mk) => {
              html += `
                <tr>
                    <td>${count++}</td>
                    <td>${mk.kode_mata_kuliah}</td>
                    <td>${mk.nama_mata_kuliah}</td>
                    <td>${mk.sks}</td>
                    <td>
                      <div class="d-flex justify-content-evenly">
                          <a href="/admin/matakuliah/detail/${mk.kode_mata_kuliah}" class="btn btn-primary btn-sm">
                           <i class="bi bi-info-circle"></i> Detail
                          </a>
                          <a href="/admin/matakuliah/edit/${mk.kode_mata_kuliah}" class="btn btn-warning btn-sm">
                            <i class="bi bi-pencil-square"></i> Edit
                          </a>

                            <form action="/admin/matakuliah/delete/${mk.kode_mata_kuliah}" method="post" onsubmit="return confirm('Apakah Anda yakin ingin mengirim data ini?');" >
                            <input type="hidden" name="_method" value="DELETE">
                            <button type="submit"  class="btn btn-danger btn-sm">
                              <i class="bi bi-trash"></i> Delete
                            </button>
                            </form>
                      </div>
                    </td>
                </tr>`;
            });
          } else {
            html = '<tr><td colspan="5" class="text-center">Tidak ada data ditemukan</td></tr>';
          }
          tableBody.innerHTML = html;
        })
        .catch((error) => {
          console.log(error);
        });
    }
  }
  keywordInput.addEventListener("input", fetchData);
  if (document.getElementsByTagName("title")[0].innerText == "Daftar Mahasiswa") {
    tahunMasukSelect.addEventListener("change", fetchData);
  }
});
