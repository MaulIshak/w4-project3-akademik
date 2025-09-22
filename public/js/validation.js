// helper untuk set error
function setError(input, message) {
  input.classList.add("is-invalid");
  input.classList.remove("is-valid");

  if (input.id === "password") {
    input.nextElementSibling.nextElementSibling.textContent = message;
  } else {
    input.nextElementSibling.textContent = message;
  }
}

function clearError(input) {
  input.classList.remove("is-invalid");
  input.classList.add("is-valid");

  if (input.id === "password") {
    input.nextElementSibling.nextElementSibling.textContent = "";
  } else {
    input.nextElementSibling.textContent = "";
  }
}

// ambil input
const nim = document.getElementById("nim");
const namaLengkap = document.getElementById("nama_lengkap");
const username = document.getElementById("username");
const tahunMasuk = document.getElementById("tahun_masuk");
const password = document.getElementById("password");
const submitBtn = document.getElementById("btnSubmit");

function checkFormValidity() {
  const inputs = [nim, namaLengkap, username, tahunMasuk, password];
  let allValid = true;

  inputs.forEach((input) => {
    if (!input.classList.contains("is-valid")) {
      allValid = false;
    }
  });

  btnSubmit.disabled = !allValid;
}

// validasi nim
nim.addEventListener("input", () => {
  const val = nim.value.trim();
  if (val === "") {
    setError(nim, "NIM wajib diisi");
  } else if (!/^\d+$/.test(val)) {
    setError(nim, "NIM harus angka");
  } else if (val.length !== 9) {
    setError(nim, "NIM harus 9 digit");
  } else {
    clearError(nim);
    checkFormValidity();
  }
});
nim.addEventListener("change", checkFormValidity);

// validasi nama lengkap
namaLengkap.addEventListener("input", () => {
  const val = namaLengkap.value.trim();
  if (val === "") {
    setError(namaLengkap, "Nama wajib diisi");
  } else if (!/^[A-Za-z\s]+$/.test(val)) {
    setError(namaLengkap, "Nama hanya huruf dan spasi");
  } else if (val.length < 3) {
    setError(namaLengkap, "Nama minimal 3 karakter");
  } else {
    clearError(namaLengkap);
    checkFormValidity();
  }
});
namaLengkap.addEventListener("change", checkFormValidity);

// validasi username
username.addEventListener("input", () => {
  const val = username.value.trim();
  if (val === "") {
    setError(username, "Username wajib diisi");
  } else if (!/^[A-Za-z0-9]+$/.test(val)) {
    setError(username, "Username hanya huruf/angka");
  } else if (val.length < 5) {
    setError(username, "Username minimal 5 karakter");
  } else {
    clearError(username);
    checkFormValidity();
  }
});
username.addEventListener("change", checkFormValidity);

// validasi tahun masuk
tahunMasuk.addEventListener("input", () => {
  const val = tahunMasuk.value.trim();
  if (val === "") {
    setError(tahunMasuk, "Tahun masuk wajib diisi");
  } else if (!/^\d+$/.test(val)) {
    setError(tahunMasuk, "Tahun masuk harus angka");
  } else if (val.length !== 4) {
    setError(tahunMasuk, "Tahun masuk harus 4 digit");
  } else {
    clearError(tahunMasuk);
    checkFormValidity();
  }
});
tahunMasuk.addEventListener("change", checkFormValidity);

// validasi password
password.addEventListener("input", () => {
  const val = password.value.trim();
  if (val === "") {
    setError(password, "Password wajib diisi");
  } else if (val.length < 8) {
    setError(password, "Password minimal 8 karakter");
  } else {
    clearError(password);
    checkFormValidity();
  }
});
password.addEventListener("change", checkFormValidity);
