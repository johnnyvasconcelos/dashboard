const menuBtn = document.querySelector(".menu-btn");
const aside = document.querySelector("aside");
const main = document.querySelector("main");
const submenu = document.querySelectorAll(".submenu");
const menuToggle = document.querySelectorAll(".menu a");
menuBtn.addEventListener("click", function () {
  aside.classList.toggle("show-menu");
  main.classList.toggle("main-active");
});
for (let i = 0; i < menuToggle.length; i++) {
  menuToggle[i].addEventListener("click", function (ev) {
    ev.preventDefault();
    const sub = menuToggle[i].nextElementSibling;
    if (sub && sub.classList.contains("submenu")) {
      sub.classList.toggle("submenu-none");
    }
  });
}
