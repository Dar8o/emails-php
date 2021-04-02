export default function refresh() {
  const $buttonRefresh = document.getElementById("button-refresh");

  $buttonRefresh.addEventListener("click", () => {
    window.location.href = "/"
  })
}