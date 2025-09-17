const tr = document.querySelectorAll("tbody tr");
const seeMore = document.querySelector(".ver-mais");

let expanded = false;

function showTr() {
  for (let i = 0; i < tr.length; i++) {
    if (i === 0 || i <= 4) {
      tr[i].classList.remove("collapsed");
    } else {
      tr[i].classList.add("collapsed");
    }
  }
}

seeMore.addEventListener("click", () => {
  if (expanded) {
    showTr();
    seeMore.innerText = "ver mais";
  } else {
    for (let i = 0; i < tr.length; i++) {
      tr[i].classList.remove("collapsed");
    }
    seeMore.innerText = "ver menos";
  }
  expanded = !expanded;
});

showTr();
