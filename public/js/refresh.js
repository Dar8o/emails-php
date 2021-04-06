export default function refresh() {
  const $buttonRefresh = document.getElementById("button-refresh");

  document.addEventListener("click", (e) => {
    if(e.target === $buttonRefresh) { 
      e.preventDefault();

      if(!window.location.search){
        window.location.href = '/';
      } else{ 
        let search = window.location.search,
        searchSplit= search.split('='),
        index = searchSplit.length - 1,
        numberRow = searchSplit[index];
        
        window.location.href = `/?rows=${numberRow}`;
      }
    }
  })
}