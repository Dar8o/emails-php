export default function getEmailsApi() {
  const $tbody = document.getElementById("tbody"),
    $containerPagination = document.getElementById("container-pagination");

  let search = window.location.search,
    urlParams = new URLSearchParams(search),
    numPage = 1,
    limitRow = 10;

  if (search) {
    if (urlParams.has("page")) numPage = urlParams.get("page");
    if (urlParams.has("rows")) limitRow = urlParams.get("rows");
  }

  fetch("./emailsApi.php")
    .then((res) => res.json())
    .then((res) => {
      let totalPages = Math.ceil(res.length / limitRow),
        offset = (numPage - 1) * limitRow,
        fragment = document.createDocumentFragment(),
        emailsArray = res.splice(offset, limitRow);

      emailsArray.forEach((el) => {
        console.log(el);
        let $tr = document.createElement("tr");

        $tr.innerHTML = `
          <td>${el.date}</td>
          <td>${el.subject}</td>
          <td>${el.email}</td>
          <td>${el.emailData}</td>
          <td>
            <form action="./deleteEmailData.php" method="POST">
              <input class="button-delete" type="submit" value="delete" />
              <input type="hidden" name="id" value="${el.id}" />
            </form>
          </td>
        `;

        fragment.appendChild($tr);
      });

      $tbody.appendChild(fragment);

      return totalPages;
    })
    .then((totalPages) => {
      let fragment = document.createDocumentFragment();

      for (let i = 1; i <= totalPages; i++) {
        let $a = document.createElement("a");

        $a.textContent = i;
        $a.setAttribute("href", `/?page=${i}&rows=${limitRow}`);

        if(numPage == i) $a.classList.add("active");

        fragment.appendChild($a);
      }

      $containerPagination.appendChild(fragment);
    })
    .catch();
}
