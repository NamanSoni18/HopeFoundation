function resetButtons() {
  var buttons = document.querySelectorAll(".amount-btn");
  buttons.forEach(function (button) {
    button.style.color = "#ff7801";
    button.style.backgroundColor = "transparent";
  });
}

function btnclick(button) {
  resetButtons();
  button.style.color = "whitesmoke";
  button.style.backgroundColor = "#ff7801";

  var hiddenInput = document.querySelector(".hidden-input");
  if (button.classList.contains("otheramount")) {
    hiddenInput.style.display = "inline-block";
  } else {
    hiddenInput.style.display = "none";
  }
}

var buttons = document.querySelectorAll(".amount-btn");
buttons.forEach(function (button) {
  button.addEventListener("click", function () {
    btnclick(button);
  });
});
