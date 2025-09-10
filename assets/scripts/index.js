const tr = document.querySelectorAll("tr");
const seeMore = document.querySelector(".ver-mais");

let expanded = false;

function showTr() {
  for (let i = 0; i < tr.length; i++) {
    if (i === 0 || i <= 4) {
      tr[i].style.display = "";
    } else {
      tr[i].style.display = "none";
    }
  }
}

seeMore.addEventListener("click", () => {
  if (expanded) {
    showTr();
    seeMore.innerText = "ver mais";
  } else {
    for (let i = 0; i < tr.length; i++) {
      tr[i].style.display = "";
    }
    seeMore.innerText = "ver menos";
  }
  expanded = !expanded;
});

showTr();
