import { selectRefresh } from "./refresh.js"
import getEmailsApi from "./getEmailsApi.js"
import paginationButtons from "./paginationButtons.js"
import selectRows from "./selectRows.js"

document.addEventListener("DOMContentLoaded", () => {
  selectRefresh()
  getEmailsApi()
  paginationButtons()
  selectRows()
})