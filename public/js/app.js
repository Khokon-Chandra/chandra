$(document).ready(function () {
  $("#news-letters").submit(function (event) {
    event.preventDefault();
    axios
      .post(this.action, $(this).serialize(), {
        headers: { "X-Requested-With": "XMLHttpRequest" },
      })
      .then((response) => {
        toastr.success(response.data);
        console.log(response.data);
      })
      .catch((error) => {
        toastr.error(error.response.data.email);
        console.log(error.response.data);
      });
  });
});
