// Buat alert untuk keberhasilan mengambil
function showAlert(response, succMsg, errMsg) {
  const main = document.querySelector("main");
  const alert = document.createElement("div");
  alert.classList.add("alert");
  if (response.ok) {
    alert.classList.add("alert-success");
    alert.innerText = succMsg;
  } else {
    alert.classList.add("alert-danger");
    alert.innerText = errMsg;
  }
  main.prepend(alert);
}
