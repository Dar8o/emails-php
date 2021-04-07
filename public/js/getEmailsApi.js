export default function getEmailsApi() {
  const $tbody = document.getElementById("tbody"),
    $containerPagination = document.getElementById("container-pagination");

  let numPage = 1,
      limitRow = 10;

  if (sessionStorage.getItem("page")) numPage = sessionStorage.getItem("page");
  if (sessionStorage.getItem("rows")) limitRow = sessionStorage.getItem("rows");

  fetch("./emailsApi.php")
    .then((res) => res.json())
    .then((res) => {
      let totalPages = Math.ceil(res.length / limitRow),
        offset = (numPage - 1) * limitRow,
        fragment = document.createDocumentFragment(),
        emailsArray = res.splice(offset, limitRow);

      emailsArray.forEach((el) => {
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
        let $button = document.createElement("button");

        $button.textContent = i;
        $button.classList.add("button-pagination");

        if(numPage == i) $button.classList.add("active");

        fragment.appendChild($button);
      }

      $containerPagination.appendChild(fragment);
    })
    .catch();
}
