const hamburgerBtn = document.getElementById("hamburger");
const navMenu = document.querySelector(".menu");

function toggleHamburger() {
  navMenu.classList.toggle("show");
}

hamburgerBtn.addEventListener("click", toggleHamburger);