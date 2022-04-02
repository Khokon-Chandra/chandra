axios.defaults.headers.common["X-Requested-With"] = "XMLHttpRequest";

//show spinner
const showButtonSpinner = () => {
  $("#filter").attr("disabled", true);
  $("#filter")
    .html(`<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
  Loading...`);
};

const hideButtonSpinner = () => {
  $("#filter").removeAttr("disabled");
  $("#filter").html("Filter");
};

const showBorderSpinner = () => {
  $("#ajaxContent")
    .html(`<div class="text-center my-3 p-4"><div class="spinner-border text-secondary" role="status">
  <span class="visually-hidden">Loading...</span>
</div></div>`);
};

const hideBorderSpinner = () => {
  $("#ajaxContent")
    .html(`No records found`);
};

$("#searchForm").submit(function (event) {
  event.preventDefault();
  let url = $(this).attr("action");
  let formValue = $(this).serialize();

  showButtonSpinner();
  showBorderSpinner();
  axios
    .post(url, formValue)
    .then((response) => {
      hideButtonSpinner();
      $("#ajaxContent").html(response.data);
    })
    .catch((error) => {
      hideButtonSpinner();
      hideBorderSpinner();
    });
});


$(document).on('change','#limit',function(){
  $('#count').val($(this).val());
  $('#searchForm').trigger('submit');
})



$("#checkAll").click(function(){
  var check = $(this).prop('checked');
  if(check == true) {
    $('.checkbox').prop('checked', true);
  } else {
    $('.checkbox').prop('checked', false);
  }
});
