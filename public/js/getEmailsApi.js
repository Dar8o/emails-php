export default function getEmailsApi() {
  fetch('./emailsApi.php')
    .then(res => res.json())
    .then(res => {
      console.log(res)
    })
    .catch()
}