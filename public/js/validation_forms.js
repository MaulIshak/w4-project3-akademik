// Helper functions from your existing validation.js
function setError(input, message) {
  input.classList.add("is-invalid");
  input.classList.remove("is-valid");

  if (input.type === "password") {
    input.nextElementSibling.nextElementSibling.textContent = message;
  } else {
    input.nextElementSibling.textContent = message;
  }
}

function clearError(input) {
  input.classList.remove("is-invalid");
  input.classList.add("is-valid");

  if (input.type === "password") {
    input.nextElementSibling.nextElementSibling.textContent = "";
  } else {
    input.nextElementSibling.textContent = "";
  }
}

function checkFormValidity(inputs, submitBtn) {
  let allValid = true;
  inputs.forEach((input) => {
    if (!input.classList.contains("is-valid")) {
      allValid = false;
    }
  });
  submitBtn.disabled = !allValid;
}

// Login Form Validation
if (document.getElementById("loginForm")) {
  const username = document.getElementById("username");
  const password = document.getElementById("password");
  const loginBtn = document.querySelector("button[type='submit']");
  const inputs = [username, password];
  loginBtn.disabled = true;

  username.addEventListener("input", () => {
    const val = username.value.trim();
    if (val === "") {
      setError(username, "Username wajib diisi");
    } else if (val.length < 5) {
      setError(username, "Username minimal 5 karakter");
    } else {
      clearError(username);
    }
    checkFormValidity(inputs, loginBtn);
  });

  password.addEventListener("input", () => {
    const val = password.value.trim();
    if (val === "") {
      setError(password, "Password wajib diisi");
    } else if (val.length < 8) {
      setError(password, "Password minimal 8 karakter");
    } else {
      clearError(password);
    }
    checkFormValidity(inputs, loginBtn);
  });
}

// Create Mata Kuliah Validation
if (document.getElementById("createMatkulForm")) {
  const kodeMk = document.getElementById("kode_mata_kuliah");
  const namaMk = document.getElementById("nama_mata_kuliah");
  const sks = document.getElementById("sks");
  const submitBtn = document.querySelector("button[type='submit']#simpan");
  const inputs = [kodeMk, namaMk, sks];
  submitBtn.disabled = true;

  kodeMk.addEventListener("input", () => {
    const val = kodeMk.value.trim();
    if (val === "") {
      setError(kodeMk, "Kode mata kuliah wajib diisi");
    } else if (!/^[A-Z0-9]{5,10}$/.test(val)) {
      setError(kodeMk, "Kode MK harus 5-10 karakter (huruf kapital dan angka)");
    } else {
      clearError(kodeMk);
    }
    checkFormValidity(inputs, submitBtn);
  });

  namaMk.addEventListener("input", () => {
    const val = namaMk.value.trim();
    if (val === "") {
      setError(namaMk, "Nama mata kuliah wajib diisi");
    } else if (val.length < 3) {
      setError(namaMk, "Nama mata kuliah minimal 3 karakter");
    } else {
      clearError(namaMk);
    }
    checkFormValidity(inputs, submitBtn);
  });

  sks.addEventListener("input", () => {
    const val = sks.value.trim();
    if (val === "") {
      setError(sks, "SKS wajib diisi");
    } else if (!/^\d+$/.test(val) || parseInt(val) < 1) {
      setError(sks, "SKS harus berupa angka positif");
    } else {
      clearError(sks);
    }
    checkFormValidity(inputs, submitBtn);
  });
}

// Password Reset Validation
if (document.getElementById("passwordResetForm")) {
  const currentPassword = document.getElementById("current_password");
  const newPassword = document.getElementById("new_password");
  const confirmPassword = document.getElementById("confirm_password");
  const submitBtn = document.querySelector("button[type='submit']#simpan");
  const inputs = [currentPassword, newPassword, confirmPassword];
  submitBtn.disabled = true;

  currentPassword.addEventListener("input", () => {
    const val = currentPassword.value.trim();
    if (val === "") {
      setError(currentPassword, "Password saat ini wajib diisi");
    } else if (val.length < 8) {
      setError(currentPassword, "Password minimal 8 karakter");
    } else {
      clearError(currentPassword);
    }
    checkFormValidity(inputs, submitBtn);
  });

  newPassword.addEventListener("input", () => {
    const val = newPassword.value.trim();
    if (val === "") {
      setError(newPassword, "Password baru wajib diisi");
    } else if (val.length < 8) {
      setError(newPassword, "Password minimal 8 karakter");
    } else {
      clearError(newPassword);
      // Recheck confirm password
      const confirmVal = confirmPassword.value.trim();
      if (confirmVal !== "") {
        if (confirmVal !== val) {
          setError(confirmPassword, "Password tidak sama");
        } else {
          clearError(confirmPassword);
        }
      }
    }
    checkFormValidity(inputs, submitBtn);
  });

  confirmPassword.addEventListener("input", () => {
    const val = confirmPassword.value.trim();
    const newVal = newPassword.value.trim();
    if (val === "") {
      setError(confirmPassword, "Konfirmasi password wajib diisi");
    } else if (val !== newVal) {
      setError(confirmPassword, "Password tidak sama");
    } else {
      clearError(confirmPassword);
    }
    checkFormValidity(inputs, submitBtn);
  });
}
