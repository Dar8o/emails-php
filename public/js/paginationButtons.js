import { refresh } from "./refresh.js"

export default function paginationButtons() {
  document.addEventListener("click", (e) => {
    const $containerPagination = document.getElementById("container-pagination")

    $containerPagination.childNodes.forEach((button) => {
      if(e.target === button) {
        sessionStorage.setItem("page", button.textContent);

        refresh();
      }
    })
  })
}