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
    console.log(toggle);
    toggle.addEventListener("click", function () {
      const targetId = this.getAttribute("data-target");
      togglePasswordVisibility(targetId);
    });
  });
});
