import refresh from "./refresh.js"
import getEmailsApi from "./getEmailsApi.js"

document.addEventListener("DOMContentLoaded", () => {
  refresh()
  getEmailsApi()
})