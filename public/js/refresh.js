export default function refresh() {
  const $buttonRefresh = document.getElementById("button-refresh");

  document.addEventListener("click", (e) => {
    if(e.target === $buttonRefresh) { 
      e.preventDefault();
      
      let search = window.location.search;
      window.location.href = `/${search}`;
    }
  })
}