import getEmailsApi from "./getEmailsApi.js"; 

export default function refresh() {
  const $buttonRefresh = document.getElementById("button-refresh");
        

  document.addEventListener("click", (e) => {
    if(e.target === $buttonRefresh) { 
      e.preventDefault();
      
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
      }, 1000)
    }
  })
}