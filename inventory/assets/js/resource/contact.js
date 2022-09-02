

var url = "../../controller/contact.php";

$(document).on('click', ".contact_delete", function (e) {
    // alert($(this).val());
    var json ={
        id :$(this).val() ,
        action:'delete'
    };

    deleteData(json,url,'POST');
});

$.get(url, { 
        action: 'list'
    })
    .done(function (data) {

        if (data) {
            $('#index_contact').html(data);

        } else {

            $('#index_contact').html('<tr><td rowspan="4">No Data</td></tr>')

        }
    })


$("#btn_search").click(function(){
    // toastAlert();
    search();
});

function search(){
    var url = "../../controller/product.php";
    var category = $('#Category').val();
    


    $.get(url, {
        action: 'list',
        category:category,
    })
    .done(function (data) {

        if (data) {
            $('#index_product_sector').html(data);

        } else {
            $('#index_product_sector').html('<tr><td rowspan="5">No Data</td></tr>')
        }
    })
}