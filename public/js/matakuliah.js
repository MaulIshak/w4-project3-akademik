document.addEventListener("DOMContentLoaded", async () => {
  // Tampilan dinamis
  const tableMatkulTersedia = document.querySelector(".matkul-tersedia table tbody");
  const tableMatkulDiambil = document.querySelector(".matkul-diambil table tbody");

  try {
    // Ambil data mata kuliah
    const response = await fetch("/mahasiswa/matakuliah", {
      headers: { "X-Requested-With": "XMLHttpRequest" },
    });

    if (!response.ok) throw new Error(`Status: ${response.status} `);

    // Parsing response menjadi json
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
            <td><label class="kode-matkul" for="tersedia_${mk.kode_mata_kuliah}">${mk.kode_mata_kuliah}</label></td>
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

  // Ambil nim pengguna
  // const nim = document.getElementById("user-id").innerText;
  // Penampung matakuliah diambil
  let matkulDiambil = [];

  // track jumlah yang checked
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

  const ambilForm = document.getElementById("ambilForm");

  ambilForm.addEventListener("submit", async (e) => {
    e.preventDefault();
    totalSks = 0;
    ambilButton.disabled = true;
    sks.innerHTML = `SKS Terpilih: ${totalSks}`;
    // Ambil mata kuliah yang dicheck
    const checkedMatkul = document.querySelectorAll(`.matakuliah-tersedia input:checked`);
    const targetRows = [];
    const tableDiambil = document.querySelector(".matkul-diambil table tbody");
    checkedMatkul.forEach((ck) => {
      targetRows.push(ck.closest("tr"));
    });
    // Masukkan ke array
    checkedMatkul.forEach((mk) => {
      matkulDiambil.push({
        kode_mata_kuliah: mk.value,
      });
    });

    // Kirim ke url
    const response = await fetch("/mahasiswa/matakuliah/ambil", {
      method: "POST",
      headers: {
        "X-Requested-With": "XMLHttpRequest",
      },
      body: JSON.stringify(matkulDiambil),
    });

    showAlert(response, "Mata kuliah berhasil diambil", "Mata kuliah gagal diambil");
    // console.log(tableDiambil);
    targetRows.forEach((r) => {
      // Clone the row before appending
      const clonedRow = r.cloneNode(true);

      // Update the checkbox properties
      const oldCheckbox = clonedRow.querySelector('input[type="checkbox"]');
      const newId = oldCheckbox.id.replace("tersedia_", "diambil_");
      oldCheckbox.id = newId;
      oldCheckbox.name = "batal_mk[]";
      oldCheckbox.checked = false; // Uncheck the checkbox

      // Update related labels
      clonedRow.querySelectorAll("label").forEach((label) => {
        if (label.getAttribute("for")) {
          label.setAttribute("for", newId);
        }
      });

      // Append the cloned row
      tableDiambil.appendChild(clonedRow);

      // Remove original row
      r.remove();
    });

    // console.log(tableDiambil);
  });

  // ...existing code...

  // Add after the ambilForm event listener

  // Total checked for batal button
  let totalBatalChecked = 0;
  const batalButton = document.querySelector("button.btn-danger#batal-matakuliah");
  batalButton.disabled = true;

  // Handle batal checkboxes
  const checkboxesBatal = document.querySelectorAll('.matkul-diambil input[type="checkbox"]');
  checkboxesBatal.forEach((checkbox) => {
    checkbox.addEventListener("change", () => {
      if (checkbox.checked) {
        totalBatalChecked++;
      } else {
        totalBatalChecked--;
      }
      batalButton.disabled = totalBatalChecked <= 0;
    });
  });

  // Handle batal form submission
  // const batalForm = document.querySelector('form[action="/mahasiswa/matakuliah/batal"]');
  // batalForm.addEventListener("submit", async (e) => {
  //   e.preventDefault();

  //   // Get checked courses
  //   const checkedMatkul = document.querySelectorAll(".matkul-diambil input:checked");
  //   const targetRows = [];
  //   const tableTersedia = document.querySelector(".matkul-tersedia table tbody");

  //   // Get rows to move
  //   checkedMatkul.forEach((ck) => {
  //     targetRows.push(ck.closest("tr"));
  //   });

  //   // Create array of courses to cancel
  //   const matkulBatal = [];
  //   checkedMatkul.forEach((mk) => {
  //     matkulBatal.push({
  //       kode_mata_kuliah: mk.value,
  //     });
  //   });

  //   // Send request to server
  //   const response = await fetch("/mahasiswa/matakuliah/batal", {
  //     method: "DELETE",
  //     headers: {
  //       "X-Requested-With": "XMLHttpRequest",
  //     },
  //     body: JSON.stringify(matkulBatal),
  //   });

  //   showAlert(response, "Mata kuliah berhasil dibatalkan", "Mata kuliah gagal dibatalkan");

  //   // Move rows to available courses table
  //   targetRows.forEach((r) => {
  //     // Clone the row
  //     const clonedRow = r.cloneNode(true);

  //     // Update checkbox properties
  //     const oldCheckbox = clonedRow.querySelector('input[type="checkbox"]');
  //     const newId = oldCheckbox.id.replace("diambil_", "tersedia_");
  //     oldCheckbox.id = newId;
  //     oldCheckbox.name = "ambil_mk[]";
  //     oldCheckbox.checked = false;

  //     // Update labels
  //     clonedRow.querySelectorAll("label").forEach((label) => {
  //       if (label.getAttribute("for")) {
  //         label.setAttribute("for", newId);
  //       }
  //     });

  //     // Add sks class to SKS column label if not exists
  //     const sksCell = clonedRow.cells[3];
  //     if (!sksCell.querySelector(".sks")) {
  //       const sksText = sksCell.textContent;
  //       sksCell.innerHTML = `<label class="sks" for="${newId}">${sksText}</label>`;
  //     }

  //     // Append to available courses table
  //     tableTersedia.appendChild(clonedRow);

  //     // Remove from taken courses
  //     r.remove();
  //   });

  //   // Reset counter and disable button
  //   totalBatalChecked = 0;
  //   batalButton.disabled = true;
  // });

  // Add this after your existing code:

  // Handle batal mata kuliah confirmation
  const batalMkModal = new bootstrap.Modal(document.getElementById("batalMkModal"));
  const konfirmasiBatalMk = document.getElementById("konfirmasiBatalMk");

  // When confirmation button is clicked in modal
  konfirmasiBatalMk.addEventListener("click", async () => {
    const batalForm = document.querySelector('form[action="/mahasiswa/matakuliah/batal"]');

    // Get checked courses
    const checkedMatkul = document.querySelectorAll(".matkul-diambil input:checked");
    const targetRows = [];
    const tableTersedia = document.querySelector(".matkul-tersedia table tbody");

    // Get rows to move
    checkedMatkul.forEach((ck) => {
      targetRows.push(ck.closest("tr"));
    });

    // Create array of courses to cancel
    const matkulBatal = [];
    checkedMatkul.forEach((mk) => {
      matkulBatal.push({
        kode_mata_kuliah: mk.value,
      });
    });

    // Send request to server
    const response = await fetch("/mahasiswa/matakuliah/batal", {
      method: "DELETE",
      headers: {
        "X-Requested-With": "XMLHttpRequest",
      },
      body: JSON.stringify(matkulBatal),
    });

    showAlert(response, "Mata kuliah berhasil dibatalkan", "Mata kuliah gagal dibatalkan");

    // Move rows to available courses table
    targetRows.forEach((r) => {
      // Clone the row
      const clonedRow = r.cloneNode(true);

      // Update checkbox properties
      const oldCheckbox = clonedRow.querySelector('input[type="checkbox"]');
      const newId = oldCheckbox.id.replace("diambil_", "tersedia_");
      oldCheckbox.id = newId;
      oldCheckbox.name = "ambil_mk[]";
      oldCheckbox.checked = false;

      // Update labels
      clonedRow.querySelectorAll("label").forEach((label) => {
        if (label.getAttribute("for")) {
          label.setAttribute("for", newId);
        }
      });

      // Add sks class to SKS column label if not exists
      const sksCell = clonedRow.cells[3];
      if (!sksCell.querySelector(".sks")) {
        const sksText = sksCell.textContent;
        sksCell.innerHTML = `<label class="sks" for="${newId}">${sksText}</label>`;
      }

      // Append to available courses table
      tableTersedia.appendChild(clonedRow);

      // Remove from taken courses
      r.remove();
    });

    // Reset counter and disable button
    totalBatalChecked = 0;
    batalButton.disabled = true;

    // Hide modal
    batalMkModal.hide();
  });

  // Remove the old form submit event listener for batal
  const batalForm = document.querySelector('form[action="/mahasiswa/matakuliah/batal"]');
  batalForm.removeEventListener("submit", batalForm.onsubmit);
});
