axios.defaults.headers.common["X-Requested-With"] = "XMLHttpRequest";

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

const showBorderSpinner = () => {
  $("#ajaxContent")
    .html(`<div class="text-center my-3 p-4"><div class="spinner-border text-secondary" role="status">
  <span class="visually-hidden">Loading...</span>
</div></div>`);
};

$("#searchForm").submit(function (event) {
  event.preventDefault();
  let url = $(this).attr("action");
  let formValue = $(this).serialize();

  showSpinner();
  showBorderSpinner();
  axios
    .post(url, formValue)
    .then((response) => {
      hideSpinner();
      $("#ajaxContent").html(response.data);
    })
    .catch((error) => {
      hideSpinner();
    });
});


$(document).on('change','#limit',function(){
  $('#count').val($(this).val());
  $('#searchForm').trigger('submit');
})
