import { refresh } from "./refresh.js"

export default function selectRows() {
  const $select = document.getElementById("rows"),
        $buttonSelect = document.getElementById("button-select");

  document.addEventListener("click", (e) => {
    if(e.target === $buttonSelect) {
      e.preventDefault();

      sessionStorage.setItem("page", 1);
      sessionStorage.setItem("rows", $select.value)

      refresh();
    }
  })
}