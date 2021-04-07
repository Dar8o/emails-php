import getEmailsApi from "./getEmailsApi.js";

export function refresh() {
  let $main = document.getElementById("main"),
    $tbody = document.getElementById("tbody"),
    $table = document.getElementById("table"),
    $containerPagination = document.getElementById("container-pagination"),
    $loadedBox = document.querySelector(".loaded-box"),
    $newTbody = document.createElement("tbody"),
    $newContainerPagination = document.createElement("div");

  $table.removeChild($tbody);
  $main.removeChild($containerPagination);

  $loadedBox.style.display = "flex";

  $newTbody.setAttribute("id", "tbody");
  $newContainerPagination.setAttribute("id", "container-pagination");
  $newContainerPagination.classList.add("container-pagination");

  const loaded = setTimeout(() => {
    $loadedBox.style.display = "none";
    $table.appendChild($newTbody);
    $main.insertAdjacentElement("beforeend", $newContainerPagination);

    getEmailsApi();
  }, 700);
}

export function selectRefresh() {
  const $buttonRefresh = document.getElementById("button-refresh");

  document.addEventListener("click", (e) => {
    if(e.target === $buttonRefresh) {
      sessionStorage.setItem("page", 1);

      refresh();
    }
  });
}
