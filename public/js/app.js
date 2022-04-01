// $(document).ready(function () {
//   $("#news-letters").submit(function (event) {
//     event.preventDefault();
//     axios
//       .post(this.action, $(this).serialize(), {
//         headers: { "X-Requested-With": "XMLHttpRequest" },
//       })
//       .then((response) => {
//         toastr.success(response.data);
//         console.log(response.data);
//       })
//       .catch((error) => {
//         toastr.error(error.response.data.email);
//         console.log(error.response.data);
//       });
//   });
// });

//show spinner
const showSpinner = () => {
  $("#filter").attr("disabled", true);
  $("#filter")
    .html(`<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
  Loading...`);
};

const hideSpinner = () => {
  $("#filter").removeAttr("disabled");
  $("#filter").html("Filter");
};

$(document).ready(function () {
  axios.defaults.headers.common["X-Requested-With"] = "XMLHttpRequest";

  $(document).on("click", "#filter", function () {
    let url = $("#searchForm").attr("action");
    let formValue = $("#searchForm").serialize();

    showSpinner();
    axios
      .post(url, formValue)
      .then((response) => {
        console.log(response.data);
        hideSpinner();
        $('#ajaxContent').html(response.data);
      })
      .catch((error) => {
        hideSpinner();
        console.log(error.response.data);
      });
  });
});
