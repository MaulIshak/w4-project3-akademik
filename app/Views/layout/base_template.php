<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <link rel="stylesheet" href="<?=base_url('style/style.css')?>">
  <title><?=$title?></title>
</head>
<body class="bg-secondary">
  <div class="container bg-light p-0">
    <?= $this->renderSection('content'); ?>
  </div>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>

    <script>
    function togglePasswordVisibility(inputId) {
      const passwordInput = document.getElementById(inputId);
      const icon = passwordInput.nextElementSibling.querySelector('i');
      if (passwordInput.type === "password") {
        passwordInput.type = "text";
        icon.classList.remove('bi-eye-slash');
        icon.classList.add('bi-eye');
      } else {
        passwordInput.type = "password";
        icon.classList.remove('bi-eye');
        icon.classList.add('bi-eye-slash');
      }
    }

    document.addEventListener('DOMContentLoaded', function() {
      const passwordToggles = document.querySelectorAll('.toggle-password');
      passwordToggles.forEach(toggle => {
        toggle.addEventListener('click', function() {
          const targetId = this.getAttribute('data-target');
          togglePasswordVisibility(targetId);
        });
      });
    });
   </script>
</body>
</html>