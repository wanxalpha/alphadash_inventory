// toastr.options = {
//     "closeButton": false,
//     "debug": false,
//     "newestOnTop": false,
//     "progressBar": false,
//     "positionClass": "toast-top-right",
//     "preventDuplicates": false,
//     "onclick": null,
//     "showDuration": "300",
//     "hideDuration": "1000",
//     "timeOut": "5000",
//     "extendedTimeOut": "1000",
//     "showEasing": "swing",
//     "hideEasing": "linear",
//     "showMethod": "fadeIn",
//     "hideMethod": "fadeOut"
//   };

// if(toast_type == 'success'){
//   toastr.success(toast_message);
// }
// else if(toast_type == 'error'){
//   toastr.error(toast_message);

// }
const toastPlacementExample = document.querySelector('.toast-placement-ex');

if(toast_type){
  toastAlert();
}
function toastAlert(){
    $('#toast_message').text(toast_message);

    if(toast_type == 'success') var color = 'bg-success';

    else if(toast_type == 'error') var color = 'bg-danger';

    else var color = 'bg-info';

    toastPlacementExample.classList.add(color);
    DOMTokenList.prototype.add.apply(toastPlacementExample.classList, ["top-0","end-0"]);
    toastPlacement = new bootstrap.Toast(toastPlacementExample);
    toastPlacement.show();
}

function deleteData(json,url,action){
    Swal.fire({
      text: "Are you sure you want to delete this data?",
      icon: "warning",
      showCancelButton: !0,
      buttonsStyling: !1,
      confirmButtonText: "Yes, delete it!",
      cancelButtonText: "No, return",
      customClass: {
          confirmButton: "btn btn-primary",
          cancelButton: "btn btn-active-light"
      }
  }).then((function (t) {
      if(t.isConfirmed){
        $.ajax({
          url:url,
          dataType:'json',
          data:json,
          type:action,
          success:function(data){
            if(data.status == 'success') window.location.replace(data.url);
          },
          error:function(data){
            toastAlert();
          }
        })
      }
      
  }))
}


var $loading = $('#loadingDiv').hide();

$(document)
  .ajaxStart(function () {
    $loading.show();
  })
  .ajaxStop(function () {
    $loading.hide();
  });



