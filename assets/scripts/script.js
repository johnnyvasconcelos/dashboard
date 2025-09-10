const menuBtn = document.querySelector(".menu-btn");
const aside = document.querySelector("aside");
const main = document.querySelector("main");
menuBtn.addEventListener("click", function () {
  aside.classList.toggle("show-menu");
  main.classList.toggle("main-active");
});
