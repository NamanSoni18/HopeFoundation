function resetButtons() {
  var buttons = document.querySelectorAll(".amount-btn");
  buttons.forEach(function (button) {
      button.style.color = "#ff7801";
      button.style.backgroundColor = "transparent";
  });
}

function btnclick(button, amount) {
  resetButtons();
  button.style.color = "whitesmoke";
  button.style.backgroundColor = "#ff7801";

  var hiddenInput = document.getElementById("otheramount");
  if (button.classList.contains("otheramount")) {
      hiddenInput.style.display = "inline-block";
      hiddenInput.value = "";
  } else {
      hiddenInput.style.display = "none";
      hiddenInput.value = amount; // Set the value of hiddenInput to the selected amount
  }
}

var buttons = document.querySelectorAll(".amount-btn");
buttons.forEach(function (button) {
  button.addEventListener("click", function () {
      var amount = button.getAttribute("data-amount");
      btnclick(button, amount);
  });
});