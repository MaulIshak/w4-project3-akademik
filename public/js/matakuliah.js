document.addEventListener("DOMContentLoaded", () => {
  let totalSks = 0;
  const checkboxes = document.querySelectorAll('.matkul-tersedia input[type="checkbox"]');
  const sks = document.querySelector(".matakuliah-tersedia .sks-terpilih");

  console.log(checkboxes);
  checkboxes.forEach((checkbox) => {
    checkbox.addEventListener("change", () => {
      const checkedSks = parseInt(document.querySelector(`label[for="${checkbox.id}"].sks`).innerText);
      if (checkbox.checked) {
        totalSks += checkedSks;
      } else {
        totalSks -= checkedSks;
      }
      sks.innerHTML = `SKS Terpilih: ${totalSks}`;
    });
  });
});
