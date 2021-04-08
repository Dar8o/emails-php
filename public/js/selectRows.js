import { refresh } from "./refresh.js";

export default function selectRows() {
  const $select = document.getElementById("rows");

  $select.addEventListener("change", (e) => {
    sessionStorage.setItem("page", 1);
    sessionStorage.setItem("rows", $select.value);

    refresh();
  });
}
