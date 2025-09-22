document.addEventListener("DOMContentLoaded", async () => {
  // Tampilan dinamis
  const tableMatkulTersedia = document.querySelector(".matkul-tersedia table tbody");
  const tableMatkulDiambil = document.querySelector(".matkul-diambil table tbody");

  try {
    const response = await fetch("/mahasiswa/matakuliah", {
      headers: { "X-Requested-With": "XMLHttpRequest" },
    });

    if (!response.ok) throw new Error(`Status: ${response.status} `);

    const data = await response.json();
    const mkTersedia = data.matkul_tersedia;
    const mkDiambil = data.matkul_diambil;
    let html = "";
    if (mkTersedia.length > 0) {
      mkTersedia.forEach((mk) => {
        html += `
        <tr>
            <td>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="ambil_mk[]" value="${mk.kode_mata_kuliah}" id="tersedia_${mk.kode_mata_kuliah}">
            </div>
            </td>
            <td><label for="tersedia_${mk.kode_mata_kuliah}">${mk.kode_mata_kuliah}</label></td>
            <td><label for="tersedia_${mk.kode_mata_kuliah}">${mk.nama_mata_kuliah}</label></td>
            <td ><label class="sks" for="tersedia_${mk.kode_mata_kuliah}">${mk.sks}</label></td>
        </tr>`;
      });
    } else {
      html = '<tr><td colspan="5" class="text-center">Tidak ada data ditemukan</td></tr>';
    }
    tableMatkulTersedia.innerHTML = html;

    html = "";
    if (mkDiambil.length > 0) {
      mkDiambil.forEach((mk) => {
        html += `
        <tr>
            <td>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="batal_mk[]" value="${mk.kode_mata_kuliah}" id="diambil_${mk.kode_mata_kuliah}">
            </div>
            </td>
            <td><label for="diambil_${mk.kode_mata_kuliah}">${mk.kode_mata_kuliah}</label></td>
            <td><label for="diambil_${mk.kode_mata_kuliah}">${mk.nama_mata_kuliah}</label></td>
            <td >${mk.sks}</td>
        </tr>`;
      });
    } else {
      html = '<tr><td colspan="5" class="text-center">Tidak ada data ditemukan</td></tr>';
    }

    tableMatkulDiambil.innerHTML = html;
  } catch (error) {}

  // Total SKS dinamis
  let totalSks = 0;
  const checkboxes = document.querySelectorAll('.matkul-tersedia input[type="checkbox"]');
  const sks = document.querySelector(".matakuliah-tersedia .sks-terpilih");

  // Tombol ambil
  const ambilButton = document.getElementById("ambil-button");
  ambilButton.disabled = true;
  // console.log(checkboxes);

  let totalChecked = 0;
  checkboxes.forEach((checkbox) => {
    checkbox.addEventListener("change", () => {
      const checkedSks = parseInt(document.querySelector(`label[for="${checkbox.id}"].sks`).innerText);
      if (checkbox.checked) {
        totalSks += checkedSks;
        totalChecked++;
      } else {
        totalSks -= checkedSks;
        totalChecked--;
      }
      // console.log(totalChecked);
      ambilButton.disabled = totalChecked <= 0;

      sks.innerHTML = `SKS Terpilih: ${totalSks}`;
    });
  });
});
